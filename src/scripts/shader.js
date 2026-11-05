/* Local Vocal — stage shader (every page)
   The moving relief background behind the homepage hero and every page's
   closing free-review section: <canvas class="lvh-shader" data-shader="stage">.
   Moved out of home.js so inner pages get the same CTA background. */
(function () {
  'use strict';
  // Start after load, when the main thread is idle: the canvas is decoration, first paint comes first
  function ready(fn) {
    var idle = function () { (window.requestIdleCallback || setTimeout)(fn, { timeout: 2000 }); };
    if (document.readyState === 'complete') idle();
    else window.addEventListener('load', idle);
  }
  ready(function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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
      // No GPU (SwiftShader, llvmpipe): fbm per pixel runs on the CPU and stalls the page; keep the CSS gradient
      var dbg = gl.getExtension('WEBGL_debug_renderer_info');
      if (dbg && /swiftshader|llvmpipe|software/i.test(gl.getParameter(dbg.UNMASKED_RENDERER_WEBGL))) {
        var lose = gl.getExtension('WEBGL_lose_context'); if (lose) lose.loseContext();
        return;
      }
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
  });
})();
