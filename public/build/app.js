(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./styles/app.css */ "./assets/styles/app.css");
/* harmony import */ var flowbite__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! flowbite */ "./node_modules/flowbite/lib/esm/index.js");
/* harmony import */ var _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @hotwired/stimulus */ "./node_modules/@hotwired/stimulus/dist/stimulus.js");
/* harmony import */ var _hotwired_stimulus_webpack_helpers__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @hotwired/stimulus-webpack-helpers */ "./node_modules/@hotwired/stimulus-webpack-helpers/dist/stimulus-webpack-helpers.js");





/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)





// Démarrer Stimulus
var application = _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_7__.Application.start();

// Charger automatiquement tous les contrôleurs de /controllers
var context = __webpack_require__("./assets/controllers sync recursive \\.js$");
application.load((0,_hotwired_stimulus_webpack_helpers__WEBPACK_IMPORTED_MODULE_8__.definitionsFromContext)(context));
var stagiaireListeFormation = document.querySelectorAll(".stagiaire-liste-formation");
document.querySelectorAll(".pagination-sofiane-actif, .pagination-sofiane").forEach(function (v, k, p) {
  v.addEventListener("click", function () {
    p.forEach(function (lmn) {
      if (lmn == v) {
        lmn.classList.remove("pagination-sofiane");
        lmn.classList.add("pagination-sofiane-actif");
        console.log(lmn, v);
      } else {
        console.log(lmn, v);
        lmn.classList.add("pagination-sofiane");
        lmn.classList.remove("pagination-sofiane-actif");
      }
    });
    stagiaireListeFormation.forEach(function (list, kBis) {
      if (kBis == k) {
        list.classList.remove("hidden");
      } else {
        list.classList.add("hidden");
      }
    });
    stagiaireListeFormation[k].classList.remove("hidden");
  });
});

/***/ }),

/***/ "./assets/controllers sync recursive \\.js$":
/*!****************************************!*\
  !*** ./assets/controllers/ sync \.js$ ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./form_controller.js": "./assets/controllers/form_controller.js",
	"./stars_controller.js": "./assets/controllers/stars_controller.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./assets/controllers sync recursive \\.js$";

/***/ }),

/***/ "./assets/controllers/form_controller.js":
/*!***********************************************!*\
  !*** ./assets/controllers/form_controller.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _default)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.function.bind.js */ "./node_modules/core-js/modules/es.function.bind.js");
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.object.proto.js */ "./node_modules/core-js/modules/es.object.proto.js");
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.reflect.construct.js */ "./node_modules/core-js/modules/es.reflect.construct.js");
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! @hotwired/stimulus */ "./node_modules/@hotwired/stimulus/dist/stimulus.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }





















function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _callSuper(t, o, e) { return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e)); }
function _possibleConstructorReturn(t, e) { if (e && ("object" == _typeof(e) || "function" == typeof e)) return e; if (void 0 !== e) throw new TypeError("Derived constructors may only return object or undefined"); return _assertThisInitialized(t); }
function _assertThisInitialized(e) { if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); return e; }
function _isNativeReflectConstruct() { try { var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); } catch (t) {} return (_isNativeReflectConstruct = function _isNativeReflectConstruct() { return !!t; })(); }
function _getPrototypeOf(t) { return _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function (t) { return t.__proto__ || Object.getPrototypeOf(t); }, _getPrototypeOf(t); }
function _inherits(t, e) { if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function"); t.prototype = Object.create(e && e.prototype, { constructor: { value: t, writable: !0, configurable: !0 } }), Object.defineProperty(t, "prototype", { writable: !1 }), e && _setPrototypeOf(t, e); }
function _setPrototypeOf(t, e) { return _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) { return t.__proto__ = e, t; }, _setPrototypeOf(t, e); }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }

var _default = /*#__PURE__*/function (_Controller) {
  function _default() {
    _classCallCheck(this, _default);
    return _callSuper(this, _default, arguments);
  }
  _inherits(_default, _Controller);
  return _createClass(_default, [{
    key: "submit",
    value: function submit(event) {
      var _this = this;
      event.preventDefault();
      var formData = new FormData(this.formTarget);
      fetch(this.formTarget.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest' // important pour détecter isXmlHttpRequest côté Symfony
        }
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        _this.feedbackTarget.innerHTML = "\n          <div class=\"alert alert-".concat(data.success ? 'success' : 'danger', " alert-dismissible fade show\" role=\"alert\">\n            ").concat(data.message, "\n            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n          </div>\n        ");
        if (data.success) {
          _this.formTarget.reset();
        }
      })["catch"](function () {
        _this.feedbackTarget.innerHTML = "\n          <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">\n            Une erreur est survenue. Veuillez r\xE9essayer plus tard.\n            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n          </div>\n        ";
      });
    }
  }]);
}(_hotwired_stimulus__WEBPACK_IMPORTED_MODULE_21__.Controller);
_defineProperty(_default, "targets", ['form', 'feedback']);


/***/ }),

/***/ "./assets/controllers/stars_controller.js":
/*!************************************************!*\
  !*** ./assets/controllers/stars_controller.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _default)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.array.index-of.js */ "./node_modules/core-js/modules/es.array.index-of.js");
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.function.bind.js */ "./node_modules/core-js/modules/es.function.bind.js");
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.object.proto.js */ "./node_modules/core-js/modules/es.object.proto.js");
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.parse-int.js */ "./node_modules/core-js/modules/es.parse-int.js");
/* harmony import */ var core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.reflect.construct.js */ "./node_modules/core-js/modules/es.reflect.construct.js");
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! @hotwired/stimulus */ "./node_modules/@hotwired/stimulus/dist/stimulus.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }

























function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _callSuper(t, o, e) { return o = _getPrototypeOf(o), _possibleConstructorReturn(t, _isNativeReflectConstruct() ? Reflect.construct(o, e || [], _getPrototypeOf(t).constructor) : o.apply(t, e)); }
function _possibleConstructorReturn(t, e) { if (e && ("object" == _typeof(e) || "function" == typeof e)) return e; if (void 0 !== e) throw new TypeError("Derived constructors may only return object or undefined"); return _assertThisInitialized(t); }
function _assertThisInitialized(e) { if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); return e; }
function _isNativeReflectConstruct() { try { var t = !Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); } catch (t) {} return (_isNativeReflectConstruct = function _isNativeReflectConstruct() { return !!t; })(); }
function _getPrototypeOf(t) { return _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function (t) { return t.__proto__ || Object.getPrototypeOf(t); }, _getPrototypeOf(t); }
function _inherits(t, e) { if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function"); t.prototype = Object.create(e && e.prototype, { constructor: { value: t, writable: !0, configurable: !0 } }), Object.defineProperty(t, "prototype", { writable: !1 }), e && _setPrototypeOf(t, e); }
function _setPrototypeOf(t, e) { return _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function (t, e) { return t.__proto__ = e, t; }, _setPrototypeOf(t, e); }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
// stars_controller.js

var _default = /*#__PURE__*/function (_Controller) {
  function _default() {
    _classCallCheck(this, _default);
    return _callSuper(this, _default, arguments);
  }
  _inherits(_default, _Controller);
  return _createClass(_default, [{
    key: "connect",
    value: function connect() {
      var _this = this;
      this.groupTargets.forEach(function (group, index) {
        var input = _this.inputTargets[index];
        var value = parseInt(input.value || 0);
        _this.updateStars(group, value);
      });
    }
  }, {
    key: "selectStar",
    value: function selectStar(event) {
      var star = event.currentTarget;
      var value = parseInt(star.dataset.starsValue);
      var group = star.closest("[data-stars-target='group']");
      var index = this.groupTargets.indexOf(group);
      var input = this.inputTargets[index];
      input.value = value;
      this.updateStars(group, value);
    }
  }, {
    key: "updateStars",
    value: function updateStars(group, value) {
      var stars = group.querySelectorAll(".star");
      stars.forEach(function (star, index) {
        star.textContent = index < value ? "★" : "☆";
        star.classList.toggle("text-yellow-400", index < value);
        star.classList.toggle("text-gray-300", index >= value);
      });
    }
  }]);
}(_hotwired_stimulus__WEBPACK_IMPORTED_MODULE_25__.Controller);
_defineProperty(_default, "targets", ["group", "input"]);


/***/ }),

/***/ "./assets/styles/app.css":
/*!*******************************!*\
  !*** ./assets/styles/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_hotwired_stimulus-webpack-helpers_dist_stimulus-webpack-helpers_js-node_-09cee5"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFPLENBQUM7TUFDN0MrRCxLQUFLLENBQUM5RCxPQUFPLENBQUMsVUFBQ3dELElBQUksRUFBRU4sS0FBSyxFQUFLO1FBQzdCTSxJQUFJLENBQUNPLFdBQVcsR0FBR2IsS0FBSyxHQUFHNUIsS0FBSyxHQUFHLEdBQUcsR0FBRyxHQUFHO1FBQzVDa0MsSUFBSSxDQUFDbEQsU0FBUyxDQUFDMEQsTUFBTSxDQUFDLGlCQUFpQixFQUFFZCxLQUFLLEdBQUc1QixLQUFLLENBQUM7UUFDdkRrQyxJQUFJLENBQUNsRCxTQUFTLENBQUMwRCxNQUFNLENBQUMsZUFBZSxFQUFFZCxLQUFLLElBQUk1QixLQUFLLENBQUM7TUFDeEQsQ0FBQyxDQUFDO0lBQ0o7RUFBQztBQUFBLEVBN0IwQlQsMkRBQVU7QUFBQWdDLGVBQUEsQ0FBQS9CLFFBQUEsYUFDcEIsQ0FBQyxPQUFPLEVBQUUsT0FBTyxDQUFDOzs7Ozs7Ozs7Ozs7O0FDSnJDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY29udHJvbGxlcnMvIHN5bmMgXFwuanMkIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy9mb3JtX2NvbnRyb2xsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2NvbnRyb2xsZXJzL3N0YXJzX2NvbnRyb2xsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXHJcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcclxuICpcclxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxyXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxyXG4gKi9cclxuXHJcbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuY3NzJztcclxuaW1wb3J0ICdmbG93Yml0ZSc7XHJcblxyXG5pbXBvcnQgeyBBcHBsaWNhdGlvbiB9IGZyb20gJ0Bob3R3aXJlZC9zdGltdWx1cydcclxuaW1wb3J0IHsgZGVmaW5pdGlvbnNGcm9tQ29udGV4dCB9IGZyb20gJ0Bob3R3aXJlZC9zdGltdWx1cy13ZWJwYWNrLWhlbHBlcnMnXHJcblxyXG4vLyBEw6ltYXJyZXIgU3RpbXVsdXNcclxuY29uc3QgYXBwbGljYXRpb24gPSBBcHBsaWNhdGlvbi5zdGFydCgpXHJcblxyXG4vLyBDaGFyZ2VyIGF1dG9tYXRpcXVlbWVudCB0b3VzIGxlcyBjb250csO0bGV1cnMgZGUgL2NvbnRyb2xsZXJzXHJcbmNvbnN0IGNvbnRleHQgPSByZXF1aXJlLmNvbnRleHQoJy4vY29udHJvbGxlcnMnLCB0cnVlLCAvXFwuanMkLylcclxuYXBwbGljYXRpb24ubG9hZChkZWZpbml0aW9uc0Zyb21Db250ZXh0KGNvbnRleHQpKVxyXG5cclxuXHJcbmxldCBzdGFnaWFpcmVMaXN0ZUZvcm1hdGlvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuc3RhZ2lhaXJlLWxpc3RlLWZvcm1hdGlvblwiKVxyXG5cclxuZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5wYWdpbmF0aW9uLXNvZmlhbmUtYWN0aWYsIC5wYWdpbmF0aW9uLXNvZmlhbmVcIikuZm9yRWFjaCgodixrLHApID0+XHJcbntcclxuICAgIHYuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsICgpPT5cclxuICAgIHtcclxuXHJcbiAgICAgICAgcC5mb3JFYWNoKGxtbiA9PiB7XHJcbiAgICAgICAgICAgIGlmKGxtbiA9PSB2KVxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBsbW4uY2xhc3NMaXN0LnJlbW92ZShcInBhZ2luYXRpb24tc29maWFuZVwiKVxyXG4gICAgICAgICAgICAgICAgbG1uLmNsYXNzTGlzdC5hZGQoXCJwYWdpbmF0aW9uLXNvZmlhbmUtYWN0aWZcIilcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGxtbiwgdilcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGxtbiwgdilcclxuICAgICAgICAgICAgICAgIGxtbi5jbGFzc0xpc3QuYWRkKFwicGFnaW5hdGlvbi1zb2ZpYW5lXCIpXHJcbiAgICAgICAgICAgICAgICBsbW4uY2xhc3NMaXN0LnJlbW92ZShcInBhZ2luYXRpb24tc29maWFuZS1hY3RpZlwiKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcblxyXG5cclxuICAgICAgICBzdGFnaWFpcmVMaXN0ZUZvcm1hdGlvbi5mb3JFYWNoKChsaXN0LCBrQmlzKT0+XHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpZihrQmlzID09IGspXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIGxpc3QuY2xhc3NMaXN0LnJlbW92ZShcImhpZGRlblwiKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGVsc2VcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgbGlzdC5jbGFzc0xpc3QuYWRkKFwiaGlkZGVuXCIpXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KVxyXG4gICAgICAgIHN0YWdpYWlyZUxpc3RlRm9ybWF0aW9uW2tdLmNsYXNzTGlzdC5yZW1vdmUoXCJoaWRkZW5cIilcclxuXHJcbiAgICB9KVxyXG59KSIsInZhciBtYXAgPSB7XG5cdFwiLi9mb3JtX2NvbnRyb2xsZXIuanNcIjogXCIuL2Fzc2V0cy9jb250cm9sbGVycy9mb3JtX2NvbnRyb2xsZXIuanNcIixcblx0XCIuL3N0YXJzX2NvbnRyb2xsZXIuanNcIjogXCIuL2Fzc2V0cy9jb250cm9sbGVycy9zdGFyc19jb250cm9sbGVyLmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vYXNzZXRzL2NvbnRyb2xsZXJzIHN5bmMgcmVjdXJzaXZlIFxcXFwuanMkXCI7IiwiaW1wb3J0IHsgQ29udHJvbGxlciB9IGZyb20gJ0Bob3R3aXJlZC9zdGltdWx1cyc7XHJcblxyXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBleHRlbmRzIENvbnRyb2xsZXIge1xyXG4gIHN0YXRpYyB0YXJnZXRzID0gWydmb3JtJywgJ2ZlZWRiYWNrJ107XHJcblxyXG4gIHN1Ym1pdChldmVudCkge1xyXG4gICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICBjb25zdCBmb3JtRGF0YSA9IG5ldyBGb3JtRGF0YSh0aGlzLmZvcm1UYXJnZXQpO1xyXG5cclxuICAgIGZldGNoKHRoaXMuZm9ybVRhcmdldC5hY3Rpb24sIHtcclxuICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgIGJvZHk6IGZvcm1EYXRhLFxyXG4gICAgICBoZWFkZXJzOiB7XHJcbiAgICAgICAgJ1gtUmVxdWVzdGVkLVdpdGgnOiAnWE1MSHR0cFJlcXVlc3QnIC8vIGltcG9ydGFudCBwb3VyIGTDqXRlY3RlciBpc1htbEh0dHBSZXF1ZXN0IGPDtHTDqSBTeW1mb255XHJcbiAgICAgIH1cclxuICAgIH0pXHJcbiAgICAgIC50aGVuKHJlc3BvbnNlID0+IHJlc3BvbnNlLmpzb24oKSlcclxuICAgICAgLnRoZW4oZGF0YSA9PiB7XHJcbiAgICAgICAgdGhpcy5mZWVkYmFja1RhcmdldC5pbm5lckhUTUwgPSBgXHJcbiAgICAgICAgICA8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtJHtkYXRhLnN1Y2Nlc3MgPyAnc3VjY2VzcycgOiAnZGFuZ2VyJ30gYWxlcnQtZGlzbWlzc2libGUgZmFkZSBzaG93XCIgcm9sZT1cImFsZXJ0XCI+XHJcbiAgICAgICAgICAgICR7ZGF0YS5tZXNzYWdlfVxyXG4gICAgICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImJ0bi1jbG9zZVwiIGRhdGEtYnMtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+PC9idXR0b24+XHJcbiAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICBgO1xyXG5cclxuICAgICAgICBpZiAoZGF0YS5zdWNjZXNzKSB7XHJcbiAgICAgICAgICB0aGlzLmZvcm1UYXJnZXQucmVzZXQoKTtcclxuICAgICAgICB9XHJcbiAgICAgIH0pXHJcbiAgICAgIC5jYXRjaCgoKSA9PiB7XHJcbiAgICAgICAgdGhpcy5mZWVkYmFja1RhcmdldC5pbm5lckhUTUwgPSBgXHJcbiAgICAgICAgICA8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtZGFuZ2VyIGFsZXJ0LWRpc21pc3NpYmxlIGZhZGUgc2hvd1wiIHJvbGU9XCJhbGVydFwiPlxyXG4gICAgICAgICAgICBVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZS4gVmV1aWxsZXogcsOpZXNzYXllciBwbHVzIHRhcmQuXHJcbiAgICAgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiYnRuLWNsb3NlXCIgZGF0YS1icy1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj48L2J1dHRvbj5cclxuICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgIGA7XHJcbiAgICAgIH0pO1xyXG4gIH1cclxufVxyXG4iLCIvLyBzdGFyc19jb250cm9sbGVyLmpzXHJcbmltcG9ydCB7IENvbnRyb2xsZXIgfSBmcm9tIFwiQGhvdHdpcmVkL3N0aW11bHVzXCI7XHJcblxyXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBleHRlbmRzIENvbnRyb2xsZXIge1xyXG4gIHN0YXRpYyB0YXJnZXRzID0gW1wiZ3JvdXBcIiwgXCJpbnB1dFwiXTtcclxuXHJcbiAgY29ubmVjdCgpIHtcclxuICAgIHRoaXMuZ3JvdXBUYXJnZXRzLmZvckVhY2goKGdyb3VwLCBpbmRleCkgPT4ge1xyXG4gICAgICBjb25zdCBpbnB1dCA9IHRoaXMuaW5wdXRUYXJnZXRzW2luZGV4XTtcclxuICAgICAgY29uc3QgdmFsdWUgPSBwYXJzZUludChpbnB1dC52YWx1ZSB8fCAwKTtcclxuICAgICAgdGhpcy51cGRhdGVTdGFycyhncm91cCwgdmFsdWUpO1xyXG4gICAgfSk7XHJcbiAgfVxyXG5cclxuICBzZWxlY3RTdGFyKGV2ZW50KSB7XHJcbiAgICBjb25zdCBzdGFyID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgIGNvbnN0IHZhbHVlID0gcGFyc2VJbnQoc3Rhci5kYXRhc2V0LnN0YXJzVmFsdWUpO1xyXG4gICAgY29uc3QgZ3JvdXAgPSBzdGFyLmNsb3Nlc3QoXCJbZGF0YS1zdGFycy10YXJnZXQ9J2dyb3VwJ11cIik7XHJcbiAgICBjb25zdCBpbmRleCA9IHRoaXMuZ3JvdXBUYXJnZXRzLmluZGV4T2YoZ3JvdXApO1xyXG4gICAgY29uc3QgaW5wdXQgPSB0aGlzLmlucHV0VGFyZ2V0c1tpbmRleF07XHJcblxyXG4gICAgaW5wdXQudmFsdWUgPSB2YWx1ZTtcclxuICAgIHRoaXMudXBkYXRlU3RhcnMoZ3JvdXAsIHZhbHVlKTtcclxuICB9XHJcblxyXG4gIHVwZGF0ZVN0YXJzKGdyb3VwLCB2YWx1ZSkge1xyXG4gICAgY29uc3Qgc3RhcnMgPSBncm91cC5xdWVyeVNlbGVjdG9yQWxsKFwiLnN0YXJcIik7XHJcbiAgICBzdGFycy5mb3JFYWNoKChzdGFyLCBpbmRleCkgPT4ge1xyXG4gICAgICBzdGFyLnRleHRDb250ZW50ID0gaW5kZXggPCB2YWx1ZSA/IFwi4piFXCIgOiBcIuKYhlwiO1xyXG4gICAgICBzdGFyLmNsYXNzTGlzdC50b2dnbGUoXCJ0ZXh0LXllbGxvdy00MDBcIiwgaW5kZXggPCB2YWx1ZSk7XHJcbiAgICAgIHN0YXIuY2xhc3NMaXN0LnRvZ2dsZShcInRleHQtZ3JheS0zMDBcIiwgaW5kZXggPj0gdmFsdWUpO1xyXG4gICAgfSk7XHJcbiAgfVxyXG59XHJcbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJBcHBsaWNhdGlvbiIsImRlZmluaXRpb25zRnJvbUNvbnRleHQiLCJhcHBsaWNhdGlvbiIsInN0YXJ0IiwiY29udGV4dCIsInJlcXVpcmUiLCJsb2FkIiwic3RhZ2lhaXJlTGlzdGVGb3JtYXRpb24iLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwidiIsImsiLCJwIiwiYWRkRXZlbnRMaXN0ZW5lciIsImxtbiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFkZCIsImNvbnNvbGUiLCJsb2ciLCJsaXN0Iiwia0JpcyIsIkNvbnRyb2xsZXIiLCJfZGVmYXVsdCIsIl9Db250cm9sbGVyIiwiX2NsYXNzQ2FsbENoZWNrIiwiX2NhbGxTdXBlciIsImFyZ3VtZW50cyIsIl9pbmhlcml0cyIsIl9jcmVhdGVDbGFzcyIsImtleSIsInZhbHVlIiwic3VibWl0IiwiZXZlbnQiLCJfdGhpcyIsInByZXZlbnREZWZhdWx0IiwiZm9ybURhdGEiLCJGb3JtRGF0YSIsImZvcm1UYXJnZXQiLCJmZXRjaCIsImFjdGlvbiIsIm1ldGhvZCIsImJvZHkiLCJoZWFkZXJzIiwidGhlbiIsInJlc3BvbnNlIiwianNvbiIsImRhdGEiLCJmZWVkYmFja1RhcmdldCIsImlubmVySFRNTCIsImNvbmNhdCIsInN1Y2Nlc3MiLCJtZXNzYWdlIiwicmVzZXQiLCJfZGVmaW5lUHJvcGVydHkiLCJkZWZhdWx0IiwiY29ubmVjdCIsImdyb3VwVGFyZ2V0cyIsImdyb3VwIiwiaW5kZXgiLCJpbnB1dCIsImlucHV0VGFyZ2V0cyIsInBhcnNlSW50IiwidXBkYXRlU3RhcnMiLCJzZWxlY3RTdGFyIiwic3RhciIsImN1cnJlbnRUYXJnZXQiLCJkYXRhc2V0Iiwic3RhcnNWYWx1ZSIsImNsb3Nlc3QiLCJpbmRleE9mIiwic3RhcnMiLCJ0ZXh0Q29udGVudCIsInRvZ2dsZSJdLCJzb3VyY2VSb290IjoiIn0=