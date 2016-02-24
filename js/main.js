/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

var Twitter = {
  tweetsWidth: undefined,
  animation: undefined,
  $twitterFeed: $('#twitter-feed'),
  $holder: $('#twitter-marquee-holder'),
  init: function() {
    var _this = this;
    var tweets = $('.twitter-marquee').first();

    // clone tweets to avoid blank space
    tweets.clone().appendTo('#twitter-marquee-holder');

    // set width for animation
    _this.tweetsWidth = tweets.width();

    // setup animation
    _this.startAnimation();

    // bind hovers
    _this.bind();
  },

  bind: function() {
    var _this = this;

    _this.$twitterFeed.on({
      'mouseenter.twitterHover': function() {
        _this.stopAnimation();
      },

      'mouseleave.twitterHover': function() {
        _this.startAnimation();
      },
    });

  },

  unbind: function() {

    this.$twitterFeed.off('.twitterHover');

  },

  startAnimation: function() {
    var _this = this;

    return _this.animation = setInterval(function() {

      var left = parseInt(_this.$holder.css('left'));

      if (left < - _this.tweetsWidth) {
        _this.$holder.css('left', '0px');
      } else {
        _this.$holder.css('left', (left - 1) + 'px');
      }

    }, 25);

  },

  stopAnimation: function() {

    return clearInterval(this.animation);

  },
};

jQuery(document).ready(function () {
  'use strict';

  Twitter.init();
});
