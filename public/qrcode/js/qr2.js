"use strict";

function _classCallCheck(e, n) {
    if (!(e instanceof n)) throw new TypeError("Cannot call a class as a function")
}
var _createClass = function() {
    function e(e, n) {
        for (var t = 0; t < n.length; t++) {
            var i = n[t];
            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
    }
    return function(n, t, i) {
        return t && e(n.prototype, t), i && e(n, i), n
    }
}();
document.docReady(function() {
    ! function(e) {
        var n = e(".qrcodescan").first(),
            t = n.find(".preview-wrap").first(),
            i = n.find(".result-template")[0].innerHTML,
            r = n.find(".result").first();
        window.setTimeout(function() {
            t.hasClass("scanning") || t.hasClass("no-camera") || (t.removeClass("loading"), t.addClass("error"))
        }, 7e3);
        var a = new Instascan.Scanner({
            video: t.find("video")[0],
            mirror: !1
        });
        a.addListener("scan", function(e) {
            a.stop(), jQuery.ajax({
                url: "scan.log",
                type: "POST",
                dataType: "json",
                data: {
                    content: e
                }
            }), r.html(Mustache.render(i, {
                scan: new s(e)
            })), n.addClass("result-screen"), r.find(".scan-button").click(function() {
                n.removeClass("result-screen"), r.html(""), a.start()
            }), r.show()
        }), a.addListener("active", function() {
            t.addClass("scanning"), t.removeClass("loading"), t.removeClass("error"), t.show()
        }), a.addListener("inactive", function() {
            t.removeClass("scanning"), t.hide()
        }), Instascan.Camera.getCameras().then(function(e) {
            if (e.length > 0) {
                1 == e.length && (a.mirror = !0), e.reverse();
                for (var n = 0, i = 0; i < e.length; i++) /back/.match(e[i].name) && (n = i);
                a.start(e[n])
            } else t.removeClass("loading"), t.addClass("no-camera"), console.error("No cameras found.")
        })["catch"](function(e) {
            console.error(e)
        });
        var s = function() {
            function e(n) {
                _classCallCheck(this, e), this.isLink = !1, this.link = null, this.html = null, n = this.utf8Decode(n), this.content = n;
                var t = this.getLinkText();
                null !== t ? (this.isLink = !0, this.html = this.htmlspecialchars(t), this.link = this.content, this.linkIntro = this.getLinkIntro()) : this.html = this.nl2br(this.htmlspecialchars(n)), this.getLinkText = this.getLinkText.bind(this), this.getLinkText = this.getLinkText.bind(this), this.isMultiline = this.isMultiline.bind(this), this.displayMultiline = this.displayMultiline.bind(this)
            }
            return _createClass(e, [{
                key: "getLinkText",
                value: function() {
                    if (/^(http|https|ftp):\/\//i.match(this.content)) return this.content;
                    var e = /^(mailto):(.*)/i.exec(this.content);
                    return e ? e[2] : null
                }
            }, {
                key: "getLinkIntro",
                value: function() {
                    var e = /^(mailto):(.*)/i.exec(this.content);
                    return e ? "Email" : ""
                }
            }, {
                key: "isMultiline",
                value: function() {
                    return this.content.indexOf("\n") != -1
                }
            }, {
                key: "displayMultiline",
                value: function() {
                    return !this.isLink && (!!this.isMultiline() || this.content.length > 65)
                }
            }, {
                key: "utf8Decode",
                value: function(e) {
                    for (var n = "", t = 0, i = 0, r = 0, a = 0; t < e.length;) i = e.charCodeAt(t), i < 128 ? (n += String.fromCharCode(i), t++) : i > 191 && i < 224 ? (r = e.charCodeAt(t + 1), n += String.fromCharCode((31 & i) << 6 | 63 & r), t += 2) : (r = e.charCodeAt(t + 1), a = e.charCodeAt(t + 2), n += String.fromCharCode((15 & i) << 12 | (63 & r) << 6 | 63 & a), t += 3);
                    return n
                }
            }, {
                key: "nl2br",
                value: function(e) {
                    return "undefined" == typeof e || null === e ? "" : (e + "").replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "$1<br>$2")
                }
            }, {
                key: "htmlspecialchars",
                value: function(e, n, t, i) {
                    var r = 0,
                        a = 0,
                        s = !1;
                    "undefined" != typeof n && null !== n || (n = 2), e = e.toString(), i !== !1 && (e = e.replace(/&/g, "&amp;")), e = e.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    var l = {
                        ENT_NOQUOTES: 0,
                        ENT_HTML_QUOTE_SINGLE: 1,
                        ENT_HTML_QUOTE_DOUBLE: 2,
                        ENT_COMPAT: 2,
                        ENT_QUOTES: 3,
                        ENT_IGNORE: 4
                    };
                    if (0 === n && (s = !0), "number" != typeof n) {
                        for (n = [].concat(n), a = 0; a < n.length; a++) 0 === l[n[a]] ? s = !0 : l[n[a]] && (r |= l[n[a]]);
                        n = r
                    }
                    return n & l.ENT_HTML_QUOTE_SINGLE && (e = e.replace(/'/g, "&#039;")), s || (e = e.replace(/"/g, "&quot;")), e
                }
            }]), e
        }();
        e(".generate-banner a").on("click", function(e) {
            return dataLayer.push({
                event: "Analytics Legacy Event",
                eventCategory: "Scanner",
                eventAction: "Click Generate Banner"
            }), !0
        })
    }(jQuery)
});