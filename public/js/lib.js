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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/images/dropzone.js":
/*!************************************************!*\
  !*** ./resources/assets/js/images/dropzone.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (function () {
  Dropzone.options.fileupload = {
    accept: function accept(file, done) {
      if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
        done("Error! Files of this type are not accepted");
      } else {
        done();
      }
    }
  };
  Dropzone.options.fileupload = {
    acceptedFiles: "image/jpeg, image/png, image/jpg"
  };

  if (typeof Dropzone != 'undefined') {
    Dropzone.autoDiscover = false;
  }

  ;

  (function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {
      // Dropzone Example
      if (typeof Dropzone != 'undefined') {
        if ($("#fileupload").length) {
          var dz = new Dropzone("#fileupload"),
              dze_info = $("#dze_info"),
              status = {
            uploaded: 0,
            errors: 0
          };
          var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
          dz.on("success", function (file, responseText) {
            var _$f = $f.clone();

            _$f.addClass('success');

            _$f.find('.name').html(file.name);

            if (file.size < 1024) {
              _$f.find('.size').html(parseInt(file.size) + ' KB');
            } else {
              _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            }

            _$f.find('.type').html(file.type);

            _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            dze_info.find('tbody').append(_$f);
            status.uploaded++;
            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');
            toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
              timeOut: 50000000
            });
          }).on('error', function (file) {
            var _$f = $f.clone();

            dze_info.removeClass('hidden');

            _$f.addClass('danger');

            _$f.find('.name').html(file.name);

            _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');

            _$f.find('.type').html(file.type);

            _$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

            dze_info.find('tbody').append(_$f);
            status.errors++;
            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');
            toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
              timeOut: 5000
            });
          });
        }
      }
    });
  })(jQuery, window);
});

/***/ }),

/***/ "./resources/assets/js/lib.js":
/*!************************************!*\
  !*** ./resources/assets/js/lib.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _services_recaptcha__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./services/recaptcha */ "./resources/assets/js/services/recaptcha.js");
/* harmony import */ var _images_dropzone__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./images/dropzone */ "./resources/assets/js/images/dropzone.js");


Object(_images_dropzone__WEBPACK_IMPORTED_MODULE_1__["default"])();
Object(_services_recaptcha__WEBPACK_IMPORTED_MODULE_0__["default"])();

/***/ }),

/***/ "./resources/assets/js/services/recaptcha.js":
/*!***************************************************!*\
  !*** ./resources/assets/js/services/recaptcha.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var widgetId1;
/* harmony default export */ __webpack_exports__["default"] = (function () {
  function onloadCallback() {
    widgetId1 = grecaptcha.render('example1', {
      'sitekey': '6Lc7hMIUAAAAADe09QkSQEH1j4q3fqt7KEjDI-Mr',
      'theme': 'light'
    });
  }

  onloadCallback();
});

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/assets/js/lib.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\cl-team\resources\assets\js\lib.js */"./resources/assets/js/lib.js");


/***/ })

/******/ });