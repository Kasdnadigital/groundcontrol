! function(e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "undefined" != typeof module && module.exports ? module.exports = e(require("jquery")) : e(jQuery)
}(function(r) {
    function l(e) {
        return parseFloat(e) || 0
    }

    function a(e) {
        var e = r(e),
            o = null,
            s = [];
        return e.each(function() {
            var e = r(this),
                t = e.offset().top - l(e.css("margin-top")),
                i = 0 < s.length ? s[s.length - 1] : null;
            null !== i && Math.floor(Math.abs(o - t)) <= 1 ? s[s.length - 1] = i.add(e) : s.push(e), o = t
        }), s
    }

    function d(e) {
        var t = {
            byRow: !0,
            property: "height",
            target: null,
            remove: !1
        };
        return "object" == typeof e ? r.extend(t, e) : ("boolean" == typeof e ? t.byRow = e : "remove" === e && (t.remove = !0), t)
    }
    var o = -1,
        s = -1,
        c = r.fn.matchHeight = function(e) {
            e = d(e);
            if (e.remove) {
                var i = this;
                return this.css(e.property, ""), r.each(c._groups, function(e, t) {
                    t.elements = t.elements.not(i)
                }), this
            }
            return this.length <= 1 && !e.target || (c._groups.push({
                elements: this,
                options: e
            }), c._apply(this, e)), this
        };
    c.version = "0.7.2", c._groups = [], c._throttle = 80, c._maintainScroll = !1, c._beforeUpdate = null, c._afterUpdate = null, c._rows = a, c._parse = l, c._parseOptions = d, c._apply = function(e, t) {
        var s = d(t),
            i = r(e),
            o = [i],
            n = r(window).scrollTop(),
            t = r("html").outerHeight(!0),
            e = i.parents().filter(":hidden");
        return e.each(function() {
            var e = r(this);
            e.data("style-cache", e.attr("style"))
        }), e.css("display", "block"), s.byRow && !s.target && (i.each(function() {
            var e = r(this),
                t = e.css("display");
            "inline-block" !== t && "flex" !== t && "inline-flex" !== t && (t = "block"), e.data("style-cache", e.attr("style")), e.css({
                display: t,
                "padding-top": "0",
                "padding-bottom": "0",
                "margin-top": "0",
                "margin-bottom": "0",
                "border-top-width": "0",
                "border-bottom-width": "0",
                height: "100px",
                overflow: "hidden"
            })
        }), o = a(i), i.each(function() {
            var e = r(this);
            e.attr("style", e.data("style-cache") || "")
        })), r.each(o, function(e, t) {
            var t = r(t),
                o = 0;
            if (s.target) o = s.target.outerHeight(!1);
            else {
                if (s.byRow && t.length <= 1) return void t.css(s.property, "");
                t.each(function() {
                    var e = r(this),
                        t = e.attr("style"),
                        i = e.css("display"),
                        i = {
                            display: i = "inline-block" !== i && "flex" !== i && "inline-flex" !== i ? "block" : i
                        };
                    i[s.property] = "", e.css(i), e.outerHeight(!1) > o && (o = e.outerHeight(!1)), t ? e.attr("style", t) : e.css("display", "")
                })
            }
            t.each(function() {
                var e = r(this),
                    t = 0;
                s.target && e.is(s.target) || ("border-box" !== e.css("box-sizing") && (t += l(e.css("border-top-width")) + l(e.css("border-bottom-width")), t += l(e.css("padding-top")) + l(e.css("padding-bottom"))), e.css(s.property, o - t + "px"))
            })
        }), e.each(function() {
            var e = r(this);
            e.attr("style", e.data("style-cache") || null)
        }), c._maintainScroll && r(window).scrollTop(n / t * r("html").outerHeight(!0)), this
    }, c._applyDataApi = function() {
        var i = {};
        r("[data-match-height], [data-mh]").each(function() {
            var e = r(this),
                t = e.attr("data-mh") || e.attr("data-match-height");
            t in i ? i[t] = i[t].add(e) : i[t] = e
        }), r.each(i, function() {
            this.matchHeight(!0)
        })
    };

    function n(e) {
        c._beforeUpdate && c._beforeUpdate(e, c._groups), r.each(c._groups, function() {
            c._apply(this.elements, this.options)
        }), c._afterUpdate && c._afterUpdate(e, c._groups)
    }
    c._update = function(e, t) {
        if (t && "resize" === t.type) {
            var i = r(window).width();
            if (i === o) return;
            o = i
        }
        e ? -1 === s && (s = setTimeout(function() {
            n(t), s = -1
        }, c._throttle)) : n(t)
    }, r(c._applyDataApi);
    var e = r.fn.on ? "on" : "bind";
    r(window)[e]("load", function(e) {
        c._update(!1, e)
    }), r(window)[e]("resize orientationchange", function(e) {
        c._update(!0, e)
    })
}),
function(e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "undefined" != typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
}(function(d) {
    "use strict";
    var o, r = window.Slick || {};
    o = 0, (r = function(e, t) {
        var i = this;
        i.defaults = {
            accessibility: !0,
            adaptiveHeight: !1,
            appendArrows: d(e),
            appendDots: d(e),
            arrows: !0,
            asNavFor: null,
            prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
            nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
            autoplay: !1,
            autoplaySpeed: 3e3,
            centerMode: !1,
            centerPadding: "50px",
            cssEase: "ease",
            customPaging: function(e, t) {
                return d('<button type="button" />').text(t + 1)
            },
            dots: !1,
            dotsClass: "slick-dots",
            draggable: !0,
            easing: "linear",
            edgeFriction: .35,
            fade: !1,
            focusOnSelect: !1,
            focusOnChange: !1,
            infinite: !0,
            initialSlide: 0,
            lazyLoad: "ondemand",
            mobileFirst: !1,
            pauseOnHover: !0,
            pauseOnFocus: !0,
            pauseOnDotsHover: !1,
            respondTo: "window",
            responsive: null,
            rows: 1,
            rtl: !1,
            slide: "",
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            swipe: !0,
            swipeToSlide: !1,
            touchMove: !0,
            touchThreshold: 5,
            useCSS: !0,
            useTransform: !0,
            variableWidth: !1,
            vertical: !1,
            verticalSwiping: !1,
            waitForAnimate: !0,
            zIndex: 1e3
        }, i.initials = {
            animating: !1,
            dragging: !1,
            autoPlayTimer: null,
            currentDirection: 0,
            currentLeft: null,
            currentSlide: 0,
            direction: 1,
            $dots: null,
            listWidth: null,
            listHeight: null,
            loadIndex: 0,
            $nextArrow: null,
            $prevArrow: null,
            scrolling: !1,
            slideCount: null,
            slideWidth: null,
            $slideTrack: null,
            $slides: null,
            sliding: !1,
            slideOffset: 0,
            swipeLeft: null,
            swiping: !1,
            $list: null,
            touchObject: {},
            transformsEnabled: !1,
            unslicked: !1
        }, d.extend(i, i.initials), i.activeBreakpoint = null, i.animType = null, i.animProp = null, i.breakpoints = [], i.breakpointSettings = [], i.cssTransitions = !1, i.focussed = !1, i.interrupted = !1, i.hidden = "hidden", i.paused = !0, i.positionProp = null, i.respondTo = null, i.rowCount = 1, i.shouldClick = !0, i.$slider = d(e), i.$slidesCache = null, i.transformType = null, i.transitionType = null, i.visibilityChange = "visibilitychange", i.windowWidth = 0, i.windowTimer = null, e = d(e).data("slick") || {}, i.options = d.extend({}, i.defaults, t, e), i.currentSlide = i.options.initialSlide, i.originalSettings = i.options, void 0 !== document.mozHidden ? (i.hidden = "mozHidden", i.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (i.hidden = "webkitHidden", i.visibilityChange = "webkitvisibilitychange"), i.autoPlay = d.proxy(i.autoPlay, i), i.autoPlayClear = d.proxy(i.autoPlayClear, i), i.autoPlayIterator = d.proxy(i.autoPlayIterator, i), i.changeSlide = d.proxy(i.changeSlide, i), i.clickHandler = d.proxy(i.clickHandler, i), i.selectHandler = d.proxy(i.selectHandler, i), i.setPosition = d.proxy(i.setPosition, i), i.swipeHandler = d.proxy(i.swipeHandler, i), i.dragHandler = d.proxy(i.dragHandler, i), i.keyHandler = d.proxy(i.keyHandler, i), i.instanceUid = o++, i.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, i.registerBreakpoints(), i.init(!0)
    }).prototype.activateADA = function() {
        this.$slideTrack.find(".slick-active").attr({
            "aria-hidden": "false"
        }).find("a, input, button, select").attr({
            tabindex: "0"
        })
    }, r.prototype.addSlide = r.prototype.slickAdd = function(e, t, i) {
        var o = this;
        if ("boolean" == typeof t) i = t, t = null;
        else if (t < 0 || t >= o.slideCount) return !1;
        o.unload(), "number" == typeof t ? 0 === t && 0 === o.$slides.length ? d(e).appendTo(o.$slideTrack) : i ? d(e).insertBefore(o.$slides.eq(t)) : d(e).insertAfter(o.$slides.eq(t)) : !0 === i ? d(e).prependTo(o.$slideTrack) : d(e).appendTo(o.$slideTrack), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slides.each(function(e, t) {
            d(t).attr("data-slick-index", e)
        }), o.$slidesCache = o.$slides, o.reinit()
    }, r.prototype.animateHeight = function() {
        var e, t = this;
        1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical && (e = t.$slides.eq(t.currentSlide).outerHeight(!0), t.$list.animate({
            height: e
        }, t.options.speed))
    }, r.prototype.animateSlide = function(e, t) {
        var i = {},
            o = this;
        o.animateHeight(), !0 === o.options.rtl && !1 === o.options.vertical && (e = -e), !1 === o.transformsEnabled ? !1 === o.options.vertical ? o.$slideTrack.animate({
            left: e
        }, o.options.speed, o.options.easing, t) : o.$slideTrack.animate({
            top: e
        }, o.options.speed, o.options.easing, t) : !1 === o.cssTransitions ? (!0 === o.options.rtl && (o.currentLeft = -o.currentLeft), d({
            animStart: o.currentLeft
        }).animate({
            animStart: e
        }, {
            duration: o.options.speed,
            easing: o.options.easing,
            step: function(e) {
                e = Math.ceil(e), !1 === o.options.vertical ? i[o.animType] = "translate(" + e + "px, 0px)" : i[o.animType] = "translate(0px," + e + "px)", o.$slideTrack.css(i)
            },
            complete: function() {
                t && t.call()
            }
        })) : (o.applyTransition(), e = Math.ceil(e), !1 === o.options.vertical ? i[o.animType] = "translate3d(" + e + "px, 0px, 0px)" : i[o.animType] = "translate3d(0px," + e + "px, 0px)", o.$slideTrack.css(i), t && setTimeout(function() {
            o.disableTransition(), t.call()
        }, o.options.speed))
    }, r.prototype.getNavTarget = function() {
        var e = this.options.asNavFor;
        return e = e && null !== e ? d(e).not(this.$slider) : e
    }, r.prototype.asNavFor = function(t) {
        var e = this.getNavTarget();
        null !== e && "object" == typeof e && e.each(function() {
            var e = d(this).slick("getSlick");
            e.unslicked || e.slideHandler(t, !0)
        })
    }, r.prototype.applyTransition = function(e) {
        var t = this,
            i = {};
        !1 === t.options.fade ? i[t.transitionType] = t.transformType + " " + t.options.speed + "ms " + t.options.cssEase : i[t.transitionType] = "opacity " + t.options.speed + "ms " + t.options.cssEase, (!1 === t.options.fade ? t.$slideTrack : t.$slides.eq(e)).css(i)
    }, r.prototype.autoPlay = function() {
        var e = this;
        e.autoPlayClear(), e.slideCount > e.options.slidesToShow && (e.autoPlayTimer = setInterval(e.autoPlayIterator, e.options.autoplaySpeed))
    }, r.prototype.autoPlayClear = function() {
        this.autoPlayTimer && clearInterval(this.autoPlayTimer)
    }, r.prototype.autoPlayIterator = function() {
        var e = this,
            t = e.currentSlide + e.options.slidesToScroll;
        e.paused || e.interrupted || e.focussed || (!1 === e.options.infinite && (1 === e.direction && e.currentSlide + 1 === e.slideCount - 1 ? e.direction = 0 : 0 === e.direction && (t = e.currentSlide - e.options.slidesToScroll, e.currentSlide - 1 == 0 && (e.direction = 1))), e.slideHandler(t))
    }, r.prototype.buildArrows = function() {
        var e = this;
        !0 === e.options.arrows && (e.$prevArrow = d(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = d(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
            "aria-disabled": "true",
            tabindex: "-1"
        }))
    }, r.prototype.buildDots = function() {
        var e, t, i = this;
        if (!0 === i.options.dots && i.slideCount > i.options.slidesToShow) {
            for (i.$slider.addClass("slick-dotted"), t = d("<ul />").addClass(i.options.dotsClass), e = 0; e <= i.getDotCount(); e += 1) t.append(d("<li />").append(i.options.customPaging.call(this, i, e)));
            i.$dots = t.appendTo(i.options.appendDots), i.$dots.find("li").first().addClass("slick-active")
        }
    }, r.prototype.buildOut = function() {
        var e = this;
        e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function(e, t) {
            d(t).attr("data-slick-index", e).data("originalStyling", d(t).attr("style") || "")
        }), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e.slideCount ? d('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1), d("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e.options.draggable && e.$list.addClass("draggable")
    }, r.prototype.buildRows = function() {
        var e, t, i, o = this,
            s = document.createDocumentFragment(),
            n = o.$slider.children();
        if (0 < o.options.rows) {
            for (i = o.options.slidesPerRow * o.options.rows, t = Math.ceil(n.length / i), e = 0; e < t; e++) {
                for (var r = document.createElement("div"), l = 0; l < o.options.rows; l++) {
                    for (var a = document.createElement("div"), d = 0; d < o.options.slidesPerRow; d++) {
                        var c = e * i + (l * o.options.slidesPerRow + d);
                        n.get(c) && a.appendChild(n.get(c))
                    }
                    r.appendChild(a)
                }
                s.appendChild(r)
            }
            o.$slider.empty().append(s), o.$slider.children().children().children().css({
                width: 100 / o.options.slidesPerRow + "%",
                display: "inline-block"
            })
        }
    }, r.prototype.checkResponsive = function(e, t) {
        var i, o, s, n = this,
            r = !1,
            l = n.$slider.width(),
            a = window.innerWidth || d(window).width();
        if ("window" === n.respondTo ? s = a : "slider" === n.respondTo ? s = l : "min" === n.respondTo && (s = Math.min(a, l)), n.options.responsive && n.options.responsive.length && null !== n.options.responsive) {
            for (i in o = null, n.breakpoints) n.breakpoints.hasOwnProperty(i) && (!1 === n.originalSettings.mobileFirst ? s < n.breakpoints[i] && (o = n.breakpoints[i]) : s > n.breakpoints[i] && (o = n.breakpoints[i]));
            null !== o ? null !== n.activeBreakpoint && o === n.activeBreakpoint && !t || (n.activeBreakpoint = o, "unslick" === n.breakpointSettings[o] ? n.unslick(o) : (n.options = d.extend({}, n.originalSettings, n.breakpointSettings[o]), !0 === e && (n.currentSlide = n.options.initialSlide), n.refresh(e)), r = o) : null !== n.activeBreakpoint && (n.activeBreakpoint = null, n.options = n.originalSettings, !0 === e && (n.currentSlide = n.options.initialSlide), n.refresh(e), r = o), e || !1 === r || n.$slider.trigger("breakpoint", [n, r])
        }
    }, r.prototype.changeSlide = function(e, t) {
        var i, o = this,
            s = d(e.currentTarget);
        switch (s.is("a") && e.preventDefault(), s.is("li") || (s = s.closest("li")), i = o.slideCount % o.options.slidesToScroll != 0 ? 0 : (o.slideCount - o.currentSlide) % o.options.slidesToScroll, e.data.message) {
            case "previous":
                n = 0 == i ? o.options.slidesToScroll : o.options.slidesToShow - i, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide - n, !1, t);
                break;
            case "next":
                n = 0 == i ? o.options.slidesToScroll : i, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide + n, !1, t);
                break;
            case "index":
                var n = 0 === e.data.index ? 0 : e.data.index || s.index() * o.options.slidesToScroll;
                o.slideHandler(o.checkNavigable(n), !1, t), s.children().trigger("focus");
                break;
            default:
                return
        }
    }, r.prototype.checkNavigable = function(e) {
        var t = this.getNavigableIndexes(),
            i = 0;
        if (e > t[t.length - 1]) e = t[t.length - 1];
        else
            for (var o in t) {
                if (e < t[o]) {
                    e = i;
                    break
                }
                i = t[o]
            }
        return e
    }, r.prototype.cleanUpEvents = function() {
        var e = this;
        e.options.dots && null !== e.$dots && (d("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", d.proxy(e.interrupt, e, !0)).off("mouseleave.slick", d.proxy(e.interrupt, e, !1)), !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)), e.$slider.off("focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), d(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && d(e.$slideTrack).children().off("click.slick", e.selectHandler), d(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), d(window).off("resize.slick.slick-" + e.instanceUid, e.resize), d("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), d(window).off("load.slick.slick-" + e.instanceUid, e.setPosition)
    }, r.prototype.cleanUpSlideEvents = function() {
        var e = this;
        e.$list.off("mouseenter.slick", d.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", d.proxy(e.interrupt, e, !1))
    }, r.prototype.cleanUpRows = function() {
        var e;
        0 < this.options.rows && ((e = this.$slides.children().children()).removeAttr("style"), this.$slider.empty().append(e))
    }, r.prototype.clickHandler = function(e) {
        !1 === this.shouldClick && (e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault())
    }, r.prototype.destroy = function(e) {
        var t = this;
        t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), d(".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t.$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t.$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t.$slides && (t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
            d(this).attr("style", d(this).data("originalStyling"))
        }), t.$slideTrack.children(this.options.slide).detach(), t.$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider.removeClass("slick-initialized"), t.$slider.removeClass("slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy", [t])
    }, r.prototype.disableTransition = function(e) {
        var t = {};
        t[this.transitionType] = "", (!1 === this.options.fade ? this.$slideTrack : this.$slides.eq(e)).css(t)
    }, r.prototype.fadeSlide = function(e, t) {
        var i = this;
        !1 === i.cssTransitions ? (i.$slides.eq(e).css({
            zIndex: i.options.zIndex
        }), i.$slides.eq(e).animate({
            opacity: 1
        }, i.options.speed, i.options.easing, t)) : (i.applyTransition(e), i.$slides.eq(e).css({
            opacity: 1,
            zIndex: i.options.zIndex
        }), t && setTimeout(function() {
            i.disableTransition(e), t.call()
        }, i.options.speed))
    }, r.prototype.fadeSlideOut = function(e) {
        var t = this;
        !1 === t.cssTransitions ? t.$slides.eq(e).animate({
            opacity: 0,
            zIndex: t.options.zIndex - 2
        }, t.options.speed, t.options.easing) : (t.applyTransition(e), t.$slides.eq(e).css({
            opacity: 0,
            zIndex: t.options.zIndex - 2
        }))
    }, r.prototype.filterSlides = r.prototype.slickFilter = function(e) {
        var t = this;
        null !== e && (t.$slidesCache = t.$slides, t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.filter(e).appendTo(t.$slideTrack), t.reinit())
    }, r.prototype.focusHandler = function() {
        var i = this;
        i.$slider.off("focus.slick blur.slick").on("focus.slick", "*", function(e) {
            var t = d(this);
            setTimeout(function() {
                i.options.pauseOnFocus && t.is(":focus") && (i.focussed = !0, i.autoPlay())
            }, 0)
        }).on("blur.slick", "*", function(e) {
            d(this);
            i.options.pauseOnFocus && (i.focussed = !1, i.autoPlay())
        })
    }, r.prototype.getCurrent = r.prototype.slickCurrentSlide = function() {
        return this.currentSlide
    }, r.prototype.getDotCount = function() {
        var e = this,
            t = 0,
            i = 0,
            o = 0;
        if (!0 === e.options.infinite)
            if (e.slideCount <= e.options.slidesToShow) ++o;
            else
                for (; t < e.slideCount;) ++o, t = i + e.options.slidesToScroll, i += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        else if (!0 === e.options.centerMode) o = e.slideCount;
        else if (e.options.asNavFor)
            for (; t < e.slideCount;) ++o, t = i + e.options.slidesToScroll, i += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        else o = 1 + Math.ceil((e.slideCount - e.options.slidesToShow) / e.options.slidesToScroll);
        return o - 1
    }, r.prototype.getLeft = function(e) {
        var t, i, o = this,
            s = 0;
        return o.slideOffset = 0, t = o.$slides.first().outerHeight(!0), !0 === o.options.infinite ? (o.slideCount > o.options.slidesToShow && (o.slideOffset = o.slideWidth * o.options.slidesToShow * -1, i = -1, !0 === o.options.vertical && !0 === o.options.centerMode && (2 === o.options.slidesToShow ? i = -1.5 : 1 === o.options.slidesToShow && (i = -2)), s = t * o.options.slidesToShow * i), o.slideCount % o.options.slidesToScroll != 0 && e + o.options.slidesToScroll > o.slideCount && o.slideCount > o.options.slidesToShow && (s = e > o.slideCount ? (o.slideOffset = (o.options.slidesToShow - (e - o.slideCount)) * o.slideWidth * -1, (o.options.slidesToShow - (e - o.slideCount)) * t * -1) : (o.slideOffset = o.slideCount % o.options.slidesToScroll * o.slideWidth * -1, o.slideCount % o.options.slidesToScroll * t * -1))) : e + o.options.slidesToShow > o.slideCount && (o.slideOffset = (e + o.options.slidesToShow - o.slideCount) * o.slideWidth, s = (e + o.options.slidesToShow - o.slideCount) * t), o.slideCount <= o.options.slidesToShow && (s = o.slideOffset = 0), !0 === o.options.centerMode && o.slideCount <= o.options.slidesToShow ? o.slideOffset = o.slideWidth * Math.floor(o.options.slidesToShow) / 2 - o.slideWidth * o.slideCount / 2 : !0 === o.options.centerMode && !0 === o.options.infinite ? o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2) - o.slideWidth : !0 === o.options.centerMode && (o.slideOffset = 0, o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2)), t = !1 === o.options.vertical ? e * o.slideWidth * -1 + o.slideOffset : e * t * -1 + s, !0 === o.options.variableWidth && (s = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(e) : o.$slideTrack.children(".slick-slide").eq(e + o.options.slidesToShow), t = !0 === o.options.rtl ? s[0] ? -1 * (o.$slideTrack.width() - s[0].offsetLeft - s.width()) : 0 : s[0] ? -1 * s[0].offsetLeft : 0, !0 === o.options.centerMode && (s = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(e) : o.$slideTrack.children(".slick-slide").eq(e + o.options.slidesToShow + 1), t = !0 === o.options.rtl ? s[0] ? -1 * (o.$slideTrack.width() - s[0].offsetLeft - s.width()) : 0 : s[0] ? -1 * s[0].offsetLeft : 0, t += (o.$list.width() - s.outerWidth()) / 2)), t
    }, r.prototype.getOption = r.prototype.slickGetOption = function(e) {
        return this.options[e]
    }, r.prototype.getNavigableIndexes = function() {
        for (var e = this, t = 0, i = 0, o = [], s = !1 === e.options.infinite ? e.slideCount : (t = -1 * e.options.slidesToScroll, i = -1 * e.options.slidesToScroll, 2 * e.slideCount); t < s;) o.push(t), t = i + e.options.slidesToScroll, i += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        return o
    }, r.prototype.getSlick = function() {
        return this
    }, r.prototype.getSlideCount = function() {
        var s, n = this,
            e = !0 === n.options.centerMode ? Math.floor(n.$list.width() / 2) : 0,
            r = -1 * n.swipeLeft + e;
        return !0 === n.options.swipeToSlide ? (n.$slideTrack.find(".slick-slide").each(function(e, t) {
            var i = d(t).outerWidth(),
                o = t.offsetLeft;
            if (!0 !== n.options.centerMode && (o += i / 2), r < o + i) return s = t, !1
        }), Math.abs(d(s).attr("data-slick-index") - n.currentSlide) || 1) : n.options.slidesToScroll
    }, r.prototype.goTo = r.prototype.slickGoTo = function(e, t) {
        this.changeSlide({
            data: {
                message: "index",
                index: parseInt(e)
            }
        }, t)
    }, r.prototype.init = function(e) {
        var t = this;
        d(t.$slider).hasClass("slick-initialized") || (d(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()), e && t.$slider.trigger("init", [t]), !0 === t.options.accessibility && t.initADA(), t.options.autoplay && (t.paused = !1, t.autoPlay())
    }, r.prototype.initADA = function() {
        var i = this,
            o = Math.ceil(i.slideCount / i.options.slidesToShow),
            s = i.getNavigableIndexes().filter(function(e) {
                return 0 <= e && e < i.slideCount
            });
        i.$slides.add(i.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({
            tabindex: "-1"
        }), null !== i.$dots && (i.$slides.not(i.$slideTrack.find(".slick-cloned")).each(function(e) {
            var t = s.indexOf(e);
            d(this).attr({
                role: "tabpanel",
                id: "slick-slide" + i.instanceUid + e,
                tabindex: -1
            }), -1 !== t && (t = "slick-slide-control" + i.instanceUid + t, d("#" + t).length && d(this).attr({
                "aria-describedby": t
            }))
        }), i.$dots.attr("role", "tablist").find("li").each(function(e) {
            var t = s[e];
            d(this).attr({
                role: "presentation"
            }), d(this).find("button").first().attr({
                role: "tab",
                id: "slick-slide-control" + i.instanceUid + e,
                "aria-controls": "slick-slide" + i.instanceUid + t,
                "aria-label": e + 1 + " of " + o,
                "aria-selected": null,
                tabindex: "-1"
            })
        }).eq(i.currentSlide).find("button").attr({
            "aria-selected": "true",
            tabindex: "0"
        }).end());
        for (var e = i.currentSlide, t = e + i.options.slidesToShow; e < t; e++) i.options.focusOnChange ? i.$slides.eq(e).attr({
            tabindex: "0"
        }) : i.$slides.eq(e).removeAttr("tabindex");
        i.activateADA()
    }, r.prototype.initArrowEvents = function() {
        var e = this;
        !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.off("click.slick").on("click.slick", {
            message: "previous"
        }, e.changeSlide), e.$nextArrow.off("click.slick").on("click.slick", {
            message: "next"
        }, e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow.on("keydown.slick", e.keyHandler), e.$nextArrow.on("keydown.slick", e.keyHandler)))
    }, r.prototype.initDotEvents = function() {
        var e = this;
        !0 === e.options.dots && e.slideCount > e.options.slidesToShow && (d("li", e.$dots).on("click.slick", {
            message: "index"
        }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)), !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && e.slideCount > e.options.slidesToShow && d("li", e.$dots).on("mouseenter.slick", d.proxy(e.interrupt, e, !0)).on("mouseleave.slick", d.proxy(e.interrupt, e, !1))
    }, r.prototype.initSlideEvents = function() {
        var e = this;
        e.options.pauseOnHover && (e.$list.on("mouseenter.slick", d.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", d.proxy(e.interrupt, e, !1)))
    }, r.prototype.initializeEvents = function() {
        var e = this;
        e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
            action: "start"
        }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
            action: "move"
        }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
            action: "end"
        }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
            action: "end"
        }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), d(document).on(e.visibilityChange, d.proxy(e.visibility, e)), !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && d(e.$slideTrack).children().on("click.slick", e.selectHandler), d(window).on("orientationchange.slick.slick-" + e.instanceUid, d.proxy(e.orientationChange, e)), d(window).on("resize.slick.slick-" + e.instanceUid, d.proxy(e.resize, e)), d("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), d(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), d(e.setPosition)
    }, r.prototype.initUI = function() {
        var e = this;
        !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.show(), e.$nextArrow.show()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.show()
    }, r.prototype.keyHandler = function(e) {
        var t = this;
        e.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === e.keyCode && !0 === t.options.accessibility ? t.changeSlide({
            data: {
                message: !0 === t.options.rtl ? "next" : "previous"
            }
        }) : 39 === e.keyCode && !0 === t.options.accessibility && t.changeSlide({
            data: {
                message: !0 === t.options.rtl ? "previous" : "next"
            }
        }))
    }, r.prototype.lazyLoad = function() {
        var e, t, i, n = this;

        function o(e) {
            d("img[data-lazy]", e).each(function() {
                var e = d(this),
                    t = d(this).attr("data-lazy"),
                    i = d(this).attr("data-srcset"),
                    o = d(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
                    s = document.createElement("img");
                s.onload = function() {
                    e.animate({
                        opacity: 0
                    }, 100, function() {
                        i && (e.attr("srcset", i), o && e.attr("sizes", o)), e.attr("src", t).animate({
                            opacity: 1
                        }, 200, function() {
                            e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")
                        }), n.$slider.trigger("lazyLoaded", [n, e, t])
                    })
                }, s.onerror = function() {
                    e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t])
                }, s.src = t
            })
        }
        if (!0 === n.options.centerMode ? i = !0 === n.options.infinite ? (t = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2 : (t = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1)), n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide) : (t = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide, i = Math.ceil(t + n.options.slidesToShow), !0 === n.options.fade && (0 < t && t--, i <= n.slideCount && i++)), e = n.$slider.find(".slick-slide").slice(t, i), "anticipated" === n.options.lazyLoad)
            for (var s = t - 1, r = i, l = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) s < 0 && (s = n.slideCount - 1), e = (e = e.add(l.eq(s))).add(l.eq(r)), s--, r++;
        o(e), n.slideCount <= n.options.slidesToShow ? o(n.$slider.find(".slick-slide")) : n.currentSlide >= n.slideCount - n.options.slidesToShow ? o(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) : 0 === n.currentSlide && o(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow))
    }, r.prototype.loadSlider = function() {
        var e = this;
        e.setPosition(), e.$slideTrack.css({
            opacity: 1
        }), e.$slider.removeClass("slick-loading"), e.initUI(), "progressive" === e.options.lazyLoad && e.progressiveLazyLoad()
    }, r.prototype.next = r.prototype.slickNext = function() {
        this.changeSlide({
            data: {
                message: "next"
            }
        })
    }, r.prototype.orientationChange = function() {
        this.checkResponsive(), this.setPosition()
    }, r.prototype.pause = r.prototype.slickPause = function() {
        this.autoPlayClear(), this.paused = !0
    }, r.prototype.play = r.prototype.slickPlay = function() {
        var e = this;
        e.autoPlay(), e.options.autoplay = !0, e.paused = !1, e.focussed = !1, e.interrupted = !1
    }, r.prototype.postSlide = function(e) {
        var t = this;
        t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t.animating = !1, t.slideCount > t.options.slidesToShow && t.setPosition(), t.swipeLeft = null, t.options.autoplay && t.autoPlay(), !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && d(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()))
    }, r.prototype.prev = r.prototype.slickPrev = function() {
        this.changeSlide({
            data: {
                message: "previous"
            }
        })
    }, r.prototype.preventDefault = function(e) {
        e.preventDefault()
    }, r.prototype.progressiveLazyLoad = function(e) {
        e = e || 1;
        var t, i, o, s, n = this,
            r = d("img[data-lazy]", n.$slider);
        r.length ? (t = r.first(), i = t.attr("data-lazy"), o = t.attr("data-srcset"), s = t.attr("data-sizes") || n.$slider.attr("data-sizes"), (r = document.createElement("img")).onload = function() {
            o && (t.attr("srcset", o), s && t.attr("sizes", s)), t.attr("src", i).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === n.options.adaptiveHeight && n.setPosition(), n.$slider.trigger("lazyLoaded", [n, t, i]), n.progressiveLazyLoad()
        }, r.onerror = function() {
            e < 3 ? setTimeout(function() {
                n.progressiveLazyLoad(e + 1)
            }, 500) : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, t, i]), n.progressiveLazyLoad())
        }, r.src = i) : n.$slider.trigger("allImagesLoaded", [n])
    }, r.prototype.refresh = function(e) {
        var t = this,
            i = t.slideCount - t.options.slidesToShow;
        !t.options.infinite && t.currentSlide > i && (t.currentSlide = i), t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0), i = t.currentSlide, t.destroy(!0), d.extend(t, t.initials, {
            currentSlide: i
        }), t.init(), e || t.changeSlide({
            data: {
                message: "index",
                index: i
            }
        }, !1)
    }, r.prototype.registerBreakpoints = function() {
        var e, t, i, o = this,
            s = o.options.responsive || null;
        if ("array" === d.type(s) && s.length) {
            for (e in o.respondTo = o.options.respondTo || "window", s)
                if (i = o.breakpoints.length - 1, s.hasOwnProperty(e)) {
                    for (t = s[e].breakpoint; 0 <= i;) o.breakpoints[i] && o.breakpoints[i] === t && o.breakpoints.splice(i, 1), i--;
                    o.breakpoints.push(t), o.breakpointSettings[t] = s[e].settings
                } o.breakpoints.sort(function(e, t) {
                return o.options.mobileFirst ? e - t : t - e
            })
        }
    }, r.prototype.reinit = function() {
        var e = this;
        e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), !0 === e.options.focusOnSelect && d(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e])
    }, r.prototype.resize = function() {
        var e = this;
        d(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function() {
            e.windowWidth = d(window).width(), e.checkResponsive(), e.unslicked || e.setPosition()
        }, 50))
    }, r.prototype.removeSlide = r.prototype.slickRemove = function(e, t, i) {
        var o = this;
        if (e = "boolean" == typeof e ? !0 === (t = e) ? 0 : o.slideCount - 1 : !0 === t ? --e : e, o.slideCount < 1 || e < 0 || e > o.slideCount - 1) return !1;
        o.unload(), (!0 === i ? o.$slideTrack.children() : o.$slideTrack.children(this.options.slide).eq(e)).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit()
    }, r.prototype.setCSS = function(e) {
        var t, i, o = this,
            s = {};
        !0 === o.options.rtl && (e = -e), t = "left" == o.positionProp ? Math.ceil(e) + "px" : "0px", i = "top" == o.positionProp ? Math.ceil(e) + "px" : "0px", s[o.positionProp] = e, !1 === o.transformsEnabled || (!(s = {}) === o.cssTransitions ? s[o.animType] = "translate(" + t + ", " + i + ")" : s[o.animType] = "translate3d(" + t + ", " + i + ", 0px)"), o.$slideTrack.css(s)
    }, r.prototype.setDimensions = function() {
        var e = this;
        !1 === e.options.vertical ? !0 === e.options.centerMode && e.$list.css({
            padding: "0px " + e.options.centerPadding
        }) : (e.$list.height(e.$slides.first().outerHeight(!0) * e.options.slidesToShow), !0 === e.options.centerMode && e.$list.css({
            padding: e.options.centerPadding + " 0px"
        })), e.listWidth = e.$list.width(), e.listHeight = e.$list.height(), !1 === e.options.vertical && !1 === e.options.variableWidth ? (e.slideWidth = Math.ceil(e.listWidth / e.options.slidesToShow), e.$slideTrack.width(Math.ceil(e.slideWidth * e.$slideTrack.children(".slick-slide").length))) : !0 === e.options.variableWidth ? e.$slideTrack.width(5e3 * e.slideCount) : (e.slideWidth = Math.ceil(e.listWidth), e.$slideTrack.height(Math.ceil(e.$slides.first().outerHeight(!0) * e.$slideTrack.children(".slick-slide").length)));
        var t = e.$slides.first().outerWidth(!0) - e.$slides.first().width();
        !1 === e.options.variableWidth && e.$slideTrack.children(".slick-slide").width(e.slideWidth - t)
    }, r.prototype.setFade = function() {
        var i, o = this;
        o.$slides.each(function(e, t) {
            i = o.slideWidth * e * -1, !0 === o.options.rtl ? d(t).css({
                position: "relative",
                right: i,
                top: 0,
                zIndex: o.options.zIndex - 2,
                opacity: 0
            }) : d(t).css({
                position: "relative",
                left: i,
                top: 0,
                zIndex: o.options.zIndex - 2,
                opacity: 0
            })
        }), o.$slides.eq(o.currentSlide).css({
            zIndex: o.options.zIndex - 1,
            opacity: 1
        })
    }, r.prototype.setHeight = function() {
        var e, t = this;
        1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical && (e = t.$slides.eq(t.currentSlide).outerHeight(!0), t.$list.css("height", e))
    }, r.prototype.setOption = r.prototype.slickSetOption = function() {
        var e, t, i, o, s, n = this,
            r = !1;
        if ("object" === d.type(arguments[0]) ? (i = arguments[0], r = arguments[1], s = "multiple") : "string" === d.type(arguments[0]) && (i = arguments[0], o = arguments[1], r = arguments[2], "responsive" === arguments[0] && "array" === d.type(arguments[1]) ? s = "responsive" : void 0 !== arguments[1] && (s = "single")), "single" === s) n.options[i] = o;
        else if ("multiple" === s) d.each(i, function(e, t) {
            n.options[e] = t
        });
        else if ("responsive" === s)
            for (t in o)
                if ("array" !== d.type(n.options.responsive)) n.options.responsive = [o[t]];
                else {
                    for (e = n.options.responsive.length - 1; 0 <= e;) n.options.responsive[e].breakpoint === o[t].breakpoint && n.options.responsive.splice(e, 1), e--;
                    n.options.responsive.push(o[t])
                } r && (n.unload(), n.reinit())
    }, r.prototype.setPosition = function() {
        var e = this;
        e.setDimensions(), e.setHeight(), !1 === e.options.fade ? e.setCSS(e.getLeft(e.currentSlide)) : e.setFade(), e.$slider.trigger("setPosition", [e])
    }, r.prototype.setProps = function() {
        var e = this,
            t = document.body.style;
        e.positionProp = !0 === e.options.vertical ? "top" : "left", "top" === e.positionProp ? e.$slider.addClass("slick-vertical") : e.$slider.removeClass("slick-vertical"), void 0 === t.WebkitTransition && void 0 === t.MozTransition && void 0 === t.msTransition || !0 === e.options.useCSS && (e.cssTransitions = !0), e.options.fade && ("number" == typeof e.options.zIndex ? e.options.zIndex < 3 && (e.options.zIndex = 3) : e.options.zIndex = e.defaults.zIndex), void 0 !== t.OTransform && (e.animType = "OTransform", e.transformType = "-o-transform", e.transitionType = "OTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.MozTransform && (e.animType = "MozTransform", e.transformType = "-moz-transform", e.transitionType = "MozTransition", void 0 === t.perspectiveProperty && void 0 === t.MozPerspective && (e.animType = !1)), void 0 !== t.webkitTransform && (e.animType = "webkitTransform", e.transformType = "-webkit-transform", e.transitionType = "webkitTransition", void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)), void 0 !== t.msTransform && (e.animType = "msTransform", e.transformType = "-ms-transform", e.transitionType = "msTransition", void 0 === t.msTransform && (e.animType = !1)), void 0 !== t.transform && !1 !== e.animType && (e.animType = "transform", e.transformType = "transform", e.transitionType = "transition"), e.transformsEnabled = e.options.useTransform && null !== e.animType && !1 !== e.animType
    }, r.prototype.setSlideClasses = function(e) {
        var t, i, o, s = this,
            n = s.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true");
        s.$slides.eq(e).addClass("slick-current"), !0 === s.options.centerMode ? (i = s.options.slidesToShow % 2 == 0 ? 1 : 0, o = Math.floor(s.options.slidesToShow / 2), !0 === s.options.infinite && (o <= e && e <= s.slideCount - 1 - o ? s.$slides.slice(e - o + i, e + o + 1).addClass("slick-active").attr("aria-hidden", "false") : (t = s.options.slidesToShow + e, n.slice(t - o + 1 + i, t + o + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === e ? n.eq(n.length - 1 - s.options.slidesToShow).addClass("slick-center") : e === s.slideCount - 1 && n.eq(s.options.slidesToShow).addClass("slick-center")), s.$slides.eq(e).addClass("slick-center")) : 0 <= e && e <= s.slideCount - s.options.slidesToShow ? s.$slides.slice(e, e + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : n.length <= s.options.slidesToShow ? n.addClass("slick-active").attr("aria-hidden", "false") : (o = s.slideCount % s.options.slidesToShow, t = !0 === s.options.infinite ? s.options.slidesToShow + e : e, (s.options.slidesToShow == s.options.slidesToScroll && s.slideCount - e < s.options.slidesToShow ? n.slice(t - (s.options.slidesToShow - o), t + o) : n.slice(t, t + s.options.slidesToShow)).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" !== s.options.lazyLoad && "anticipated" !== s.options.lazyLoad || s.lazyLoad()
    }, r.prototype.setupInfinite = function() {
        var e, t, i, o = this;
        if (!0 === o.options.fade && (o.options.centerMode = !1), !0 === o.options.infinite && !1 === o.options.fade && (t = null, o.slideCount > o.options.slidesToShow)) {
            for (i = !0 === o.options.centerMode ? o.options.slidesToShow + 1 : o.options.slidesToShow, e = o.slideCount; e > o.slideCount - i; --e) d(o.$slides[t = e - 1]).clone(!0).attr("id", "").attr("data-slick-index", t - o.slideCount).prependTo(o.$slideTrack).addClass("slick-cloned");
            for (e = 0; e < i + o.slideCount; e += 1) d(o.$slides[t = e]).clone(!0).attr("id", "").attr("data-slick-index", t + o.slideCount).appendTo(o.$slideTrack).addClass("slick-cloned");
            o.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                d(this).attr("id", "")
            })
        }
    }, r.prototype.interrupt = function(e) {
        e || this.autoPlay(), this.interrupted = e
    }, r.prototype.selectHandler = function(e) {
        e = d(e.target).is(".slick-slide") ? d(e.target) : d(e.target).parents(".slick-slide"), e = (e = parseInt(e.attr("data-slick-index"))) || 0;
        this.slideCount <= this.options.slidesToShow ? this.slideHandler(e, !1, !0) : this.slideHandler(e)
    }, r.prototype.slideHandler = function(e, t, i) {
        var o, s, n, r, l = this;
        if (t = t || !1, !(!0 === l.animating && !0 === l.options.waitForAnimate || !0 === l.options.fade && l.currentSlide === e))
            if (!1 === t && l.asNavFor(e), n = l.getLeft(o = e), t = l.getLeft(l.currentSlide), l.currentLeft = null === l.swipeLeft ? t : l.swipeLeft, !1 === l.options.infinite && !1 === l.options.centerMode && (e < 0 || e > l.getDotCount() * l.options.slidesToScroll)) !1 === l.options.fade && (o = l.currentSlide, !0 !== i && l.slideCount > l.options.slidesToShow ? l.animateSlide(t, function() {
                l.postSlide(o)
            }) : l.postSlide(o));
            else if (!1 === l.options.infinite && !0 === l.options.centerMode && (e < 0 || e > l.slideCount - l.options.slidesToScroll)) !1 === l.options.fade && (o = l.currentSlide, !0 !== i && l.slideCount > l.options.slidesToShow ? l.animateSlide(t, function() {
            l.postSlide(o)
        }) : l.postSlide(o));
        else {
            if (l.options.autoplay && clearInterval(l.autoPlayTimer), s = o < 0 ? l.slideCount % l.options.slidesToScroll != 0 ? l.slideCount - l.slideCount % l.options.slidesToScroll : l.slideCount + o : o >= l.slideCount ? l.slideCount % l.options.slidesToScroll != 0 ? 0 : o - l.slideCount : o, l.animating = !0, l.$slider.trigger("beforeChange", [l, l.currentSlide, s]), t = l.currentSlide, l.currentSlide = s, l.setSlideClasses(l.currentSlide), l.options.asNavFor && (r = (r = l.getNavTarget()).slick("getSlick")).slideCount <= r.options.slidesToShow && r.setSlideClasses(l.currentSlide), l.updateDots(), l.updateArrows(), !0 === l.options.fade) return !0 !== i ? (l.fadeSlideOut(t), l.fadeSlide(s, function() {
                l.postSlide(s)
            })) : l.postSlide(s), void l.animateHeight();
            !0 !== i && l.slideCount > l.options.slidesToShow ? l.animateSlide(n, function() {
                l.postSlide(s)
            }) : l.postSlide(s)
        }
    }, r.prototype.startLoad = function() {
        var e = this;
        !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.hide(), e.$nextArrow.hide()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.hide(), e.$slider.addClass("slick-loading")
    }, r.prototype.swipeDirection = function() {
        var e = this,
            t = e.touchObject.startX - e.touchObject.curX,
            i = e.touchObject.startY - e.touchObject.curY,
            t = Math.atan2(i, t),
            t = Math.round(180 * t / Math.PI);
        return (t = t < 0 ? 360 - Math.abs(t) : t) <= 45 && 0 <= t || t <= 360 && 315 <= t ? !1 === e.options.rtl ? "left" : "right" : 135 <= t && t <= 225 ? !1 === e.options.rtl ? "right" : "left" : !0 === e.options.verticalSwiping ? 35 <= t && t <= 135 ? "down" : "up" : "vertical"
    }, r.prototype.swipeEnd = function(e) {
        var t, i, o = this;
        if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !1;
        if (o.interrupted = !1, o.shouldClick = !(10 < o.touchObject.swipeLength), void 0 === o.touchObject.curX) return !1;
        if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
            switch (i = o.swipeDirection()) {
                case "left":
                case "down":
                    t = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
                    break;
                case "right":
                case "up":
                    t = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1
            }
            "vertical" != i && (o.slideHandler(t), o.touchObject = {}, o.$slider.trigger("swipe", [o, i]))
        } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {})
    }, r.prototype.swipeHandler = function(e) {
        var t = this;
        if (!(!1 === t.options.swipe || "ontouchend" in document && !1 === t.options.swipe || !1 === t.options.draggable && -1 !== e.type.indexOf("mouse"))) switch (t.touchObject.fingerCount = e.originalEvent && void 0 !== e.originalEvent.touches ? e.originalEvent.touches.length : 1, t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold, !0 === t.options.verticalSwiping && (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold), e.data.action) {
            case "start":
                t.swipeStart(e);
                break;
            case "move":
                t.swipeMove(e);
                break;
            case "end":
                t.swipeEnd(e)
        }
    }, r.prototype.swipeMove = function(e) {
        var t, i, o = this,
            s = void 0 !== e.originalEvent ? e.originalEvent.touches : null;
        return !(!o.dragging || o.scrolling || s && 1 !== s.length) && (t = o.getLeft(o.currentSlide), o.touchObject.curX = void 0 !== s ? s[0].pageX : e.clientX, o.touchObject.curY = void 0 !== s ? s[0].pageY : e.clientY, o.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(o.touchObject.curX - o.touchObject.startX, 2))), i = Math.round(Math.sqrt(Math.pow(o.touchObject.curY - o.touchObject.startY, 2))), !o.options.verticalSwiping && !o.swiping && 4 < i ? !(o.scrolling = !0) : (!0 === o.options.verticalSwiping && (o.touchObject.swipeLength = i), s = o.swipeDirection(), void 0 !== e.originalEvent && 4 < o.touchObject.swipeLength && (o.swiping = !0, e.preventDefault()), i = (!1 === o.options.rtl ? 1 : -1) * (o.touchObject.curX > o.touchObject.startX ? 1 : -1), !0 === o.options.verticalSwiping && (i = o.touchObject.curY > o.touchObject.startY ? 1 : -1), e = o.touchObject.swipeLength, (o.touchObject.edgeHit = !1) === o.options.infinite && (0 === o.currentSlide && "right" === s || o.currentSlide >= o.getDotCount() && "left" === s) && (e = o.touchObject.swipeLength * o.options.edgeFriction, o.touchObject.edgeHit = !0), !1 === o.options.vertical ? o.swipeLeft = t + e * i : o.swipeLeft = t + e * (o.$list.height() / o.listWidth) * i, !0 === o.options.verticalSwiping && (o.swipeLeft = t + e * i), !0 !== o.options.fade && !1 !== o.options.touchMove && (!0 === o.animating ? (o.swipeLeft = null, !1) : void o.setCSS(o.swipeLeft))))
    }, r.prototype.swipeStart = function(e) {
        var t, i = this;
        if (i.interrupted = !0, 1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow) return !(i.touchObject = {});
        void 0 !== e.originalEvent && void 0 !== e.originalEvent.touches && (t = e.originalEvent.touches[0]), i.touchObject.startX = i.touchObject.curX = void 0 !== t ? t.pageX : e.clientX, i.touchObject.startY = i.touchObject.curY = void 0 !== t ? t.pageY : e.clientY, i.dragging = !0
    }, r.prototype.unfilterSlides = r.prototype.slickUnfilter = function() {
        var e = this;
        null !== e.$slidesCache && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.appendTo(e.$slideTrack), e.reinit())
    }, r.prototype.unload = function() {
        var e = this;
        d(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    }, r.prototype.unslick = function(e) {
        this.$slider.trigger("unslick", [this, e]), this.destroy()
    }, r.prototype.updateArrows = function() {
        var e = this;
        Math.floor(e.options.slidesToShow / 2);
        !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && !e.options.infinite && (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === e.currentSlide ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : (e.currentSlide >= e.slideCount - e.options.slidesToShow && !1 === e.options.centerMode || e.currentSlide >= e.slideCount - 1 && !0 === e.options.centerMode) && (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
    }, r.prototype.updateDots = function() {
        var e = this;
        null !== e.$dots && (e.$dots.find("li").removeClass("slick-active").end(), e.$dots.find("li").eq(Math.floor(e.currentSlide / e.options.slidesToScroll)).addClass("slick-active"))
    }, r.prototype.visibility = function() {
        this.options.autoplay && (document[this.hidden] ? this.interrupted = !0 : this.interrupted = !1)
    }, d.fn.slick = function() {
        for (var e, t = this, i = arguments[0], o = Array.prototype.slice.call(arguments, 1), s = t.length, n = 0; n < s; n++)
            if ("object" == typeof i || void 0 === i ? t[n].slick = new r(t[n], i) : e = t[n].slick[i].apply(t[n].slick, o), void 0 !== e) return e;
        return t
    }
}), jQuery(document).ready(function(i) {
    jQuery.event.special.touchstart = {
        setup: function(e, t, i) {
            this.addEventListener("touchstart", i, {
                passive: !t.includes("noPreventDefault")
            })
        }
    }, jQuery.event.special.touchmove = {
        setup: function(e, t, i) {
            this.addEventListener("touchmove", i, {
                passive: !t.includes("noPreventDefault")
            })
        }
    }, jQuery.event.special.wheel = {
        setup: function(e, t, i) {
            this.addEventListener("wheel", i, {
                passive: !0
            })
        }
    }, jQuery.event.special.mousewheel = {
        setup: function(e, t, i) {
            this.addEventListener("mousewheel", i, {
                passive: !0
            })
        }
    }, i(".page-template-page-homepage header.site-header").addClass("homepage-hero-header"), i("header.site-header").hasClass("homepage-hero-header") ? console.log("on homepage") : i("header.site-header").addClass("inner-pages");
    i(".products-menu").height();
    var e = -1 * (i(".products-menu").height() + 123);
    i(".products-menu").css("bottom", e);
    i(".solutions-menu").height();
    e = -1 * (i(".solutions-menu").height() + 150);
    i(".solutions-menu").css("bottom", e);
    i(".markets-menu").height();
    e = -1 * (i(".markets-menu").height() + 150);
    i(".markets-menu").css("bottom", e), i(".products-header-title").hover(function() {
        i(".products-menu").addClass("menu-open")
    }, function() {
        setTimeout(function() {
            0 == i(".products-menu:hover").length && (i(".products-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0"))
        }, 250)
    }), i(".solutions-header-title").hover(function() {
        i(".solutions-menu").addClass("menu-open")
    }, function() {
        setTimeout(function() {
            0 == i(".solutions-menu:hover").length && (i(".solutions-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0"))
        }, 250)
    }), i(".markets-header-title").hover(function() {
        i(".markets-menu").addClass("menu-open")
    }, function() {
        setTimeout(function() {
            0 == i(".markets-menu:hover").length && (i(".markets-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0"))
        }, 250)
    }), i(".products-menu").hover(function() {}, function() {
        i(".products-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0")
    }), i(".solutions-menu").hover(function() {}, function() {
        i(".solutions-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0")
    }), i(".markets-menu").hover(function() {}, function() {
        i(".markets-menu").removeClass("menu-open"), i("header.site-menu").css("margin-bottom", "0")
    }), i(".mobile-trigger").click(function() {
        i(this).hasClass("trigger-active") ? (i(this).removeClass("trigger-active"), i(".mobile-menu").removeClass("mobile-menu-open"), i("html, body").css("overflow", "scroll"), i(".mobile-search-trigger").removeClass("active")) : (i(this).addClass("trigger-active"), i(".mobile-menu").addClass("mobile-menu-open"), i("html, body").css("overflow", "hidden"), i(".mobile-search-trigger").addClass("active"))
    }), i("header.site-header .menu-container .top-level .menu-inner form").click(function(e) {
        e.target == this && (i(this).hasClass("search-active") ? i(this).removeClass("search-active") : i(this).addClass("search-active"))
    }), i(".footer-module.become-a-partner .modal-form").each(function() {
        console.log("One of the modal forms"), i(this).appendTo(".footer-module-modal .modal-wrapper")
    }), i(".modal-footer-module").click(function(e) {
        e.preventDefault();
        var t = i(this).data("form"),
            e = i(this).data("randid");
        i(".footer-module-modal").addClass("modal-open"), i(".footer-module-modal .modal-form#form-" + t + "-" + e).css("display", "block")
    }), i("#closeFooterModuleModal").click(function() {
        i(".footer-module-modal").removeClass("modal-open"), i(".footer-module-modal .modal-form").each(function() {
            i(this).css("display", "none")
        })
    }), i(".history-slider-container").slick({
        infinite: !0,
        slidesToShow: 3.75,
        slidesToScroll: 1,
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 750,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), i(".history-slider-container .slick-arrow").each(function() {
        i(this).appendTo(i("section.page-module.history-slider .slider-buttons"))
    }), i(".page-module.faqs .faq-container .single-faq .title-container").click(function() {
        i(this).parent().data("faqid");
        console.log("title has been clicked"), i(this).parent().hasClass("faq-open") ? i(this).parent().removeClass("faq-open") : (i(this).parent().addClass("faq-open"), i(this).parent().find(".answer-container").slideDown())
    }), i(".single-product div.product .product-gallery .image-scroll").slick({
        infinite: !0,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: ".slick-next-c",
        prevArrow: ".slick-prev-c",
        asNavFor: i(".single-product div.product .product-gallery .featured-image-container .featured-slick")
    }), i(".single-product div.product .product-gallery .featured-image-container .featured-slick").slick({
        infinite: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: ".slick-next-c",
        prevArrow: ".slick-prev-c",
        asNavFor: i(".single-product div.product .product-gallery .image-scroll")
    }), i(".single-product div.product .product-gallery .image-scroll .single-image").click(function() {
        var e = i(this).data("imageid");
        console.log(e), i(".featured-image-container .single-image").each(function() {
            i(this).data("imageid") == e ? (console.log("this image matches"), i(this).addClass("feature-image"), i(this).removeClass("not-shown")) : (console.log("this data does not match"), i(this).removeClass("feature-image"), i(this).addClass("not-shown"))
        })
    }), i(".page-module.collapsable-list .list .title-container").click(function() {
        i(this).parent().hasClass("list-open") ? (i(this).parent().removeClass("list-open"), i(this).parent().addClass("list-closed")) : i(this).parent().hasClass("list-closed") && (i(this).parent().addClass("list-open"), i(this).parent().removeClass("list-closed"))
    }), i(".page-module.table").each(function() {
        var e;
        i(this).find("thead").length ? (e = i(this).find("thead tr th").length, i(this).find(".table-container").addClass("columns-" + e)) : i(this).find("tbody tr:first-of-type() td").length && (e = i(this).find("tbody tr:first-of-type() td").length, i(this).find(".table-container").addClass("columns-" + e))
    }), i(".page-module.featured-product-group .product-showcase .products-container .single-product .product-information h3").matchHeight(), i(".page-module.featured-product-group .product-showcase .products-container .single-product .product-information p").matchHeight(), i(".product-information .enquiry").click(function(e) {
        e.preventDefault(), i(".product-module-modal").addClass("modal-open")
    }), i("#closeProductModuleModal").click(function() {
        i(".product-module-modal").removeClass("modal-open")
    }), i(".slick-slide .single-image .caption").click(function() {
        i(this).hasClass("caption-open") ? i(this).removeClass("caption-open") : i(this).addClass("caption-open")
    }), i(".slick-next-c, .slick-prev-c").click(function() {
        i(".single-image .caption").each(function() {
            i(this).removeClass("caption-open")
        })
    }), i(".woocommerce-loop-product__title").matchHeight(), i(".case-studies .wrapper .filter-container .filter-text").click(function() {
        i(".filters-container").hasClass("filters-open") ? i(".filters-container").removeClass("filters-open") : i(".filters-container").addClass("filters-open"), console.log("filter container should now open")
    }), i(window).scroll(function() {
        700 <= i(window).scrollTop() ? i(".return-to-top").addClass("rendered") : i(".return-to-top").removeClass("rendered")
    }), i(".product-nav-inner .media-container a.contact").click(function(e) {
        e.preventDefault(), i(".modal.contact-enquire.contact-enquire-product-modal").addClass("modal-open")
    }), i(".contact-enquire-product-modal .modal-wrapper .close").click(function() {
        i(".modal.contact-enquire.contact-enquire-product-modal").removeClass("modal-open")
    }), i(".mobile-search-submit").bind("focusin focus", function(e) {
        e.preventDefault()
    }), i(".mobile-search-trigger").click(function() {
        i(".mobile-menu form").hasClass("active") ? (i(this).removeClass("focused"), i(".mobile-menu form").removeClass("active"), i(".mobile-menu ul").css("padding-top", "90px")) : (i(this).addClass("focused"), i(".mobile-menu form").addClass("active"), i(".mobile-menu ul").css("padding-top", "26px"))
    })
}), jQuery(document).ready(function(e) {
    var t = sessionStorage.getItem("banner-status");
    console.log(t), "closed" != t && (e(".referral-banner").addClass("rendered"), t = 2 * e(".referral-banner").height(), e("header.site-header").css("padding-top", t)), e(".referral-banner .close").click(function() {
        sessionStorage.setItem("banner-status", "closed"), e(".referral-banner").removeClass("rendered"), e("header.site-header").css("padding-top", 0)
    }), sessionStorage.setItem("banner-status", "closed")
}), jQuery(document).ready(function(i) {
    i(window).scroll(function() {
        200 <= i(window).scrollTop() ? (i(".product-nav-top").addClass("stuck"), i(".single-product .site-body").css("margin-top", "190px")) : (i(".product-nav-top").removeClass("stuck"), i(".single-product .site-body").css("margin-top", "0px"))
    });
    var t, o, s, n, r = i(".product-nav-inner .menu-container a"),
        e = i(i(".page-module").get().reverse()),
        l = {};
    e.each(function() {
        var e = i(this).attr("id");
        l[e] = i(".product-nav-inner .menu-container a[href=\\#" + e + "]")
    }), i(window).scroll((t = function() {
        var t = i(window).scrollTop();
        e.each(function() {
            var e = i(this);
            if (e.offset().top <= t + 230) {
                e = e.attr("id"), e = l[e];
                return e.hasClass("active") || (r.removeClass("active"), e.addClass("active")), !1
            }
        })
    }, o = 100, function() {
        var e = (new Date).getTime();
        s && e < s + o ? (clearTimeout(n), n = setTimeout(function() {
            s = e, t.call()
        }, o - (e - s))) : (s = e, t.call())
    })), i(".product-nav-inner .menu-container a").click(function(e) {
        var t = jQuery(this).attr("href"),
            t = jQuery(t).offset();
        i("html, body").stop().animate({
            scrollTop: t.top
        }, 1e3), e.preventDefault()
    })
}), jQuery(document).ready(function(i) {
    i("#heroScrollDown").click(function(e) {
        var t = i(this).attr("href"),
            t = i(t).offset();
        i("html, body").stop().animate({
            scrollTop: t.top
        }, 1e3), e.preventDefault()
    })
}), jQuery(document).ready(function(e) {
    e(".horizontal-logos .wrapper .inner").slick({
        autoplay: !0,
        dots: !1,
        arrows: !1,
        infinite: !0,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplaySpeed: 2e3,
        responsive: [{
            breakpoint: 1400,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 980,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
        }]
    })
});