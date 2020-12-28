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

/***/ "./src/js/bundle.js":
/*!**************************!*\
  !*** ./src/js/bundle.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_menu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/menu */ "./src/js/components/menu.js");
/* harmony import */ var _components_menu__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_menu__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/slider */ "./src/js/components/slider.js");
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_slider__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_wooll__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/wooll */ "./src/js/components/wooll.js");
/* harmony import */ var _components_wooll__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_wooll__WEBPACK_IMPORTED_MODULE_2__);
// bundle.js
// import './components/slick';


 // import { WOW } from 'wowjs';

console.log('bundles ');

/***/ }),

/***/ "./src/js/components/menu.js":
/*!***********************************!*\
  !*** ./src/js/components/menu.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(".hamburger").click(function () {
  jQuery(".hamburger").toggleClass("is-active");
  jQuery("#mobileMenu").toggleClass("showMenu");
});
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() > 50) {
    jQuery("header").addClass("active");
  } else if (jQuery(window).scrollTop() < 50) {
    jQuery("header").removeClass("active");
  }
});
jQuery(document).ready(function () {
  jQuery(".scrollDown").click(function (event) {
    jQuery("html, body").animate({
      scrollTop: jQuery(".pageContainer").offset().top
    }, {
      duration: 1000
    });
  });
});

/***/ }),

/***/ "./src/js/components/slider.js":
/*!*************************************!*\
  !*** ./src/js/components/slider.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/js/components/wooll.js":
/*!************************************!*\
  !*** ./src/js/components/wooll.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery('.add_to_cart_button').on('click', function () {
  jQuery(this).css('display', 'none');
  console.log(this);
});
jQuery('.cat-parent').prepend('<div class="openTab"><i class="icon-down-open-mini"></i></div>');
jQuery('.menu-item-has-children > a').append('<div class="openTabMenu"><i class="icon-down-open-mini"></i></div>');
jQuery(".openTabMenu").click(function () {
  jQuery(this).parent("a").toggleClass('is-active');
});
jQuery('.openTabMenu').on('click', function (e) {
  e.preventDefault();
});
jQuery('.openTabMenu').on('click', function () {
  jQuery(this).find('.icon-down-open-mini').toggleClass('icon-up-open-mini');
  jQuery(this).siblings('ul').toggleClass('active');
});
jQuery('.openTab').on('click', function () {
  jQuery(this).find('.icon-down-open-mini').toggleClass('icon-up-open-mini');
  jQuery(this).siblings('ul').toggleClass('active');
});
jQuery('.current-cat-parent > .openTab .icon-down-open-mini').addClass('icon-up-open-mini');
jQuery('.current-cat-parent > .children').addClass('active');
jQuery('.page-numbers .next').empty();
jQuery('.page-numbers .prev').empty();
jQuery('.page-numbers .next').append('<i class="icon-right-open-mini"></i>');
jQuery('.page-numbers .prev').append('<i class="icon-left-open-mini"></i>'); // Let the document know when the mouse is being used

document.body.addEventListener('mousedown', function () {
  document.body.classList.add('using-mouse');
}); // Re-enable focus styling when Tab is pressed

document.body.addEventListener('keydown', function (event) {
  if (event.keyCode === 9) {
    document.body.classList.remove('using-mouse');
  }
}); // Alternatively, re-enable focus styling when any key is pressed
//document.body.addEventListener('keydown', function() {
//  document.body.classList.remove('using-mouse');
//});

/***/ }),

/***/ 0:
/*!********************************!*\
  !*** multi ./src/js/bundle.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/amilian/public_html/wp-content/themes/sklep-lookslike/src/js/bundle.js */"./src/js/bundle.js");


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL2pzL2J1bmRsZS5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvanMvY29tcG9uZW50cy9tZW51LmpzIiwid2VicGFjazovLy8uL3NyYy9qcy9jb21wb25lbnRzL3dvb2xsLmpzIl0sIm5hbWVzIjpbImNvbnNvbGUiLCJsb2ciLCJqUXVlcnkiLCJjbGljayIsInRvZ2dsZUNsYXNzIiwid2luZG93Iiwic2Nyb2xsIiwic2Nyb2xsVG9wIiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyIsImRvY3VtZW50IiwicmVhZHkiLCJldmVudCIsImFuaW1hdGUiLCJvZmZzZXQiLCJ0b3AiLCJkdXJhdGlvbiIsIm9uIiwiY3NzIiwicHJlcGVuZCIsImFwcGVuZCIsInBhcmVudCIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImZpbmQiLCJzaWJsaW5ncyIsImVtcHR5IiwiYm9keSIsImFkZEV2ZW50TGlzdGVuZXIiLCJjbGFzc0xpc3QiLCJhZGQiLCJrZXlDb2RlIiwicmVtb3ZlIl0sIm1hcHBpbmdzIjoiO1FBQUE7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7OztRQUdBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQSwwQ0FBMEMsZ0NBQWdDO1FBQzFFO1FBQ0E7O1FBRUE7UUFDQTtRQUNBO1FBQ0Esd0RBQXdELGtCQUFrQjtRQUMxRTtRQUNBLGlEQUFpRCxjQUFjO1FBQy9EOztRQUVBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQSx5Q0FBeUMsaUNBQWlDO1FBQzFFLGdIQUFnSCxtQkFBbUIsRUFBRTtRQUNySTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBLDJCQUEyQiwwQkFBMEIsRUFB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QUQsQ0FBTixDQUFhc0IsSUFBYixDQUFrQixzQkFBbEIsRUFBMENwQixXQUExQyxDQUFzRCxtQkFBdEQ7QUFDQUYsUUFBTSxDQUFDLElBQUQsQ0FBTixDQUFhdUIsUUFBYixDQUFzQixJQUF0QixFQUE0QnJCLFdBQTVCLENBQXdDLFFBQXhDO0FBQ0QsQ0FIRDtBQUlBRixNQUFNLENBQUMscURBQUQsQ0FBTixDQUE4RE0sUUFBOUQsQ0FBdUUsbUJBQXZFO0FBQ0FOLE1BQU0sQ0FBQyxpQ0FBRCxDQUFOLENBQTBDTSxRQUExQyxDQUFtRCxRQUFuRDtBQUNBTixNQUFNLENBQUMscUJBQUQsQ0FBTixDQUE4QndCLEtBQTlCO0FBQ0F4QixNQUFNLENBQUMscUJBQUQsQ0FBTixDQUE4QndCLEtBQTlCO0FBQ0F4QixNQUFNLENBQUMscUJBQUQsQ0FBTixDQUE4QmtCLE1BQTlCLENBQXFDLHNDQUFyQztBQUNBbEIsTUFBTSxDQUFDLHFCQUFELENBQU4sQ0FBOEJrQixNQUE5QixDQUFxQyxxQ0FBckMsRSxDQUVBOztBQUNBVixRQUFRLENBQUNpQixJQUFULENBQWNDLGdCQUFkLENBQStCLFdBQS9CLEVBQTRDLFlBQVc7QUFDckRsQixVQUFRLENBQUNpQixJQUFULENBQWNFLFNBQWQsQ0FBd0JDLEdBQXhCLENBQTRCLGFBQTVCO0FBQ0QsQ0FGRCxFLENBSUE7O0FBQ0FwQixRQUFRLENBQUNpQixJQUFULENBQWNDLGdCQUFkLENBQStCLFNBQS9CLEVBQTBDLFVBQVNoQixLQUFULEVBQWdCO0FBQ3hELE1BQUlBLEtBQUssQ0FBQ21CLE9BQU4sS0FBa0IsQ0FBdEIsRUFBeUI7QUFDdkJyQixZQUFRLENBQUNpQixJQUFULENBQWNFLFNBQWQsQ0FBd0JHLE1BQXhCLENBQStCLGFBQS9CO0FBQ0Q7QUFDRixDQUpELEUsQ0FNQTtBQUNBO0FBQ0E7QUFDQSxLIiwiZmlsZSI6ImJ1bmRsZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGdldHRlciB9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yID0gZnVuY3Rpb24oZXhwb3J0cykge1xuIFx0XHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcbiBcdFx0fVxuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xuIFx0fTtcblxuIFx0Ly8gY3JlYXRlIGEgZmFrZSBuYW1lc3BhY2Ugb2JqZWN0XG4gXHQvLyBtb2RlICYgMTogdmFsdWUgaXMgYSBtb2R1bGUgaWQsIHJlcXVpcmUgaXRcbiBcdC8vIG1vZGUgJiAyOiBtZXJnZSBhbGwgcHJvcGVydGllcyBvZiB2YWx1ZSBpbnRvIHRoZSBuc1xuIFx0Ly8gbW9kZSAmIDQ6IHJldHVybiB2YWx1ZSB3aGVuIGFscmVhZHkgbnMgb2JqZWN0XG4gXHQvLyBtb2RlICYgOHwxOiBiZWhhdmUgbGlrZSByZXF1aXJlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnQgPSBmdW5jdGlvbih2YWx1ZSwgbW9kZSkge1xuIFx0XHRpZihtb2RlICYgMSkgdmFsdWUgPSBfX3dlYnBhY2tfcmVxdWlyZV9fKHZhbHVlKTtcbiBcdFx0aWYobW9kZSAmIDgpIHJldHVybiB2YWx1ZTtcbiBcdFx0aWYoKG1vZGUgJiA0KSAmJiB0eXBlb2YgdmFsdWUgPT09ICdvYmplY3QnICYmIHZhbHVlICYmIHZhbHVlLl9fZXNNb2R1bGUpIHJldHVybiB2YWx1ZTtcbiBcdFx0dmFyIG5zID0gT2JqZWN0LmNyZWF0ZShudWxsKTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yKG5zKTtcbiBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KG5zLCAnZGVmYXVsdCcsIHsgZW51bWVyYWJsZTogdHJ1ZSwgdmFsdWU6IHZhbHVlIH0pO1xuIFx0XHRpZihtb2RlICYgMiAmJiB0eXBlb2YgdmFsdWUgIT0gJ3N0cmluZycpIGZvcih2YXIga2V5IGluIHZhbHVlKSBfX3dlYnBhY2tfcmVxdWlyZV9fLmQobnMsIGtleSwgZnVuY3Rpb24oa2V5KSB7IHJldHVybiB2YWx1ZVtrZXldOyB9LmJpbmQobnVsbCwga2V5KSk7XG4gXHRcdHJldHVybiBucztcbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAwKTtcbiIsIi8vIGJ1bmRsZS5qc1xuLy8gaW1wb3J0ICcuL2NvbXBvbmVudHMvc2xpY2snO1xuaW1wb3J0ICcuL2NvbXBvbmVudHMvbWVudSc7XG5pbXBvcnQgJy4vY29tcG9uZW50cy9zbGlkZXInO1xuaW1wb3J0ICcuL2NvbXBvbmVudHMvd29vbGwnO1xuXG4vLyBpbXBvcnQgeyBXT1cgfSBmcm9tICd3b3dqcyc7XG5jb25zb2xlLmxvZygnYnVuZGxlcyAnKTtcbiIsImpRdWVyeShcIi5oYW1idXJnZXJcIikuY2xpY2soZnVuY3Rpb24oKXtcclxuICBqUXVlcnkoXCIuaGFtYnVyZ2VyXCIpLnRvZ2dsZUNsYXNzKFwiaXMtYWN0aXZlXCIpO1xyXG4gIGpRdWVyeShcIiNtb2JpbGVNZW51XCIpLnRvZ2dsZUNsYXNzKFwic2hvd01lbnVcIik7XHJcbn0pO1xyXG5cclxualF1ZXJ5KHdpbmRvdykuc2Nyb2xsKGZ1bmN0aW9uKCkge1xyXG4gIGlmKGpRdWVyeSh3aW5kb3cpLnNjcm9sbFRvcCgpID4gNTApIHtcclxuICAgIGpRdWVyeShcImhlYWRlclwiKS5hZGRDbGFzcyhcImFjdGl2ZVwiKTtcclxuICB9XHJcbiAgZWxzZSBpZihqUXVlcnkod2luZG93KS5zY3JvbGxUb3AoKSA8IDUwKSB7XHJcbiAgICBqUXVlcnkoXCJoZWFkZXJcIikucmVtb3ZlQ2xhc3MoXCJhY3RpdmVcIik7XHJcbiAgfVxyXG59KTtcclxuXHJcbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XHJcbiAgalF1ZXJ5KFwiLnNjcm9sbERvd25cIikuY2xpY2soZnVuY3Rpb24oZXZlbnQpIHtcclxuICAgIGpRdWVyeShcImh0bWwsIGJvZHlcIikuYW5pbWF0ZShcclxuICAgICAge1xyXG4gICAgICAgIHNjcm9sbFRvcDogalF1ZXJ5KFwiLnBhZ2VDb250YWluZXJcIikub2Zmc2V0KCkudG9wXHJcbiAgICAgIH0sXHJcbiAgICAgIHtcclxuICAgICAgICBkdXJhdGlvbjogMTAwMCxcclxuICAgICAgfVxyXG4gICAgKTtcclxuICB9KTtcclxufSk7XHJcbiIsImpRdWVyeSgnLmFkZF90b19jYXJ0X2J1dHRvbicpLm9uKCdjbGljaycsZnVuY3Rpb24oKSB7XHJcbiAgalF1ZXJ5KHRoaXMpLmNzcygnZGlzcGxheScsJ25vbmUnKTtcclxuICBjb25zb2xlLmxvZyh0aGlzKTtcclxufSk7XHJcblxyXG5qUXVlcnkoJy5jYXQtcGFyZW50JykucHJlcGVuZCgnPGRpdiBjbGFzcz1cIm9wZW5UYWJcIj48aSBjbGFzcz1cImljb24tZG93bi1vcGVuLW1pbmlcIj48L2k+PC9kaXY+Jyk7XHJcbmpRdWVyeSgnLm1lbnUtaXRlbS1oYXMtY2hpbGRyZW4gPiBhJykuYXBwZW5kKCc8ZGl2IGNsYXNzPVwib3BlblRhYk1lbnVcIj48aSBjbGFzcz1cImljb24tZG93bi1vcGVuLW1pbmlcIj48L2k+PC9kaXY+Jyk7XHJcblxyXG5qUXVlcnkoXCIub3BlblRhYk1lbnVcIikuY2xpY2soZnVuY3Rpb24oKXtcclxuICBqUXVlcnkodGhpcykucGFyZW50KFwiYVwiKS50b2dnbGVDbGFzcygnaXMtYWN0aXZlJyk7XHJcbn0pO1xyXG5cclxualF1ZXJ5KCcub3BlblRhYk1lbnUnKS5vbignY2xpY2snLGZ1bmN0aW9uKGUpIHsgZS5wcmV2ZW50RGVmYXVsdCgpfSk7XHJcblxyXG5qUXVlcnkoJy5vcGVuVGFiTWVudScpLm9uKCdjbGljaycsZnVuY3Rpb24oKSB7XHJcbiAgalF1ZXJ5KHRoaXMpLmZpbmQoJy5pY29uLWRvd24tb3Blbi1taW5pJykudG9nZ2xlQ2xhc3MoJ2ljb24tdXAtb3Blbi1taW5pJyk7XHJcbiAgalF1ZXJ5KHRoaXMpLnNpYmxpbmdzKCd1bCcpLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcclxufSk7XHJcblxyXG5qUXVlcnkoJy5vcGVuVGFiJykub24oJ2NsaWNrJyxmdW5jdGlvbigpIHtcclxuICBqUXVlcnkodGhpcykuZmluZCgnLmljb24tZG93bi1vcGVuLW1pbmknKS50b2dnbGVDbGFzcygnaWNvbi11cC1vcGVuLW1pbmknKTtcclxuICBqUXVlcnkodGhpcykuc2libGluZ3MoJ3VsJykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xyXG59KTtcclxualF1ZXJ5KCcuY3VycmVudC1jYXQtcGFyZW50ID4gLm9wZW5UYWIgLmljb24tZG93bi1vcGVuLW1pbmknKS5hZGRDbGFzcygnaWNvbi11cC1vcGVuLW1pbmknKTtcclxualF1ZXJ5KCcuY3VycmVudC1jYXQtcGFyZW50ID4gLmNoaWxkcmVuJykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xyXG5qUXVlcnkoJy5wYWdlLW51bWJlcnMgLm5leHQnKS5lbXB0eSgpO1xyXG5qUXVlcnkoJy5wYWdlLW51bWJlcnMgLnByZXYnKS5lbXB0eSgpO1xyXG5qUXVlcnkoJy5wYWdlLW51bWJlcnMgLm5leHQnKS5hcHBlbmQoJzxpIGNsYXNzPVwiaWNvbi1yaWdodC1vcGVuLW1pbmlcIj48L2k+Jyk7XHJcbmpRdWVyeSgnLnBhZ2UtbnVtYmVycyAucHJldicpLmFwcGVuZCgnPGkgY2xhc3M9XCJpY29uLWxlZnQtb3Blbi1taW5pXCI+PC9pPicpO1xyXG5cclxuLy8gTGV0IHRoZSBkb2N1bWVudCBrbm93IHdoZW4gdGhlIG1vdXNlIGlzIGJlaW5nIHVzZWRcclxuZG9jdW1lbnQuYm9keS5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWRvd24nLCBmdW5jdGlvbigpIHtcclxuICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoJ3VzaW5nLW1vdXNlJyk7XHJcbn0pO1xyXG5cclxuLy8gUmUtZW5hYmxlIGZvY3VzIHN0eWxpbmcgd2hlbiBUYWIgaXMgcHJlc3NlZFxyXG5kb2N1bWVudC5ib2R5LmFkZEV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLCBmdW5jdGlvbihldmVudCkge1xyXG4gIGlmIChldmVudC5rZXlDb2RlID09PSA5KSB7XHJcbiAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoJ3VzaW5nLW1vdXNlJyk7XHJcbiAgfVxyXG59KTtcclxuXHJcbi8vIEFsdGVybmF0aXZlbHksIHJlLWVuYWJsZSBmb2N1cyBzdHlsaW5nIHdoZW4gYW55IGtleSBpcyBwcmVzc2VkXHJcbi8vZG9jdW1lbnQuYm9keS5hZGRFdmVudExpc3RlbmVyKCdrZXlkb3duJywgZnVuY3Rpb24oKSB7XHJcbi8vICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoJ3VzaW5nLW1vdXNlJyk7XHJcbi8vfSk7XHJcbiJdLCJzb3VyY2VSb290IjoiIn0=