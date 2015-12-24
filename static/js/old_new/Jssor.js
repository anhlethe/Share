/**
 * Created by LeThinh on 6/22/2015.
 */
(function (g, e, b, i, c, h, j) { /*! Jssor */
    new (function () {
    });
    var d = {
        Pc: function (a) {
            return - b.cos(a * b.PI) / 2 + 0.5
        },
        kd: function (a) {
            return a
        },
        od: function (a) {
            return - a * (a - 2)
        }
    };
    var a = new function () {
        var f = this,
            xb = /\S+/g,
            T = 1,
            fb = 2,
            kb = 3,
            jb = 4,
            ob = 5,
            L,
            s = 0,
            l = 0,
            p = 0,
            A = 0,
            B = navigator,
            tb = B.appName,
            k = B.userAgent,
            z;
        function Eb() {
            if (!L) {
                L = {
                    Rd: 'ontouchstart' in g || 'createTouch' in e
                };
                var a;
                if (B.pointerEnabled || (a = B.msPointerEnabled)) L.Qc = a ? 'msTouchAction' : 'touchAction'
            }
            return L
        }
        function v(i) {
            if (!s) {
                s = - 1;
                if (tb == 'Microsoft Internet Explorer' && !!g.attachEvent && !!g.ActiveXObject) {
                    var f = k.indexOf('MSIE');
                    s = T;
                    p = n(k.substring(f + 5, k.indexOf(';', f))); /*@cc_on@*/
                    l = e.documentMode || p
                } else if (tb == 'Netscape' && !!g.addEventListener) {
                    var d = k.indexOf('Firefox'),
                        b = k.indexOf('Safari'),
                        h = k.indexOf('Chrome'),
                        c = k.indexOf('AppleWebKit');
                    if (d >= 0) {
                        s = fb;
                        l = n(k.substring(d + 8))
                    } else if (b >= 0) {
                        var j = k.substring(0, b).lastIndexOf('/');
                        s = h >= 0 ? jb : kb;
                        l = n(k.substring(j + 1, b))
                    } else {
                        var a = /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(k);
                        if (a) {
                            s = T;
                            l = p = n(a[1])
                        }
                    }
                    if (c >= 0) A = n(k.substring(c + 12))
                } else {
                    var a = /(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(k);
                    if (a) {
                        s = ob;
                        l = n(a[2])
                    }
                }
            }
            return i == s
        }
        function q() {
            return v(T)
        }
        function O() {
            return q() && (l < 6 || e.compatMode == 'BackCompat')
        }
        function ib() {
            return v(kb)
        }
        function hb() {
            return v(jb)
        }
        function nb() {
            return v(ob)
        }
        function M() {
            return q() && l < 9
        }
        function t(a) {
            if (!z) {
                m(['transform',
                    'WebkitTransform',
                    'msTransform',
                    'MozTransform',
                    'OTransform'], function (b) {
                    if (a.style[b] != j) {
                        z = b;
                        return c
                    }
                });
                z = z || 'transform'
            }
            return z
        }
        function sb(a) {
            return {
            }.toString.call(a)
        }
        var K;
        function Cb() {
            if (!K) {
                K = {
                };
                m(['Boolean',
                    'Number',
                    'String',
                    'Function',
                    'Array',
                    'Date',
                    'RegExp',
                    'Object'], function (a) {
                    K['[object ' + a + ']'] = a.toLowerCase()
                })
            }
            return K
        }
        function m(a, d) {
            if (sb(a) == '[object Array]') {
                for (var b = 0; b < a.length; b++) if (d(a[b], b, a)) return c
            } else for (var e in a) if (d(a[e], e, a)) return c
        }
        function D(a) {
            return a == i ? String(a)  : Cb() [sb(a)] || 'object'
        }
        function qb(a) {
            for (var b in a) return c
        }
        function G(a) {
            try {
                return D(a) == 'object' && !a.nodeType && a != a.window && (!a.constructor || {
                    }.hasOwnProperty.call(a.constructor.prototype, 'isPrototypeOf'))
            } catch (b) {
            }
        }
        function vb(b, a) {
            setTimeout(b, a || 0)
        }
        function I(b, d, c) {
            var a = !b || b == 'inherit' ? '' : b;
            m(d, function (c) {
                var b = c.exec(a);
                if (b) {
                    var d = a.substr(0, b.index),
                        e = a.substr(b.lastIndex + 1, a.length - (b.lastIndex + 1));
                    a = d + e
                }
            });
            a = c + (a.indexOf(' ') != 0 ? ' ' : '') + a;
            return a
        }
        function eb(b, a) {
            if (l < 9) b.style.filter = a
        }
        f.Md = Eb;
        f.Sc = q;
        f.he = ib;
        f.ue = hb;
        f.Hc = M;
        f.Ec = function () {
            return l
        };
        f.Gc = function () {
            v();
            return A
        };
        f.S = vb;
        function W(a) {
            a.constructor === W.caller && a.Lc && a.Lc.apply(a, W.caller.arguments)
        }
        f.Lc = W;
        f.U = function (a) {
            if (f.Ud(a)) a = e.getElementById(a);
            return a
        };
        function r(a) {
            return a || g.event
        }
        f.Kc = r;
        f.Fb = function (a) {
            a = r(a);
            return a.target || a.srcElement || e
        };
        f.Mc = function (a) {
            a = r(a);
            return {
                x: a.pageX || a.clientX || 0,
                y: a.pageY || a.clientY || 0
            }
        };
        function E(c, d, a) {
            if (a != j) c.style[d] = a;
            else {
                var b = c.currentStyle || c.style;
                a = b[d];
                if (a == '' && g.getComputedStyle) {
                    b = c.ownerDocument.defaultView.getComputedStyle(c, i);
                    b && (a = b.getPropertyValue(d) || b[d])
                }
                return a
            }
        }
        function Y(b, c, a, d) {
            if (a != j) {
                d && (a += 'px');
                E(b, c, a)
            } else return n(E(b, c))
        }
        function o(d, a) {
            var b = a & 2,
                c = a ? Y : E;
            return function (e, a) {
                return c(e, d, a, b)
            }
        }
        function Ab(b) {
            if (q() && p < 9) {
                var a = /opacity=([^)]*)/.exec(b.style.filter || '');
                return a ? n(a[1]) / 100 : 1
            } else return n(b.style.opacity || '1')
        }
        function Bb(c, a, f) {
            if (q() && p < 9) {
                var h = c.style.filter || '',
                    i = new RegExp(/[\s]*alpha\([^\)]*\)/g),
                    e = b.round(100 * a),
                    d = '';
                if (e < 100 || f) d = 'alpha(opacity=' + e + ') ';
                var g = I(h, [
                    i
                ], d);
                eb(c, g)
            } else c.style.opacity = a == 1 ? '' : b.round(a * 100) / 100
        }
        f.Wd = function (b, c) {
            var a = t(b);
            if (a) b.style[a + 'Origin'] = c
        };
        f.Xd = function (a, c) {
            if (q() && p < 9 || p < 10 && O()) a.style.zoom = c == 1 ? '' : c;
            else {
                var b = t(a);
                if (b) {
                    var f = 'scale(' + c + ')',
                        e = a.style[b],
                        g = new RegExp(/[\s]*scale\(.*?\)/g),
                        d = I(e, [
                            g
                        ], f);
                    a.style[b] = d
                }
            }
        };
        f.Yd = function (a) {
            if (!a.style[t(a)] || a.style[t(a)] == 'none') a.style[t(a)] = 'perspective(2000px)'
        };
        var mb = 0,
            gb = 0;
        f.dd = function (b, a) {
            return M() ? function () {
                var g = c,
                    d = O() ? b.document.body : b.document.documentElement;
                if (d) {
                    var f = d.offsetWidth - mb,
                        e = d.offsetHeight - gb;
                    if (f || e) {
                        mb += f;
                        gb += e
                    } else g = h
                }
                g && a()
            }
                : a
        };
        f.Ob = function (b, a) {
            return function (c) {
                c = r(c);
                var e = c.type,
                    d = c.relatedTarget || (e == 'mouseout' ? c.toElement : c.fromElement);
                (!d || d !== a && !f.Hd(a, d)) && b(c)
            }
        };
        f.a = function (a, c, d, b) {
            a = f.U(a);
            if (a.addEventListener) {
                c == 'mousewheel' && a.addEventListener('DOMMouseScroll', d, b);
                a.addEventListener(c, d, b)
            } else if (a.attachEvent) {
                a.attachEvent('on' + c, d);
                b && a.setCapture && a.setCapture()
            }
        };
        f.A = function (a, c, d, b) {
            a = f.U(a);
            if (a.removeEventListener) {
                c == 'mousewheel' && a.removeEventListener('DOMMouseScroll', d, b);
                a.removeEventListener(c, d, b)
            } else if (a.detachEvent) {
                a.detachEvent('on' + c, d);
                b && a.releaseCapture && a.releaseCapture()
            }
        };
        f.nb = function (a) {
            a = r(a);
            a.preventDefault && a.preventDefault();
            a.cancel = c;
            a.returnValue = h
        };
        f.Cd = function (a) {
            a = r(a);
            a.stopPropagation && a.stopPropagation();
            a.cancelBubble = c
        };
        f.G = function (d, c) {
            var a = [
                ].slice.call(arguments, 2),
                b = function () {
                    var b = a.concat([].slice.call(arguments, 0));
                    return c.apply(d, b)
                };
            return b
        };
        f.Dd = function (a, b) {
            if (b == j) return a.textContent || a.innerText;
            var c = e.createTextNode(b);
            f.Jb(a);
            a.appendChild(c)
        };
        f.T = function (d, c) {
            for (var b = [
            ], a = d.firstChild; a; a = a.nextSibling) (c || a.nodeType == 1) && b.push(a);
            return b
        };
        function rb(a, c, e, b) {
            b = b || 'u';
            for (a = a ? a.firstChild : i; a; a = a.nextSibling) if (a.nodeType == 1) {
                if (S(a, b) == c) return a;
                if (!e) {
                    var d = rb(a, c, e, b);
                    if (d) return d
                }
            }
        }
        f.r = rb;
        function Q(a, d, f, b) {
            b = b || 'u';
            var c = [
            ];
            for (a = a ? a.firstChild : i; a; a = a.nextSibling) if (a.nodeType == 1) {
                S(a, b) == d && c.push(a);
                if (!f) {
                    var e = Q(a, d, f, b);
                    if (e.length) c = c.concat(e)
                }
            }
            return c
        }
        function lb(a, c, d) {
            for (a = a ? a.firstChild : i; a; a = a.nextSibling) if (a.nodeType == 1) {
                if (a.tagName == c) return a;
                if (!d) {
                    var b = lb(a, c, d);
                    if (b) return b
                }
            }
        }
        f.re = lb;
        f.te = function (b, a) {
            return b.getElementsByTagName(a)
        };
        function C() {
            var e = arguments,
                d,
                c,
                b,
                a,
                g = 1 & e[0],
                f = 1 + g;
            d = e[f - 1] || {
            };
            for (; f < e.length; f++) if (c = e[f]) for (b in c) {
                a = c[b];
                if (a !== j) {
                    a = c[b];
                    d[b] = g && G(d[b]) ? C(g, {
                    }, a)  : a
                }
            }
            return d
        }
        f.C = C;
        function X(f, g) {
            var d = {
                },
                c,
                a,
                b;
            for (c in f) {
                a = f[c];
                b = g[c];
                if (a !== b) {
                    var e;
                    if (G(a) && G(b)) {
                        a = X(b);
                        e = !qb(a)
                    }
                    !e && (d[c] = a)
                }
            }
            return d
        }
        f.qe = function (a) {
            return D(a) == 'function'
        };
        f.Ud = function (a) {
            return D(a) == 'string'
        };
        f.we = function (a) {
            return !isNaN(n(a)) && isFinite(a)
        };
        f.i = m;
        function P(a) {
            return e.createElement(a)
        }
        f.eb = function () {
            return P('DIV')
        };
        f.ge = function () {
            return P('SPAN')
        };
        f.lc = function () {
        };
        function U(b, c, a) {
            if (a == j) return b.getAttribute(c);
            b.setAttribute(c, a)
        }
        function S(a, b) {
            return U(a, b) || U(a, 'data-' + b)
        }
        f.I = U;
        f.t = S;
        function w(b, a) {
            if (a == j) return b.className;
            b.className = a
        }
        f.xc = w;
        function ub(b) {
            var a = {
            };
            m(b, function (b) {
                a[b] = b
            });
            return a
        }
        function wb(b, a) {
            return b.match(a || xb)
        }
        function N(b, a) {
            return ub(wb(b || '', a))
        }
        f.ee = wb;
        function Z(b, c) {
            var a = '';
            m(c, function (c) {
                a && (a += b);
                a += c
            });
            return a
        }
        function H(a, c, b) {
            w(a, Z(' ', C(X(N(w(a)), N(c)), N(b))))
        }
        f.yb = function (a) {
            return a.parentNode
        };
        f.J = function (a) {
            f.D(a, 'none')
        };
        f.E = function (a, b) {
            f.D(a, b ? 'none' : '')
        };
        f.tc = function (b, a) {
            b.removeAttribute(a)
        };
        f.ie = function () {
            return q() && l < 10
        };
        f.je = function (d, c) {
            if (c) d.style.clip = 'rect(' + b.round(c.f) + 'px ' + b.round(c.j) + 'px ' + b.round(c.k) + 'px ' + b.round(c.c) + 'px)';
            else {
                var g = d.style.cssText,
                    f = [
                        new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),
                        new RegExp(/[\s]*cliptop: .*?[;]?/i),
                        new RegExp(/[\s]*clipright: .*?[;]?/i),
                        new RegExp(/[\s]*clipbottom: .*?[;]?/i),
                        new RegExp(/[\s]*clipleft: .*?[;]?/i)
                    ],
                    e = I(g, f, '');
                a.xb(d, e)
            }
        };
        f.L = function () {
            return + new Date
        };
        f.H = function (b, a) {
            b.appendChild(a)
        };
        f.vb = function (b, a, c) {
            (c || a.parentNode).insertBefore(b, a)
        };
        f.rb = function (a, b) {
            (b || a.parentNode).removeChild(a)
        };
        f.Zc = function (a, b) {
            m(a, function (a) {
                f.rb(a, b)
            })
        };
        f.Jb = function (a) {
            f.Zc(f.T(a, c), a)
        };
        var n = parseFloat;
        f.ud = n;
        f.Hd = function (b, a) {
            var c = e.body;
            while (a && b !== a && c !== a) try {
                a = a.parentNode
            } catch (d) {
                return h
            }
            return b === a
        };
        function V(d, c, b) {
            var a = d.cloneNode(!c);
            !b && f.tc(a, 'id');
            return a
        }
        f.db = V;
        f.X = function (e, g) {
            var a = new Image;
            function b(e, c) {
                f.A(a, 'load', b);
                f.A(a, 'abort', d);
                f.A(a, 'error', d);
                g && g(a, c)
            }
            function d(a) {
                b(a, c)
            }
            if (nb() && l < 11.6 || !e) b(!e);
            else {
                f.a(a, 'load', b);
                f.a(a, 'abort', d);
                f.a(a, 'error', d);
                a.src = e
            }
        };
        f.td = function (d, a, e) {
            var c = d.length + 1;
            function b(b) {
                c--;
                if (a && b && b.src == a.src) a = b;
                !c && e && e(a)
            }
            m(d, function (a) {
                f.X(a.src, b)
            });
            b()
        };
        f.rd = function (b, g, i, h) {
            if (h) b = V(b);
            var c = Q(b, g);
            if (!c.length) c = a.te(b, g);
            for (var f = c.length - 1; f > - 1; f--) {
                var d = c[f],
                    e = V(i);
                w(e, w(d));
                a.xb(e, d.style.cssText);
                a.vb(e, d);
                a.rb(d)
            }
            return b
        };
        function Db(b) {
            var q = this,
                o = '',
                r = [
                    'av',
                    'pv',
                    'ds',
                    'dn'
                ],
                g = [
                ],
                p,
                k = 0,
                h = 0,
                d = 0;
            function i() {
                H(b, p, g[d || k || h & 2 || h]);
                a.M(b, 'pointer-events', d ? 'none' : '')
            }
            function c() {
                k = 0;
                i();
                f.A(e, 'mouseup', c);
                f.A(e, 'touchend', c);
                f.A(e, 'touchcancel', c)
            }
            function n(a) {
                if (d) f.nb(a);
                else {
                    k = 4;
                    i();
                    f.a(e, 'mouseup', c);
                    f.a(e, 'touchend', c);
                    f.a(e, 'touchcancel', c)
                }
            }
            q.zd = function (a) {
                if (a != j) {
                    h = a & 2 || a & 1;
                    i()
                } else return h
            };
            q.Dc = function (a) {
                if (a == j) return !d;
                d = a ? 0 : 3;
                i()
            };
            b = f.U(b);
            var l = a.ee(w(b));
            if (l) o = l.shift();
            m(r, function (a) {
                g.push(o + a)
            });
            p = Z(' ', g);
            g.unshift('');
            f.a(b, 'mousedown', n);
            f.a(b, 'touchstart', n)
        }
        f.Cb = function (a) {
            return new Db(a)
        };
        f.M = E;
        f.tb = o('overflow');
        f.s = o('top', 2);
        f.p = o('left', 2);
        f.l = o('width', 2);
        f.m = o('height', 2);
        f.Td = o('marginLeft', 2);
        f.Pd = o('marginTop', 2);
        f.u = o('position');
        f.D = o('display');
        f.q = o('zIndex', 1);
        f.Lb = function (b, a, c) {
            if (a != j) Bb(b, a, c);
            else return Ab(b)
        };
        f.xb = function (a, b) {
            if (b != j) a.style.cssText = b;
            else return a.style.cssText
        };
        var R = {
                K: f.Lb,
                f: f.s,
                c: f.p,
                Kb: f.l,
                Eb: f.m,
                cb: f.u,
                De: f.D,
                zb: f.q
            },
            u;
        function J() {
            if (!u) u = C({
                Ee: f.Pd,
                Fe: f.Td,
                e: f.je
            }, R);
            return u
        }
        f.ld = J;
        f.O = function (c, b) {
            var a = J();
            m(b, function (d, b) {
                a[b] && a[b](c, d)
            })
        };
        new (function () {
        });
        f.vd = function (l, g, t, r, u, w, j) {
            var c = g;
            if (l) {
                c = {
                };
                for (var f in g) {
                    var x = w[f] || 1,
                        s = u[f] || [0,
                                1],
                        e = (t - s[0]) / s[1];
                    e = b.min(b.max(e, 0), 1);
                    e = e * x;
                    var p = b.floor(e);
                    if (e != p) e -= p;
                    var v = r[f] || r.Bb || d.Pc,
                        q = v(e),
                        h,
                        y = l[f];
                    g[f];
                    var m = g[f];
                    if (a.we(m)) h = y + m * q;
                    else {
                        h = a.C({
                            ab: {
                            }
                        }, l[f]);
                        a.i(m.ab, function (c, b) {
                            var a = c * q;
                            h.ab[b] = a;
                            h[b] += a
                        })
                    }
                    c[f] = h
                }
                if (g.n || g.z);
            }
            if (g.e && j.gb) {
                var k = c.e.ab,
                    o = (k.f || 0) + (k.k || 0),
                    n = (k.c || 0) + (k.j || 0);
                c.c = (c.c || 0) + n;
                c.f = (c.f || 0) + o;
                c.e.c -= n;
                c.e.j -= n;
                c.e.f -= o;
                c.e.k -= o
            }
            if (c.e && a.ie() && !c.e.f && !c.e.c && c.e.j == j.kb && c.e.k == j.pb) c.e = i;
            return c
        }
    };
    function l() {
        var b = this,
            d = [
            ];
        function i(a, b) {
            d.push({
                Qb: a,
                Nb: b
            })
        }
        function h(b, c) {
            a.i(d, function (a, e) {
                a.Qb == b && a.Nb === c && d.splice(e, 1)
            })
        }
        b.Y = b.addEventListener = i;
        b.removeEventListener = h;
        b.g = function (b) {
            var c = [
            ].slice.call(arguments, 1);
            a.i(d, function (a) {
                a.Qb == b && a.Nb.apply(g, c)
            })
        }
    }
    function k(o, z, k, R, P, K) {
        o = o || 0;
        var e = this,
            s,
            p,
            q,
            x,
            B = 0,
            I,
            J,
            H,
            D,
            A = 0,
            l = 0,
            n = 0,
            E,
            m = o,
            f,
            j,
            r,
            y = [
            ],
            C;
        function M(a) {
            f += a;
            j += a;
            m += a;
            l += a;
            n += a;
            A = a
        }
        function Q(a, b) {
            var c = a - f + o * b;
            M(c);
            return j
        }
        function w(o, i) {
            var d = o;
            if (r && (d >= j || d <= f)) d = ((d - f) % r + r) % r + f;
            if (!E || x || i || l != d) {
                var g = b.min(d, j);
                g = b.max(g, f);
                if (!E || x || i || g != n) {
                    if (K) {
                        var h = (g - m) / (z || 1);
                        if (k.Xc) h = 1 - h;
                        var p = a.vd(P, K, h, I, H, J, k);
                        a.i(p, function (b, a) {
                            C[a] && C[a](R, b)
                        })
                    }
                    e.Ib(n - m, g - m);
                    n = g;
                    a.i(y, function (b, c) {
                        var a = o < l ? y[y.length - c - 1] : b;
                        a.o(n - A, i)
                    });
                    var s = l,
                        q = n;
                    l = d;
                    E = c;
                    e.mb(s, q)
                }
            }
        }
        function F(a, c, d) {
            c && a.Ic(j, 1);
            if (!d) {
                f = b.min(f, a.gd() + A);
                j = b.max(j, a.bb() + A)
            }
            y.push(a)
        }
        var t = g.requestAnimationFrame || g.webkitRequestAnimationFrame || g.mozRequestAnimationFrame || g.msRequestAnimationFrame;
        if (a.he() && a.Ec() < 7) t = i;
        t = t || function (b) {
            a.S(b, k.Wc)
        };
        function L() {
            if (s) {
                var d = a.L(),
                    e = b.min(d - B, k.yc),
                    c = l + e * q;
                B = d;
                if (c * q >= p * q) c = p;
                w(c);
                if (!x && c * q >= p * q) N(D);
                else t(L)
            }
        }
        function v(d, g, h) {
            if (!s) {
                s = c;
                x = h;
                D = g;
                d = b.max(d, f);
                d = b.min(d, j);
                p = d;
                q = p < l ? - 1 : 1;
                e.sc();
                B = a.L();
                t(L)
            }
        }
        function N(a) {
            if (s) {
                x = s = D = h;
                e.zc();
                a && a()
            }
        }
        e.Jc = function (a, b, c) {
            v(a ? l + a : j, b, c)
        };
        e.Uc = v;
        e.N = N;
        e.ce = function (a) {
            v(a)
        };
        e.F = function () {
            return l
        };
        e.rc = function () {
            return p
        };
        e.W = function () {
            return n
        };
        e.o = w;
        e.gb = function (a) {
            w(l + a)
        };
        e.vc = function () {
            return s
        };
        e.me = function (a) {
            r = a
        };
        e.Ic = Q;
        e.wc = M;
        e.jc = function (a) {
            F(a, 0)
        };
        e.dc = function (a) {
            F(a, 1)
        };
        e.gd = function () {
            return f
        };
        e.bb = function () {
            return j
        };
        e.mb = e.sc = e.zc = e.Ib = a.lc;
        e.kc = a.L();
        k = a.C({
            Wc: 16,
            yc: 50
        }, k);
        r = k.qc;
        C = a.C({
        }, a.ld(), k.fc);
        f = m = o;
        j = o + z;
        J = k.wb || {
        };
        H = k.sb || {
        };
        I = a.C({
            Bb: a.qe(k.B) && k.B || d.Pc
        }, k.B)
    }
    new (function () {
    });
    var f = function (q, ec) {
        var n = this;
        function Dc() {
            var a = this;
            k.call(a, - 100000000, 200000000);
            a.sd = function () {
                var c = a.W(),
                    d = b.floor(c),
                    f = s(d),
                    e = c - b.floor(c);
                return {
                    Q: f,
                    md: d,
                    cb: e
                }
            };
            a.mb = function (d, a) {
                var e = b.floor(a);
                if (e != a && a > d) e++;
                Tb(e, c);
                n.g(f.fd, s(a), s(d), a, d)
            }
        }
        function Cc() {
            var b = this;
            k.call(b, 0, 0, {
                qc: r
            });
            a.i(D, function (a) {
                A & 1 && a.me(r);
                b.dc(a);
                a.wc(hb / ac)
            })
        }
        function Bc() {
            var a = this,
                b = Sb.Z;
            k.call(a, - 1, 2, {
                B: d.kd,
                fc: {
                    cb: Yb
                },
                qc: r
            }, b, {
                cb: 1
            }, {
                cb: - 2
            });
            a.Gb = b
        }
        function pc(m, l) {
            var a = this,
                d,
                e,
                g,
                j,
                b;
            k.call(a, - 100000000, 200000000, {
                yc: 100
            });
            a.sc = function () {
                Q = c;
                U = i;
                n.g(f.Ad, s(w.F()), w.F())
            };
            a.zc = function () {
                Q = h;
                j = h;
                var a = w.sd();
                n.g(f.bd, s(w.F()), w.F());
                !a.cb && Fc(a.md, t)
            };
            a.mb = function (h, f) {
                var a;
                if (j) a = b;
                else {
                    a = e;
                    if (g) {
                        var c = f / g;
                        a = p.ed(c) * (e - d) + d
                    }
                }
                w.o(a)
            };
            a.hb = function (b, f, c, h) {
                d = b;
                e = f;
                g = c;
                w.o(b);
                a.o(0);
                a.Uc(c, h)
            };
            a.Yc = function (d) {
                j = c;
                b = d;
                a.Jc(d, i, c)
            };
            a.ne = function (a) {
                b = a
            };
            w = new Dc;
            w.jc(m);
            w.jc(l)
        }
        function qc() {
            var c = this,
                b = Wb();
            a.q(b, 0);
            a.M(b, 'pointerEvents', 'none');
            c.Z = b;
            c.fb = function () {
                a.J(b);
                a.Jb(b)
            }
        }
        function zc(o, e) {
            var d = this,
                q,
                x,
                N,
                y,
                j,
                C = [
                ],
                H,
                v,
                W,
                K,
                Q,
                G,
                g,
                w,
                m;
            k.call(d, - u, u + 1, {
            });
            function F(a) {
                x && x.Ab();
                q && q.Ab();
                V(o, a);
                G = c;
                q = new L.v(o, L, 1);
                x = new L.v(o, L);
                x.o(0);
                q.o(0)
            }
            function Y() {
                q.kc < L.kc && F()
            }
            function O(o, r, m) {
                if (!K) {
                    K = c;
                    if (j && m) {
                        var g = m.width,
                            b = m.height,
                            l = g,
                            k = b;
                        if (g && b && p.V) {
                            if (p.V & 3 && (!(p.V & 4) || g > J || b > I)) {
                                var i = h,
                                    q = J / I * b / g;
                                if (p.V & 1) i = q > 1;
                                else if (p.V & 2) i = q < 1;
                                l = i ? g * I / b : J;
                                k = i ? I : b * J / g
                            }
                            a.l(j, l);
                            a.m(j, k);
                            a.s(j, (I - k) / 2);
                            a.p(j, (J - l) / 2)
                        }
                        a.u(j, 'absolute');
                        n.g(f.de, e)
                    }
                }
                a.J(r);
                o && o(d)
            }
            function X(b, c, f, g) {
                if (g == U && t == e && R) if (!Ec) {
                    var a = s(b);
                    B.wd(a, e, c, d, f);
                    c.fe();
                    ab.Ic(a, 1);
                    ab.o(a);
                    z.hb(b, b, 0)
                }
            }
            function bb(b) {
                if (b == U && t == e) {
                    if (!g) {
                        var a = i;
                        if (B) if (B.Q == e) a = B.pd();
                        else B.fb();
                        Y();
                        g = new xc(o, e, a, d.oe(), d.ve());
                        g.Cc(m)
                    }
                    !g.vc() && g.Hb()
                }
            }
            function T(f, c, h) {
                if (f == e) {
                    if (f != c) D[c] && D[c].pe();
                    else !h && g && g.se();
                    m && m.Dc();
                    var j = U = a.L();
                    d.X(a.G(i, bb, j))
                } else {
                    var l = b.abs(e - f),
                        k = u + p.xe - 1;
                    (!Q || l <= k) && d.X()
                }
            }
            function cb() {
                if (t == e && g) {
                    g.N();
                    m && m.Ld();
                    m && m.Kd();
                    g.mc()
                }
            }
            function fb() {
                t == e && g && g.N()
            }
            function Z(a) {
                !M && n.g(f.Jd, e, a)
            }
            function P() {
                m = w.pInstance;
                g && g.Cc(m)
            }
            d.X = function (d, b) {
                b = b || y;
                if (C.length && !K) {
                    a.E(b);
                    if (!W) {
                        W = c;
                        n.g(f.Od, e);
                        a.i(C, function (b) {
                            if (!a.I(b, 'src')) {
                                b.src = a.t(b, 'src2');
                                a.D(b, b['display-origin'])
                            }
                        })
                    }
                    a.td(C, j, a.G(i, O, d, b))
                } else O(d, b)
            };
            d.Id = function () {
                var g = e;
                if (p.Mb < 0) g -= r;
                var c = g + p.Mb * vc;
                if (A & 2) c = s(c);
                if (!(A & 1)) c = b.max(0, b.min(c, r - u));
                if (c != e) {
                    if (B) {
                        var d = B.ad(r);
                        if (d) {
                            var h = U = a.L(),
                                f = D[s(c)];
                            return f.X(a.G(i, X, c, f, d, h), y)
                        }
                    }
                    pb(c)
                }
            };
            d.Pb = function () {
                T(e, e, c)
            };
            d.pe = function () {
                m && m.Ld();
                m && m.Kd();
                d.Tc();
                g && g.ae();
                g = i;
                F()
            };
            d.fe = function () {
                a.J(o)
            };
            d.Tc = function () {
                a.E(o)
            };
            d.Vd = function () {
                m && m.Dc()
            };
            function V(b, e, d) {
                if (a.I(b, 'jssor-slider')) return;
                d = d || 0;
                if (!G) {
                    if (b.tagName == 'IMG') {
                        C.push(b);
                        if (!a.I(b, 'src')) {
                            Q = c;
                            b['display-origin'] = a.D(b);
                            a.J(b)
                        }
                    }
                    a.Hc() && a.q(b, (a.q(b) || 0) + 1);
                    if (p.Rc && a.Gc()) (a.Gc() < 534 || !eb && !a.ue()) && a.Yd(b)
                }
                var f = a.T(b);
                a.i(f, function (f) {
                    var i = f.tagName,
                        k = a.t(f, 'u');
                    if (k == 'player' && !w) {
                        w = f;
                        if (w.pInstance) P();
                        else a.a(w, 'dataavailable', P)
                    }
                    if (k == 'caption') {
                        if (!a.Sc() && !e) {
                            var g = a.db(f, h, c);
                            a.vb(g, f, b);
                            a.rb(f, b);
                            f = g;
                            e = c
                        }
                    } else if (!G && !d && !j) {
                        if (i == 'A') {
                            if (a.t(f, 'u') == 'image') j = a.re(f, 'IMG');
                            else j = a.r(f, 'image', c);
                            if (j) {
                                H = f;
                                a.O(H, S);
                                v = a.db(H, c);
                                a.D(v, 'block');
                                a.O(v, S);
                                a.Lb(v, 0);
                                a.M(v, 'backgroundColor', '#000')
                            }
                        } else if (i == 'IMG' && a.t(f, 'u') == 'image') j = f;
                        if (j) {
                            j.border = 0;
                            a.O(j, S)
                        }
                    }
                    V(f, e, d + 1)
                })
            }
            d.Ib = function (c, b) {
                var a = u - b;
                Yb(N, a)
            };
            d.oe = function () {
                return q
            };
            d.ve = function () {
                return x
            };
            d.Q = e;
            l.call(d);
            var E = a.r(o, 'thumb', c);
            if (E) {
                a.db(E);
                a.tc(E, 'id');
                a.J(E)
            }
            a.E(o);
            y = a.db(db);
            a.q(y, 1000);
            a.a(o, 'click', Z);
            F(c);
            d.id = j;
            d.Nc = v;
            d.Gb = N = o;
            a.H(N, y);
            n.Y(203, T);
            n.Y(28, fb);
            n.Y(24, cb)
        }
        function xc(G, i, p, u, s) {
            var b = this,
                l = 0,
                w = 0,
                m,
                g,
                d,
                e,
                j,
                q,
                v,
                r,
                o = D[i];
            k.call(b, 0, 0);
            function x() {
                a.Jb(O);
                cc && j && o.Nc && a.H(O, o.Nc);
                a.E(O, !j && o.id)
            }
            function y() {
                if (q) {
                    q = h;
                    n.g(f.Qd, i, d, l, g, d, e);
                    b.o(g)
                }
                b.Hb()
            }
            function z(a) {
                r = a;
                b.N();
                b.Hb()
            }
            b.Hb = function () {
                var a = b.W();
                if (!C && !Q && !r && t == i) {
                    if (!a) {
                        if (m && !j) {
                            j = c;
                            b.mc(c);
                            n.g(f.Sd, i, l, w, m, e)
                        }
                        x()
                    }
                    var h,
                        p = f.Fc;
                    if (a != e) if (a == d) h = e;
                    else if (a == g) h = d;
                    else if (!a) h = g;
                    else if (a > d) {
                        q = c;
                        h = d;
                        p = f.Nd
                    } else h = b.rc();
                    n.g(p, i, a, l, g, d, e);
                    var k = R && (!E || F);
                    if (a == e) (d != e && !(E & 12) || k) && o.Id();
                    else (k || a != d) && b.Uc(h, y)
                }
            };
            b.se = function () {
                d == e && d == b.W() && b.o(g)
            };
            b.ae = function () {
                B && B.Q == i && B.fb();
                var a = b.W();
                a < e && n.g(f.Fc, i, - a - 1, l, g, d, e)
            };
            b.mc = function (b) {
                p && a.tb(jb, b && p.Db.Be ? '' : 'hidden')
            };
            b.Ib = function (b, a) {
                if (j && a >= m) {
                    j = h;
                    x();
                    o.Tc();
                    B.fb();
                    n.g(f.le, i, l, w, m, e)
                }
                n.g(f.ke, i, a, l, g, d, e)
            };
            b.Cc = function (a) {
                if (a && !v) {
                    v = a;
                    a.Y($JssorPlayer$.hd, z)
                }
            };
            p && b.dc(p);
            m = b.bb();
            b.bb();
            b.dc(u);
            g = u.bb();
            d = g + (a.ud(a.t(G, 'idle')) || oc);
            s.wc(d);
            b.jc(s);
            e = b.bb()
        }
        function Yb(g, f) {
            var e = x > 0 ? x : ib,
                c = Bb * f * (e & 1),
                d = Cb * f * (e >> 1 & 1);
            c = b.round(c);
            d = b.round(d);
            a.p(g, c);
            a.s(g, d)
        }
        function Ob() {
            rb = Q;
            Kb = z.rc();
            G = w.F()
        }
        function fc() {
            Ob();
            if (C || !F && E & 12) {
                z.N();
                n.g(f.Zd)
            }
        }
        function dc(e) {
            if (!C && (F || !(E & 12)) && !z.vc()) {
                var c = w.F(),
                    a = b.ceil(G);
                if (e && b.abs(H) >= p.bc) {
                    a = b.ceil(c);
                    a += gb
                }
                if (!(A & 1)) a = b.min(r - u, b.max(a, 0));
                var d = b.abs(a - c);
                d = 1 - b.pow(1 - d, 5);
                if (!M && rb) z.ce(Kb);
                else if (c == a) {
                    vb.Vd();
                    vb.Pb()
                } else z.hb(c, a, d * Ub)
            }
        }
        function Ib(b) {
            !a.t(a.Fb(b), 'nodrag') && a.nb(b)
        }
        function tc(a) {
            Xb(a, 1)
        }
        function Xb(b, d) {
            b = a.Kc(b);
            var k = a.Fb(b);
            if (!K && !a.t(k, 'nodrag') && uc() && (!d || b.touches.length == 1)) {
                C = c;
                Ab = h;
                U = i;
                a.a(e, d ? 'touchmove' : 'mousemove', Db);
                a.L();
                M = 0;
                fc();
                if (!rb) x = 0;
                if (d) {
                    var j = b.touches[0];
                    wb = j.clientX;
                    xb = j.clientY
                } else {
                    var g = a.Mc(b);
                    wb = g.x;
                    xb = g.y
                }
                H = 0;
                cb = 0;
                gb = 0;
                n.g(f.be, s(G), G, b)
            }
        }
        function Db(e) {
            if (C) {
                e = a.Kc(e);
                var f;
                if (e.type != 'mousemove') {
                    var l = e.touches[0];
                    f = {
                        x: l.clientX,
                        y: l.clientY
                    }
                } else f = a.Mc(e);
                if (f) {
                    var j = f.x - wb,
                        k = f.y - xb;
                    if (b.floor(G) != G) x = x || ib & K;
                    if ((j || k) && !x) {
                        if (K == 3) if (b.abs(k) > b.abs(j)) x = 2;
                        else x = 1;
                        else x = K;
                        if (lb && x == 1 && b.abs(k) - b.abs(j) > 3) Ab = c
                    }
                    if (x) {
                        var d = k,
                            i = Cb;
                        if (x == 1) {
                            d = j;
                            i = Bb
                        }
                        if (!(A & 1)) {
                            if (d > 0) {
                                var g = i * t,
                                    h = d - g;
                                if (h > 0) d = g + b.sqrt(h) * 5
                            }
                            if (d < 0) {
                                var g = i * (r - u - t),
                                    h = - d - g;
                                if (h > 0) d = - g - b.sqrt(h) * 5
                            }
                        }
                        if (H - cb < - 2) gb = 0;
                        else if (H - cb > 2) gb = - 1;
                        cb = H;
                        H = d;
                        ub = G - H / i / (Z || 1);
                        if (H && x && !Ab) {
                            a.nb(e);
                            if (!Q) z.Yc(ub);
                            else z.ne(ub)
                        }
                    }
                }
            }
        }
        function ob() {
            rc();
            if (C) {
                C = h;
                a.L();
                a.A(e, 'mousemove', Db);
                a.A(e, 'touchmove', Db);
                M = H;
                z.N();
                var b = w.F();
                n.g(f.Ed, s(b), b, s(G), G);
                E & 12 && Ob();
                dc(c)
            }
        }
        function jc(c) {
            if (M) {
                a.Cd(c);
                var b = a.Fb(c);
                while (b && v !== b) {
                    b.tagName == 'A' && a.nb(c);
                    try {
                        b = b.parentNode
                    } catch (d) {
                        break
                    }
                }
            }
        }
        function nc(a) {
            D[t];
            t = s(a);
            vb = D[t];
            Tb(a);
            return t
        }
        function Fc(a, b) {
            x = 0;
            nc(a);
            n.g(f.Fd, s(a), b)
        }
        function Tb(b, c) {
            N = b;
            a.i(P, function (a) {
                a.Zb(s(b), b, c)
            })
        }
        function uc() {
            var b = f.Vc || 0,
                a = Y;
            if (lb) a & 1 && (a &= 1);
            f.Vc |= a;
            return K = a & ~b
        }
        function rc() {
            if (K) {
                f.Vc &= ~Y;
                K = 0
            }
        }
        function Wb() {
            var b = a.eb();
            a.O(b, S);
            a.u(b, 'absolute');
            return b
        }
        function s(a) {
            return (a % r + r) % r
        }
        function kc(d, c) {
            var a = d;
            if (c) {
                if (!A) {
                    a = b.min(b.max(a + N, 0), r - u);
                    c = h
                } else if (A & 2) {
                    a = s(a + N);
                    c = h
                }
            } else if (A) a = n.Bd(a);
            pb(a, p.qb, c)
        }
        function zb() {
            a.i(P, function (a) {
                a.Tb(a.ob.nc <= F)
            })
        }
        function hc() {
            if (!F) {
                F = 1;
                zb();
                if (!C) {
                    E & 12 && dc();
                    E & 3 && D[t].Pb()
                }
            }
        }
        function gc() {
            if (F) {
                F = 0;
                zb();
                C || !(E & 12) || fc()
            }
        }
        function ic() {
            S = {
                Kb: J,
                Eb: I,
                f: 0,
                c: 0
            };
            a.i(V, function (b) {
                a.O(b, S);
                a.u(b, 'absolute');
                a.tb(b, 'hidden');
                a.J(b)
            });
            a.O(db, S)
        }
        function nb(b, a) {
            pb(b, a, c)
        }
        function pb(f, e, k) {
            if (Qb && (!C && (F || !(E & 12)) || p.pc)) {
                Q = c;
                C = h;
                z.N();
                if (e == j) e = Ub;
                var d = Eb.W(),
                    a = f;
                if (k) {
                    a = d + f;
                    if (f > 0) a = b.ceil(a);
                    else a = b.floor(a)
                }
                if (A & 2) a = s(a);
                if (!(A & 1)) a = b.max(0, b.min(a, r - u));
                var i = (a - d) % r;
                a = d + i;
                var g = d == a ? 0 : e * b.abs(i);
                g = b.min(g, e * u * 1.5);
                z.hb(d, a, g || 1)
            }
        }
        n.Jc = function () {
            if (!R) {
                R = c;
                D[t] && D[t].Pb()
            }
        };
        function X() {
            return a.l(y || q)
        }
        function kb() {
            return a.m(y || q)
        }
        n.kb = X;
        n.pb = kb;
        function Gb(c, d) {
            if (c == j) return a.l(q);
            if (!y) {
                var b = a.eb(e);
                a.xc(b, a.xc(q));
                a.xb(b, a.xb(q));
                a.D(b, 'block');
                a.u(b, 'relative');
                a.s(b, 0);
                a.p(b, 0);
                a.tb(b, 'visible');
                y = a.eb(e);
                a.u(y, 'absolute');
                a.s(y, 0);
                a.p(y, 0);
                a.l(y, a.l(q));
                a.m(y, a.m(q));
                a.Wd(y, '0 0');
                a.H(y, b);
                var h = a.T(q);
                a.H(q, y);
                a.M(q, 'backgroundImage', '');
                a.i(h, function (c) {
                    a.H(a.t(c, 'noscale') ? q : b, c)
                })
            }
            Z = c / (d ? a.m : a.l) (y);
            a.Xd(y, Z);
            var g = d ? Z * X()  : c,
                f = d ? c : Z * kb();
            a.l(q, g);
            a.m(q, f);
            a.i(P, function (a) {
                a.ec(g, f)
            })
        }
        n.cd = Gb;
        n.Bd = function (a) {
            var d = b.ceil(s(hb / ac)),
                c = s(a - N + d);
            if (c > u) {
                if (a - N > r / 2) a -= r;
                else if (a - N <= - r / 2) a += r
            } else a = N + c - d;
            return a
        };
        l.call(n);
        n.Z = q = a.U(q);
        var p = a.C({
            V: 0,
            xe: 1,
            gc: 0,
            ic: h,
            lb: 1,
            Rc: c,
            pc: c,
            Mb: 1,
            hc: 3000,
            Ub: 1,
            qb: 500,
            ed: d.od,
            bc: 20,
            Sb: 0,
            R: 1,
            uc: 0,
            Bc: 1,
            ub: 1,
            ac: 1
        }, ec);
        if (p.yd != j) p.hc = p.yd;
        if (p.oc != j) p.R = p.oc;
        var ib = p.ub & 3,
            vc = (p.ub & 4) / - 4 || 1,
            fb = p.Ce,
            L = a.C({
                v: o
            }, p.Ae),
            sb = p.xd,
            W = p.qd,
            bb = p.ze,
            T = !p.Bc,
            y,
            v = a.r(q, 'slides', T),
            db = a.r(q, 'loading', T) || a.eb(e),
            Jb = a.r(q, 'navigator', T),
            bc = a.r(q, 'arrowleft', T),
            Zb = a.r(q, 'arrowright', T),
            Hb = a.r(q, 'thumbnavigator', T),
            mc = a.l(v),
            lc = a.m(v),
            S,
            V = [
            ],
            wc = a.T(v);
        a.i(wc, function (b) {
            if (b.tagName == 'DIV' && !a.t(b, 'u')) V.push(b);
            else a.Hc() && a.q(b, (a.q(b) || 0) + 1)
        });
        var t = - 1,
            N,
            vb,
            r = V.length,
            J = p.Ac || mc,
            I = p.jd || lc,
            Vb = p.Sb,
            Bb = J + Vb,
            Cb = I + Vb,
            ac = ib & 1 ? Bb : Cb,
            u = b.min(p.R, r),
            jb,
            x,
            K,
            Ab,
            P = [
            ],
            Pb,
            Rb,
            Nb,
            cc,
            Ec,
            R,
            E = p.Ub,
            oc = p.hc,
            Ub = p.qb,
            tb,
            eb,
            hb,
            Qb = u < r,
            A = Qb ? p.lb : 0,
            Y,
            M,
            F = 1,
            Q,
            C,
            U,
            wb = 0,
            xb = 0,
            H,
            cb,
            gb,
            Eb,
            w,
            ab,
            z,
            Sb = new qc,
            Z;
        R = p.ic;
        n.ob = ec;
        ic();
        a.I(q, 'jssor-slider', c);
        a.q(v, a.q(v) || 0);
        a.u(v, 'absolute');
        jb = a.db(v, c);
        a.vb(jb, v);
        if (fb) {
            cc = fb.ye;
            tb = fb.v;
            eb = u == 1 && r > 1 && tb && (!a.Sc() || a.Ec() >= 8)
        }
        hb = eb || u >= r || !(A & 1) ? 0 : p.uc;
        Y = (u > 1 || hb ? ib : - 1) & p.ac;
        var yb = v,
            D = [
            ],
            B,
            O,
            Fb = a.Md(),
            lb = Fb.Rd,
            G,
            rb,
            Kb,
            ub;
        Fb.Qc && a.M(yb, Fb.Qc, ([i,
            'pan-y',
            'pan-x',
            'none']) [Y] || '');
        ab = new Bc;
        if (eb) B = new tb(Sb, J, I, fb, lb);
        a.H(jb, ab.Gb);
        a.tb(v, 'hidden');
        O = Wb();
        a.M(O, 'backgroundColor', '#000');
        a.Lb(O, 0);
        a.vb(O, yb.firstChild, yb);
        for (var qb = 0; qb < V.length; qb++) {
            var yc = V[qb],
                Ac = new zc(yc, qb);
            D.push(Ac)
        }
        a.J(db);
        Eb = new Cc;
        z = new pc(Eb, ab);
        if (Y) {
            a.a(v, 'mousedown', Xb);
            a.a(v, 'touchstart', tc);
            a.a(v, 'dragstart', Ib);
            a.a(v, 'selectstart', Ib);
            a.a(e, 'mouseup', ob);
            a.a(e, 'touchend', ob);
            a.a(e, 'touchcancel', ob);
            a.a(g, 'blur', ob)
        }
        E &= lb ? 10 : 5;
        if (Jb && sb) {
            Pb = new sb.v(Jb, sb, X(), kb());
            P.push(Pb)
        }
        if (W && bc && Zb) {
            W.lb = A;
            W.R = u;
            Rb = new W.v(bc, Zb, W, X(), kb());
            P.push(Rb)
        }
        if (Hb && bb) {
            bb.gc = p.gc;
            Nb = new bb.v(Hb, bb);
            P.push(Nb)
        }
        a.i(P, function (a) {
            a.cc(r, D, db);
            a.Y(m.Yb, kc)
        });
        Gb(X());
        a.a(v, 'click', jc);
        a.a(q, 'mouseout', a.Ob(hc, q));
        a.a(q, 'mouseover', a.Ob(gc, q));
        zb();
        p.nd && a.a(e, 'keydown', function (a) {
            if (a.keyCode == 37) nb( - 1);
            else a.keyCode == 39 && nb(1)
        });
        var mb = p.gc;
        if (!(A & 1)) mb = b.max(0, b.min(mb, r - u));
        z.hb(mb, mb, 0)
    };
    f.Jd = 21;
    f.be = 22;
    f.Ed = 23;
    f.Ad = 24;
    f.bd = 25;
    f.Od = 26;
    f.de = 27;
    f.Zd = 28;
    f.fd = 202;
    f.Fd = 203;
    f.Sd = 206;
    f.le = 207;
    f.ke = 208;
    f.Fc = 209;
    f.Nd = 210;
    f.Qd = 211;
    var m = {
            Yb: 1
        },
        p = function (d, D) {
            var f = this;
            l.call(f);
            d = a.U(d);
            var t,
                u,
                s,
                r,
                n = 0,
                e,
                o,
                k,
                y,
                z,
                j,
                g,
                q,
                p,
                C = [
                ],
                A = [
                ];
            function x(a) {
                a != - 1 && A[a].zd(a == n)
            }
            function v(a) {
                f.g(m.Yb, a * o)
            }
            f.Z = d;
            f.Zb = function (a) {
                if (a != r) {
                    var d = n,
                        c = b.floor(a / o);
                    n = c;
                    r = a;
                    x(d);
                    x(c)
                }
            };
            f.Tb = function (b) {
                a.E(d, b)
            };
            var B;
            f.ec = function (f, b) {
                if (!B || e.jb == h) {
                    var f = a.yb(d).clientWidth,
                        b = a.yb(d).clientHeight;
                    e.P & 1 && a.p(d, (f - u) / 2);
                    e.P & 2 && a.s(d, (b - s) / 2);
                    B = c
                }
            };
            var w;
            f.cc = function (D) {
                if (!w) {
                    t = b.ceil(D / o);
                    n = 0;
                    var m = q + y,
                        r = p + z,
                        l = b.ceil(t / k) - 1;
                    u = q + m * (!j ? l : k - 1);
                    s = p + r * (j ? l : k - 1);
                    a.l(d, u);
                    a.m(d, s);
                    for (var f = 0; f < t; f++) {
                        var B = a.ge();
                        a.Dd(B, f + 1);
                        var h = a.rd(g, 'numbertemplate', B, c);
                        a.u(h, 'absolute');
                        var x = f % (l + 1);
                        a.p(h, !j ? m * x : f % k * m);
                        a.s(h, j ? r * x : b.floor(f / (l + 1)) * r);
                        a.H(d, h);
                        C[f] = h;
                        e.Xb & 1 && a.a(h, 'click', a.G(i, v, f));
                        e.Xb & 2 && a.a(h, 'mouseover', a.Ob(a.G(i, v, f), h));
                        A[f] = a.Cb(h)
                    }
                    w = c
                }
            };
            f.ob = e = a.C({
                Rb: 0,
                Wb: 0,
                Vb: 1,
                Xb: 1
            }, D);
            g = a.r(d, 'prototype');
            q = a.l(g);
            p = a.m(g);
            a.rb(g, d);
            o = e.ib || 1;
            k = e.Oc || 1;
            y = e.Rb;
            z = e.Wb;
            j = e.Vb - 1;
            e.jb == h && a.I(d, 'noscale', c)
        },
        q = function (b, f, j) {
            var d = this;
            l.call(d);
            var u,
                t,
                e,
                g,
                k,
                q = a.l(b),
                o = a.m(b);
            function n(a) {
                d.g(m.Yb, a, c)
            }
            function r(c) {
                a.E(b, c || !j.lb && e == 0);
                a.E(f, c || !j.lb && e >= t - j.R);
                u = c
            }
            d.Zb = function (b, a, c) {
                if (c) e = a;
                else {
                    e = b;
                    r(u)
                }
            };
            d.Tb = r;
            var s;
            d.ec = function (i, d) {
                if (!s || g.jb == h) {
                    var e = a.yb(b).clientWidth,
                        d = a.yb(b).clientHeight;
                    if (g.P & 1) {
                        a.p(b, (e - q) / 2);
                        a.p(f, (e - q) / 2)
                    }
                    if (g.P & 2) {
                        a.s(b, (d - o) / 2);
                        a.s(f, (d - o) / 2)
                    }
                    s = c
                }
            };
            var p;
            d.cc = function (d) {
                t = d;
                e = 0;
                if (!p) {
                    a.a(b, 'click', a.G(i, n, - k));
                    a.a(f, 'click', a.G(i, n, k));
                    a.Cb(b);
                    a.Cb(f);
                    p = c
                }
            };
            d.ob = g = a.C({
                ib: 1
            }, j);
            k = g.ib;
            if (g.jb == h) {
                a.I(b, 'noscale', c);
                a.I(f, 'noscale', c)
            }
        };
    function o() {
        k.call(this, 0, 0);
        this.Ab = a.lc
    }
    jssor_slider1_starter = function (i) {
        var h = new f(i, {
            ic: c,
            Mb: 4,
            hc: 4000,
            Ub: 1,
            nd: c,
            qb: 160,
            bc: 20,
            Ac: 30,
            Sb: 3,
            R: 4,
            uc: 0,
            Bc: 1,
            ub: 1,
            ac: 1,
            xd: {
                v: p,
                nc: 2,
                P: 0,
                ib: 1,
                Oc: 1,
                Rb: 0,
                Wb: 0,
                Vb: 1
            },
            qd: {
                v: q,
                nc: 1,
                P: 2,
                ib: 4
            }
        });
        function d() {
            var a = e.body.clientWidth;
            if (a) h.cd(b.min(a, 263));
            else g.setTimeout(d, 30)
        }
        d();
        a.a(g, 'load', d);
        a.a(g, 'resize', a.dd(g, d));
        a.a(g, 'orientationchange', d)
    }
}) (window, document, Math, null, true, false)
