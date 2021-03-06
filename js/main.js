/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Ajaxy, WP, FB, googletag, Site, Featured, GlobieHypeBeast, twttr */

var basicAnimationSpeed = 800;

var Twitter = {
  tweetsWidth: undefined,
  init: function() {
    var _this = this;

    _this.$twitterFeed = $('#twitter-feed');
    _this.$holder = $('#twitter-marquee-holder');

    var tweets = $('.twitter-marquee').first();

    // clone tweets to avoid blank space
    tweets.clone().appendTo('#twitter-marquee-holder');

    // set width for animation
    _this.tweetsWidth = tweets.width();

    // start animation
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

    _this.animationFrame = window.requestAnimationFrame(function() {
      _this.animation();
    });
  },

  animation: function() {
    var _this = this;

    var left = parseInt(_this.$holder.css('left'));

    if (left < - _this.tweetsWidth) {
      _this.$holder.css('left', '0px');
    } else {
      _this.$holder.css('left', (left - 1) + 'px');
    }

    // Save animation frame id for later use in stopAnimation()
    _this.animationFrame = window.requestAnimationFrame(function() {
      _this.animation();
    });

  },

  stopAnimation: function() {
    var _this = this;

    // cancelAnimationFrame() is a global
    cancelAnimationFrame(_this.animationFrame);

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

    $(window).bind('popstate', function() {
      if( !_this.firstLoad ) {
        _this.load(document.location.origin + document.location.pathname, false);
      }
    });

  },

  bindLinks: function() {
    var _this = this;

    var siteURL = "http://" + top.location.host.toString();

    _this.$ajaxyLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']").not('#wpadminbar a');
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
    Twitter.stopAnimation();

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
    console.log(textStatus);
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

    // Update Admin Bar
    if( WP.isAdmin ) {
      $('#wpadminbar').html( $('#wpadminbar', respHtml) );
    }

    // Update Hype
    if( typeof GlobieHypeBeast !== 'undefined') {
      GlobieHypeBeast.urlLoaded(url);
    }

  },
};

Featured = {
  init: function() {
    var _this = this;

    _this.setCols();

    $(window).resize( function() {
      _this.setCols();
    });
  },

  setCols: function() {
    var _this = this;

    if ( $('#featured-post-container').length ) {

      // Get image height
      var $maxHeight = $('#featured-post-image').outerHeight();

      // Set max heights
      if( $(window).width() > 720 ) {
        $('#featured-post-container, #featured-post-title-holder, #featured-post-title, #featured-post-subtitle-holder, #featured-post-subtitle, #featured-post-image-holder').css('max-height', $maxHeight + 'px');
      } else {
        $('#featured-post-container, #featured-post-title-holder, #featured-post-title, #featured-post-subtitle-holder, #featured-post-subtitle, #featured-post-image-holder').css('max-height', 'initial');
      }

      // Title
      var $titleHolder = $('#featured-post-title-holder');

      // Get all classes except for s* ones
      var cleanClasses = $titleHolder.attr('class').replace(/s\d+/,'');

      // Replace title classes with clean ones
      $titleHolder.removeClass().addClass(cleanClasses);

      // Set col size
      var titleCol = 0;

      for (var i = 1; i <= 6; i++ ) {
        $titleHolder.removeClass('s' + (i - 1) ).addClass('s' + i );
        titleCol = i;
        if ( $titleHolder.width() > $('#featured-post-title').width() ) {
          break;
        }
      }

      // Calc left space (in 'col' units) :]
      var leftCol = 10 - 1 - titleCol;

      // Subtitle
      var $subtitleHolder = $('#featured-post-subtitle-holder');

      if( $subtitleHolder.length ) {
        // Get all classes except for s* ones
        var cleanClasses = $subtitleHolder.attr('class').replace(/s\d+/,'');

        // Replace title classes with clean ones
        $subtitleHolder.removeClass().addClass(cleanClasses);

        // Set col size
        for (var i = 1; i < leftCol; i++ ) {
          $subtitleHolder.removeClass('s' + (i - 1)).addClass('s' + i);
          if ( $subtitleHolder.width() > $('#featured-post-subtitle').width() ) {
            break;
          }
        }
      }

      $('#featured-post-container').css('opacity', 1);

    }
  },
};

Site = {
  init: function() {
    var _this = this;

    _this.bindVerMas();
    _this.bindMoreScroll();
    _this.fixWidows();

    Ajaxy.init();
    Twitter.init();
    Menu.init();

    $('#featured-post-container').imagesLoaded(function() {
      Featured.init();
    });

    $('.cycle-slider').imagesLoaded(function() {
      $('.cycle-slider').cycle();
    });
  },

  reinit: function() {
    var _this = this;

    _this.bindVerMas();
    _this.bindMoreScroll();
    _this.fixWidows();

    Twitter.init();

    $('#featured-post-container').imagesLoaded(function() {
      Featured.setCols();
    });

    $('.cycle-slider').imagesLoaded(function() {
      $('.cycle-slider').cycle();
    });

    // Re render fb/tw buttons
    if( typeof twttr !== 'undefined') {
      twttr.widgets.load();
    }

    if( typeof FB !== 'undefined') {
      FB.XFBML.parse();
    }

    // Reload Ads
    if( typeof googletag !== 'undefined') {
      googletag.cmd.push(function() {
        googletag.pubads().refresh();
      });
    }

  },

  // ver mas link on homepage
  bindVerMas: function() {
    $('#more-posts').on({
      click: function() {
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

  bindMoreScroll: function() {
    $('#more-music').on({
      click: function() {
        var $this = $(this);
        var offset = $this.offset();

        $('body, html').animate({
          scrollTop: offset.top - 35,
        }, basicAnimationSpeed);

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

