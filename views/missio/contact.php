<section class="choose-bg">
    <style type="text/css">
    .form_info {
    width: 20%;
    position: absolute;
    top: 50%;
    right: 8%;
    color: #8a8a8a;
}
</style>
</section>
<!-- <section class="banner_sec contact_banner">
    <div class="wrapper">
        <div class="left_sec">
            <p><span>POWERED BY</span> The Pontifical Mission Societies. <a href="http://www.onefamilyinmission.org/">Learn more.</a></p>
            <h3>Connect</h3>
        </div>
        <div class="midd_sec"> <a href="/discover" class="cmn_link">Change at your fingertips</a> </div>
        <div class="right_sec"> <a href="#" class="cmn_link">Tools for change makers</a> </div>
    </div>
</section> -->
<section class="body_container about_us">
    <div class="wrapper">
        <section class="contact_sec">
            <h2>Pontifical Mission Societies in the United States</h2>
        </section>
        <section class="form_sec contact_form">
            <form action="/wapi/contact_us" method="post" id="contact_us">
                <fieldset>
                    <h3><strong>If you would like to find out more about Missio or the activities of the Pontifical Mission Societies, please contact us.</strong></h3>
                    <div class="f_row">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="f_row">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                    <div class="f_row">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="f_row styled_select">
                        <select name="reason" id="reason">
                            <option value="">Reason for Contact</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Suggestion">Suggestion</option>
                            <option value="Technical Problem">Technical Problem</option>
                            <option value="Non-Working Link">Non-Working Link</option>
                            <option value="Trouble Logging In">Trouble Logging In</option>
                        </select>
                    </div>
                    <div class="f_row">
                        <textarea name="message" id="message" placeholder="Message"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                </fieldset>
                <div class="message-container">
                    <div id="contact_us_message" class="message"></div>
                </div>
            </form>
            <h3 class="form_info"><strong>General Inquiries</strong> <a href="mailto:contact@missio.org">contact@missio.org</a></h3>
        </section>
    </div>
    <section class="app_download">
        <div class="wrapper">
            <h3>The Missio App</h3>
            <a href="https://itunes.apple.com/us/app/missio/id606393585" class="apple_store" target="_blank"><img src="/web/images/app_store.png" alt=""></a> <a class="google_play" href="https://play.google.com/store/apps/details?id=com.littleiapps.missio" target="_blank"><img src="/web/images/google_play2.png" alt=""></a> </div>
    </section>
</section>
<script>
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    a.extend(a.fn, {
        validate: function(b) {
            if (!this.length) return void(b && b.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."));
            var c = a.data(this[0], "validator");
            return c ? c : (this.attr("novalidate", "novalidate"), c = new a.validator(b, this[0]), a.data(this[0], "validator", c), c.settings.onsubmit && (this.validateDelegate(":submit", "click", function(b) {
                c.settings.submitHandler && (c.submitButton = b.target), a(b.target).hasClass("cancel") && (c.cancelSubmit = !0), void 0 !== a(b.target).attr("formnovalidate") && (c.cancelSubmit = !0)
            }), this.submit(function(b) {
                function d() {
                    var d, e;
                    return c.settings.submitHandler ? (c.submitButton && (d = a("<input type='hidden'/>").attr("name", c.submitButton.name).val(a(c.submitButton).val()).appendTo(c.currentForm)), e = c.settings.submitHandler.call(c, c.currentForm, b), c.submitButton && d.remove(), void 0 !== e ? e : !1) : !0
                }
                return c.settings.debug && b.preventDefault(), c.cancelSubmit ? (c.cancelSubmit = !1, d()) : c.form() ? c.pendingRequest ? (c.formSubmitted = !0, !1) : d() : (c.focusInvalid(), !1)
            })), c)
        },
        valid: function() {
            var b, c;
            return a(this[0]).is("form") ? b = this.validate().form() : (b = !0, c = a(this[0].form).validate(), this.each(function() {
                b = c.element(this) && b
            })), b
        },
        removeAttrs: function(b) {
            var c = {},
                d = this;
            return a.each(b.split(/\s/), function(a, b) {
                c[b] = d.attr(b), d.removeAttr(b)
            }), c
        },
        rules: function(b, c) {
            var d, e, f, g, h, i, j = this[0];
            if (b) switch (d = a.data(j.form, "validator").settings, e = d.rules, f = a.validator.staticRules(j), b) {
                case "add":
                    a.extend(f, a.validator.normalizeRule(c)), delete f.messages, e[j.name] = f, c.messages && (d.messages[j.name] = a.extend(d.messages[j.name], c.messages));
                    break;
                case "remove":
                    return c ? (i = {}, a.each(c.split(/\s/), function(b, c) {
                        i[c] = f[c], delete f[c], "required" === c && a(j).removeAttr("aria-required")
                    }), i) : (delete e[j.name], f)
            }
            return g = a.validator.normalizeRules(a.extend({}, a.validator.classRules(j), a.validator.attributeRules(j), a.validator.dataRules(j), a.validator.staticRules(j)), j), g.required && (h = g.required, delete g.required, g = a.extend({
                required: h
            }, g), a(j).attr("aria-required", "true")), g.remote && (h = g.remote, delete g.remote, g = a.extend(g, {
                remote: h
            })), g
        }
    }), a.extend(a.expr[":"], {
        blank: function(b) {
            return !a.trim("" + a(b).val())
        },
        filled: function(b) {
            return !!a.trim("" + a(b).val())
        },
        unchecked: function(b) {
            return !a(b).prop("checked")
        }
    }), a.validator = function(b, c) {
        this.settings = a.extend(!0, {}, a.validator.defaults, b), this.currentForm = c, this.init()
    }, a.validator.format = function(b, c) {
        return 1 === arguments.length ? function() {
            var c = a.makeArray(arguments);
            return c.unshift(b), a.validator.format.apply(this, c)
        } : (arguments.length > 2 && c.constructor !== Array && (c = a.makeArray(arguments).slice(1)), c.constructor !== Array && (c = [c]), a.each(c, function(a, c) {
            b = b.replace(new RegExp("\\{" + a + "\\}", "g"), function() {
                return c
            })
        }), b)
    }, a.extend(a.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusCleanup: !1,
            focusInvalid: !0,
            errorContainer: a([]),
            errorLabelContainer: a([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function(a) {
                this.lastActive = a, this.settings.focusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, a, this.settings.errorClass, this.settings.validClass), this.hideThese(this.errorsFor(a)))
            },
            onfocusout: function(a) {
                this.checkable(a) || !(a.name in this.submitted) && this.optional(a) || this.element(a)
            },
            onkeyup: function(a, b) {
                (9 !== b.which || "" !== this.elementValue(a)) && (a.name in this.submitted || a === this.lastElement) && this.element(a)
            },
            onclick: function(a) {
                a.name in this.submitted ? this.element(a) : a.parentNode.name in this.submitted && this.element(a.parentNode)
            },
            highlight: function(b, c, d) {
                "radio" === b.type ? this.findByName(b.name).addClass(c).removeClass(d) : a(b).addClass(c).removeClass(d)
            },
            unhighlight: function(b, c, d) {
                "radio" === b.type ? this.findByName(b.name).removeClass(c).addClass(d) : a(b).removeClass(c).addClass(d)
            }
        },
        setDefaults: function(b) {
            a.extend(a.validator.defaults, b)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date ( ISO ).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            maxlength: a.validator.format("Please enter no more than {0} characters."),
            minlength: a.validator.format("Please enter at least {0} characters."),
            rangelength: a.validator.format("Please enter a value between {0} and {1} characters long."),
            range: a.validator.format("Please enter a value between {0} and {1}."),
            max: a.validator.format("Please enter a value less than or equal to {0}."),
            min: a.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function() {
                function b(b) {
                    var c = a.data(this[0].form, "validator"),
                        d = "on" + b.type.replace(/^validate/, ""),
                        e = c.settings;
                    e[d] && !this.is(e.ignore) && e[d].call(c, this[0], b)
                }
                this.labelContainer = a(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || a(this.currentForm), this.containers = a(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                var c, d = this.groups = {};
                a.each(this.settings.groups, function(b, c) {
                    "string" == typeof c && (c = c.split(/\s/)), a.each(c, function(a, c) {
                        d[c] = b
                    })
                }), c = this.settings.rules, a.each(c, function(b, d) {
                    c[b] = a.validator.normalizeRule(d)
                }), a(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']", "focusin focusout keyup", b).validateDelegate("select, option, [type='radio'], [type='checkbox']", "click", b), this.settings.invalidHandler && a(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler), a(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required", "true")
            },
            form: function() {
                return this.checkForm(), a.extend(this.submitted, this.errorMap), this.invalid = a.extend({}, this.errorMap), this.valid() || a(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            },
            checkForm: function() {
                this.prepareForm();
                for (var a = 0, b = this.currentElements = this.elements(); b[a]; a++) this.check(b[a]);
                return this.valid()
            },
            element: function(b) {
                var c = this.clean(b),
                    d = this.validationTargetFor(c),
                    e = !0;
                return this.lastElement = d, void 0 === d ? delete this.invalid[c.name] : (this.prepareElement(d), this.currentElements = a(d), e = this.check(d) !== !1, e ? delete this.invalid[d.name] : this.invalid[d.name] = !0), a(b).attr("aria-invalid", !e), this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), e
            },
            showErrors: function(b) {
                if (b) {
                    a.extend(this.errorMap, b), this.errorList = [];
                    for (var c in b) this.errorList.push({
                        message: b[c],
                        element: this.findByName(c)[0]
                    });
                    this.successList = a.grep(this.successList, function(a) {
                        return !(a.name in b)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function() {
                a.fn.resetForm && a(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue").removeAttr("aria-invalid")
            },
            numberOfInvalids: function() {
                return this.objectLength(this.invalid)
            },
            objectLength: function(a) {
                var b, c = 0;
                for (b in a) c++;
                return c
            },
            hideErrors: function() {
                this.hideThese(this.toHide)
            },
            hideThese: function(a) {
                a.not(this.containers).text(""), this.addWrapper(a).hide()
            },
            valid: function() {
                return 0 === this.size()
            },
            size: function() {
                return this.errorList.length
            },
            focusInvalid: function() {
                if (this.settings.focusInvalid) try {
                    a(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (b) {}
            },
            findLastActive: function() {
                var b = this.lastActive;
                return b && 1 === a.grep(this.errorList, function(a) {
                    return a.element.name === b.name
                }).length && b
            },
            elements: function() {
                var b = this,
                    c = {};
                return a(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled], [readonly]").not(this.settings.ignore).filter(function() {
                    return !this.name && b.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in c || !b.objectLength(a(this).rules()) ? !1 : (c[this.name] = !0, !0)
                })
            },
            clean: function(b) {
                return a(b)[0]
            },
            errors: function() {
                var b = this.settings.errorClass.split(" ").join(".");
                return a(this.settings.errorElement + "." + b, this.errorContext)
            },
            reset: function() {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = a([]), this.toHide = a([]), this.currentElements = a([])
            },
            prepareForm: function() {
                this.reset(), this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function(a) {
                this.reset(), this.toHide = this.errorsFor(a)
            },
            elementValue: function(b) {
                var c, d = a(b),
                    e = b.type;
                return "radio" === e || "checkbox" === e ? a("input[name='" + b.name + "']:checked").val() : "number" === e && "undefined" != typeof b.validity ? b.validity.badInput ? !1 : d.val() : (c = d.val(), "string" == typeof c ? c.replace(/\r/g, "") : c)
            },
            check: function(b) {
                b = this.validationTargetFor(this.clean(b));
                var c, d, e, f = a(b).rules(),
                    g = a.map(f, function(a, b) {
                        return b
                    }).length,
                    h = !1,
                    i = this.elementValue(b);
                for (d in f) {
                    e = {
                        method: d,
                        parameters: f[d]
                    };
                    try {
                        if (c = a.validator.methods[d].call(this, i, b, e.parameters), "dependency-mismatch" === c && 1 === g) {
                            h = !0;
                            continue
                        }
                        if (h = !1, "pending" === c) return void(this.toHide = this.toHide.not(this.errorsFor(b)));
                        if (!c) return this.formatAndAdd(b, e), !1
                    } catch (j) {
                        throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + b.id + ", check the '" + e.method + "' method.", j), j
                    }
                }
                if (!h) return this.objectLength(f) && this.successList.push(b), !0
            },
            customDataMessage: function(b, c) {
                return a(b).data("msg" + c.charAt(0).toUpperCase() + c.substring(1).toLowerCase()) || a(b).data("msg")
            },
            customMessage: function(a, b) {
                var c = this.settings.messages[a];
                return c && (c.constructor === String ? c : c[b])
            },
            findDefined: function() {
                for (var a = 0; a < arguments.length; a++)
                    if (void 0 !== arguments[a]) return arguments[a];
                return void 0
            },
            defaultMessage: function(b, c) {
                return this.findDefined(this.customMessage(b.name, c), this.customDataMessage(b, c), !this.settings.ignoreTitle && b.title || void 0, a.validator.messages[c], "<strong>Warning: No message defined for " + b.name + "</strong>")
            },
            formatAndAdd: function(b, c) {
                var d = this.defaultMessage(b, c.method),
                    e = /\$?\{(\d+)\}/g;
                "function" == typeof d ? d = d.call(this, c.parameters, b) : e.test(d) && (d = a.validator.format(d.replace(e, "{$1}"), c.parameters)), this.errorList.push({
                    message: d,
                    element: b,
                    method: c.method
                }), this.errorMap[b.name] = d, this.submitted[b.name] = d
            },
            addWrapper: function(a) {
                return this.settings.wrapper && (a = a.add(a.parent(this.settings.wrapper))), a
            },
            defaultShowErrors: function() {
                var a, b, c;
                for (a = 0; this.errorList[a]; a++) c = this.errorList[a], this.settings.highlight && this.settings.highlight.call(this, c.element, this.settings.errorClass, this.settings.validClass), this.showLabel(c.element, c.message);
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)
                    for (a = 0; this.successList[a]; a++) this.showLabel(this.successList[a]);
                if (this.settings.unhighlight)
                    for (a = 0, b = this.validElements(); b[a]; a++) this.settings.unhighlight.call(this, b[a], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            },
            validElements: function() {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function() {
                return a(this.errorList).map(function() {
                    return this.element
                })
            },
            showLabel: function(b, c) {
                var d, e, f, g = this.errorsFor(b),
                    h = this.idOrName(b),
                    i = a(b).attr("aria-describedby");
                g.length ? (g.removeClass(this.settings.validClass).addClass(this.settings.errorClass), g.html(c)) : (g = a("<" + this.settings.errorElement + ">").attr("id", h + "-error").addClass(this.settings.errorClass).html(c || ""), d = g, this.settings.wrapper && (d = g.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.length ? this.labelContainer.append(d) : this.settings.errorPlacement ? this.settings.errorPlacement(d, a(b)) : d.insertAfter(b), g.is("label") ? g.attr("for", h) : 0 === g.parents("label[for='" + h + "']").length && (f = g.attr("id").replace(/(:|\.|\[|\])/g, "\\$1"), i ? i.match(new RegExp("\\b" + f + "\\b")) || (i += " " + f) : i = f, a(b).attr("aria-describedby", i), e = this.groups[b.name], e && a.each(this.groups, function(b, c) {
                    c === e && a("[name='" + b + "']", this.currentForm).attr("aria-describedby", g.attr("id"))
                }))), !c && this.settings.success && (g.text(""), "string" == typeof this.settings.success ? g.addClass(this.settings.success) : this.settings.success(g, b)), this.toShow = this.toShow.add(g)
            },
            errorsFor: function(b) {
                var c = this.idOrName(b),
                    d = a(b).attr("aria-describedby"),
                    e = "label[for='" + c + "'], label[for='" + c + "'] *";
                return d && (e = e + ", #" + d.replace(/\s+/g, ", #")), this.errors().filter(e)
            },
            idOrName: function(a) {
                return this.groups[a.name] || (this.checkable(a) ? a.name : a.id || a.name)
            },
            validationTargetFor: function(b) {
                return this.checkable(b) && (b = this.findByName(b.name)), a(b).not(this.settings.ignore)[0]
            },
            checkable: function(a) {
                return /radio|checkbox/i.test(a.type)
            },
            findByName: function(b) {
                return a(this.currentForm).find("[name='" + b + "']")
            },
            getLength: function(b, c) {
                switch (c.nodeName.toLowerCase()) {
                    case "select":
                        return a("option:selected", c).length;
                    case "input":
                        if (this.checkable(c)) return this.findByName(c.name).filter(":checked").length
                }
                return b.length
            },
            depend: function(a, b) {
                return this.dependTypes[typeof a] ? this.dependTypes[typeof a](a, b) : !0
            },
            dependTypes: {
                "boolean": function(a) {
                    return a
                },
                string: function(b, c) {
                    return !!a(b, c.form).length
                },
                "function": function(a, b) {
                    return a(b)
                }
            },
            optional: function(b) {
                var c = this.elementValue(b);
                return !a.validator.methods.required.call(this, c, b) && "dependency-mismatch"
            },
            startRequest: function(a) {
                this.pending[a.name] || (this.pendingRequest++, this.pending[a.name] = !0)
            },
            stopRequest: function(b, c) {
                this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[b.name], c && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (a(this.currentForm).submit(), this.formSubmitted = !1) : !c && 0 === this.pendingRequest && this.formSubmitted && (a(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
            },
            previousValue: function(b) {
                return a.data(b, "previousValue") || a.data(b, "previousValue", {
                    old: null,
                    valid: !0,
                    message: this.defaultMessage(b, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: !0
            },
            email: {
                email: !0
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            dateISO: {
                dateISO: !0
            },
            number: {
                number: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            }
        },
        addClassRules: function(b, c) {
            b.constructor === String ? this.classRuleSettings[b] = c : a.extend(this.classRuleSettings, b)
        },
        classRules: function(b) {
            var c = {},
                d = a(b).attr("class");
            return d && a.each(d.split(" "), function() {
                this in a.validator.classRuleSettings && a.extend(c, a.validator.classRuleSettings[this])
            }), c
        },
        attributeRules: function(b) {
            var c, d, e = {},
                f = a(b),
                g = b.getAttribute("type");
            for (c in a.validator.methods) "required" === c ? (d = b.getAttribute(c), "" === d && (d = !0), d = !!d) : d = f.attr(c), /min|max/.test(c) && (null === g || /number|range|text/.test(g)) && (d = Number(d)), d || 0 === d ? e[c] = d : g === c && "range" !== g && (e[c] = !0);
            return e.maxlength && /-1|2147483647|524288/.test(e.maxlength) && delete e.maxlength, e
        },
        dataRules: function(b) {
            var c, d, e = {},
                f = a(b);
            for (c in a.validator.methods) d = f.data("rule" + c.charAt(0).toUpperCase() + c.substring(1).toLowerCase()), void 0 !== d && (e[c] = d);
            return e
        },
        staticRules: function(b) {
            var c = {},
                d = a.data(b.form, "validator");
            return d.settings.rules && (c = a.validator.normalizeRule(d.settings.rules[b.name]) || {}), c
        },
        normalizeRules: function(b, c) {
            return a.each(b, function(d, e) {
                if (e === !1) return void delete b[d];
                if (e.param || e.depends) {
                    var f = !0;
                    switch (typeof e.depends) {
                        case "string":
                            f = !!a(e.depends, c.form).length;
                            break;
                        case "function":
                            f = e.depends.call(c, c)
                    }
                    f ? b[d] = void 0 !== e.param ? e.param : !0 : delete b[d]
                }
            }), a.each(b, function(d, e) {
                b[d] = a.isFunction(e) ? e(c) : e
            }), a.each(["minlength", "maxlength"], function() {
                b[this] && (b[this] = Number(b[this]))
            }), a.each(["rangelength", "range"], function() {
                var c;
                b[this] && (a.isArray(b[this]) ? b[this] = [Number(b[this][0]), Number(b[this][1])] : "string" == typeof b[this] && (c = b[this].replace(/[\[\]]/g, "").split(/[\s,]+/), b[this] = [Number(c[0]), Number(c[1])]))
            }), a.validator.autoCreateRanges && (null != b.min && null != b.max && (b.range = [b.min, b.max], delete b.min, delete b.max), null != b.minlength && null != b.maxlength && (b.rangelength = [b.minlength, b.maxlength], delete b.minlength, delete b.maxlength)), b
        },
        normalizeRule: function(b) {
            if ("string" == typeof b) {
                var c = {};
                a.each(b.split(/\s/), function() {
                    c[this] = !0
                }), b = c
            }
            return b
        },
        addMethod: function(b, c, d) {
            a.validator.methods[b] = c, a.validator.messages[b] = void 0 !== d ? d : a.validator.messages[b], c.length < 3 && a.validator.addClassRules(b, a.validator.normalizeRule(b))
        },
        methods: {
            required: function(b, c, d) {
                if (!this.depend(d, c)) return "dependency-mismatch";
                if ("select" === c.nodeName.toLowerCase()) {
                    var e = a(c).val();
                    return e && e.length > 0
                }
                return this.checkable(c) ? this.getLength(b, c) > 0 : a.trim(b).length > 0
            },
            email: function(a, b) {
                return this.optional(b) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(a)
            },
            url: function(a, b) {
                return this.optional(b) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a)
            },
            date: function(a, b) {
                return this.optional(b) || !/Invalid|NaN/.test(new Date(a).toString())
            },
            dateISO: function(a, b) {
                return this.optional(b) || /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(a)
            },
            number: function(a, b) {
                return this.optional(b) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(a)
            },
            digits: function(a, b) {
                return this.optional(b) || /^\d+$/.test(a)
            },
            creditcard: function(a, b) {
                if (this.optional(b)) return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(a)) return !1;
                var c, d, e = 0,
                    f = 0,
                    g = !1;
                if (a = a.replace(/\D/g, ""), a.length < 13 || a.length > 19) return !1;
                for (c = a.length - 1; c >= 0; c--) d = a.charAt(c), f = parseInt(d, 10), g && (f *= 2) > 9 && (f -= 9), e += f, g = !g;
                return e % 10 === 0
            },
            minlength: function(b, c, d) {
                var e = a.isArray(b) ? b.length : this.getLength(b, c);
                return this.optional(c) || e >= d
            },
            maxlength: function(b, c, d) {
                var e = a.isArray(b) ? b.length : this.getLength(b, c);
                return this.optional(c) || d >= e
            },
            rangelength: function(b, c, d) {
                var e = a.isArray(b) ? b.length : this.getLength(b, c);
                return this.optional(c) || e >= d[0] && e <= d[1]
            },
            min: function(a, b, c) {
                return this.optional(b) || a >= c
            },
            max: function(a, b, c) {
                return this.optional(b) || c >= a
            },
            range: function(a, b, c) {
                return this.optional(b) || a >= c[0] && a <= c[1]
            },
            equalTo: function(b, c, d) {
                var e = a(d);
                return this.settings.onfocusout && e.unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                    a(c).valid()
                }), b === e.val()
            },
            remote: function(b, c, d) {
                if (this.optional(c)) return "dependency-mismatch";
                var e, f, g = this.previousValue(c);
                return this.settings.messages[c.name] || (this.settings.messages[c.name] = {}), g.originalMessage = this.settings.messages[c.name].remote, this.settings.messages[c.name].remote = g.message, d = "string" == typeof d && {
                    url: d
                } || d, g.old === b ? g.valid : (g.old = b, e = this, this.startRequest(c), f = {}, f[c.name] = b, a.ajax(a.extend(!0, {
                    url: d,
                    mode: "abort",
                    port: "validate" + c.name,
                    dataType: "json",
                    data: f,
                    context: e.currentForm,
                    success: function(d) {
                        var f, h, i, j = d === !0 || "true" === d;
                        e.settings.messages[c.name].remote = g.originalMessage, j ? (i = e.formSubmitted, e.prepareElement(c), e.formSubmitted = i, e.successList.push(c), delete e.invalid[c.name], e.showErrors()) : (f = {}, h = d || e.defaultMessage(c, "remote"), f[c.name] = g.message = a.isFunction(h) ? h(b) : h, e.invalid[c.name] = !0, e.showErrors(f)), g.valid = j, e.stopRequest(c, j)
                    }
                }, d)), "pending")
            }
        }
    }), a.format = function() {
        throw "$.format has been deprecated. Please use $.validator.format instead."
    };
    var b, c = {};
    a.ajaxPrefilter ? a.ajaxPrefilter(function(a, b, d) {
        var e = a.port;
        "abort" === a.mode && (c[e] && c[e].abort(), c[e] = d)
    }) : (b = a.ajax, a.ajax = function(d) {
        var e = ("mode" in d ? d : a.ajaxSettings).mode,
            f = ("port" in d ? d : a.ajaxSettings).port;
        return "abort" === e ? (c[f] && c[f].abort(), c[f] = b.apply(this, arguments), c[f]) : b.apply(this, arguments)
    }), a.extend(a.fn, {
        validateDelegate: function(b, c, d) {
            return this.bind(c, function(c) {
                var e = a(c.target);
                return e.is(b) ? d.apply(e, arguments) : void 0
            })
        }
    })
});
if (typeof Object.create !== "function") {
    Object.create = function(obj) {
        function F() {}
        F.prototype = obj;
        return new F
    }
}(function($, window, document) {
    var Carousel = {
        init: function(options, el) {
            var base = this;
            base.$elem = $(el);
            base.options = $.extend({}, $.fn.owlCarousel.options, base.$elem.data(), options);
            base.userOptions = options;
            base.loadContent()
        },
        loadContent: function() {
            var base = this,
                url;

            function getData(data) {
                var i, content = "";
                if (typeof base.options.jsonSuccess === "function") {
                    base.options.jsonSuccess.apply(this, [data])
                } else {
                    for (i in data.owl) {
                        if (data.owl.hasOwnProperty(i)) {
                            content += data.owl[i].item
                        }
                    }
                    base.$elem.html(content)
                }
                base.logIn()
            }
            if (typeof base.options.beforeInit === "function") {
                base.options.beforeInit.apply(this, [base.$elem])
            }
            if (typeof base.options.jsonPath === "string") {
                url = base.options.jsonPath;
                $.getJSON(url, getData)
            } else {
                base.logIn()
            }
        },
        logIn: function() {
            var base = this;
            base.$elem.data("owl-originalStyles", base.$elem.attr("style"));
            base.$elem.data("owl-originalClasses", base.$elem.attr("class"));
            base.$elem.css({
                opacity: 0
            });
            base.orignalItems = base.options.items;
            base.checkBrowser();
            base.wrapperWidth = 0;
            base.checkVisible = null;
            base.setVars()
        },
        setVars: function() {
            var base = this;
            if (base.$elem.children().length === 0) {
                return false
            }
            base.baseClass();
            base.eventTypes();
            base.$userItems = base.$elem.children();
            base.itemsAmount = base.$userItems.length;
            base.wrapItems();
            base.$owlItems = base.$elem.find(".owl-item");
            base.$owlWrapper = base.$elem.find(".owl-wrapper");
            base.playDirection = "next";
            base.prevItem = 0;
            base.prevArr = [0];
            base.currentItem = 0;
            base.customEvents();
            base.onStartup()
        },
        onStartup: function() {
            var base = this;
            base.updateItems();
            base.calculateAll();
            base.buildControls();
            base.updateControls();
            base.response();
            base.moveEvents();
            base.stopOnHover();
            base.owlStatus();
            if (base.options.transitionStyle !== false) {
                base.transitionTypes(base.options.transitionStyle)
            }
            if (base.options.autoPlay === true) {
                base.options.autoPlay = 5e3
            }
            base.play();
            base.$elem.find(".owl-wrapper").css("display", "block");
            if (!base.$elem.is(":visible")) {
                base.watchVisibility()
            } else {
                base.$elem.css("opacity", 1)
            }
            base.onstartup = false;
            base.eachMoveUpdate();
            if (typeof base.options.afterInit === "function") {
                base.options.afterInit.apply(this, [base.$elem])
            }
        },
        eachMoveUpdate: function() {
            var base = this;
            if (base.options.lazyLoad === true) {
                base.lazyLoad()
            }
            if (base.options.autoHeight === true) {
                base.autoHeight()
            }
            base.onVisibleItems();
            if (typeof base.options.afterAction === "function") {
                base.options.afterAction.apply(this, [base.$elem])
            }
        },
        updateVars: function() {
            var base = this;
            if (typeof base.options.beforeUpdate === "function") {
                base.options.beforeUpdate.apply(this, [base.$elem])
            }
            base.watchVisibility();
            base.updateItems();
            base.calculateAll();
            base.updatePosition();
            base.updateControls();
            base.eachMoveUpdate();
            if (typeof base.options.afterUpdate === "function") {
                base.options.afterUpdate.apply(this, [base.$elem])
            }
        },
        reload: function() {
            var base = this;
            window.setTimeout(function() {
                base.updateVars()
            }, 0)
        },
        watchVisibility: function() {
            var base = this;
            if (base.$elem.is(":visible") === false) {
                base.$elem.css({
                    opacity: 0
                });
                window.clearInterval(base.autoPlayInterval);
                window.clearInterval(base.checkVisible)
            } else {
                return false
            }
            base.checkVisible = window.setInterval(function() {
                if (base.$elem.is(":visible")) {
                    base.reload();
                    base.$elem.animate({
                        opacity: 1
                    }, 200);
                    window.clearInterval(base.checkVisible)
                }
            }, 500)
        },
        wrapItems: function() {
            var base = this;
            base.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');
            base.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
            base.wrapperOuter = base.$elem.find(".owl-wrapper-outer");
            base.$elem.css("display", "block")
        },
        baseClass: function() {
            var base = this,
                hasBaseClass = base.$elem.hasClass(base.options.baseClass),
                hasThemeClass = base.$elem.hasClass(base.options.theme);
            if (!hasBaseClass) {
                base.$elem.addClass(base.options.baseClass)
            }
            if (!hasThemeClass) {
                base.$elem.addClass(base.options.theme)
            }
        },
        updateItems: function() {
            var base = this,
                width, i;
            if (base.options.responsive === false) {
                return false
            }
            if (base.options.singleItem === true) {
                base.options.items = base.orignalItems = 1;
                base.options.itemsCustom = false;
                base.options.itemsDesktop = false;
                base.options.itemsDesktopSmall = false;
                base.options.itemsTablet = false;
                base.options.itemsTabletSmall = false;
                base.options.itemsMobile = false;
                return false
            }
            width = $(base.options.responsiveBaseWidth).width();
            if (width > (base.options.itemsDesktop[0] || base.orignalItems)) {
                base.options.items = base.orignalItems
            }
            if (base.options.itemsCustom !== false) {
                base.options.itemsCustom.sort(function(a, b) {
                    return a[0] - b[0]
                });
                for (i = 0; i < base.options.itemsCustom.length; i += 1) {
                    if (base.options.itemsCustom[i][0] <= width) {
                        base.options.items = base.options.itemsCustom[i][1]
                    }
                }
            } else {
                if (width <= base.options.itemsDesktop[0] && base.options.itemsDesktop !== false) {
                    base.options.items = base.options.itemsDesktop[1]
                }
                if (width <= base.options.itemsDesktopSmall[0] && base.options.itemsDesktopSmall !== false) {
                    base.options.items = base.options.itemsDesktopSmall[1]
                }
                if (width <= base.options.itemsTablet[0] && base.options.itemsTablet !== false) {
                    base.options.items = base.options.itemsTablet[1]
                }
                if (width <= base.options.itemsTabletSmall[0] && base.options.itemsTabletSmall !== false) {
                    base.options.items = base.options.itemsTabletSmall[1]
                }
                if (width <= base.options.itemsMobile[0] && base.options.itemsMobile !== false) {
                    base.options.items = base.options.itemsMobile[1]
                }
            }
            if (base.options.items > base.itemsAmount && base.options.itemsScaleUp === true) {
                base.options.items = base.itemsAmount
            }
        },
        response: function() {
            var base = this,
                smallDelay, lastWindowWidth;
            if (base.options.responsive !== true) {
                return false
            }
            lastWindowWidth = $(window).width();
            base.resizer = function() {
                if ($(window).width() !== lastWindowWidth) {
                    if (base.options.autoPlay !== false) {
                        window.clearInterval(base.autoPlayInterval)
                    }
                    window.clearTimeout(smallDelay);
                    smallDelay = window.setTimeout(function() {
                        lastWindowWidth = $(window).width();
                        base.updateVars()
                    }, base.options.responsiveRefreshRate)
                }
            };
            $(window).resize(base.resizer)
        },
        updatePosition: function() {
            var base = this;
            base.jumpTo(base.currentItem);
            if (base.options.autoPlay !== false) {
                base.checkAp()
            }
        },
        appendItemsSizes: function() {
            var base = this,
                roundPages = 0,
                lastItem = base.itemsAmount - base.options.items;
            base.$owlItems.each(function(index) {
                var $this = $(this);
                $this.css({
                    width: base.itemWidth
                }).data("owl-item", Number(index));
                if (index % base.options.items === 0 || index === lastItem) {
                    if (!(index > lastItem)) {
                        roundPages += 1
                    }
                }
                $this.data("owl-roundPages", roundPages)
            })
        },
        appendWrapperSizes: function() {
            var base = this,
                width = base.$owlItems.length * base.itemWidth;
            base.$owlWrapper.css({
                width: width * 2,
                left: 0
            });
            base.appendItemsSizes()
        },
        calculateAll: function() {
            var base = this;
            base.calculateWidth();
            base.appendWrapperSizes();
            base.loops();
            base.max()
        },
        calculateWidth: function() {
            var base = this;
            base.itemWidth = Math.round(base.$elem.width() / base.options.items)
        },
        max: function() {
            var base = this,
                maximum = (base.itemsAmount * base.itemWidth - base.options.items * base.itemWidth) * -1;
            if (base.options.items > base.itemsAmount) {
                base.maximumItem = 0;
                maximum = 0;
                base.maximumPixels = 0
            } else {
                base.maximumItem = base.itemsAmount - base.options.items;
                base.maximumPixels = maximum
            }
            return maximum
        },
        min: function() {
            return 0
        },
        loops: function() {
            var base = this,
                prev = 0,
                elWidth = 0,
                i, item, roundPageNum;
            base.positionsInArray = [0];
            base.pagesInArray = [];
            for (i = 0; i < base.itemsAmount; i += 1) {
                elWidth += base.itemWidth;
                base.positionsInArray.push(-elWidth);
                if (base.options.scrollPerPage === true) {
                    item = $(base.$owlItems[i]);
                    roundPageNum = item.data("owl-roundPages");
                    if (roundPageNum !== prev) {
                        base.pagesInArray[prev] = base.positionsInArray[i];
                        prev = roundPageNum
                    }
                }
            }
        },
        buildControls: function() {
            var base = this;
            if (base.options.navigation === true || base.options.pagination === true) {
                base.owlControls = $('<div class="owl-controls"/>').toggleClass("clickable", !base.browser.isTouch).appendTo(base.$elem)
            }
            if (base.options.pagination === true) {
                base.buildPagination()
            }
            if (base.options.navigation === true) {
                base.buildButtons()
            }
        },
        buildButtons: function() {
            var base = this,
                buttonsWrapper = $('<div class="owl-buttons"/>');
            base.owlControls.append(buttonsWrapper);
            base.buttonPrev = $("<div/>", {
                "class": "owl-prev",
                html: base.options.navigationText[0] || ""
            });
            base.buttonNext = $("<div/>", {
                "class": "owl-next",
                html: base.options.navigationText[1] || ""
            });
            buttonsWrapper.append(base.buttonPrev).append(base.buttonNext);
            buttonsWrapper.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(event) {
                event.preventDefault()
            });
            buttonsWrapper.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(event) {
                event.preventDefault();
                if ($(this).hasClass("owl-next")) {
                    base.next()
                } else {
                    base.prev()
                }
            })
        },
        buildPagination: function() {
            var base = this;
            base.paginationWrapper = $('<div class="owl-pagination"/>');
            base.owlControls.append(base.paginationWrapper);
            base.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(event) {
                event.preventDefault();
                if (Number($(this).data("owl-page")) !== base.currentItem) {
                    base.goTo(Number($(this).data("owl-page")), true)
                }
            })
        },
        updatePagination: function() {
            var base = this,
                counter, lastPage, lastItem, i, paginationButton, paginationButtonInner;
            if (base.options.pagination === false) {
                return false
            }
            base.paginationWrapper.html("");
            counter = 0;
            lastPage = base.itemsAmount - base.itemsAmount % base.options.items;
            for (i = 0; i < base.itemsAmount; i += 1) {
                if (i % base.options.items === 0) {
                    counter += 1;
                    if (lastPage === i) {
                        lastItem = base.itemsAmount - base.options.items
                    }
                    paginationButton = $("<div/>", {
                        "class": "owl-page"
                    });
                    paginationButtonInner = $("<span></span>", {
                        text: base.options.paginationNumbers === true ? counter : "",
                        "class": base.options.paginationNumbers === true ? "owl-numbers" : ""
                    });
                    paginationButton.append(paginationButtonInner);
                    paginationButton.data("owl-page", lastPage === i ? lastItem : i);
                    paginationButton.data("owl-roundPages", counter);
                    base.paginationWrapper.append(paginationButton)
                }
            }
            base.checkPagination()
        },
        checkPagination: function() {
            var base = this;
            if (base.options.pagination === false) {
                return false
            }
            base.paginationWrapper.find(".owl-page").each(function() {
                if ($(this).data("owl-roundPages") === $(base.$owlItems[base.currentItem]).data("owl-roundPages")) {
                    base.paginationWrapper.find(".owl-page").removeClass("active");
                    $(this).addClass("active")
                }
            })
        },
        checkNavigation: function() {
            var base = this;
            if (base.options.navigation === false) {
                return false
            }
            if (base.options.rewindNav === false) {
                if (base.currentItem === 0 && base.maximumItem === 0) {
                    base.buttonPrev.addClass("disabled");
                    base.buttonNext.addClass("disabled")
                } else if (base.currentItem === 0 && base.maximumItem !== 0) {
                    base.buttonPrev.addClass("disabled");
                    base.buttonNext.removeClass("disabled")
                } else if (base.currentItem === base.maximumItem) {
                    base.buttonPrev.removeClass("disabled");
                    base.buttonNext.addClass("disabled")
                } else if (base.currentItem !== 0 && base.currentItem !== base.maximumItem) {
                    base.buttonPrev.removeClass("disabled");
                    base.buttonNext.removeClass("disabled")
                }
            }
        },
        updateControls: function() {
            var base = this;
            base.updatePagination();
            base.checkNavigation();
            if (base.owlControls) {
                if (base.options.items >= base.itemsAmount) {
                    base.owlControls.hide()
                } else {
                    base.owlControls.show()
                }
            }
        },
        destroyControls: function() {
            var base = this;
            if (base.owlControls) {
                base.owlControls.remove()
            }
        },
        next: function(speed) {
            var base = this;
            if (base.isTransition) {
                return false
            }
            base.currentItem += base.options.scrollPerPage === true ? base.options.items : 1;
            if (base.currentItem > base.maximumItem + (base.options.scrollPerPage === true ? base.options.items - 1 : 0)) {
                if (base.options.rewindNav === true) {
                    base.currentItem = 0;
                    speed = "rewind"
                } else {
                    base.currentItem = base.maximumItem;
                    return false
                }
            }
            base.goTo(base.currentItem, speed)
        },
        prev: function(speed) {
            var base = this;
            if (base.isTransition) {
                return false
            }
            if (base.options.scrollPerPage === true && base.currentItem > 0 && base.currentItem < base.options.items) {
                base.currentItem = 0
            } else {
                base.currentItem -= base.options.scrollPerPage === true ? base.options.items : 1
            }
            if (base.currentItem < 0) {
                if (base.options.rewindNav === true) {
                    base.currentItem = base.maximumItem;
                    speed = "rewind"
                } else {
                    base.currentItem = 0;
                    return false
                }
            }
            base.goTo(base.currentItem, speed)
        },
        goTo: function(position, speed, drag) {
            var base = this,
                goToPixel;
            if (base.isTransition) {
                return false
            }
            if (typeof base.options.beforeMove === "function") {
                base.options.beforeMove.apply(this, [base.$elem])
            }
            if (position >= base.maximumItem) {
                position = base.maximumItem
            } else if (position <= 0) {
                position = 0
            }
            base.currentItem = base.owl.currentItem = position;
            if (base.options.transitionStyle !== false && drag !== "drag" && base.options.items === 1 && base.browser.support3d === true) {
                base.swapSpeed(0);
                if (base.browser.support3d === true) {
                    base.transition3d(base.positionsInArray[position])
                } else {
                    base.css2slide(base.positionsInArray[position], 1)
                }
                base.afterGo();
                base.singleItemTransition();
                return false
            }
            goToPixel = base.positionsInArray[position];
            if (base.browser.support3d === true) {
                base.isCss3Finish = false;
                if (speed === true) {
                    base.swapSpeed("paginationSpeed");
                    window.setTimeout(function() {
                        base.isCss3Finish = true
                    }, base.options.paginationSpeed)
                } else if (speed === "rewind") {
                    base.swapSpeed(base.options.rewindSpeed);
                    window.setTimeout(function() {
                        base.isCss3Finish = true
                    }, base.options.rewindSpeed)
                } else {
                    base.swapSpeed("slideSpeed");
                    window.setTimeout(function() {
                        base.isCss3Finish = true
                    }, base.options.slideSpeed)
                }
                base.transition3d(goToPixel)
            } else {
                if (speed === true) {
                    base.css2slide(goToPixel, base.options.paginationSpeed)
                } else if (speed === "rewind") {
                    base.css2slide(goToPixel, base.options.rewindSpeed)
                } else {
                    base.css2slide(goToPixel, base.options.slideSpeed)
                }
            }
            base.afterGo()
        },
        jumpTo: function(position) {
            var base = this;
            if (typeof base.options.beforeMove === "function") {
                base.options.beforeMove.apply(this, [base.$elem])
            }
            if (position >= base.maximumItem || position === -1) {
                position = base.maximumItem
            } else if (position <= 0) {
                position = 0
            }
            base.swapSpeed(0);
            if (base.browser.support3d === true) {
                base.transition3d(base.positionsInArray[position])
            } else {
                base.css2slide(base.positionsInArray[position], 1)
            }
            base.currentItem = base.owl.currentItem = position;
            base.afterGo()
        },
        afterGo: function() {
            var base = this;
            base.prevArr.push(base.currentItem);
            base.prevItem = base.owl.prevItem = base.prevArr[base.prevArr.length - 2];
            base.prevArr.shift(0);
            if (base.prevItem !== base.currentItem) {
                base.checkPagination();
                base.checkNavigation();
                base.eachMoveUpdate();
                if (base.options.autoPlay !== false) {
                    base.checkAp()
                }
            }
            if (typeof base.options.afterMove === "function" && base.prevItem !== base.currentItem) {
                base.options.afterMove.apply(this, [base.$elem])
            }
        },
        stop: function() {
            var base = this;
            base.apStatus = "stop";
            window.clearInterval(base.autoPlayInterval)
        },
        checkAp: function() {
            var base = this;
            if (base.apStatus !== "stop") {
                base.play()
            }
        },
        play: function() {
            var base = this;
            base.apStatus = "play";
            if (base.options.autoPlay === false) {
                return false
            }
            window.clearInterval(base.autoPlayInterval);
            base.autoPlayInterval = window.setInterval(function() {
                base.next(true)
            }, base.options.autoPlay)
        },
        swapSpeed: function(action) {
            var base = this;
            if (action === "slideSpeed") {
                base.$owlWrapper.css(base.addCssSpeed(base.options.slideSpeed))
            } else if (action === "paginationSpeed") {
                base.$owlWrapper.css(base.addCssSpeed(base.options.paginationSpeed))
            } else if (typeof action !== "string") {
                base.$owlWrapper.css(base.addCssSpeed(action))
            }
        },
        addCssSpeed: function(speed) {
            return {
                "-webkit-transition": "all " + speed + "ms ease",
                "-moz-transition": "all " + speed + "ms ease",
                "-o-transition": "all " + speed + "ms ease",
                transition: "all " + speed + "ms ease"
            }
        },
        removeTransition: function() {
            return {
                "-webkit-transition": "",
                "-moz-transition": "",
                "-o-transition": "",
                transition: ""
            }
        },
        doTranslate: function(pixels) {
            return {
                "-webkit-transform": "translate3d(" + pixels + "px, 0px, 0px)",
                "-moz-transform": "translate3d(" + pixels + "px, 0px, 0px)",
                "-o-transform": "translate3d(" + pixels + "px, 0px, 0px)",
                "-ms-transform": "translate3d(" + pixels + "px, 0px, 0px)",
                transform: "translate3d(" + pixels + "px, 0px,0px)"
            }
        },
        transition3d: function(value) {
            var base = this;
            base.$owlWrapper.css(base.doTranslate(value))
        },
        css2move: function(value) {
            var base = this;
            base.$owlWrapper.css({
                left: value
            })
        },
        css2slide: function(value, speed) {
            var base = this;
            base.isCssFinish = false;
            base.$owlWrapper.stop(true, true).animate({
                left: value
            }, {
                duration: speed || base.options.slideSpeed,
                complete: function() {
                    base.isCssFinish = true
                }
            })
        },
        checkBrowser: function() {
            var base = this,
                translate3D = "translate3d(0px, 0px, 0px)",
                tempElem = document.createElement("div"),
                regex, asSupport, support3d, isTouch;
            tempElem.style.cssText = "  -moz-transform:" + translate3D + "; -ms-transform:" + translate3D + "; -o-transform:" + translate3D + "; -webkit-transform:" + translate3D + "; transform:" + translate3D;
            regex = /translate3d\(0px, 0px, 0px\)/g;
            asSupport = tempElem.style.cssText.match(regex);
            support3d = asSupport !== null && asSupport.length === 1;
            isTouch = "ontouchstart" in window || window.navigator.msMaxTouchPoints;
            base.browser = {
                support3d: support3d,
                isTouch: isTouch
            }
        },
        moveEvents: function() {
            var base = this;
            if (base.options.mouseDrag !== false || base.options.touchDrag !== false) {
                base.gestures();
                base.disabledEvents()
            }
        },
        eventTypes: function() {
            var base = this,
                types = ["s", "e", "x"];
            base.ev_types = {};
            if (base.options.mouseDrag === true && base.options.touchDrag === true) {
                types = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"]
            } else if (base.options.mouseDrag === false && base.options.touchDrag === true) {
                types = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"]
            } else if (base.options.mouseDrag === true && base.options.touchDrag === false) {
                types = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]
            }
            base.ev_types.start = types[0];
            base.ev_types.move = types[1];
            base.ev_types.end = types[2]
        },
        disabledEvents: function() {
            var base = this;
            base.$elem.on("dragstart.owl", function(event) {
                event.preventDefault()
            });
            base.$elem.on("mousedown.disableTextSelect", function(e) {
                return $(e.target).is("input, textarea, select, option")
            })
        },
        gestures: function() {
            var base = this,
                locals = {
                    offsetX: 0,
                    offsetY: 0,
                    baseElWidth: 0,
                    relativePos: 0,
                    position: null,
                    minSwipe: null,
                    maxSwipe: null,
                    sliding: null,
                    dargging: null,
                    targetElement: null
                };
            base.isCssFinish = true;

            function getTouches(event) {
                if (event.touches !== undefined) {
                    return {
                        x: event.touches[0].pageX,
                        y: event.touches[0].pageY
                    }
                }
                if (event.touches === undefined) {
                    if (event.pageX !== undefined) {
                        return {
                            x: event.pageX,
                            y: event.pageY
                        }
                    }
                    if (event.pageX === undefined) {
                        return {
                            x: event.clientX,
                            y: event.clientY
                        }
                    }
                }
            }

            function swapEvents(type) {
                if (type === "on") {
                    $(document).on(base.ev_types.move, dragMove);
                    $(document).on(base.ev_types.end, dragEnd)
                } else if (type === "off") {
                    $(document).off(base.ev_types.move);
                    $(document).off(base.ev_types.end)
                }
            }

            function dragStart(event) {
                var ev = event.originalEvent || event || window.event,
                    position;
                if (ev.which === 3) {
                    return false
                }
                if (base.itemsAmount <= base.options.items) {
                    return
                }
                if (base.isCssFinish === false && !base.options.dragBeforeAnimFinish) {
                    return false
                }
                if (base.isCss3Finish === false && !base.options.dragBeforeAnimFinish) {
                    return false
                }
                if (base.options.autoPlay !== false) {
                    window.clearInterval(base.autoPlayInterval)
                }
                if (base.browser.isTouch !== true && !base.$owlWrapper.hasClass("grabbing")) {
                    base.$owlWrapper.addClass("grabbing")
                }
                base.newPosX = 0;
                base.newRelativeX = 0;
                $(this).css(base.removeTransition());
                position = $(this).position();
                locals.relativePos = position.left;
                locals.offsetX = getTouches(ev).x - position.left;
                locals.offsetY = getTouches(ev).y - position.top;
                swapEvents("on");
                locals.sliding = false;
                locals.targetElement = ev.target || ev.srcElement
            }

            function dragMove(event) {
                var ev = event.originalEvent || event || window.event,
                    minSwipe, maxSwipe;
                base.newPosX = getTouches(ev).x - locals.offsetX;
                base.newPosY = getTouches(ev).y - locals.offsetY;
                base.newRelativeX = base.newPosX - locals.relativePos;
                if (typeof base.options.startDragging === "function" && locals.dragging !== true && base.newRelativeX !== 0) {
                    locals.dragging = true;
                    base.options.startDragging.apply(base, [base.$elem])
                }
                if ((base.newRelativeX > 8 || base.newRelativeX < -8) && base.browser.isTouch === true) {
                    if (ev.preventDefault !== undefined) {
                        ev.preventDefault()
                    } else {
                        ev.returnValue = false
                    }
                    locals.sliding = true
                }
                if ((base.newPosY > 10 || base.newPosY < -10) && locals.sliding === false) {
                    $(document).off("touchmove.owl")
                }
                minSwipe = function() {
                    return base.newRelativeX / 5
                };
                maxSwipe = function() {
                    return base.maximumPixels + base.newRelativeX / 5
                };
                base.newPosX = Math.max(Math.min(base.newPosX, minSwipe()), maxSwipe());
                if (base.browser.support3d === true) {
                    base.transition3d(base.newPosX)
                } else {
                    base.css2move(base.newPosX)
                }
            }

            function dragEnd(event) {
                var ev = event.originalEvent || event || window.event,
                    newPosition, handlers, owlStopEvent;
                ev.target = ev.target || ev.srcElement;
                locals.dragging = false;
                if (base.browser.isTouch !== true) {
                    base.$owlWrapper.removeClass("grabbing")
                }
                if (base.newRelativeX < 0) {
                    base.dragDirection = base.owl.dragDirection = "left"
                } else {
                    base.dragDirection = base.owl.dragDirection = "right"
                }
                if (base.newRelativeX !== 0) {
                    newPosition = base.getNewPosition();
                    base.goTo(newPosition, false, "drag");
                    if (locals.targetElement === ev.target && base.browser.isTouch !== true) {
                        $(ev.target).on("click.disable", function(ev) {
                            ev.stopImmediatePropagation();
                            ev.stopPropagation();
                            ev.preventDefault();
                            $(ev.target).off("click.disable")
                        });
                        handlers = $._data(ev.target, "events").click;
                        owlStopEvent = handlers.pop();
                        handlers.splice(0, 0, owlStopEvent)
                    }
                }
                swapEvents("off")
            }
            base.$elem.on(base.ev_types.start, ".owl-wrapper", dragStart)
        },
        getNewPosition: function() {
            var base = this,
                newPosition = base.closestItem();
            if (newPosition > base.maximumItem) {
                base.currentItem = base.maximumItem;
                newPosition = base.maximumItem
            } else if (base.newPosX >= 0) {
                newPosition = 0;
                base.currentItem = 0
            }
            return newPosition
        },
        closestItem: function() {
            var base = this,
                array = base.options.scrollPerPage === true ? base.pagesInArray : base.positionsInArray,
                goal = base.newPosX,
                closest = null;
            $.each(array, function(i, v) {
                if (goal - base.itemWidth / 20 > array[i + 1] && goal - base.itemWidth / 20 < v && base.moveDirection() === "left") {
                    closest = v;
                    if (base.options.scrollPerPage === true) {
                        base.currentItem = $.inArray(closest, base.positionsInArray)
                    } else {
                        base.currentItem = i
                    }
                } else if (goal + base.itemWidth / 20 < v && goal + base.itemWidth / 20 > (array[i + 1] || array[i] - base.itemWidth) && base.moveDirection() === "right") {
                    if (base.options.scrollPerPage === true) {
                        closest = array[i + 1] || array[array.length - 1];
                        base.currentItem = $.inArray(closest, base.positionsInArray)
                    } else {
                        closest = array[i + 1];
                        base.currentItem = i + 1
                    }
                }
            });
            return base.currentItem
        },
        moveDirection: function() {
            var base = this,
                direction;
            if (base.newRelativeX < 0) {
                direction = "right";
                base.playDirection = "next"
            } else {
                direction = "left";
                base.playDirection = "prev"
            }
            return direction
        },
        customEvents: function() {
            var base = this;
            base.$elem.on("owl.next", function() {
                base.next()
            });
            base.$elem.on("owl.prev", function() {
                base.prev()
            });
            base.$elem.on("owl.play", function(event, speed) {
                base.options.autoPlay = speed;
                base.play();
                base.hoverStatus = "play"
            });
            base.$elem.on("owl.stop", function() {
                base.stop();
                base.hoverStatus = "stop"
            });
            base.$elem.on("owl.goTo", function(event, item) {
                base.goTo(item)
            });
            base.$elem.on("owl.jumpTo", function(event, item) {
                base.jumpTo(item)
            })
        },
        stopOnHover: function() {
            var base = this;
            if (base.options.stopOnHover === true && base.browser.isTouch !== true && base.options.autoPlay !== false) {
                base.$elem.on("mouseover", function() {
                    base.stop()
                });
                base.$elem.on("mouseout", function() {
                    if (base.hoverStatus !== "stop") {
                        base.play()
                    }
                })
            }
        },
        lazyLoad: function() {
            var base = this,
                i, $item, itemNumber, $lazyImg, follow;
            if (base.options.lazyLoad === false) {
                return false
            }
            for (i = 0; i < base.itemsAmount; i += 1) {
                $item = $(base.$owlItems[i]);
                if ($item.data("owl-loaded") === "loaded") {
                    continue
                }
                itemNumber = $item.data("owl-item");
                $lazyImg = $item.find(".lazyOwl");
                if (typeof $lazyImg.data("src") !== "string") {
                    $item.data("owl-loaded", "loaded");
                    continue
                }
                if ($item.data("owl-loaded") === undefined) {
                    $lazyImg.hide();
                    $item.addClass("loading").data("owl-loaded", "checked")
                }
                if (base.options.lazyFollow === true) {
                    follow = itemNumber >= base.currentItem
                } else {
                    follow = true
                }
                if (follow && itemNumber < base.currentItem + base.options.items && $lazyImg.length) {
                    base.lazyPreload($item, $lazyImg)
                }
            }
        },
        lazyPreload: function($item, $lazyImg) {
            var base = this,
                iterations = 0,
                isBackgroundImg;
            if ($lazyImg.prop("tagName") === "DIV") {
                $lazyImg.css("background-image", "url(" + $lazyImg.data("src") + ")");
                isBackgroundImg = true
            } else {
                $lazyImg[0].src = $lazyImg.data("src")
            }

            function showImage() {
                $item.data("owl-loaded", "loaded").removeClass("loading");
                $lazyImg.removeAttr("data-src");
                if (base.options.lazyEffect === "fade") {
                    $lazyImg.fadeIn(400)
                } else {
                    $lazyImg.show()
                }
                if (typeof base.options.afterLazyLoad === "function") {
                    base.options.afterLazyLoad.apply(this, [base.$elem])
                }
            }

            function checkLazyImage() {
                iterations += 1;
                if (base.completeImg($lazyImg.get(0)) || isBackgroundImg === true) {
                    showImage()
                } else if (iterations <= 100) {
                    window.setTimeout(checkLazyImage, 100)
                } else {
                    showImage()
                }
            }
            checkLazyImage()
        },
        autoHeight: function() {
            var base = this,
                $currentimg = $(base.$owlItems[base.currentItem]).find("img"),
                iterations;

            function addHeight() {
                var $currentItem = $(base.$owlItems[base.currentItem]).height();
                base.wrapperOuter.css("height", $currentItem + "px");
                if (!base.wrapperOuter.hasClass("autoHeight")) {
                    window.setTimeout(function() {
                        base.wrapperOuter.addClass("autoHeight")
                    }, 0)
                }
            }

            function checkImage() {
                iterations += 1;
                if (base.completeImg($currentimg.get(0))) {
                    addHeight()
                } else if (iterations <= 100) {
                    window.setTimeout(checkImage, 100)
                } else {
                    base.wrapperOuter.css("height", "")
                }
            }
            if ($currentimg.get(0) !== undefined) {
                iterations = 0;
                checkImage()
            } else {
                addHeight()
            }
        },
        completeImg: function(img) {
            var naturalWidthType;
            if (!img.complete) {
                return false
            }
            naturalWidthType = typeof img.naturalWidth;
            if (naturalWidthType !== "undefined" && img.naturalWidth === 0) {
                return false
            }
            return true
        },
        onVisibleItems: function() {
            var base = this,
                i;
            if (base.options.addClassActive === true) {
                base.$owlItems.removeClass("active")
            }
            base.visibleItems = [];
            for (i = base.currentItem; i < base.currentItem + base.options.items; i += 1) {
                base.visibleItems.push(i);
                if (base.options.addClassActive === true) {
                    $(base.$owlItems[i]).addClass("active")
                }
            }
            base.owl.visibleItems = base.visibleItems
        },
        transitionTypes: function(className) {
            var base = this;
            base.outClass = "owl-" + className + "-out";
            base.inClass = "owl-" + className + "-in"
        },
        singleItemTransition: function() {
            var base = this,
                outClass = base.outClass,
                inClass = base.inClass,
                $currentItem = base.$owlItems.eq(base.currentItem),
                $prevItem = base.$owlItems.eq(base.prevItem),
                prevPos = Math.abs(base.positionsInArray[base.currentItem]) + base.positionsInArray[base.prevItem],
                origin = Math.abs(base.positionsInArray[base.currentItem]) + base.itemWidth / 2,
                animEnd = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend";
            base.isTransition = true;
            base.$owlWrapper.addClass("owl-origin").css({
                "-webkit-transform-origin": origin + "px",
                "-moz-perspective-origin": origin + "px",
                "perspective-origin": origin + "px"
            });

            function transStyles(prevPos) {
                return {
                    position: "relative",
                    left: prevPos + "px"
                }
            }
            $prevItem.css(transStyles(prevPos, 10)).addClass(outClass).on(animEnd, function() {
                base.endPrev = true;
                $prevItem.off(animEnd);
                base.clearTransStyle($prevItem, outClass)
            });
            $currentItem.addClass(inClass).on(animEnd, function() {
                base.endCurrent = true;
                $currentItem.off(animEnd);
                base.clearTransStyle($currentItem, inClass)
            })
        },
        clearTransStyle: function(item, classToRemove) {
            var base = this;
            item.css({
                position: "",
                left: ""
            }).removeClass(classToRemove);
            if (base.endPrev && base.endCurrent) {
                base.$owlWrapper.removeClass("owl-origin");
                base.endPrev = false;
                base.endCurrent = false;
                base.isTransition = false
            }
        },
        owlStatus: function() {
            var base = this;
            base.owl = {
                userOptions: base.userOptions,
                baseElement: base.$elem,
                userItems: base.$userItems,
                owlItems: base.$owlItems,
                currentItem: base.currentItem,
                prevItem: base.prevItem,
                visibleItems: base.visibleItems,
                isTouch: base.browser.isTouch,
                browser: base.browser,
                dragDirection: base.dragDirection
            }
        },
        clearEvents: function() {
            var base = this;
            base.$elem.off(".owl owl mousedown.disableTextSelect");
            $(document).off(".owl owl");
            $(window).off("resize", base.resizer)
        },
        unWrap: function() {
            var base = this;
            if (base.$elem.children().length !== 0) {
                base.$owlWrapper.unwrap();
                base.$userItems.unwrap().unwrap();
                if (base.owlControls) {
                    base.owlControls.remove()
                }
            }
            base.clearEvents();
            base.$elem.attr("style", base.$elem.data("owl-originalStyles") || "").attr("class", base.$elem.data("owl-originalClasses"))
        },
        destroy: function() {
            var base = this;
            base.stop();
            window.clearInterval(base.checkVisible);
            base.unWrap();
            base.$elem.removeData()
        },
        reinit: function(newOptions) {
            var base = this,
                options = $.extend({}, base.userOptions, newOptions);
            base.unWrap();
            base.init(options, base.$elem)
        },
        addItem: function(htmlString, targetPosition) {
            var base = this,
                position;
            if (!htmlString) {
                return false
            }
            if (base.$elem.children().length === 0) {
                base.$elem.append(htmlString);
                base.setVars();
                return false
            }
            base.unWrap();
            if (targetPosition === undefined || targetPosition === -1) {
                position = -1
            } else {
                position = targetPosition
            }
            if (position >= base.$userItems.length || position === -1) {
                base.$userItems.eq(-1).after(htmlString)
            } else {
                base.$userItems.eq(position).before(htmlString)
            }
            base.setVars()
        },
        removeItem: function(targetPosition) {
            var base = this,
                position;
            if (base.$elem.children().length === 0) {
                return false
            }
            if (targetPosition === undefined || targetPosition === -1) {
                position = -1
            } else {
                position = targetPosition
            }
            base.unWrap();
            base.$userItems.eq(position).remove();
            base.setVars()
        }
    };
    $.fn.owlCarousel = function(options) {
        return this.each(function() {
            if ($(this).data("owl-init") === true) {
                return false
            }
            $(this).data("owl-init", true);
            var carousel = Object.create(Carousel);
            carousel.init(options, this);
            $.data(this, "owlCarousel", carousel)
        })
    };
    $.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1e3,
        autoPlay: false,
        stopOnHover: false,
        navigation: false,
        navigationText: ["prev", "next"],
        rewindNav: true,
        scrollPerPage: false,
        pagination: true,
        paginationNumbers: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: false,
        lazyFollow: true,
        lazyEffect: "fade",
        autoHeight: false,
        jsonPath: false,
        jsonSuccess: false,
        dragBeforeAnimFinish: true,
        mouseDrag: true,
        touchDrag: true,
        addClassActive: false,
        transitionStyle: false,
        beforeUpdate: false,
        afterUpdate: false,
        beforeInit: false,
        afterInit: false,
        beforeMove: false,
        afterMove: false,
        afterAction: false,
        startDragging: false,
        afterLazyLoad: false
    }
})(jQuery, window, document);
$(document).ready(function() {
    $(".responsive-accordion").each(function() {
        $(".responsive-accordion-minus", this).hide(), $(".responsive-accordion-panel", this).hide(), $(".responsive-accordion-head", this).click(function() {
            var i = $(this).parent().parent(),
                s = $(this),
                e = s.find(".responsive-accordion-plus"),
                n = s.find(".responsive-accordion-minus"),
                o = s.siblings(".responsive-accordion-panel");
            i.find(".responsive-accordion-plus").show(), i.find(".responsive-accordion-minus").hide(), i.find(".responsive-accordion-head").not(this).removeClass("active"), i.find(".responsive-accordion-panel").not(this).removeClass("active").slideUp(), s.hasClass("active") ? (s.removeClass("active"), e.show(), n.hide(), o.removeClass("active").slideUp()) : (s.addClass("active"), e.hide(), n.show(), o.addClass("active").slideDown())
        })
    })
});
(function() {
    "use strict";

    function EventEmitter() {}
    var proto = EventEmitter.prototype;
    var exports = this;
    var originalGlobalValue = exports.EventEmitter;

    function indexOfListener(listeners, listener) {
        var i = listeners.length;
        while (i--) {
            if (listeners[i].listener === listener) {
                return i
            }
        }
        return -1
    }

    function alias(name) {
        return function aliasClosure() {
            return this[name].apply(this, arguments)
        }
    }
    proto.getListeners = function getListeners(evt) {
        var events = this._getEvents();
        var response;
        var key;
        if (evt instanceof RegExp) {
            response = {};
            for (key in events) {
                if (events.hasOwnProperty(key) && evt.test(key)) {
                    response[key] = events[key]
                }
            }
        } else {
            response = events[evt] || (events[evt] = [])
        }
        return response
    };
    proto.flattenListeners = function flattenListeners(listeners) {
        var flatListeners = [];
        var i;
        for (i = 0; i < listeners.length; i += 1) {
            flatListeners.push(listeners[i].listener)
        }
        return flatListeners
    };
    proto.getListenersAsObject = function getListenersAsObject(evt) {
        var listeners = this.getListeners(evt);
        var response;
        if (listeners instanceof Array) {
            response = {};
            response[evt] = listeners
        }
        return response || listeners
    };
    proto.addListener = function addListener(evt, listener) {
        var listeners = this.getListenersAsObject(evt);
        var listenerIsWrapped = typeof listener === "object";
        var key;
        for (key in listeners) {
            if (listeners.hasOwnProperty(key) && indexOfListener(listeners[key], listener) === -1) {
                listeners[key].push(listenerIsWrapped ? listener : {
                    listener: listener,
                    once: false
                })
            }
        }
        return this
    };
    proto.on = alias("addListener");
    proto.addOnceListener = function addOnceListener(evt, listener) {
        return this.addListener(evt, {
            listener: listener,
            once: true
        })
    };
    proto.once = alias("addOnceListener");
    proto.defineEvent = function defineEvent(evt) {
        this.getListeners(evt);
        return this
    };
    proto.defineEvents = function defineEvents(evts) {
        for (var i = 0; i < evts.length; i += 1) {
            this.defineEvent(evts[i])
        }
        return this
    };
    proto.removeListener = function removeListener(evt, listener) {
        var listeners = this.getListenersAsObject(evt);
        var index;
        var key;
        for (key in listeners) {
            if (listeners.hasOwnProperty(key)) {
                index = indexOfListener(listeners[key], listener);
                if (index !== -1) {
                    listeners[key].splice(index, 1)
                }
            }
        }
        return this
    };
    proto.off = alias("removeListener");
    proto.addListeners = function addListeners(evt, listeners) {
        return this.manipulateListeners(false, evt, listeners)
    };
    proto.removeListeners = function removeListeners(evt, listeners) {
        return this.manipulateListeners(true, evt, listeners)
    };
    proto.manipulateListeners = function manipulateListeners(remove, evt, listeners) {
        var i;
        var value;
        var single = remove ? this.removeListener : this.addListener;
        var multiple = remove ? this.removeListeners : this.addListeners;
        if (typeof evt === "object" && !(evt instanceof RegExp)) {
            for (i in evt) {
                if (evt.hasOwnProperty(i) && (value = evt[i])) {
                    if (typeof value === "function") {
                        single.call(this, i, value)
                    } else {
                        multiple.call(this, i, value)
                    }
                }
            }
        } else {
            i = listeners.length;
            while (i--) {
                single.call(this, evt, listeners[i])
            }
        }
        return this
    };
    proto.removeEvent = function removeEvent(evt) {
        var type = typeof evt;
        var events = this._getEvents();
        var key;
        if (type === "string") {
            delete events[evt]
        } else if (evt instanceof RegExp) {
            for (key in events) {
                if (events.hasOwnProperty(key) && evt.test(key)) {
                    delete events[key]
                }
            }
        } else {
            delete this._events
        }
        return this
    };
    proto.removeAllListeners = alias("removeEvent");
    proto.emitEvent = function emitEvent(evt, args) {
        var listenersMap = this.getListenersAsObject(evt);
        var listeners;
        var listener;
        var i;
        var key;
        var response;
        for (key in listenersMap) {
            if (listenersMap.hasOwnProperty(key)) {
                listeners = listenersMap[key].slice(0);
                i = listeners.length;
                while (i--) {
                    listener = listeners[i];
                    if (listener.once === true) {
                        this.removeListener(evt, listener.listener)
                    }
                    response = listener.listener.apply(this, args || []);
                    if (response === this._getOnceReturnValue()) {
                        this.removeListener(evt, listener.listener)
                    }
                }
            }
        }
        return this
    };
    proto.trigger = alias("emitEvent");
    proto.emit = function emit(evt) {
        var args = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(evt, args)
    };
    proto.setOnceReturnValue = function setOnceReturnValue(value) {
        this._onceReturnValue = value;
        return this
    };
    proto._getOnceReturnValue = function _getOnceReturnValue() {
        if (this.hasOwnProperty("_onceReturnValue")) {
            return this._onceReturnValue
        } else {
            return true
        }
    };
    proto._getEvents = function _getEvents() {
        return this._events || (this._events = {})
    };
    EventEmitter.noConflict = function noConflict() {
        exports.EventEmitter = originalGlobalValue;
        return EventEmitter
    };
    if (typeof define === "function" && define.amd) {
        define("eventEmitter/EventEmitter", [], function() {
            return EventEmitter
        })
    } else if (typeof module === "object" && module.exports) {
        module.exports = EventEmitter
    } else {
        exports.EventEmitter = EventEmitter
    }
}).call(this);
(function(window, factory) {
    "use strict";
    if (typeof define == "function" && define.amd) {
        define(["eventEmitter/EventEmitter"], function(EventEmitter) {
            return factory(window, EventEmitter)
        })
    } else if (typeof module == "object" && module.exports) {
        module.exports = factory(window, require("wolfy87-eventemitter"))
    } else {
        window.imagesLoaded = factory(window, window.EventEmitter)
    }
})(window, function factory(window, EventEmitter) {
    var $ = window.jQuery;
    var console = window.console;

    function extend(a, b) {
        for (var prop in b) {
            a[prop] = b[prop]
        }
        return a
    }

    function makeArray(obj) {
        var ary = [];
        if (Array.isArray(obj)) {
            ary = obj
        } else if (typeof obj.length == "number") {
            for (var i = 0; i < obj.length; i++) {
                ary.push(obj[i])
            }
        } else {
            ary.push(obj)
        }
        return ary
    }

    function ImagesLoaded(elem, options, onAlways) {
        if (!(this instanceof ImagesLoaded)) {
            return new ImagesLoaded(elem, options, onAlways)
        }
        if (typeof elem == "string") {
            elem = document.querySelectorAll(elem)
        }
        this.elements = makeArray(elem);
        this.options = extend({}, this.options);
        if (typeof options == "function") {
            onAlways = options
        } else {
            extend(this.options, options)
        }
        if (onAlways) {
            this.on("always", onAlways)
        }
        this.getImages();
        if ($) {
            this.jqDeferred = new $.Deferred
        }
        setTimeout(function() {
            this.check()
        }.bind(this))
    }
    ImagesLoaded.prototype = Object.create(EventEmitter.prototype);
    ImagesLoaded.prototype.options = {};
    ImagesLoaded.prototype.getImages = function() {
        this.images = [];
        this.elements.forEach(this.addElementImages, this)
    };
    ImagesLoaded.prototype.addElementImages = function(elem) {
        if (elem.nodeName == "IMG") {
            this.addImage(elem)
        }
        if (this.options.background === true) {
            this.addElementBackgroundImages(elem)
        }
        var nodeType = elem.nodeType;
        if (!nodeType || !elementNodeTypes[nodeType]) {
            return
        }
        var childImgs = elem.querySelectorAll("img");
        for (var i = 0; i < childImgs.length; i++) {
            var img = childImgs[i];
            this.addImage(img)
        }
        if (typeof this.options.background == "string") {
            var children = elem.querySelectorAll(this.options.background);
            for (i = 0; i < children.length; i++) {
                var child = children[i];
                this.addElementBackgroundImages(child)
            }
        }
    };
    var elementNodeTypes = {
        1: true,
        9: true,
        11: true
    };
    ImagesLoaded.prototype.addElementBackgroundImages = function(elem) {
        var style = getComputedStyle(elem);
        if (!style) {
            return
        }
        var reURL = /url\((['"])?(.*?)\1\)/gi;
        var matches = reURL.exec(style.backgroundImage);
        while (matches !== null) {
            var url = matches && matches[2];
            if (url) {
                this.addBackground(url, elem)
            }
            matches = reURL.exec(style.backgroundImage)
        }
    };
    ImagesLoaded.prototype.addImage = function(img) {
        var loadingImage = new LoadingImage(img);
        this.images.push(loadingImage)
    };
    ImagesLoaded.prototype.addBackground = function(url, elem) {
        var background = new Background(url, elem);
        this.images.push(background)
    };
    ImagesLoaded.prototype.check = function() {
        var _this = this;
        this.progressedCount = 0;
        this.hasAnyBroken = false;
        if (!this.images.length) {
            this.complete();
            return
        }

        function onProgress(image, elem, message) {
            setTimeout(function() {
                _this.progress(image, elem, message)
            })
        }
        this.images.forEach(function(loadingImage) {
            loadingImage.once("progress", onProgress);
            loadingImage.check()
        })
    };
    ImagesLoaded.prototype.progress = function(image, elem, message) {
        this.progressedCount++;
        this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;
        this.emit("progress", this, image, elem);
        if (this.jqDeferred && this.jqDeferred.notify) {
            this.jqDeferred.notify(this, image)
        }
        if (this.progressedCount == this.images.length) {
            this.complete()
        }
        if (this.options.debug && console) {
            console.log("progress: " + message, image, elem)
        }
    };
    ImagesLoaded.prototype.complete = function() {
        var eventName = this.hasAnyBroken ? "fail" : "done";
        this.isComplete = true;
        this.emit(eventName, this);
        this.emit("always", this);
        if (this.jqDeferred) {
            var jqMethod = this.hasAnyBroken ? "reject" : "resolve";
            this.jqDeferred[jqMethod](this)
        }
    };

    function LoadingImage(img) {
        this.img = img
    }
    LoadingImage.prototype = Object.create(EventEmitter.prototype);
    LoadingImage.prototype.check = function() {
        var isComplete = this.getIsImageComplete();
        if (isComplete) {
            this.confirm(this.img.naturalWidth !== 0, "naturalWidth");
            return
        }
        this.proxyImage = new Image;
        this.proxyImage.addEventListener("load", this);
        this.proxyImage.addEventListener("error", this);
        this.img.addEventListener("load", this);
        this.img.addEventListener("error", this);
        this.proxyImage.src = this.img.src
    };
    LoadingImage.prototype.getIsImageComplete = function() {
        return this.img.complete && this.img.naturalWidth !== undefined
    };
    LoadingImage.prototype.confirm = function(isLoaded, message) {
        this.isLoaded = isLoaded;
        this.emit("progress", this, this.img, message)
    };
    LoadingImage.prototype.handleEvent = function(event) {
        var method = "on" + event.type;
        if (this[method]) {
            this[method](event)
        }
    };
    LoadingImage.prototype.onload = function() {
        this.confirm(true, "onload");
        this.unbindEvents()
    };
    LoadingImage.prototype.onerror = function() {
        this.confirm(false, "onerror");
        this.unbindEvents()
    };
    LoadingImage.prototype.unbindEvents = function() {
        this.proxyImage.removeEventListener("load", this);
        this.proxyImage.removeEventListener("error", this);
        this.img.removeEventListener("load", this);
        this.img.removeEventListener("error", this)
    };

    function Background(url, element) {
        this.url = url;
        this.element = element;
        this.img = new Image
    }
    Background.prototype = Object.create(LoadingImage.prototype);
    Background.prototype.check = function() {
        this.img.addEventListener("load", this);
        this.img.addEventListener("error", this);
        this.img.src = this.url;
        var isComplete = this.getIsImageComplete();
        if (isComplete) {
            this.confirm(this.img.naturalWidth !== 0, "naturalWidth");
            this.unbindEvents()
        }
    };
    Background.prototype.unbindEvents = function() {
        this.img.addEventListener("load", this);
        this.img.addEventListener("error", this)
    };
    Background.prototype.confirm = function(isLoaded, message) {
        this.isLoaded = isLoaded;
        this.emit("progress", this, this.element, message)
    };
    ImagesLoaded.makeJQueryPlugin = function(jQuery) {
        jQuery = jQuery || window.jQuery;
        if (!jQuery) {
            return
        }
        $ = jQuery;
        $.fn.imagesLoaded = function(options, callback) {
            var instance = new ImagesLoaded(this, options, callback);
            return instance.jqDeferred.promise($(this))
        }
    };
    ImagesLoaded.makeJQueryPlugin();
    return ImagesLoaded
});
(function(e, t, n) {
    "use strict";
    var r = t.event,
        i;
    r.special.smartresize = {
        setup: function() {
            t(this).bind("resize", r.special.smartresize.handler)
        },
        teardown: function() {
            t(this).unbind("resize", r.special.smartresize.handler)
        },
        handler: function(e, t) {
            var n = this,
                s = arguments;
            e.type = "smartresize", i && clearTimeout(i), i = setTimeout(function() {
                r.dispatch.apply(n, s)
            }, t === "execAsap" ? 0 : 100)
        }
    }, t.fn.smartresize = function(e) {
        return e ? this.bind("smartresize", e) : this.trigger("smartresize", ["execAsap"])
    }, t.Mason = function(e, n) {
        this.element = t(n), this._create(e), this._init()
    }, t.Mason.settings = {
        isResizable: !0,
        isAnimated: !1,
        animationOptions: {
            queue: !1,
            duration: 500
        },
        gutterWidth: 0,
        isRTL: !1,
        isFitWidth: !1,
        containerStyle: {
            position: "relative"
        }
    }, t.Mason.prototype = {
        _filterFindBricks: function(e) {
            var t = this.options.itemSelector;
            return t ? e.filter(t).add(e.find(t)) : e
        },
        _getBricks: function(e) {
            var t = this._filterFindBricks(e).css({
                position: "absolute"
            }).addClass("masonry-brick");
            return t
        },
        _create: function(n) {
            this.options = t.extend(!0, {}, t.Mason.settings, n), this.styleQueue = [];
            var r = this.element[0].style;
            this.originalStyle = {
                height: r.height || ""
            };
            var i = this.options.containerStyle;
            for (var s in i) this.originalStyle[s] = r[s] || "";
            this.element.css(i), this.horizontalDirection = this.options.isRTL ? "right" : "left";
            var o = this.element.css("padding-" + this.horizontalDirection),
                u = this.element.css("padding-top");
            this.offset = {
                x: o ? parseInt(o, 10) : 0,
                y: u ? parseInt(u, 10) : 0
            }, this.isFluid = this.options.columnWidth && typeof this.options.columnWidth == "function";
            var a = this;
            setTimeout(function() {
                a.element.addClass("masonry")
            }, 0), this.options.isResizable && t(e).bind("smartresize.masonry", function() {
                a.resize()
            }), this.reloadItems()
        },
        _init: function(e) {
            this._getColumns(), this._reLayout(e)
        },
        option: function(e, n) {
            t.isPlainObject(e) && (this.options = t.extend(!0, this.options, e))
        },
        layout: function(e, t) {
            for (var n = 0, r = e.length; n < r; n++) this._placeBrick(e[n]);
            var i = {};
            i.height = Math.max.apply(Math, this.colYs);
            if (this.options.isFitWidth) {
                var s = 0;
                n = this.cols;
                while (--n) {
                    if (this.colYs[n] !== 0) break;
                    s++
                }
                i.width = (this.cols - s) * this.columnWidth - this.options.gutterWidth
            }
            this.styleQueue.push({
                $el: this.element,
                style: i
            });
            var o = this.isLaidOut ? this.options.isAnimated ? "animate" : "css" : "css",
                u = this.options.animationOptions,
                a;
            for (n = 0, r = this.styleQueue.length; n < r; n++) a = this.styleQueue[n], a.$el[o](a.style, u);
            this.styleQueue = [], t && t.call(e), this.isLaidOut = !0
        },
        _getColumns: function() {
            var e = this.options.isFitWidth ? this.element.parent() : this.element,
                t = e.width();
            this.columnWidth = this.isFluid ? this.options.columnWidth(t) : this.options.columnWidth || this.$bricks.outerWidth(!0) || t, this.columnWidth += this.options.gutterWidth, this.cols = Math.floor((t + this.options.gutterWidth) / this.columnWidth), this.cols = Math.max(this.cols, 1)
        },
        _placeBrick: function(e) {
            var n = t(e),
                r, i, s, o, u;
            r = Math.ceil(n.outerWidth(!0) / this.columnWidth), r = Math.min(r, this.cols);
            if (r === 1) s = this.colYs;
            else {
                i = this.cols + 1 - r, s = [];
                for (u = 0; u < i; u++) o = this.colYs.slice(u, u + r), s[u] = Math.max.apply(Math, o)
            }
            var a = Math.min.apply(Math, s),
                f = 0;
            for (var l = 0, c = s.length; l < c; l++)
                if (s[l] === a) {
                    f = l;
                    break
                }
            var h = {
                top: a + this.offset.y
            };
            h[this.horizontalDirection] = this.columnWidth * f + this.offset.x, this.styleQueue.push({
                $el: n,
                style: h
            });
            var p = a + n.outerHeight(!0),
                d = this.cols + 1 - c;
            for (l = 0; l < d; l++) this.colYs[f + l] = p
        },
        resize: function() {
            var e = this.cols;
            this._getColumns(), (this.isFluid || this.cols !== e) && this._reLayout()
        },
        _reLayout: function(e) {
            var t = this.cols;
            this.colYs = [];
            while (t--) this.colYs.push(0);
            this.layout(this.$bricks, e)
        },
        reloadItems: function() {
            this.$bricks = this._getBricks(this.element.children())
        },
        reload: function(e) {
            this.reloadItems(), this._init(e)
        },
        appended: function(e, t, n) {
            if (t) {
                this._filterFindBricks(e).css({
                    top: this.element.height()
                });
                var r = this;
                setTimeout(function() {
                    r._appended(e, n)
                }, 1)
            } else this._appended(e, n)
        },
        _appended: function(e, t) {
            var n = this._getBricks(e);
            this.$bricks = this.$bricks.add(n), this.layout(n, t)
        },
        remove: function(e) {
            this.$bricks = this.$bricks.not(e), e.remove()
        },
        destroy: function() {
            this.$bricks.removeClass("masonry-brick").each(function() {
                this.style.position = "", this.style.top = "", this.style.left = ""
            });
            var n = this.element[0].style;
            for (var r in this.originalStyle) n[r] = this.originalStyle[r];
            this.element.unbind(".masonry").removeClass("masonry").removeData("masonry"), t(e).unbind(".masonry")
        }
    }, t.fn.imagesLoaded = function(e) {
        function u() {
            e.call(n, r)
        }

        function a(e) {
            var n = e.target;
            n.src !== s && t.inArray(n, o) === -1 && (o.push(n), --i <= 0 && (setTimeout(u), r.unbind(".imagesLoaded", a)))
        }
        var n = this,
            r = n.find("img").add(n.filter("img")),
            i = r.length,
            s = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",
            o = [];
        return i || u(), r.bind("load.imagesLoaded error.imagesLoaded", a).each(function() {
            var e = this.src;
            this.src = s, this.src = e
        }), n
    };
    var s = function(t) {
        e.console && e.console.error(t)
    };
    t.fn.masonry = function(e) {
        if (typeof e == "string") {
            var n = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                var r = t.data(this, "masonry");
                if (!r) {
                    s("cannot call methods on masonry prior to initialization; attempted to call method '" + e + "'");
                    return
                }
                if (!t.isFunction(r[e]) || e.charAt(0) === "_") {
                    s("no such method '" + e + "' for masonry instance");
                    return
                }
                r[e].apply(r, n)
            })
        } else this.each(function() {
            var n = t.data(this, "masonry");
            n ? (n.option(e || {}), n._init()) : t.data(this, "masonry", new t.Mason(e, this))
        });
        return this
    }
})(window, jQuery);
debounce = function(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) {
                func.apply(context, args)
            }
        };
        var call_now = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (call_now) {
            func.apply(context, args)
        }
    }
};
String.prototype.replaceAll = function(t, r) {
    return this.split(t).join(r)
};
String.prototype.ucfirst = function() {
    return this.charAt(0).toUpperCase() + this.substr(1)
};
String.prototype.ucwords = function() {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g, function($1) {
        return $1.toUpperCase()
    })
};
String.prototype.deserialize = function() {
    var o = {},
        arr = this.split("&");
    for (var i = 0; i < arr.length; i++) {
        var v = arr[i].split("=");
        o[v[0]] = v[1]
    }
    return o
};
String.prototype.getDate = function() {
    d = this.split("-");
    return new Date(d[0], d[1] - 1, d[2])
};
Array.prototype.chunk = function(chunkSize) {
    var array = this;
    return [].concat.apply([], array.map(function(el, i) {
        return i % chunkSize ? [] : [array.slice(i, i + chunkSize)]
    }))
};
$.ajaxSetup({
    cache: false
});
var missio = {
    GLOBAL_UPDATES: [],
    FILTER_LIST: null,
    GLOBAL_STATS: {
        act_count: "0",
        donation_count: "0",
        project_count: "0",
        share_count: "0",
        total_amount_raised: "0"
    },
    GENERIC_SERVER_ERROR_MESSAGE: "Currently, we are experiencing technical difficulties.",
    retrieveGlobalUpdates: function(func) {
        $.get("/wapi/get-global-updates").done(function(data) {
            missio.GLOBAL_UPDATES = data;
            if (func) {
                func()
            }
        })
    },
    doMasonry: function() {
        $("#containerCN").masonry($("#containerCN").hasClass("masonry") ? "reload" : {
            itemSelector: ".grid-item"
        })
    },
    setGlobalUpdates: function() {
        var list = $("#global_updates");
        list.empty();
        for (var i in missio.GLOBAL_UPDATES) {
            var item = missio.GLOBAL_UPDATES[i];
            var str = '<li><img width="40" src="{avatar}"><div><strong>{message}</strong><span>{updated}</span></div></li>';
            if (typeof item === "object") {
                for (var j in item) {
                    if (["updated"].indexOf(j) === -1) {
                        var v = item[j]
                    } else {
                        var date = new Date(parseInt(item[j]));
                        var v = missio.prettyDate(date)
                    }
                    str = str.replaceAll("{" + j + "}", v)
                }
                var row = $($.parseHTML(str));
                row.appendTo(list)
            }
        }
    },
    retrieveGlobalStats: function() {
        $.get("/wapi/get-global-stats").done(function(data) {
            missio.GLOBAL_STATS = data;
            missio.setGlobalStats()
        }).fail(function() {
            missio.setGlobalStats()
        })
    },
    setGlobalStats: function() {
        for (var i in missio.GLOBAL_STATS) {
            $("#" + i).html(missio.GLOBAL_STATS[i])
        }
    },
    getHomepageCarousel: function() {
        var list = $("#hero-carousel");
        $.get("/wapi/get-homepage-carousel/missio").done(function(data) {
            list.empty();
            for (var i in data) {
                var item = data[i];
                var str = '<div class="item"><a href="{url}"><img src="/carousel/{image}" alt=""/><p class="project_desc"><strong>{title}</strong><span>{subtitle}</span></p></a></div>';
                if (typeof item === "object") {
                    for (var j in item) {
                        var v = item[j];
                        str = str.replaceAll("{" + j + "}", v)
                    }
                    var row = $($.parseHTML(str));
                    row.appendTo(list)
                }
            }
            list.owlCarousel({
                singleItem: true,
                navigation: true,
                slideSpeed: 400,
                paginationSpeed: 400,
                pagination: true,
                autoHeight: true,
                addClassActive: true,
                navigationText: ["", "See next project&nbsp&nbsp"]
            })
        })
    },
    prettyDate: function(date) {
        var diff = (Date.now() - date.getTime()) / 1e3,
            day_diff = Math.floor(diff / 86400);
        if (isNaN(day_diff) || day_diff < 0) {
            return
        }
        return day_diff === 0 && (diff < 60 && "just now" || diff < 120 && "a minute ago" || diff < 3600 && Math.floor(diff / 60) + " minutes ago" || diff < 7200 && "an hour ago" || diff < 86400 && Math.floor(diff / 3600) + " hours ago") || day_diff === 1 && "yesterday" || day_diff < 7 && day_diff + " days ago" || Math.ceil(day_diff / 7) + " weeks ago"
    },
    addFilter: function(o, v) {
        for (it in missio.FILTER_LIST) {
            if (v === missio.FILTER_LIST[it].value) {
                l = missio.FILTER_LIST[it].label;
                break
            }
        }
        if (typeof l !== "undefined") {
            if (new RegExp("Featured").test(l)) {
                o.parents(".inner").find(".featured").addClass("active")
            } else {
                $("<span>").html(l.replace("Yes", "Featured")).appendTo(o);
                o.append(", ")
            }
        }
    },
    getResources: debounce(function(filters) {
        $.get("/wapi/get-resources", {
            filters: filters,
            frontend: true
        }).done(function(data) {
            var list = $("#containerCN");
            list.empty();
            if (data.list.length > 0) {
                var rc = 0;
                for (i = 0; i < data.list.length; i++) {
                    var item = data.list[i];
                    var str = document.getElementById("resource_template").innerHTML.toString();
                    if (typeof item === "object") {
                        for (var j in item) {
                            var v = item[j];
                            str = str.replaceAll("{" + j + "}", v || "")
                        }
                        var row = $($.parseHTML(str));
                        row.find("img").on("load", function() {
                            rc++;
                            if (data.list.length === rc) {
                                setTimeout(missio.doMasonry, 100)
                            }
                        }).attr("src", row.find("img").attr("data-src"));
                        row.appendTo(list)
                    }
                    var filters = row.find(".filter_list").attr("data-filters") === "" ? [] : row.find(".filter_list").attr("data-filters").split(",");
                    if (filters.length > 0) {
                        var fr = row.find(".filter_list");
                        for (j = 0; j < filters.length; j++) {
                            missio.addFilter(fr, filters[j])
                        }
                        fr.html(fr.html().replace(/,\s*$/, ""))
                    }
                }
            } else {
                var row = $($.parseHTML('<div class="cols grid-item"><span style="padding: 0 10px; display:block;">Currently, there are no results that match your search. Please try again by de-selecting one or more filters.<br><br> If you would like to make a suggestion about adding a resources, please email <a href="mailto:contact@missio.org">contact@missio.org</a>. Thanks!</span></div>'));
                row.appendTo(list)
            }
        })
    }, 500, true)
};
$(function() {
    $(".toggle_menu").click(function(e) {
        e.preventDefault();
        $("header nav").slideToggle();
        $(this).toggleClass("cross")
    });
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
        $(".apple_store").show();
        $(".google_play").hide()
    } else if (userAgent.match(/Android/i)) {
        $(".apple_store").hide();
        $(".google_play").show()
    } else {}
    $(".top").click(function(e) {
        e.preventDefault();
        off = $(".faq_list").offset().top;
        if ($("header").width() > 727) {
            $("body,html").animate({
                scrollTop: off - 80
            }, 1e3)
        } else {
            $("body,html").animate({
                scrollTop: 75
            }, 1e3)
        }
    });
    $(".faq_list li").click(function() {
        curr = $(this).index();
        off = $(".faq_content li:eq(" + curr + ")").offset().top;
        if ($("header").width() > 727) {
            $("body,html").animate({
                scrollTop: off - 20
            }, 1e3)
        } else {
            $("body,html").animate({
                scrollTop: off - 180
            }, 1e3)
        }
    });
    $(".resource-top").click(function(e) {
        e.preventDefault();
        off = $(".resource_sec").offset().top;
        if ($("header").width() > 727) {
            $("body,html").animate({
                scrollTop: off - 80
            }, 1e3)
        } else {
            $("body,html").animate({
                scrollTop: 75
            }, 1e3)
        }
    })
});
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 76) {
            $("header").addClass("nav_fixed")
        }
        if ($(window).scrollTop() < 76) {
            $("header").removeClass("nav_fixed")
        }
    });
    if ($("#hero-carousel").length > 0) {
        missio.getHomepageCarousel()
    }
    $("#email_signup").submit(function(e) {
        e.preventDefault()
    }).validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        errorLabelContainer: "#signup_email_message",
        submitHandler: function(form) {
            $.post("/wapi/email-signup", $(form).serialize()).done(function(data) {
                if (data.success) {
                    $("#signup_email_message").html(data.message).removeClass("error-message").addClass("active").fadeIn("slow").delay(2e3).fadeOut("slow", function() {
                        dataLayer.push({
                            event: "emailSubmit"
                        });
                        form.reset()
                    })
                } else {
                    $("#signup_email_message").html(data.message).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
                }
            }).fail(function() {
                $("#signup_email_message").html(missio.GENERIC_SERVER_ERROR_MESSAGE).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
            })
        }
    });
    $("#contact_us").submit(function(e) {
        e.preventDefault()
    }).validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            reason: {
                required: true
            },
            message: {
                required: true
            }
        },
        submitHandler: function(form) {
            $.post("/wapi/contact-us", $(form).serialize()).done(function(data) {
                if (data.success) {
                    $("#contact_us_message").html(data.message).removeClass("error-message").addClass("active").fadeIn("slow").delay(2e3).fadeOut("slow", function() {
                        form.reset()
                    })
                } else {
                    $("#contact_us_message").html(data.message).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
                }
            }).fail(function() {
                $("#contact_us_message").html(missio.GENERIC_SERVER_ERROR_MESSAGE).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
            })
        }
    });
    $("#faqs").submit(function(e) {
        e.preventDefault()
    }).validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            question: {
                required: true
            }
        },
        submitHandler: function(form) {
            $.post("/wapi/faqs", $(form).serialize()).done(function(data) {
                if (data.success) {
                    $("#faqs_message").html(data.message).removeClass("error-message").addClass("active").fadeIn("slow").delay(2e3).fadeOut("slow", function() {
                        form.reset()
                    })
                } else {
                    $("#faqs_message").html(data.message).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
                }
            }).fail(function() {
                $("#faqs_message").html(missio.GENERIC_SERVER_ERROR_MESSAGE).addClass("error-message").fadeIn("slow").delay(2e3).fadeOut("slow")
            })
        }
    });
    missio.retrieveGlobalUpdates(missio.setGlobalUpdates);
    setInterval(function() {
        missio.retrieveGlobalUpdates()
    }, 6e5);
    setInterval(function() {
        missio.setGlobalUpdates()
    }, 6e4);
    missio.retrieveGlobalStats();
    setInterval(function() {
        missio.retrieveGlobalStats()
    }, 3e4);
    if ($(".resource-filters").length > 0) {
        $(".filter-item").on("click", function(e) {
            var selectedItems = "";
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                if ($(this).parent().siblings().find("a.active").length == 0) {
                    $(this).parent().parent().parent().prev(".responsive-accordion-head").removeClass("child-active")
                }
            } else {
                $(this).addClass("active");
                if (!$(this).parent().parent().parent().prev(".responsive-accordion-head").hasClass("child-active")) {
                    $(this).parent().parent().parent().prev(".responsive-accordion-head").addClass("child-active")
                }
            }
            $(".resource-filters").find(".filter-item").each(function() {
                if ($(this).hasClass("active")) {
                    selectedItems += $(this).attr("data-filter-id") + ","
                }
            });
            selectedItems = selectedItems.replace(/,\s*$/, "");
            missio.getResources(selectedItems)
        })
    }
    if ($("#resource_template").length > 0) {
        missio.getResources()
    }
});

function OpenPopup(url) {
    var width = width >= 0 || 550;
    var height = height >= 0 || 400;
    var left = left >= 0 || window.screen.width / 2 - (width / 2 + 10);
    var top = top >= 0 || window.screen.height / 2 - (height / 2 + 50);
    window.open(url + "&v=" + Math.round(Math.random() * 1e3), "sharer", "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + left + ",top=" + top + ",screenX=" + left + ",screenY=" + top + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no")
}
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $(document).resize(function(e) {
        missio.doMasonry()
    })
} else {
    $(window).resize(function(e) {
        missio.doMasonry()
    })
}
</script>






