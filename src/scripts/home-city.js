/* Local Vocal — Local SEO section: WebGL city (ES module, lazy-loaded by home.js)

   A night-time block of Annapolis: procedural towers with lit windows,
   roads with a few slow cars. Your building is lit in the accent
   colour with a light beam and pulsing rings. HTML tags (rank numbers,
   "Your business", floating queries) are projected onto the pins.

   Rises in when the section reveals, orbits with scroll and leans with
   the pointer. Renders only while on screen; one still frame for
   reduced motion. */
import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.min.js';

// Layout, shared with the ground shader: a 6x6 grid of blocks split by roads
const BLOCK = 2.4, ROAD = 0.6, PITCH = BLOCK + ROAD, N = 6;
const SPAN = N * PITCH - ROAD, HALF = SPAN / 2;
const BG = new THREE.Color('#0e0e0d');
const ACCENT = new THREE.Color('#ff8a3d');

// Seeded random so the skyline is the same on every visit
let seed = 7;
const rand = () => ((seed = (seed * 16807) % 2147483647) - 1) / 2147483646;

export default function initCity(root) {
  const canvas = root.querySelector('.lvh-city');
  const tags = Array.from(root.querySelectorAll('.lvh-city__tag'));
  const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

  let renderer;
  try {
    renderer = new THREE.WebGLRenderer({ canvas, antialias: true, powerPreference: 'high-performance' });
  } catch (e) { return; } // no WebGL: the CSS city stays
  renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
  renderer.setClearColor(BG, 1);

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(30, 1, 0.1, 100);
  const uni = { uTime: { value: 0 }, uRise: { value: reduceMotion ? 1 : 0 }, uBg: { value: BG }, uAccent: { value: ACCENT } };

  /* ---------- Ground: asphalt, sidewalks, lane dashes, park ---------- */
  const ground = new THREE.Mesh(
    new THREE.PlaneGeometry(60, 60).rotateX(-Math.PI / 2),
    new THREE.ShaderMaterial({
      uniforms: uni,
      vertexShader: `varying vec3 vW; void main(){ vec4 w = modelMatrix * vec4(position,1.); vW = w.xyz; gl_Position = projectionMatrix * viewMatrix * w; }`,
      fragmentShader: `
        uniform float uTime; uniform vec3 uBg;
        varying vec3 vW;
        void main(){
          vec2 q = vW.xz + ${HALF.toFixed(2)};
          vec2 cell = floor(q / ${PITCH.toFixed(2)});
          vec2 l = mod(q, ${PITCH.toFixed(2)});
          bool inCity = q.x > -0.3 && q.y > -0.3 && q.x < ${(SPAN + 0.3).toFixed(2)} && q.y < ${(SPAN + 0.3).toFixed(2)};
          vec3 c = vec3(0.075, 0.072, 0.068);                                   // outskirts
          if (inCity) {
            bool rx = l.x > ${BLOCK.toFixed(2)}, ry = l.y > ${BLOCK.toFixed(2)};
            c = vec3(0.13, 0.125, 0.118);                                        // sidewalk / lot
            if (cell == vec2(1., 3.)) c = vec3(0.075, 0.11, 0.08);               // park
            if (rx || ry) {
              c = vec3(0.055, 0.054, 0.052);                                     // asphalt
              float lane = rx ? abs(l.x - ${(BLOCK + ROAD / 2).toFixed(2)}) : abs(l.y - ${(BLOCK + ROAD / 2).toFixed(2)});
              float along = rx ? q.y : q.x;
              float dash = step(lane, 0.012) * step(0.5, fract(along * 2.2));
              if (!(rx && ry)) c += vec3(0.22, 0.2, 0.16) * dash;
            }
          }
          float fade = smoothstep(17., 7., length(vW.xz));                       // dissolve into the dark
          gl_FragColor = vec4(mix(uBg, c, fade), 1.);
        }`,
    })
  );
  scene.add(ground);

  /* ---------- Buildings: one instanced box, windows drawn in the shader ---------- */
  const lots = [];
  for (let i = 0; i < N; i++) for (let j = 0; j < N; j++) {
    if (i === 1 && j === 3) continue; // park
    const x0 = -HALF + i * PITCH, z0 = -HALF + j * PITCH;
    const merge = rand() < 0.22;
    const subs = merge ? [[0, 0, 2, 2]] : [[0, 0, 1, 1], [1, 0, 1, 1], [0, 1, 1, 1], [1, 1, 1, 1]];
    subs.forEach(([a, b, w, d]) => {
      const lot = (BLOCK - 0.3) / 2;
      const cx = x0 + 0.1 + (a + w / 2) * (lot + 0.1), cz = z0 + 0.1 + (b + d / 2) * (lot + 0.1);
      const fw = (w * lot + (w - 1) * 0.1) * (0.66 + rand() * 0.3), fd = (d * lot + (d - 1) * 0.1) * (0.66 + rand() * 0.3);
      const down = Math.exp(-((cx + 1.5) ** 2 + (cz + 1.5) ** 2) / 16);
      const h = 0.35 + rand() * 0.8 + down * (1.4 + rand() * 3.2) + (merge ? 0.4 : 0);
      lots.push({ x: cx, z: cz, w: fw, d: fd, h, y: 0, hi: 0 });
      // Tall towers step back into a crown
      if (h > 2.4 && rand() < 0.65) lots.push({ x: cx, z: cz, w: fw * 0.62, d: fd * 0.62, h: 0.35 + rand() * 0.9, y: h, hi: 0 });
    });
  }
  // Your business: a mid-height tower near the middle; three rivals around it
  const bases = lots.filter((l) => !l.y);
  const near = (x, z) => bases.reduce((b, l) => (Math.hypot(l.x - x, l.z - z) < Math.hypot(b.x - x, b.z - z) ? l : b));
  const topOf = (t) => lots.reduce((h, l) => (l.x === t.x && l.z === t.z ? Math.max(h, l.y + l.h) : h), 0);
  const you = near(1.6, 0.2);
  you.h = 3.6; you.hi = 1;
  for (let i = lots.length - 1; i >= 0; i--) if (lots[i].y && lots[i].x === you.x && lots[i].z === you.z) lots.splice(i, 1); // no crown on yours
  const rivals = [near(-3.2, 3.4), near(3.6, -3.8), near(-1.4, -1.8)];

  const box = new THREE.BoxGeometry(1, 1, 1).translate(0, 0.5, 0);
  const towers = new THREE.InstancedMesh(box, new THREE.ShaderMaterial({
    uniforms: uni,
    vertexShader: `
      attribute float aSeed; attribute float aHi;
      uniform float uRise;
      varying vec3 vW; varying vec3 vN; varying vec3 vL; varying vec3 vS; varying float vSeed; varying float vHi; varying float vTop;
      void main(){
        vec3 base = (instanceMatrix * vec4(0., 0., 0., 1.)).xyz;
        float r = clamp(uRise * 1.8 - length(base.xz) * 0.07, 0., 1.);
        r = 1. - pow(1. - r, 3.);                                  // ease-out per tower, centre first
        vec4 w = modelMatrix * instanceMatrix * vec4(position, 1.);
        w.y *= r;                                                  // crowns ride up with their tower
        vW = w.xyz; vL = position; vSeed = aSeed; vHi = aHi;
        vS = vec3(length(instanceMatrix[0].xyz), length(instanceMatrix[1].xyz), length(instanceMatrix[2].xyz));
        vN = normalize(mat3(modelMatrix) * mat3(instanceMatrix) * normal);
        vTop = (instanceMatrix * vec4(0., 1., 0., 1.)).y * r;
        gl_Position = projectionMatrix * viewMatrix * w;
      }`,
    fragmentShader: `
      uniform float uTime; uniform vec3 uBg; uniform vec3 uAccent;
      varying vec3 vW; varying vec3 vN; varying vec3 vL; varying vec3 vS; varying float vSeed; varying float vHi; varying float vTop;
      float hash(vec2 p){ return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453); }
      void main(){
        vec3 L = normalize(vec3(-0.5, 0.9, 0.35));
        float diff = max(dot(vN, L), 0.) * 0.6 + 0.4;
        vec3 body = mix(vec3(0.16, 0.15, 0.14), uAccent * 0.55, vHi);
        vec3 c = body * diff;
        if (vN.y > 0.5) {                                          // roof: parapet rim, darker deck
          vec2 e = (0.5 - abs(vL.xz)) * vS.xz;
          float rim = step(min(e.x, e.y), 0.035);
          c = mix(vec3(0.105, 0.1, 0.095), vec3(0.26, 0.245, 0.225), rim);
          c += (hash(floor(vL.xz * vS.xz * 6.) + vSeed) - 0.5) * 0.015;
          c = mix(c, mix(uAccent * 0.5, uAccent * 1.1, rim), vHi);
        } else {                                                   // facade: windows fitted to each face
          float W = abs(vN.x) > 0.5 ? vS.z : vS.x;
          float u = (abs(vN.x) > 0.5 ? vL.z : vL.x) * W + W * 0.5;
          float cols = max(1., floor(W / 0.15));
          vec2 g = vec2(u / W * cols, vW.y / 0.2);
          vec2 id = floor(g), f = fract(g);
          float win = step(0.2, f.x) * step(f.x, 0.8) * step(0.3, f.y) * step(f.y, 0.8) * step(0.15, vW.y) * step(vW.y, vTop - 0.08);
          float h = hash(id + vSeed * 17. + vN.xz * 3.);
          float lit = step(0.7 - vHi * 0.6, h);
          float flick = 0.85 + 0.15 * sin(uTime * (0.5 + h * 2.) + h * 40.);
          vec3 warm = vec3(1.0, 0.72, 0.42), cool = vec3(0.62, 0.74, 1.0);
          vec3 wc = mix(warm, cool, step(0.82, hash(id.yx + vSeed))) * (0.7 + h * 0.5);
          wc = mix(wc, vec3(1.0, 0.78, 0.5) * 1.3, vHi);
          c = mix(c, c * 0.55, win);                               // unlit glass
          c += win * lit * wc * flick * 0.9;
          c *= mix(0.55, 1., smoothstep(0., 1.2, vW.y));           // ground occlusion
          c += vHi * uAccent * 0.25 * smoothstep(0.4, 0., abs(fract(vW.y * 0.4 - uTime * 0.35) - 0.5)); // scan band
          c += smoothstep(0.035, 0., min(u, W - u)) * 0.07;        // lit corners
          c += smoothstep(0.05, 0., vTop - vW.y) * 0.06;           // cornice
        }
        float fade = smoothstep(17., 7., length(vW.xz));
        gl_FragColor = vec4(mix(uBg, c, fade), 1.);
      }`,
  }), lots.length);
  const m = new THREE.Matrix4();
  const seeds = new Float32Array(lots.length), his = new Float32Array(lots.length);
  lots.forEach((l, i) => {
    m.makeScale(l.w, l.h, l.d).setPosition(l.x, l.y, l.z);
    towers.setMatrixAt(i, m);
    seeds[i] = rand(); his[i] = l.hi;
  });
  box.setAttribute('aSeed', new THREE.InstancedBufferAttribute(seeds, 1));
  box.setAttribute('aHi', new THREE.InstancedBufferAttribute(his, 1));
  scene.add(towers);

  /* ---------- Park trees ---------- */
  const trees = new THREE.InstancedMesh(new THREE.ConeGeometry(0.16, 0.42, 6).translate(0, 0.21, 0), new THREE.MeshBasicMaterial({ color: '#1f3326' }), 14);
  for (let t = 0; t < 14; t++) {
    m.makeScale(1, 0.7 + rand() * 0.6, 1).setPosition(-HALF + PITCH + 0.25 + rand() * (BLOCK - 0.5), 0, -HALF + 3 * PITCH + 0.25 + rand() * (BLOCK - 0.5));
    trees.setMatrixAt(t, m);
  }
  scene.add(trees);

  /* ---------- Traffic: a few cars cruising slowly (kept calm on purpose) ---------- */
  const CARS = 4;
  const cars = new THREE.InstancedMesh(new THREE.BoxGeometry(0.09, 0.04, 0.05), new THREE.MeshBasicMaterial(), CARS);
  const carData = [];
  for (let c = 0; c < CARS; c++) {
    const k = 1 + Math.floor(rand() * (N - 1));
    const lane = (rand() < 0.5 ? -1 : 1) * 0.12;
    carData.push({ alongX: rand() < 0.5, line: -HALF + k * PITCH - ROAD / 2 + lane, dir: lane > 0 ? 1 : -1, t: rand(), v: 0.0035 + rand() * 0.002 });
    cars.setColorAt(c, new THREE.Color(lane > 0 ? '#fff4dc' : '#ff4a3a'));
  }
  scene.add(cars);
  const moveCars = (dt) => {
    carData.forEach((c, i) => {
      c.t = (c.t + c.v * dt * c.dir + 1) % 1;
      const s = -HALF - 1 + c.t * (SPAN + 2);
      const x = c.alongX ? s : c.line, z = c.alongX ? c.line : s;
      m.makeRotationY(c.alongX ? 0 : Math.PI / 2).setPosition(x, 0.03, z);
      cars.setMatrixAt(i, m);
    });
    cars.instanceMatrix.needsUpdate = true;
  };
  moveCars(0);

  /* ---------- Your pin: beam, rings, glow, floating marker ---------- */
  const glowTex = (() => {
    const c = document.createElement('canvas'); c.width = c.height = 128;
    const g = c.getContext('2d'), r = g.createRadialGradient(64, 64, 0, 64, 64, 64);
    r.addColorStop(0, 'rgba(255,255,255,1)'); r.addColorStop(0.25, 'rgba(255,255,255,0.45)'); r.addColorStop(1, 'rgba(255,255,255,0)');
    g.fillStyle = r; g.fillRect(0, 0, 128, 128);
    return new THREE.CanvasTexture(c);
  })();
  const add = { transparent: true, depthWrite: false, blending: THREE.AdditiveBlending };
  const pinTop = new THREE.Vector3(you.x, you.h + 0.9, you.z);

  const beam = new THREE.Mesh(
    new THREE.CylinderGeometry(0.22, 0.5, 9, 32, 1, true).translate(0, 4.5, 0),
    new THREE.ShaderMaterial({
      uniforms: uni, side: THREE.DoubleSide, ...add,
      vertexShader: `varying vec2 vUv; void main(){ vUv = uv; gl_Position = projectionMatrix * modelViewMatrix * vec4(position,1.); }`,
      fragmentShader: `uniform float uTime; uniform float uRise; uniform vec3 uAccent; varying vec2 vUv;
        void main(){ float a = pow(1. - vUv.y, 2.2) * (0.55 + 0.1 * sin(uTime * 2.)) * smoothstep(0.6, 1., uRise);
          a *= 0.6 + 0.4 * smoothstep(0., 0.5, abs(fract(vUv.x * 3. + uTime * 0.1) - 0.5) * 2.);
          gl_FragColor = vec4(uAccent * a, a); }`,
    })
  );
  beam.position.set(you.x, you.h, you.z);
  scene.add(beam);

  const rings = [0, 1, 2].map((k) => {
    const r = new THREE.Mesh(new THREE.RingGeometry(0.92, 1, 64).rotateX(-Math.PI / 2), new THREE.MeshBasicMaterial({ color: ACCENT, ...add }));
    r.position.set(you.x, 0.02, you.z); r.userData.k = k;
    scene.add(r); return r;
  });

  const glow = new THREE.Sprite(new THREE.SpriteMaterial({ map: glowTex, color: ACCENT, ...add }));
  glow.scale.set(2.2, 2.2, 1); glow.position.copy(pinTop);
  const floor = new THREE.Sprite(new THREE.SpriteMaterial({ map: glowTex, color: ACCENT, opacity: 0.55, ...add }));
  floor.scale.set(5, 5, 1); floor.position.set(you.x, 0.05, you.z);
  scene.add(glow, floor);

  const marker = new THREE.Group();
  const head = new THREE.Mesh(new THREE.SphereGeometry(0.2, 32, 16), new THREE.MeshBasicMaterial({ color: '#ffb27a' }));
  const tip = new THREE.Mesh(new THREE.ConeGeometry(0.13, 0.34, 24).rotateX(Math.PI).translate(0, -0.22, 0), new THREE.MeshBasicMaterial({ color: ACCENT }));
  marker.add(head, tip); marker.position.copy(pinTop);
  scene.add(marker);

  // Rival pins: small pale markers on their roofs
  const rivalTops = rivals.map((l) => {
    const top = new THREE.Vector3(l.x, topOf(l) + 0.45, l.z);
    const p = new THREE.Mesh(new THREE.SphereGeometry(0.09, 16, 8), new THREE.MeshBasicMaterial({ color: '#e9e5dd' }));
    const s = new THREE.Mesh(new THREE.CylinderGeometry(0.012, 0.012, 0.45).translate(0, -0.22, 0), new THREE.MeshBasicMaterial({ color: '#e9e5dd', transparent: true, opacity: 0.6 }));
    p.position.copy(top); s.position.copy(top);
    scene.add(p, s);
    return top;
  });

  /* ---------- Camera, input, sizing ---------- */
  let progress = 0.5, px = 0, py = 0, tx = 0, ty = 0;
  const target = new THREE.Vector3(0.6, 0.4, 0);
  const place = (t) => {
    px += (tx - px) * 0.05; py += (ty - py) * 0.05;
    const az = -0.95 + (progress - 0.5) * 0.7 + (reduceMotion ? 0 : Math.sin(t * 0.07) * 0.05) + px * 0.12;
    const el = 0.8 + py * 0.06;
    const r = root.clientWidth < 640 ? 46 : 39;
    camera.position.set(target.x + Math.cos(az) * Math.cos(el) * r, target.y + Math.sin(el) * r, target.z + Math.sin(az) * Math.cos(el) * r);
    camera.lookAt(target);
  };
  root.addEventListener('pointermove', (e) => {
    const b = root.getBoundingClientRect();
    tx = (e.clientX - b.left) / b.width * 2 - 1; ty = (e.clientY - b.top) / b.height * 2 - 1;
  });
  root.addEventListener('pointerleave', () => { tx = ty = 0; });
  const size = () => {
    const w = canvas.clientWidth, h = canvas.clientHeight;
    if (!w || !h) return;
    renderer.setSize(w, h, false);
    camera.aspect = w / h;
    camera.setViewOffset(w, h, w < 640 ? 0 : -w * 0.06, h * (w < 640 ? 0.17 : 0.04), w, h); // nudge the city off the pack card
    camera.updateProjectionMatrix();
  };
  new ResizeObserver(size).observe(canvas);
  size();

  // Project the HTML tags onto the pins
  const anchors = [pinTop, ...rivalTops];
  const v = new THREE.Vector3();
  const placeTags = () => {
    const w = canvas.clientWidth, h = canvas.clientHeight;
    tags.forEach((tag, i) => {
      v.copy(anchors[+tag.dataset.pin] || anchors[i]).project(camera);
      tag.style.transform = `translate3d(${((v.x + 1) / 2 * w).toFixed(1)}px, ${((1 - v.y) / 2 * h).toFixed(1)}px, 0)`;
    });
  };

  /* ---------- Loop ---------- */
  let running = false, last = 0, riseStart = null, raf = null;
  const frame = (now) => {
    const t = now / 1000, dt = Math.min(0.05, t - (last || t)); last = t;
    uni.uTime.value = t;
    if (root.classList.contains('is-in') && riseStart === null) riseStart = t;
    if (riseStart !== null && uni.uRise.value < 1) uni.uRise.value = Math.min(1, (t - riseStart) / 2.4);
    const r = root.getBoundingClientRect();
    progress = Math.min(1, Math.max(0, (innerHeight - r.top) / (innerHeight + r.height)));
    moveCars(dt * 10);
    rings.forEach((ring) => {
      const p = (t * 0.45 + ring.userData.k / 3) % 1;
      ring.scale.setScalar(0.4 + p * 2.6);
      ring.material.opacity = (1 - p) * 0.7 * uni.uRise.value;
    });
    marker.position.y = pinTop.y + Math.sin(t * 1.6) * 0.12;
    marker.rotation.y = t * 0.8;
    glow.material.opacity = (0.75 + Math.sin(t * 2) * 0.15) * uni.uRise.value;
    place(t);
    renderer.render(scene, camera);
    placeTags();
    raf = running ? requestAnimationFrame(frame) : null;
  };
  const start = () => { if (!running) { running = true; last = 0; raf = requestAnimationFrame(frame); } };
  const stop = () => { running = false; };

  root.classList.add('is-3d');
  if (reduceMotion) {
    uni.uRise.value = 1;
    const still = () => { place(0); renderer.render(scene, camera); placeTags(); };
    still(); new ResizeObserver(still).observe(canvas);
    return;
  }
  let onScreen = false;
  new IntersectionObserver((e) => { onScreen = e[0].isIntersecting; onScreen ? start() : stop(); }, { rootMargin: '100px' }).observe(root);
  document.addEventListener('visibilitychange', () => (document.hidden ? stop() : onScreen && start()));
}
