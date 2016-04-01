<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php get_template_part('partials/seo'); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">


  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr.js"></script>
  <script type="text/javascript">
    /* Modernizr 2.8.3 (Custom Build) | MIT & BSD Build: http://modernizr.com/download/#-shiv-mq-cssclasses-teststyles-load */
 //    ;window.Modernizr=function(a,b,c){function w(a){j.cssText=a}function x(a,b){return w(prefixes.join(a+";")+(b||""))}function y(a,b){return typeof a===b}function z(a,b){return!!~(""+a).indexOf(b)}function A(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:y(f,"function")?f.bind(d||b):f}return!1}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m={},n={},o={},p=[],q=p.slice,r,s=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},t=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b)&&c(b).matches||!1;var d;return s("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},u={}.hasOwnProperty,v;!y(u,"undefined")&&!y(u.call,"undefined")?v=function(a,b){return u.call(a,b)}:v=function(a,b){return b in a&&y(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=q.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(q.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(q.call(arguments)))};return e});for(var B in m)v(m,B)&&(r=B.toLowerCase(),e[r]=m[B](),p.push((e[r]?"":"no-")+r));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)v(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},w(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e.mq=t,e.testStyles=s,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+p.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
    Modernizr.load([
      {
        test: Modernizr.mq('only all'),
        nope: "<?php bloginfo('stylesheet_directory'); ?>/js/polyfills/mediaqueries.js"
      }
    ]);
    Modernizr.addTest('high-resolution-display', function() {
    	if (window.matchMedia) {
    		var mq = window.matchMedia("only screen and (-moz-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
    		if(mq && mq.matches) {
    			return true;
    		} else {
      		return false;
    		}
      }
    });
    Modernizr.addTest('mobile-or-tablet', function() {
      var a = navigator.userAgent||navigator.vendor||window.opera;
      if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) {
        return true;
      } else {
        return false;
      }
    });
  </script>

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <?php
  // Google DFP Header code
  echo IGV_get_option('_igv_ads_doc_header_code');
  ?>
  <?php get_template_part('partials/theme-style'); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

  <section id="main-container">

  <div id="header-advert-space" class="theme-bg theme-pattern-bg">
    <div class="container">
      <div class="row u-align-center">
      <?php
      // Leaderboard Ad
      echo IGV_get_option('_igv_ads_top_leaderboard');
      ?>
      </div>
    </div>
  </div>

<?php
// Get radio embed code
$radio_embed = IGV_get_option('_igv_radio_embed');

if ($radio_embed) {
?>
  <div id="drawer-radio" class="header-drawer theme-grad-bg u-fc">
    <div class="container">
      <div class="row">
        <div class="col s24">
<?php echo $radio_embed; ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

  <header id="header" class="container">
    <div class="row">
      <div class="col s13">
        <a href="<?php echo home_url(); ?>"><?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/img/dist/8106-logo.svg'); ?></a>
      </div>
      <div class="col s3 font-century-gothic u-align-center">
        <a class="js-nav-trigger u-pointer" data-nav-target="categorias">Categorias</a>
      </div>
      <div class="col s3 font-century-gothic u-align-center">
        <a class="js-nav-trigger u-pointer" data-nav-target="radio">Radio</a>
      </div>
      <div class="col s3 font-century-gothic u-align-center">
        <a class="js-nav-trigger u-pointer" data-nav-target="follow">Follow</a>
      </div>
      <div class="col s2 font-century-gothic u-align-center">
        <a class="js-nav-trigger u-pointer" data-nav-target="search"><span class="genericon genericon-search"></span></a>
      </div>
    </div>
  </header>

<?php

// Get Sponsored cat ID
$sponsored_cat = get_category_by_slug('sponsored');
$sponsored_id = '-' . $sponsored_cat->cat_ID;

?>

  <div id="drawer-categorias" class="header-drawer theme-grad-bg u-fc">
    <div class="container">
      <div class="row">
        <div class="col s24">
          <ul id="drawer-categorias-list" class="font-century-gothic">
<?php 
wp_list_categories( array(
  'title_li' => '',
  'exclude'  => $sponsored_id,
)); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div id="drawer-follow"  class="header-drawer theme-grad-bg font-century-gothic">
    <div class="container">
      <div class="social-icon">
        <a href="https://twitter.com/8106" target="_blank">
<svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.375-1.337.648-2.085.795-.598-.638-1.45-1.036-2.396-1.036-1.812 0-3.282 1.468-3.282 3.28 0 .258.03.51.085.75C5.152 5.39 2.733 4.084 1.114 2.1.83 2.583.67 3.147.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.416-.02-.617-.058.418 1.304 1.63 2.253 3.067 2.28-1.124.88-2.54 1.404-4.077 1.404-.265 0-.526-.015-.783-.045 1.453.93 3.178 1.474 5.032 1.474 6.038 0 9.34-5 9.34-9.338 0-.143-.004-.284-.01-.425.64-.463 1.198-1.04 1.638-1.7z" fill-rule="nonzero"/></svg>
</a>
      </div>
      <div class="social-icon">
        <a href="https://www.facebook.com/8106tv" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.476-1.195 1.176v1.54h2.39l-.31 2.416h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"/></svg>
        </a>
      </div>
      <div class="social-icon">
        <a href="http://8106.tumblr.com/" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M9.708 16c-3.396 0-4.687-2.504-4.687-4.274V6.498H3.403V4.432C5.83 3.557 6.412 1.368 6.55.12c.01-.086.077-.12.115-.12H9.01v4.076h3.2v2.422H8.997v4.98c.01.667.25 1.58 1.472 1.58h.067c.424-.012.994-.136 1.29-.278l.77 2.283c-.288.424-1.594.916-2.77.936h-.12z" fill-rule="nonzero"/></svg>
        </a>
      </div>
      <div class="social-icon">
        <a href="https://soundcloud.com/8106tv" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><g fill-rule="nonzero"><path d="M.773 8.13c-.034 0-.062.03-.067.066L.55 9.633l.156 1.405c.005.038.033.065.067.065.033 0 .06-.027.066-.065l.178-1.405-.18-1.437C.835 8.158.807 8.13.774 8.13M.18 8.682c-.032 0-.06.025-.063.062L0 9.634l.117.872c.004.037.03.063.064.063s.06-.027.065-.063l.14-.874-.14-.89c-.005-.036-.03-.06-.064-.06M1.4 7.85c-.04 0-.075.033-.08.078l-.148 1.705.15 1.643c.003.045.037.078.08.078.04 0 .074-.033.08-.078l.17-1.643-.17-1.705c-.006-.045-.04-.078-.08-.078M2.035 7.79c-.05 0-.09.04-.094.092l-.14 1.75.14 1.696c.005.052.045.092.095.092s.09-.04.094-.092l.16-1.695-.16-1.752c-.006-.05-.046-.09-.095-.09M2.78 11.342zM2.78 8.008c-.003-.06-.05-.106-.106-.106-.058 0-.104.046-.108.107l-.133 1.623.133 1.71c.004.06.05.105.108.105.057 0 .103-.046.107-.106l.152-1.71-.15-1.624zM3.318 6.87c-.065 0-.118.053-.12.12L3.07 9.634l.125 1.71c.003.065.056.118.12.118.065 0 .118-.053.122-.12l.14-1.708-.14-2.644c-.005-.067-.058-.12-.122-.12M3.957 6.262c-.072 0-.132.058-.135.133l-.117 3.248.117 1.698c.003.076.063.134.135.134.072 0 .13-.058.135-.133v.002l.132-1.7-.132-3.247c-.004-.075-.063-.133-.135-.133M4.62 5.968c-.08 0-.144.065-.147.148l-.11 3.52.11 1.68c.003.08.068.146.148.146.08 0 .146-.065.15-.147l.123-1.68-.123-3.52c-.004-.082-.07-.147-.15-.147M5.443 5.997c-.003-.09-.074-.16-.162-.16-.088 0-.16.07-.16.16l-.102 3.638.1 1.67c.003.09.074.16.163.16.09 0 .16-.07.163-.16l.113-1.67-.113-3.638zM5.443 11.304zM5.945 5.915c-.096 0-.173.077-.175.175l-.093 3.545.093 1.654c.002.096.08.173.175.173.096 0 .174-.077.176-.175v.002l.105-1.655L6.12 6.09c0-.098-.08-.175-.175-.175M6.615 6.03c-.104 0-.187.084-.19.19l-.084 3.416.086 1.643c.002.104.085.186.19.186.103 0 .186-.082.19-.188l.093-1.642-.095-3.416c-.003-.106-.086-.19-.19-.19M7.402 5.403c-.032-.02-.07-.034-.112-.034-.04 0-.078.01-.11.032-.054.036-.092.098-.093.17v.038L7.01 9.635l.077 1.634v.006c.003.045.02.087.048.12.037.045.093.074.155.074.055 0 .106-.023.142-.06.037-.036.06-.087.06-.142l.01-.162.077-1.47-.087-4.065c0-.07-.037-.13-.09-.167M7.493 11.27v-.002zM8.072 5.018c-.032-.02-.07-.03-.11-.03-.05 0-.1.017-.137.048-.048.04-.08.1-.08.167v.022l-.09 4.41.047.817.043.793c.002.118.1.215.217.215.118 0 .215-.097.217-.216v.002l.095-1.61-.096-4.433c-.002-.08-.045-.147-.108-.185M14.032 7.538c-.27 0-.527.055-.76.153-.158-1.773-1.645-3.164-3.46-3.164-.443 0-.876.087-1.258.235-.15.06-.188.117-.19.232v6.246c.002.12.095.215.213.226h5.455c1.087 0 1.968-.87 1.968-1.958 0-1.087-.88-1.968-1.968-1.968"/></g></svg>
        </a>
      </div>
      <div class="social-icon">
        <a href="https://www.instagram.com/8106tv/" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M14.154 16H1.846C.826 16 0 15.173 0 14.153V1.846C0 .826.826 0 1.846 0h12.308C15.174 0 16 .826 16 1.846v12.307c0 1.02-.826 1.847-1.846 1.847M8 4.923C6.3 4.923 4.923 6.3 4.923 8S6.3 11.077 8 11.077 11.077 9.7 11.077 8C11.077 6.3 9.7 4.923 8 4.923m6.154-2.462c0-.34-.275-.614-.616-.614h-1.846c-.34 0-.615.275-.615.615V4.31c0 .34.276.615.615.615h1.846c.34 0 .616-.276.616-.615V2.46zm0 4.31H12.76c.103.392.163.804.163 1.23 0 2.72-2.204 4.923-4.923 4.923-2.72 0-4.923-2.204-4.923-4.923 0-.426.06-.838.162-1.23H1.845v6.768c0 .34.275.615.616.615h11.076c.34 0 .616-.275.616-.615v-6.77z"/></svg>
        </a>
      </div>
      <div class="social-icon">
        <a href="https://www.mixcloud.com/8106tv/" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><g fill-rule="nonzero"><path d="M14.634 12.716c-.103 0-.206-.03-.297-.09-.246-.167-.31-.5-.15-.74.493-.73.75-1.588.75-2.48 0-.892-.257-1.75-.75-2.48-.165-.246-.096-.578.144-.738.247-.166.572-.097.738.143.612.91.932 1.973.932 3.076s-.32 2.167-.932 3.076c-.097.154-.263.234-.434.234z"/><path d="M13.108 11.853c-.103 0-.206-.03-.298-.092-.246-.164-.308-.496-.143-.736.326-.48.498-1.035.498-1.618 0-.577-.172-1.137-.498-1.618-.165-.245-.103-.57.143-.737.246-.165.572-.102.738.144.446.657.68 1.423.68 2.212 0 .795-.234 1.56-.68 2.212-.097.155-.27.235-.44.235zM10.62 7.085c-.21-2.132-2.01-3.8-4.2-3.8C4.606 3.284 3 4.45 2.423 6.14 1.058 6.342 0 7.52 0 8.942c0 1.562 1.275 2.836 2.84 2.836h7.272c1.31 0 2.378-1.063 2.378-2.372 0-1.137-.8-2.086-1.87-2.32zm-.508 3.63h-7.27c-.978 0-1.78-.794-1.78-1.772 0-.977.796-1.772 1.78-1.772.473 0 .92.184 1.257.52.204.207.542.207.753 0 .206-.204.206-.542 0-.753-.366-.366-.817-.618-1.31-.743.504-1.11 1.625-1.852 2.876-1.852 1.743 0 3.16 1.417 3.16 3.155 0 .337-.05.67-.16.99-.09.28.058.576.338.673.057.018.114.03.166.03.222 0 .428-.144.503-.367.068-.21.12-.423.154-.64.493.19.84.663.84 1.218.007.726-.588 1.315-1.308 1.315z"/></g></svg>
        </a>
      </div>
      <div class="social-icon">
        <a href="https://www.snapchat.com/add/ocho106" target="_blank">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M8.155.48c.662 0 2.903.185 3.96 2.552.354.797.27 2.15.2 3.237l-.002.045c-.008.12-.015.232-.02.342.05.028.135.06.268.067.2-.01.432-.074.69-.195.11-.053.228-.063.307-.063.116 0 .234.022.333.063.297.107.484.32.488.56.006.304-.266.567-.808.78-.066.027-.147.053-.233.08-.306.097-.768.244-.894.54-.065.153-.04.35.077.586l.008.016c.04.094 1.02 2.326 3.194 2.685.167.028.287.177.277.346-.003.05-.015.1-.036.15-.163.38-.852.66-2.105.853-.043.057-.086.256-.113.377-.027.123-.054.244-.092.372-.052.18-.183.277-.37.277H13.267c-.09 0-.21-.015-.36-.045-.242-.047-.512-.09-.854-.09-.2 0-.404.017-.61.05-.406.07-.75.31-1.148.593-.57.403-1.215.86-2.196.86-.045 0-.086-.002-.118-.004l-.08.003c-.982 0-1.627-.457-2.197-.86-.398-.28-.742-.524-1.146-.592-.21-.034-.414-.05-.613-.05-.358 0-.644.055-.853.095-.14.028-.26.05-.36.05-.253 0-.35-.153-.39-.28-.038-.132-.065-.256-.09-.377-.028-.12-.07-.322-.113-.378C.89 12.933.2 12.654.037 12.272c-.02-.048-.033-.1-.035-.15-.01-.168.11-.317.278-.345 2.174-.358 3.154-2.59 3.194-2.685l.008-.016c.116-.236.142-.433.077-.586-.126-.296-.588-.443-.895-.54-.085-.027-.165-.053-.232-.08-.74-.292-.844-.628-.8-.858.06-.32.45-.535.778-.535.094 0 .18.017.253.052.28.13.527.195.737.195.157 0 .257-.037.31-.067-.006-.13-.015-.262-.023-.39-.068-1.086-.153-2.438.202-3.234C4.94.668 7.178.484 7.838.484L8.115.48h.04z"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div id="drawer-search"  class="header-drawer theme-grad-bg">
    <div class="container">
      <?php get_search_form(); ?>
    </div>
  </div>
