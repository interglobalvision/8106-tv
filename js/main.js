/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

var basicAnimationSpeed = 800;

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

var Menu = {
  init: function() {

    this.bind();

  },

  bind: function() {
    var _this = this;

    return $('.js-nav-trigger').on({
      'click.nav-trigger': function() {
        var target = $(this).data('nav-target');

        _this.click(target);
      },
    });

  },

  unbind: function() {

    return $('.js-nav-trigger').off('click.nav-trigger');

  },

  click: function(target) {

    return $('#drawer-' + target).slideToggle(basicAnimationSpeed);

  },

  closeBelowMenu: function() {
    // for after AJAX loads or clicks?

    return $('#drawer-search, #drawer-follow, #drawer-categorias').slideUp(basicAnimationSpeed);

  },
};

jQuery(document).ready(function () {
  'use strict';

  Twitter.init();
  Menu.init();

});
