/*! smooth-scroll v12.1.4 | (c) 2017 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/smooth-scroll */ !(function(e, t) {
    "function" == typeof define && define.amd ? define([], (function() {
        return t(e)
    })) : "object" == typeof exports ? module.exports = t(e) : e.SmoothScroll = t(e)
})("undefined" != typeof global ? global : "undefined" != typeof window ? window : this, (function(e) {
    "use strict";
    var t = "querySelector" in document && "addEventListener" in e && "requestAnimationFrame" in e && "closest" in e.Element.prototype,
        n = {
            ignore: "[data-scroll-ignore]",
            header: null,
            speed: 500,
            offset: 0,
            easing: "easeInOutCubic",
            customEasing: null,
            before: function() {},
            after: function() {}
        },
        o = function() {
            for (var e = {}, t = 0, n = arguments.length; t < n; t++) {
                var o = arguments[t];
                !(function(t) {
                    for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n])
                })(o)
            }
            return e
        },
        a = function(t) {
            return parseInt(e.getComputedStyle(t).height, 10)
        },
        r = function(e) {
            "#" === e.charAt(0) && (e = e.substr(1));
            for (var t, n = String(e), o = n.length, a = -1, r = "", i = n.charCodeAt(0); ++a < o;) {
                if (0 === (t = n.charCodeAt(a))) throw new InvalidCharacterError("Invalid character: the input contains U+0000.");
                t >= 1 && t <= 31 || 127 == t || 0 === a && t >= 48 && t <= 57 || 1 === a && t >= 48 && t <= 57 && 45 === i ? r += "\\" + t.toString(16) + " " : r += t >= 128 || 45 === t || 95 === t || t >= 48 && t <= 57 || t >= 65 && t <= 90 || t >= 97 && t <= 122 ? n.charAt(a) : "\\" + n.charAt(a)
            }
            return "#" + r
        },
        i = function(e, t) {
            var n;
            return "easeInQuad" === e.easing && (n = t * t), "easeOutQuad" === e.easing && (n = t * (2 - t)), "easeInOutQuad" === e.easing && (n = t < .5 ? 2 * t * t : (4 - 2 * t) * t - 1), "easeInCubic" === e.easing && (n = t * t * t), "easeOutCubic" === e.easing && (n = --t * t * t + 1), "easeInOutCubic" === e.easing && (n = t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1), "easeInQuart" === e.easing && (n = t * t * t * t), "easeOutQuart" === e.easing && (n = 1 - --t * t * t * t), "easeInOutQuart" === e.easing && (n = t < .5 ? 8 * t * t * t * t : 1 - 8 * --t * t * t * t), "easeInQuint" === e.easing && (n = t * t * t * t * t), "easeOutQuint" === e.easing && (n = 1 + --t * t * t * t * t), "easeInOutQuint" === e.easing && (n = t < .5 ? 16 * t * t * t * t * t : 1 + 16 * --t * t * t * t * t), e.customEasing && (n = e.customEasing(t)), n || t
        },
        u = function() {
            return parseInt(e.getComputedStyle(document.documentElement).height, 10)
        },
        c = function(e, t, n) {
            var o = 0;
            if (e.offsetParent)
                do {
                    o += e.offsetTop, e = e.offsetParent
                } while (e);
            return o = Math.max(o - t - n, 0)
        },
        s = function(e) {
            return e ? a(e) + e.offsetTop : 0
        },
        l = function(t, n, o) {
            o || (t.focus(), document.activeElement.id !== t.id && (t.setAttribute("tabindex", "-1"), t.focus(), t.style.outline = "none"), e.scrollTo(0, n))
        },
        f = function(t) {
            return !!("matchMedia" in e && e.matchMedia("(prefers-reduced-motion)").matches)
        };
    return function(a, d) {
        var h, m, g, p, v, b, y, S = {};
        S.cancelScroll = function() {
            cancelAnimationFrame(y)
        }, S.animateScroll = function(t, a, r) {
            var f = o(h || n, r || {}),
                d = "[object Number]" === Object.prototype.toString.call(t),
                m = d || !t.tagName ? null : t;
            if (d || m) {
                var g = e.pageYOffset;
                f.header && !p && (p = document.querySelector(f.header)), v || (v = s(p));
                var b, y, I, O = d ? t : c(m, v, parseInt("function" == typeof f.offset ? f.offset() : f.offset, 10)),
                    A = O - g,
                    E = u(),
                    C = 0,
                    w = function(n, o) {
                        var r = e.pageYOffset;
                        if (n == o || r == o || (g < o && e.innerHeight + r) >= E) return S.cancelScroll(), l(t, o, d), f.after(t, a), b = null, !0
                    },
                    Q = function(t) {
                        b || (b = t), C += t - b, y = C / parseInt(f.speed, 10), y = y > 1 ? 1 : y, I = g + A * i(f, y), e.scrollTo(0, Math.floor(I)), w(I, O) || (e.requestAnimationFrame(Q), b = t)
                    };
                0 === e.pageYOffset && e.scrollTo(0, 0), f.before(t, a), S.cancelScroll(), e.requestAnimationFrame(Q)
            }
        };
        var I = function(e) {
                m && (m.id = m.getAttribute("data-scroll-id"), S.animateScroll(m, g), m = null, g = null)
            },
            O = function(t) {
                if (!f() && 0 === t.button && !t.metaKey && !t.ctrlKey && (g = t.target.closest(a)) && "a" === g.tagName.toLowerCase() && !t.target.closest(h.ignore) && g.hostname === e.location.hostname && g.pathname === e.location.pathname && /#/.test(g.href)) {
                    var n;
                    try {
                        n = r(decodeURIComponent(g.hash))
                    } catch (e) {
                        n = r(g.hash)
                    }
                    if ("#" === n) {
                        t.preventDefault(), m = document.body;
                        var o = m.id ? m.id : "smooth-scroll-top";
                        return m.setAttribute("data-scroll-id", o), m.id = "", void(e.location.hash.substring(1) === o ? I() : e.location.hash = o)
                    }
                    m = document.querySelector(n), m && (m.setAttribute("data-scroll-id", m.id), m.id = "", g.hash === e.location.hash && (t.preventDefault(), I()))
                }
            },
            A = function(e) {
                b || (b = setTimeout((function() {
                    b = null, v = s(p)
                }), 66))
            };
        return S.destroy = function() {
            h && (document.removeEventListener("click", O, !1), e.removeEventListener("resize", A, !1), S.cancelScroll(), h = null, m = null, g = null, p = null, v = null, b = null, y = null)
        }, S.init = function(a) {
            t && (S.destroy(), h = o(n, a || {}), p = h.header ? document.querySelector(h.header) : null, v = s(p), document.addEventListener("click", O, !1), e.addEventListener("hashchange", I, !1), p && e.addEventListener("resize", A, !1))
        }, S.init(d), S
    }
}));