(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

/*  baseUrl: "../Public/public/js/lib",*/
/*stellar*/

var contentWayPoint = function contentWayPoint() {
    $('.animate-box').waypoint(function (direction) {
        if (direction === 'down' && !$(this.element).hasClass('animated-fast')) {
            $(this.element).addClass('item-animate');
            setTimeout(function () {
                $('body .animate-box.item-animate').each(function (item) {
                    var el = $(this);
                    setTimeout(function () {
                        var effect = el.data('animate-effect');
                        if (effect == 'fadeIn') {
                            el.addClass('fadeIn animated-fast');
                        } else if (effect === 'fadeInLeft') {
                            el.addClass('fadeInLeft animated-fast');
                        } else if (effect === 'fadeInRight') {
                            el.addClass('fadeInRight animated-fast');
                        } else {
                            el.addClass('fadeInUp animated-fast');
                        }
                        el.removeClass('item-animate');
                    }, item * 200, 'easeInOutExpo');
                });
            }, 100);
        }
    }, {
        offset: '85%'
    });
};
contentWayPoint();
},{}]},{},[1])