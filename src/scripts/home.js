/* Local Vocal — homepage behaviour (front-page.php only)
   - Scroll reveal (staggered per batch)
   - Phone demo: search → map pack → tap Call → Dynamic Island → owner notification
   - Hero stage WebGL shader (relief surface, pointer light, grain)
   - Spring-smoothed pointer tilt / parallax
   - Sections: pinned work reel, rank-drop story, cursor preview, x-ray
     slider, publish counter, live support log, timeline fill
   All motion is decorative, pauses off-screen, and respects reduced motion. */
(function () {
  'use strict';

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


    /* ---------- Hero stage shader ----------
       A lit relief surface: fbm height field, normals from finite
       differences, a soft key light that follows the pointer, a warm
       specular sheen, vignette and animated grain. Half-res render,
       paused off-screen / in hidden tabs, one still frame under reduced
       motion. Without WebGL the CSS gradients underneath remain. */
    var STAGE_FS = [
      'precision highp float;',
      'uniform vec2 u_res; uniform float u_t; uniform vec2 u_mouse;',
      'uniform vec3 u_c0; uniform vec3 u_c1; uniform vec3 u_c2; uniform vec3 u_c3;',
      'vec3 mod289(vec3 x){return x-floor(x*(1./289.))*289.;}',
      'vec2 mod289(vec2 x){return x-floor(x*(1./289.))*289.;}',
      'vec3 permute(vec3 x){return mod289(((x*34.)+1.)*x);}',
      'float snoise(vec2 v){',
      '  const vec4 C=vec4(.211324865405187,.366025403784439,-.577350269189626,.024390243902439);',
      '  vec2 i=floor(v+dot(v,C.yy)); vec2 x0=v-i+dot(i,C.xx);',
      '  vec2 i1=(x0.x>x0.y)?vec2(1.,0.):vec2(0.,1.);',
      '  vec4 x12=x0.xyxy+C.xxzz; x12.xy-=i1; i=mod289(i);',
      '  vec3 p=permute(permute(i.y+vec3(0.,i1.y,1.))+i.x+vec3(0.,i1.x,1.));',
      '  vec3 m=max(.5-vec3(dot(x0,x0),dot(x12.xy,x12.xy),dot(x12.zw,x12.zw)),0.); m=m*m; m=m*m;',
      '  vec3 x=2.*fract(p*C.www)-1.; vec3 h=abs(x)-.5; vec3 ox=floor(x+.5); vec3 a0=x-ox;',
      '  m*=1.79284291400159-.85373472095314*(a0*a0+h*h);',
      '  vec3 g; g.x=a0.x*x0.x+h.x*x0.y; g.yz=a0.yz*x12.xz+h.yz*x12.yw;',
      '  return 130.*dot(m,g);',
      '}',
      'float fbm(vec2 p){float f=0.,a=.5;for(int i=0;i<4;i++){f+=a*snoise(p);p*=2.03;a*=.5;}return f;}',
      'float height(vec2 p,float t){return fbm(p*.55+vec2(t*.03,-t*.02)+.5*fbm(p*.35-vec2(t*.015,0.)));}',
      'void main(){',
      '  vec2 uv=gl_FragCoord.xy/u_res; float asp=u_res.x/u_res.y; vec2 p=vec2(uv.x*asp,uv.y);',
      '  float e=.004; float h=height(p,u_t);',
      '  float hx=height(p+vec2(e,0.),u_t)-h; float hy=height(p+vec2(0.,e),u_t)-h;',
      '  vec3 n=normalize(vec3(-hx/e*.03,-hy/e*.03,1.));',
      '  vec2 m=vec2(u_mouse.x*asp,u_mouse.y);',
      '  vec3 L=normalize(vec3(m-p,.75));',
      '  float diff=clamp(dot(n,L),0.,1.);',
      '  float spec=pow(clamp(dot(n,normalize(L+vec3(0.,0.,1.))),0.,1.),70.);',
      '  float glow=exp(-2.2*length(m-p));',
      '  float k=clamp(h*.55+.5,0.,1.);',
      '  vec3 col=mix(u_c0,u_c1,smoothstep(.1,.9,k));',
      '  col=mix(col,u_c2,smoothstep(.55,1.,k)*.32);',
      '  col*=.8+.3*diff;',
      '  col+=u_c3*(spec*.18+glow*.2);',
      '  vec2 q=uv-.5; col*=1.-dot(q,q)*.85;',
      '  float g=fract(sin(dot(gl_FragCoord.xy+fract(u_t*7.)*91.,vec2(12.9898,78.233)))*43758.5453);',
      '  col+=(g-.5)*.04;',
      '  gl_FragColor=vec4(col,1.);',
      '}'
    ].join('\n');

    document.querySelectorAll('.lvh-shader[data-shader="stage"]').forEach(function (canvas) {
      var gl = canvas.getContext('webgl', { antialias: false, alpha: false, powerPreference: 'low-power' });
      if (!gl) return;
      var compile = function (type, src) {
        var s = gl.createShader(type); gl.shaderSource(s, src); gl.compileShader(s);
        return gl.getShaderParameter(s, gl.COMPILE_STATUS) ? s : null;
      };
      var vs = compile(gl.VERTEX_SHADER, 'attribute vec2 a;void main(){gl_Position=vec4(a,0.,1.);}');
      var fs = compile(gl.FRAGMENT_SHADER, STAGE_FS);
      if (!vs || !fs) return;
      var prog = gl.createProgram();
      gl.attachShader(prog, vs); gl.attachShader(prog, fs); gl.linkProgram(prog);
      if (!gl.getProgramParameter(prog, gl.LINK_STATUS)) return;
      gl.useProgram(prog);
      gl.bindBuffer(gl.ARRAY_BUFFER, gl.createBuffer());
      gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 3, -1, -1, 3]), gl.STATIC_DRAW); // one big triangle
      var loc = gl.getAttribLocation(prog, 'a');
      gl.enableVertexAttribArray(loc);
      gl.vertexAttribPointer(loc, 2, gl.FLOAT, false, 0, 0);

      var u = function (n) { return gl.getUniformLocation(prog, n); };
      gl.uniform3fv(u('u_c0'), [0.050, 0.049, 0.046]);  // near-black
      gl.uniform3fv(u('u_c1'), [0.150, 0.145, 0.137]);  // graphite
      gl.uniform3fv(u('u_c2'), [0.560, 0.540, 0.510]);  // warm silver
      gl.uniform3fv(u('u_c3'), [0.941, 0.553, 0.259]);  // brand orange light
      var uRes = u('u_res'), uT = u('u_t'), uMouse = u('u_mouse');

      // ponytail: half-res is plenty for a soft surface; raise the 0.5 if it looks mushy on 4K
      var resize = function () {
        var scale = 0.5 * Math.min(window.devicePixelRatio || 1, 1.5);
        canvas.width = Math.max(1, Math.round(canvas.clientWidth * scale));
        canvas.height = Math.max(1, Math.round(canvas.clientHeight * scale));
        gl.viewport(0, 0, canvas.width, canvas.height);
        gl.uniform2f(uRes, canvas.width, canvas.height);
      };
      // Pointer light, eased toward its target each frame (y is flipped for GL).
      var mx = 0.74, my = 0.62, tx = mx, ty = my;
      var stage = canvas.parentElement;
      if (!reduceMotion) {
        stage.addEventListener('pointermove', function (e) {
          var r = stage.getBoundingClientRect();
          tx = (e.clientX - r.left) / r.width; ty = 1 - (e.clientY - r.top) / r.height;
        });
        stage.addEventListener('pointerleave', function () { tx = 0.74; ty = 0.62; });
      }
      var draw = function (t) {
        mx += (tx - mx) * 0.06; my += (ty - my) * 0.06;
        gl.uniform2f(uMouse, mx, my); gl.uniform1f(uT, t);
        gl.drawArrays(gl.TRIANGLES, 0, 3);
      };
      resize(); draw(12);
      canvas.classList.add('is-ready');
      window.addEventListener('resize', function () { resize(); draw(12); });
      if (reduceMotion) return;

      var visible = false, raf = null, t0 = performance.now() - 12000;
      var loop = function (now) {
        draw((now - t0) / 1000);
        raf = visible && !document.hidden ? requestAnimationFrame(loop) : null;
      };
      var kick = function () { if (!raf && visible && !document.hidden) raf = requestAnimationFrame(loop); };
      new IntersectionObserver(function (e) { visible = e[0].isIntersecting; kick(); }).observe(canvas);
      document.addEventListener('visibilitychange', kick);
    });

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
       track. Screens drift inside their windows for depth. Elsewhere it
       is a native swipe track; the counter follows either way. */
    var reel = document.querySelector('.lvh-reel');
    if (reel) {
      var reelView = reel.querySelector('.lvh-reel__view');
      var track = reel.querySelector('.lvh-reel__track');
      var shots = Array.prototype.slice.call(track.children);
      var shotImgs = shots.map(function (s) { return s.querySelector('img'); });
      var reelN = reel.querySelector('.lvh-reel__n');
      var reelBar = reel.querySelector('.lvh-reel__bar i');
      var pinMQ = window.matchMedia('(min-width: 961px) and (hover: hover) and (pointer: fine)');
      var reelDist = 0, reelLast = -1, shotMid = [];
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
        shots.forEach(function (s, i) {
          var d = (shotMid[i] + x - innerWidth / 2) / innerWidth;
          shotImgs[i].style.transform = 'translate3d(' + (d * -5).toFixed(2) + '%,0,0) scale(1.12)';
        });
        reelCount(p);
      };
      var reelLayout = function () {
        var on = pinMQ.matches && !reduceMotion;
        reel.classList.toggle('is-pinned', on);
        track.style.transform = '';
        shotImgs.forEach(function (im) { im.style.transform = ''; });
        if (!on) { reel.style.height = ''; return; }
        reelDist = Math.max(0, track.scrollWidth - innerWidth);
        shotMid = shots.map(function (s) { return s.offsetLeft + s.offsetWidth / 2; });
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

    /* ---------- Problem: each issue drops you down the results ----------
       The step crossing 55% of the viewport sets your rank; rivals slide
       up past you (strong in-out, it's on-screen movement). */
    var board = document.querySelector('.lvh-board');
    var fallSteps = Array.prototype.slice.call(document.querySelectorAll('.lvh-fall__step'));
    if (board && fallSteps.length) {
      var rivals = Array.prototype.slice.call(board.querySelectorAll('.lvh-board__row:not(.is-you)'));
      var you = board.querySelector('.lvh-board__row.is-you');
      var youPos = you.querySelector('.lvh-board__pos');
      var youWhere = you.querySelector('.lvh-board__where');
      var pctEl = board.querySelector('.lvh-board__pct');
      var meter = board.querySelector('.lvh-board__meter i');
      var fallCur = -2, shownPct = 74, pctRaf = null;
      var setRank = function (rank, pct) {
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
        meter.style.transform = 'scaleX(' + pct / 100 + ')';
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
        var line = innerHeight * 0.55, on = -1;
        fallSteps.forEach(function (s, i) { if (s.getBoundingClientRect().top < line) on = i; });
        if (on === fallCur) return;
        fallCur = on;
        fallSteps.forEach(function (s, i) { s.classList.toggle('is-on', i === on); });
        if (on < 0) setRank(2, 74);
        else setRank(+fallSteps[on].dataset.rank, +fallSteps[on].dataset.pct);
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
        pkTX = e.clientX + (e.clientX > innerWidth * 0.55 ? -400 : 40);
        pkTY = e.clientY - 125;
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

    /* ---------- Web design: X-ray slider ----------
       A native range input drives the split (keyboard + touch for free).
       First view plays a short sweep; legend items reveal their box. */
    var xray = document.querySelector('.lvh-xray');
    if (xray) {
      var xv = xray.querySelector('.lvh-xray__view');
      var xr = xray.querySelector('.lvh-xray__range');
      var xNow = 100, xRaf = null;
      var setX = function (v) { xNow = v; xv.style.setProperty('--x', v.toFixed(2)); xr.value = v; };
      var sweep = function (to, ms) {
        cancelAnimationFrame(xRaf);
        if (reduceMotion) { setX(to); return; }
        var from = xNow, t0 = performance.now();
        var tick = function (now) {
          var t = Math.min(1, (now - t0) / ms);
          var e = t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2; // ease-in-out
          setX(from + (to - from) * e);
          if (t < 1) xRaf = requestAnimationFrame(tick);
        };
        xRaf = requestAnimationFrame(tick);
      };
      setX(100);
      xr.addEventListener('input', function () { cancelAnimationFrame(xRaf); setX(+xr.value); });
      once(xray, function () {
        setTimeout(function () {
          sweep(28, 1300);
          setTimeout(function () { if (+xr.value < 30) sweep(52, 900); }, 1450);
        }, 500);
      }, 0.5);
      xray.parentNode.querySelectorAll('.lvh-keys li').forEach(function (li) {
        var box = xray.querySelector('.lvh-bp[data-k="' + li.dataset.k + '"]');
        var hot = function (on) {
          li.classList.toggle('is-hot', on); box.classList.toggle('is-hot', on);
          if (on) { var left = parseFloat(box.style.getPropertyValue('--l')) || 0; if (xNow > left - 2) sweep(Math.max(0, left - 2), 600); }
        };
        li.addEventListener('pointerenter', function () { hot(true); });
        li.addEventListener('pointerleave', function () { hot(false); });
        li.addEventListener('click', function () { hot(true); setTimeout(function () { hot(false); }, 1600); });
      });
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

    /* ---------- Social: publish counter, in step with the CSS dots ---------- */
    var cal = document.querySelector('.lvh-cal');
    if (cal) {
      var calN = cal.querySelector('.lvh-cal__n');
      var calTotal = cal.querySelectorAll('.lvh-cal__post').length;
      if (reduceMotion || !root.classList.contains('lvh-js')) calN.textContent = calTotal;
      else once(cal, function () {
        for (var c = 1; c <= calTotal; c++) {
          (function (c) { setTimeout(function () { calN.textContent = c; }, 1400 + (c - 1) * 170 + 300); })(c);
        }
      }, 0.25);
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
