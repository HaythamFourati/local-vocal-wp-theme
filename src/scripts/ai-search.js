/* AI Search Optimization page: the hero's AI answer card.
   Cycles through the engines (ChatGPT → Gemini → Perplexity → AI Overviews),
   replaying the question → thinking → streamed answer sequence each time.
   Tabs switch by hand; autoplay pauses on hover, off-screen, in hidden tabs,
   and never runs under reduced motion. Without JS the first answer shows. */
(function () {
  'use strict';
  var card = document.querySelector('.aip-chat');
  if (!card) return;
  var tabs = card.querySelectorAll('.aip-tab');
  var answers = card.querySelectorAll('.aip-ans');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var cur = 0, timer = null, hovering = false, visible = true;

  function show(i) {
    answers[cur].classList.remove('is-on');
    tabs[cur].classList.remove('is-on');
    tabs[cur].setAttribute('aria-pressed', 'false');
    cur = i;
    void answers[cur].offsetWidth; // restart the CSS sequence
    answers[cur].classList.add('is-on');
    tabs[cur].classList.add('is-on');
    tabs[cur].setAttribute('aria-pressed', 'true');
  }
  function schedule() {
    clearTimeout(timer);
    if (reduce || hovering || !visible || document.hidden) return;
    timer = setTimeout(function () { show((cur + 1) % answers.length); schedule(); }, 8000);
  }

  tabs.forEach(function (tab, i) {
    tab.addEventListener('click', function () { if (i !== cur) show(i); schedule(); });
  });
  card.addEventListener('pointerenter', function () { hovering = true; schedule(); });
  card.addEventListener('pointerleave', function () { hovering = false; schedule(); });
  document.addEventListener('visibilitychange', schedule);
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { visible = e[0].isIntersecting; schedule(); }).observe(card);
  }
  schedule();
})();
