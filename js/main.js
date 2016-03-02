/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr, Ajaxy */

var basicAnimationSpeed = 800;
var fastAnimationSpeed = basicAnimationSpeed / 2;

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

// AJAX
Ajaxy = {
  init: function() {
    var _this = this;
    
    var siteURL = "http://" + top.location.host.toString();

    _this.$ajaxyLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
    //_this.$elementsToHide = $('.nav, #main-container, #three-scene');

    // Find all ajaxy links and bind ajax event
    _this.$ajaxyLinks.click(function(event) {
      event.preventDefault();

      var url = event.currentTarget.href;

      _this.ajaxLoad(url);

    });

    $(document).ready( function() {
      // For back button
      window.onpopstate = function() {
        _this.ajaxLoad(document.location.origin + document.location.pathname);
      };
    });
  },

  reset: function() {
    var _this = this;

    // Unbind click from all ajax links
    _this.$ajaxyLinks.unbind('click');

    // Re initiate
    _this.init();
  },

  ajaxLoad: function(url) {
    var _this = this;

    $.ajax(url, {
      beforeSend: function() {
        _this.ajaxBefore();
      },

      dataType: 'html',
      error: function(jqXHR, textStatus) {
        _this.ajaxErrorHandler(jqXHR, textStatus);
      },

      success: function(data) {
        _this.ajaxSuccess(data, url);
      },

      complete: function() {
        _this.ajaxAfter();
      },
    });
  },

  ajaxBefore: function() {
    var _this = this;

    $('body').addClass('loading');
    $('body, html').animate({
      scrollTop: 0,
    }, fastAnimationSpeed);
  },

  ajaxAfter: function() {
    var _this = this;

    $('body').removeClass('loading');

    _this.reset();

    // Resets from other parts of the website
    Twitter.init();

  },

  ajaxErrorHandler: function(jqXHR, textStatus) {
    alert(textStatus);
    console.log(jqXHR);
  },

  ajaxSuccess: function(data,url) {

    // Convert data into proper html to be able to fully parse thru jQuery
    var respHtml = document.createElement('html');

    respHtml.innerHTML = data;

    // Get changes: body classes, page title, main content, header
    var $bodyClasses = $('body', respHtml).attr('class');
    var $content = $('#main-content', respHtml);
    var $title = $('title', respHtml).text();

    // Push new history state and update title
    history.pushState(null, $title, url);
    document.title = $title;

    // Update with new content and classes
    $('#main-content').html($content.html());
    $('body').removeAttr('class').addClass($bodyClasses + ' loading');

  },
};

jQuery(document).ready(function () {
  'use strict';

  // utility class mainly for use on headines to avoid widows [single words on a new line]
  $('.js-fix-widows').each(function(){
    var string = $(this).html();

    string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
    $(this).html(string);
  });

  Twitter.init();
  Menu.init();

  Ajaxy.init('#drawer-categorias-list a, #footer-categorias-list a');

  // ver mas link on homepage
  $('#more-posts').on({
    click: function(e) {
      var _this = $(this);

      if (_this.hasClass('js-next-page')) {
        debugger;
        // trigger ajax page load? or?
      } else {
        e.preventDefault();
        $('.feed-post.u-hidden').removeClass('u-hidden');
        _this.addClass('js-next-page');
      }
    },
  });

});

