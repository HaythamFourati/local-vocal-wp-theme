/* Local Vocal — Free SEO review intake
   Two places, one form: the pop-up (dialog.lvmi, opened from
   [data-lvm-intake] or links ending in #free-seo-review) and inline copies
   in page sections (.lvmi--inline, from [lvm_seo_intake]). Each instance
   keeps its own state. Steps validate before moving on; the last step posts
   JSON to the REST endpoint, and server-side errors jump back to the step. */
(function () {
  'use strict';

  if (!window.LVMI) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

  function setup(root, isDialog) {
    var form = root.querySelector('.lvmi__form');
    var panes = Array.prototype.slice.call(root.querySelectorAll('.lvmi__pane[data-step]:not(.lvmi__done)'));
    var done = root.querySelector('.lvmi__done');
    var rail = Array.prototype.slice.call(root.querySelectorAll('.lvmi__steps li'));
    var bar = root.querySelector('.lvmi__bar i');
    var countN = root.querySelector('.lvmi__n');
    var back = root.querySelector('[data-lvmi-back]');
    var next = root.querySelector('[data-lvmi-next]');
    var nextLabel = next.querySelector('.lvmi__next-label');
    var errBox = root.querySelector('.lvmi__error');
    var cur = 0, startedAt = performance.now(), busy = false;

    /* ---------- Steps ---------- */
    var focusFirst = function (pane) {
      var f = pane.querySelector('input:not([type=checkbox]):not([type=radio]), textarea, button');
      if (f) setTimeout(function () { f.focus({ preventScroll: true }); }, reduce ? 0 : 60);
    };
    var show = function (i, dir, quiet) {
      var from = panes[cur] || done;
      var to = i === 'done' ? done : panes[i];
      from.hidden = true; from.classList.remove('is-on');
      to.hidden = false;
      to.dataset.dir = dir || 'fwd';
      void to.offsetWidth; // restart the entrance animation
      to.classList.add('is-on');
      if (isDialog) root.setAttribute('aria-labelledby', to.querySelector('.lvmi__title').id);
      root.classList.toggle('is-done', i === 'done');
      // Inline on a phone: keep the top of the form in view as steps change height
      if (!isDialog && !quiet && root.getBoundingClientRect().top < 0) root.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
      if (i === 'done') {
        rail.forEach(function (li) { li.classList.remove('is-on'); li.classList.add('is-done'); });
        bar.style.transform = 'scaleX(1)';
        return;
      }
      cur = i;
      rail.forEach(function (li, j) { li.classList.toggle('is-on', j === i); li.classList.toggle('is-done', j < i); });
      bar.style.transform = 'scaleX(' + ((i + 1) / panes.length) + ')';
      countN.textContent = i + 1;
      back.style.visibility = i === 0 ? 'hidden' : '';
      nextLabel.textContent = i === panes.length - 1 ? nextLabel.dataset.last : nextLabel.dataset.next;
      if (!quiet) focusFirst(to); // never steal focus (or scroll the page) on load
    };

    /* ---------- Validation (the server checks again) ---------- */
    var setMsg = function (field, msg) {
      field.classList.toggle('is-invalid', !!msg);
      field.querySelector('.lvmi__msg').textContent = msg || '';
    };
    var validate = function (pane) {
      var ok = true, first = null;
      pane.querySelectorAll('[data-field]').forEach(function (field) {
        var msg = '';
        var input = field.querySelector('input, textarea');
        if (field.matches('fieldset')) {
          if (field.hasAttribute('data-required') && !field.querySelector('input:checked')) msg = 'Pick at least one.';
        } else {
          var v = input.value.trim();
          if (input.required && !v) msg = 'This one’s required.';
          else if (input.type === 'email' && v && !EMAIL.test(v)) msg = 'Enter a valid email address.';
          else if (input.name === 'website' && v && !/\.[a-z]{2,}/i.test(v)) msg = 'That doesn’t look like a web address.';
        }
        setMsg(field, msg);
        if (msg) { ok = false; first = first || input; }
      });
      if (first) first.focus();
      return ok;
    };
    form.addEventListener('input', function (e) {
      var field = e.target.closest('[data-field]');
      if (field && field.classList.contains('is-invalid')) setMsg(field, '');
    });
    form.addEventListener('change', function (e) {
      var field = e.target.closest('fieldset[data-field]');
      if (field) setMsg(field, '');
    });
    // Inline forms start the fill-time clock when someone first touches them
    if (!isDialog) form.addEventListener('focusin', function () { if (!form.dataset.touched) { form.dataset.touched = '1'; startedAt = performance.now(); } });

    back.addEventListener('click', function () { if (cur > 0) show(cur - 1, 'back'); });
    form.addEventListener('submit', function (e) {
      e.preventDefault(); // Enter in any input lands here too
      if (busy || !validate(panes[cur])) return;
      if (cur < panes.length - 1) show(cur + 1, 'fwd');
      else submit();
    });

    /* ---------- Submit ---------- */
    var collect = function () {
      var data = {};
      new FormData(form).forEach(function (v, k) {
        var multi = form.querySelector('[name="' + k + '"][type=checkbox]');
        if (multi) (data[k] = data[k] || []).push(v);
        else data[k] = typeof v === 'string' ? v.trim() : v;
      });
      data._ms = Math.round(performance.now() - startedAt);
      data._page = location.href;
      return data;
    };
    var showError = function (msg) { errBox.textContent = msg || ''; errBox.hidden = !msg; };

    var submit = function () {
      busy = true; showError('');
      root.classList.add('is-busy'); next.disabled = true;
      var data = collect();
      fetch(window.LVMI.endpoint, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data), credentials: 'same-origin' })
        .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, body: j }; }); })
        .then(function (res) {
          if (res.ok) {
            root.querySelector('.lvmi__who').textContent = data.name ? ', ' + data.name.split(' ')[0] : '';
            show('done');
            document.dispatchEvent(new CustomEvent('lvmi:submitted', { detail: { business: data.business, inline: !isDialog } }));
            return;
          }
          var fields = res.body && res.body.data && res.body.data.fields;
          if (fields) { // server disagreed: jump to the first step with a problem
            var target = panes.findIndex(function (p) { return Object.keys(fields).some(function (k) { return p.querySelector('[data-field="' + k + '"]'); }); });
            if (target > -1) show(target, 'back');
            Object.keys(fields).forEach(function (k) { var f = form.querySelector('[data-field="' + k + '"]'); if (f) setMsg(f, fields[k]); });
          }
          showError((res.body && res.body.message) || 'Something went wrong. Please try again.');
        })
        .catch(function () { showError('We couldn’t reach the server. Check your connection and try again.'); })
        .then(function () { busy = false; root.classList.remove('is-busy'); next.disabled = false; });
    };

    var reset = function () {
      form.reset();
      form.querySelectorAll('[data-field]').forEach(function (f) { setMsg(f, ''); });
      showError('');
      done.hidden = true; done.classList.remove('is-on');
      panes.forEach(function (p) { p.hidden = true; p.classList.remove('is-on'); });
      cur = 0; show(0, 'fwd', true);
    };
    show(0, 'fwd', true);

    return {
      start: function () { if (!done.hidden) reset(); startedAt = performance.now(); focusFirst(panes[cur]); }
    };
  }

  /* ---------- Inline copies ---------- */
  document.querySelectorAll('.lvmi--inline').forEach(function (el) { setup(el, false); });

  /* ---------- The pop-up ---------- */
  var dlg = document.querySelector('dialog.lvmi');
  if (!dlg || typeof dlg.showModal !== 'function') return; // links keep their href
  var pop = setup(dlg, true);
  var lastTrigger = null;

  var open = function (trigger) {
    lastTrigger = trigger || null;
    dlg.classList.remove('is-closing');
    dlg.showModal();
    document.documentElement.classList.add('lvmi-open');
    pop.start();
  };
  var finishClose = function () {
    dlg.classList.remove('is-closing');
    dlg.close();
    document.documentElement.classList.remove('lvmi-open');
    if (lastTrigger) lastTrigger.focus({ preventScroll: true });
  };
  var close = function () {
    if (!dlg.open || dlg.classList.contains('is-closing')) return;
    if (reduce) return finishClose();
    dlg.classList.add('is-closing');
    setTimeout(finishClose, 220);
  };
  dlg.addEventListener('cancel', function (e) { e.preventDefault(); close(); }); // Esc, animated
  dlg.addEventListener('click', function (e) { if (e.target === dlg) close(); }); // backdrop
  dlg.querySelectorAll('[data-lvmi-close]').forEach(function (b) { b.addEventListener('click', close); });

  document.addEventListener('click', function (e) {
    var t = e.target.closest('[data-lvm-intake], a[href$="#free-seo-review"]');
    if (!t) return;
    e.preventDefault();
    open(t);
  });
  if (location.hash === '#free-seo-review') open();
})();
