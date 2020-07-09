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

/***/ "./assets-src/main/js/country-and-states-selectors/config-countries.js":
/*!*****************************************************************************!*\
  !*** ./assets-src/main/js/country-and-states-selectors/config-countries.js ***!
  \*****************************************************************************/
/*! exports provided: countries */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "countries", function() { return countries; });
/**
 * This list of countries comply with chargify's recommendations.
 * Ordered alphabetically by country name not code.
 *
 * Popular countries could be.
 * AU: 'Australia',
 * NZ: 'New Zealand',
 * US: 'United States',
 * GB: 'United Kingdom',
 * ZA: 'South Africa',
 * SG: 'Singapore',
 * CA: 'Canada',
 * FR: 'France',
 * IN: 'India',
 * DE: 'Germany',
 */
var countries = {
  AF: 'Afghanistan',
  AL: 'Albania',
  DZ: 'Algeria',
  AS: 'American Samoa',
  AD: 'Andorra',
  AO: 'Angola',
  AI: 'Anguilla',
  AQ: 'Antarctica',
  AG: 'Antigua and Barbuda',
  AR: 'Argentina',
  AM: 'Armenia',
  AW: 'Aruba',
  AU: 'Australia',
  AT: 'Austria',
  AZ: 'Azerbaijan',
  BS: 'Bahamas',
  BH: 'Bahrain',
  BD: 'Bangladesh',
  BB: 'Barbados',
  BY: 'Belarus',
  BE: 'Belgium',
  BZ: 'Belize',
  BJ: 'Benin',
  BM: 'Bermuda',
  BT: 'Bhutan',
  BO: 'Bolivia',
  BQ: 'Bonaire, Sint Eustatius and Saba',
  BA: 'Bosnia and Herzegovina',
  BW: 'Botswana',
  BV: 'Bouvet Island',
  BR: 'Brazil',
  IO: 'British Indian Ocean Territory',
  BN: 'Brunei Darussalam',
  BG: 'Bulgaria',
  BF: 'Burkina Faso',
  BI: 'Burundi',
  KH: 'Cambodia',
  CM: 'Cameroon',
  CA: 'Canada',
  IC: 'Canary Islands',
  CV: 'Cape Verde',
  // TODO from here
  KY: 'Cayman Islands',
  CF: 'Central African Republic',
  TD: 'Chad',
  CL: 'Chile',
  CN: 'China',
  CX: 'Christmas Island',
  CC: 'Cocos (Keeling) Islands',
  CO: 'Colombia',
  KM: 'Comoros',
  CG: 'Congo',
  CD: 'Congo, The Democratic Republic Of The',
  CK: 'Cook Islands',
  CR: 'Costa Rica',
  HR: 'Croatia',
  CU: 'Cuba',
  CW: 'Curaçao',
  CY: 'Cyprus',
  CZ: 'Czech Republic',
  CI: 'Côte D\'Ivoire',
  DK: 'Denmark',
  DJ: 'Djibouti',
  DM: 'Dominica',
  DO: 'Dominican Republic',
  EC: 'Ecuador',
  EG: 'Egypt',
  SV: 'El Salvador',
  GQ: 'Equatorial Guinea',
  ER: 'Eritrea',
  EE: 'Estonia',
  ET: 'Ethiopia',
  FK: 'Falkland Islands (Malvinas)',
  FO: 'Faroe Islands',
  FJ: 'Fiji',
  FI: 'Finland',
  FR: 'France',
  GF: 'French Guiana',
  PF: 'French Polynesia',
  TF: 'French Southern Territories',
  GA: 'Gabon',
  GM: 'Gambia',
  GE: 'Georgia',
  DE: 'Germany',
  GH: 'Ghana',
  GI: 'Gibraltar',
  GR: 'Greece',
  GL: 'Greenland',
  GD: 'Grenada',
  GP: 'Guadeloupe',
  GU: 'Guam',
  GT: 'Guatemala',
  GG: 'Guernsey',
  GN: 'Guinea',
  GW: 'Guinea-Bissau',
  GY: 'Guyana',
  HT: 'Haiti',
  HM: 'Heard and McDonald Islands',
  VA: 'Holy See (Vatican City State)',
  HN: 'Honduras',
  HK: 'Hong Kong',
  HU: 'Hungary',
  IS: 'Iceland',
  IN: 'India',
  ID: 'Indonesia',
  IR: 'Iran, Islamic Republic Of',
  IQ: 'Iraq',
  IE: 'Ireland',
  IM: 'Isle of Man',
  IL: 'Israel',
  IT: 'Italy',
  JM: 'Jamaica',
  JP: 'Japan',
  JE: 'Jersey',
  JO: 'Jordan',
  KZ: 'Kazakhstan',
  KE: 'Kenya',
  KI: 'Kiribati',
  KP: 'Korea, Democratic People\'s Republic Of',
  KR: 'Korea, Republic of',
  KW: 'Kuwait',
  KG: 'Kyrgyzstan',
  LA: 'Lao People\'s Democratic Republic',
  LV: 'Latvia',
  LB: 'Lebanon',
  LS: 'Lesotho',
  LR: 'Liberia',
  LY: 'Libya',
  LI: 'Liechtenstein',
  LT: 'Lithuania',
  LU: 'Luxembourg',
  MO: 'Macao',
  MK: 'Macedonia, the Former Yugoslav Republic Of',
  MG: 'Madagascar',
  MW: 'Malawi',
  MY: 'Malaysia',
  MV: 'Maldives',
  ML: 'Mali',
  MT: 'Malta',
  MH: 'Marshall Islands',
  MQ: 'Martinique',
  MR: 'Mauritania',
  MU: 'Mauritius',
  YT: 'Mayotte',
  MX: 'Mexico',
  FM: 'Micronesia, Federated States Of',
  MD: 'Moldova, Republic of',
  MC: 'Monaco',
  MN: 'Mongolia',
  ME: 'Montenegro',
  MS: 'Montserrat',
  MA: 'Morocco',
  MZ: 'Mozambique',
  MM: 'Myanmar',
  NA: 'Namibia',
  NR: 'Nauru',
  NP: 'Nepal',
  NL: 'Netherlands',
  AN: 'Netherlands Antilles',
  NC: 'New Caledonia',
  NZ: 'New Zealand',
  NI: 'Nicaragua',
  NE: 'Niger',
  NG: 'Nigeria',
  NU: 'Niue',
  NF: 'Norfolk Island',
  MP: 'Northern Mariana Islands',
  NO: 'Norway',
  OM: 'Oman',
  PK: 'Pakistan',
  PW: 'Palau',
  PS: 'Palestine, State of',
  PA: 'Panama',
  PG: 'Papua New Guinea',
  PY: 'Paraguay',
  PE: 'Peru',
  PH: 'Philippines',
  PN: 'Pitcairn',
  PL: 'Poland',
  PT: 'Portugal',
  PR: 'Puerto Rico',
  QA: 'Qatar',
  RO: 'Romania',
  RU: 'Russian Federation',
  RW: 'Rwanda',
  RE: 'Réunion',
  BL: 'Saint Barthélemy',
  SH: 'Saint Helena',
  KN: 'Saint Kitts And Nevis',
  LC: 'Saint Lucia',
  MF: 'Saint Martin',
  PM: 'Saint Pierre And Miquelon',
  VC: 'Saint Vincent And The Grenedines',
  WS: 'Samoa',
  SM: 'San Marino',
  ST: 'Sao Tome and Principe',
  SA: 'Saudi Arabia',
  SN: 'Senegal',
  RS: 'Serbia',
  SC: 'Seychelles',
  SL: 'Sierra Leone',
  SG: 'Singapore',
  SX: 'Sint Maarten',
  SK: 'Slovakia',
  SI: 'Slovenia',
  SB: 'Solomon Islands',
  SO: 'Somalia',
  ZA: 'South Africa',
  GS: 'South Georgia and the South Sandwich Islands',
  SS: 'South Sudan',
  ES: 'Spain',
  LK: 'Sri Lanka',
  SD: 'Sudan',
  SR: 'Suriname',
  SJ: 'Svalbard And Jan Mayen',
  SZ: 'Swaziland',
  SE: 'Sweden',
  CH: 'Switzerland',
  SY: 'Syrian Arab Republic',
  TW: 'Taiwan, Republic Of China',
  TJ: 'Tajikistan',
  TZ: 'Tanzania, United Republic of',
  TH: 'Thailand',
  TL: 'Timor-Leste',
  TG: 'Togo',
  TK: 'Tokelau',
  TO: 'Tonga',
  TT: 'Trinidad and Tobago',
  TN: 'Tunisia',
  TR: 'Turkey',
  TM: 'Turkmenistan',
  TC: 'Turks and Caicos Islands',
  TV: 'Tuvalu',
  UG: 'Uganda',
  UA: 'Ukraine',
  AE: 'United Arab Emirates',
  GB: 'United Kingdom',
  US: 'United States',
  UM: 'United States Minor Outlying Islands',
  UY: 'Uruguay',
  UZ: 'Uzbekistan',
  VU: 'Vanuatu',
  VE: 'Venezuela, Bolivarian Republic of',
  VN: 'Vietnam',
  VG: 'Virgin Islands, British',
  VI: 'Virgin Islands, U.S.',
  WF: 'Wallis and Futuna',
  EH: 'Western Sahara',
  YE: 'Yemen',
  ZM: 'Zambia',
  ZW: 'Zimbabwe',
  AX: 'Åland Islands'
};

/***/ }),

/***/ "./assets-src/main/js/country-and-states-selectors/config-states.js":
/*!**************************************************************************!*\
  !*** ./assets-src/main/js/country-and-states-selectors/config-states.js ***!
  \**************************************************************************/
/*! exports provided: states */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "states", function() { return states; });
/**
 * The states organised by country codes from config-countries.js. Which is organised
 * alphabetically by country name not code.
 *
 * @type { Object }
 * */
var states = {
  AF: {
    BDS: 'Badakhshan',
    BDG: 'Badghis',
    BGL: 'Baghlan',
    BAL: 'Balkh',
    BAM: 'Bamian',
    DAY: 'Daykondi',
    FRA: 'Farah',
    FYB: 'Faryab',
    GHA: 'Ghazni',
    GHO: 'Ghowr',
    HEL: 'Helmand',
    HER: 'Herat',
    JOW: 'Jowzjan',
    KAB: 'Kabul [Kabol]',
    KAN: 'Kandahar',
    KAP: 'Kapisa',
    KHO: 'Khowst',
    KNR: 'Konar [Kunar]',
    KDZ: 'Kondoz [Kunduz]',
    LAG: 'Laghman',
    LOW: 'Lowgar',
    NAN: 'Nangrahar [Nangarhar]',
    NIM: 'Nimruz',
    NUR: 'Nurestan',
    ORU: 'Oruzgan [Uruzgan]',
    PIA: 'Paktia',
    PKA: 'Paktika',
    PAN: 'Panjshir',
    PAR: 'Parwan',
    SAM: 'Samangan',
    SAR: 'Sar-e Pol',
    TAK: 'Takhar',
    WAR: 'Wardak [Wardag]',
    ZAB: 'Zabol [Zabul]'
  },
  AL: {
    BR: 'Berat',
    BU: 'Bulqizë',
    DL: 'Delvinë',
    DV: 'Devoll',
    DI: 'Dibër',
    DR: 'Durrës',
    EL: 'Elbasan',
    FR: 'Fier',
    GJ: 'Gjirokastër',
    GR: 'Gramsh',
    HA: 'Has',
    KA: 'Kavajë',
    ER: 'Kolonjë',
    KO: 'Korçë',
    KR: 'Krujë',
    KU: 'Kukës',
    KB: 'Kurbin',
    KC: 'Kuçovë',
    LE: 'Lezhë',
    LB: 'Librazhd',
    LU: 'Lushnjë',
    MK: 'Mallakastër',
    MM: 'Malësi e Madhe',
    MT: 'Mat',
    MR: 'Mirditë',
    PQ: 'Peqin',
    PG: 'Pogradec',
    PU: 'Pukë',
    PR: 'Përmet',
    SR: 'Sarandë',
    SH: 'Shkodër',
    SK: 'Skrapar',
    TE: 'Tepelenë',
    TR: 'Tiranë',
    TP: 'Tropojë',
    VL: 'Vlorë'
  },
  DZ: {
    '01': 'Adrar',
    '16': 'Alger',
    '23': 'Annaba',
    '44': 'Aïn Defla',
    '46': 'Aïn Témouchent',
    '05': 'Batna',
    '07': 'Biskra',
    '09': 'Blida',
    '34': 'Bordj Bou Arréridj',
    '10': 'Bouira',
    '35': 'Boumerdès',
    '08': 'Béchar',
    '06': 'Béjaïa',
    '02': 'Chlef',
    '25': 'Constantine',
    '17': 'Djelfa',
    '32': 'El Bayadh',
    '39': 'El Oued',
    '36': 'El Tarf',
    '47': 'Ghardaïa',
    '24': 'Guelma',
    '33': 'Illizi',
    '18': 'Jijel',
    '40': 'Khenchela',
    '03': 'Laghouat',
    '29': 'Mascara',
    '43': 'Mila',
    '27': 'Mostaganem',
    '28': 'Msila',
    '26': 'Médéa',
    '45': 'Naama',
    '31': 'Oran',
    '30': 'Ouargla',
    '04': 'Oum el Bouaghi',
    '48': 'Relizane',
    '20': 'Saïda',
    '22': 'Sidi Bel Abbès',
    '21': 'Skikda',
    '41': 'Souk Ahras',
    '19': 'Sétif',
    '11': 'Tamanghasset',
    '14': 'Tiaret',
    '37': 'Tindouf',
    '42': 'Tipaza',
    '38': 'Tissemsilt',
    '15': 'Tizi Ouzou',
    '13': 'Tlemcen',
    '12': 'Tébessa'
  },
  AS: {},
  AD: {
    '07': 'Andorra la Vella',
    '02': 'Canillo',
    '03': 'Encamp',
    '08': 'Escaldes-Engordany',
    '04': 'La Massana',
    '05': 'Ordino',
    '06': 'Sant Julià de Lòria'
  },
  AO: {
    BGO: 'Bengo',
    BGU: 'Benguela',
    BIE: 'Bié',
    CAB: 'Cabinda',
    CCU: 'Cuando-Cubango',
    CNO: 'Cuanza Norte',
    CUS: 'Cuanza Sul',
    CNN: 'Cunene',
    HUA: 'Huambo',
    HUI: 'Huíla',
    LUA: 'Luanda',
    LNO: 'Lunda Norte',
    LSU: 'Lunda Sul',
    MAL: 'Malange',
    MOX: 'Moxico',
    NAM: 'Namibe',
    UIG: 'Uíge',
    ZAI: 'Zaire'
  },
  AI: {},
  AQ: {},
  AG: {
    '10': 'Barbuda',
    'X2~': 'Redonda',
    '03': 'Saint George',
    '04': 'Saint John’s',
    '05': 'Saint Mary',
    '06': 'Saint Paul',
    '07': 'Saint Peter',
    '08': 'Saint Philip'
  },
  AR: {
    B: 'Buenos Aires',
    C: 'Capital federal',
    K: 'Catamarca',
    H: 'Chaco',
    U: 'Chubut',
    W: 'Corrientes',
    X: 'Córdoba',
    E: 'Entre Ríos',
    P: 'Formosa',
    Y: 'Jujuy',
    L: 'La Pampa',
    F: 'La Rioja',
    M: 'Mendoza',
    N: 'Misiones',
    Q: 'Neuquén',
    R: 'Río Negro',
    A: 'Salta',
    J: 'San Juan',
    D: 'San Luis',
    Z: 'Santa Cruz',
    S: 'Santa Fe',
    G: 'Santiago del Estero',
    V: 'Tierra del Fuego',
    T: 'Tucumán'
  },
  AM: {
    AG: 'Aragac?otn',
    AR: 'Ararat',
    AV: 'Armavir',
    ER: 'Erevan',
    GR: 'Gegarkunik\'',
    KT: 'Kotayk\'',
    LO: 'Lo?y',
    SU: 'Syunik\'',
    TV: 'Tavuš',
    VD: 'Vayoc Jor',
    SH: 'Širak'
  },
  AW: {},
  AU: {
    ACT: 'Australian Capital Territory',
    NSW: 'New South Wales',
    NT: 'Northern Territory',
    QLD: 'Queensland',
    SA: 'South Australia',
    TAS: 'Tasmania',
    VIC: 'Victoria',
    WA: 'Western Australia'
  },
  AT: {
    '1': 'Burgenland',
    '2': 'Kärnten',
    '3': 'Niederösterreich',
    '4': 'Oberösterreich',
    '5': 'Salzburg',
    '6': 'Steiermark',
    '7': 'Tirol',
    '8': 'Vorarlberg',
    '9': 'Wien'
  },
  AZ: {
    ABS: 'Abseron',
    AGC: 'Agcabädi',
    AGM: 'Agdam',
    AGS: 'Agdas',
    AGA: 'Agstafa',
    AGU: 'Agsu',
    AST: 'Astara',
    BAB: 'Babäk',
    BA: 'Baki',
    BAL: 'Balakän',
    BEY: 'Beyläqan',
    BIL: 'Biläsuvar',
    BAR: 'Bärdä',
    CUL: 'Culfa',
    CAB: 'Cäbrayil',
    CAL: 'Cälilabab',
    DAS: 'Daskäsän',
    DAV: 'Däväçi',
    FUZ: 'Füzuli',
    GOR: 'Goranboy',
    GAD: 'Gädäbäy',
    GA: 'Gäncä',
    GOY: 'Göyçay',
    HAC: 'Haciqabul',
    IMI: 'Imisli',
    ISM: 'Ismayilli',
    KAL: 'Kälbäcär',
    KUR: 'Kürdämir',
    LAC: 'Laçin',
    LER: 'Lerik',
    LAN: 'Länkäran',
    LA: 'Länkäran City',
    MAS: 'Masalli',
    MI: 'Mingäçevir',
    NA: 'Naftalan',
    NX: 'Naxçivan',
    NEF: 'Neftçala',
    OGU: 'Oguz',
    ORD: 'Ordubad',
    QAX: 'Qax',
    QAZ: 'Qazax',
    QOB: 'Qobustan',
    QBA: 'Quba',
    QBI: 'Qubadli',
    QUS: 'Qusar',
    QAB: 'Qäbälä',
    SAT: 'Saatli',
    SAB: 'Sabirabad',
    SAH: 'Sahbuz',
    SAL: 'Salyan',
    SMI: 'Samaxi',
    SMX: 'Samux',
    SIY: 'Siyäzän',
    SM: 'Sumqayit',
    SUS: 'Susa',
    SS: 'Susa City',
    SAD: 'Sädäräk',
    SAK: 'Säki',
    SA: 'Säki City',
    SKR: 'Sämkir',
    SAR: 'Särur',
    TOV: 'Tovuz',
    TAR: 'Tärtär',
    UCA: 'Ucar',
    XA: 'Xankändi',
    XAN: 'Xanlar',
    XAC: 'Xaçmaz',
    XIZ: 'Xizi',
    XCI: 'Xocali',
    XVD: 'Xocavänd',
    YAR: 'Yardimli',
    YEV: 'Yevlax',
    YE: 'Yevlax City',
    ZAQ: 'Zaqatala',
    ZAN: 'Zängilan',
    ZAR: 'Zärdab',
    AB: 'Äli Bayramli'
  },
  BS: {
    AC: 'Acklins and Crooked Islands',
    BI: 'Bimini',
    CI: 'Cat Island',
    EX: 'Exuma',
    FP: 'Freeport',
    FC: 'Fresh Creek',
    GH: 'Governor\'s Harbour',
    GT: 'Green Turtle Cay',
    HI: 'Harbour Island',
    HR: 'High Rock',
    IN: 'Inagua',
    KB: 'Kemps Bay',
    LI: 'Long Island',
    MH: 'Marsh Harbour',
    MG: 'Mayaguana',
    NP: 'New Providence',
    NB: 'Nicholls Town and Berry Islands',
    RI: 'Ragged Island',
    RS: 'Rock Sound',
    SR: 'San Salvador and Rum Cay',
    SP: 'Sandy Point'
  },
  BH: {
    '14': 'Al Janubiyah',
    '13': 'Al Manamah (Al ‘Asimah)',
    '15': 'Al Muharraq',
    '16': 'Al Wustá',
    '17': 'Ash Shamaliyah'
  },
  BD: {
    '05': 'Bagerhat zila',
    '01': 'Bandarban zila',
    '02': 'Barguna zila',
    '06': 'Barisal zila',
    '07': 'Bhola zila',
    '03': 'Bogra zila',
    '04': 'Brahmanbaria zila',
    '09': 'Chandpur zila',
    '10': 'Chittagong zila',
    '12': 'Chuadanga zila',
    '08': 'Comilla zila',
    '11': 'Cox\'s Bazar zila',
    '13': 'Dhaka zila',
    '14': 'Dinajpur zila',
    '15': 'Faridpur zila',
    '16': 'Feni zila',
    '19': 'Gaibandha zila',
    '18': 'Gazipur zila',
    '17': 'Gopalganj zila',
    '20': 'Habiganj zila',
    '24': 'Jaipurhat zila',
    '21': 'Jamalpur zila',
    '22': 'Jessore zila',
    '25': 'Jhalakati zila',
    '23': 'Jhenaidah zila',
    '29': 'Khagrachari zila',
    '27': 'Khulna zila',
    '26': 'Kishoreganj zila',
    '28': 'Kurigram zila',
    '30': 'Kushtia zila',
    '31': 'Lakshmipur zila',
    '32': 'Lalmonirhat zila',
    '36': 'Madaripur zila',
    '37': 'Magura zila',
    '33': 'Manikganj zila',
    '39': 'Meherpur zila',
    '38': 'Moulvibazar zila',
    '35': 'Munshiganj zila',
    '34': 'Mymensingh zila',
    '48': 'Naogaon zila',
    '43': 'Narail zila',
    '40': 'Narayanganj zila',
    '42': 'Narsingdi zila',
    '44': 'Natore zila',
    '45': 'Nawabganj zila',
    '41': 'Netrakona zila',
    '46': 'Nilphamari zila',
    '47': 'Noakhali zila',
    '49': 'Pabna zila',
    '52': 'Panchagarh zila',
    '51': 'Patuakhali zila',
    '50': 'Pirojpur zila',
    '53': 'Rajbari zila',
    '54': 'Rajshahi zila',
    '56': 'Rangamati zila',
    '55': 'Rangpur zila',
    '58': 'Satkhira zila',
    '62': 'Shariatpur zila',
    '57': 'Sherpur zila',
    '59': 'Sirajganj zila',
    '61': 'Sunamganj zila',
    '60': 'Sylhet zila',
    '63': 'Tangail zila',
    '64': 'Thakurgaon zila'
  },
  BB: {
    '01': 'Christ Church',
    '02': 'Saint Andrew',
    '03': 'Saint George',
    '04': 'Saint James',
    '05': 'Saint John',
    '06': 'Saint Joseph',
    '07': 'Saint Lucy',
    '08': 'Saint Michael',
    '09': 'Saint Peter',
    '10': 'Saint Philip',
    '11': 'Saint Thomas'
  },
  BY: {
    BR: 'Brestskaya voblasts\' (be) Brestskaya oblast\' (ru)',
    HO: 'Homyel\'skaya voblasts\' (be) Gomel\'skaya oblast\' (ru)',
    'X1~': 'Horad Minsk',
    HR: 'Hrodzenskaya voblasts\' (be) Grodnenskaya oblast\' (ru)',
    MA: 'Mahilyowskaya voblasts\' (be) Mogilevskaya oblast\' (ru)',
    MI: 'Minskaya voblasts\' (be) Minskaya oblast\' (ru)',
    VI: 'Vitsyebskaya voblasts\' (be) Vitebskaya oblast\' (ru)'
  },
  BE: {
    VAN: 'Antwerpen (nl)',
    WBR: 'Brabant Wallon (fr)',
    BRU: 'Brussels',
    WHT: 'Hainaut (fr)',
    VLI: 'Limburg (nl)',
    WLG: 'Liège (fr)',
    WLX: 'Luxembourg (fr)',
    WNA: 'Namur (fr)',
    VOV: 'Oost-Vlaanderen (nl)',
    VBR: 'Vlaams Brabant (nl)',
    VWV: 'West-Vlaanderen (nl)'
  },
  BZ: {
    BZ: 'Belize',
    CY: 'Cayo',
    CZL: 'Corozal',
    OW: 'Orange Walk',
    SC: 'Stann Creek',
    TOL: 'Toledo'
  },
  BJ: {
    AL: 'Alibori',
    AK: 'Atakora',
    AQ: 'Atlantique',
    BO: 'Borgou',
    CO: 'Collines',
    DO: 'Donga',
    KO: 'Kouffo',
    LI: 'Littoral',
    MO: 'Mono',
    OU: 'Ouémé',
    PL: 'Plateau',
    ZO: 'Zou'
  },
  BM: {},
  BT: {
    '33': 'Bumthang',
    '12': 'Chhukha',
    '22': 'Dagana',
    'GA': 'Gasa',
    '13': 'Ha',
    '44': 'Lhuentse',
    '42': 'Monggar',
    '11': 'Paro',
    '43': 'Pemagatshel',
    '23': 'Punakha',
    '45': 'Samdrup Jongkha',
    '14': 'Samtse',
    '31': 'Sarpang',
    '15': 'Thimphu',
    'TY': 'Trashi Yangtse',
    '41': 'Trashigang',
    '32': 'Trongsa',
    '21': 'Tsirang',
    '24': 'Wangdue Phodrang',
    '34': 'Zhemgang'
  },
  BO: {
    H: 'Chuquisaca',
    C: 'Cochabamba',
    B: 'El Beni',
    L: 'La Paz',
    O: 'Oruro',
    N: 'Pando',
    P: 'Potosí',
    S: 'Santa Cruz',
    T: 'Tarija'
  },
  BQ: {
    BO: 'Bonaire',
    SA: 'Saba',
    SE: 'Sint Eustatius'
  },
  BA: {
    BIH: 'Federacija Bosna i Hercegovina',
    SRP: 'Republika Srpska'
  },
  BW: {
    CE: 'Central',
    GH: 'Ghanzi',
    KG: 'Kgalagadi',
    KL: 'Kgatleng',
    KW: 'Kweneng',
    NE: 'North-East',
    NW: 'North-West',
    SE: 'South-East',
    SO: 'Southern'
  },
  BV: {},
  BR: {
    AC: 'Acre',
    AL: 'Alagoas',
    AP: 'Amapá',
    AM: 'Amazonas',
    BA: 'Bahia',
    CE: 'Ceará',
    DF: 'Distrito Federal',
    ES: 'Espírito Santo',
    GO: 'Goiás',
    MA: 'Maranhão',
    MT: 'Mato Grosso',
    MS: 'Mato Grosso do Sul',
    MG: 'Minas Gerais',
    PR: 'Paraná',
    PB: 'Paraíba',
    PA: 'Pará',
    PE: 'Pernambuco',
    PI: 'Piauí',
    RN: 'Rio Grande do Norte',
    RS: 'Rio Grande do Sul',
    RJ: 'Rio de Janeiro',
    RO: 'Rondônia',
    RR: 'Roraima',
    SC: 'Santa Catarina',
    SE: 'Sergipe',
    SP: 'São Paulo',
    TO: 'Tocantins'
  },
  IO: {},
  BN: {
    BE: 'Belait',
    BM: 'Brunei-Muara',
    TE: 'Temburong',
    TU: 'Tutong'
  },
  BG: {
    '01': 'Blagoevgrad',
    '02': 'Burgas',
    '08': 'Dobrich',
    '07': 'Gabrovo',
    '26': 'Haskovo',
    '09': 'Kardzhali',
    '10': 'Kjustendil',
    '11': 'Lovech',
    '12': 'Montana',
    '13': 'Pazardzhik',
    '14': 'Pernik',
    '15': 'Pleven',
    '16': 'Plovdiv',
    '17': 'Razgrad',
    '18': 'Ruse',
    '19': 'Silistra',
    '20': 'Sliven',
    '21': 'Smolyan',
    '23': 'Sofia',
    '22': 'Sofia-Grad',
    '24': 'Stara Zagora',
    '25': 'Targovishte',
    '03': 'Varna',
    '04': 'Veliko Tarnovo',
    '05': 'Vidin',
    '06': 'Vratsa',
    '28': 'Yambol',
    '27': 'Šumen'
  },
  BF: {
    BAL: 'Balé',
    BAM: 'Bam',
    BAN: 'Banwa',
    BAZ: 'Bazèga',
    BGR: 'Bougouriba',
    BLG: 'Boulgou',
    BLK: 'Boulkiemdé',
    COM: 'Comoé',
    GAN: 'Ganzourgou',
    GNA: 'Gnagna',
    GOU: 'Gourma',
    HOU: 'Houet',
    IOB: 'Ioba',
    KAD: 'Kadiogo',
    KMD: 'Komondjari',
    KMP: 'Kompienga',
    KOS: 'Kossi',
    KOP: 'Koulpélogo',
    KOT: 'Kouritenga',
    KOW: 'Kourwéogo',
    KEN: 'Kénédougou',
    LOR: 'Loroum',
    LER: 'Léraba',
    MOU: 'Mouhoun',
    NAO: 'Nahouri',
    NAM: 'Namentenga',
    NAY: 'Nayala',
    NOU: 'Noumbiel',
    OUB: 'Oubritenga',
    OUD: 'Oudalan',
    PAS: 'Passoré',
    PON: 'Poni',
    SNG: 'Sanguié',
    SMT: 'Sanmatenga',
    SIS: 'Sissili',
    SOM: 'Soum',
    SOR: 'Sourou',
    SEN: 'Séno',
    TAP: 'Tapoa',
    TUI: 'Tui',
    YAG: 'Yagha',
    YAT: 'Yatenga',
    ZIR: 'Ziro',
    ZON: 'Zondoma',
    ZOU: 'Zoundwéogo'
  },
  BI: {
    BB: 'Bubanza',
    BJ: 'Bujumbura',
    BR: 'Bururi',
    CA: 'Cankuzo',
    CI: 'Cibitoke',
    GI: 'Gitega',
    KR: 'Karuzi',
    KY: 'Kayanza',
    KI: 'Kirundo',
    MA: 'Makamba',
    MU: 'Muramvya',
    MY: 'Muyinga',
    MW: 'Mwaro',
    NG: 'Ngozi',
    RT: 'Rutana',
    RY: 'Ruyigi'
  },
  KH: {
    '2': 'Baat Dambang [Batdâmbâng]',
    '1': 'Banteay Mean Chey [Bântéay Méanchey]',
    '3': 'Kampong Chaam [Kâmpóng Cham]',
    '4': 'Kampong Chhnang [Kâmpóng Chhnang]',
    '5': 'Kampong Spueu [Kâmpóng Spœ]',
    '6': 'Kampong Thum [Kâmpóng Thum]',
    '7': 'Kampot [Kâmpôt]',
    '8': 'Kandaal [Kândal]',
    '9': 'Kaoh Kong [Kaôh Kong]',
    '10': 'Kracheh [Krâchéh]',
    '23': 'Krong Kep [Krong Kêb]',
    '24': 'Krong Pailin [Krong Pailin]',
    '18': 'Krong Preah Sihanouk [Krong Preah Sihanouk]',
    '11': 'Mondol Kiri [Môndól Kiri]',
    '22': 'Otdar Mean Chey [Otdâr Méanchey]',
    '12': 'Phnom Penh [Phnum Pénh]',
    '15': 'Pousaat [Pouthisat]',
    '13': 'Preah Vihear [Preah Vihéar]',
    '14': 'Prey Veaeng [Prey Vêng]',
    '16': 'Rotanak Kiri [Rôtânôkiri]',
    '17': 'Siem Reab [Siemréab]',
    '19': 'Stueng Traeng [Stœ?ng Trêng]',
    '20': 'Svaay Rieng [Svay Rieng]',
    '21': 'Taakaev [Takêv]'
  },
  CM: {
    AD: 'Adamaoua',
    CE: 'Centre',
    ES: 'East',
    EN: 'Far North',
    LT: 'Littoral',
    NO: 'North',
    NW: 'North-West',
    SU: 'South',
    SW: 'South-West',
    OU: 'West'
  },
  CA: {
    AB: 'Alberta',
    BC: 'British Columbia',
    MB: 'Manitoba',
    NB: 'New Brunswick',
    NL: 'Newfoundland and Labrador',
    NT: 'Northwest Territories',
    NS: 'Nova Scotia',
    NU: 'Nunavut',
    ON: 'Ontario',
    PE: 'Prince Edward Island',
    QC: 'Quebec',
    SK: 'Saskatchewan',
    YT: 'Yukon Territory'
  },
  IC: {},
  CV: {
    BV: 'Boa Vista',
    BR: 'Brava',
    CS: 'Calheta de São Miguel',
    MA: 'Maio',
    MO: 'Mosteiros',
    PA: 'Paúl',
    PN: 'Porto Novo',
    PR: 'Praia',
    RG: 'Ribeira Grande',
    SL: 'Sal',
    CA: 'Santa Catarina',
    CR: 'Santa Cruz',
    SD: 'São Domingos',
    SF: 'São Filipe',
    SN: 'São Nicolau',
    SV: 'São Vicente',
    TA: 'Tarrafal'
  },
  KY: {},
  CF: {
    BB: 'Bamingui-Bangoran',
    BGF: 'Bangui',
    BK: 'Basse-Kotto',
    HM: 'Haut-Mbomou',
    HK: 'Haute-Kotto',
    KG: 'Kémo',
    LB: 'Lobaye',
    HS: 'Mambéré-Kadéï',
    MB: 'Mbomou',
    KB: 'Nana-Grébizi',
    NM: 'Nana-Mambéré',
    MP: 'Ombella-Mpoko',
    UK: 'Ouaka',
    AC: 'Ouham',
    OP: 'Ouham-Pendé',
    SE: 'Sangha-Mbaéré',
    VK: 'Vakaga'
  },
  TD: {
    BA: 'Batha',
    BET: 'Borkou-Ennedi-Tibesti',
    CB: 'Chari-Baguirmi',
    GR: 'Guéra',
    HL: 'Hadjer Lamis',
    KA: 'Kanem',
    LC: 'Lac',
    LO: 'Logone-Occidental',
    LR: 'Logone-Oriental',
    MA: 'Mandoul',
    ME: 'Mayo-Kébbi-Est',
    MO: 'Mayo-Kébbi-Ouest',
    MC: 'Moyen-Chari',
    ND: 'Ndjamena',
    OD: 'Ouaddaï',
    SA: 'Salamat',
    TA: 'Tandjilé',
    WF: 'Wadi Fira'
  },
  CL: {
    AI: 'Aisén del General Carlos Ibáñez del Campo',
    AN: 'Antofagasta',
    AR: 'Araucanía',
    AP: 'Arica y Parinacota',
    AT: 'Atacama',
    BI: 'Bío-Bío',
    CO: 'Coquimbo',
    LI: 'Libertador General Bernardo O\'Higgins',
    LL: 'Los Lagos',
    LR: 'Los Ríos',
    MA: 'Magallanes',
    ML: 'Maule',
    RM: 'Región Metropolitana de Santiago',
    TA: 'Tarapacá',
    VS: 'Valparaíso'
  },
  CN: {
    '34': 'Anhui',
    '92': 'Aomen (zh) ***',
    '11': 'Beijing',
    '50': 'Chongqing',
    '35': 'Fujian',
    '62': 'Gansu',
    '44': 'Guangdong',
    '45': 'Guangxi',
    '52': 'Guizhou',
    '46': 'Hainan',
    '13': 'Hebei',
    '23': 'Heilongjiang',
    '41': 'Henan',
    '42': 'Hubei',
    '43': 'Hunan',
    '32': 'Jiangsu',
    '36': 'Jiangxi',
    '22': 'Jilin',
    '21': 'Liaoning',
    '15': 'Nei Mongol (mn)',
    '64': 'Ningxia',
    '63': 'Qinghai',
    '61': 'Shaanxi',
    '37': 'Shandong',
    '31': 'Shanghai',
    '14': 'Shanxi',
    '51': 'Sichuan',
    '71': 'Taiwan *',
    '12': 'Tianjin',
    '91': 'Xianggang (zh) **',
    '65': 'Xinjiang',
    '54': 'Xizang',
    '53': 'Yunnan',
    '33': 'Zhejiang'
  },
  CX: {},
  CC: {},
  CO: {
    AMA: 'Amazonas',
    ANT: 'Antioquia',
    ARA: 'Arauca',
    ATL: 'Atlántico',
    BOL: 'Bolívar',
    BOY: 'Boyacá',
    CAL: 'Caldas',
    CAQ: 'Caquetá',
    CAS: 'Casanare',
    CAU: 'Cauca',
    CES: 'Cesar',
    CHO: 'Chocó',
    CUN: 'Cundinamarca',
    COR: 'Córdoba',
    DC: 'Distrito Capital de Bogotá',
    GUA: 'Guainía',
    GUV: 'Guaviare',
    HUI: 'Huila',
    LAG: 'La Guajira',
    MAG: 'Magdalena',
    MET: 'Meta',
    NAR: 'Nariño',
    NSA: 'Norte de Santander',
    PUT: 'Putumayo',
    QUI: 'Quindío',
    RIS: 'Risaralda',
    SAP: 'San Andrés, Providencia y Santa Catalina',
    SAN: 'Santander',
    SUC: 'Sucre',
    TOL: 'Tolima',
    VAC: 'Valle del Cauca',
    VAU: 'Vaupés',
    VID: 'Vichada'
  },
  KM: {
    A: 'Anjouan',
    G: 'Grande Comore',
    M: 'Mohéli'
  },
  CG: {
    '11': 'Bouenza',
    'BZV': 'Brazzaville',
    '8': 'Cuvette',
    '15': 'Cuvette-Ouest',
    '5': 'Kouilou',
    '7': 'Likouala',
    '2': 'Lékoumou',
    '9': 'Niari',
    '14': 'Plateaux',
    '12': 'Pool',
    '13': 'Sangha'
  },
  CD: {
    BN: 'Bandundu',
    BC: 'Bas-Congo',
    KW: 'Kasai-Occidental',
    KE: 'Kasai-Oriental',
    KA: 'Katanga',
    KN: 'Kinshasa',
    MA: 'Maniema',
    NK: 'Nord-Kivu',
    OR: 'Orientale',
    SK: 'Sud-Kivu',
    EQ: 'Équateur'
  },
  CK: {},
  CR: {
    A: 'Alajuela',
    C: 'Cartago',
    G: 'Guanacaste',
    H: 'Heredia',
    L: 'Limón',
    P: 'Puntarenas',
    SJ: 'San José'
  },
  HR: {
    '07': 'Bjelovarsko-bilogorska županija',
    '12': 'Brodsko-posavska županija',
    '19': 'Dubrovačko-neretvanska županija',
    '21': 'Grad Zagreb',
    '18': 'Istarska županija',
    '04': 'Karlovačka županija',
    '06': 'Koprivničko-križevačka županija',
    '02': 'Krapinsko-zagorska županija',
    '09': 'Ličko-senjska županija',
    '20': 'Međimurska županija',
    '14': 'Osječko-baranjska županija',
    '11': 'Požeško-slavonska županija',
    '08': 'Primorsko-goranska županija',
    '03': 'Sisačko-moslavačka županija',
    '17': 'Splitsko-dalmatinska županija',
    '05': 'Varaždinska županija',
    '10': 'Virovitičko-podravska županija',
    '16': 'Vukovarsko-srijemska županija',
    '13': 'Zadarska županija',
    '01': 'Zagrebačka županija',
    '15': 'Šibensko-kninska županija'
  },
  CU: {
    '09': 'Camagüey',
    '08': 'Ciego de Ávila',
    '06': 'Cienfuegos',
    '03': 'Ciudad de La Habana',
    '12': 'Granma',
    '14': 'Guantánamo',
    '11': 'Holguín',
    '99': 'Isla de la Juventud',
    '02': 'La Habana',
    '10': 'Las Tunas',
    '04': 'Matanzas',
    '01': 'Pinar del Río',
    '07': 'Sancti Spíritus',
    '13': 'Santiago de Cuba',
    '05': 'Villa Clara'
  },
  CW: {},
  CY: {
    '04': 'Ammochostos',
    '06': 'Keryneia',
    '03': 'Larnaka',
    '01': 'Lefkosia',
    '02': 'Lemesos',
    '05': 'Pafos'
  },
  CZ: {
    JC: 'Jihoceský kraj',
    JM: 'Jihomoravský kraj',
    KA: 'Karlovarský kraj',
    KR: 'Královéhradecký kraj',
    LI: 'Liberecký kraj',
    MO: 'Moravskoslezský kraj',
    OL: 'Olomoucký kraj',
    PA: 'Pardubický kraj',
    PL: 'Plzenský kraj',
    PR: 'Praha, hlavní mesto',
    ST: 'Stredoceský kraj',
    VY: 'Vysocina',
    ZL: 'Zlínský kraj',
    US: 'Ústecký kraj'
  },
  CI: {
    '06': '18 Montagnes (Région des)',
    '16': 'Agnébi (Région de l\')',
    '17': 'Bafing (Région du)',
    '09': 'Bas-Sassandra (Région du)',
    '10': 'Denguélé (Région du)',
    '18': 'Fromager (Région du)',
    '02': 'Haut-Sassandra (Région du)',
    '07': 'Lacs (Région des)',
    '01': 'Lagunes (Région des)',
    '12': 'Marahoué (Région de la)',
    '19': 'Moyen-Cavally (Région du)',
    '05': 'Moyen-Comoé (Région du)',
    '11': 'Nzi-Comoé (Région)',
    '03': 'Savanes (Région des)',
    '15': 'Sud-Bandama (Région du)',
    '13': 'Sud-Comoé (Région du)',
    '04': 'Vallée du Bandama (Région de la)',
    '14': 'Worodougou (Région du)',
    '08': 'Zanzan (Région du)'
  },
  DK: {
    '84': 'Capital Region of Denmark',
    '82': 'Central Denmark Region',
    '81': 'North Denmark Region',
    '85': 'Region Zealand',
    '83': 'Region of Southern Denmark'
  },
  DJ: {
    AS: 'Ali Sabieh',
    AR: 'Arta',
    DI: 'Dikhil',
    DJ: 'Djibouti',
    OB: 'Obock',
    TA: 'Tadjourah'
  },
  DM: {
    '02': 'Saint Andrew',
    '03': 'Saint David',
    '04': 'Saint George',
    '05': 'Saint John',
    '06': 'Saint Joseph',
    '07': 'Saint Luke',
    '08': 'Saint Mark',
    '09': 'Saint Patrick',
    '10': 'Saint Paul',
    '11': 'Saint Peter'
  },
  DO: {
    '02': 'Azua',
    '03': 'Bahoruco',
    '04': 'Barahona',
    '05': 'Dajabón',
    '01': 'Distrito Nacional (Santo Domingo)',
    '06': 'Duarte',
    '08': 'El Seybo [El Seibo]',
    '09': 'Espaillat',
    '30': 'Hato Mayor',
    '10': 'Independencia',
    '11': 'La Altagracia',
    '07': 'La Estrelleta [Elías Piña]',
    '12': 'La Romana',
    '13': 'La Vega',
    '14': 'María Trinidad Sánchez',
    '28': 'Monseñor Nouel',
    '15': 'Monte Cristi',
    '29': 'Monte Plata',
    '16': 'Pedernales',
    '17': 'Peravia',
    '18': 'Puerto Plata',
    '19': 'Salcedo',
    '20': 'Samaná',
    '21': 'San Cristóbal',
    '31': 'San Jose de Ocoa',
    '22': 'San Juan',
    '23': 'San Pedro de Macorís',
    '25': 'Santiago',
    '26': 'Santiago Rodríguez',
    '24': 'Sánchez Ramírez',
    '27': 'Valverde'
  },
  EC: {
    A: 'Azuay',
    B: 'Bolívar',
    C: 'Carchi',
    F: 'Cañar',
    H: 'Chimborazo',
    X: 'Cotopaxi',
    O: 'El Oro',
    E: 'Esmeraldas',
    W: 'Galápagos',
    G: 'Guayas',
    I: 'Imbabura',
    L: 'Loja',
    R: 'Los Ríos',
    M: 'Manabí',
    S: 'Morona-Santiago',
    N: 'Napo',
    D: 'Orellana',
    Y: 'Pastaza',
    P: 'Pichincha',
    'X1~': 'Santa Elena',
    'X2~': 'Santo Domingo de los Tsachilas',
    U: 'Sucumbíos',
    T: 'Tungurahua',
    Z: 'Zamora-Chinchipe'
  },
  EG: {
    DK: 'Ad Daqahliyah',
    BA: 'Al Bahr al Ahmar',
    BH: 'Al Buhayrah',
    FYM: 'Al Fayyum',
    GH: 'Al Gharbiyah',
    ALX: 'Al Iskandariyah',
    IS: 'Al Ismā`īlīyah',
    GZ: 'Al Jizah',
    MNF: 'Al Minufiyah',
    MN: 'Al Minya',
    C: 'Al Qahirah',
    KB: 'Al Qalyubiyah',
    WAD: 'Al Wadi al Jadid',
    SUZ: 'As Suways',
    SHR: 'Ash Sharqiyah',
    ASN: 'Aswan',
    AST: 'Asyut',
    BNS: 'Bani Suwayf',
    PTS: 'Būr Sa`īd',
    DT: 'Dumyat',
    JS: 'Janub Sina\'',
    KFS: 'Kafr ash Shaykh',
    MT: 'Matrūh',
    KN: 'Qina',
    SIN: 'Shamal Sina\'',
    SHG: 'Suhaj',
    LX: 'al-Uqsur'
  },
  SV: {
    AH: 'Ahuachapán',
    CA: 'Cabañas',
    CH: 'Chalatenango',
    CU: 'Cuscatlán',
    LI: 'La Libertad',
    PA: 'La Paz',
    UN: 'La Unión',
    MO: 'Morazán',
    SM: 'San Miguel',
    SS: 'San Salvador',
    SV: 'San Vicente',
    SA: 'Santa Ana',
    SO: 'Sonsonate',
    US: 'Usulután'
  },
  GQ: {
    AN: 'Annobón',
    BN: 'Bioko Norte',
    BS: 'Bioko Sur',
    CS: 'Centro Sur',
    KN: 'Kie-Ntem',
    LI: 'Litoral',
    C: 'Región Continental',
    I: 'Región Insular',
    WN: 'Wele-Nzás'
  },
  ER: {
    AN: 'Anseba',
    DU: 'Debub',
    DK: 'Debubawi Keyih Bahri [Debub-Keih-Bahri]',
    GB: 'Gash-Barka',
    MA: 'Maakel [Maekel]',
    SK: 'Semenawi Keyih Bahri [Semien-Keih-Bahri]'
  },
  EE: {
    '37': 'Harjumaa',
    '39': 'Hiiumaa',
    '44': 'Ida-Virumaa',
    '51': 'Järvamaa',
    '49': 'Jõgevamaa',
    '59': 'Lääne-Virumaa',
    '57': 'Läänemaa',
    '67': 'Pärnumaa',
    '65': 'Põlvamaa',
    '70': 'Raplamaa',
    '74': 'Saaremaa',
    '78': 'Tartumaa',
    '82': 'Valgamaa',
    '84': 'Viljandimaa',
    '86': 'Võrumaa'
  },
  ET: {
    AA: 'Adis Abeba',
    AF: 'Afar',
    AM: 'Amara',
    BE: 'Binshangul Gumuz',
    DD: 'Dire Dawa',
    GA: 'Gambela Hizboch',
    HA: 'Hareri Hizb',
    OR: 'Oromiya',
    SO: 'Sumale',
    TI: 'Tigray',
    SN: 'YeDebub Biheroch Bihereseboch na Hizboch'
  },
  FK: {},
  FO: {},
  FJ: {
    C: 'Central',
    E: 'Eastern',
    N: 'Northern',
    R: 'Rotuma',
    W: 'Western'
  },
  FI: {
    AL: 'Ahvenanmaan lääni',
    ES: 'Etelä-Suomen lääni',
    IS: 'Itä-Suomen lääni',
    LL: 'Lapin lääni',
    LS: 'Länsi-Suomen lääni',
    OL: 'Oulun lääni'
  },
  FR: {
    '01': 'Ain',
    '02': 'Aisne',
    '03': 'Allier',
    '06': 'Alpes-Maritimes',
    '04': 'Alpes-de-Haute-Provence',
    '08': 'Ardennes',
    '07': 'Ardèche',
    '09': 'Ariège',
    '10': 'Aube',
    '11': 'Aude',
    '12': 'Aveyron',
    '67': 'Bas-Rhin',
    '13': 'Bouches-du-Rhône',
    '14': 'Calvados',
    '15': 'Cantal',
    '16': 'Charente',
    '17': 'Charente-Maritime',
    '18': 'Cher',
    '19': 'Corrèze',
    '2A': 'Corse-du-Sud',
    '23': 'Creuse',
    '21': 'Côte-d\'Or',
    '22': 'Côtes-d\'Armor',
    '79': 'Deux-Sèvres',
    '24': 'Dordogne',
    '25': 'Doubs',
    '26': 'Drôme',
    '91': 'Essonne',
    '27': 'Eure',
    '28': 'Eure-et-Loir',
    '29': 'Finistère',
    '30': 'Gard',
    '32': 'Gers',
    '33': 'Gironde',
    '68': 'Haut-Rhin',
    '2B': 'Haute-Corse',
    '31': 'Haute-Garonne',
    '43': 'Haute-Loire',
    '52': 'Haute-Marne',
    '74': 'Haute-Savoie',
    '70': 'Haute-Saône',
    '87': 'Haute-Vienne',
    '05': 'Hautes-Alpes',
    '65': 'Hautes-Pyrénées',
    '92': 'Hauts-de-Seine',
    '34': 'Hérault',
    '35': 'Ille-et-Vilaine',
    '36': 'Indre',
    '37': 'Indre-et-Loire',
    '38': 'Isère',
    '39': 'Jura',
    '40': 'Landes',
    '41': 'Loir-et-Cher',
    '42': 'Loire',
    '44': 'Loire-Atlantique',
    '45': 'Loiret',
    '46': 'Lot',
    '47': 'Lot-et-Garonne',
    '48': 'Lozère',
    '49': 'Maine-et-Loire',
    '50': 'Manche',
    '51': 'Marne',
    '53': 'Mayenne',
    'YT': 'Mayotte (see also separate entry under YT)',
    '54': 'Meurthe-et-Moselle',
    '55': 'Meuse',
    '56': 'Morbihan',
    '57': 'Moselle',
    '58': 'Nièvre',
    '59': 'Nord',
    'NC': 'Nouvelle-Calédonie (see also separate entry under NC)',
    '60': 'Oise',
    '61': 'Orne',
    '75': 'Paris',
    '62': 'Pas-de-Calais',
    'PF': 'Polynésie française (see also separate entry under PF)',
    '63': 'Puy-de-Dôme',
    '64': 'Pyrénées-Atlantiques',
    '66': 'Pyrénées-Orientales',
    '69': 'Rhône',
    'PM': 'Saint-Pierre-et-Miquelon (see also separate entry under PM)',
    '72': 'Sarthe',
    '73': 'Savoie',
    '71': 'Saône-et-Loire',
    '76': 'Seine-Maritime',
    '93': 'Seine-Saint-Denis',
    '77': 'Seine-et-Marne',
    '80': 'Somme',
    '81': 'Tarn',
    '82': 'Tarn-et-Garonne',
    'TF': 'Terres Australes Françaises (see also separate entry under TF)',
    '90': 'Territoire de Belfort',
    '95': 'Val-d\'Oise',
    '94': 'Val-de-Marne',
    '83': 'Var',
    '84': 'Vaucluse',
    '85': 'Vendée',
    '86': 'Vienne',
    '88': 'Vosges',
    'WF': 'Wallis et Futuna (see also separate entry under WF)',
    '89': 'Yonne',
    '78': 'Yvelines'
  },
  GF: {},
  PF: {},
  TF: {
    'X2~': 'Crozet Islands',
    'X1~': 'Ile Saint-Paul et Ile Amsterdam',
    'X4~': 'Iles Eparses',
    'X3~': 'Kerguelen'
  },
  GA: {
    '1': 'Estuaire',
    '2': 'Haut-Ogooué',
    '3': 'Moyen-Ogooué',
    '4': 'Ngounié',
    '5': 'Nyanga',
    '6': 'Ogooué-Ivindo',
    '7': 'Ogooué-Lolo',
    '8': 'Ogooué-Maritime',
    '9': 'Woleu-Ntem'
  },
  GM: {
    B: 'Banjul',
    L: 'Lower River',
    M: 'MacCarthy Island',
    N: 'North Bank',
    U: 'Upper River',
    W: 'Western'
  },
  GE: {
    AB: 'Abkhazia',
    AJ: 'Ajaria',
    GU: 'Guria',
    IM: 'Imereti',
    KA: 'Kakheti',
    KK: 'Kvemo Kartli',
    MM: 'Mtskheta-Mtianeti',
    RL: 'Racha-Lechkhumi [and] Kvemo Svaneti',
    SZ: 'Samegrelo-Zemo Svaneti',
    SJ: 'Samtskhe-Javakheti',
    SK: 'Shida Kartli',
    TB: 'Tbilisi'
  },
  DE: {
    BW: 'Baden-Württemberg',
    BY: 'Bayern',
    BE: 'Berlin',
    BB: 'Brandenburg',
    HB: 'Bremen',
    HH: 'Hamburg',
    HE: 'Hessen',
    MV: 'Mecklenburg-Vorpommern',
    NI: 'Niedersachsen',
    NW: 'Nordrhein-Westfalen',
    RP: 'Rheinland-Pfalz',
    SL: 'Saarland',
    SN: 'Sachsen',
    ST: 'Sachsen-Anhalt',
    SH: 'Schleswig-Holstein',
    TH: 'Thüringen'
  },
  GH: {
    AH: 'Ashanti',
    BA: 'Brong-Ahafo',
    CP: 'Central',
    EP: 'Eastern',
    AA: 'Greater Accra',
    NP: 'Northern',
    UE: 'Upper East',
    UW: 'Upper West',
    TV: 'Volta',
    WP: 'Western'
  },
  GI: {},
  GR: {
    '13': 'Achaïa',
    '69': 'Agio Oros',
    '01': 'Aitolia-Akarnania',
    '11': 'Argolis',
    '12': 'Arkadia',
    '31': 'Arta',
    'A1': 'Attiki',
    '64': 'Chalkidiki',
    '94': 'Chania',
    '85': 'Chios',
    '81': 'Dodekanisos',
    '52': 'Drama',
    '71': 'Evros',
    '05': 'Evrytania',
    '04': 'Evvoia',
    '63': 'Florina',
    '07': 'Fokis',
    '06': 'Fthiotis',
    '51': 'Grevena',
    '14': 'Ileia',
    '53': 'Imathia',
    '33': 'Ioannina',
    '91': 'Irakleion',
    '41': 'Karditsa',
    '56': 'Kastoria',
    '55': 'Kavalla',
    '23': 'Kefallinia',
    '22': 'Kerkyra',
    '57': 'Kilkis',
    '15': 'Korinthia',
    '58': 'Kozani',
    '82': 'Kyklades',
    '16': 'Lakonia',
    '42': 'Larisa',
    '92': 'Lasithion',
    '24': 'Lefkas',
    '83': 'Lesvos',
    '43': 'Magnisia',
    '17': 'Messinia',
    '59': 'Pella',
    '61': 'Pieria',
    '34': 'Preveza',
    '93': 'Rethymnon',
    '73': 'Rodopi',
    '84': 'Samos',
    '62': 'Serrai',
    '32': 'Thesprotia',
    '54': 'Thessaloniki',
    '44': 'Trikala',
    '03': 'Voiotia',
    '72': 'Xanthi',
    '21': 'Zakynthos'
  },
  GL: {},
  GD: {
    '01': 'Saint Andrew',
    '02': 'Saint David',
    '03': 'Saint George',
    '04': 'Saint John',
    '05': 'Saint Mark',
    '06': 'Saint Patrick',
    '10': 'Southern Grenadine Islands'
  },
  GP: {},
  GU: {},
  GT: {
    AV: 'Alta Verapaz',
    BV: 'Baja Verapaz',
    CM: 'Chimaltenango',
    CQ: 'Chiquimula',
    PR: 'El Progreso',
    ES: 'Escuintla',
    GU: 'Guatemala',
    HU: 'Huehuetenango',
    IZ: 'Izabal',
    JA: 'Jalapa',
    JU: 'Jutiapa',
    PE: 'Petén',
    QZ: 'Quetzaltenango',
    QC: 'Quiché',
    RE: 'Retalhuleu',
    SA: 'Sacatepéquez',
    SM: 'San Marcos',
    SR: 'Santa Rosa',
    SO: 'Sololá',
    SU: 'Suchitepéquez',
    TO: 'Totonicapán',
    ZA: 'Zacapa'
  },
  GG: {},
  GN: {
    BE: 'Beyla',
    BF: 'Boffa',
    BK: 'Boké',
    C: 'Conakry',
    CO: 'Coyah',
    DB: 'Dabola',
    DL: 'Dalaba',
    DI: 'Dinguiraye',
    DU: 'Dubréka',
    FA: 'Faranah',
    FO: 'Forécariah',
    FR: 'Fria',
    GA: 'Gaoual',
    GU: 'Guékédou',
    KA: 'Kankan',
    KD: 'Kindia',
    KS: 'Kissidougou',
    KB: 'Koubia',
    KN: 'Koundara',
    KO: 'Kouroussa',
    KE: 'Kérouané',
    LA: 'Labé',
    LO: 'Lola',
    LE: 'Lélouma',
    MC: 'Macenta',
    ML: 'Mali',
    MM: 'Mamou',
    MD: 'Mandiana',
    NZ: 'Nzérékoré',
    PI: 'Pita',
    SI: 'Siguiri',
    TO: 'Tougué',
    TE: 'Télimélé',
    YO: 'Yomou'
  },
  GW: {
    BA: 'Bafatá',
    BM: 'Biombo',
    BS: 'Bissau',
    BL: 'Bolama',
    CA: 'Cacheu',
    GA: 'Gabú',
    OI: 'Oio',
    QU: 'Quinara',
    TO: 'Tombali'
  },
  GY: {
    BA: 'Barima-Waini',
    CU: 'Cuyuni-Mazaruni',
    DE: 'Demerara-Mahaica',
    EB: 'East Berbice-Corentyne',
    ES: 'Essequibo Islands-West Demerara',
    MA: 'Mahaica-Berbice',
    PM: 'Pomeroon-Supenaam',
    PT: 'Potaro-Siparuni',
    UD: 'Upper Demerara-Berbice',
    UT: 'Upper Takutu-Upper Essequibo'
  },
  HT: {
    AR: 'Artibonite',
    CE: 'Centre',
    GA: 'Grande-Anse',
    ND: 'Nord',
    NE: 'Nord-Est',
    NO: 'Nord-Ouest',
    OU: 'Ouest',
    SD: 'Sud',
    SE: 'Sud-Est'
  },
  HM: {},
  VA: {},
  HN: {
    AT: 'Atlántida',
    CH: 'Choluteca',
    CL: 'Colón',
    CM: 'Comayagua',
    CP: 'Copán',
    CR: 'Cortés',
    EP: 'El Paraíso',
    FM: 'Francisco Morazán',
    GD: 'Gracias a Dios',
    IN: 'Intibucá',
    IB: 'Islas de la Bahía',
    LP: 'La Paz',
    LE: 'Lempira',
    OC: 'Ocotepeque',
    OL: 'Olancho',
    SB: 'Santa Bárbara',
    VA: 'Valle',
    YO: 'Yoro'
  },
  HK: {},
  HU: {
    BA: 'Baranya',
    BZ: 'Borsod-Abaúj-Zemplén',
    BU: 'Budapest',
    BK: 'Bács-Kiskun',
    BE: 'Békés',
    BC: 'Békéscsaba',
    CS: 'Csongrád',
    DE: 'Debrecen',
    DU: 'Dunaújváros',
    EG: 'Eger',
    FE: 'Fejér',
    GY: 'Győr',
    GS: 'Győr-Moson-Sopron',
    HB: 'Hajdú-Bihar',
    HE: 'Heves',
    HV: 'Hódmezővásárhely',
    JN: 'Jász-Nagykun-Szolnok',
    KV: 'Kaposvár',
    KM: 'Kecskemét',
    KE: 'Komárom-Esztergom',
    MI: 'Miskolc',
    NK: 'Nagykanizsa',
    NY: 'Nyíregyháza',
    NO: 'Nógrád',
    PE: 'Pest',
    PS: 'Pécs',
    ST: 'Salgótarján',
    SO: 'Somogy',
    SN: 'Sopron',
    SZ: 'Szabolcs-Szatmár-Bereg',
    SD: 'Szeged',
    SS: 'Szekszárd',
    SK: 'Szolnok',
    SH: 'Szombathely',
    SF: 'Székesfehérvár',
    TB: 'Tatabánya',
    TO: 'Tolna',
    VA: 'Vas',
    VE: 'Veszprém',
    VM: 'Veszprém',
    ZA: 'Zala',
    ZE: 'Zalaegerszeg',
    ER: 'Érd'
  },
  IS: {
    '7': 'Austurland',
    '1': 'Höfuðborgarsvæði utan Reykjavíkur',
    '6': 'Norðurland eystra',
    '5': 'Norðurland vestra',
    '0': 'Reykjavík',
    '8': 'Suðurland',
    '2': 'Suðurnes',
    '4': 'Vestfirðir',
    '3': 'Vesturland'
  },
  IN: {
    AN: 'Andaman and Nicobar Islands',
    AP: 'Andhra Pradesh',
    AR: 'Arunachal Pradesh',
    AS: 'Assam',
    BR: 'Bihar',
    CH: 'Chandigarh',
    CT: 'Chhattisgarh',
    DN: 'Dadra and Nagar Haveli',
    DD: 'Daman and Diu',
    DL: 'Delhi',
    GA: 'Goa',
    GJ: 'Gujarat',
    HR: 'Haryana',
    HP: 'Himachal Pradesh',
    JK: 'Jammu and Kashmir',
    JH: 'Jharkhand',
    KA: 'Karnataka',
    KL: 'Kerala',
    LD: 'Lakshadweep',
    MP: 'Madhya Pradesh',
    MH: 'Maharashtra',
    MN: 'Manipur',
    ML: 'Meghalaya',
    MZ: 'Mizoram',
    NL: 'Nagaland',
    OR: 'Orissa',
    PY: 'Pondicherry',
    PB: 'Punjab',
    RJ: 'Rajasthan',
    SK: 'Sikkim',
    TN: 'Tamil Nadu',
    TR: 'Tripura',
    UP: 'Uttar Pradesh',
    UL: 'Uttaranchal',
    WB: 'West Bengal'
  },
  // TODO up to here
  ID: 'Indonesia',
  IR: 'Iran, Islamic Republic Of',
  IQ: 'Iraq',
  IE: 'Ireland',
  IM: 'Isle of Man',
  IL: 'Israel',
  IT: 'Italy',
  JM: 'Jamaica',
  JP: 'Japan',
  JE: 'Jersey',
  JO: 'Jordan',
  KZ: 'Kazakhstan',
  KE: 'Kenya',
  KI: 'Kiribati',
  KP: 'Korea, Democratic People\'s Republic Of',
  KR: 'Korea, Republic of',
  KW: 'Kuwait',
  KG: 'Kyrgyzstan',
  LA: 'Lao People\'s Democratic Republic',
  LV: 'Latvia',
  LB: 'Lebanon',
  LS: 'Lesotho',
  LR: 'Liberia',
  LY: 'Libya',
  LI: 'Liechtenstein',
  LT: 'Lithuania',
  LU: 'Luxembourg',
  MO: 'Macao',
  MK: 'Macedonia, the Former Yugoslav Republic Of',
  MG: 'Madagascar',
  MW: 'Malawi',
  MY: 'Malaysia',
  MV: 'Maldives',
  ML: 'Mali',
  MT: 'Malta',
  MH: 'Marshall Islands',
  MQ: 'Martinique',
  MR: 'Mauritania',
  MU: 'Mauritius',
  YT: 'Mayotte',
  MX: 'Mexico',
  FM: 'Micronesia, Federated States Of',
  MD: 'Moldova, Republic of',
  MC: 'Monaco',
  MN: 'Mongolia',
  ME: 'Montenegro',
  MS: 'Montserrat',
  MA: 'Morocco',
  MZ: 'Mozambique',
  MM: 'Myanmar',
  NA: 'Namibia',
  NR: 'Nauru',
  NP: 'Nepal',
  NL: 'Netherlands',
  AN: 'Netherlands Antilles',
  NC: 'New Caledonia',
  NZ: {
    AUK: 'Auckland',
    BOP: 'Bay of Plenty',
    CAN: 'Canterbury',
    'X1~': 'Chatham  Islands',
    GIS: 'Gisborne',
    HKB: 'Hawkess Bay',
    MWT: 'Manawatu-Wanganui',
    MBH: 'Marlborough',
    NSN: 'Nelson',
    NTL: 'Northland',
    OTA: 'Otago',
    STL: 'Southland',
    TKI: 'Taranaki',
    TAS: 'Tasman',
    WKO: 'Waikato',
    WGN: 'Wellington',
    WTC: 'West Coast'
  },
  NI: 'Nicaragua',
  NE: 'Niger',
  NG: 'Nigeria',
  NU: 'Niue',
  NF: 'Norfolk Island',
  MP: 'Northern Mariana Islands',
  NO: 'Norway',
  OM: 'Oman',
  PK: 'Pakistan',
  PW: 'Palau',
  PS: 'Palestine, State of',
  PA: 'Panama',
  PG: 'Papua New Guinea',
  PY: 'Paraguay',
  PE: 'Peru',
  PH: 'Philippines',
  PN: 'Pitcairn',
  PL: 'Poland',
  PT: 'Portugal',
  PR: 'Puerto Rico',
  QA: 'Qatar',
  RO: 'Romania',
  RU: 'Russian Federation',
  RW: 'Rwanda',
  RE: 'Réunion',
  BL: 'Saint Barthélemy',
  SH: 'Saint Helena',
  KN: 'Saint Kitts And Nevis',
  LC: 'Saint Lucia',
  MF: 'Saint Martin',
  PM: 'Saint Pierre And Miquelon',
  VC: 'Saint Vincent And The Grenedines',
  WS: 'Samoa',
  SM: 'San Marino',
  ST: 'Sao Tome and Principe',
  SA: 'Saudi Arabia',
  SN: 'Senegal',
  RS: 'Serbia',
  SC: 'Seychelles',
  SL: 'Sierra Leone',
  SG: {
    'X1~': 'Singapore - No State'
  },
  SX: 'Sint Maarten',
  SK: 'Slovakia',
  SI: 'Slovenia',
  SB: 'Solomon Islands',
  SO: 'Somalia',
  ZA: {
    EC: 'Eastern Cape',
    FS: 'Free State',
    GT: 'Gauteng',
    NL: 'Kwazulu-Natal',
    LP: 'Limpopo',
    MP: 'Mpumalanga',
    NW: 'North-West',
    NC: 'Northern Cape',
    WC: 'Western Cape'
  },
  GS: 'South Georgia and the South Sandwich Islands',
  SS: 'South Sudan',
  ES: 'Spain',
  LK: 'Sri Lanka',
  SD: 'Sudan',
  SR: 'Suriname',
  SJ: 'Svalbard And Jan Mayen',
  SZ: 'Swaziland',
  SE: 'Sweden',
  CH: 'Switzerland',
  SY: 'Syrian Arab Republic',
  TW: 'Taiwan, Republic Of China',
  TJ: 'Tajikistan',
  TZ: 'Tanzania, United Republic of',
  TH: 'Thailand',
  TL: 'Timor-Leste',
  TG: 'Togo',
  TK: 'Tokelau',
  TO: 'Tonga',
  TT: 'Trinidad and Tobago',
  TN: 'Tunisia',
  TR: 'Turkey',
  TM: 'Turkmenistan',
  TC: 'Turks and Caicos Islands',
  TV: 'Tuvalu',
  UG: 'Uganda',
  UA: 'Ukraine',
  AE: 'United Arab Emirates',
  GB: {
    ABE: 'Aberdeen City',
    ABD: 'Aberdeenshire',
    ANS: 'Angus',
    ANT: 'Antrim',
    ARD: 'Ards',
    AGB: 'Argyll and Bute',
    ARM: 'Armagh',
    BLA: 'Ballymena',
    BLY: 'Ballymoney',
    BNB: 'Banbridge',
    BDG: 'Barking and Dagenham',
    BNE: 'Barnet',
    BNS: 'Barnsley',
    BAS: 'Bath and North East Somerset',
    BDF: 'Bedfordshire',
    BFS: 'Belfast',
    BEX: 'Bexley',
    BIR: 'Birmingham',
    BBD: 'Blackburn with Darwen',
    BPL: 'Blackpool',
    BGW: 'Blaenau Gwent',
    BOL: 'Bolton',
    BMH: 'Bournemouth',
    BRC: 'Bracknell Forest',
    BRD: 'Bradford',
    BEN: 'Brent',
    BGE: 'Bridgend [Pen-y-bont ar Ogwr GB-POG]',
    BNH: 'Brighton and Hove',
    BST: 'Bristol City of',
    BRY: 'Bromley',
    BKM: 'Buckinghamshire',
    BUR: 'Bury',
    CAY: 'Caerphilly [Caerffili GB-CAF]',
    CLD: 'Calderdale',
    CAM: 'Cambridgeshire',
    CMD: 'Camden',
    CRF: 'Cardiff [Caerdydd GB-CRD]',
    CMN: 'Carmarthenshire [Sir Gaerfyrddin GB-GFY]',
    CKF: 'Carrickfergus',
    CSR: 'Castlereagh',
    CGN: 'Ceredigion [Sir Ceredigion]',
    CHS: 'Cheshire',
    CLK: 'Clackmannanshire',
    CLR: 'Coleraine',
    CWY: 'Conwy',
    CKT: 'Cookstown',
    CON: 'Cornwall',
    COV: 'Coventry',
    CGV: 'Craigavon',
    CRY: 'Croydon',
    CMA: 'Cumbria',
    DAL: 'Darlington',
    DEN: 'Denbighshire [Sir Ddinbych GB-DDB]',
    DER: 'Derby',
    DBY: 'Derbyshire',
    DRY: 'Derry',
    DEV: 'Devon',
    DNC: 'Doncaster',
    DOR: 'Dorset',
    DOW: 'Down',
    DUD: 'Dudley',
    DGY: 'Dumfries and Galloway',
    DND: 'Dundee City',
    DGN: 'Dungannon',
    DUR: 'Durham',
    EAL: 'Ealing',
    EAY: 'East Ayrshire',
    EDU: 'East Dunbartonshire',
    ELN: 'East Lothian',
    ERW: 'East Renfrewshire',
    ERY: 'East Riding of Yorkshire',
    ESX: 'East Sussex',
    EDH: 'Edinburgh City of',
    ELS: 'Eilean Siar',
    ENF: 'Enfield',
    ESS: 'Essex',
    FAL: 'Falkirk',
    FER: 'Fermanagh',
    FIF: 'Fife',
    FLN: 'Flintshire [Sir y Fflint GB-FFL]',
    GAT: 'Gateshead',
    GLG: 'Glasgow City',
    GLS: 'Gloucestershire',
    GRE: 'Greenwich',
    GWN: 'Gwynedd',
    HCK: 'Hackney',
    HAL: 'Halton',
    HMF: 'Hammersmith and Fulham',
    HAM: 'Hampshire',
    HRY: 'Haringey',
    HRW: 'Harrow',
    HPL: 'Hartlepool',
    HAV: 'Havering',
    HEF: 'Herefordshire County of',
    HRT: 'Hertfordshire',
    HLD: 'Highland',
    HIL: 'Hillingdon',
    HNS: 'Hounslow',
    IVC: 'Inverclyde',
    AGY: 'Isle of Anglesey [Sir Ynys Môn GB-YNM]',
    IOW: 'Isle of Wight',
    IOS: 'Isles of Scilly',
    ISL: 'Islington',
    KEC: 'Kensington and Chelsea',
    KEN: 'Kent',
    KHL: 'Kingston upon Hull City of',
    KTT: 'Kingston upon Thames',
    KIR: 'Kirklees',
    KWL: 'Knowsley',
    LBH: 'Lambeth',
    LAN: 'Lancashire',
    LRN: 'Larne',
    LDS: 'Leeds',
    LCE: 'Leicester',
    LEC: 'Leicestershire',
    LEW: 'Lewisham',
    LMV: 'Limavady',
    LIN: 'Lincolnshire',
    LSB: 'Lisburn',
    LIV: 'Liverpool',
    LND: 'London City of',
    LUT: 'Luton',
    MFT: 'Magherafelt',
    MAN: 'Manchester',
    MDW: 'Medway',
    MTY: 'Merthyr Tydfil [Merthyr Tudful GB-MTU]',
    MRT: 'Merton',
    MDB: 'Middlesbrough',
    MLN: 'Midlothian',
    MIK: 'Milton Keynes',
    MON: 'Monmouthshire [Sir Fynwy GB-FYN]',
    MRY: 'Moray',
    MYL: 'Moyle',
    NTL: 'Neath Port Talbot [Castell-nedd Port Talbot GB-CTL]',
    NET: 'Newcastle upon Tyne',
    NWM: 'Newham',
    NWP: 'Newport [Casnewydd GB-CNW]',
    NYM: 'Newry and Mourne',
    NTA: 'Newtownabbey',
    NFK: 'Norfolk',
    NAY: 'North Ayrshire',
    NDN: 'North Down',
    NEL: 'North East Lincolnshire',
    NLK: 'North Lanarkshire',
    NLN: 'North Lincolnshire',
    NSM: 'North Somerset',
    NTY: 'North Tyneside',
    NYK: 'North Yorkshire',
    NTH: 'Northamptonshire',
    NBL: 'Northumberland',
    NGM: 'Nottingham',
    NTT: 'Nottinghamshire',
    OLD: 'Oldham',
    OMH: 'Omagh',
    ORK: 'Orkney Islands',
    OXF: 'Oxfordshire',
    PEM: 'Pembrokeshire [Sir Benfro GB-BNF]',
    PKN: 'Perth and Kinross',
    PTE: 'Peterborough',
    PLY: 'Plymouth',
    POL: 'Poole',
    POR: 'Portsmouth',
    POW: 'Powys',
    RDG: 'Reading',
    RDB: 'Redbridge',
    RCC: 'Redcar and Cleveland',
    RFW: 'Renfrewshire',
    RCT: 'Rhondda, Cynon Taff [Rhondda Cynon Taf]',
    RIC: 'Richmond upon Thames',
    RCH: 'Rochdale',
    ROT: 'Rotherham',
    RUT: 'Rutland',
    SLF: 'Salford',
    SAW: 'Sandwell',
    SCB: 'Scottish Borders The',
    SFT: 'Sefton',
    SHF: 'Sheffield',
    ZET: 'Shetland Islands',
    SHR: 'Shropshire',
    SLG: 'Slough',
    SOL: 'Solihull',
    SOM: 'Somerset',
    SAY: 'South Ayrshire',
    SGC: 'South Gloucestershire',
    SLK: 'South Lanarkshire',
    STY: 'South Tyneside',
    STH: 'Southampton',
    SOS: 'Southend-on-Sea',
    SWK: 'Southwark',
    SHN: 'St. Helens',
    STS: 'Staffordshire',
    STG: 'Stirling',
    SKP: 'Stockport',
    STT: 'Stockton-on-Tees',
    STE: 'Stoke-on-Trent',
    STB: 'Strabane',
    SFK: 'Suffolk',
    SND: 'Sunderland',
    SRY: 'Surrey',
    STN: 'Sutton',
    SWA: 'Swansea [Abertawe GB-ATA]',
    SWD: 'Swindon',
    TAM: 'Tameside',
    TFW: 'Telford and Wrekin',
    THR: 'Thurrock',
    TOB: 'Torbay',
    TOF: 'Torfaen [Tor-faen]',
    TWH: 'Tower Hamlets',
    TRF: 'Trafford',
    VGL: 'Vale of Glamorgan The [Bro Morgannwg GB-BMG]',
    WKF: 'Wakefield',
    WLL: 'Walsall',
    WFT: 'Waltham Forest',
    WND: 'Wandsworth',
    WRT: 'Warrington',
    WAR: 'Warwickshire',
    WBK: 'West Berkshire',
    WDU: 'West Dunbartonshire',
    WLN: 'West Lothian',
    WSX: 'West Sussex',
    WSM: 'Westminster',
    WGN: 'Wigan',
    WIL: 'Wiltshire',
    WNM: 'Windsor and Maidenhead',
    WRL: 'Wirral',
    WOK: 'Wokingham',
    WLV: 'Wolverhampton',
    WOR: 'Worcestershire',
    WRX: 'Wrexham [Wrecsam GB-WRC]',
    YOR: 'York'
  },
  US: {
    AL: 'Alabama',
    AK: 'Alaska',
    AS: 'American Samoa',
    AZ: 'Arizona',
    AR: 'Arkansas',
    AA: 'Armed Forces Americas',
    AE: 'Armed Forces Europe',
    AP: 'Armed Forces Pacific',
    CA: 'California',
    CO: 'Colorado',
    CT: 'Connecticut',
    DE: 'Delaware',
    DC: 'District of Columbia',
    FL: 'Florida',
    GA: 'Georgia',
    GU: 'Guam',
    HI: 'Hawaii',
    ID: 'Idaho',
    IL: 'Illinois',
    IN: 'Indiana',
    IA: 'Iowa',
    KS: 'Kansas',
    KY: 'Kentucky',
    LA: 'Louisiana',
    ME: 'Maine',
    MD: 'Maryland',
    MA: 'Massachusetts',
    MI: 'Michigan',
    MN: 'Minnesota',
    MS: 'Mississippi',
    MO: 'Missouri',
    MT: 'Montana',
    NE: 'Nebraska',
    NV: 'Nevada',
    NH: 'New Hampshire',
    NJ: 'New Jersey',
    NM: 'New Mexico',
    NY: 'New York',
    NC: 'North Carolina',
    ND: 'North Dakota',
    MP: 'Northern Mariana Islands',
    OH: 'Ohio',
    OK: 'Oklahoma',
    OR: 'Oregon',
    PA: 'Pennsylvania',
    PR: 'Puerto Rico',
    RI: 'Rhode Island',
    SC: 'South Carolina',
    SD: 'South Dakota',
    TN: 'Tennessee',
    TX: 'Texas',
    UM: 'United States Minor Outlying Islands',
    UT: 'Utah',
    VT: 'Vermont',
    VI: 'Virgin Islands U.S.',
    VA: 'Virginia',
    WA: 'Washington',
    WV: 'West Virginia',
    WI: 'Wisconsin',
    WY: 'Wyoming'
  },
  UM: 'United States Minor Outlying Islands',
  UY: 'Uruguay',
  UZ: 'Uzbekistan',
  VU: 'Vanuatu',
  VE: 'Venezuela, Bolivarian Republic of',
  VN: 'Vietnam',
  VG: 'Virgin Islands, British',
  VI: 'Virgin Islands, U.S.',
  WF: 'Wallis and Futuna',
  EH: 'Western Sahara',
  YE: 'Yemen',
  ZM: 'Zambia',
  ZW: 'Zimbabwe',
  AX: {}
};

/***/ }),

/***/ "./assets-src/main/js/country-and-states-selectors/country-state-selector.js":
/*!***********************************************************************************!*\
  !*** ./assets-src/main/js/country-and-states-selectors/country-state-selector.js ***!
  \***********************************************************************************/
/*! exports provided: CountryStateSelector */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CountryStateSelector", function() { return CountryStateSelector; });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./build-tools/node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./build-tools/node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./build-tools/node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./build-tools/node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! select2 */ "./build-tools/node_modules/select2/dist/js/select2.js");
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(select2__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! select2/dist/css/select2.css */ "./build-tools/node_modules/select2/dist/css/select2.css");
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _helpers_logger__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../helpers/logger */ "./assets-src/helpers/logger.js");
/* harmony import */ var _config_countries__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./config-countries */ "./assets-src/main/js/country-and-states-selectors/config-countries.js");
/* harmony import */ var _config_states__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./config-states */ "./assets-src/main/js/country-and-states-selectors/config-states.js");





function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }







var _window$wpChargifyMai = window.wpChargifyMainConfig,
    signupDefaultCountry = _window$wpChargifyMai.signupDefaultCountry,
    signupCountries = _window$wpChargifyMai.signupCountries,
    signupCountriesPopular = _window$wpChargifyMai.signupCountriesPopular;
/**
 * Country and state selector
 */

var CountryStateSelector = /*#__PURE__*/function () {
  // Fields.
  // Full configs.
  // Selected options.
  // list above divider, defaults as below
  // list under divider. If left empty no divider.
  function CountryStateSelector(selectFieldCountrySelector) {
    var selectFieldStateSelector = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, CountryStateSelector);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_selectFieldCountry", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_selectFieldState", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_countriesConfig", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_statesConfig", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_selectedCountry", '');

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "_selectedState", '');

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "countriesPopularList", {
      AU: 'Australia',
      NZ: 'New Zealand',
      US: 'United States',
      GB: 'United Kingdom',
      ZA: 'South Africa',
      SG: 'Singapore',
      CA: 'Canada',
      FR: 'France',
      IN: 'India',
      DE: 'Germany'
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "countriesFullList", {});

    this._selectFieldCountry = jquery__WEBPACK_IMPORTED_MODULE_4___default()(selectFieldCountrySelector);

    if (this.selectFieldCountry.length) {
      // Set the defaults.
      this.selectedCountry = signupDefaultCountry;
      this.countriesConfig = _config_countries__WEBPACK_IMPORTED_MODULE_8__["countries"];
      this.statesConfig = _config_states__WEBPACK_IMPORTED_MODULE_9__["states"]; // Build the country list.

      this.buildCountryLists(); // Add select 2.

      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).select2({
        dropdownAutoWidth: true,
        width: 'auto'
      }); // Build out the options with select2, starting with countries.

      this.addCountryOptions();

      if (null !== selectFieldStateSelector) {
        this._selectFieldState = jquery__WEBPACK_IMPORTED_MODULE_4___default()(selectFieldStateSelector);

        if (this.selectFieldState.length) {
          // Add select 2.
          jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldState).select2({
            dropdownAutoWidth: true,
            width: '100%'
          }); // Build out the options with select2

          this.addStateOptions(); // Add event.

          this.countrySelectEvent();
        } else {
          Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_7__["log"])({
            type: 'warning',
            message: 'Form state select element does not exist on this page.'
          });
        }
      }
    } else {
      Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_7__["log"])({
        type: 'debug',
        message: 'Form with a countries select element does not exist on this page.'
      });
    }
  }
  /**
   * Update the state select field.
   */


  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(CountryStateSelector, [{
    key: "countrySelectEvent",
    value: function countrySelectEvent() {
      var _this = this;

      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).on('change', function (e) {
        _this.selectedCountry = jquery__WEBPACK_IMPORTED_MODULE_4___default()(e.target).val();

        _this.addStateOptions();
      });
    }
    /**
     * Add country options.
     */

  }, {
    key: "addCountryOptions",
    value: function addCountryOptions() {
      var _this2 = this;

      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).empty().trigger("change"); // Add the default option.

      var newOption = new Option('Select Country', '', false, false);
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).append(newOption).trigger('change');
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).val('');
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).trigger('change'); // Add the popular list first.

      if (this.hasCountriesInPopularList()) {
        Object.entries(this.countriesPopularList).forEach(function (_ref) {
          var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref, 2),
              key = _ref2[0],
              value = _ref2[1];

          newOption = new Option(value, key, false, false);
          jquery__WEBPACK_IMPORTED_MODULE_4___default()(_this2.selectFieldCountry).append(newOption).trigger('change');
        });
      } // Add a disabled divider option between lists, if both lists have something.


      if (this.hasCountriesInPopularList() && this.hasCountriesInFullList()) {
        var divider = jquery__WEBPACK_IMPORTED_MODULE_4___default()('<option>', {
          value: '',
          text: '-----',
          disabled: 'disabled'
        });
        jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).append(divider).trigger('change');
      } // Add the full list if any.


      if (this.hasCountriesInFullList()) {
        // Add the full list.
        Object.entries(this.countriesFullList).forEach(function (_ref3) {
          var _ref4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref3, 2),
              key = _ref4[0],
              value = _ref4[1];

          newOption = new Option(value, key, false, false);
          jquery__WEBPACK_IMPORTED_MODULE_4___default()(_this2.selectFieldCountry).append(newOption).trigger('change');
        });
      } // Set default country based from selected country if in a list.


      if (this.selectedCountry && (this.hasCountriesInPopularList() && this.countriesPopularList[this.selectedCountry] || this.hasCountriesInFullList() && this.countriesFullList[this.selectedCountry])) {
        jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).val(this.selectedCountry);
        jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldCountry).trigger('change');
      } else {
        this.selectedCountry = '';
      }
    }
    /**
     * Add the state options based on selected country.
     */

  }, {
    key: "addStateOptions",
    value: function addStateOptions() {
      var _this3 = this;

      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldState).empty().trigger("change"); // Default if no country has been selected.

      var newOption = new Option('Select Country First', '', false, false); // If there is a country selected use a different default option.

      if (!this.selectedCountry || '' === this.selectedCountry) {
        this.addDefaultStateOption(newOption);
      } else {
        var noStates = Object.keys(this.statesConfig[this.selectedCountry]).length === 0 && this.statesConfig[this.selectedCountry].constructor === Object; // Add the default state option or no states ins ome cases.

        if (noStates) {
          newOption = new Option('No State', '', true, true);
        } else {
          newOption = new Option('Select State', '', false, false);
        }

        this.addDefaultStateOption(newOption);

        if (!noStates) {
          Object.entries(this.statesConfig[this.selectedCountry]).forEach(function (_ref5) {
            var _ref6 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref5, 2),
                key = _ref6[0],
                value = _ref6[1];

            newOption = new Option(value, key, false, false);
            jquery__WEBPACK_IMPORTED_MODULE_4___default()(_this3.selectFieldState).append(newOption).trigger('change');
          });
        }
      }
    }
    /**
     * Add a default option for state dropdown.
     *
     * @param option
     */

  }, {
    key: "addDefaultStateOption",
    value: function addDefaultStateOption(option) {
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldState).append(option).trigger('change');
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldState).val('');
      jquery__WEBPACK_IMPORTED_MODULE_4___default()(this.selectFieldState).trigger('change');
    }
    /**
     * Build the country list ready for the select dropdown.
     */

  }, {
    key: "buildCountryLists",
    value: function buildCountryLists() {
      var _this4 = this;

      // Reset defaults, and preserve order from signupCountriesPopular array.
      if (signupCountriesPopular && signupCountriesPopular.length) {
        this.countriesPopularList = {};

        var _iterator = _createForOfIteratorHelper(signupCountriesPopular),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var countryCode = _step.value;
            this.countriesPopularList[countryCode] = this.countriesConfig[countryCode];
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      } else if (signupCountriesPopular && 0 === signupCountriesPopular.length) {
        this.countriesPopularList = {};
      } // Clear defaults replace with full list, preserve alphabetic order from config.


      if (signupCountries && signupCountries.length) {
        this.countriesFullList = this.countriesConfig; // Remove any that is not in signupCountries, this preserves alphabetic order from config.

        Object.entries(this.countriesFullList).forEach(function (_ref7) {
          var _ref8 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref7, 2),
              key = _ref8[0],
              value = _ref8[1];

          if (!signupCountries.includes(key)) {
            delete _this4.countriesFullList[key];
          }
        });
      }
    }
  }, {
    key: "hasCountriesInPopularList",
    value: function hasCountriesInPopularList() {
      return Object.keys(this.countriesPopularList).length !== 0 && this.countriesPopularList.constructor === Object;
    }
  }, {
    key: "hasCountriesInFullList",
    value: function hasCountriesInFullList() {
      return Object.keys(this.countriesFullList).length !== 0 && this.countriesFullList.constructor === Object;
    }
    /** ------------------------------------------------------------------------------------------
     * Setters.
     * ------------------------------------------------------------------------------------------ */

  }, {
    key: "countriesConfig",
    set: function set(value) {
      var isEmpty = Object.keys(value).length === 0 && value.constructor === Object;

      if (isEmpty) {
        this._countriesConfig = {};
      } else {
        this._countriesConfig = value;
      }
    },
    get: function get() {
      return this._countriesConfig;
    }
  }, {
    key: "statesConfig",
    set: function set(value) {
      var isEmpty = Object.keys(value).length === 0 && value.constructor === Object;

      if (isEmpty) {
        this._statesConfig = {};
      } else {
        this._statesConfig = value;
      }
    },
    get: function get() {
      return this._statesConfig;
    }
  }, {
    key: "selectedCountry",
    set: function set(value) {
      if (value && (typeof value === 'string' || value instanceof String)) {
        this._selectedCountry = value;
      } else {
        this._selectedCountry = '';
      }
    },
    get: function get() {
      return this._selectedCountry;
    }
  }, {
    key: "selectedState",
    set: function set(value) {
      this._selectedState = value;
    }
    /** ------------------------------------------------------------------------------------------
     * Getters.
     * ------------------------------------------------------------------------------------------ */
    ,
    get: function get() {
      return this._selectedState;
    }
  }, {
    key: "selectFieldCountry",
    get: function get() {
      return this._selectFieldCountry;
    }
  }, {
    key: "selectFieldState",
    get: function get() {
      return this._selectFieldState;
    }
  }]);

  return CountryStateSelector;
}();

/***/ }),

/***/ "./assets-src/main/js/country-and-states-selectors/index.js":
/*!******************************************************************!*\
  !*** ./assets-src/main/js/country-and-states-selectors/index.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _country_state_selector__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./country-state-selector */ "./assets-src/main/js/country-and-states-selectors/country-state-selector.js");
// Library imports.
 // Local imports.


/**
 * Initialize the country and state selectors.
 */

jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
  // Standard address country and state selectors.
  new _country_state_selector__WEBPACK_IMPORTED_MODULE_1__["CountryStateSelector"]('#chargify_country', '#chargify_state'); // Billing address country and state selectors.

  new _country_state_selector__WEBPACK_IMPORTED_MODULE_1__["CountryStateSelector"]('#chargify_billing_country', '#chargify_billing_state');
});

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
  // Elements
  // Flags

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

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_couponInputEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_couponMessageEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_productFamilyIdEl", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_couponApplied", false);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_showMessage", false);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_showingMessage", false);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "_messageTimeoutTriggered", false);

    this.validateButtonEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()(validateButtonID);
    this.couponInputEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()(couponInputID);
    this.couponMessageEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_coupon_messages_cntr'); // Sanity check that the elements exists.

    if (this.validateButtonEl.length && this.couponInputEl.length && this.couponMessageEl.length) {
      // The original button html.
      this.validateButtonElHtml = this.validateButtonEl.html(); // functionality.

      this.onInput();
      this.onSubmit();
      this.couponMessageEvents();
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
          _this.submitting(true);

          _this.showDiscountEls(false);

          _this.clearDiscountEls(); // Start process.
          // STEP 1. Check via admin ajax that the coupon is valid, and retrieve its information.


          _this.validateCoupon().then(function (response) {
            // Display the return message.
            if (_helpers_check_data_types__WEBPACK_IMPORTED_MODULE_7__["default"].isDefined(response.message)) {
              var messageType = response.success ? 'success' : 'warning';

              _this.displayMessage(response.message, messageType);
            }

            if (response.success) {
              var data = response.data;
              var _coupon = data.coupon;
              Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
                type: 'info',
                message: 'Successful retrieved the coupon.',
                details: {
                  response: response
                }
              }); // TODO continue testing.
              // TODO delete Current Test Codes; TCCTESTCOUPONFIXED, TCCTESTCOUPONPERCENT
              // TODO.

              _this.processCouponResult(_coupon);

              _this.showDiscountEls(true);

              _this.submitting(false);

              _this.couponInputEl.trigger('coupon_message');

              return true;
            }

            throw new Error();
          }).catch(function () {
            // Don't log errors, leave that to log(). Reset for and scroll to message.
            _this.clearDiscountEls();

            _this.showDiscountEls(false);

            _this.submitting(false);
          });
        } else {
          _this.displayMessage('Please enter a coupon.', 'warning');
        }
      });
    }
    /**
     * Gather the base product data that may be used by the endpoint to verify the coupon.
     * Typically the product family id is the only thing required, however if its not present the other fields may be used to back trace and find within the controller.
     *
     * @returns {Object}
     */

  }, {
    key: "productDetails",
    value: function productDetails() {
      // Base object to gather details for.
      var productDetails = {
        chargify_product_family_id: '',
        chargify_product_id: '',
        chargify_product_handle: '',
        chargify_price_point_id: '',
        chargify_price_point_handle: '',
        chargify_component_id: '',
        chargify_component_handle: '',
        chargify_component_price_point_id: '',
        chargify_component_price_point_handle: ''
      }; // Gather the values from the inputs.

      var productFamilyIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_product_family_id');

      if (productFamilyIdField.length && productFamilyIdField.val()) {
        productDetails['chargify_product_family_id'] = productFamilyIdField.val();
      } // Gather the values from the inputs.


      var productIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_product_id');

      if (productIdField.length && productIdField.val()) {
        productDetails['chargify_product_id'] = productIdField.val();
      } // Gather the values from the inputs.


      var productHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_product_handle');

      if (productHandleField.length && productHandleField.val()) {
        productDetails['chargify_product_handle'] = productHandleField.val();
      } // Gather the values from the inputs.


      var productPricePointIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_price_point_id');

      if (productPricePointIdField.length && productPricePointIdField.val()) {
        productDetails['chargify_price_point_id'] = productPricePointIdField.val();
      } // Gather the values from the inputs.


      var productPricePointHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_price_point_handle');

      if (productPricePointHandleField.length && productPricePointHandleField.val()) {
        productDetails['chargify_price_point_handle'] = productPricePointHandleField.val();
      } // Gather the values from the inputs.


      var productComponentIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_component_id');

      if (productComponentIdField.length && productComponentIdField.val()) {
        productDetails['chargify_component_id'] = productComponentIdField.val();
      } // Gather the values from the inputs.


      var productComponentHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_component_handle');

      if (productComponentHandleField.length && productComponentHandleField.val()) {
        productDetails['chargify_component_handle'] = productComponentHandleField.val();
      } // Gather the values from the inputs.


      var productComponentPricePointIdField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_component_price_point_id');

      if (productComponentPricePointIdField.length && productComponentPricePointIdField.val()) {
        productDetails['chargify_component_price_point_id'] = productComponentPricePointIdField.val();
      } // Gather the values from the inputs.


      var productComponentPricePointHandleField = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_component_price_point_handle');

      if (productComponentPricePointHandleField.length && productComponentPricePointHandleField.val()) {
        productDetails['chargify_component_price_point_handle'] = productComponentPricePointHandleField.val();
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
                _context.next = 3;
                return jquery__WEBPACK_IMPORTED_MODULE_5___default.a.post(ajaxURL, data, function (response) {
                  if (!_helpers_check_data_types__WEBPACK_IMPORTED_MODULE_7__["default"].isDefined(response)) {
                    response = {};
                    response.success = false;
                    response.message = 'An unexpected error validating coupon.';
                    Object(_helpers_logger__WEBPACK_IMPORTED_MODULE_6__["log"])({
                      type: 'error',
                      message: 'Response undefined in validateCoupon().'
                    });
                  }

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

              case 3:
                return _context.abrupt("return", _context.sent);

              case 4:
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

      var totalCostIncCentsEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_total_in_cents');
      var totalCostIncCentsDiscountedEl = jquery__WEBPACK_IMPORTED_MODULE_5___default()('#chargify_total_in_cents_discounted'); // Element for visual display of the discount.

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
    /** ------------------------------------------------------------------------------------------
     * Message.
     * ------------------------------------------------------------------------------------------ */

  }, {
    key: "couponMessageEvents",
    value: function couponMessageEvents() {
      var _this3 = this;

      // Any change to the coupon input clear message.
      jquery__WEBPACK_IMPORTED_MODULE_5___default()(this.couponInputEl).on('clear_coupon_message_timeout', function () {
        if (_this3.showMessage && !_this3.showingMessage) {
          _this3.showingMessage = true;
          setTimeout(function () {
            // Update html and classes.
            _this3.couponMessageEl.html('').removeClass().addClass('hidden'); // Flags.


            _this3.showMessage = false;
            _this3.showingMessage = false;
            _this3.messageTimeoutTriggered = false;
          }, 5000);
        }
      });
    }
  }, {
    key: "displayMessage",
    value: function displayMessage(message, type) {
      var _this4 = this;

      this.showMessage = true; // Add the message and the class name.

      this.couponMessageEl.html(message).addClass(type); // Any change to the coupon input, clear the message.

      this.couponInputEl.on('keyup.coupon_message, change.coupon_message, paste.coupon_message, coupon_message', function () {
        if (_this4.showMessage && !_this4.messageTimeoutTriggered) {
          // this.messageTimeoutTriggered = true; // temporarily prevents additional triggers.
          _this4.triggerClearCouponMessageTimeout();

          _this4.couponInputEl.off('keyup.coupon_message change.coupon_message paste.coupon_message');
        }
      });
    }
    /**
     * Trigger the timeout to remove the message from screen.
     */

  }, {
    key: "triggerClearCouponMessageTimeout",
    value: function triggerClearCouponMessageTimeout() {
      jquery__WEBPACK_IMPORTED_MODULE_5___default()(this.couponInputEl).trigger('clear_coupon_message_timeout');
    }
    /** ------------------------------------------------------------------------------------------
     * Misc.
     * ------------------------------------------------------------------------------------------ */

    /**
     * Submitting animation and restrictions for coupon button.
     *
     * @param {boolean} value Is the form submitting or not.
     */

  }, {
    key: "submitting",
    value: function submitting(value) {
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
    key: "couponMessageEl",
    set: function set(value) {
      this._couponMessageEl = value;
    },
    get: function get() {
      return this._couponMessageEl;
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
  }, {
    key: "showMessage",
    set: function set(value) {
      this._showMessage = value;
    },
    get: function get() {
      return this._showMessage;
    }
  }, {
    key: "showingMessage",
    set: function set(value) {
      this._showingMessage = value;
    },
    get: function get() {
      return this._showingMessage;
    }
  }, {
    key: "messageTimeoutTriggered",
    set: function set(value) {
      this._messageTimeoutTriggered = value;
    },
    get: function get() {
      return this._messageTimeoutTriggered;
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
/* harmony import */ var _country_and_states_selectors__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./country-and-states-selectors */ "./assets-src/main/js/country-and-states-selectors/index.js");
/* harmony import */ var _coupons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./coupons */ "./assets-src/main/js/coupons/index.js");
/**
 * All JS for the main frontend of the site must be added/imported here.
 */
// Local imports.



/***/ }),

/***/ "./assets-src/main/sass/styles.scss":
/*!******************************************!*\
  !*** ./assets-src/main/sass/styles.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

module.exports = _arrayWithHoles;

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

/***/ "./build-tools/node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

module.exports = _iterableToArrayLimit;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableRest;

/***/ }),

/***/ "./build-tools/node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles */ "./build-tools/node_modules/@babel/runtime/helpers/arrayWithHoles.js");

var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit */ "./build-tools/node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray */ "./build-tools/node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableRest = __webpack_require__(/*! ./nonIterableRest */ "./build-tools/node_modules/@babel/runtime/helpers/nonIterableRest.js");

function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}

module.exports = _slicedToArray;

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

/***/ "./build-tools/node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************************!*\
  !*** ./build-tools/node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray */ "./build-tools/node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray;

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

/***/ "./build-tools/node_modules/select2/dist/css/select2.css":
/*!***************************************************************!*\
  !*** ./build-tools/node_modules/select2/dist/css/select2.css ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./build-tools/node_modules/select2/dist/js/select2.js":
/*!*************************************************************!*\
  !*** ./build-tools/node_modules/select2/dist/js/select2.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;var require;var require;/*!
 * Select2 4.0.13
 * https://select2.github.io
 *
 * Released under the MIT license
 * https://github.com/select2/select2/blob/master/LICENSE.md
 */
;(function (factory) {
  if (true) {
    // AMD. Register as an anonymous module.
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "jquery")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
} (function (jQuery) {
  // This is needed so we can catch the AMD loader configuration and use it
  // The inner file should be wrapped (by `banner.start.js`) in a function that
  // returns the AMD loader references.
  var S2 =(function () {
  // Restore the Select2 AMD loader so it can be used
  // Needed mostly in the language files, where the loader is not inserted
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd) {
    var S2 = jQuery.fn.select2.amd;
  }
var S2;(function () { if (!S2 || !S2.requirejs) {
if (!S2) { S2 = {}; } else { require = S2; }
/**
 * @license almond 0.3.3 Copyright jQuery Foundation and other contributors.
 * Released under MIT license, http://github.com/requirejs/almond/LICENSE
 */
//Going sloppy to avoid 'use strict' string cost, but strict practices should
//be followed.
/*global setTimeout: false */

var requirejs, require, define;
(function (undef) {
    var main, req, makeMap, handlers,
        defined = {},
        waiting = {},
        config = {},
        defining = {},
        hasOwn = Object.prototype.hasOwnProperty,
        aps = [].slice,
        jsSuffixRegExp = /\.js$/;

    function hasProp(obj, prop) {
        return hasOwn.call(obj, prop);
    }

    /**
     * Given a relative module name, like ./something, normalize it to
     * a real name that can be mapped to a path.
     * @param {String} name the relative name
     * @param {String} baseName a real name that the name arg is relative
     * to.
     * @returns {String} normalized name
     */
    function normalize(name, baseName) {
        var nameParts, nameSegment, mapValue, foundMap, lastIndex,
            foundI, foundStarMap, starI, i, j, part, normalizedBaseParts,
            baseParts = baseName && baseName.split("/"),
            map = config.map,
            starMap = (map && map['*']) || {};

        //Adjust any relative paths.
        if (name) {
            name = name.split('/');
            lastIndex = name.length - 1;

            // If wanting node ID compatibility, strip .js from end
            // of IDs. Have to do this here, and not in nameToUrl
            // because node allows either .js or non .js to map
            // to same file.
            if (config.nodeIdCompat && jsSuffixRegExp.test(name[lastIndex])) {
                name[lastIndex] = name[lastIndex].replace(jsSuffixRegExp, '');
            }

            // Starts with a '.' so need the baseName
            if (name[0].charAt(0) === '.' && baseParts) {
                //Convert baseName to array, and lop off the last part,
                //so that . matches that 'directory' and not name of the baseName's
                //module. For instance, baseName of 'one/two/three', maps to
                //'one/two/three.js', but we want the directory, 'one/two' for
                //this normalization.
                normalizedBaseParts = baseParts.slice(0, baseParts.length - 1);
                name = normalizedBaseParts.concat(name);
            }

            //start trimDots
            for (i = 0; i < name.length; i++) {
                part = name[i];
                if (part === '.') {
                    name.splice(i, 1);
                    i -= 1;
                } else if (part === '..') {
                    // If at the start, or previous value is still ..,
                    // keep them so that when converted to a path it may
                    // still work when converted to a path, even though
                    // as an ID it is less than ideal. In larger point
                    // releases, may be better to just kick out an error.
                    if (i === 0 || (i === 1 && name[2] === '..') || name[i - 1] === '..') {
                        continue;
                    } else if (i > 0) {
                        name.splice(i - 1, 2);
                        i -= 2;
                    }
                }
            }
            //end trimDots

            name = name.join('/');
        }

        //Apply map config if available.
        if ((baseParts || starMap) && map) {
            nameParts = name.split('/');

            for (i = nameParts.length; i > 0; i -= 1) {
                nameSegment = nameParts.slice(0, i).join("/");

                if (baseParts) {
                    //Find the longest baseName segment match in the config.
                    //So, do joins on the biggest to smallest lengths of baseParts.
                    for (j = baseParts.length; j > 0; j -= 1) {
                        mapValue = map[baseParts.slice(0, j).join('/')];

                        //baseName segment has  config, find if it has one for
                        //this name.
                        if (mapValue) {
                            mapValue = mapValue[nameSegment];
                            if (mapValue) {
                                //Match, update name to the new value.
                                foundMap = mapValue;
                                foundI = i;
                                break;
                            }
                        }
                    }
                }

                if (foundMap) {
                    break;
                }

                //Check for a star map match, but just hold on to it,
                //if there is a shorter segment match later in a matching
                //config, then favor over this star map.
                if (!foundStarMap && starMap && starMap[nameSegment]) {
                    foundStarMap = starMap[nameSegment];
                    starI = i;
                }
            }

            if (!foundMap && foundStarMap) {
                foundMap = foundStarMap;
                foundI = starI;
            }

            if (foundMap) {
                nameParts.splice(0, foundI, foundMap);
                name = nameParts.join('/');
            }
        }

        return name;
    }

    function makeRequire(relName, forceSync) {
        return function () {
            //A version of a require function that passes a moduleName
            //value for items that may need to
            //look up paths relative to the moduleName
            var args = aps.call(arguments, 0);

            //If first arg is not require('string'), and there is only
            //one arg, it is the array form without a callback. Insert
            //a null so that the following concat is correct.
            if (typeof args[0] !== 'string' && args.length === 1) {
                args.push(null);
            }
            return req.apply(undef, args.concat([relName, forceSync]));
        };
    }

    function makeNormalize(relName) {
        return function (name) {
            return normalize(name, relName);
        };
    }

    function makeLoad(depName) {
        return function (value) {
            defined[depName] = value;
        };
    }

    function callDep(name) {
        if (hasProp(waiting, name)) {
            var args = waiting[name];
            delete waiting[name];
            defining[name] = true;
            main.apply(undef, args);
        }

        if (!hasProp(defined, name) && !hasProp(defining, name)) {
            throw new Error('No ' + name);
        }
        return defined[name];
    }

    //Turns a plugin!resource to [plugin, resource]
    //with the plugin being undefined if the name
    //did not have a plugin prefix.
    function splitPrefix(name) {
        var prefix,
            index = name ? name.indexOf('!') : -1;
        if (index > -1) {
            prefix = name.substring(0, index);
            name = name.substring(index + 1, name.length);
        }
        return [prefix, name];
    }

    //Creates a parts array for a relName where first part is plugin ID,
    //second part is resource ID. Assumes relName has already been normalized.
    function makeRelParts(relName) {
        return relName ? splitPrefix(relName) : [];
    }

    /**
     * Makes a name map, normalizing the name, and using a plugin
     * for normalization if necessary. Grabs a ref to plugin
     * too, as an optimization.
     */
    makeMap = function (name, relParts) {
        var plugin,
            parts = splitPrefix(name),
            prefix = parts[0],
            relResourceName = relParts[1];

        name = parts[1];

        if (prefix) {
            prefix = normalize(prefix, relResourceName);
            plugin = callDep(prefix);
        }

        //Normalize according
        if (prefix) {
            if (plugin && plugin.normalize) {
                name = plugin.normalize(name, makeNormalize(relResourceName));
            } else {
                name = normalize(name, relResourceName);
            }
        } else {
            name = normalize(name, relResourceName);
            parts = splitPrefix(name);
            prefix = parts[0];
            name = parts[1];
            if (prefix) {
                plugin = callDep(prefix);
            }
        }

        //Using ridiculous property names for space reasons
        return {
            f: prefix ? prefix + '!' + name : name, //fullName
            n: name,
            pr: prefix,
            p: plugin
        };
    };

    function makeConfig(name) {
        return function () {
            return (config && config.config && config.config[name]) || {};
        };
    }

    handlers = {
        require: function (name) {
            return makeRequire(name);
        },
        exports: function (name) {
            var e = defined[name];
            if (typeof e !== 'undefined') {
                return e;
            } else {
                return (defined[name] = {});
            }
        },
        module: function (name) {
            return {
                id: name,
                uri: '',
                exports: defined[name],
                config: makeConfig(name)
            };
        }
    };

    main = function (name, deps, callback, relName) {
        var cjsModule, depName, ret, map, i, relParts,
            args = [],
            callbackType = typeof callback,
            usingExports;

        //Use name if no relName
        relName = relName || name;
        relParts = makeRelParts(relName);

        //Call the callback to define the module, if necessary.
        if (callbackType === 'undefined' || callbackType === 'function') {
            //Pull out the defined dependencies and pass the ordered
            //values to the callback.
            //Default to [require, exports, module] if no deps
            deps = !deps.length && callback.length ? ['require', 'exports', 'module'] : deps;
            for (i = 0; i < deps.length; i += 1) {
                map = makeMap(deps[i], relParts);
                depName = map.f;

                //Fast path CommonJS standard dependencies.
                if (depName === "require") {
                    args[i] = handlers.require(name);
                } else if (depName === "exports") {
                    //CommonJS module spec 1.1
                    args[i] = handlers.exports(name);
                    usingExports = true;
                } else if (depName === "module") {
                    //CommonJS module spec 1.1
                    cjsModule = args[i] = handlers.module(name);
                } else if (hasProp(defined, depName) ||
                           hasProp(waiting, depName) ||
                           hasProp(defining, depName)) {
                    args[i] = callDep(depName);
                } else if (map.p) {
                    map.p.load(map.n, makeRequire(relName, true), makeLoad(depName), {});
                    args[i] = defined[depName];
                } else {
                    throw new Error(name + ' missing ' + depName);
                }
            }

            ret = callback ? callback.apply(defined[name], args) : undefined;

            if (name) {
                //If setting exports via "module" is in play,
                //favor that over return value and exports. After that,
                //favor a non-undefined return value over exports use.
                if (cjsModule && cjsModule.exports !== undef &&
                        cjsModule.exports !== defined[name]) {
                    defined[name] = cjsModule.exports;
                } else if (ret !== undef || !usingExports) {
                    //Use the return value from the function.
                    defined[name] = ret;
                }
            }
        } else if (name) {
            //May just be an object definition for the module. Only
            //worry about defining if have a module name.
            defined[name] = callback;
        }
    };

    requirejs = require = req = function (deps, callback, relName, forceSync, alt) {
        if (typeof deps === "string") {
            if (handlers[deps]) {
                //callback in this case is really relName
                return handlers[deps](callback);
            }
            //Just return the module wanted. In this scenario, the
            //deps arg is the module name, and second arg (if passed)
            //is just the relName.
            //Normalize module name, if it contains . or ..
            return callDep(makeMap(deps, makeRelParts(callback)).f);
        } else if (!deps.splice) {
            //deps is a config object, not an array.
            config = deps;
            if (config.deps) {
                req(config.deps, config.callback);
            }
            if (!callback) {
                return;
            }

            if (callback.splice) {
                //callback is an array, which means it is a dependency list.
                //Adjust args if there are dependencies
                deps = callback;
                callback = relName;
                relName = null;
            } else {
                deps = undef;
            }
        }

        //Support require(['a'])
        callback = callback || function () {};

        //If relName is a function, it is an errback handler,
        //so remove it.
        if (typeof relName === 'function') {
            relName = forceSync;
            forceSync = alt;
        }

        //Simulate async callback;
        if (forceSync) {
            main(undef, deps, callback, relName);
        } else {
            //Using a non-zero value because of concern for what old browsers
            //do, and latest browsers "upgrade" to 4 if lower value is used:
            //http://www.whatwg.org/specs/web-apps/current-work/multipage/timers.html#dom-windowtimers-settimeout:
            //If want a value immediately, use require('id') instead -- something
            //that works in almond on the global level, but not guaranteed and
            //unlikely to work in other AMD implementations.
            setTimeout(function () {
                main(undef, deps, callback, relName);
            }, 4);
        }

        return req;
    };

    /**
     * Just drops the config on the floor, but returns req in case
     * the config return value is used.
     */
    req.config = function (cfg) {
        return req(cfg);
    };

    /**
     * Expose module registry for debugging and tooling
     */
    requirejs._defined = defined;

    define = function (name, deps, callback) {
        if (typeof name !== 'string') {
            throw new Error('See almond README: incorrect module build, no module name');
        }

        //This module may not have dependencies
        if (!deps.splice) {
            //deps is not an array, so probably means
            //an object literal or factory function for
            //the value. Adjust args.
            callback = deps;
            deps = [];
        }

        if (!hasProp(defined, name) && !hasProp(waiting, name)) {
            waiting[name] = [name, deps, callback];
        }
    };

    define.amd = {
        jQuery: true
    };
}());

S2.requirejs = requirejs;S2.require = require;S2.define = define;
}
}());
S2.define("almond", function(){});

/* global jQuery:false, $:false */
S2.define('jquery',[],function () {
  var _$ = jQuery || $;

  if (_$ == null && console && console.error) {
    console.error(
      'Select2: An instance of jQuery or a jQuery-compatible library was not ' +
      'found. Make sure that you are including jQuery before Select2 on your ' +
      'web page.'
    );
  }

  return _$;
});

S2.define('select2/utils',[
  'jquery'
], function ($) {
  var Utils = {};

  Utils.Extend = function (ChildClass, SuperClass) {
    var __hasProp = {}.hasOwnProperty;

    function BaseConstructor () {
      this.constructor = ChildClass;
    }

    for (var key in SuperClass) {
      if (__hasProp.call(SuperClass, key)) {
        ChildClass[key] = SuperClass[key];
      }
    }

    BaseConstructor.prototype = SuperClass.prototype;
    ChildClass.prototype = new BaseConstructor();
    ChildClass.__super__ = SuperClass.prototype;

    return ChildClass;
  };

  function getMethods (theClass) {
    var proto = theClass.prototype;

    var methods = [];

    for (var methodName in proto) {
      var m = proto[methodName];

      if (typeof m !== 'function') {
        continue;
      }

      if (methodName === 'constructor') {
        continue;
      }

      methods.push(methodName);
    }

    return methods;
  }

  Utils.Decorate = function (SuperClass, DecoratorClass) {
    var decoratedMethods = getMethods(DecoratorClass);
    var superMethods = getMethods(SuperClass);

    function DecoratedClass () {
      var unshift = Array.prototype.unshift;

      var argCount = DecoratorClass.prototype.constructor.length;

      var calledConstructor = SuperClass.prototype.constructor;

      if (argCount > 0) {
        unshift.call(arguments, SuperClass.prototype.constructor);

        calledConstructor = DecoratorClass.prototype.constructor;
      }

      calledConstructor.apply(this, arguments);
    }

    DecoratorClass.displayName = SuperClass.displayName;

    function ctr () {
      this.constructor = DecoratedClass;
    }

    DecoratedClass.prototype = new ctr();

    for (var m = 0; m < superMethods.length; m++) {
      var superMethod = superMethods[m];

      DecoratedClass.prototype[superMethod] =
        SuperClass.prototype[superMethod];
    }

    var calledMethod = function (methodName) {
      // Stub out the original method if it's not decorating an actual method
      var originalMethod = function () {};

      if (methodName in DecoratedClass.prototype) {
        originalMethod = DecoratedClass.prototype[methodName];
      }

      var decoratedMethod = DecoratorClass.prototype[methodName];

      return function () {
        var unshift = Array.prototype.unshift;

        unshift.call(arguments, originalMethod);

        return decoratedMethod.apply(this, arguments);
      };
    };

    for (var d = 0; d < decoratedMethods.length; d++) {
      var decoratedMethod = decoratedMethods[d];

      DecoratedClass.prototype[decoratedMethod] = calledMethod(decoratedMethod);
    }

    return DecoratedClass;
  };

  var Observable = function () {
    this.listeners = {};
  };

  Observable.prototype.on = function (event, callback) {
    this.listeners = this.listeners || {};

    if (event in this.listeners) {
      this.listeners[event].push(callback);
    } else {
      this.listeners[event] = [callback];
    }
  };

  Observable.prototype.trigger = function (event) {
    var slice = Array.prototype.slice;
    var params = slice.call(arguments, 1);

    this.listeners = this.listeners || {};

    // Params should always come in as an array
    if (params == null) {
      params = [];
    }

    // If there are no arguments to the event, use a temporary object
    if (params.length === 0) {
      params.push({});
    }

    // Set the `_type` of the first object to the event
    params[0]._type = event;

    if (event in this.listeners) {
      this.invoke(this.listeners[event], slice.call(arguments, 1));
    }

    if ('*' in this.listeners) {
      this.invoke(this.listeners['*'], arguments);
    }
  };

  Observable.prototype.invoke = function (listeners, params) {
    for (var i = 0, len = listeners.length; i < len; i++) {
      listeners[i].apply(this, params);
    }
  };

  Utils.Observable = Observable;

  Utils.generateChars = function (length) {
    var chars = '';

    for (var i = 0; i < length; i++) {
      var randomChar = Math.floor(Math.random() * 36);
      chars += randomChar.toString(36);
    }

    return chars;
  };

  Utils.bind = function (func, context) {
    return function () {
      func.apply(context, arguments);
    };
  };

  Utils._convertData = function (data) {
    for (var originalKey in data) {
      var keys = originalKey.split('-');

      var dataLevel = data;

      if (keys.length === 1) {
        continue;
      }

      for (var k = 0; k < keys.length; k++) {
        var key = keys[k];

        // Lowercase the first letter
        // By default, dash-separated becomes camelCase
        key = key.substring(0, 1).toLowerCase() + key.substring(1);

        if (!(key in dataLevel)) {
          dataLevel[key] = {};
        }

        if (k == keys.length - 1) {
          dataLevel[key] = data[originalKey];
        }

        dataLevel = dataLevel[key];
      }

      delete data[originalKey];
    }

    return data;
  };

  Utils.hasScroll = function (index, el) {
    // Adapted from the function created by @ShadowScripter
    // and adapted by @BillBarry on the Stack Exchange Code Review website.
    // The original code can be found at
    // http://codereview.stackexchange.com/q/13338
    // and was designed to be used with the Sizzle selector engine.

    var $el = $(el);
    var overflowX = el.style.overflowX;
    var overflowY = el.style.overflowY;

    //Check both x and y declarations
    if (overflowX === overflowY &&
        (overflowY === 'hidden' || overflowY === 'visible')) {
      return false;
    }

    if (overflowX === 'scroll' || overflowY === 'scroll') {
      return true;
    }

    return ($el.innerHeight() < el.scrollHeight ||
      $el.innerWidth() < el.scrollWidth);
  };

  Utils.escapeMarkup = function (markup) {
    var replaceMap = {
      '\\': '&#92;',
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      '\'': '&#39;',
      '/': '&#47;'
    };

    // Do not try to escape the markup if it's not a string
    if (typeof markup !== 'string') {
      return markup;
    }

    return String(markup).replace(/[&<>"'\/\\]/g, function (match) {
      return replaceMap[match];
    });
  };

  // Append an array of jQuery nodes to a given element.
  Utils.appendMany = function ($element, $nodes) {
    // jQuery 1.7.x does not support $.fn.append() with an array
    // Fall back to a jQuery object collection using $.fn.add()
    if ($.fn.jquery.substr(0, 3) === '1.7') {
      var $jqNodes = $();

      $.map($nodes, function (node) {
        $jqNodes = $jqNodes.add(node);
      });

      $nodes = $jqNodes;
    }

    $element.append($nodes);
  };

  // Cache objects in Utils.__cache instead of $.data (see #4346)
  Utils.__cache = {};

  var id = 0;
  Utils.GetUniqueElementId = function (element) {
    // Get a unique element Id. If element has no id,
    // creates a new unique number, stores it in the id
    // attribute and returns the new id.
    // If an id already exists, it simply returns it.

    var select2Id = element.getAttribute('data-select2-id');
    if (select2Id == null) {
      // If element has id, use it.
      if (element.id) {
        select2Id = element.id;
        element.setAttribute('data-select2-id', select2Id);
      } else {
        element.setAttribute('data-select2-id', ++id);
        select2Id = id.toString();
      }
    }
    return select2Id;
  };

  Utils.StoreData = function (element, name, value) {
    // Stores an item in the cache for a specified element.
    // name is the cache key.
    var id = Utils.GetUniqueElementId(element);
    if (!Utils.__cache[id]) {
      Utils.__cache[id] = {};
    }

    Utils.__cache[id][name] = value;
  };

  Utils.GetData = function (element, name) {
    // Retrieves a value from the cache by its key (name)
    // name is optional. If no name specified, return
    // all cache items for the specified element.
    // and for a specified element.
    var id = Utils.GetUniqueElementId(element);
    if (name) {
      if (Utils.__cache[id]) {
        if (Utils.__cache[id][name] != null) {
          return Utils.__cache[id][name];
        }
        return $(element).data(name); // Fallback to HTML5 data attribs.
      }
      return $(element).data(name); // Fallback to HTML5 data attribs.
    } else {
      return Utils.__cache[id];
    }
  };

  Utils.RemoveData = function (element) {
    // Removes all cached items for a specified element.
    var id = Utils.GetUniqueElementId(element);
    if (Utils.__cache[id] != null) {
      delete Utils.__cache[id];
    }

    element.removeAttribute('data-select2-id');
  };

  return Utils;
});

S2.define('select2/results',[
  'jquery',
  './utils'
], function ($, Utils) {
  function Results ($element, options, dataAdapter) {
    this.$element = $element;
    this.data = dataAdapter;
    this.options = options;

    Results.__super__.constructor.call(this);
  }

  Utils.Extend(Results, Utils.Observable);

  Results.prototype.render = function () {
    var $results = $(
      '<ul class="select2-results__options" role="listbox"></ul>'
    );

    if (this.options.get('multiple')) {
      $results.attr('aria-multiselectable', 'true');
    }

    this.$results = $results;

    return $results;
  };

  Results.prototype.clear = function () {
    this.$results.empty();
  };

  Results.prototype.displayMessage = function (params) {
    var escapeMarkup = this.options.get('escapeMarkup');

    this.clear();
    this.hideLoading();

    var $message = $(
      '<li role="alert" aria-live="assertive"' +
      ' class="select2-results__option"></li>'
    );

    var message = this.options.get('translations').get(params.message);

    $message.append(
      escapeMarkup(
        message(params.args)
      )
    );

    $message[0].className += ' select2-results__message';

    this.$results.append($message);
  };

  Results.prototype.hideMessages = function () {
    this.$results.find('.select2-results__message').remove();
  };

  Results.prototype.append = function (data) {
    this.hideLoading();

    var $options = [];

    if (data.results == null || data.results.length === 0) {
      if (this.$results.children().length === 0) {
        this.trigger('results:message', {
          message: 'noResults'
        });
      }

      return;
    }

    data.results = this.sort(data.results);

    for (var d = 0; d < data.results.length; d++) {
      var item = data.results[d];

      var $option = this.option(item);

      $options.push($option);
    }

    this.$results.append($options);
  };

  Results.prototype.position = function ($results, $dropdown) {
    var $resultsContainer = $dropdown.find('.select2-results');
    $resultsContainer.append($results);
  };

  Results.prototype.sort = function (data) {
    var sorter = this.options.get('sorter');

    return sorter(data);
  };

  Results.prototype.highlightFirstItem = function () {
    var $options = this.$results
      .find('.select2-results__option[aria-selected]');

    var $selected = $options.filter('[aria-selected=true]');

    // Check if there are any selected options
    if ($selected.length > 0) {
      // If there are selected options, highlight the first
      $selected.first().trigger('mouseenter');
    } else {
      // If there are no selected options, highlight the first option
      // in the dropdown
      $options.first().trigger('mouseenter');
    }

    this.ensureHighlightVisible();
  };

  Results.prototype.setClasses = function () {
    var self = this;

    this.data.current(function (selected) {
      var selectedIds = $.map(selected, function (s) {
        return s.id.toString();
      });

      var $options = self.$results
        .find('.select2-results__option[aria-selected]');

      $options.each(function () {
        var $option = $(this);

        var item = Utils.GetData(this, 'data');

        // id needs to be converted to a string when comparing
        var id = '' + item.id;

        if ((item.element != null && item.element.selected) ||
            (item.element == null && $.inArray(id, selectedIds) > -1)) {
          $option.attr('aria-selected', 'true');
        } else {
          $option.attr('aria-selected', 'false');
        }
      });

    });
  };

  Results.prototype.showLoading = function (params) {
    this.hideLoading();

    var loadingMore = this.options.get('translations').get('searching');

    var loading = {
      disabled: true,
      loading: true,
      text: loadingMore(params)
    };
    var $loading = this.option(loading);
    $loading.className += ' loading-results';

    this.$results.prepend($loading);
  };

  Results.prototype.hideLoading = function () {
    this.$results.find('.loading-results').remove();
  };

  Results.prototype.option = function (data) {
    var option = document.createElement('li');
    option.className = 'select2-results__option';

    var attrs = {
      'role': 'option',
      'aria-selected': 'false'
    };

    var matches = window.Element.prototype.matches ||
      window.Element.prototype.msMatchesSelector ||
      window.Element.prototype.webkitMatchesSelector;

    if ((data.element != null && matches.call(data.element, ':disabled')) ||
        (data.element == null && data.disabled)) {
      delete attrs['aria-selected'];
      attrs['aria-disabled'] = 'true';
    }

    if (data.id == null) {
      delete attrs['aria-selected'];
    }

    if (data._resultId != null) {
      option.id = data._resultId;
    }

    if (data.title) {
      option.title = data.title;
    }

    if (data.children) {
      attrs.role = 'group';
      attrs['aria-label'] = data.text;
      delete attrs['aria-selected'];
    }

    for (var attr in attrs) {
      var val = attrs[attr];

      option.setAttribute(attr, val);
    }

    if (data.children) {
      var $option = $(option);

      var label = document.createElement('strong');
      label.className = 'select2-results__group';

      var $label = $(label);
      this.template(data, label);

      var $children = [];

      for (var c = 0; c < data.children.length; c++) {
        var child = data.children[c];

        var $child = this.option(child);

        $children.push($child);
      }

      var $childrenContainer = $('<ul></ul>', {
        'class': 'select2-results__options select2-results__options--nested'
      });

      $childrenContainer.append($children);

      $option.append(label);
      $option.append($childrenContainer);
    } else {
      this.template(data, option);
    }

    Utils.StoreData(option, 'data', data);

    return option;
  };

  Results.prototype.bind = function (container, $container) {
    var self = this;

    var id = container.id + '-results';

    this.$results.attr('id', id);

    container.on('results:all', function (params) {
      self.clear();
      self.append(params.data);

      if (container.isOpen()) {
        self.setClasses();
        self.highlightFirstItem();
      }
    });

    container.on('results:append', function (params) {
      self.append(params.data);

      if (container.isOpen()) {
        self.setClasses();
      }
    });

    container.on('query', function (params) {
      self.hideMessages();
      self.showLoading(params);
    });

    container.on('select', function () {
      if (!container.isOpen()) {
        return;
      }

      self.setClasses();

      if (self.options.get('scrollAfterSelect')) {
        self.highlightFirstItem();
      }
    });

    container.on('unselect', function () {
      if (!container.isOpen()) {
        return;
      }

      self.setClasses();

      if (self.options.get('scrollAfterSelect')) {
        self.highlightFirstItem();
      }
    });

    container.on('open', function () {
      // When the dropdown is open, aria-expended="true"
      self.$results.attr('aria-expanded', 'true');
      self.$results.attr('aria-hidden', 'false');

      self.setClasses();
      self.ensureHighlightVisible();
    });

    container.on('close', function () {
      // When the dropdown is closed, aria-expended="false"
      self.$results.attr('aria-expanded', 'false');
      self.$results.attr('aria-hidden', 'true');
      self.$results.removeAttr('aria-activedescendant');
    });

    container.on('results:toggle', function () {
      var $highlighted = self.getHighlightedResults();

      if ($highlighted.length === 0) {
        return;
      }

      $highlighted.trigger('mouseup');
    });

    container.on('results:select', function () {
      var $highlighted = self.getHighlightedResults();

      if ($highlighted.length === 0) {
        return;
      }

      var data = Utils.GetData($highlighted[0], 'data');

      if ($highlighted.attr('aria-selected') == 'true') {
        self.trigger('close', {});
      } else {
        self.trigger('select', {
          data: data
        });
      }
    });

    container.on('results:previous', function () {
      var $highlighted = self.getHighlightedResults();

      var $options = self.$results.find('[aria-selected]');

      var currentIndex = $options.index($highlighted);

      // If we are already at the top, don't move further
      // If no options, currentIndex will be -1
      if (currentIndex <= 0) {
        return;
      }

      var nextIndex = currentIndex - 1;

      // If none are highlighted, highlight the first
      if ($highlighted.length === 0) {
        nextIndex = 0;
      }

      var $next = $options.eq(nextIndex);

      $next.trigger('mouseenter');

      var currentOffset = self.$results.offset().top;
      var nextTop = $next.offset().top;
      var nextOffset = self.$results.scrollTop() + (nextTop - currentOffset);

      if (nextIndex === 0) {
        self.$results.scrollTop(0);
      } else if (nextTop - currentOffset < 0) {
        self.$results.scrollTop(nextOffset);
      }
    });

    container.on('results:next', function () {
      var $highlighted = self.getHighlightedResults();

      var $options = self.$results.find('[aria-selected]');

      var currentIndex = $options.index($highlighted);

      var nextIndex = currentIndex + 1;

      // If we are at the last option, stay there
      if (nextIndex >= $options.length) {
        return;
      }

      var $next = $options.eq(nextIndex);

      $next.trigger('mouseenter');

      var currentOffset = self.$results.offset().top +
        self.$results.outerHeight(false);
      var nextBottom = $next.offset().top + $next.outerHeight(false);
      var nextOffset = self.$results.scrollTop() + nextBottom - currentOffset;

      if (nextIndex === 0) {
        self.$results.scrollTop(0);
      } else if (nextBottom > currentOffset) {
        self.$results.scrollTop(nextOffset);
      }
    });

    container.on('results:focus', function (params) {
      params.element.addClass('select2-results__option--highlighted');
    });

    container.on('results:message', function (params) {
      self.displayMessage(params);
    });

    if ($.fn.mousewheel) {
      this.$results.on('mousewheel', function (e) {
        var top = self.$results.scrollTop();

        var bottom = self.$results.get(0).scrollHeight - top + e.deltaY;

        var isAtTop = e.deltaY > 0 && top - e.deltaY <= 0;
        var isAtBottom = e.deltaY < 0 && bottom <= self.$results.height();

        if (isAtTop) {
          self.$results.scrollTop(0);

          e.preventDefault();
          e.stopPropagation();
        } else if (isAtBottom) {
          self.$results.scrollTop(
            self.$results.get(0).scrollHeight - self.$results.height()
          );

          e.preventDefault();
          e.stopPropagation();
        }
      });
    }

    this.$results.on('mouseup', '.select2-results__option[aria-selected]',
      function (evt) {
      var $this = $(this);

      var data = Utils.GetData(this, 'data');

      if ($this.attr('aria-selected') === 'true') {
        if (self.options.get('multiple')) {
          self.trigger('unselect', {
            originalEvent: evt,
            data: data
          });
        } else {
          self.trigger('close', {});
        }

        return;
      }

      self.trigger('select', {
        originalEvent: evt,
        data: data
      });
    });

    this.$results.on('mouseenter', '.select2-results__option[aria-selected]',
      function (evt) {
      var data = Utils.GetData(this, 'data');

      self.getHighlightedResults()
          .removeClass('select2-results__option--highlighted');

      self.trigger('results:focus', {
        data: data,
        element: $(this)
      });
    });
  };

  Results.prototype.getHighlightedResults = function () {
    var $highlighted = this.$results
    .find('.select2-results__option--highlighted');

    return $highlighted;
  };

  Results.prototype.destroy = function () {
    this.$results.remove();
  };

  Results.prototype.ensureHighlightVisible = function () {
    var $highlighted = this.getHighlightedResults();

    if ($highlighted.length === 0) {
      return;
    }

    var $options = this.$results.find('[aria-selected]');

    var currentIndex = $options.index($highlighted);

    var currentOffset = this.$results.offset().top;
    var nextTop = $highlighted.offset().top;
    var nextOffset = this.$results.scrollTop() + (nextTop - currentOffset);

    var offsetDelta = nextTop - currentOffset;
    nextOffset -= $highlighted.outerHeight(false) * 2;

    if (currentIndex <= 2) {
      this.$results.scrollTop(0);
    } else if (offsetDelta > this.$results.outerHeight() || offsetDelta < 0) {
      this.$results.scrollTop(nextOffset);
    }
  };

  Results.prototype.template = function (result, container) {
    var template = this.options.get('templateResult');
    var escapeMarkup = this.options.get('escapeMarkup');

    var content = template(result, container);

    if (content == null) {
      container.style.display = 'none';
    } else if (typeof content === 'string') {
      container.innerHTML = escapeMarkup(content);
    } else {
      $(container).append(content);
    }
  };

  return Results;
});

S2.define('select2/keys',[

], function () {
  var KEYS = {
    BACKSPACE: 8,
    TAB: 9,
    ENTER: 13,
    SHIFT: 16,
    CTRL: 17,
    ALT: 18,
    ESC: 27,
    SPACE: 32,
    PAGE_UP: 33,
    PAGE_DOWN: 34,
    END: 35,
    HOME: 36,
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40,
    DELETE: 46
  };

  return KEYS;
});

S2.define('select2/selection/base',[
  'jquery',
  '../utils',
  '../keys'
], function ($, Utils, KEYS) {
  function BaseSelection ($element, options) {
    this.$element = $element;
    this.options = options;

    BaseSelection.__super__.constructor.call(this);
  }

  Utils.Extend(BaseSelection, Utils.Observable);

  BaseSelection.prototype.render = function () {
    var $selection = $(
      '<span class="select2-selection" role="combobox" ' +
      ' aria-haspopup="true" aria-expanded="false">' +
      '</span>'
    );

    this._tabindex = 0;

    if (Utils.GetData(this.$element[0], 'old-tabindex') != null) {
      this._tabindex = Utils.GetData(this.$element[0], 'old-tabindex');
    } else if (this.$element.attr('tabindex') != null) {
      this._tabindex = this.$element.attr('tabindex');
    }

    $selection.attr('title', this.$element.attr('title'));
    $selection.attr('tabindex', this._tabindex);
    $selection.attr('aria-disabled', 'false');

    this.$selection = $selection;

    return $selection;
  };

  BaseSelection.prototype.bind = function (container, $container) {
    var self = this;

    var resultsId = container.id + '-results';

    this.container = container;

    this.$selection.on('focus', function (evt) {
      self.trigger('focus', evt);
    });

    this.$selection.on('blur', function (evt) {
      self._handleBlur(evt);
    });

    this.$selection.on('keydown', function (evt) {
      self.trigger('keypress', evt);

      if (evt.which === KEYS.SPACE) {
        evt.preventDefault();
      }
    });

    container.on('results:focus', function (params) {
      self.$selection.attr('aria-activedescendant', params.data._resultId);
    });

    container.on('selection:update', function (params) {
      self.update(params.data);
    });

    container.on('open', function () {
      // When the dropdown is open, aria-expanded="true"
      self.$selection.attr('aria-expanded', 'true');
      self.$selection.attr('aria-owns', resultsId);

      self._attachCloseHandler(container);
    });

    container.on('close', function () {
      // When the dropdown is closed, aria-expanded="false"
      self.$selection.attr('aria-expanded', 'false');
      self.$selection.removeAttr('aria-activedescendant');
      self.$selection.removeAttr('aria-owns');

      self.$selection.trigger('focus');

      self._detachCloseHandler(container);
    });

    container.on('enable', function () {
      self.$selection.attr('tabindex', self._tabindex);
      self.$selection.attr('aria-disabled', 'false');
    });

    container.on('disable', function () {
      self.$selection.attr('tabindex', '-1');
      self.$selection.attr('aria-disabled', 'true');
    });
  };

  BaseSelection.prototype._handleBlur = function (evt) {
    var self = this;

    // This needs to be delayed as the active element is the body when the tab
    // key is pressed, possibly along with others.
    window.setTimeout(function () {
      // Don't trigger `blur` if the focus is still in the selection
      if (
        (document.activeElement == self.$selection[0]) ||
        ($.contains(self.$selection[0], document.activeElement))
      ) {
        return;
      }

      self.trigger('blur', evt);
    }, 1);
  };

  BaseSelection.prototype._attachCloseHandler = function (container) {

    $(document.body).on('mousedown.select2.' + container.id, function (e) {
      var $target = $(e.target);

      var $select = $target.closest('.select2');

      var $all = $('.select2.select2-container--open');

      $all.each(function () {
        if (this == $select[0]) {
          return;
        }

        var $element = Utils.GetData(this, 'element');

        $element.select2('close');
      });
    });
  };

  BaseSelection.prototype._detachCloseHandler = function (container) {
    $(document.body).off('mousedown.select2.' + container.id);
  };

  BaseSelection.prototype.position = function ($selection, $container) {
    var $selectionContainer = $container.find('.selection');
    $selectionContainer.append($selection);
  };

  BaseSelection.prototype.destroy = function () {
    this._detachCloseHandler(this.container);
  };

  BaseSelection.prototype.update = function (data) {
    throw new Error('The `update` method must be defined in child classes.');
  };

  /**
   * Helper method to abstract the "enabled" (not "disabled") state of this
   * object.
   *
   * @return {true} if the instance is not disabled.
   * @return {false} if the instance is disabled.
   */
  BaseSelection.prototype.isEnabled = function () {
    return !this.isDisabled();
  };

  /**
   * Helper method to abstract the "disabled" state of this object.
   *
   * @return {true} if the disabled option is true.
   * @return {false} if the disabled option is false.
   */
  BaseSelection.prototype.isDisabled = function () {
    return this.options.get('disabled');
  };

  return BaseSelection;
});

S2.define('select2/selection/single',[
  'jquery',
  './base',
  '../utils',
  '../keys'
], function ($, BaseSelection, Utils, KEYS) {
  function SingleSelection () {
    SingleSelection.__super__.constructor.apply(this, arguments);
  }

  Utils.Extend(SingleSelection, BaseSelection);

  SingleSelection.prototype.render = function () {
    var $selection = SingleSelection.__super__.render.call(this);

    $selection.addClass('select2-selection--single');

    $selection.html(
      '<span class="select2-selection__rendered"></span>' +
      '<span class="select2-selection__arrow" role="presentation">' +
        '<b role="presentation"></b>' +
      '</span>'
    );

    return $selection;
  };

  SingleSelection.prototype.bind = function (container, $container) {
    var self = this;

    SingleSelection.__super__.bind.apply(this, arguments);

    var id = container.id + '-container';

    this.$selection.find('.select2-selection__rendered')
      .attr('id', id)
      .attr('role', 'textbox')
      .attr('aria-readonly', 'true');
    this.$selection.attr('aria-labelledby', id);

    this.$selection.on('mousedown', function (evt) {
      // Only respond to left clicks
      if (evt.which !== 1) {
        return;
      }

      self.trigger('toggle', {
        originalEvent: evt
      });
    });

    this.$selection.on('focus', function (evt) {
      // User focuses on the container
    });

    this.$selection.on('blur', function (evt) {
      // User exits the container
    });

    container.on('focus', function (evt) {
      if (!container.isOpen()) {
        self.$selection.trigger('focus');
      }
    });
  };

  SingleSelection.prototype.clear = function () {
    var $rendered = this.$selection.find('.select2-selection__rendered');
    $rendered.empty();
    $rendered.removeAttr('title'); // clear tooltip on empty
  };

  SingleSelection.prototype.display = function (data, container) {
    var template = this.options.get('templateSelection');
    var escapeMarkup = this.options.get('escapeMarkup');

    return escapeMarkup(template(data, container));
  };

  SingleSelection.prototype.selectionContainer = function () {
    return $('<span></span>');
  };

  SingleSelection.prototype.update = function (data) {
    if (data.length === 0) {
      this.clear();
      return;
    }

    var selection = data[0];

    var $rendered = this.$selection.find('.select2-selection__rendered');
    var formatted = this.display(selection, $rendered);

    $rendered.empty().append(formatted);

    var title = selection.title || selection.text;

    if (title) {
      $rendered.attr('title', title);
    } else {
      $rendered.removeAttr('title');
    }
  };

  return SingleSelection;
});

S2.define('select2/selection/multiple',[
  'jquery',
  './base',
  '../utils'
], function ($, BaseSelection, Utils) {
  function MultipleSelection ($element, options) {
    MultipleSelection.__super__.constructor.apply(this, arguments);
  }

  Utils.Extend(MultipleSelection, BaseSelection);

  MultipleSelection.prototype.render = function () {
    var $selection = MultipleSelection.__super__.render.call(this);

    $selection.addClass('select2-selection--multiple');

    $selection.html(
      '<ul class="select2-selection__rendered"></ul>'
    );

    return $selection;
  };

  MultipleSelection.prototype.bind = function (container, $container) {
    var self = this;

    MultipleSelection.__super__.bind.apply(this, arguments);

    this.$selection.on('click', function (evt) {
      self.trigger('toggle', {
        originalEvent: evt
      });
    });

    this.$selection.on(
      'click',
      '.select2-selection__choice__remove',
      function (evt) {
        // Ignore the event if it is disabled
        if (self.isDisabled()) {
          return;
        }

        var $remove = $(this);
        var $selection = $remove.parent();

        var data = Utils.GetData($selection[0], 'data');

        self.trigger('unselect', {
          originalEvent: evt,
          data: data
        });
      }
    );
  };

  MultipleSelection.prototype.clear = function () {
    var $rendered = this.$selection.find('.select2-selection__rendered');
    $rendered.empty();
    $rendered.removeAttr('title');
  };

  MultipleSelection.prototype.display = function (data, container) {
    var template = this.options.get('templateSelection');
    var escapeMarkup = this.options.get('escapeMarkup');

    return escapeMarkup(template(data, container));
  };

  MultipleSelection.prototype.selectionContainer = function () {
    var $container = $(
      '<li class="select2-selection__choice">' +
        '<span class="select2-selection__choice__remove" role="presentation">' +
          '&times;' +
        '</span>' +
      '</li>'
    );

    return $container;
  };

  MultipleSelection.prototype.update = function (data) {
    this.clear();

    if (data.length === 0) {
      return;
    }

    var $selections = [];

    for (var d = 0; d < data.length; d++) {
      var selection = data[d];

      var $selection = this.selectionContainer();
      var formatted = this.display(selection, $selection);

      $selection.append(formatted);

      var title = selection.title || selection.text;

      if (title) {
        $selection.attr('title', title);
      }

      Utils.StoreData($selection[0], 'data', selection);

      $selections.push($selection);
    }

    var $rendered = this.$selection.find('.select2-selection__rendered');

    Utils.appendMany($rendered, $selections);
  };

  return MultipleSelection;
});

S2.define('select2/selection/placeholder',[
  '../utils'
], function (Utils) {
  function Placeholder (decorated, $element, options) {
    this.placeholder = this.normalizePlaceholder(options.get('placeholder'));

    decorated.call(this, $element, options);
  }

  Placeholder.prototype.normalizePlaceholder = function (_, placeholder) {
    if (typeof placeholder === 'string') {
      placeholder = {
        id: '',
        text: placeholder
      };
    }

    return placeholder;
  };

  Placeholder.prototype.createPlaceholder = function (decorated, placeholder) {
    var $placeholder = this.selectionContainer();

    $placeholder.html(this.display(placeholder));
    $placeholder.addClass('select2-selection__placeholder')
                .removeClass('select2-selection__choice');

    return $placeholder;
  };

  Placeholder.prototype.update = function (decorated, data) {
    var singlePlaceholder = (
      data.length == 1 && data[0].id != this.placeholder.id
    );
    var multipleSelections = data.length > 1;

    if (multipleSelections || singlePlaceholder) {
      return decorated.call(this, data);
    }

    this.clear();

    var $placeholder = this.createPlaceholder(this.placeholder);

    this.$selection.find('.select2-selection__rendered').append($placeholder);
  };

  return Placeholder;
});

S2.define('select2/selection/allowClear',[
  'jquery',
  '../keys',
  '../utils'
], function ($, KEYS, Utils) {
  function AllowClear () { }

  AllowClear.prototype.bind = function (decorated, container, $container) {
    var self = this;

    decorated.call(this, container, $container);

    if (this.placeholder == null) {
      if (this.options.get('debug') && window.console && console.error) {
        console.error(
          'Select2: The `allowClear` option should be used in combination ' +
          'with the `placeholder` option.'
        );
      }
    }

    this.$selection.on('mousedown', '.select2-selection__clear',
      function (evt) {
        self._handleClear(evt);
    });

    container.on('keypress', function (evt) {
      self._handleKeyboardClear(evt, container);
    });
  };

  AllowClear.prototype._handleClear = function (_, evt) {
    // Ignore the event if it is disabled
    if (this.isDisabled()) {
      return;
    }

    var $clear = this.$selection.find('.select2-selection__clear');

    // Ignore the event if nothing has been selected
    if ($clear.length === 0) {
      return;
    }

    evt.stopPropagation();

    var data = Utils.GetData($clear[0], 'data');

    var previousVal = this.$element.val();
    this.$element.val(this.placeholder.id);

    var unselectData = {
      data: data
    };
    this.trigger('clear', unselectData);
    if (unselectData.prevented) {
      this.$element.val(previousVal);
      return;
    }

    for (var d = 0; d < data.length; d++) {
      unselectData = {
        data: data[d]
      };

      // Trigger the `unselect` event, so people can prevent it from being
      // cleared.
      this.trigger('unselect', unselectData);

      // If the event was prevented, don't clear it out.
      if (unselectData.prevented) {
        this.$element.val(previousVal);
        return;
      }
    }

    this.$element.trigger('input').trigger('change');

    this.trigger('toggle', {});
  };

  AllowClear.prototype._handleKeyboardClear = function (_, evt, container) {
    if (container.isOpen()) {
      return;
    }

    if (evt.which == KEYS.DELETE || evt.which == KEYS.BACKSPACE) {
      this._handleClear(evt);
    }
  };

  AllowClear.prototype.update = function (decorated, data) {
    decorated.call(this, data);

    if (this.$selection.find('.select2-selection__placeholder').length > 0 ||
        data.length === 0) {
      return;
    }

    var removeAll = this.options.get('translations').get('removeAllItems');

    var $remove = $(
      '<span class="select2-selection__clear" title="' + removeAll() +'">' +
        '&times;' +
      '</span>'
    );
    Utils.StoreData($remove[0], 'data', data);

    this.$selection.find('.select2-selection__rendered').prepend($remove);
  };

  return AllowClear;
});

S2.define('select2/selection/search',[
  'jquery',
  '../utils',
  '../keys'
], function ($, Utils, KEYS) {
  function Search (decorated, $element, options) {
    decorated.call(this, $element, options);
  }

  Search.prototype.render = function (decorated) {
    var $search = $(
      '<li class="select2-search select2-search--inline">' +
        '<input class="select2-search__field" type="search" tabindex="-1"' +
        ' autocomplete="off" autocorrect="off" autocapitalize="none"' +
        ' spellcheck="false" role="searchbox" aria-autocomplete="list" />' +
      '</li>'
    );

    this.$searchContainer = $search;
    this.$search = $search.find('input');

    var $rendered = decorated.call(this);

    this._transferTabIndex();

    return $rendered;
  };

  Search.prototype.bind = function (decorated, container, $container) {
    var self = this;

    var resultsId = container.id + '-results';

    decorated.call(this, container, $container);

    container.on('open', function () {
      self.$search.attr('aria-controls', resultsId);
      self.$search.trigger('focus');
    });

    container.on('close', function () {
      self.$search.val('');
      self.$search.removeAttr('aria-controls');
      self.$search.removeAttr('aria-activedescendant');
      self.$search.trigger('focus');
    });

    container.on('enable', function () {
      self.$search.prop('disabled', false);

      self._transferTabIndex();
    });

    container.on('disable', function () {
      self.$search.prop('disabled', true);
    });

    container.on('focus', function (evt) {
      self.$search.trigger('focus');
    });

    container.on('results:focus', function (params) {
      if (params.data._resultId) {
        self.$search.attr('aria-activedescendant', params.data._resultId);
      } else {
        self.$search.removeAttr('aria-activedescendant');
      }
    });

    this.$selection.on('focusin', '.select2-search--inline', function (evt) {
      self.trigger('focus', evt);
    });

    this.$selection.on('focusout', '.select2-search--inline', function (evt) {
      self._handleBlur(evt);
    });

    this.$selection.on('keydown', '.select2-search--inline', function (evt) {
      evt.stopPropagation();

      self.trigger('keypress', evt);

      self._keyUpPrevented = evt.isDefaultPrevented();

      var key = evt.which;

      if (key === KEYS.BACKSPACE && self.$search.val() === '') {
        var $previousChoice = self.$searchContainer
          .prev('.select2-selection__choice');

        if ($previousChoice.length > 0) {
          var item = Utils.GetData($previousChoice[0], 'data');

          self.searchRemoveChoice(item);

          evt.preventDefault();
        }
      }
    });

    this.$selection.on('click', '.select2-search--inline', function (evt) {
      if (self.$search.val()) {
        evt.stopPropagation();
      }
    });

    // Try to detect the IE version should the `documentMode` property that
    // is stored on the document. This is only implemented in IE and is
    // slightly cleaner than doing a user agent check.
    // This property is not available in Edge, but Edge also doesn't have
    // this bug.
    var msie = document.documentMode;
    var disableInputEvents = msie && msie <= 11;

    // Workaround for browsers which do not support the `input` event
    // This will prevent double-triggering of events for browsers which support
    // both the `keyup` and `input` events.
    this.$selection.on(
      'input.searchcheck',
      '.select2-search--inline',
      function (evt) {
        // IE will trigger the `input` event when a placeholder is used on a
        // search box. To get around this issue, we are forced to ignore all
        // `input` events in IE and keep using `keyup`.
        if (disableInputEvents) {
          self.$selection.off('input.search input.searchcheck');
          return;
        }

        // Unbind the duplicated `keyup` event
        self.$selection.off('keyup.search');
      }
    );

    this.$selection.on(
      'keyup.search input.search',
      '.select2-search--inline',
      function (evt) {
        // IE will trigger the `input` event when a placeholder is used on a
        // search box. To get around this issue, we are forced to ignore all
        // `input` events in IE and keep using `keyup`.
        if (disableInputEvents && evt.type === 'input') {
          self.$selection.off('input.search input.searchcheck');
          return;
        }

        var key = evt.which;

        // We can freely ignore events from modifier keys
        if (key == KEYS.SHIFT || key == KEYS.CTRL || key == KEYS.ALT) {
          return;
        }

        // Tabbing will be handled during the `keydown` phase
        if (key == KEYS.TAB) {
          return;
        }

        self.handleSearch(evt);
      }
    );
  };

  /**
   * This method will transfer the tabindex attribute from the rendered
   * selection to the search box. This allows for the search box to be used as
   * the primary focus instead of the selection container.
   *
   * @private
   */
  Search.prototype._transferTabIndex = function (decorated) {
    this.$search.attr('tabindex', this.$selection.attr('tabindex'));
    this.$selection.attr('tabindex', '-1');
  };

  Search.prototype.createPlaceholder = function (decorated, placeholder) {
    this.$search.attr('placeholder', placeholder.text);
  };

  Search.prototype.update = function (decorated, data) {
    var searchHadFocus = this.$search[0] == document.activeElement;

    this.$search.attr('placeholder', '');

    decorated.call(this, data);

    this.$selection.find('.select2-selection__rendered')
                   .append(this.$searchContainer);

    this.resizeSearch();
    if (searchHadFocus) {
      this.$search.trigger('focus');
    }
  };

  Search.prototype.handleSearch = function () {
    this.resizeSearch();

    if (!this._keyUpPrevented) {
      var input = this.$search.val();

      this.trigger('query', {
        term: input
      });
    }

    this._keyUpPrevented = false;
  };

  Search.prototype.searchRemoveChoice = function (decorated, item) {
    this.trigger('unselect', {
      data: item
    });

    this.$search.val(item.text);
    this.handleSearch();
  };

  Search.prototype.resizeSearch = function () {
    this.$search.css('width', '25px');

    var width = '';

    if (this.$search.attr('placeholder') !== '') {
      width = this.$selection.find('.select2-selection__rendered').width();
    } else {
      var minimumWidth = this.$search.val().length + 1;

      width = (minimumWidth * 0.75) + 'em';
    }

    this.$search.css('width', width);
  };

  return Search;
});

S2.define('select2/selection/eventRelay',[
  'jquery'
], function ($) {
  function EventRelay () { }

  EventRelay.prototype.bind = function (decorated, container, $container) {
    var self = this;
    var relayEvents = [
      'open', 'opening',
      'close', 'closing',
      'select', 'selecting',
      'unselect', 'unselecting',
      'clear', 'clearing'
    ];

    var preventableEvents = [
      'opening', 'closing', 'selecting', 'unselecting', 'clearing'
    ];

    decorated.call(this, container, $container);

    container.on('*', function (name, params) {
      // Ignore events that should not be relayed
      if ($.inArray(name, relayEvents) === -1) {
        return;
      }

      // The parameters should always be an object
      params = params || {};

      // Generate the jQuery event for the Select2 event
      var evt = $.Event('select2:' + name, {
        params: params
      });

      self.$element.trigger(evt);

      // Only handle preventable events if it was one
      if ($.inArray(name, preventableEvents) === -1) {
        return;
      }

      params.prevented = evt.isDefaultPrevented();
    });
  };

  return EventRelay;
});

S2.define('select2/translation',[
  'jquery',
  'require'
], function ($, require) {
  function Translation (dict) {
    this.dict = dict || {};
  }

  Translation.prototype.all = function () {
    return this.dict;
  };

  Translation.prototype.get = function (key) {
    return this.dict[key];
  };

  Translation.prototype.extend = function (translation) {
    this.dict = $.extend({}, translation.all(), this.dict);
  };

  // Static functions

  Translation._cache = {};

  Translation.loadPath = function (path) {
    if (!(path in Translation._cache)) {
      var translations = require(path);

      Translation._cache[path] = translations;
    }

    return new Translation(Translation._cache[path]);
  };

  return Translation;
});

S2.define('select2/diacritics',[

], function () {
  var diacritics = {
    '\u24B6': 'A',
    '\uFF21': 'A',
    '\u00C0': 'A',
    '\u00C1': 'A',
    '\u00C2': 'A',
    '\u1EA6': 'A',
    '\u1EA4': 'A',
    '\u1EAA': 'A',
    '\u1EA8': 'A',
    '\u00C3': 'A',
    '\u0100': 'A',
    '\u0102': 'A',
    '\u1EB0': 'A',
    '\u1EAE': 'A',
    '\u1EB4': 'A',
    '\u1EB2': 'A',
    '\u0226': 'A',
    '\u01E0': 'A',
    '\u00C4': 'A',
    '\u01DE': 'A',
    '\u1EA2': 'A',
    '\u00C5': 'A',
    '\u01FA': 'A',
    '\u01CD': 'A',
    '\u0200': 'A',
    '\u0202': 'A',
    '\u1EA0': 'A',
    '\u1EAC': 'A',
    '\u1EB6': 'A',
    '\u1E00': 'A',
    '\u0104': 'A',
    '\u023A': 'A',
    '\u2C6F': 'A',
    '\uA732': 'AA',
    '\u00C6': 'AE',
    '\u01FC': 'AE',
    '\u01E2': 'AE',
    '\uA734': 'AO',
    '\uA736': 'AU',
    '\uA738': 'AV',
    '\uA73A': 'AV',
    '\uA73C': 'AY',
    '\u24B7': 'B',
    '\uFF22': 'B',
    '\u1E02': 'B',
    '\u1E04': 'B',
    '\u1E06': 'B',
    '\u0243': 'B',
    '\u0182': 'B',
    '\u0181': 'B',
    '\u24B8': 'C',
    '\uFF23': 'C',
    '\u0106': 'C',
    '\u0108': 'C',
    '\u010A': 'C',
    '\u010C': 'C',
    '\u00C7': 'C',
    '\u1E08': 'C',
    '\u0187': 'C',
    '\u023B': 'C',
    '\uA73E': 'C',
    '\u24B9': 'D',
    '\uFF24': 'D',
    '\u1E0A': 'D',
    '\u010E': 'D',
    '\u1E0C': 'D',
    '\u1E10': 'D',
    '\u1E12': 'D',
    '\u1E0E': 'D',
    '\u0110': 'D',
    '\u018B': 'D',
    '\u018A': 'D',
    '\u0189': 'D',
    '\uA779': 'D',
    '\u01F1': 'DZ',
    '\u01C4': 'DZ',
    '\u01F2': 'Dz',
    '\u01C5': 'Dz',
    '\u24BA': 'E',
    '\uFF25': 'E',
    '\u00C8': 'E',
    '\u00C9': 'E',
    '\u00CA': 'E',
    '\u1EC0': 'E',
    '\u1EBE': 'E',
    '\u1EC4': 'E',
    '\u1EC2': 'E',
    '\u1EBC': 'E',
    '\u0112': 'E',
    '\u1E14': 'E',
    '\u1E16': 'E',
    '\u0114': 'E',
    '\u0116': 'E',
    '\u00CB': 'E',
    '\u1EBA': 'E',
    '\u011A': 'E',
    '\u0204': 'E',
    '\u0206': 'E',
    '\u1EB8': 'E',
    '\u1EC6': 'E',
    '\u0228': 'E',
    '\u1E1C': 'E',
    '\u0118': 'E',
    '\u1E18': 'E',
    '\u1E1A': 'E',
    '\u0190': 'E',
    '\u018E': 'E',
    '\u24BB': 'F',
    '\uFF26': 'F',
    '\u1E1E': 'F',
    '\u0191': 'F',
    '\uA77B': 'F',
    '\u24BC': 'G',
    '\uFF27': 'G',
    '\u01F4': 'G',
    '\u011C': 'G',
    '\u1E20': 'G',
    '\u011E': 'G',
    '\u0120': 'G',
    '\u01E6': 'G',
    '\u0122': 'G',
    '\u01E4': 'G',
    '\u0193': 'G',
    '\uA7A0': 'G',
    '\uA77D': 'G',
    '\uA77E': 'G',
    '\u24BD': 'H',
    '\uFF28': 'H',
    '\u0124': 'H',
    '\u1E22': 'H',
    '\u1E26': 'H',
    '\u021E': 'H',
    '\u1E24': 'H',
    '\u1E28': 'H',
    '\u1E2A': 'H',
    '\u0126': 'H',
    '\u2C67': 'H',
    '\u2C75': 'H',
    '\uA78D': 'H',
    '\u24BE': 'I',
    '\uFF29': 'I',
    '\u00CC': 'I',
    '\u00CD': 'I',
    '\u00CE': 'I',
    '\u0128': 'I',
    '\u012A': 'I',
    '\u012C': 'I',
    '\u0130': 'I',
    '\u00CF': 'I',
    '\u1E2E': 'I',
    '\u1EC8': 'I',
    '\u01CF': 'I',
    '\u0208': 'I',
    '\u020A': 'I',
    '\u1ECA': 'I',
    '\u012E': 'I',
    '\u1E2C': 'I',
    '\u0197': 'I',
    '\u24BF': 'J',
    '\uFF2A': 'J',
    '\u0134': 'J',
    '\u0248': 'J',
    '\u24C0': 'K',
    '\uFF2B': 'K',
    '\u1E30': 'K',
    '\u01E8': 'K',
    '\u1E32': 'K',
    '\u0136': 'K',
    '\u1E34': 'K',
    '\u0198': 'K',
    '\u2C69': 'K',
    '\uA740': 'K',
    '\uA742': 'K',
    '\uA744': 'K',
    '\uA7A2': 'K',
    '\u24C1': 'L',
    '\uFF2C': 'L',
    '\u013F': 'L',
    '\u0139': 'L',
    '\u013D': 'L',
    '\u1E36': 'L',
    '\u1E38': 'L',
    '\u013B': 'L',
    '\u1E3C': 'L',
    '\u1E3A': 'L',
    '\u0141': 'L',
    '\u023D': 'L',
    '\u2C62': 'L',
    '\u2C60': 'L',
    '\uA748': 'L',
    '\uA746': 'L',
    '\uA780': 'L',
    '\u01C7': 'LJ',
    '\u01C8': 'Lj',
    '\u24C2': 'M',
    '\uFF2D': 'M',
    '\u1E3E': 'M',
    '\u1E40': 'M',
    '\u1E42': 'M',
    '\u2C6E': 'M',
    '\u019C': 'M',
    '\u24C3': 'N',
    '\uFF2E': 'N',
    '\u01F8': 'N',
    '\u0143': 'N',
    '\u00D1': 'N',
    '\u1E44': 'N',
    '\u0147': 'N',
    '\u1E46': 'N',
    '\u0145': 'N',
    '\u1E4A': 'N',
    '\u1E48': 'N',
    '\u0220': 'N',
    '\u019D': 'N',
    '\uA790': 'N',
    '\uA7A4': 'N',
    '\u01CA': 'NJ',
    '\u01CB': 'Nj',
    '\u24C4': 'O',
    '\uFF2F': 'O',
    '\u00D2': 'O',
    '\u00D3': 'O',
    '\u00D4': 'O',
    '\u1ED2': 'O',
    '\u1ED0': 'O',
    '\u1ED6': 'O',
    '\u1ED4': 'O',
    '\u00D5': 'O',
    '\u1E4C': 'O',
    '\u022C': 'O',
    '\u1E4E': 'O',
    '\u014C': 'O',
    '\u1E50': 'O',
    '\u1E52': 'O',
    '\u014E': 'O',
    '\u022E': 'O',
    '\u0230': 'O',
    '\u00D6': 'O',
    '\u022A': 'O',
    '\u1ECE': 'O',
    '\u0150': 'O',
    '\u01D1': 'O',
    '\u020C': 'O',
    '\u020E': 'O',
    '\u01A0': 'O',
    '\u1EDC': 'O',
    '\u1EDA': 'O',
    '\u1EE0': 'O',
    '\u1EDE': 'O',
    '\u1EE2': 'O',
    '\u1ECC': 'O',
    '\u1ED8': 'O',
    '\u01EA': 'O',
    '\u01EC': 'O',
    '\u00D8': 'O',
    '\u01FE': 'O',
    '\u0186': 'O',
    '\u019F': 'O',
    '\uA74A': 'O',
    '\uA74C': 'O',
    '\u0152': 'OE',
    '\u01A2': 'OI',
    '\uA74E': 'OO',
    '\u0222': 'OU',
    '\u24C5': 'P',
    '\uFF30': 'P',
    '\u1E54': 'P',
    '\u1E56': 'P',
    '\u01A4': 'P',
    '\u2C63': 'P',
    '\uA750': 'P',
    '\uA752': 'P',
    '\uA754': 'P',
    '\u24C6': 'Q',
    '\uFF31': 'Q',
    '\uA756': 'Q',
    '\uA758': 'Q',
    '\u024A': 'Q',
    '\u24C7': 'R',
    '\uFF32': 'R',
    '\u0154': 'R',
    '\u1E58': 'R',
    '\u0158': 'R',
    '\u0210': 'R',
    '\u0212': 'R',
    '\u1E5A': 'R',
    '\u1E5C': 'R',
    '\u0156': 'R',
    '\u1E5E': 'R',
    '\u024C': 'R',
    '\u2C64': 'R',
    '\uA75A': 'R',
    '\uA7A6': 'R',
    '\uA782': 'R',
    '\u24C8': 'S',
    '\uFF33': 'S',
    '\u1E9E': 'S',
    '\u015A': 'S',
    '\u1E64': 'S',
    '\u015C': 'S',
    '\u1E60': 'S',
    '\u0160': 'S',
    '\u1E66': 'S',
    '\u1E62': 'S',
    '\u1E68': 'S',
    '\u0218': 'S',
    '\u015E': 'S',
    '\u2C7E': 'S',
    '\uA7A8': 'S',
    '\uA784': 'S',
    '\u24C9': 'T',
    '\uFF34': 'T',
    '\u1E6A': 'T',
    '\u0164': 'T',
    '\u1E6C': 'T',
    '\u021A': 'T',
    '\u0162': 'T',
    '\u1E70': 'T',
    '\u1E6E': 'T',
    '\u0166': 'T',
    '\u01AC': 'T',
    '\u01AE': 'T',
    '\u023E': 'T',
    '\uA786': 'T',
    '\uA728': 'TZ',
    '\u24CA': 'U',
    '\uFF35': 'U',
    '\u00D9': 'U',
    '\u00DA': 'U',
    '\u00DB': 'U',
    '\u0168': 'U',
    '\u1E78': 'U',
    '\u016A': 'U',
    '\u1E7A': 'U',
    '\u016C': 'U',
    '\u00DC': 'U',
    '\u01DB': 'U',
    '\u01D7': 'U',
    '\u01D5': 'U',
    '\u01D9': 'U',
    '\u1EE6': 'U',
    '\u016E': 'U',
    '\u0170': 'U',
    '\u01D3': 'U',
    '\u0214': 'U',
    '\u0216': 'U',
    '\u01AF': 'U',
    '\u1EEA': 'U',
    '\u1EE8': 'U',
    '\u1EEE': 'U',
    '\u1EEC': 'U',
    '\u1EF0': 'U',
    '\u1EE4': 'U',
    '\u1E72': 'U',
    '\u0172': 'U',
    '\u1E76': 'U',
    '\u1E74': 'U',
    '\u0244': 'U',
    '\u24CB': 'V',
    '\uFF36': 'V',
    '\u1E7C': 'V',
    '\u1E7E': 'V',
    '\u01B2': 'V',
    '\uA75E': 'V',
    '\u0245': 'V',
    '\uA760': 'VY',
    '\u24CC': 'W',
    '\uFF37': 'W',
    '\u1E80': 'W',
    '\u1E82': 'W',
    '\u0174': 'W',
    '\u1E86': 'W',
    '\u1E84': 'W',
    '\u1E88': 'W',
    '\u2C72': 'W',
    '\u24CD': 'X',
    '\uFF38': 'X',
    '\u1E8A': 'X',
    '\u1E8C': 'X',
    '\u24CE': 'Y',
    '\uFF39': 'Y',
    '\u1EF2': 'Y',
    '\u00DD': 'Y',
    '\u0176': 'Y',
    '\u1EF8': 'Y',
    '\u0232': 'Y',
    '\u1E8E': 'Y',
    '\u0178': 'Y',
    '\u1EF6': 'Y',
    '\u1EF4': 'Y',
    '\u01B3': 'Y',
    '\u024E': 'Y',
    '\u1EFE': 'Y',
    '\u24CF': 'Z',
    '\uFF3A': 'Z',
    '\u0179': 'Z',
    '\u1E90': 'Z',
    '\u017B': 'Z',
    '\u017D': 'Z',
    '\u1E92': 'Z',
    '\u1E94': 'Z',
    '\u01B5': 'Z',
    '\u0224': 'Z',
    '\u2C7F': 'Z',
    '\u2C6B': 'Z',
    '\uA762': 'Z',
    '\u24D0': 'a',
    '\uFF41': 'a',
    '\u1E9A': 'a',
    '\u00E0': 'a',
    '\u00E1': 'a',
    '\u00E2': 'a',
    '\u1EA7': 'a',
    '\u1EA5': 'a',
    '\u1EAB': 'a',
    '\u1EA9': 'a',
    '\u00E3': 'a',
    '\u0101': 'a',
    '\u0103': 'a',
    '\u1EB1': 'a',
    '\u1EAF': 'a',
    '\u1EB5': 'a',
    '\u1EB3': 'a',
    '\u0227': 'a',
    '\u01E1': 'a',
    '\u00E4': 'a',
    '\u01DF': 'a',
    '\u1EA3': 'a',
    '\u00E5': 'a',
    '\u01FB': 'a',
    '\u01CE': 'a',
    '\u0201': 'a',
    '\u0203': 'a',
    '\u1EA1': 'a',
    '\u1EAD': 'a',
    '\u1EB7': 'a',
    '\u1E01': 'a',
    '\u0105': 'a',
    '\u2C65': 'a',
    '\u0250': 'a',
    '\uA733': 'aa',
    '\u00E6': 'ae',
    '\u01FD': 'ae',
    '\u01E3': 'ae',
    '\uA735': 'ao',
    '\uA737': 'au',
    '\uA739': 'av',
    '\uA73B': 'av',
    '\uA73D': 'ay',
    '\u24D1': 'b',
    '\uFF42': 'b',
    '\u1E03': 'b',
    '\u1E05': 'b',
    '\u1E07': 'b',
    '\u0180': 'b',
    '\u0183': 'b',
    '\u0253': 'b',
    '\u24D2': 'c',
    '\uFF43': 'c',
    '\u0107': 'c',
    '\u0109': 'c',
    '\u010B': 'c',
    '\u010D': 'c',
    '\u00E7': 'c',
    '\u1E09': 'c',
    '\u0188': 'c',
    '\u023C': 'c',
    '\uA73F': 'c',
    '\u2184': 'c',
    '\u24D3': 'd',
    '\uFF44': 'd',
    '\u1E0B': 'd',
    '\u010F': 'd',
    '\u1E0D': 'd',
    '\u1E11': 'd',
    '\u1E13': 'd',
    '\u1E0F': 'd',
    '\u0111': 'd',
    '\u018C': 'd',
    '\u0256': 'd',
    '\u0257': 'd',
    '\uA77A': 'd',
    '\u01F3': 'dz',
    '\u01C6': 'dz',
    '\u24D4': 'e',
    '\uFF45': 'e',
    '\u00E8': 'e',
    '\u00E9': 'e',
    '\u00EA': 'e',
    '\u1EC1': 'e',
    '\u1EBF': 'e',
    '\u1EC5': 'e',
    '\u1EC3': 'e',
    '\u1EBD': 'e',
    '\u0113': 'e',
    '\u1E15': 'e',
    '\u1E17': 'e',
    '\u0115': 'e',
    '\u0117': 'e',
    '\u00EB': 'e',
    '\u1EBB': 'e',
    '\u011B': 'e',
    '\u0205': 'e',
    '\u0207': 'e',
    '\u1EB9': 'e',
    '\u1EC7': 'e',
    '\u0229': 'e',
    '\u1E1D': 'e',
    '\u0119': 'e',
    '\u1E19': 'e',
    '\u1E1B': 'e',
    '\u0247': 'e',
    '\u025B': 'e',
    '\u01DD': 'e',
    '\u24D5': 'f',
    '\uFF46': 'f',
    '\u1E1F': 'f',
    '\u0192': 'f',
    '\uA77C': 'f',
    '\u24D6': 'g',
    '\uFF47': 'g',
    '\u01F5': 'g',
    '\u011D': 'g',
    '\u1E21': 'g',
    '\u011F': 'g',
    '\u0121': 'g',
    '\u01E7': 'g',
    '\u0123': 'g',
    '\u01E5': 'g',
    '\u0260': 'g',
    '\uA7A1': 'g',
    '\u1D79': 'g',
    '\uA77F': 'g',
    '\u24D7': 'h',
    '\uFF48': 'h',
    '\u0125': 'h',
    '\u1E23': 'h',
    '\u1E27': 'h',
    '\u021F': 'h',
    '\u1E25': 'h',
    '\u1E29': 'h',
    '\u1E2B': 'h',
    '\u1E96': 'h',
    '\u0127': 'h',
    '\u2C68': 'h',
    '\u2C76': 'h',
    '\u0265': 'h',
    '\u0195': 'hv',
    '\u24D8': 'i',
    '\uFF49': 'i',
    '\u00EC': 'i',
    '\u00ED': 'i',
    '\u00EE': 'i',
    '\u0129': 'i',
    '\u012B': 'i',
    '\u012D': 'i',
    '\u00EF': 'i',
    '\u1E2F': 'i',
    '\u1EC9': 'i',
    '\u01D0': 'i',
    '\u0209': 'i',
    '\u020B': 'i',
    '\u1ECB': 'i',
    '\u012F': 'i',
    '\u1E2D': 'i',
    '\u0268': 'i',
    '\u0131': 'i',
    '\u24D9': 'j',
    '\uFF4A': 'j',
    '\u0135': 'j',
    '\u01F0': 'j',
    '\u0249': 'j',
    '\u24DA': 'k',
    '\uFF4B': 'k',
    '\u1E31': 'k',
    '\u01E9': 'k',
    '\u1E33': 'k',
    '\u0137': 'k',
    '\u1E35': 'k',
    '\u0199': 'k',
    '\u2C6A': 'k',
    '\uA741': 'k',
    '\uA743': 'k',
    '\uA745': 'k',
    '\uA7A3': 'k',
    '\u24DB': 'l',
    '\uFF4C': 'l',
    '\u0140': 'l',
    '\u013A': 'l',
    '\u013E': 'l',
    '\u1E37': 'l',
    '\u1E39': 'l',
    '\u013C': 'l',
    '\u1E3D': 'l',
    '\u1E3B': 'l',
    '\u017F': 'l',
    '\u0142': 'l',
    '\u019A': 'l',
    '\u026B': 'l',
    '\u2C61': 'l',
    '\uA749': 'l',
    '\uA781': 'l',
    '\uA747': 'l',
    '\u01C9': 'lj',
    '\u24DC': 'm',
    '\uFF4D': 'm',
    '\u1E3F': 'm',
    '\u1E41': 'm',
    '\u1E43': 'm',
    '\u0271': 'm',
    '\u026F': 'm',
    '\u24DD': 'n',
    '\uFF4E': 'n',
    '\u01F9': 'n',
    '\u0144': 'n',
    '\u00F1': 'n',
    '\u1E45': 'n',
    '\u0148': 'n',
    '\u1E47': 'n',
    '\u0146': 'n',
    '\u1E4B': 'n',
    '\u1E49': 'n',
    '\u019E': 'n',
    '\u0272': 'n',
    '\u0149': 'n',
    '\uA791': 'n',
    '\uA7A5': 'n',
    '\u01CC': 'nj',
    '\u24DE': 'o',
    '\uFF4F': 'o',
    '\u00F2': 'o',
    '\u00F3': 'o',
    '\u00F4': 'o',
    '\u1ED3': 'o',
    '\u1ED1': 'o',
    '\u1ED7': 'o',
    '\u1ED5': 'o',
    '\u00F5': 'o',
    '\u1E4D': 'o',
    '\u022D': 'o',
    '\u1E4F': 'o',
    '\u014D': 'o',
    '\u1E51': 'o',
    '\u1E53': 'o',
    '\u014F': 'o',
    '\u022F': 'o',
    '\u0231': 'o',
    '\u00F6': 'o',
    '\u022B': 'o',
    '\u1ECF': 'o',
    '\u0151': 'o',
    '\u01D2': 'o',
    '\u020D': 'o',
    '\u020F': 'o',
    '\u01A1': 'o',
    '\u1EDD': 'o',
    '\u1EDB': 'o',
    '\u1EE1': 'o',
    '\u1EDF': 'o',
    '\u1EE3': 'o',
    '\u1ECD': 'o',
    '\u1ED9': 'o',
    '\u01EB': 'o',
    '\u01ED': 'o',
    '\u00F8': 'o',
    '\u01FF': 'o',
    '\u0254': 'o',
    '\uA74B': 'o',
    '\uA74D': 'o',
    '\u0275': 'o',
    '\u0153': 'oe',
    '\u01A3': 'oi',
    '\u0223': 'ou',
    '\uA74F': 'oo',
    '\u24DF': 'p',
    '\uFF50': 'p',
    '\u1E55': 'p',
    '\u1E57': 'p',
    '\u01A5': 'p',
    '\u1D7D': 'p',
    '\uA751': 'p',
    '\uA753': 'p',
    '\uA755': 'p',
    '\u24E0': 'q',
    '\uFF51': 'q',
    '\u024B': 'q',
    '\uA757': 'q',
    '\uA759': 'q',
    '\u24E1': 'r',
    '\uFF52': 'r',
    '\u0155': 'r',
    '\u1E59': 'r',
    '\u0159': 'r',
    '\u0211': 'r',
    '\u0213': 'r',
    '\u1E5B': 'r',
    '\u1E5D': 'r',
    '\u0157': 'r',
    '\u1E5F': 'r',
    '\u024D': 'r',
    '\u027D': 'r',
    '\uA75B': 'r',
    '\uA7A7': 'r',
    '\uA783': 'r',
    '\u24E2': 's',
    '\uFF53': 's',
    '\u00DF': 's',
    '\u015B': 's',
    '\u1E65': 's',
    '\u015D': 's',
    '\u1E61': 's',
    '\u0161': 's',
    '\u1E67': 's',
    '\u1E63': 's',
    '\u1E69': 's',
    '\u0219': 's',
    '\u015F': 's',
    '\u023F': 's',
    '\uA7A9': 's',
    '\uA785': 's',
    '\u1E9B': 's',
    '\u24E3': 't',
    '\uFF54': 't',
    '\u1E6B': 't',
    '\u1E97': 't',
    '\u0165': 't',
    '\u1E6D': 't',
    '\u021B': 't',
    '\u0163': 't',
    '\u1E71': 't',
    '\u1E6F': 't',
    '\u0167': 't',
    '\u01AD': 't',
    '\u0288': 't',
    '\u2C66': 't',
    '\uA787': 't',
    '\uA729': 'tz',
    '\u24E4': 'u',
    '\uFF55': 'u',
    '\u00F9': 'u',
    '\u00FA': 'u',
    '\u00FB': 'u',
    '\u0169': 'u',
    '\u1E79': 'u',
    '\u016B': 'u',
    '\u1E7B': 'u',
    '\u016D': 'u',
    '\u00FC': 'u',
    '\u01DC': 'u',
    '\u01D8': 'u',
    '\u01D6': 'u',
    '\u01DA': 'u',
    '\u1EE7': 'u',
    '\u016F': 'u',
    '\u0171': 'u',
    '\u01D4': 'u',
    '\u0215': 'u',
    '\u0217': 'u',
    '\u01B0': 'u',
    '\u1EEB': 'u',
    '\u1EE9': 'u',
    '\u1EEF': 'u',
    '\u1EED': 'u',
    '\u1EF1': 'u',
    '\u1EE5': 'u',
    '\u1E73': 'u',
    '\u0173': 'u',
    '\u1E77': 'u',
    '\u1E75': 'u',
    '\u0289': 'u',
    '\u24E5': 'v',
    '\uFF56': 'v',
    '\u1E7D': 'v',
    '\u1E7F': 'v',
    '\u028B': 'v',
    '\uA75F': 'v',
    '\u028C': 'v',
    '\uA761': 'vy',
    '\u24E6': 'w',
    '\uFF57': 'w',
    '\u1E81': 'w',
    '\u1E83': 'w',
    '\u0175': 'w',
    '\u1E87': 'w',
    '\u1E85': 'w',
    '\u1E98': 'w',
    '\u1E89': 'w',
    '\u2C73': 'w',
    '\u24E7': 'x',
    '\uFF58': 'x',
    '\u1E8B': 'x',
    '\u1E8D': 'x',
    '\u24E8': 'y',
    '\uFF59': 'y',
    '\u1EF3': 'y',
    '\u00FD': 'y',
    '\u0177': 'y',
    '\u1EF9': 'y',
    '\u0233': 'y',
    '\u1E8F': 'y',
    '\u00FF': 'y',
    '\u1EF7': 'y',
    '\u1E99': 'y',
    '\u1EF5': 'y',
    '\u01B4': 'y',
    '\u024F': 'y',
    '\u1EFF': 'y',
    '\u24E9': 'z',
    '\uFF5A': 'z',
    '\u017A': 'z',
    '\u1E91': 'z',
    '\u017C': 'z',
    '\u017E': 'z',
    '\u1E93': 'z',
    '\u1E95': 'z',
    '\u01B6': 'z',
    '\u0225': 'z',
    '\u0240': 'z',
    '\u2C6C': 'z',
    '\uA763': 'z',
    '\u0386': '\u0391',
    '\u0388': '\u0395',
    '\u0389': '\u0397',
    '\u038A': '\u0399',
    '\u03AA': '\u0399',
    '\u038C': '\u039F',
    '\u038E': '\u03A5',
    '\u03AB': '\u03A5',
    '\u038F': '\u03A9',
    '\u03AC': '\u03B1',
    '\u03AD': '\u03B5',
    '\u03AE': '\u03B7',
    '\u03AF': '\u03B9',
    '\u03CA': '\u03B9',
    '\u0390': '\u03B9',
    '\u03CC': '\u03BF',
    '\u03CD': '\u03C5',
    '\u03CB': '\u03C5',
    '\u03B0': '\u03C5',
    '\u03CE': '\u03C9',
    '\u03C2': '\u03C3',
    '\u2019': '\''
  };

  return diacritics;
});

S2.define('select2/data/base',[
  '../utils'
], function (Utils) {
  function BaseAdapter ($element, options) {
    BaseAdapter.__super__.constructor.call(this);
  }

  Utils.Extend(BaseAdapter, Utils.Observable);

  BaseAdapter.prototype.current = function (callback) {
    throw new Error('The `current` method must be defined in child classes.');
  };

  BaseAdapter.prototype.query = function (params, callback) {
    throw new Error('The `query` method must be defined in child classes.');
  };

  BaseAdapter.prototype.bind = function (container, $container) {
    // Can be implemented in subclasses
  };

  BaseAdapter.prototype.destroy = function () {
    // Can be implemented in subclasses
  };

  BaseAdapter.prototype.generateResultId = function (container, data) {
    var id = container.id + '-result-';

    id += Utils.generateChars(4);

    if (data.id != null) {
      id += '-' + data.id.toString();
    } else {
      id += '-' + Utils.generateChars(4);
    }
    return id;
  };

  return BaseAdapter;
});

S2.define('select2/data/select',[
  './base',
  '../utils',
  'jquery'
], function (BaseAdapter, Utils, $) {
  function SelectAdapter ($element, options) {
    this.$element = $element;
    this.options = options;

    SelectAdapter.__super__.constructor.call(this);
  }

  Utils.Extend(SelectAdapter, BaseAdapter);

  SelectAdapter.prototype.current = function (callback) {
    var data = [];
    var self = this;

    this.$element.find(':selected').each(function () {
      var $option = $(this);

      var option = self.item($option);

      data.push(option);
    });

    callback(data);
  };

  SelectAdapter.prototype.select = function (data) {
    var self = this;

    data.selected = true;

    // If data.element is a DOM node, use it instead
    if ($(data.element).is('option')) {
      data.element.selected = true;

      this.$element.trigger('input').trigger('change');

      return;
    }

    if (this.$element.prop('multiple')) {
      this.current(function (currentData) {
        var val = [];

        data = [data];
        data.push.apply(data, currentData);

        for (var d = 0; d < data.length; d++) {
          var id = data[d].id;

          if ($.inArray(id, val) === -1) {
            val.push(id);
          }
        }

        self.$element.val(val);
        self.$element.trigger('input').trigger('change');
      });
    } else {
      var val = data.id;

      this.$element.val(val);
      this.$element.trigger('input').trigger('change');
    }
  };

  SelectAdapter.prototype.unselect = function (data) {
    var self = this;

    if (!this.$element.prop('multiple')) {
      return;
    }

    data.selected = false;

    if ($(data.element).is('option')) {
      data.element.selected = false;

      this.$element.trigger('input').trigger('change');

      return;
    }

    this.current(function (currentData) {
      var val = [];

      for (var d = 0; d < currentData.length; d++) {
        var id = currentData[d].id;

        if (id !== data.id && $.inArray(id, val) === -1) {
          val.push(id);
        }
      }

      self.$element.val(val);

      self.$element.trigger('input').trigger('change');
    });
  };

  SelectAdapter.prototype.bind = function (container, $container) {
    var self = this;

    this.container = container;

    container.on('select', function (params) {
      self.select(params.data);
    });

    container.on('unselect', function (params) {
      self.unselect(params.data);
    });
  };

  SelectAdapter.prototype.destroy = function () {
    // Remove anything added to child elements
    this.$element.find('*').each(function () {
      // Remove any custom data set by Select2
      Utils.RemoveData(this);
    });
  };

  SelectAdapter.prototype.query = function (params, callback) {
    var data = [];
    var self = this;

    var $options = this.$element.children();

    $options.each(function () {
      var $option = $(this);

      if (!$option.is('option') && !$option.is('optgroup')) {
        return;
      }

      var option = self.item($option);

      var matches = self.matches(params, option);

      if (matches !== null) {
        data.push(matches);
      }
    });

    callback({
      results: data
    });
  };

  SelectAdapter.prototype.addOptions = function ($options) {
    Utils.appendMany(this.$element, $options);
  };

  SelectAdapter.prototype.option = function (data) {
    var option;

    if (data.children) {
      option = document.createElement('optgroup');
      option.label = data.text;
    } else {
      option = document.createElement('option');

      if (option.textContent !== undefined) {
        option.textContent = data.text;
      } else {
        option.innerText = data.text;
      }
    }

    if (data.id !== undefined) {
      option.value = data.id;
    }

    if (data.disabled) {
      option.disabled = true;
    }

    if (data.selected) {
      option.selected = true;
    }

    if (data.title) {
      option.title = data.title;
    }

    var $option = $(option);

    var normalizedData = this._normalizeItem(data);
    normalizedData.element = option;

    // Override the option's data with the combined data
    Utils.StoreData(option, 'data', normalizedData);

    return $option;
  };

  SelectAdapter.prototype.item = function ($option) {
    var data = {};

    data = Utils.GetData($option[0], 'data');

    if (data != null) {
      return data;
    }

    if ($option.is('option')) {
      data = {
        id: $option.val(),
        text: $option.text(),
        disabled: $option.prop('disabled'),
        selected: $option.prop('selected'),
        title: $option.prop('title')
      };
    } else if ($option.is('optgroup')) {
      data = {
        text: $option.prop('label'),
        children: [],
        title: $option.prop('title')
      };

      var $children = $option.children('option');
      var children = [];

      for (var c = 0; c < $children.length; c++) {
        var $child = $($children[c]);

        var child = this.item($child);

        children.push(child);
      }

      data.children = children;
    }

    data = this._normalizeItem(data);
    data.element = $option[0];

    Utils.StoreData($option[0], 'data', data);

    return data;
  };

  SelectAdapter.prototype._normalizeItem = function (item) {
    if (item !== Object(item)) {
      item = {
        id: item,
        text: item
      };
    }

    item = $.extend({}, {
      text: ''
    }, item);

    var defaults = {
      selected: false,
      disabled: false
    };

    if (item.id != null) {
      item.id = item.id.toString();
    }

    if (item.text != null) {
      item.text = item.text.toString();
    }

    if (item._resultId == null && item.id && this.container != null) {
      item._resultId = this.generateResultId(this.container, item);
    }

    return $.extend({}, defaults, item);
  };

  SelectAdapter.prototype.matches = function (params, data) {
    var matcher = this.options.get('matcher');

    return matcher(params, data);
  };

  return SelectAdapter;
});

S2.define('select2/data/array',[
  './select',
  '../utils',
  'jquery'
], function (SelectAdapter, Utils, $) {
  function ArrayAdapter ($element, options) {
    this._dataToConvert = options.get('data') || [];

    ArrayAdapter.__super__.constructor.call(this, $element, options);
  }

  Utils.Extend(ArrayAdapter, SelectAdapter);

  ArrayAdapter.prototype.bind = function (container, $container) {
    ArrayAdapter.__super__.bind.call(this, container, $container);

    this.addOptions(this.convertToOptions(this._dataToConvert));
  };

  ArrayAdapter.prototype.select = function (data) {
    var $option = this.$element.find('option').filter(function (i, elm) {
      return elm.value == data.id.toString();
    });

    if ($option.length === 0) {
      $option = this.option(data);

      this.addOptions($option);
    }

    ArrayAdapter.__super__.select.call(this, data);
  };

  ArrayAdapter.prototype.convertToOptions = function (data) {
    var self = this;

    var $existing = this.$element.find('option');
    var existingIds = $existing.map(function () {
      return self.item($(this)).id;
    }).get();

    var $options = [];

    // Filter out all items except for the one passed in the argument
    function onlyItem (item) {
      return function () {
        return $(this).val() == item.id;
      };
    }

    for (var d = 0; d < data.length; d++) {
      var item = this._normalizeItem(data[d]);

      // Skip items which were pre-loaded, only merge the data
      if ($.inArray(item.id, existingIds) >= 0) {
        var $existingOption = $existing.filter(onlyItem(item));

        var existingData = this.item($existingOption);
        var newData = $.extend(true, {}, item, existingData);

        var $newOption = this.option(newData);

        $existingOption.replaceWith($newOption);

        continue;
      }

      var $option = this.option(item);

      if (item.children) {
        var $children = this.convertToOptions(item.children);

        Utils.appendMany($option, $children);
      }

      $options.push($option);
    }

    return $options;
  };

  return ArrayAdapter;
});

S2.define('select2/data/ajax',[
  './array',
  '../utils',
  'jquery'
], function (ArrayAdapter, Utils, $) {
  function AjaxAdapter ($element, options) {
    this.ajaxOptions = this._applyDefaults(options.get('ajax'));

    if (this.ajaxOptions.processResults != null) {
      this.processResults = this.ajaxOptions.processResults;
    }

    AjaxAdapter.__super__.constructor.call(this, $element, options);
  }

  Utils.Extend(AjaxAdapter, ArrayAdapter);

  AjaxAdapter.prototype._applyDefaults = function (options) {
    var defaults = {
      data: function (params) {
        return $.extend({}, params, {
          q: params.term
        });
      },
      transport: function (params, success, failure) {
        var $request = $.ajax(params);

        $request.then(success);
        $request.fail(failure);

        return $request;
      }
    };

    return $.extend({}, defaults, options, true);
  };

  AjaxAdapter.prototype.processResults = function (results) {
    return results;
  };

  AjaxAdapter.prototype.query = function (params, callback) {
    var matches = [];
    var self = this;

    if (this._request != null) {
      // JSONP requests cannot always be aborted
      if ($.isFunction(this._request.abort)) {
        this._request.abort();
      }

      this._request = null;
    }

    var options = $.extend({
      type: 'GET'
    }, this.ajaxOptions);

    if (typeof options.url === 'function') {
      options.url = options.url.call(this.$element, params);
    }

    if (typeof options.data === 'function') {
      options.data = options.data.call(this.$element, params);
    }

    function request () {
      var $request = options.transport(options, function (data) {
        var results = self.processResults(data, params);

        if (self.options.get('debug') && window.console && console.error) {
          // Check to make sure that the response included a `results` key.
          if (!results || !results.results || !$.isArray(results.results)) {
            console.error(
              'Select2: The AJAX results did not return an array in the ' +
              '`results` key of the response.'
            );
          }
        }

        callback(results);
      }, function () {
        // Attempt to detect if a request was aborted
        // Only works if the transport exposes a status property
        if ('status' in $request &&
            ($request.status === 0 || $request.status === '0')) {
          return;
        }

        self.trigger('results:message', {
          message: 'errorLoading'
        });
      });

      self._request = $request;
    }

    if (this.ajaxOptions.delay && params.term != null) {
      if (this._queryTimeout) {
        window.clearTimeout(this._queryTimeout);
      }

      this._queryTimeout = window.setTimeout(request, this.ajaxOptions.delay);
    } else {
      request();
    }
  };

  return AjaxAdapter;
});

S2.define('select2/data/tags',[
  'jquery'
], function ($) {
  function Tags (decorated, $element, options) {
    var tags = options.get('tags');

    var createTag = options.get('createTag');

    if (createTag !== undefined) {
      this.createTag = createTag;
    }

    var insertTag = options.get('insertTag');

    if (insertTag !== undefined) {
        this.insertTag = insertTag;
    }

    decorated.call(this, $element, options);

    if ($.isArray(tags)) {
      for (var t = 0; t < tags.length; t++) {
        var tag = tags[t];
        var item = this._normalizeItem(tag);

        var $option = this.option(item);

        this.$element.append($option);
      }
    }
  }

  Tags.prototype.query = function (decorated, params, callback) {
    var self = this;

    this._removeOldTags();

    if (params.term == null || params.page != null) {
      decorated.call(this, params, callback);
      return;
    }

    function wrapper (obj, child) {
      var data = obj.results;

      for (var i = 0; i < data.length; i++) {
        var option = data[i];

        var checkChildren = (
          option.children != null &&
          !wrapper({
            results: option.children
          }, true)
        );

        var optionText = (option.text || '').toUpperCase();
        var paramsTerm = (params.term || '').toUpperCase();

        var checkText = optionText === paramsTerm;

        if (checkText || checkChildren) {
          if (child) {
            return false;
          }

          obj.data = data;
          callback(obj);

          return;
        }
      }

      if (child) {
        return true;
      }

      var tag = self.createTag(params);

      if (tag != null) {
        var $option = self.option(tag);
        $option.attr('data-select2-tag', true);

        self.addOptions([$option]);

        self.insertTag(data, tag);
      }

      obj.results = data;

      callback(obj);
    }

    decorated.call(this, params, wrapper);
  };

  Tags.prototype.createTag = function (decorated, params) {
    var term = $.trim(params.term);

    if (term === '') {
      return null;
    }

    return {
      id: term,
      text: term
    };
  };

  Tags.prototype.insertTag = function (_, data, tag) {
    data.unshift(tag);
  };

  Tags.prototype._removeOldTags = function (_) {
    var $options = this.$element.find('option[data-select2-tag]');

    $options.each(function () {
      if (this.selected) {
        return;
      }

      $(this).remove();
    });
  };

  return Tags;
});

S2.define('select2/data/tokenizer',[
  'jquery'
], function ($) {
  function Tokenizer (decorated, $element, options) {
    var tokenizer = options.get('tokenizer');

    if (tokenizer !== undefined) {
      this.tokenizer = tokenizer;
    }

    decorated.call(this, $element, options);
  }

  Tokenizer.prototype.bind = function (decorated, container, $container) {
    decorated.call(this, container, $container);

    this.$search =  container.dropdown.$search || container.selection.$search ||
      $container.find('.select2-search__field');
  };

  Tokenizer.prototype.query = function (decorated, params, callback) {
    var self = this;

    function createAndSelect (data) {
      // Normalize the data object so we can use it for checks
      var item = self._normalizeItem(data);

      // Check if the data object already exists as a tag
      // Select it if it doesn't
      var $existingOptions = self.$element.find('option').filter(function () {
        return $(this).val() === item.id;
      });

      // If an existing option wasn't found for it, create the option
      if (!$existingOptions.length) {
        var $option = self.option(item);
        $option.attr('data-select2-tag', true);

        self._removeOldTags();
        self.addOptions([$option]);
      }

      // Select the item, now that we know there is an option for it
      select(item);
    }

    function select (data) {
      self.trigger('select', {
        data: data
      });
    }

    params.term = params.term || '';

    var tokenData = this.tokenizer(params, this.options, createAndSelect);

    if (tokenData.term !== params.term) {
      // Replace the search term if we have the search box
      if (this.$search.length) {
        this.$search.val(tokenData.term);
        this.$search.trigger('focus');
      }

      params.term = tokenData.term;
    }

    decorated.call(this, params, callback);
  };

  Tokenizer.prototype.tokenizer = function (_, params, options, callback) {
    var separators = options.get('tokenSeparators') || [];
    var term = params.term;
    var i = 0;

    var createTag = this.createTag || function (params) {
      return {
        id: params.term,
        text: params.term
      };
    };

    while (i < term.length) {
      var termChar = term[i];

      if ($.inArray(termChar, separators) === -1) {
        i++;

        continue;
      }

      var part = term.substr(0, i);
      var partParams = $.extend({}, params, {
        term: part
      });

      var data = createTag(partParams);

      if (data == null) {
        i++;
        continue;
      }

      callback(data);

      // Reset the term to not include the tokenized portion
      term = term.substr(i + 1) || '';
      i = 0;
    }

    return {
      term: term
    };
  };

  return Tokenizer;
});

S2.define('select2/data/minimumInputLength',[

], function () {
  function MinimumInputLength (decorated, $e, options) {
    this.minimumInputLength = options.get('minimumInputLength');

    decorated.call(this, $e, options);
  }

  MinimumInputLength.prototype.query = function (decorated, params, callback) {
    params.term = params.term || '';

    if (params.term.length < this.minimumInputLength) {
      this.trigger('results:message', {
        message: 'inputTooShort',
        args: {
          minimum: this.minimumInputLength,
          input: params.term,
          params: params
        }
      });

      return;
    }

    decorated.call(this, params, callback);
  };

  return MinimumInputLength;
});

S2.define('select2/data/maximumInputLength',[

], function () {
  function MaximumInputLength (decorated, $e, options) {
    this.maximumInputLength = options.get('maximumInputLength');

    decorated.call(this, $e, options);
  }

  MaximumInputLength.prototype.query = function (decorated, params, callback) {
    params.term = params.term || '';

    if (this.maximumInputLength > 0 &&
        params.term.length > this.maximumInputLength) {
      this.trigger('results:message', {
        message: 'inputTooLong',
        args: {
          maximum: this.maximumInputLength,
          input: params.term,
          params: params
        }
      });

      return;
    }

    decorated.call(this, params, callback);
  };

  return MaximumInputLength;
});

S2.define('select2/data/maximumSelectionLength',[

], function (){
  function MaximumSelectionLength (decorated, $e, options) {
    this.maximumSelectionLength = options.get('maximumSelectionLength');

    decorated.call(this, $e, options);
  }

  MaximumSelectionLength.prototype.bind =
    function (decorated, container, $container) {
      var self = this;

      decorated.call(this, container, $container);

      container.on('select', function () {
        self._checkIfMaximumSelected();
      });
  };

  MaximumSelectionLength.prototype.query =
    function (decorated, params, callback) {
      var self = this;

      this._checkIfMaximumSelected(function () {
        decorated.call(self, params, callback);
      });
  };

  MaximumSelectionLength.prototype._checkIfMaximumSelected =
    function (_, successCallback) {
      var self = this;

      this.current(function (currentData) {
        var count = currentData != null ? currentData.length : 0;
        if (self.maximumSelectionLength > 0 &&
          count >= self.maximumSelectionLength) {
          self.trigger('results:message', {
            message: 'maximumSelected',
            args: {
              maximum: self.maximumSelectionLength
            }
          });
          return;
        }

        if (successCallback) {
          successCallback();
        }
      });
  };

  return MaximumSelectionLength;
});

S2.define('select2/dropdown',[
  'jquery',
  './utils'
], function ($, Utils) {
  function Dropdown ($element, options) {
    this.$element = $element;
    this.options = options;

    Dropdown.__super__.constructor.call(this);
  }

  Utils.Extend(Dropdown, Utils.Observable);

  Dropdown.prototype.render = function () {
    var $dropdown = $(
      '<span class="select2-dropdown">' +
        '<span class="select2-results"></span>' +
      '</span>'
    );

    $dropdown.attr('dir', this.options.get('dir'));

    this.$dropdown = $dropdown;

    return $dropdown;
  };

  Dropdown.prototype.bind = function () {
    // Should be implemented in subclasses
  };

  Dropdown.prototype.position = function ($dropdown, $container) {
    // Should be implemented in subclasses
  };

  Dropdown.prototype.destroy = function () {
    // Remove the dropdown from the DOM
    this.$dropdown.remove();
  };

  return Dropdown;
});

S2.define('select2/dropdown/search',[
  'jquery',
  '../utils'
], function ($, Utils) {
  function Search () { }

  Search.prototype.render = function (decorated) {
    var $rendered = decorated.call(this);

    var $search = $(
      '<span class="select2-search select2-search--dropdown">' +
        '<input class="select2-search__field" type="search" tabindex="-1"' +
        ' autocomplete="off" autocorrect="off" autocapitalize="none"' +
        ' spellcheck="false" role="searchbox" aria-autocomplete="list" />' +
      '</span>'
    );

    this.$searchContainer = $search;
    this.$search = $search.find('input');

    $rendered.prepend($search);

    return $rendered;
  };

  Search.prototype.bind = function (decorated, container, $container) {
    var self = this;

    var resultsId = container.id + '-results';

    decorated.call(this, container, $container);

    this.$search.on('keydown', function (evt) {
      self.trigger('keypress', evt);

      self._keyUpPrevented = evt.isDefaultPrevented();
    });

    // Workaround for browsers which do not support the `input` event
    // This will prevent double-triggering of events for browsers which support
    // both the `keyup` and `input` events.
    this.$search.on('input', function (evt) {
      // Unbind the duplicated `keyup` event
      $(this).off('keyup');
    });

    this.$search.on('keyup input', function (evt) {
      self.handleSearch(evt);
    });

    container.on('open', function () {
      self.$search.attr('tabindex', 0);
      self.$search.attr('aria-controls', resultsId);

      self.$search.trigger('focus');

      window.setTimeout(function () {
        self.$search.trigger('focus');
      }, 0);
    });

    container.on('close', function () {
      self.$search.attr('tabindex', -1);
      self.$search.removeAttr('aria-controls');
      self.$search.removeAttr('aria-activedescendant');

      self.$search.val('');
      self.$search.trigger('blur');
    });

    container.on('focus', function () {
      if (!container.isOpen()) {
        self.$search.trigger('focus');
      }
    });

    container.on('results:all', function (params) {
      if (params.query.term == null || params.query.term === '') {
        var showSearch = self.showSearch(params);

        if (showSearch) {
          self.$searchContainer.removeClass('select2-search--hide');
        } else {
          self.$searchContainer.addClass('select2-search--hide');
        }
      }
    });

    container.on('results:focus', function (params) {
      if (params.data._resultId) {
        self.$search.attr('aria-activedescendant', params.data._resultId);
      } else {
        self.$search.removeAttr('aria-activedescendant');
      }
    });
  };

  Search.prototype.handleSearch = function (evt) {
    if (!this._keyUpPrevented) {
      var input = this.$search.val();

      this.trigger('query', {
        term: input
      });
    }

    this._keyUpPrevented = false;
  };

  Search.prototype.showSearch = function (_, params) {
    return true;
  };

  return Search;
});

S2.define('select2/dropdown/hidePlaceholder',[

], function () {
  function HidePlaceholder (decorated, $element, options, dataAdapter) {
    this.placeholder = this.normalizePlaceholder(options.get('placeholder'));

    decorated.call(this, $element, options, dataAdapter);
  }

  HidePlaceholder.prototype.append = function (decorated, data) {
    data.results = this.removePlaceholder(data.results);

    decorated.call(this, data);
  };

  HidePlaceholder.prototype.normalizePlaceholder = function (_, placeholder) {
    if (typeof placeholder === 'string') {
      placeholder = {
        id: '',
        text: placeholder
      };
    }

    return placeholder;
  };

  HidePlaceholder.prototype.removePlaceholder = function (_, data) {
    var modifiedData = data.slice(0);

    for (var d = data.length - 1; d >= 0; d--) {
      var item = data[d];

      if (this.placeholder.id === item.id) {
        modifiedData.splice(d, 1);
      }
    }

    return modifiedData;
  };

  return HidePlaceholder;
});

S2.define('select2/dropdown/infiniteScroll',[
  'jquery'
], function ($) {
  function InfiniteScroll (decorated, $element, options, dataAdapter) {
    this.lastParams = {};

    decorated.call(this, $element, options, dataAdapter);

    this.$loadingMore = this.createLoadingMore();
    this.loading = false;
  }

  InfiniteScroll.prototype.append = function (decorated, data) {
    this.$loadingMore.remove();
    this.loading = false;

    decorated.call(this, data);

    if (this.showLoadingMore(data)) {
      this.$results.append(this.$loadingMore);
      this.loadMoreIfNeeded();
    }
  };

  InfiniteScroll.prototype.bind = function (decorated, container, $container) {
    var self = this;

    decorated.call(this, container, $container);

    container.on('query', function (params) {
      self.lastParams = params;
      self.loading = true;
    });

    container.on('query:append', function (params) {
      self.lastParams = params;
      self.loading = true;
    });

    this.$results.on('scroll', this.loadMoreIfNeeded.bind(this));
  };

  InfiniteScroll.prototype.loadMoreIfNeeded = function () {
    var isLoadMoreVisible = $.contains(
      document.documentElement,
      this.$loadingMore[0]
    );

    if (this.loading || !isLoadMoreVisible) {
      return;
    }

    var currentOffset = this.$results.offset().top +
      this.$results.outerHeight(false);
    var loadingMoreOffset = this.$loadingMore.offset().top +
      this.$loadingMore.outerHeight(false);

    if (currentOffset + 50 >= loadingMoreOffset) {
      this.loadMore();
    }
  };

  InfiniteScroll.prototype.loadMore = function () {
    this.loading = true;

    var params = $.extend({}, {page: 1}, this.lastParams);

    params.page++;

    this.trigger('query:append', params);
  };

  InfiniteScroll.prototype.showLoadingMore = function (_, data) {
    return data.pagination && data.pagination.more;
  };

  InfiniteScroll.prototype.createLoadingMore = function () {
    var $option = $(
      '<li ' +
      'class="select2-results__option select2-results__option--load-more"' +
      'role="option" aria-disabled="true"></li>'
    );

    var message = this.options.get('translations').get('loadingMore');

    $option.html(message(this.lastParams));

    return $option;
  };

  return InfiniteScroll;
});

S2.define('select2/dropdown/attachBody',[
  'jquery',
  '../utils'
], function ($, Utils) {
  function AttachBody (decorated, $element, options) {
    this.$dropdownParent = $(options.get('dropdownParent') || document.body);

    decorated.call(this, $element, options);
  }

  AttachBody.prototype.bind = function (decorated, container, $container) {
    var self = this;

    decorated.call(this, container, $container);

    container.on('open', function () {
      self._showDropdown();
      self._attachPositioningHandler(container);

      // Must bind after the results handlers to ensure correct sizing
      self._bindContainerResultHandlers(container);
    });

    container.on('close', function () {
      self._hideDropdown();
      self._detachPositioningHandler(container);
    });

    this.$dropdownContainer.on('mousedown', function (evt) {
      evt.stopPropagation();
    });
  };

  AttachBody.prototype.destroy = function (decorated) {
    decorated.call(this);

    this.$dropdownContainer.remove();
  };

  AttachBody.prototype.position = function (decorated, $dropdown, $container) {
    // Clone all of the container classes
    $dropdown.attr('class', $container.attr('class'));

    $dropdown.removeClass('select2');
    $dropdown.addClass('select2-container--open');

    $dropdown.css({
      position: 'absolute',
      top: -999999
    });

    this.$container = $container;
  };

  AttachBody.prototype.render = function (decorated) {
    var $container = $('<span></span>');

    var $dropdown = decorated.call(this);
    $container.append($dropdown);

    this.$dropdownContainer = $container;

    return $container;
  };

  AttachBody.prototype._hideDropdown = function (decorated) {
    this.$dropdownContainer.detach();
  };

  AttachBody.prototype._bindContainerResultHandlers =
      function (decorated, container) {

    // These should only be bound once
    if (this._containerResultsHandlersBound) {
      return;
    }

    var self = this;

    container.on('results:all', function () {
      self._positionDropdown();
      self._resizeDropdown();
    });

    container.on('results:append', function () {
      self._positionDropdown();
      self._resizeDropdown();
    });

    container.on('results:message', function () {
      self._positionDropdown();
      self._resizeDropdown();
    });

    container.on('select', function () {
      self._positionDropdown();
      self._resizeDropdown();
    });

    container.on('unselect', function () {
      self._positionDropdown();
      self._resizeDropdown();
    });

    this._containerResultsHandlersBound = true;
  };

  AttachBody.prototype._attachPositioningHandler =
      function (decorated, container) {
    var self = this;

    var scrollEvent = 'scroll.select2.' + container.id;
    var resizeEvent = 'resize.select2.' + container.id;
    var orientationEvent = 'orientationchange.select2.' + container.id;

    var $watchers = this.$container.parents().filter(Utils.hasScroll);
    $watchers.each(function () {
      Utils.StoreData(this, 'select2-scroll-position', {
        x: $(this).scrollLeft(),
        y: $(this).scrollTop()
      });
    });

    $watchers.on(scrollEvent, function (ev) {
      var position = Utils.GetData(this, 'select2-scroll-position');
      $(this).scrollTop(position.y);
    });

    $(window).on(scrollEvent + ' ' + resizeEvent + ' ' + orientationEvent,
      function (e) {
      self._positionDropdown();
      self._resizeDropdown();
    });
  };

  AttachBody.prototype._detachPositioningHandler =
      function (decorated, container) {
    var scrollEvent = 'scroll.select2.' + container.id;
    var resizeEvent = 'resize.select2.' + container.id;
    var orientationEvent = 'orientationchange.select2.' + container.id;

    var $watchers = this.$container.parents().filter(Utils.hasScroll);
    $watchers.off(scrollEvent);

    $(window).off(scrollEvent + ' ' + resizeEvent + ' ' + orientationEvent);
  };

  AttachBody.prototype._positionDropdown = function () {
    var $window = $(window);

    var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
    var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');

    var newDirection = null;

    var offset = this.$container.offset();

    offset.bottom = offset.top + this.$container.outerHeight(false);

    var container = {
      height: this.$container.outerHeight(false)
    };

    container.top = offset.top;
    container.bottom = offset.top + container.height;

    var dropdown = {
      height: this.$dropdown.outerHeight(false)
    };

    var viewport = {
      top: $window.scrollTop(),
      bottom: $window.scrollTop() + $window.height()
    };

    var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
    var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);

    var css = {
      left: offset.left,
      top: container.bottom
    };

    // Determine what the parent element is to use for calculating the offset
    var $offsetParent = this.$dropdownParent;

    // For statically positioned elements, we need to get the element
    // that is determining the offset
    if ($offsetParent.css('position') === 'static') {
      $offsetParent = $offsetParent.offsetParent();
    }

    var parentOffset = {
      top: 0,
      left: 0
    };

    if (
      $.contains(document.body, $offsetParent[0]) ||
      $offsetParent[0].isConnected
      ) {
      parentOffset = $offsetParent.offset();
    }

    css.top -= parentOffset.top;
    css.left -= parentOffset.left;

    if (!isCurrentlyAbove && !isCurrentlyBelow) {
      newDirection = 'below';
    }

    if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
      newDirection = 'above';
    } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
      newDirection = 'below';
    }

    if (newDirection == 'above' ||
      (isCurrentlyAbove && newDirection !== 'below')) {
      css.top = container.top - parentOffset.top - dropdown.height;
    }

    if (newDirection != null) {
      this.$dropdown
        .removeClass('select2-dropdown--below select2-dropdown--above')
        .addClass('select2-dropdown--' + newDirection);
      this.$container
        .removeClass('select2-container--below select2-container--above')
        .addClass('select2-container--' + newDirection);
    }

    this.$dropdownContainer.css(css);
  };

  AttachBody.prototype._resizeDropdown = function () {
    var css = {
      width: this.$container.outerWidth(false) + 'px'
    };

    if (this.options.get('dropdownAutoWidth')) {
      css.minWidth = css.width;
      css.position = 'relative';
      css.width = 'auto';
    }

    this.$dropdown.css(css);
  };

  AttachBody.prototype._showDropdown = function (decorated) {
    this.$dropdownContainer.appendTo(this.$dropdownParent);

    this._positionDropdown();
    this._resizeDropdown();
  };

  return AttachBody;
});

S2.define('select2/dropdown/minimumResultsForSearch',[

], function () {
  function countResults (data) {
    var count = 0;

    for (var d = 0; d < data.length; d++) {
      var item = data[d];

      if (item.children) {
        count += countResults(item.children);
      } else {
        count++;
      }
    }

    return count;
  }

  function MinimumResultsForSearch (decorated, $element, options, dataAdapter) {
    this.minimumResultsForSearch = options.get('minimumResultsForSearch');

    if (this.minimumResultsForSearch < 0) {
      this.minimumResultsForSearch = Infinity;
    }

    decorated.call(this, $element, options, dataAdapter);
  }

  MinimumResultsForSearch.prototype.showSearch = function (decorated, params) {
    if (countResults(params.data.results) < this.minimumResultsForSearch) {
      return false;
    }

    return decorated.call(this, params);
  };

  return MinimumResultsForSearch;
});

S2.define('select2/dropdown/selectOnClose',[
  '../utils'
], function (Utils) {
  function SelectOnClose () { }

  SelectOnClose.prototype.bind = function (decorated, container, $container) {
    var self = this;

    decorated.call(this, container, $container);

    container.on('close', function (params) {
      self._handleSelectOnClose(params);
    });
  };

  SelectOnClose.prototype._handleSelectOnClose = function (_, params) {
    if (params && params.originalSelect2Event != null) {
      var event = params.originalSelect2Event;

      // Don't select an item if the close event was triggered from a select or
      // unselect event
      if (event._type === 'select' || event._type === 'unselect') {
        return;
      }
    }

    var $highlightedResults = this.getHighlightedResults();

    // Only select highlighted results
    if ($highlightedResults.length < 1) {
      return;
    }

    var data = Utils.GetData($highlightedResults[0], 'data');

    // Don't re-select already selected resulte
    if (
      (data.element != null && data.element.selected) ||
      (data.element == null && data.selected)
    ) {
      return;
    }

    this.trigger('select', {
        data: data
    });
  };

  return SelectOnClose;
});

S2.define('select2/dropdown/closeOnSelect',[

], function () {
  function CloseOnSelect () { }

  CloseOnSelect.prototype.bind = function (decorated, container, $container) {
    var self = this;

    decorated.call(this, container, $container);

    container.on('select', function (evt) {
      self._selectTriggered(evt);
    });

    container.on('unselect', function (evt) {
      self._selectTriggered(evt);
    });
  };

  CloseOnSelect.prototype._selectTriggered = function (_, evt) {
    var originalEvent = evt.originalEvent;

    // Don't close if the control key is being held
    if (originalEvent && (originalEvent.ctrlKey || originalEvent.metaKey)) {
      return;
    }

    this.trigger('close', {
      originalEvent: originalEvent,
      originalSelect2Event: evt
    });
  };

  return CloseOnSelect;
});

S2.define('select2/i18n/en',[],function () {
  // English
  return {
    errorLoading: function () {
      return 'The results could not be loaded.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'Please delete ' + overChars + ' character';

      if (overChars != 1) {
        message += 's';
      }

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'Please enter ' + remainingChars + ' or more characters';

      return message;
    },
    loadingMore: function () {
      return 'Loading more results…';
    },
    maximumSelected: function (args) {
      var message = 'You can only select ' + args.maximum + ' item';

      if (args.maximum != 1) {
        message += 's';
      }

      return message;
    },
    noResults: function () {
      return 'No results found';
    },
    searching: function () {
      return 'Searching…';
    },
    removeAllItems: function () {
      return 'Remove all items';
    }
  };
});

S2.define('select2/defaults',[
  'jquery',
  'require',

  './results',

  './selection/single',
  './selection/multiple',
  './selection/placeholder',
  './selection/allowClear',
  './selection/search',
  './selection/eventRelay',

  './utils',
  './translation',
  './diacritics',

  './data/select',
  './data/array',
  './data/ajax',
  './data/tags',
  './data/tokenizer',
  './data/minimumInputLength',
  './data/maximumInputLength',
  './data/maximumSelectionLength',

  './dropdown',
  './dropdown/search',
  './dropdown/hidePlaceholder',
  './dropdown/infiniteScroll',
  './dropdown/attachBody',
  './dropdown/minimumResultsForSearch',
  './dropdown/selectOnClose',
  './dropdown/closeOnSelect',

  './i18n/en'
], function ($, require,

             ResultsList,

             SingleSelection, MultipleSelection, Placeholder, AllowClear,
             SelectionSearch, EventRelay,

             Utils, Translation, DIACRITICS,

             SelectData, ArrayData, AjaxData, Tags, Tokenizer,
             MinimumInputLength, MaximumInputLength, MaximumSelectionLength,

             Dropdown, DropdownSearch, HidePlaceholder, InfiniteScroll,
             AttachBody, MinimumResultsForSearch, SelectOnClose, CloseOnSelect,

             EnglishTranslation) {
  function Defaults () {
    this.reset();
  }

  Defaults.prototype.apply = function (options) {
    options = $.extend(true, {}, this.defaults, options);

    if (options.dataAdapter == null) {
      if (options.ajax != null) {
        options.dataAdapter = AjaxData;
      } else if (options.data != null) {
        options.dataAdapter = ArrayData;
      } else {
        options.dataAdapter = SelectData;
      }

      if (options.minimumInputLength > 0) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          MinimumInputLength
        );
      }

      if (options.maximumInputLength > 0) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          MaximumInputLength
        );
      }

      if (options.maximumSelectionLength > 0) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          MaximumSelectionLength
        );
      }

      if (options.tags) {
        options.dataAdapter = Utils.Decorate(options.dataAdapter, Tags);
      }

      if (options.tokenSeparators != null || options.tokenizer != null) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          Tokenizer
        );
      }

      if (options.query != null) {
        var Query = require(options.amdBase + 'compat/query');

        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          Query
        );
      }

      if (options.initSelection != null) {
        var InitSelection = require(options.amdBase + 'compat/initSelection');

        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          InitSelection
        );
      }
    }

    if (options.resultsAdapter == null) {
      options.resultsAdapter = ResultsList;

      if (options.ajax != null) {
        options.resultsAdapter = Utils.Decorate(
          options.resultsAdapter,
          InfiniteScroll
        );
      }

      if (options.placeholder != null) {
        options.resultsAdapter = Utils.Decorate(
          options.resultsAdapter,
          HidePlaceholder
        );
      }

      if (options.selectOnClose) {
        options.resultsAdapter = Utils.Decorate(
          options.resultsAdapter,
          SelectOnClose
        );
      }
    }

    if (options.dropdownAdapter == null) {
      if (options.multiple) {
        options.dropdownAdapter = Dropdown;
      } else {
        var SearchableDropdown = Utils.Decorate(Dropdown, DropdownSearch);

        options.dropdownAdapter = SearchableDropdown;
      }

      if (options.minimumResultsForSearch !== 0) {
        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
          MinimumResultsForSearch
        );
      }

      if (options.closeOnSelect) {
        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
          CloseOnSelect
        );
      }

      if (
        options.dropdownCssClass != null ||
        options.dropdownCss != null ||
        options.adaptDropdownCssClass != null
      ) {
        var DropdownCSS = require(options.amdBase + 'compat/dropdownCss');

        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
          DropdownCSS
        );
      }

      options.dropdownAdapter = Utils.Decorate(
        options.dropdownAdapter,
        AttachBody
      );
    }

    if (options.selectionAdapter == null) {
      if (options.multiple) {
        options.selectionAdapter = MultipleSelection;
      } else {
        options.selectionAdapter = SingleSelection;
      }

      // Add the placeholder mixin if a placeholder was specified
      if (options.placeholder != null) {
        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
          Placeholder
        );
      }

      if (options.allowClear) {
        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
          AllowClear
        );
      }

      if (options.multiple) {
        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
          SelectionSearch
        );
      }

      if (
        options.containerCssClass != null ||
        options.containerCss != null ||
        options.adaptContainerCssClass != null
      ) {
        var ContainerCSS = require(options.amdBase + 'compat/containerCss');

        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
          ContainerCSS
        );
      }

      options.selectionAdapter = Utils.Decorate(
        options.selectionAdapter,
        EventRelay
      );
    }

    // If the defaults were not previously applied from an element, it is
    // possible for the language option to have not been resolved
    options.language = this._resolveLanguage(options.language);

    // Always fall back to English since it will always be complete
    options.language.push('en');

    var uniqueLanguages = [];

    for (var l = 0; l < options.language.length; l++) {
      var language = options.language[l];

      if (uniqueLanguages.indexOf(language) === -1) {
        uniqueLanguages.push(language);
      }
    }

    options.language = uniqueLanguages;

    options.translations = this._processTranslations(
      options.language,
      options.debug
    );

    return options;
  };

  Defaults.prototype.reset = function () {
    function stripDiacritics (text) {
      // Used 'uni range + named function' from http://jsperf.com/diacritics/18
      function match(a) {
        return DIACRITICS[a] || a;
      }

      return text.replace(/[^\u0000-\u007E]/g, match);
    }

    function matcher (params, data) {
      // Always return the object if there is nothing to compare
      if ($.trim(params.term) === '') {
        return data;
      }

      // Do a recursive check for options with children
      if (data.children && data.children.length > 0) {
        // Clone the data object if there are children
        // This is required as we modify the object to remove any non-matches
        var match = $.extend(true, {}, data);

        // Check each child of the option
        for (var c = data.children.length - 1; c >= 0; c--) {
          var child = data.children[c];

          var matches = matcher(params, child);

          // If there wasn't a match, remove the object in the array
          if (matches == null) {
            match.children.splice(c, 1);
          }
        }

        // If any children matched, return the new object
        if (match.children.length > 0) {
          return match;
        }

        // If there were no matching children, check just the plain object
        return matcher(params, match);
      }

      var original = stripDiacritics(data.text).toUpperCase();
      var term = stripDiacritics(params.term).toUpperCase();

      // Check if the text contains the term
      if (original.indexOf(term) > -1) {
        return data;
      }

      // If it doesn't contain the term, don't return anything
      return null;
    }

    this.defaults = {
      amdBase: './',
      amdLanguageBase: './i18n/',
      closeOnSelect: true,
      debug: false,
      dropdownAutoWidth: false,
      escapeMarkup: Utils.escapeMarkup,
      language: {},
      matcher: matcher,
      minimumInputLength: 0,
      maximumInputLength: 0,
      maximumSelectionLength: 0,
      minimumResultsForSearch: 0,
      selectOnClose: false,
      scrollAfterSelect: false,
      sorter: function (data) {
        return data;
      },
      templateResult: function (result) {
        return result.text;
      },
      templateSelection: function (selection) {
        return selection.text;
      },
      theme: 'default',
      width: 'resolve'
    };
  };

  Defaults.prototype.applyFromElement = function (options, $element) {
    var optionLanguage = options.language;
    var defaultLanguage = this.defaults.language;
    var elementLanguage = $element.prop('lang');
    var parentLanguage = $element.closest('[lang]').prop('lang');

    var languages = Array.prototype.concat.call(
      this._resolveLanguage(elementLanguage),
      this._resolveLanguage(optionLanguage),
      this._resolveLanguage(defaultLanguage),
      this._resolveLanguage(parentLanguage)
    );

    options.language = languages;

    return options;
  };

  Defaults.prototype._resolveLanguage = function (language) {
    if (!language) {
      return [];
    }

    if ($.isEmptyObject(language)) {
      return [];
    }

    if ($.isPlainObject(language)) {
      return [language];
    }

    var languages;

    if (!$.isArray(language)) {
      languages = [language];
    } else {
      languages = language;
    }

    var resolvedLanguages = [];

    for (var l = 0; l < languages.length; l++) {
      resolvedLanguages.push(languages[l]);

      if (typeof languages[l] === 'string' && languages[l].indexOf('-') > 0) {
        // Extract the region information if it is included
        var languageParts = languages[l].split('-');
        var baseLanguage = languageParts[0];

        resolvedLanguages.push(baseLanguage);
      }
    }

    return resolvedLanguages;
  };

  Defaults.prototype._processTranslations = function (languages, debug) {
    var translations = new Translation();

    for (var l = 0; l < languages.length; l++) {
      var languageData = new Translation();

      var language = languages[l];

      if (typeof language === 'string') {
        try {
          // Try to load it with the original name
          languageData = Translation.loadPath(language);
        } catch (e) {
          try {
            // If we couldn't load it, check if it wasn't the full path
            language = this.defaults.amdLanguageBase + language;
            languageData = Translation.loadPath(language);
          } catch (ex) {
            // The translation could not be loaded at all. Sometimes this is
            // because of a configuration problem, other times this can be
            // because of how Select2 helps load all possible translation files
            if (debug && window.console && console.warn) {
              console.warn(
                'Select2: The language file for "' + language + '" could ' +
                'not be automatically loaded. A fallback will be used instead.'
              );
            }
          }
        }
      } else if ($.isPlainObject(language)) {
        languageData = new Translation(language);
      } else {
        languageData = language;
      }

      translations.extend(languageData);
    }

    return translations;
  };

  Defaults.prototype.set = function (key, value) {
    var camelKey = $.camelCase(key);

    var data = {};
    data[camelKey] = value;

    var convertedData = Utils._convertData(data);

    $.extend(true, this.defaults, convertedData);
  };

  var defaults = new Defaults();

  return defaults;
});

S2.define('select2/options',[
  'require',
  'jquery',
  './defaults',
  './utils'
], function (require, $, Defaults, Utils) {
  function Options (options, $element) {
    this.options = options;

    if ($element != null) {
      this.fromElement($element);
    }

    if ($element != null) {
      this.options = Defaults.applyFromElement(this.options, $element);
    }

    this.options = Defaults.apply(this.options);

    if ($element && $element.is('input')) {
      var InputCompat = require(this.get('amdBase') + 'compat/inputData');

      this.options.dataAdapter = Utils.Decorate(
        this.options.dataAdapter,
        InputCompat
      );
    }
  }

  Options.prototype.fromElement = function ($e) {
    var excludedData = ['select2'];

    if (this.options.multiple == null) {
      this.options.multiple = $e.prop('multiple');
    }

    if (this.options.disabled == null) {
      this.options.disabled = $e.prop('disabled');
    }

    if (this.options.dir == null) {
      if ($e.prop('dir')) {
        this.options.dir = $e.prop('dir');
      } else if ($e.closest('[dir]').prop('dir')) {
        this.options.dir = $e.closest('[dir]').prop('dir');
      } else {
        this.options.dir = 'ltr';
      }
    }

    $e.prop('disabled', this.options.disabled);
    $e.prop('multiple', this.options.multiple);

    if (Utils.GetData($e[0], 'select2Tags')) {
      if (this.options.debug && window.console && console.warn) {
        console.warn(
          'Select2: The `data-select2-tags` attribute has been changed to ' +
          'use the `data-data` and `data-tags="true"` attributes and will be ' +
          'removed in future versions of Select2.'
        );
      }

      Utils.StoreData($e[0], 'data', Utils.GetData($e[0], 'select2Tags'));
      Utils.StoreData($e[0], 'tags', true);
    }

    if (Utils.GetData($e[0], 'ajaxUrl')) {
      if (this.options.debug && window.console && console.warn) {
        console.warn(
          'Select2: The `data-ajax-url` attribute has been changed to ' +
          '`data-ajax--url` and support for the old attribute will be removed' +
          ' in future versions of Select2.'
        );
      }

      $e.attr('ajax--url', Utils.GetData($e[0], 'ajaxUrl'));
      Utils.StoreData($e[0], 'ajax-Url', Utils.GetData($e[0], 'ajaxUrl'));
    }

    var dataset = {};

    function upperCaseLetter(_, letter) {
      return letter.toUpperCase();
    }

    // Pre-load all of the attributes which are prefixed with `data-`
    for (var attr = 0; attr < $e[0].attributes.length; attr++) {
      var attributeName = $e[0].attributes[attr].name;
      var prefix = 'data-';

      if (attributeName.substr(0, prefix.length) == prefix) {
        // Get the contents of the attribute after `data-`
        var dataName = attributeName.substring(prefix.length);

        // Get the data contents from the consistent source
        // This is more than likely the jQuery data helper
        var dataValue = Utils.GetData($e[0], dataName);

        // camelCase the attribute name to match the spec
        var camelDataName = dataName.replace(/-([a-z])/g, upperCaseLetter);

        // Store the data attribute contents into the dataset since
        dataset[camelDataName] = dataValue;
      }
    }

    // Prefer the element's `dataset` attribute if it exists
    // jQuery 1.x does not correctly handle data attributes with multiple dashes
    if ($.fn.jquery && $.fn.jquery.substr(0, 2) == '1.' && $e[0].dataset) {
      dataset = $.extend(true, {}, $e[0].dataset, dataset);
    }

    // Prefer our internal data cache if it exists
    var data = $.extend(true, {}, Utils.GetData($e[0]), dataset);

    data = Utils._convertData(data);

    for (var key in data) {
      if ($.inArray(key, excludedData) > -1) {
        continue;
      }

      if ($.isPlainObject(this.options[key])) {
        $.extend(this.options[key], data[key]);
      } else {
        this.options[key] = data[key];
      }
    }

    return this;
  };

  Options.prototype.get = function (key) {
    return this.options[key];
  };

  Options.prototype.set = function (key, val) {
    this.options[key] = val;
  };

  return Options;
});

S2.define('select2/core',[
  'jquery',
  './options',
  './utils',
  './keys'
], function ($, Options, Utils, KEYS) {
  var Select2 = function ($element, options) {
    if (Utils.GetData($element[0], 'select2') != null) {
      Utils.GetData($element[0], 'select2').destroy();
    }

    this.$element = $element;

    this.id = this._generateId($element);

    options = options || {};

    this.options = new Options(options, $element);

    Select2.__super__.constructor.call(this);

    // Set up the tabindex

    var tabindex = $element.attr('tabindex') || 0;
    Utils.StoreData($element[0], 'old-tabindex', tabindex);
    $element.attr('tabindex', '-1');

    // Set up containers and adapters

    var DataAdapter = this.options.get('dataAdapter');
    this.dataAdapter = new DataAdapter($element, this.options);

    var $container = this.render();

    this._placeContainer($container);

    var SelectionAdapter = this.options.get('selectionAdapter');
    this.selection = new SelectionAdapter($element, this.options);
    this.$selection = this.selection.render();

    this.selection.position(this.$selection, $container);

    var DropdownAdapter = this.options.get('dropdownAdapter');
    this.dropdown = new DropdownAdapter($element, this.options);
    this.$dropdown = this.dropdown.render();

    this.dropdown.position(this.$dropdown, $container);

    var ResultsAdapter = this.options.get('resultsAdapter');
    this.results = new ResultsAdapter($element, this.options, this.dataAdapter);
    this.$results = this.results.render();

    this.results.position(this.$results, this.$dropdown);

    // Bind events

    var self = this;

    // Bind the container to all of the adapters
    this._bindAdapters();

    // Register any DOM event handlers
    this._registerDomEvents();

    // Register any internal event handlers
    this._registerDataEvents();
    this._registerSelectionEvents();
    this._registerDropdownEvents();
    this._registerResultsEvents();
    this._registerEvents();

    // Set the initial state
    this.dataAdapter.current(function (initialData) {
      self.trigger('selection:update', {
        data: initialData
      });
    });

    // Hide the original select
    $element.addClass('select2-hidden-accessible');
    $element.attr('aria-hidden', 'true');

    // Synchronize any monitored attributes
    this._syncAttributes();

    Utils.StoreData($element[0], 'select2', this);

    // Ensure backwards compatibility with $element.data('select2').
    $element.data('select2', this);
  };

  Utils.Extend(Select2, Utils.Observable);

  Select2.prototype._generateId = function ($element) {
    var id = '';

    if ($element.attr('id') != null) {
      id = $element.attr('id');
    } else if ($element.attr('name') != null) {
      id = $element.attr('name') + '-' + Utils.generateChars(2);
    } else {
      id = Utils.generateChars(4);
    }

    id = id.replace(/(:|\.|\[|\]|,)/g, '');
    id = 'select2-' + id;

    return id;
  };

  Select2.prototype._placeContainer = function ($container) {
    $container.insertAfter(this.$element);

    var width = this._resolveWidth(this.$element, this.options.get('width'));

    if (width != null) {
      $container.css('width', width);
    }
  };

  Select2.prototype._resolveWidth = function ($element, method) {
    var WIDTH = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;

    if (method == 'resolve') {
      var styleWidth = this._resolveWidth($element, 'style');

      if (styleWidth != null) {
        return styleWidth;
      }

      return this._resolveWidth($element, 'element');
    }

    if (method == 'element') {
      var elementWidth = $element.outerWidth(false);

      if (elementWidth <= 0) {
        return 'auto';
      }

      return elementWidth + 'px';
    }

    if (method == 'style') {
      var style = $element.attr('style');

      if (typeof(style) !== 'string') {
        return null;
      }

      var attrs = style.split(';');

      for (var i = 0, l = attrs.length; i < l; i = i + 1) {
        var attr = attrs[i].replace(/\s/g, '');
        var matches = attr.match(WIDTH);

        if (matches !== null && matches.length >= 1) {
          return matches[1];
        }
      }

      return null;
    }

    if (method == 'computedstyle') {
      var computedStyle = window.getComputedStyle($element[0]);

      return computedStyle.width;
    }

    return method;
  };

  Select2.prototype._bindAdapters = function () {
    this.dataAdapter.bind(this, this.$container);
    this.selection.bind(this, this.$container);

    this.dropdown.bind(this, this.$container);
    this.results.bind(this, this.$container);
  };

  Select2.prototype._registerDomEvents = function () {
    var self = this;

    this.$element.on('change.select2', function () {
      self.dataAdapter.current(function (data) {
        self.trigger('selection:update', {
          data: data
        });
      });
    });

    this.$element.on('focus.select2', function (evt) {
      self.trigger('focus', evt);
    });

    this._syncA = Utils.bind(this._syncAttributes, this);
    this._syncS = Utils.bind(this._syncSubtree, this);

    if (this.$element[0].attachEvent) {
      this.$element[0].attachEvent('onpropertychange', this._syncA);
    }

    var observer = window.MutationObserver ||
      window.WebKitMutationObserver ||
      window.MozMutationObserver
    ;

    if (observer != null) {
      this._observer = new observer(function (mutations) {
        self._syncA();
        self._syncS(null, mutations);
      });
      this._observer.observe(this.$element[0], {
        attributes: true,
        childList: true,
        subtree: false
      });
    } else if (this.$element[0].addEventListener) {
      this.$element[0].addEventListener(
        'DOMAttrModified',
        self._syncA,
        false
      );
      this.$element[0].addEventListener(
        'DOMNodeInserted',
        self._syncS,
        false
      );
      this.$element[0].addEventListener(
        'DOMNodeRemoved',
        self._syncS,
        false
      );
    }
  };

  Select2.prototype._registerDataEvents = function () {
    var self = this;

    this.dataAdapter.on('*', function (name, params) {
      self.trigger(name, params);
    });
  };

  Select2.prototype._registerSelectionEvents = function () {
    var self = this;
    var nonRelayEvents = ['toggle', 'focus'];

    this.selection.on('toggle', function () {
      self.toggleDropdown();
    });

    this.selection.on('focus', function (params) {
      self.focus(params);
    });

    this.selection.on('*', function (name, params) {
      if ($.inArray(name, nonRelayEvents) !== -1) {
        return;
      }

      self.trigger(name, params);
    });
  };

  Select2.prototype._registerDropdownEvents = function () {
    var self = this;

    this.dropdown.on('*', function (name, params) {
      self.trigger(name, params);
    });
  };

  Select2.prototype._registerResultsEvents = function () {
    var self = this;

    this.results.on('*', function (name, params) {
      self.trigger(name, params);
    });
  };

  Select2.prototype._registerEvents = function () {
    var self = this;

    this.on('open', function () {
      self.$container.addClass('select2-container--open');
    });

    this.on('close', function () {
      self.$container.removeClass('select2-container--open');
    });

    this.on('enable', function () {
      self.$container.removeClass('select2-container--disabled');
    });

    this.on('disable', function () {
      self.$container.addClass('select2-container--disabled');
    });

    this.on('blur', function () {
      self.$container.removeClass('select2-container--focus');
    });

    this.on('query', function (params) {
      if (!self.isOpen()) {
        self.trigger('open', {});
      }

      this.dataAdapter.query(params, function (data) {
        self.trigger('results:all', {
          data: data,
          query: params
        });
      });
    });

    this.on('query:append', function (params) {
      this.dataAdapter.query(params, function (data) {
        self.trigger('results:append', {
          data: data,
          query: params
        });
      });
    });

    this.on('keypress', function (evt) {
      var key = evt.which;

      if (self.isOpen()) {
        if (key === KEYS.ESC || key === KEYS.TAB ||
            (key === KEYS.UP && evt.altKey)) {
          self.close(evt);

          evt.preventDefault();
        } else if (key === KEYS.ENTER) {
          self.trigger('results:select', {});

          evt.preventDefault();
        } else if ((key === KEYS.SPACE && evt.ctrlKey)) {
          self.trigger('results:toggle', {});

          evt.preventDefault();
        } else if (key === KEYS.UP) {
          self.trigger('results:previous', {});

          evt.preventDefault();
        } else if (key === KEYS.DOWN) {
          self.trigger('results:next', {});

          evt.preventDefault();
        }
      } else {
        if (key === KEYS.ENTER || key === KEYS.SPACE ||
            (key === KEYS.DOWN && evt.altKey)) {
          self.open();

          evt.preventDefault();
        }
      }
    });
  };

  Select2.prototype._syncAttributes = function () {
    this.options.set('disabled', this.$element.prop('disabled'));

    if (this.isDisabled()) {
      if (this.isOpen()) {
        this.close();
      }

      this.trigger('disable', {});
    } else {
      this.trigger('enable', {});
    }
  };

  Select2.prototype._isChangeMutation = function (evt, mutations) {
    var changed = false;
    var self = this;

    // Ignore any mutation events raised for elements that aren't options or
    // optgroups. This handles the case when the select element is destroyed
    if (
      evt && evt.target && (
        evt.target.nodeName !== 'OPTION' && evt.target.nodeName !== 'OPTGROUP'
      )
    ) {
      return;
    }

    if (!mutations) {
      // If mutation events aren't supported, then we can only assume that the
      // change affected the selections
      changed = true;
    } else if (mutations.addedNodes && mutations.addedNodes.length > 0) {
      for (var n = 0; n < mutations.addedNodes.length; n++) {
        var node = mutations.addedNodes[n];

        if (node.selected) {
          changed = true;
        }
      }
    } else if (mutations.removedNodes && mutations.removedNodes.length > 0) {
      changed = true;
    } else if ($.isArray(mutations)) {
      $.each(mutations, function(evt, mutation) {
        if (self._isChangeMutation(evt, mutation)) {
          // We've found a change mutation.
          // Let's escape from the loop and continue
          changed = true;
          return false;
        }
      });
    }
    return changed;
  };

  Select2.prototype._syncSubtree = function (evt, mutations) {
    var changed = this._isChangeMutation(evt, mutations);
    var self = this;

    // Only re-pull the data if we think there is a change
    if (changed) {
      this.dataAdapter.current(function (currentData) {
        self.trigger('selection:update', {
          data: currentData
        });
      });
    }
  };

  /**
   * Override the trigger method to automatically trigger pre-events when
   * there are events that can be prevented.
   */
  Select2.prototype.trigger = function (name, args) {
    var actualTrigger = Select2.__super__.trigger;
    var preTriggerMap = {
      'open': 'opening',
      'close': 'closing',
      'select': 'selecting',
      'unselect': 'unselecting',
      'clear': 'clearing'
    };

    if (args === undefined) {
      args = {};
    }

    if (name in preTriggerMap) {
      var preTriggerName = preTriggerMap[name];
      var preTriggerArgs = {
        prevented: false,
        name: name,
        args: args
      };

      actualTrigger.call(this, preTriggerName, preTriggerArgs);

      if (preTriggerArgs.prevented) {
        args.prevented = true;

        return;
      }
    }

    actualTrigger.call(this, name, args);
  };

  Select2.prototype.toggleDropdown = function () {
    if (this.isDisabled()) {
      return;
    }

    if (this.isOpen()) {
      this.close();
    } else {
      this.open();
    }
  };

  Select2.prototype.open = function () {
    if (this.isOpen()) {
      return;
    }

    if (this.isDisabled()) {
      return;
    }

    this.trigger('query', {});
  };

  Select2.prototype.close = function (evt) {
    if (!this.isOpen()) {
      return;
    }

    this.trigger('close', { originalEvent : evt });
  };

  /**
   * Helper method to abstract the "enabled" (not "disabled") state of this
   * object.
   *
   * @return {true} if the instance is not disabled.
   * @return {false} if the instance is disabled.
   */
  Select2.prototype.isEnabled = function () {
    return !this.isDisabled();
  };

  /**
   * Helper method to abstract the "disabled" state of this object.
   *
   * @return {true} if the disabled option is true.
   * @return {false} if the disabled option is false.
   */
  Select2.prototype.isDisabled = function () {
    return this.options.get('disabled');
  };

  Select2.prototype.isOpen = function () {
    return this.$container.hasClass('select2-container--open');
  };

  Select2.prototype.hasFocus = function () {
    return this.$container.hasClass('select2-container--focus');
  };

  Select2.prototype.focus = function (data) {
    // No need to re-trigger focus events if we are already focused
    if (this.hasFocus()) {
      return;
    }

    this.$container.addClass('select2-container--focus');
    this.trigger('focus', {});
  };

  Select2.prototype.enable = function (args) {
    if (this.options.get('debug') && window.console && console.warn) {
      console.warn(
        'Select2: The `select2("enable")` method has been deprecated and will' +
        ' be removed in later Select2 versions. Use $element.prop("disabled")' +
        ' instead.'
      );
    }

    if (args == null || args.length === 0) {
      args = [true];
    }

    var disabled = !args[0];

    this.$element.prop('disabled', disabled);
  };

  Select2.prototype.data = function () {
    if (this.options.get('debug') &&
        arguments.length > 0 && window.console && console.warn) {
      console.warn(
        'Select2: Data can no longer be set using `select2("data")`. You ' +
        'should consider setting the value instead using `$element.val()`.'
      );
    }

    var data = [];

    this.dataAdapter.current(function (currentData) {
      data = currentData;
    });

    return data;
  };

  Select2.prototype.val = function (args) {
    if (this.options.get('debug') && window.console && console.warn) {
      console.warn(
        'Select2: The `select2("val")` method has been deprecated and will be' +
        ' removed in later Select2 versions. Use $element.val() instead.'
      );
    }

    if (args == null || args.length === 0) {
      return this.$element.val();
    }

    var newVal = args[0];

    if ($.isArray(newVal)) {
      newVal = $.map(newVal, function (obj) {
        return obj.toString();
      });
    }

    this.$element.val(newVal).trigger('input').trigger('change');
  };

  Select2.prototype.destroy = function () {
    this.$container.remove();

    if (this.$element[0].detachEvent) {
      this.$element[0].detachEvent('onpropertychange', this._syncA);
    }

    if (this._observer != null) {
      this._observer.disconnect();
      this._observer = null;
    } else if (this.$element[0].removeEventListener) {
      this.$element[0]
        .removeEventListener('DOMAttrModified', this._syncA, false);
      this.$element[0]
        .removeEventListener('DOMNodeInserted', this._syncS, false);
      this.$element[0]
        .removeEventListener('DOMNodeRemoved', this._syncS, false);
    }

    this._syncA = null;
    this._syncS = null;

    this.$element.off('.select2');
    this.$element.attr('tabindex',
    Utils.GetData(this.$element[0], 'old-tabindex'));

    this.$element.removeClass('select2-hidden-accessible');
    this.$element.attr('aria-hidden', 'false');
    Utils.RemoveData(this.$element[0]);
    this.$element.removeData('select2');

    this.dataAdapter.destroy();
    this.selection.destroy();
    this.dropdown.destroy();
    this.results.destroy();

    this.dataAdapter = null;
    this.selection = null;
    this.dropdown = null;
    this.results = null;
  };

  Select2.prototype.render = function () {
    var $container = $(
      '<span class="select2 select2-container">' +
        '<span class="selection"></span>' +
        '<span class="dropdown-wrapper" aria-hidden="true"></span>' +
      '</span>'
    );

    $container.attr('dir', this.options.get('dir'));

    this.$container = $container;

    this.$container.addClass('select2-container--' + this.options.get('theme'));

    Utils.StoreData($container[0], 'element', this.$element);

    return $container;
  };

  return Select2;
});

S2.define('jquery-mousewheel',[
  'jquery'
], function ($) {
  // Used to shim jQuery.mousewheel for non-full builds.
  return $;
});

S2.define('jquery.select2',[
  'jquery',
  'jquery-mousewheel',

  './select2/core',
  './select2/defaults',
  './select2/utils'
], function ($, _, Select2, Defaults, Utils) {
  if ($.fn.select2 == null) {
    // All methods that should return the element
    var thisMethods = ['open', 'close', 'destroy'];

    $.fn.select2 = function (options) {
      options = options || {};

      if (typeof options === 'object') {
        this.each(function () {
          var instanceOptions = $.extend(true, {}, options);

          var instance = new Select2($(this), instanceOptions);
        });

        return this;
      } else if (typeof options === 'string') {
        var ret;
        var args = Array.prototype.slice.call(arguments, 1);

        this.each(function () {
          var instance = Utils.GetData(this, 'select2');

          if (instance == null && window.console && console.error) {
            console.error(
              'The select2(\'' + options + '\') method was called on an ' +
              'element that is not using Select2.'
            );
          }

          ret = instance[options].apply(instance, args);
        });

        // Check if we should be returning `this`
        if ($.inArray(options, thisMethods) > -1) {
          return this;
        }

        return ret;
      } else {
        throw new Error('Invalid arguments for Select2: ' + options);
      }
    };
  }

  if ($.fn.select2.defaults == null) {
    $.fn.select2.defaults = Defaults;
  }

  return Select2;
});

  // Return the AMD loader configuration so it can be used outside of this file
  return {
    define: S2.define,
    require: S2.require
  };
}());

  // Autoload the jQuery bindings
  // We know that all of the modules exist above this, so we're safe
  var select2 = S2.require('jquery.select2');

  // Hold the AMD module references on the jQuery function that was just loaded
  // This allows Select2 to use the internal loader outside of this file, such
  // as in the language files.
  jQuery.fn.select2.amd = S2;

  // Return the Select2 instance for anyone who is importing it.
  return select2;
}));

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

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