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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(document).ready(function ($) {
  //Cookie
  if (Cookies.get('yabu') !== 'closed') {
    $('.yabu-cookie').delay(3000).fadeIn();
  }

  $('.reject-cookie').on('click', function () {
    Cookies.set('yabu', 'closed', {
      expires: 1
    });
    $('.yabu-cookie').fadeOut();
  });
  $('.accept-cookie').on('click', function () {
    Cookies.set('yabu', 'closed', {
      expires: 60
    });
    $('.yabu-cookie').fadeOut();
  }); //Progress Bar

  window.onscroll = function () {
    yabuProgressBar();
  };

  function yabuProgressBar() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = winScroll / height * 100;
    document.getElementById('progressBar').style.height = scrolled + "%";
  } //Switch Dark Mode


  var toggleSwitch = document.querySelector('.switch-input');
  var textBox = document.querySelector('.theme-toggle-text');

  function switchTheme(event) {
    if (event.target.checked) {
      document.documentElement.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-theme', 'light');
      localStorage.setItem('theme', 'light');
    }
  }

  toggleSwitch.addEventListener('change', switchTheme);
  var currentTheme = localStorage.getItem('theme');

  if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
      toggleSwitch.checked = true;
    }
  } //Slider Testimonials


  $('.loop-testimonials').slick({
    arrows: false,
    dots: true,
    slidesToShow: 2,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [{
      breakpoint: 992,
      settings: {
        slidesToShow: 1
      }
    }]
  }); //Project Filter-Isotope

  var $grid = $('.loop-projects');
  $grid.isotope({
    itemSelector: '.project-item',
    layoutMode: 'fitRows',
    percentPosition: true,
    masonry: {
      isFitWidth: true,
      isAnimated: true
    }
  });
  $('.filter-btn-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({
      filter: filterValue
    });
  });
  $('.filter-projects').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $(this).addClass('is-checked');
    });
  }); //Project Progress

  var progressBarr = $('#progressbar').circleProgress({
    size: 175,
    thickness: 1,
    startAngle: -Math.PI / 2,
    fill: {
      gradient: ["#343a40", "#5f5f5f"]
    },
    animation: {
      duration: 4000
    }
  });
  progressBarr.on('circle-animation-progress', function (event, progress, stepValue) {
    if ($(this).data('value') === '1.0') {
      $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
    } else {
      $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2) + '%');
    }
  });
});

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************!*\
  !*** multi ./src/js/main.js ./src/scss/main.scss ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/luciandev/Desktop/Projects_Dev/Lucian DEV/lucian-dev-v2/wp-content/themes/Lucian-DEV-v2/src/js/main.js */"./src/js/main.js");
module.exports = __webpack_require__(/*! /Users/luciandev/Desktop/Projects_Dev/Lucian DEV/lucian-dev-v2/wp-content/themes/Lucian-DEV-v2/src/scss/main.scss */"./src/scss/main.scss");


/***/ })

/******/ });
//# sourceMappingURL=main.js.map