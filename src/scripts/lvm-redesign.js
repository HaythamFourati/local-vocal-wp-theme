/* Local Vocal redesign interactions
   - Nav scrolled-state toggle
   - Mobile nav drawer
   - FAQ accordion
   - Annotated website pin positioning
*/
(function () {
  'use strict';

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    /* ---------- Smooth scroll fallback (Safari <15.4) ---------- */
    if (document.body.classList.contains('lvm-redesign')) {
      document.documentElement.style.scrollBehavior = 'smooth';
      document.documentElement.style.scrollPaddingTop = '84px';
    }

    /* ---------- Nav scrolled state ---------- */
    var nav = document.querySelector('.lvm-redesign .nav');
    if (nav) {
      var onScroll = function () {
        if (window.scrollY > 12) nav.classList.add('is-scrolled');
        else nav.classList.remove('is-scrolled');
      };
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    }

    /* ---------- Mobile drawer ---------- */
    var toggle = document.querySelector('.lvm-redesign .nav__toggle');
    var drawer = document.querySelector('.lvm-redesign .nav__drawer');
    if (toggle && drawer) {
      toggle.addEventListener('click', function () {
        var open = drawer.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        document.body.style.overflow = open ? 'hidden' : '';
      });
      drawer.addEventListener('click', function (e) {
        if (e.target.tagName === 'A') {
          drawer.classList.remove('is-open');
          toggle.setAttribute('aria-expanded', 'false');
          document.body.style.overflow = '';
        }
      });
    }

    /* ---------- FAQ accordion ---------- */
    var faqItems = document.querySelectorAll('.lvm-redesign .faq__item');
    faqItems.forEach(function (item, idx) {
      var btn = item.querySelector('.faq__q');
      if (!btn) return;
      // Open the first item by default
      if (idx === 0) item.classList.add('is-open');
      btn.setAttribute('aria-expanded', item.classList.contains('is-open') ? 'true' : 'false');
      btn.addEventListener('click', function () {
        var isOpen = item.classList.toggle('is-open');
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });
    });

    /* ---------- Annotated website pin positioning ---------- */
    var anno = document.querySelector('.lvm-redesign .anno');
    if (anno) {
      var site = anno.querySelector('.anno__site');
      var pins = anno.querySelectorAll('.anno__pin');
      if (site && pins.length) {
        var positionPins = function () {
          var siteRect = site.getBoundingClientRect();
          pins.forEach(function (pin) {
            var targetSel = pin.getAttribute('data-target');
            if (!targetSel) return;
            var target = anno.querySelector(targetSel);
            if (!target) return;
            var r = target.getBoundingClientRect();
            var center = r.top - siteRect.top + r.height / 2;
            pin.style.top = (center - 14) + 'px';
            pin.style.opacity = '1';
          });
        };
        positionPins();
        window.addEventListener('resize', positionPins);
        if (typeof ResizeObserver !== 'undefined') {
          var ro = new ResizeObserver(positionPins);
          ro.observe(site);
        }
        // Re-measure once fonts/images settle
        window.addEventListener('load', positionPins);
        setTimeout(positionPins, 300);
      }
    }
  });
})();
