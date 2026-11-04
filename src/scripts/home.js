/* Local Vocal — homepage behaviour (front-page.php only)
   - Scroll reveal (staggered per batch)
   - Phone demo: search → map pack → tap Call → Dynamic Island → owner notification
   - Spring-smoothed pointer tilt / parallax
   - Sections: pinned work reel, rank-climb story, cursor preview, layer
     explainer, live publishing loop, live support log, timeline fill
   All motion is decorative, pauses off-screen, and respects reduced motion. */
(function () {
  'use strict';

  // Sibling module URL (same folder and cache-busting version as this file)
  var cityModule = document.currentScript ? document.currentScript.src.replace(/home\.js/, 'home-city.js') : '';

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    var root = document.documentElement;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.documentElement.style.scrollBehavior = 'smooth';
    document.documentElement.style.scrollPaddingTop = '84px';

    /* ---------- Scroll reveal (staggered per batch) ---------- */
    var reveals = document.querySelectorAll('.lvh [data-reveal]');
    if (reveals.length && root.classList.contains('lvh-js')) {
      var revealIO = new IntersectionObserver(function (entries) {
        var n = 0;
        entries.forEach(function (e) {
          if (!e.isIntersecting) return;
          e.target.style.setProperty('--d', Math.min(n++ * 60, 360) + 'ms');
          e.target.classList.add('is-in');
          revealIO.unobserve(e.target);
        });
      }, { rootMargin: '0px 0px -8% 0px' });
      reveals.forEach(function (el) { revealIO.observe(el); });
    }

    /* ---------- Home hero: search → map pack → call demo ----------
       Types a query, drops pins and results in, taps "Call", expands the
       Dynamic Island, shows the owner's notification, then moves to the
       next query. Pauses while off-screen or the tab is hidden. */
    var phone = document.querySelector('.lvh-phone');
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (phone && !reduceMotion && document.documentElement.classList.contains('lvh-js')) {
      var queries = JSON.parse(phone.getAttribute('data-queries') || '[]');
      var typed = phone.querySelector('.lvh-phone__typed');
      var list = phone.querySelector('.lvh-phone__results');
      var toast = document.querySelector('.lvh-toast');
      var onScreen = true, waiting = false, qi = 0;

      var wait = function (ms) { return new Promise(function (r) { setTimeout(r, ms); }); };
      var canRun = function () { return onScreen && !document.hidden; };

      var render = function (rows) {
        list.innerHTML = rows.map(function (r, i) {
          return '<li style="--i:' + i + '"' + (i === 0 ? ' class="is-you"' : '') + '>' +
            '<span class="lvh-phone__pos">' + (i + 1) + '</span>' +
            '<span class="lvh-phone__name">' + r[0] + '<small>★ ' + r[1] + ' (' + r[2] + ') · ' + r[3] + ' mi · Open</small></span>' +
            (i === 0 ? '<span class="lvh-phone__call">Call</span>' : '') + '</li>';
        }).join('');
      };

      // Desktop search results beside the phone. Mirrors the phone: the
      // query types into its search box, the same ranking lands at the same
      // moment, then a visitor cursor hovers your listing and clicks Website.
      var site = document.querySelector('.lvh-site');
      var pageEl = site && site.querySelector('.lvh-site__page');
      var gsQ = site && site.querySelector('.lvh-gs__q');
      var cur = site && site.querySelector('.lvh-cursor');
      var curPos = { x: 0, y: 0 }, sceneId = 0, lastCity = '';
      var alive = function (id) { return id === sceneId; };

      var fillSite = function (q) {
        if (!site) return;
        var d = q.site, r = q.r;
        site.querySelectorAll('[data-s]').forEach(function (el) {
          var k = el.getAttribute('data-s'), m = /^p(\d)(m?)$/.exec(k);
          if (m) el.textContent = m[2] ? '★ ' + r[+m[1]][1] + ' (' + r[+m[1]][2] + ') · ' + r[+m[1]][3] + ' mi' : r[+m[1]][0];
          else if (k === 'rating') el.textContent = r[0][1];
          else if (k === 'reviews') el.textContent = '(' + r[0][2] + ')';
          else if (d[k] != null) el.textContent = d[k];
        });
      };
      var teardown = function () {
        if (!site) return;
        sceneId++;
        site.classList.remove('is-done', 'is-ringing');
        site.classList.add('is-loading', 'is-searching');
        if (gsQ) gsQ.textContent = '';
        if (cur) { cur.classList.remove('is-on'); cur.getAnimations().forEach(function (an) { an.cancel(); }); }
        site.querySelectorAll('.is-hover').forEach(function (e) { e.classList.remove('is-hover'); });
      };
      var buildSite = function (i, q) {
        if (!site) return;
        fillSite(q);
        lastCity = (/ in (.+), MD$/.exec(q.site.cat) || [])[1] || '';
        void site.offsetWidth; // commit the hidden state so the stagger plays
        site.classList.remove('is-loading', 'is-searching');
        site.classList.add('is-done');
        runScene();
      };

      /* ---- Visitor cursor: curved flight, hover, press + ripple ---- */
      var pt = function (sel, fx, fy) {
        var el = site.querySelector(sel); if (!el) return null;
        var r = el.getBoundingClientRect(), p = pageEl.getBoundingClientRect();
        return { el: el, x: r.left - p.left + r.width * (fx == null ? 0.5 : fx), y: r.top - p.top + r.height * (fy == null ? 0.6 : fy) };
      };
      var place = function (x, y) { curPos = { x: x, y: y }; cur.style.transform = 'translate(' + x + 'px,' + y + 'px)'; };
      var fly = function (x, y, ms) { // arc toward the target, strong in-out ease
        var a = curPos, dx = x - a.x, dy = y - a.y;
        var anim = cur.animate([
          { transform: 'translate(' + a.x + 'px,' + a.y + 'px)' },
          { transform: 'translate(' + (a.x + dx * 0.5 - dy * 0.18) + 'px,' + (a.y + dy * 0.5 + dx * 0.12) + 'px)', offset: 0.55 },
          { transform: 'translate(' + x + 'px,' + y + 'px)' }
        ], { duration: ms, easing: 'cubic-bezier(0.65, 0, 0.35, 1)', fill: 'forwards' });
        anim.finished.catch(function () {}); // cancelled on teardown
        curPos = { x: x, y: y };
        // Sequence on a timer, not anim.finished: a tab that renders no frames must not stall.
        return wait(ms).then(function () { cur.style.transform = 'translate(' + x + 'px,' + y + 'px)'; anim.cancel(); });
      };
      var go = async function (id, sel, ms, fx, fy) {
        var p = pt(sel, fx, fy);
        if (!p || !alive(id)) return null;
        await fly(p.x, p.y, ms);
        return alive(id) ? p : null;
      };
      var press = async function (target) {
        cur.classList.add('is-down'); target.classList.add('is-press');
        var rip = document.createElement('span');
        rip.className = 'lvh-ripple';
        rip.style.cssText = 'left:' + curPos.x + 'px;top:' + curPos.y + 'px;--c:' + getComputedStyle(cur).getPropertyValue('--c');
        pageEl.appendChild(rip);
        setTimeout(function () { rip.remove(); }, 700);
        await wait(140);
        cur.classList.remove('is-down'); target.classList.remove('is-press');
      };
      var runScene = async function () {
        if (!cur || !pageEl) return;
        var id = ++sceneId, w = pageEl.clientWidth, h = pageEl.clientHeight;
        cur.querySelector('b').textContent = lastCity ? 'Visitor · ' + lastCity : 'Visitor';
        place(w * 0.62, h * 1.08); // enter from below
        cur.classList.add('is-on');
        await wait(700);
        var p = await go(id, '[data-t="you"]', 1000, 0.45, 0.55); if (!p) return;
        p.el.classList.add('is-hover');
        await wait(700); if (!alive(id)) return;
        p.el.classList.remove('is-hover');
        p = await go(id, '[data-t="web"]', 900, 0.5, 0.62); if (!p) return;
        p.el.classList.add('is-hover');
        await wait(220); await press(p.el); if (!alive(id)) return;
        site.classList.add('is-loading'); // the click starts loading yourbusiness.com
        setTimeout(function () { if (alive(id)) site.classList.remove('is-loading'); }, 1400);
      };

      var cycle = async function () {
        if (!canRun()) { waiting = true; return; }
        var q = queries[qi];

        // Reset: notification out first, island folds back, results clear.
        toast.classList.remove('is-in');
        phone.classList.remove('is-calling');
        phone.classList.add('is-searching');
        teardown();
        await wait(320);

        typed.textContent = '';
        for (var c = 0; c < q.q.length; c++) {
          typed.textContent += q.q[c];
          if (gsQ) gsQ.textContent = typed.textContent;
          await wait(38 + Math.random() * 45); // uneven, like a person typing
        }
        await wait(300);

        render(q.r);
        list.offsetHeight; // commit hidden state so the stagger plays
        phone.classList.remove('is-searching');
        buildSite(qi, q);
        await wait(2600);

        var call = list.querySelector('.lvh-phone__call');
        call.classList.add('is-pressed');
        await wait(180);
        call.classList.remove('is-pressed');
        phone.classList.add('is-calling');
        if (site) site.classList.add('is-ringing');
        await wait(700);

        toast.classList.add('is-in');
        await wait(3800);

        qi = (qi + 1) % queries.length;
        cycle();
      };

      new IntersectionObserver(function (entries) {
        onScreen = entries[0].isIntersecting;
        if (onScreen && waiting) { waiting = false; cycle(); }
      }).observe(phone);
      document.addEventListener('visibilitychange', function () {
        if (canRun() && waiting) { waiting = false; cycle(); }
      });

      // Start empty, let the headline land first, then type.
      typed.textContent = '';
      phone.classList.add('is-searching');
      teardown();
      setTimeout(cycle, 900);
    }

    /* ---------- Home: spring-smoothed pointer motion ----------
       Decorative only (marketing page), fine pointers only, off under
       reduced motion. Writes transform directly on each element. */
    var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    var springFollow = function (area, apply) {
      var tx = 0, ty = 0, x = 0, y = 0, vx = 0, vy = 0, raf = null;
      var step = function () {
        vx = (vx + (tx - x) * 0.06) * 0.78; vy = (vy + (ty - y) * 0.06) * 0.78; // stiffness / damping
        x += vx; y += vy;
        apply(x, y);
        var moving = Math.abs(tx - x) + Math.abs(ty - y) + Math.abs(vx) + Math.abs(vy) > 0.0008;
        raf = moving ? requestAnimationFrame(step) : null;
      };
      var start = function () { if (!raf) raf = requestAnimationFrame(step); };
      area.addEventListener('pointermove', function (e) {
        var r = area.getBoundingClientRect();
        tx = ((e.clientX - r.left) / r.width - 0.5) * 2;
        ty = ((e.clientY - r.top) / r.height - 0.5) * 2;
        start();
      });
      area.addEventListener('pointerleave', function () { tx = 0; ty = 0; start(); });
    };
    if (finePointer && !reduceMotion) {
      var tilt = document.querySelector('.lvh-tilt');
      if (tilt) springFollow(document.querySelector('.lvh-hero'), function (x, y) {
        tilt.style.transform = 'perspective(1400px) rotateY(' + (x * 7).toFixed(2) + 'deg) rotateX(' + (-y * 5).toFixed(2) + 'deg)';
      });
    }


    /* ---------- Sections: one rAF-batched scroll loop ---------- */
    var onScroll = [];
    var scrollRaf = null;
    var runScroll = function () { scrollRaf = null; onScroll.forEach(function (fn) { fn(); }); };
    var queueScroll = function () { if (!scrollRaf) scrollRaf = requestAnimationFrame(runScroll); };
    window.addEventListener('scroll', queueScroll, { passive: true });
    var clamp01 = function (v) { return v < 0 ? 0 : v > 1 ? 1 : v; };
    var pad2 = function (n) { return (n < 10 ? '0' : '') + n; };
    var once = function (el, fn, threshold) {
      new IntersectionObserver(function (e, io) {
        if (e[0].isIntersecting) { io.disconnect(); fn(); }
      }, { threshold: threshold || 0.35 }).observe(el);
    };

    /* ---------- Work: pinned reel ----------
       Desktop with a fine pointer: the section is as tall as the track
       is wide, the inner frame sticks, and scroll progress slides the
       track. Elsewhere it
       is a native swipe track; the counter follows either way. */
    var reel = document.querySelector('.lvh-reel');
    if (reel) {
      var reelView = reel.querySelector('.lvh-reel__view');
      var track = reel.querySelector('.lvh-reel__track');
      var shots = Array.prototype.slice.call(track.children);
      var reelN = reel.querySelector('.lvh-reel__n');
      var reelBar = reel.querySelector('.lvh-reel__bar i');
      var pinMQ = window.matchMedia('(min-width: 961px) and (hover: hover) and (pointer: fine)');
      var reelDist = 0, reelLast = -1;
      var reelCount = function (p) {
        var i = Math.round(p * (shots.length - 1));
        if (i !== reelLast) { reelLast = i; reelN.textContent = pad2(i + 1); }
        reelBar.style.transform = 'scaleX(' + (1 / shots.length + p * (1 - 1 / shots.length)).toFixed(4) + ')';
      };
      var reelUpdate = function () {
        if (!reel.classList.contains('is-pinned')) return;
        var r = reel.getBoundingClientRect();
        if (r.bottom < 0 || r.top > innerHeight) return;
        var p = clamp01(-r.top / Math.max(1, r.height - innerHeight));
        var x = -p * reelDist;
        track.style.transform = 'translate3d(' + x.toFixed(1) + 'px,0,0)';
        reelCount(p);
      };
      var reelLayout = function () {
        var on = pinMQ.matches && !reduceMotion;
        reel.classList.toggle('is-pinned', on);
        track.style.transform = '';
        if (!on) { reel.style.height = ''; return; }
        reelDist = Math.max(0, track.scrollWidth - innerWidth);
        reel.style.height = Math.round(innerHeight + reelDist) + 'px';
        reelUpdate();
      };
      reelView.addEventListener('scroll', function () {
        if (reel.classList.contains('is-pinned')) return;
        reelCount(clamp01(reelView.scrollLeft / Math.max(1, reelView.scrollWidth - reelView.clientWidth)));
      }, { passive: true });
      onScroll.push(reelUpdate);
      window.addEventListener('resize', reelLayout);
      window.addEventListener('load', reelLayout);
      reelLayout();
    }

    /* ---------- Problem: each fix climbs you up the results ----------
       You start on page 3. The step crossing the trigger line counts as
       fixed: you climb past rivals (strong in-out, it's on-screen
       movement) and visibility rises to 100% at the last fix. The line
       sits lower on one-column layouts, below the stuck board. */
    var board = document.querySelector('.lvh-board');
    var fallSteps = Array.prototype.slice.call(document.querySelectorAll('.lvh-fall__step'));
    if (board && fallSteps.length) {
      var rivals = Array.prototype.slice.call(board.querySelectorAll('.lvh-board__row:not(.is-you)'));
      var you = board.querySelector('.lvh-board__row.is-you');
      var youPos = you.querySelector('.lvh-board__pos');
      var youWhere = you.querySelector('.lvh-board__where');
      var youUp = you.querySelector('.lvh-board__up');
      var pctEl = board.querySelector('.lvh-board__pct');
      var meter = board.querySelector('.lvh-board__meter i');
      var pips = board.querySelectorAll('.lvh-board__pips i');
      var stepEl = board.querySelector('.lvh-board__step');
      var stackMQ = window.matchMedia('(max-width: 960px)');
      var START_RANK = 26, START_PCT = 4;
      var fallCur = -2, curRank = START_RANK, shownPct = START_PCT, pctRaf = null;
      var setRank = function (rank, pct, on) {
        var vis = parseFloat(getComputedStyle(board).getPropertyValue('--vis')) || 8;
        var k = Math.min(rank - 1, vis);
        rivals.forEach(function (row, i) {
          var idx = i < k ? i : i + 1;
          row.style.transform = 'translateY(' + idx * 100 + '%)';
          row.firstElementChild.textContent = idx + 1;
        });
        you.style.transform = 'translateY(' + (k < vis ? k : vis + 0.25) * 100 + '%)'; // clear of the fold label
        youPos.textContent = rank;
        youWhere.textContent = 'Page ' + Math.ceil(rank / 10);
        board.classList.toggle('is-lost', rank > 10);
        board.classList.toggle('is-top', rank === 1);
        // Climbed: show how far and pulse the row once
        youUp.textContent = rank < curRank ? '▲ ' + (curRank - rank) : '';
        if (rank < curRank && !reduceMotion) {
          you.classList.remove('is-bump'); void you.offsetWidth; you.classList.add('is-bump');
        }
        curRank = rank;
        meter.style.transform = 'scaleX(' + pct / 100 + ')';
        for (var p = 0; p < pips.length; p++) pips[p].classList.toggle('is-on', p <= on);
        stepEl.textContent = (on + 1) + ' of ' + fallSteps.length + ' fixed';
        var from = shownPct, t0 = performance.now();
        cancelAnimationFrame(pctRaf);
        var tick = function (now) {
          var t = reduceMotion ? 1 : Math.min(1, (now - t0) / 900);
          shownPct = Math.round(from + (pct - from) * (1 - Math.pow(1 - t, 3)));
          pctEl.textContent = shownPct + '%';
          if (t < 1) pctRaf = requestAnimationFrame(tick);
        };
        pctRaf = requestAnimationFrame(tick);
      };
      onScroll.push(function () {
        var line = innerHeight * (stackMQ.matches ? 0.68 : 0.42), on = -1;
        fallSteps.forEach(function (s, i) { if (s.getBoundingClientRect().top < line) on = i; });
        if (on === fallCur) return;
        fallCur = on;
        fallSteps.forEach(function (s, i) {
          s.classList.toggle('is-on', i === on);
          s.classList.toggle('is-done', i < on);
        });
        if (on < 0) setRank(START_RANK, START_PCT, on);
        else setRank(+fallSteps[on].dataset.rank, +fallSteps[on].dataset.pct, on);
      });
    }

    /* ---------- Services: cursor preview ----------
       A card springs after the cursor (to its right, or left once past
       the middle) and crossfades to the hovered service. */
    var peek = document.querySelector('.lvh-peek');
    var index = document.querySelector('.lvh-index');
    if (peek && index && finePointer && !reduceMotion) {
      var panes = peek.querySelectorAll('.lvh-peek__pane');
      var pkX = 0, pkY = 0, pkTX = 0, pkTY = 0, pkVX = 0, pkVY = 0, pkRaf = null, pkFresh = true;
      var pkStep = function () {
        pkVX = (pkVX + (pkTX - pkX) * 0.09) * 0.72; pkVY = (pkVY + (pkTY - pkY) * 0.09) * 0.72;
        pkX += pkVX; pkY += pkVY;
        peek.style.transform = 'translate3d(' + pkX.toFixed(1) + 'px,' + pkY.toFixed(1) + 'px,0) rotate(' + Math.max(-6, Math.min(6, pkVX * 0.25)).toFixed(2) + 'deg)';
        pkRaf = Math.abs(pkTX - pkX) + Math.abs(pkTY - pkY) + Math.abs(pkVX) + Math.abs(pkVY) > 0.1 ? requestAnimationFrame(pkStep) : null;
      };
      index.addEventListener('pointermove', function (e) {
        pkTX = e.clientX + (e.clientX > innerWidth * 0.55 ? -(peek.offsetWidth + 40) : 40);
        pkTY = e.clientY - peek.offsetHeight / 2;
        if (pkFresh) { pkX = pkTX; pkY = pkTY; pkFresh = false; }
        if (!pkRaf) pkRaf = requestAnimationFrame(pkStep);
      });
      index.querySelectorAll('.lvh-index__row').forEach(function (row) {
        row.addEventListener('pointerenter', function () {
          var n = +row.dataset.peek;
          panes.forEach(function (p, j) { p.classList.toggle('is-on', j === n); });
          peek.classList.add('is-on');
        });
      });
      index.addEventListener('pointerleave', function () { peek.classList.remove('is-on'); pkFresh = true; });
      window.addEventListener('scroll', function () { if (peek.classList.contains('is-on')) { peek.classList.remove('is-on'); pkFresh = true; } }, { passive: true });
    }

    /* ---------- Local SEO: WebGL city ----------
       Three.js is ~150 KB gzipped, so the module loads only once the
       section is close. Without WebGL (or if the CDN fails) the CSS
       city stays. */
    var iso = document.querySelector('.lvh-iso');
    if (iso && cityModule && iso.querySelector('.lvh-city') && window.WebGLRenderingContext) {
      new IntersectionObserver(function (e, io) {
        if (!e[0].isIntersecting) return;
        io.disconnect();
        import(cityModule).then(function (m) { m.default(iso); }).catch(function () {});
      }, { rootMargin: '600px 0px' }).observe(iso);
    }

    /* ---------- Web design: exploded layers ----------
       Steps pick the slide; the active step's bar runs while the
       section is on screen (it keeps running under the cursor so the
       story plays through) and its animationend advances to the next. Reduced motion: no autoplay. */
    var layers = document.querySelector('.lvh-layers');
    if (layers) {
      var stack = layers.querySelector('.lvh-stack');
      var lSteps = Array.prototype.slice.call(layers.querySelectorAll('.lvh-layers__step'));
      var setSlide = function (n) {
        stack.dataset.slide = n;
        lSteps.forEach(function (b, i) {
          b.classList.toggle('is-on', i === n);
          b.setAttribute('aria-selected', i === n ? 'true' : 'false');
        });
      };
      lSteps.forEach(function (b, i) {
        b.addEventListener('click', function () { setSlide(i); });
        b.querySelector('.lvh-layers__bar i').addEventListener('animationend', function () { setSlide((i + 1) % lSteps.length); });
      });
      if (!reduceMotion) {
        new IntersectionObserver(function (e) { layers.classList.toggle('is-playing', e[0].isIntersecting); }, { threshold: 0.45 }).observe(layers);
      }
    }

    /* ---------- Blog: pointer spotlight on covers ---------- */
    if (finePointer) {
      document.querySelectorAll('.lvh-mag').forEach(function (m) {
        m.addEventListener('pointermove', function (e) {
          var r = m.getBoundingClientRect();
          m.style.setProperty('--mx', (e.clientX - r.left) + 'px');
          m.style.setProperty('--my', (e.clientY - r.top) + 'px');
        });
      });
    }

    /* ---------- Social: live publishing loop ----------
       Posts go out one by one through the week: the card lights up, its
       dot turns green, the counter ticks, today's column follows, and
       the preview swaps to that post with its engagement counting up.
       After the last one it holds, resets and goes again. Runs only on
       screen; reduced motion shows the week fully published. */
    var cal = document.querySelector('.lvh-cal');
    if (cal) {
      var calN = cal.querySelector('.lvh-cal__n');
      var posts = Array.prototype.slice.call(cal.querySelectorAll('.lvh-cal__post'));
      var days = Array.prototype.slice.call(cal.querySelectorAll('.lvh-cal__day'));
      var calGrid = cal.querySelector('.lvh-cal__grid');
      var pv = cal.querySelector('.lvh-cal__preview');
      var pvEl = {
        avatar: pv.querySelector('.lvh-post__avatar'), brand: pv.querySelector('.lvh-cal__brand'),
        plat: pv.querySelector('.lvh-cal__plat'), when: pv.querySelector('.lvh-cal__when'), cap: pv.querySelector('.lvh-cal__cap'),
        likes: pv.querySelector('.lvh-cal__likes'), comments: pv.querySelector('.lvh-cal__comments'), shares: pv.querySelector('.lvh-cal__shares')
      };
      var calNext = 0, calTimer = null, calOn = false, statRaf = null;
      var initials = function (name) { return name.split(' ').map(function (w) { return w[0]; }).join('').slice(0, 2); };
      var countUp = function (likes) {
        var c = Math.round(likes / 9) + 1, sh = Math.round(likes / 22), t0 = performance.now();
        cancelAnimationFrame(statRaf);
        var tick = function (now) {
          var t = Math.min(1, (now - t0) / 1300), e = 1 - Math.pow(1 - t, 3);
          pvEl.likes.textContent = Math.round(likes * e);
          pvEl.comments.textContent = Math.round(c * e);
          pvEl.shares.textContent = Math.round(sh * e);
          if (t < 1) statRaf = requestAnimationFrame(tick);
        };
        statRaf = requestAnimationFrame(tick);
      };
      var publish = function (i) {
        var p = posts[i], brand = p.querySelector('b').textContent;
        posts.forEach(function (q) { q.classList.remove('is-live'); });
        p.classList.add('is-pub', 'is-live');
        days.forEach(function (d) { d.classList.toggle('is-today', d.contains(p)); });
        // Narrow screens scroll the week sideways: glide to the live day
        if (calGrid.scrollWidth > calGrid.clientWidth) {
          var day = p.parentNode;
          calGrid.scrollTo({ left: day.offsetLeft - (calGrid.clientWidth - day.offsetWidth) / 2, behavior: 'smooth' });
        }
        calN.textContent = i + 1;
        pvEl.avatar.textContent = initials(brand);
        pvEl.brand.textContent = brand;
        pvEl.plat.replaceChildren(p.querySelector('.lvh-app').cloneNode(true));
        pvEl.when.textContent = 'Published · ' + p.dataset.when;
        pvEl.cap.textContent = p.dataset.cap;
        pv.classList.remove('is-swap'); void pv.offsetWidth; pv.classList.add('is-swap');
        countUp(+p.dataset.likes);
      };
      var calStep = function () {
        calTimer = null;
        if (!calOn || document.hidden) return;
        if (calNext >= posts.length) { // week done: hold, then start the week over
          posts.forEach(function (q) { q.classList.remove('is-pub', 'is-live'); });
          calN.textContent = 0; calNext = 0;
          calTimer = setTimeout(calStep, 900);
          return;
        }
        publish(calNext++);
        calTimer = setTimeout(calStep, calNext >= posts.length ? 3200 : 1900);
      };
      if (reduceMotion || !root.classList.contains('lvh-js')) {
        posts.forEach(function (q) { q.classList.add('is-pub'); });
        calN.textContent = posts.length;
      } else {
        new IntersectionObserver(function (e) {
          calOn = e[0].isIntersecting;
          if (calOn && !calTimer) calTimer = setTimeout(calStep, calNext ? 600 : 1500); // first run waits for the cards to land
        }, { threshold: 0.3 }).observe(cal);
        document.addEventListener('visibilitychange', function () { if (!document.hidden && calOn && !calTimer) calTimer = setTimeout(calStep, 600); });
      }
    }

    /* ---------- Support: live activity log ----------
       Every few seconds a task lands on top; the list eases down to make
       room (WAAPI), the oldest falls off. Paused off-screen. */
    var log = document.querySelector('.lvh-log');
    if (log && !reduceMotion) {
      var pool = JSON.parse(log.dataset.pool || '[]');
      var logOn = false, poolI = 3, mins = 9 * 60 + 52;
      new IntersectionObserver(function (e) { logOn = e[0].isIntersecting; }).observe(log);
      setInterval(function () {
        if (!logOn || document.hidden || !pool.length) return;
        var item = pool[poolI++ % pool.length];
        mins += 3 + Math.floor(Math.random() * 9);
        var li = document.createElement('li');
        li.className = 'is-new';
        var t = document.createElement('time'); t.textContent = pad2(Math.floor(mins / 60) % 24) + ':' + pad2(mins % 60);
        var s = document.createElement('span'); s.textContent = item[0];
        var sm = document.createElement('small'); sm.textContent = item[1];
        li.append(t, s, sm);
        log.prepend(li);
        log.animate([{ transform: 'translateY(-48px)' }, { transform: 'none' }], { duration: 700, easing: 'cubic-bezier(0.23, 1, 0.32, 1)' });
        setTimeout(function () { li.classList.remove('is-new'); }, 1800);
        while (log.children.length > 7) log.lastElementChild.remove();
      }, 2800);
    }

    /* ---------- Industries: caption follows the hovered trade ---------- */
    var cap = document.querySelector('.lvh-trades__line');
    if (cap && finePointer) {
      var capDefault = cap.cloneNode(true).childNodes;
      var capArrow = document.querySelector('.lvh-arrow');
      var capT = null;
      var setCap = function (nodes) {
        cap.classList.add('is-out');
        clearTimeout(capT);
        capT = setTimeout(function () { cap.replaceChildren.apply(cap, nodes); cap.classList.remove('is-out'); }, 160);
      };
      var capFor = function (a) {
        var st = document.createElement('strong'); st.textContent = a.querySelector('.lvh-trade__name').textContent;
        var nodes = [st, document.createTextNode(a.querySelector('small').textContent)];
        if (capArrow) nodes.push(capArrow.cloneNode(true));
        return nodes;
      };
      var trades = document.querySelector('.lvh-trades__list');
      trades.querySelectorAll('.lvh-trade').forEach(function (a) {
        a.addEventListener('pointerenter', function () { setCap(capFor(a)); });
        a.addEventListener('focus', function () { setCap(capFor(a)); });
      });
      trades.addEventListener('pointerleave', function () { setCap(Array.prototype.slice.call(capDefault).map(function (n) { return n.cloneNode(true); })); });
    }

    /* ---------- Process: timeline fills with scroll ---------- */
    var time = document.querySelector('.lvh-time');
    if (time) {
      var rail = time.querySelector('.lvh-time__rail');
      var railFill = rail.querySelector('i');
      var tSteps = Array.prototype.slice.call(time.querySelectorAll('.lvh-time__step'));
      if (!reduceMotion) {
        time.classList.add('is-live');
        onScroll.push(function () {
          var r = time.getBoundingClientRect();
          if (r.bottom < -200 || r.top > innerHeight + 200) return;
          var p = clamp01((innerHeight * 0.65 - r.top) / Math.max(r.height, innerHeight * 0.45));
          var across = rail.offsetWidth > rail.offsetHeight;
          railFill.style.transform = across ? 'scaleX(' + p.toFixed(4) + ')' : 'scaleY(' + p.toFixed(4) + ')';
          tSteps.forEach(function (s) {
            var at = across ? s.offsetLeft / time.offsetWidth : s.offsetTop / time.offsetHeight;
            s.classList.toggle('is-on', p > at + 0.005);
          });
        });
      }
    }

    window.addEventListener('resize', queueScroll);
    runScroll();
  });
})();
