// Main JavaScript file

document.addEventListener('DOMContentLoaded', function () {
  initReadingProgress();
  initTocActive();
});

/**
 * Reading progress bar — fills based on article scroll position.
 */
function initReadingProgress() {
  const bar     = document.querySelector('.bl-progress__bar');
  const article = document.querySelector('.svc-single .bl-art');
  if (!bar || !article) return;

  let ticking = false;
  const update = () => {
    const rect      = article.getBoundingClientRect();
    const viewport  = window.innerHeight || document.documentElement.clientHeight;
    const total     = rect.height - viewport;
    const scrolled  = Math.min(Math.max(-rect.top, 0), total);
    const pct       = total > 0 ? (scrolled / total) * 100 : 0;
    bar.style.transform = `scaleX(${pct / 100})`;
    ticking = false;
  };

  window.addEventListener('scroll', () => {
    if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
  }, { passive: true });
  window.addEventListener('resize', update);
  update();
}

/**
 * Highlight the active TOC link as the user scrolls past headings.
 */
function initTocActive() {
  const links = document.querySelectorAll('.bl-toc [data-toc-link]');
  if (!links.length || !('IntersectionObserver' in window)) return;

  const map = new Map();
  links.forEach(a => {
    const id = a.getAttribute('data-toc-link');
    const target = document.getElementById(id);
    if (target) map.set(target, a);
  });

  const visible = new Set();
  const setActive = () => {
    if (!visible.size) return;
    // Pick the first visible heading in document order
    let firstEl = null;
    visible.forEach(el => {
      if (!firstEl || el.offsetTop < firstEl.offsetTop) firstEl = el;
    });
    links.forEach(a => a.classList.remove('is-active'));
    const link = map.get(firstEl);
    if (link) link.classList.add('is-active');
  };

  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) visible.add(e.target);
      else visible.delete(e.target);
    });
    setActive();
  }, { rootMargin: '-15% 0px -70% 0px', threshold: 0 });

  map.forEach((_, el) => io.observe(el));
}
