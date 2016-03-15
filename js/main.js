/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr, Ajaxy, WP */

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

  closeBelowMenu: function(search) {
    var _this = this;
    var drawers = '#drawer-follow, #drawer-categorias';

    if ( !search ) {
      drawers += ', #drawer-search';
      _this.cleanSearch();
    }

    return $(drawers).slideUp(basicAnimationSpeed);

  },

  cleanSearch: function() {
    $('#search-field').val('');
  },
};

// AJAX
Ajaxy = {
  init: function() {
    var _this = this;

    // This var is checked below. It helps prevent Safari's popstate on load to
    // reload (ajax) the site.
    _this.firstLoad = true;

    // Bind links
    _this.bindLinks();
    _this.bindSearchForm();

    $(window).bind('popstate', function(event) {
      if( !_this.firstLoad ) {
        _this.load(document.location.origin + document.location.pathname, false);
      }
    });

  },

  bindLinks: function() {
    var _this = this;

    var siteURL = "http://" + top.location.host.toString();

    _this.$ajaxyLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
    //_this.$elementsToHide = $('.nav, #main-container, #three-scene');

    // Find all ajaxy links and bind ajax event
    _this.$ajaxyLinks.click(function(event) {

      // Detect if is cmd+click or ctrl+click or has been defaultPrevented somewhere else
      if ( !event.isDefaultPrevented() && !event.metaKey && !event.ctrlKey ) {
        event.preventDefault();

        var url = event.currentTarget.href;

        _this.load(url);
      }

      return;

    });
  },

  bindSearchForm: function() {
    var _this = this;

    $('#search-form').submit( function(event) {
      event.preventDefault();

      // Get search string
      var search = $('#search-field').val();

      _this.load(WP.siteUrl + '/?s=' + search);

    });
  },

  reset: function() {
    var _this = this;

    // Unbind click from all ajax links
    _this.$ajaxyLinks.unbind('click');

    // Re initiate
    _this.bindLinks();
  },

  /*
   * Load a new URL thru ajax
   * @url {String}: URL to load
   * @pushState {Bool}: Make false if a new state doens't need to be pushed (Default: true). Ex, going back
   */
  load: function(url, pushState) {
    var _this = this;

    _this.firstLoad = false;

    // Default pushState to true
    pushState = typeof pushState !== 'undefined' ? pushState : true;

    if( pushState ) {
      // Push new history state
      history.pushState(null, null, url);
    }

    $.ajax(url, {
      beforeSend: function(xhr, settings) {
        _this.ajaxBefore(settings.url);
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

  ajaxBefore: function(url) {
    var _this = this;

    var search = false;

    if( url.indexOf('/?s=') > -1) {
      search = true;
    }

    Menu.closeBelowMenu(search);

    $('body').addClass('loading');
    $('body, html').animate({
      scrollTop: 0,
    }, basicAnimationSpeed);
  },

  ajaxAfter: function() {
    var _this = this;

    $('body').removeClass('loading');

    _this.reset();

    // Resets from other parts of the website
    Site.reinit();

  },

  ajaxErrorHandler: function(jqXHR, textStatus) {
    //alert(textStatus);
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

    // Update with new title, content and classes
    document.title = $title;
    $('#main-content').html($content.html());
    $('body').removeAttr('class').addClass($bodyClasses + ' loading');

  },
};

Site = {
  init: function() {
    var _this = this;

    _this.bindVerMas();
    _this.fixWidows();

    Ajaxy.init();
    Twitter.init();
    Menu.init();
  },

  reinit: function() {
    var _this = this;

    _this.bindVerMas();
    _this.fixWidows();

    Twitter.init();

  },

  // ver mas link on homepage
  bindVerMas: function() {
    $('#more-posts').on({
      click: function(e) {
        var $this = $(this);
        var offset = $this.offset();

        if ($this.hasClass('js-next-page')) {
          Ajaxy.load($this.data('href'));
        } else {
          $('.feed-post.u-hidden').removeClass('u-hidden');
          $this.addClass('js-next-page');

          $('body, html').animate({
            scrollTop: offset.top - 35,
          }, basicAnimationSpeed);

        }
      },
    });
  },

  fixWidows: function() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();

      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  },

};

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});

