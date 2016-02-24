/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

var basicAnimationSpeed = 800;

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

  Menu.init();

});
