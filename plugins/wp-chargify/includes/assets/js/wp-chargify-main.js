/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets-src/helpers/check-data-types.js":
/*!************************************************!*\
  !*** ./assets-src/helpers/check-data-types.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Check; });
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./build-tools/node_modules/@babel/runtime/helpers/typeof.js");
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./build-tools/node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./build-tools/node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);




/**
 * Checker class that checks data types.
 */
var Check = /*#__PURE__*/function () {
  function Check() {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, Check);
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(Check, null, [{
    key: "isString",

    /**
     * Asseses if a value is a string
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a string.
     */
    value: function isString(value) {
      return Check.isDefined(value) && !Check.isNull(value) && (typeof value === 'string' || value instanceof String);
    }
    /**
     * Returns if a value is really a number
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a number.
     */

  }, {
    key: "isNumber",
    value: function isNumber(value) {
      return Check.isDefined(value) && !Check.isNull(value) && typeof value === 'number' && isFinite(value);
    }
    /**
     * Returns if a value is really a numeric
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a numeric.
     */

  }, {
    key: "isNumeric",
    value: function isNumeric(value) {
      return Check.isDefined(value) && !Check.isNull(value) && !isNaN(parseFloat(value)) && isFinite(value);
    }
    /**
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a an array.
     */

  }, {
    key: "isArray",
    value: function isArray(value) {
      return Check.isDefined(value) && !Check.isNull(value) && Array.isArray(value);
    }
    /**
     * Returns if a value is a function
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a function.
     */

  }, {
    key: "isFunction",
    value: function isFunction(value) {
      return Check.isDefined(value) && !Check.isNull(value) && typeof value === 'function';
    }
    /**
     * Returns if a value is an object
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a object.
     */

  }, {
    key: "isObject",
    value: function isObject(value) {
      return Check.isDefined(value) && !Check.isNull(value) && _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(value) === 'object' && value.constructor === Object;
    }
    /**
     * Basic function to check if a object is empty
     *
     * @param {*} obj The value to be assessed.
     *
     * @return {boolean} Returns if a value is a empty object.
     */

  }, {
    key: "isObjectEmpty",
    value: function isObjectEmpty(obj) {
      var is = true;

      if (Check.isObject(obj)) {
        for (var key in obj) {
          if (obj.hasOwnProperty(key)) {
            is = false;
            break;
          }
        }
      }

      return is;
    }
    /**
     * Returns if a value is null
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is null.
     */

  }, {
    key: "isNull",
    value: function isNull(value) {
      return Check.isDefined(value) && value === null;
    }
    /**
     * Returns if a value is undefined even if its nested in a object as this case it will error the try/catch
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is undefined.
     */

  }, {
    key: "isUndefined",
    value: function isUndefined(value) {
      return typeof value === 'undefined';
    }
    /**
     * Returns if a value is defined.
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is undefined.
     */

  }, {
    key: "isDefined",
    value: function isDefined(value) {
      return typeof value !== 'undefined';
    }
    /**
     * Returns if a value is a boolean
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a boolean.
     */

  }, {
    key: "isBoolean",
    value: function isBoolean(value) {
      return Check.isDefined(value) && !Check.isNull(value) && typeof value === 'boolean';
    }
    /**
     * Returns if a value is a regexp
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a Regex.
     */

  }, {
    key: "isRegExp",
    value: function isRegExp(value) {
      return Check.isDefined(value) && !Check.isNull(value) && _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(value) === 'object' && value.constructor === RegExp;
    }
    /**
     * Returns if value is an error object
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a error.
     */

  }, {
    key: "isError",
    value: function isError(value) {
      return Check.isDefined(value) && !Check.isNull(value) && value instanceof Error && typeof value.message !== 'undefined';
    }
    /**
     * Returns if value is a date object
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a date.
     */

  }, {
    key: "isDate",
    value: function isDate(value) {
      return Check.isDefined(value) && !Check.isNull(value) && value instanceof Date;
    }
    /**
     * Returns if a Symbol
     *
     * @param {*} value The value to be assessed.
     *
     * @return {boolean} Returns if a value is a symbol.
     */

  }, {
    key: "isSymbol",
    value: function isSymbol(value) {
      return Check.isDefined(value) && !Check.isNull(value) && _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(value) === 'symbol';
    }
  }]);

  return Check;
}();



/***/ }),

/***/ "./assets-src/helpers/logger.js":
/*!**************************************!*\
  !*** ./assets-src/helpers/logger.js ***!
  \**************************************/
/*! exports provided: log */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "log", function() { return log; });
var logColors = {
  error: 'background: #242424; color: red',
  warning: 'background: #242424; color: yellow;',
  info: 'background: #242424; color: cyan;',
  pass: 'background: #242424; color: green;',
  debug: 'background: #242424; color: orchid;',
  event: 'background: #242424; color: magenta;'
};
/**
 * Checks if the query string is available currently supports
 * log=error
 * log=info
 * log=all
 * Or you can use an array of values to display specific messages
 * ?log[]=info&log[]=error&log[]=warning
 *
 * @param {string} string The string to assess.
 *
 * @return {boolean} Is the log a query string present in the url.
 */

function checkUrlQueryString(string) {
  var url = window.location.href;
  var result = false;

  if (url.indexOf("?log=".concat(string)) !== -1 || url.indexOf("&log=".concat(string)) !== -1 || url.indexOf("?log[]=".concat(string)) !== -1 || url.indexOf("&log[]=".concat(string)) !== -1) {
    result = true;
  }

  return result;
}

function logMessage(logDetails) {
  // Ensure logDetails message is present as its required.
  if ('undefined' !== typeof logDetails.message) {
    if ('undefined' !== typeof logDetails.details) {
      // eslint-disable-next-line no-console
      console.group();
    }

    if ('undefined' !== typeof logDetails.message) {
      // eslint-disable-next-line no-console
      console.log("%c".concat(logDetails.message), logColors[logDetails.type]);
    } else {
      // eslint-disable-next-line no-console
      console.log(logDetails.message);
    }

    if ('undefined' !== typeof logDetails.details) {
      // eslint-disable-next-line no-console
      console.log(logDetails.details); // eslint-disable-next-line no-console

      console.groupEnd();
    }
  } else {
    // eslint-disable-next-line no-console
    console.group(); // eslint-disable-next-line no-console

    console.log("%cIssue with use of log(), please ensure a object is passed to log(). in form of:", logColors.error); // eslint-disable-next-line no-console

    console.log({
      type: 'String either error, warning, info or pass',
      message: 'Message to be highlighted for details.',
      details: 'Mixed/Not Required'
    }); // eslint-disable-next-line no-console

    console.groupEnd();
  }
}
/**
 * Logger to log to console if query string is present in url.
 *
 * Message is displayed in correct color for type. Details can be a array, object,
 * Type can be one of error, warning, info or pass.
 *
 * @param {Object} logDetails = {type: 'string', message: 'string', details = 'mixed'}
 * logDetails.type        String either error, warning, info or pass.
 * logDetails.message    Message to be highlighted for details.
 * logDetails.details    Details.
 */


function log() {
  var logDetails = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

  // ensure that the query string is one of, error, warning, info, pass or all.
  if (checkUrlQueryString('info') || checkUrlQueryString('pass') || checkUrlQueryString('debug') || checkUrlQueryString('event') || checkUrlQueryString('all')) {
    // eslint-disable-next-line no-console
    if ('undefined' !== typeof console && console.log !== undefined) {
      // Ensure only matching type logs get displayed.
      if ('undefined' !== typeof logDetails.type && (checkUrlQueryString(logDetails.type) || checkUrlQueryString('all'))) {
        // Error and warnings are handled differently, always displayed.
        if ('undefined' !== typeof logDetails.type && logDetails.type !== 'error' && logDetails.type !== 'warning') {
          // Log errors and warnings.
          logMessage(logDetails);
        }
      }
    }
  }

  if ('undefined' !== typeof logDetails.type && (logDetails.type === 'error' || logDetails.type === 'warning')) {
    // Log errors and warnings.
    logMessage(logDetails);
  }
}

/***/ }),

/***/ "./assets-src/main/js/coupons/index.js":
/*!*********************************************!*\
  !*** ./assets-src/main/js/coupons/index.js ***!
  \*********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _validate_coupon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./validate-coupon */ "./assets-src/main/js/coupons/validate-coupon.js");
// Library imports.
 // Local imports.


/**
 * Initialize the country and state selectors.
 */

jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
  // Validate Coupon functionality.
  new _validate_coupon__WEBPACK_IMPORTED_MODULE_1__["ValidateCoupon"]('#chargify_coupon_verify_button', '#chargify_coupon_code');
});

/***/ }),

/***/ "./assets-src/main/js/coupons/validate-coupon.js":
/*!*******************************************************!*\
  !*** ./assets-src/main/js/coupons/validate-coupon.js ***!
  \*******************************************************/
/*! exports provided: ValidateCoupon */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ValidateCoupon", function() { return ValidateCoupon; });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./build-tools/node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./build-tools/node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./build-tools/node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./build-tools/node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./build-tools/node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _helpers_logger__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../helpers/logger */ "./assets-src/helpers/logger.js");
/* harmony import */ var _helpers_check_data_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../helpers/check-data-types */ "./assets-src/helpers/check-data-types.js");






function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }



 // import { check, log, centsToDollars } from '../helpers';
// Grab config params.

var _window$wpChargifyMai = window.wpChargifyMainConfig,
    ajaxURL = _window$wpChargifyMai.ajaxURL,
    validateCouponAction = _window$wpChargifyMai.validateCouponAction,
    validateCouponNonce = _window$wpChargifyMai.validateCouponNonce;
var ValidateCoupon = /*#__PURE__*/function () {
  // Buttons.

  /**
   * Constructor for the validate coupon js.
   *
   * @param {jQuery|HTMLElement|string} validateButtonID The container of valid id selector to use with jQuery.
   * @param {jQuery|HTMLElement|string} couponInputID The container of valid id selector to use with jQuery.
   *
   * TODO.
   * need elements
   * current price in cents, hidden, with attached current price in dollars visual.
   * discount %
   * discount fixed %
   * discounted price in cents, hidden, with attached current price in dollars visual only if discount is different to current.
   */
  function ValidateCoupon(validateButtonID, couponInputID) {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, ValidateCoupon);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_validateButtonEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_validateButtonElHtml", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_productFamilyIdEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_couponInputEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_couponApplied", false);

    this.validateButtonEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()(validateButtonID);
    this.couponInputEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()(couponInputID); // Sanity check that the elements exists.

    if (this.validateButtonEl.length && this.couponInputEl.length) {
      // The original button html.
      this.validateButtonElHtml = this.validateButtonEl.html(); // functionality.

      this.onInput();
      this.onSubmit();
    } else {
      Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
        type: 'debug',
        message: 'No coupon fields on this page.'
      });
    }
  }
  /** ------------------------------------------------------------------------------------------
   * Submit Process
   * ------------------------------------------------------------------------------------------ */

  /**
   * Form submit.
   */


  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3___default()(ValidateCoupon, [{
    key: "onSubmit",
    value: function onSubmit() {
      var _this = this;

      // Form should be valid before submit button works.
      this.validateButtonEl.click(function (e) {
        e.preventDefault();

        var coupon = _this.couponInputEl.val(); // If there is a coupon proceed.


        if (coupon.length) {
          _this.submitting(true); // TODO.


          _this.showDiscountEls(false); // this.clearDiscountEls();
          // Start process.
          // STEP 1. Check via admin ajax that the coupon is valid, and retrieve its information.


          _this.validateCoupon().then(function (response) {
            if (response.success) {
              Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
                type: 'info',
                message: 'Successful retrieved the coupon.',
                details: {
                  response: response
                }
              }); // TODO continue testing.
              // TODO delete Current Test Codes; TCCTESTCOUPONFIXED, TCCTESTCOUPONPERCENT

              var data = response.data;
              var _coupon = data.coupon;

              _this.processCouponResult(_coupon);

              _this.showDiscountEls(true);

              _this.submitting(false, 'success');

              _this.couponInputEl.trigger('page_message');

              return true;
            }

            throw new Error();
          }).catch(function () {
            // Don't log errors, leave that to log(). Reset for and scroll to message.
            _this.clearDiscountEls();

            _this.showDiscountEls(false);

            _this.submitting(false, 'fail');
          });
        } else {
          console.log('empty coupon'); // TODO, there must be a valid coupon.
        }
      });
    }
    /**
     * Gather the base product data that may be used by the endpoint to verify the coupon.
     * Typically the product family id is the only thing required, however if its not present the other fields may be used to back trace and find within the controller.
     *
     * @returns {{product_family_id: string, component_id: string, component_price_point_id: string, price_point_handle: string, price_point_id: string, product_id: string, component_price_point_handle: string, product_handle: string, component_handle: string}}
     */

  }, {
    key: "productDetails",
    value: function productDetails() {
      var productDetails = {
        product_family_id: '',
        product_id: '',
        product_handle: '',
        price_point_id: '',
        price_point_handle: '',
        component_id: '',
        component_handle: '',
        component_price_point_id: '',
        component_price_point_handle: ''
      }; // Gather the values from the inputs.

      var productFamilyIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#product_family_id');

      if (productFamilyIdField.length && productFamilyIdField.val()) {
        productDetails['product_family_id'] = productFamilyIdField.val();
      } // Gather the values from the inputs.


      var productIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#product_id');

      if (productIdField.length && productIdField.val()) {
        productDetails['product_id'] = productIdField.val();
      } // Gather the values from the inputs.


      var productHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#product_handle');

      if (productHandleField.length && productHandleField.val()) {
        productDetails['product_handle'] = productHandleField.val();
      } // Gather the values from the inputs.


      var productPricePointIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#price_point_id');

      if (productPricePointIdField.length && productPricePointIdField.val()) {
        productDetails['price_point_id'] = productPricePointIdField.val();
      } // Gather the values from the inputs.


      var productPricePointHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#price_point_handle');

      if (productPricePointHandleField.length && productPricePointHandleField.val()) {
        productDetails['price_point_handle'] = productPricePointHandleField.val();
      } // Gather the values from the inputs.


      var productComponentIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#component_id');

      if (productComponentIdField.length && productComponentIdField.val()) {
        productDetails['component_id'] = productComponentIdField.val();
      } // Gather the values from the inputs.


      var productComponentHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#component_handle');

      if (productComponentHandleField.length && productComponentHandleField.val()) {
        productDetails['component_handle'] = productComponentHandleField.val();
      } // Gather the values from the inputs.


      var productComponentPricePointIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#component_price_point_id');

      if (productComponentPricePointIdField.length && productComponentPricePointIdField.val()) {
        productDetails['component_price_point_id'] = productComponentPricePointIdField.val();
      } // Gather the values from the inputs.


      var productComponentPricePointHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#component_price_point_handle');

      if (productComponentPricePointHandleField.length && productComponentPricePointHandleField.val()) {
        productDetails['component_price_point_handle'] = productComponentPricePointHandleField.val();
      }

      return productDetails;
    }
    /**
     * Connects with WP ajax to validate the coupon.
     *
     * @returns {Promise<*>}
     */

  }, {
    key: "validateCoupon",
    value: function () {
      var _validateCoupon = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                data = _objectSpread({
                  action: validateCouponAction,
                  wp_nonce: validateCouponNonce,
                  coupon_code: this.couponInputEl.val()
                }, this.productDetails());
                console.log(data);
                _context.next = 4;
                return jquery__WEBPACK_IMPORTED_MODULE_5___default.a.post(ajaxURL, data, function (response) {
                  var message = '';

                  if (_helpers_check_data_types__WEBPACK_IMPORTED_MODULE_7__["default"].isDefined(response)) {
                    // If message is present display it.
                    if (_helpers_check_data_types__WEBPACK_IMPORTED_MODULE_7__["default"].isDefined(response.message)) {
                      var type = response.success ? 'success' : 'warning';
                      message = response.message;
                    }
                  } else {
                    message = 'An unexpected error validating coupon.';
                    response = {};
                    response.success = false;
                    Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
                      type: 'error',
                      message: 'Response undefined in validateCoupon().'
                    });
                  } // TODO show message.


                  return response;
                }).fail(function (xhr, status, error) {
                  Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
                    type: 'error',
                    message: 'Error validating coupon.',
                    details: {
                      xhr: xhr,
                      status: status,
                      error: error
                    }
                  });
                });

              case 4:
                return _context.abrupt("return", _context.sent);

              case 5:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function validateCoupon() {
        return _validateCoupon.apply(this, arguments);
      }

      return validateCoupon;
    }()
    /**
     * Reset the coupon information if the input changes after the coupons been applied
     */

  }, {
    key: "onInput",
    value: function onInput() {
      var _this2 = this;

      this.couponInputEl.on('input', function () {
        console.log('coupon input');

        if (_this2.couponApplied) {
          _this2.clearDiscountEls();

          _this2.showDiscountEls(false);
        }
      });
    }
    /**
     * Process the result from the server.
     *
     * @param coupon
     */

  }, {
    key: "processCouponResult",
    value: function processCouponResult(coupon) {
      var amount_in_cents = coupon.amount_in_cents,
          percentage = coupon.percentage; // Gather the total cost from the hidden input.

      var totalCostIncCentsEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#total_cost_cents'); // Element for visual display of the discount.

      var totalCostsContainerEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#total_cost_container');
      var couponDiscountEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('.coupon-discount');
      var totalCostDiscountedEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('.total-cost-dollars-discounted');
      var totalCostIncludingCentsDiscountedInputEls = jquery__WEBPACK_IMPORTED_MODULE_5___default()('input.total-cost-cents-discounted-input'); // Calculation variables.

      var couponAppliedText = '',
          totalCostCents = 0,
          totalDiscountInCents = 0,
          totalDiscountedCostDollars = 0.0,
          percent;

      if (totalCostIncCentsEl.length && totalCostIncCentsEl.val() && couponDiscountEl.length) {
        totalCostCents = parseInt(totalCostIncCentsEl.val());
        var totalCostCentsDiscounted = 0;

        if (null !== amount_in_cents) {
          // Calculated visuals.
          couponAppliedText = "$".concat(amount_in_cents / 100);
          totalCostCentsDiscounted = totalCostCents - amount_in_cents;
          totalDiscountedCostDollars = centsToDollars(totalCostCentsDiscounted);
        } else if (null !== percentage) {
          percent = parseFloat(percentage) / 100;
          totalDiscountInCents = totalCostCents * percent; // Calculated visuals.

          couponAppliedText = "".concat(percentage, "%");
          totalCostCentsDiscounted = totalCostCents - totalDiscountInCents;
          totalDiscountedCostDollars = centsToDollars(totalCostCentsDiscounted);
        }

        totalCostsContainerEl.addClass('discounted');
        couponDiscountEl.html(couponAppliedText);
        totalCostDiscountedEl.html("$".concat(totalDiscountedCostDollars));
        totalCostIncludingCentsDiscountedInputEls.val(totalCostCentsDiscounted);
        this.couponApplied = true;
      } else {
        this.clearDiscountEls();
        this.showDiscountEls(false);
        Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
          type: 'error',
          message: 'Necessary coupon related elements are missing from the dom.',
          details: {
            totalCostIncCentsEl: totalCostIncCentsEl,
            couponDiscountEl: couponDiscountEl
          }
        });
      }
    }
  }, {
    key: "clearDiscountEls",
    value: function clearDiscountEls() {
      // TODO.
      // Element for visual display of the discount.
      var totalCostsContainerEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#total_cost_container');
      var couponDiscountEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('.coupon-discount');
      var totalCostDiscountedEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('.total-cost-dollars-discounted');
      couponDiscountEl.html('');
      totalCostDiscountedEl.html('');
      totalCostsContainerEl.removeClass('discounted');
      this.couponApplied = false;
    }
    /**
     * Display or hide the discount elements.
     *
     * @param value
     */

  }, {
    key: "showDiscountEls",
    value: function showDiscountEls(value) {
      // TODO.
      var totalCostsDiscountContainerEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#total_cost_discount_container');
      var couponDiscountContainer = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#coupon_discount_container');

      if (value) {
        totalCostsDiscountContainerEl.removeClass('hidden');
        couponDiscountContainer.removeClass('hidden');
      } else {
        totalCostsDiscountContainerEl.addClass('hidden');
        couponDiscountContainer.addClass('hidden');
      }
    }
    /**
     * Submitting animation and restrictions for coupon button.
     *
     * @param {boolean} value Is the form submitting or not.
     * @param type
     */

  }, {
    key: "submitting",
    value: function submitting(value) {
      var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'loading';

      if (this.validateButtonEl) {
        this.validateButtonEl.prop('disabled', value);

        if (value) {
          this.validateButtonEl.html('Validating...');
        } else {
          this.validateButtonEl.html(this.validateButtonElHtml);
        }
      } else {
        Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
          type: 'error',
          message: 'Coupon validation button or animation issue, check element ids.'
        });
      }
    }
    /** ------------------------------------------------------------------------------------------
     * Setters.
     * ------------------------------------------------------------------------------------------ */

  }, {
    key: "validateButtonEl",
    set: function set(value) {
      this._validateButtonEl = value;
    },

    /** ------------------------------------------------------------------------------------------
     * Getters.
     * ------------------------------------------------------------------------------------------ */
    get: function get() {
      return this._validateButtonEl;
    }
  }, {
    key: "couponInputEl",
    set: function set(value) {
      this._couponInputEl = value;
    },
    get: function get() {
      return this._couponInputEl;
    }
  }, {
    key: "validateButtonElHtml",
    set: function set(value) {
      this._validateButtonElHtml = value;
    },
    get: function get() {
      return this._validateButtonElHtml;
    }
  }, {
    key: "couponApplied",
    set: function set(value) {
      this._couponApplied = value;
    },
    get: function get() {
      return this._couponApplied;
    }
  }]);

  return ValidateCoupon;
}();

/***/ }),

/***/ "./assets-src/main/js/index.js":
/*!*************************************!*\
  !*** ./assets-src/main/js/index.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _coupons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./coupons */ "./assets-src/main/js/coupons/index.js");
/**
 * All JS for the main frontend of the site must be added/imported here.
 */


/***/ }),

/***/ "./assets-src/main/sass/styles.scss":
/*!******************************************!*\
  !*** ./assets-src/main/sass/styles.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/asyncToGenerator.js":
/*!*****************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/asyncToGenerator.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
  try {
    var info = gen[key](arg);
    var value = info.value;
  } catch (error) {
    reject(error);
    return;
  }

  if (info.done) {
    resolve(value);
  } else {
    Promise.resolve(value).then(_next, _throw);
  }
}

function _asyncToGenerator(fn) {
  return function () {
    var self = this,
        args = arguments;
    return new Promise(function (resolve, reject) {
      var gen = fn.apply(self, args);

      function _next(value) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
      }

      function _throw(err) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
      }

      _next(undefined);
    });
  };
}

module.exports = _asyncToGenerator;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

module.exports = _typeof;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/regenerator/index.js":
/*!**********************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/regenerator/index.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! regenerator-runtime */ "./build-tools/node_modules/regenerator-runtime/runtime.js");


/***/ }),

/***/ "./build-tools/node_modules/regenerator-runtime/runtime.js":
/*!*****************************************************************!*\
  !*** ./build-tools/node_modules/regenerator-runtime/runtime.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

var runtime = (function (exports) {
  "use strict";

  var Op = Object.prototype;
  var hasOwn = Op.hasOwnProperty;
  var undefined; // More compressible than void 0.
  var $Symbol = typeof Symbol === "function" ? Symbol : {};
  var iteratorSymbol = $Symbol.iterator || "@@iterator";
  var asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator";
  var toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag";

  function wrap(innerFn, outerFn, self, tryLocsList) {
    // If outerFn provided and outerFn.prototype is a Generator, then outerFn.prototype instanceof Generator.
    var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator;
    var generator = Object.create(protoGenerator.prototype);
    var context = new Context(tryLocsList || []);

    // The ._invoke method unifies the implementations of the .next,
    // .throw, and .return methods.
    generator._invoke = makeInvokeMethod(innerFn, self, context);

    return generator;
  }
  exports.wrap = wrap;

  // Try/catch helper to minimize deoptimizations. Returns a completion
  // record like context.tryEntries[i].completion. This interface could
  // have been (and was previously) designed to take a closure to be
  // invoked without arguments, but in all the cases we care about we
  // already have an existing method we want to call, so there's no need
  // to create a new function object. We can even get away with assuming
  // the method takes exactly one argument, since that happens to be true
  // in every case, so we don't have to touch the arguments object. The
  // only additional allocation required is the completion record, which
  // has a stable shape and so hopefully should be cheap to allocate.
  function tryCatch(fn, obj, arg) {
    try {
      return { type: "normal", arg: fn.call(obj, arg) };
    } catch (err) {
      return { type: "throw", arg: err };
    }
  }

  var GenStateSuspendedStart = "suspendedStart";
  var GenStateSuspendedYield = "suspendedYield";
  var GenStateExecuting = "executing";
  var GenStateCompleted = "completed";

  // Returning this object from the innerFn has the same effect as
  // breaking out of the dispatch switch statement.
  var ContinueSentinel = {};

  // Dummy constructor functions that we use as the .constructor and
  // .constructor.prototype properties for functions that return Generator
  // objects. For full spec compliance, you may wish to configure your
  // minifier not to mangle the names of these two functions.
  function Generator() {}
  function GeneratorFunction() {}
  function GeneratorFunctionPrototype() {}

  // This is a polyfill for %IteratorPrototype% for environments that
  // don't natively support it.
  var IteratorPrototype = {};
  IteratorPrototype[iteratorSymbol] = function () {
    return this;
  };

  var getProto = Object.getPrototypeOf;
  var NativeIteratorPrototype = getProto && getProto(getProto(values([])));
  if (NativeIteratorPrototype &&
      NativeIteratorPrototype !== Op &&
      hasOwn.call(NativeIteratorPrototype, iteratorSymbol)) {
    // This environment has a native %IteratorPrototype%; use it instead
    // of the polyfill.
    IteratorPrototype = NativeIteratorPrototype;
  }

  var Gp = GeneratorFunctionPrototype.prototype =
    Generator.prototype = Object.create(IteratorPrototype);
  GeneratorFunction.prototype = Gp.constructor = GeneratorFunctionPrototype;
  GeneratorFunctionPrototype.constructor = GeneratorFunction;
  GeneratorFunctionPrototype[toStringTagSymbol] =
    GeneratorFunction.displayName = "GeneratorFunction";

  // Helper for defining the .next, .throw, and .return methods of the
  // Iterator interface in terms of a single ._invoke method.
  function defineIteratorMethods(prototype) {
    ["next", "throw", "return"].forEach(function(method) {
      prototype[method] = function(arg) {
        return this._invoke(method, arg);
      };
    });
  }

  exports.isGeneratorFunction = function(genFun) {
    var ctor = typeof genFun === "function" && genFun.constructor;
    return ctor
      ? ctor === GeneratorFunction ||
        // For the native GeneratorFunction constructor, the best we can
        // do is to check its .name property.
        (ctor.displayName || ctor.name) === "GeneratorFunction"
      : false;
  };

  exports.mark = function(genFun) {
    if (Object.setPrototypeOf) {
      Object.setPrototypeOf(genFun, GeneratorFunctionPrototype);
    } else {
      genFun.__proto__ = GeneratorFunctionPrototype;
      if (!(toStringTagSymbol in genFun)) {
        genFun[toStringTagSymbol] = "GeneratorFunction";
      }
    }
    genFun.prototype = Object.create(Gp);
    return genFun;
  };

  // Within the body of any async function, `await x` is transformed to
  // `yield regeneratorRuntime.awrap(x)`, so that the runtime can test
  // `hasOwn.call(value, "__await")` to determine if the yielded value is
  // meant to be awaited.
  exports.awrap = function(arg) {
    return { __await: arg };
  };

  function AsyncIterator(generator, PromiseImpl) {
    function invoke(method, arg, resolve, reject) {
      var record = tryCatch(generator[method], generator, arg);
      if (record.type === "throw") {
        reject(record.arg);
      } else {
        var result = record.arg;
        var value = result.value;
        if (value &&
            typeof value === "object" &&
            hasOwn.call(value, "__await")) {
          return PromiseImpl.resolve(value.__await).then(function(value) {
            invoke("next", value, resolve, reject);
          }, function(err) {
            invoke("throw", err, resolve, reject);
          });
        }

        return PromiseImpl.resolve(value).then(function(unwrapped) {
          // When a yielded Promise is resolved, its final value becomes
          // the .value of the Promise<{value,done}> result for the
          // current iteration.
          result.value = unwrapped;
          resolve(result);
        }, function(error) {
          // If a rejected Promise was yielded, throw the rejection back
          // into the async generator function so it can be handled there.
          return invoke("throw", error, resolve, reject);
        });
      }
    }

    var previousPromise;

    function enqueue(method, arg) {
      function callInvokeWithMethodAndArg() {
        return new PromiseImpl(function(resolve, reject) {
          invoke(method, arg, resolve, reject);
        });
      }

      return previousPromise =
        // If enqueue has been called before, then we want to wait until
        // all previous Promises have been resolved before calling invoke,
        // so that results are always delivered in the correct order. If
        // enqueue has not been called before, then it is important to
        // call invoke immediately, without waiting on a callback to fire,
        // so that the async generator function has the opportunity to do
        // any necessary setup in a predictable way. This predictability
        // is why the Promise constructor synchronously invokes its
        // executor callback, and why async functions synchronously
        // execute code before the first await. Since we implement simple
        // async functions in terms of async generators, it is especially
        // important to get this right, even though it requires care.
        previousPromise ? previousPromise.then(
          callInvokeWithMethodAndArg,
          // Avoid propagating failures to Promises returned by later
          // invocations of the iterator.
          callInvokeWithMethodAndArg
        ) : callInvokeWithMethodAndArg();
    }

    // Define the unified helper method that is used to implement .next,
    // .throw, and .return (see defineIteratorMethods).
    this._invoke = enqueue;
  }

  defineIteratorMethods(AsyncIterator.prototype);
  AsyncIterator.prototype[asyncIteratorSymbol] = function () {
    return this;
  };
  exports.AsyncIterator = AsyncIterator;

  // Note that simple async functions are implemented on top of
  // AsyncIterator objects; they just return a Promise for the value of
  // the final result produced by the iterator.
  exports.async = function(innerFn, outerFn, self, tryLocsList, PromiseImpl) {
    if (PromiseImpl === void 0) PromiseImpl = Promise;

    var iter = new AsyncIterator(
      wrap(innerFn, outerFn, self, tryLocsList),
      PromiseImpl
    );

    return exports.isGeneratorFunction(outerFn)
      ? iter // If outerFn is a generator, return the full iterator.
      : iter.next().then(function(result) {
          return result.done ? result.value : iter.next();
        });
  };

  function makeInvokeMethod(innerFn, self, context) {
    var state = GenStateSuspendedStart;

    return function invoke(method, arg) {
      if (state === GenStateExecuting) {
        throw new Error("Generator is already running");
      }

      if (state === GenStateCompleted) {
        if (method === "throw") {
          throw arg;
        }

        // Be forgiving, per 25.3.3.3.3 of the spec:
        // https://people.mozilla.org/~jorendorff/es6-draft.html#sec-generatorresume
        return doneResult();
      }

      context.method = method;
      context.arg = arg;

      while (true) {
        var delegate = context.delegate;
        if (delegate) {
          var delegateResult = maybeInvokeDelegate(delegate, context);
          if (delegateResult) {
            if (delegateResult === ContinueSentinel) continue;
            return delegateResult;
          }
        }

        if (context.method === "next") {
          // Setting context._sent for legacy support of Babel's
          // function.sent implementation.
          context.sent = context._sent = context.arg;

        } else if (context.method === "throw") {
          if (state === GenStateSuspendedStart) {
            state = GenStateCompleted;
            throw context.arg;
          }

          context.dispatchException(context.arg);

        } else if (context.method === "return") {
          context.abrupt("return", context.arg);
        }

        state = GenStateExecuting;

        var record = tryCatch(innerFn, self, context);
        if (record.type === "normal") {
          // If an exception is thrown from innerFn, we leave state ===
          // GenStateExecuting and loop back for another invocation.
          state = context.done
            ? GenStateCompleted
            : GenStateSuspendedYield;

          if (record.arg === ContinueSentinel) {
            continue;
          }

          return {
            value: record.arg,
            done: context.done
          };

        } else if (record.type === "throw") {
          state = GenStateCompleted;
          // Dispatch the exception by looping back around to the
          // context.dispatchException(context.arg) call above.
          context.method = "throw";
          context.arg = record.arg;
        }
      }
    };
  }

  // Call delegate.iterator[context.method](context.arg) and handle the
  // result, either by returning a { value, done } result from the
  // delegate iterator, or by modifying context.method and context.arg,
  // setting context.delegate to null, and returning the ContinueSentinel.
  function maybeInvokeDelegate(delegate, context) {
    var method = delegate.iterator[context.method];
    if (method === undefined) {
      // A .throw or .return when the delegate iterator has no .throw
      // method always terminates the yield* loop.
      context.delegate = null;

      if (context.method === "throw") {
        // Note: ["return"] must be used for ES3 parsing compatibility.
        if (delegate.iterator["return"]) {
          // If the delegate iterator has a return method, give it a
          // chance to clean up.
          context.method = "return";
          context.arg = undefined;
          maybeInvokeDelegate(delegate, context);

          if (context.method === "throw") {
            // If maybeInvokeDelegate(context) changed context.method from
            // "return" to "throw", let that override the TypeError below.
            return ContinueSentinel;
          }
        }

        context.method = "throw";
        context.arg = new TypeError(
          "The iterator does not provide a 'throw' method");
      }

      return ContinueSentinel;
    }

    var record = tryCatch(method, delegate.iterator, context.arg);

    if (record.type === "throw") {
      context.method = "throw";
      context.arg = record.arg;
      context.delegate = null;
      return ContinueSentinel;
    }

    var info = record.arg;

    if (! info) {
      context.method = "throw";
      context.arg = new TypeError("iterator result is not an object");
      context.delegate = null;
      return ContinueSentinel;
    }

    if (info.done) {
      // Assign the result of the finished delegate to the temporary
      // variable specified by delegate.resultName (see delegateYield).
      context[delegate.resultName] = info.value;

      // Resume execution at the desired location (see delegateYield).
      context.next = delegate.nextLoc;

      // If context.method was "throw" but the delegate handled the
      // exception, let the outer generator proceed normally. If
      // context.method was "next", forget context.arg since it has been
      // "consumed" by the delegate iterator. If context.method was
      // "return", allow the original .return call to continue in the
      // outer generator.
      if (context.method !== "return") {
        context.method = "next";
        context.arg = undefined;
      }

    } else {
      // Re-yield the result returned by the delegate method.
      return info;
    }

    // The delegate iterator is finished, so forget it and continue with
    // the outer generator.
    context.delegate = null;
    return ContinueSentinel;
  }

  // Define Generator.prototype.{next,throw,return} in terms of the
  // unified ._invoke helper method.
  defineIteratorMethods(Gp);

  Gp[toStringTagSymbol] = "Generator";

  // A Generator should always return itself as the iterator object when the
  // @@iterator function is called on it. Some browsers' implementations of the
  // iterator prototype chain incorrectly implement this, causing the Generator
  // object to not be returned from this call. This ensures that doesn't happen.
  // See https://github.com/facebook/regenerator/issues/274 for more details.
  Gp[iteratorSymbol] = function() {
    return this;
  };

  Gp.toString = function() {
    return "[object Generator]";
  };

  function pushTryEntry(locs) {
    var entry = { tryLoc: locs[0] };

    if (1 in locs) {
      entry.catchLoc = locs[1];
    }

    if (2 in locs) {
      entry.finallyLoc = locs[2];
      entry.afterLoc = locs[3];
    }

    this.tryEntries.push(entry);
  }

  function resetTryEntry(entry) {
    var record = entry.completion || {};
    record.type = "normal";
    delete record.arg;
    entry.completion = record;
  }

  function Context(tryLocsList) {
    // The root entry object (effectively a try statement without a catch
    // or a finally block) gives us a place to store values thrown from
    // locations where there is no enclosing try statement.
    this.tryEntries = [{ tryLoc: "root" }];
    tryLocsList.forEach(pushTryEntry, this);
    this.reset(true);
  }

  exports.keys = function(object) {
    var keys = [];
    for (var key in object) {
      keys.push(key);
    }
    keys.reverse();

    // Rather than returning an object with a next method, we keep
    // things simple and return the next function itself.
    return function next() {
      while (keys.length) {
        var key = keys.pop();
        if (key in object) {
          next.value = key;
          next.done = false;
          return next;
        }
      }

      // To avoid creating an additional object, we just hang the .value
      // and .done properties off the next function object itself. This
      // also ensures that the minifier will not anonymize the function.
      next.done = true;
      return next;
    };
  };

  function values(iterable) {
    if (iterable) {
      var iteratorMethod = iterable[iteratorSymbol];
      if (iteratorMethod) {
        return iteratorMethod.call(iterable);
      }

      if (typeof iterable.next === "function") {
        return iterable;
      }

      if (!isNaN(iterable.length)) {
        var i = -1, next = function next() {
          while (++i < iterable.length) {
            if (hasOwn.call(iterable, i)) {
              next.value = iterable[i];
              next.done = false;
              return next;
            }
          }

          next.value = undefined;
          next.done = true;

          return next;
        };

        return next.next = next;
      }
    }

    // Return an iterator with no values.
    return { next: doneResult };
  }
  exports.values = values;

  function doneResult() {
    return { value: undefined, done: true };
  }

  Context.prototype = {
    constructor: Context,

    reset: function(skipTempReset) {
      this.prev = 0;
      this.next = 0;
      // Resetting context._sent for legacy support of Babel's
      // function.sent implementation.
      this.sent = this._sent = undefined;
      this.done = false;
      this.delegate = null;

      this.method = "next";
      this.arg = undefined;

      this.tryEntries.forEach(resetTryEntry);

      if (!skipTempReset) {
        for (var name in this) {
          // Not sure about the optimal order of these conditions:
          if (name.charAt(0) === "t" &&
              hasOwn.call(this, name) &&
              !isNaN(+name.slice(1))) {
            this[name] = undefined;
          }
        }
      }
    },

    stop: function() {
      this.done = true;

      var rootEntry = this.tryEntries[0];
      var rootRecord = rootEntry.completion;
      if (rootRecord.type === "throw") {
        throw rootRecord.arg;
      }

      return this.rval;
    },

    dispatchException: function(exception) {
      if (this.done) {
        throw exception;
      }

      var context = this;
      function handle(loc, caught) {
        record.type = "throw";
        record.arg = exception;
        context.next = loc;

        if (caught) {
          // If the dispatched exception was caught by a catch block,
          // then let that catch block handle the exception normally.
          context.method = "next";
          context.arg = undefined;
        }

        return !! caught;
      }

      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        var record = entry.completion;

        if (entry.tryLoc === "root") {
          // Exception thrown outside of any try block that could handle
          // it, so set the completion value of the entire function to
          // throw the exception.
          return handle("end");
        }

        if (entry.tryLoc <= this.prev) {
          var hasCatch = hasOwn.call(entry, "catchLoc");
          var hasFinally = hasOwn.call(entry, "finallyLoc");

          if (hasCatch && hasFinally) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            } else if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else if (hasCatch) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            }

          } else if (hasFinally) {
            if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else {
            throw new Error("try statement without catch or finally");
          }
        }
      }
    },

    abrupt: function(type, arg) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc <= this.prev &&
            hasOwn.call(entry, "finallyLoc") &&
            this.prev < entry.finallyLoc) {
          var finallyEntry = entry;
          break;
        }
      }

      if (finallyEntry &&
          (type === "break" ||
           type === "continue") &&
          finallyEntry.tryLoc <= arg &&
          arg <= finallyEntry.finallyLoc) {
        // Ignore the finally entry if control is not jumping to a
        // location outside the try/catch block.
        finallyEntry = null;
      }

      var record = finallyEntry ? finallyEntry.completion : {};
      record.type = type;
      record.arg = arg;

      if (finallyEntry) {
        this.method = "next";
        this.next = finallyEntry.finallyLoc;
        return ContinueSentinel;
      }

      return this.complete(record);
    },

    complete: function(record, afterLoc) {
      if (record.type === "throw") {
        throw record.arg;
      }

      if (record.type === "break" ||
          record.type === "continue") {
        this.next = record.arg;
      } else if (record.type === "return") {
        this.rval = this.arg = record.arg;
        this.method = "return";
        this.next = "end";
      } else if (record.type === "normal" && afterLoc) {
        this.next = afterLoc;
      }

      return ContinueSentinel;
    },

    finish: function(finallyLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.finallyLoc === finallyLoc) {
          this.complete(entry.completion, entry.afterLoc);
          resetTryEntry(entry);
          return ContinueSentinel;
        }
      }
    },

    "catch": function(tryLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc === tryLoc) {
          var record = entry.completion;
          if (record.type === "throw") {
            var thrown = record.arg;
            resetTryEntry(entry);
          }
          return thrown;
        }
      }

      // The context.catch method must only be called with a location
      // argument that corresponds to a known catch block.
      throw new Error("illegal catch attempt");
    },

    delegateYield: function(iterable, resultName, nextLoc) {
      this.delegate = {
        iterator: values(iterable),
        resultName: resultName,
        nextLoc: nextLoc
      };

      if (this.method === "next") {
        // Deliberately forget the last sent value so that we don't
        // accidentally pass it on to the delegate.
        this.arg = undefined;
      }

      return ContinueSentinel;
    }
  };

  // Regardless of whether this script is executing as a CommonJS module
  // or not, return the runtime object so that we can declare the variable
  // regeneratorRuntime in the outer scope, which allows this module to be
  // injected easily by `bin/regenerator --include-runtime script.js`.
  return exports;

}(
  // If this script is executing as a CommonJS module, use module.exports
  // as the regeneratorRuntime namespace. Otherwise create a new empty
  // object. Either way, the resulting object will be used to initialize
  // the regeneratorRuntime variable at the top of this file.
   true ? module.exports : undefined
));

try {
  regeneratorRuntime = runtime;
} catch (accidentalStrictMode) {
  // This module should not be running in strict mode, so the above
  // assignment should always work unless something is misconfigured. Just
  // in case runtime.js accidentally runs in strict mode, we can escape
  // strict mode using a global Function call. This could conceivably fail
  // if a Content Security Policy forbids using Function, but in that case
  // the proper solution is to fix the accidental strict mode problem. If
  // you've misconfigured your bundler to force strict mode and applied a
  // CSP to forbid Function, and you're not willing to fix either of those
  // problems, please detail your unique predicament in a GitHub issue.
  Function("r", "regeneratorRuntime = r")(runtime);
}


/***/ }),

/***/ 0:
/*!******************************************************************************!*\
  !*** multi ./assets-src/main/js/index.js ./assets-src/main/sass/styles.scss ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./assets-src/main/js/index.js */"./assets-src/main/js/index.js");
module.exports = __webpack_require__(/*! ./assets-src/main/sass/styles.scss */"./assets-src/main/sass/styles.scss");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });
//# sourceMappingURL=wp-chargify-main.js.map