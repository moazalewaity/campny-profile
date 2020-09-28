<!DOCTYPE html>
<html lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    	<meta charset="UTF-8" />        
        <meta name="viewport" content="width=device-width, initial-scale=1"/>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    	    	        	        
    	<link rel="shortcut icon" href="{{ url('/') }}/media/department/icon/{{ $sitesetting->icon }}"/>             	
    	<link rel="stylesheet" href="{{ url('/') }}/front/css/style.css">    	
    	<link rel="pingback" href="{{ url('/') }}/front/xmlrpc.php">            	    
    	<title>{{ $sitesetting->title }} | @yield('title')</title>

		<!-- <link rel="alternate" type="application/rss+xml" title="{Seo_Meta_Title} Feed" href="{{ url('/') }}/feed/" />
		<link rel="alternate" type="application/rss+xml" title="{Seo_Meta_Title} Comments Feed" href="{{ url('/') }}/comments/feed/" />
		<link rel="alternate" type="application/rss+xml" title="{Seo_Meta_Title} Feed" href="{{ url('/') }}/feed/" /> -->
                              
        <!-- <link rel="image_src" href="{Seo_Meta_Image}"/> -->
        <!-- <link rel="canonical" href="{Seo_Meta_Canonical}" /> -->
        <!-- <link rel='shortlink' href='{Seo_Meta_Shortlink}' /> -->
        
        <meta name="name" itemprop="name" content="{{ $sitesetting->title }} | @yield('title')" />
        <meta name="description" itemprop="description" content="@yield('description')" />
        <meta name="keywords" itemprop="keywords" content="@yield('keywords')"/> 
        <meta name="image" itemprop="image" content="@yield('image')" />
		
        <meta property="og:title" content="{{ $sitesetting->title }} | @yield('title')"/>
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="@yield('url')"/>
		<meta property="og:image" content="@yield('image')"/>
        
        <meta name="twitter:title" content="{{ $sitesetting->title }} | @yield('title')" />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="@yield('image')" />

        <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
        <script type='text/javascript' src='{{ url("/") }}/front/js/jquery.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/jquery-ui.js'></script>
        <script type="text/javascript" src="{{ url('/') }}/front/fancyapps/source/jquery.fancybox.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script> -->

		<script type="text/javascript">
			window._wpemojiSettings = { "baseUrl":"{{ url('/') }}/front/images\/core\/emoji\/72x72\/","ext":".png","source":{ "concatemoji":"{{ url('/') }}/front/js\/wp-emoji-release.min.js?ver=4.5.2" } };
			!function(a,b,c){ function d(a){ var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;if(!g||!g.fillText)return!1;switch(g.textBaseline="top",g.font="600 32px Arial",a){ case"flag":return g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3;case"diversity":return g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,d=c[0]+","+c[1]+","+c[2]+","+c[3],g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e;case"simple":return g.fillText(h(55357,56835),0,0),0!==g.getImageData(16,16,1,1).data[0];case"unicode8":return g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0] }return!1 }function e(a){ var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c) }var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity"),c.supports={ everything:!0,everythingExceptFlag:!0 },h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){ c.DOMReady=!0 },c.supports.everything||(g=function(){ c.readyCallback() },b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){ "complete"===b.readyState&&c.readyCallback() })),f=c.source||{  },f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji))) }(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
        *{
            word-break: break-word;
        }
input[type='number'] {
    -moz-appearance:textfield;
    appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    appearance: none;
}

        .module-classic-blog .bk-mask{
        	width: 30% !important;
        }
        .module-classic-blog .post-c-wrap {
		    width: 65% !important;
		}
input[type="submit"]:hover{
    color: #fff !important;
}
        #main-menu > ul > li:hover .bk-dropdown-menu{
            z-index: 9999999;
        }
        .bk-masonry-content {

    padding: 0 !important;

}
.pagination {

    float: left;
    width: 100%;
    text-align: center;
    list-style: none;
    margin: 10px 0;

}
.pagination li.active span{
    color: #FFF;
    background: {{ $sitesetting->color }};
}
.pagination li a,
.pagination li span {
    float: right;
    width: 100%;
    padding: 7px;
    width: 40px;
    height: 35px;
    border: 2px solid {{ $sitesetting->color }};
    line-height: 20px;
    margin-left: 2px;
    margin-bottom: 5px;
    font-weight: 400;
    font-size: 14px;
}
.pagination li.disabled {
    display: none !important;
}
.pagination li {

    display: inline-block;
    padding: 5px 1px;

}

            html{
                overflow-x: hidden;
            }
            img.wp-smiley,
            img.emoji { 
            	display: inline !important;
            	border: none !important;
            	box-shadow: none !important;
            	height: 1em !important;
            	width: 1em !important;
            	margin: 0 .07em !important;
            	vertical-align: -0.1em !important;
            	background: none !important;
            	padding: 0 !important;
             }
             .readmore {
                display: inline-block;
                width: 100%;
                margin-top: 5px;
            }

            .inputs {
                float: right;
                width: 100%;
            }
            .comment-respond .inputsme input ,.comment-respond .inputsme textarea {
                float: right;
                width: 100%;
                border-radius: 4px;
                padding: 10px 15px;
                font-size: 14px;
                background: #fff;
                border: 1px solid #eee !important;
            }
            .inputsme {
                float: right;
                width: 100%;
                margin-bottom: 15px;
            }
            .captchaSizeDivSmall{
                float: right;width: 100%;
            }
            .comment-respond .btns input.submit{
                border: 1px solid {{ $sitesetting->color }} !important;
                padding: 12px !important;
                margin: 15px 0;
                color: {{ $sitesetting->color }};
            }
            .related-box h3 a.active {
                padding: 12px 15px;
                border-radius: 4px;
            }
            .header-wrap .header-banner {
                display: table-cell;
                vertical-align: middle;
                text-align: left;
                padding-right: 50px;
            }
            .header-wrap .header-banner img {
                float: left;
                height: 90px;
            }
            label.error {
                float: right;
                width: 100%;
                text-align: center;
                font-size: 12px;
                padding: 5px;
                color: #fa3232;
            }
        </style>

        <link rel='stylesheet' id='login-with-ajax-css'  href='{{ url("/") }}/front/css/widget.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bbp-default-css'  href='{{ url("/") }}/front/css/bbpress.css' type='text/css' media='screen' />
        <link rel='stylesheet' id='contact-form-7-css'  href='{{ url("/") }}/front/css/styles.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bkswcss-css'  href='{{ url("/") }}/front/css/styleswitcher.css' type='text/css' media='all' />

        <link rel='stylesheet' id='bk-jquery-core-css-css'  href='{{ url("/") }}/front/css/jquery-ui.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bk-bootstrap-css-css'  href='{{ url("/") }}/front/css/bootstrap-rtl.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bk-fa-css'  href='{{ url("/") }}/front/css/font-awesome.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bk-theme-plugins-css'  href='{{ url("/") }}/front/css/theme_plugins-rtl.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bkstyle-css'  href='{{ url("/") }}/front/css/bkstyle-rtl.css' type='text/css' media='all' />

        <link rel='stylesheet' id='bk_bbpress-css'  href='{{ url("/") }}/front/css/css_bbpress.css' type='text/css' media='all' />
        <link href="{{ url('/') }}/front/css/datepicker.min.css" rel="stylesheet" type="text/css">
               

        <link rel='stylesheet' id='bkresponsive-css'  href='{{ url("/") }}/front/css/responsive-rtl.css' type='text/css' media='all' />

        <!-- <link rel='stylesheet' id='redux-google-fonts-bk_option-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800%2C300italic%2C400italic%2C600italic%2C700italic%2C800italic%7CArchivo+Narrow%3A400%2C700%2C400italic%2C700italic%7CRoboto+Slab%3A100%2C300%2C400%2C700&#038;ver=1457516383' type='text/css' media='all' /> -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/front/fancyapps/source/jquery.fancybox.css" media="screen" /> 

        <style type='text/css' media="all">
            ::selection { color: #FFF; background: {{ $sitesetting->color }} }
            ::-webkit-selection { color: #FFF; background: {{ $sitesetting->color }} }
         
            p > a, .article-content p a, .article-content p a:visited, .article-content p a:focus, .article-content li a, .article-content li a:visited, 
             .article-content li a:focus, .content_out.small-post .meta .post-category a, .ticker-title, #top-menu>ul>li:hover, 
             #top-menu>ul>li .sub-menu li:hover, .content_in .meta > div.post-category a,
            .meta .post-category a, .top-nav .bk-links-modal:hover, .bk-lwa-profile .bk-user-data > div:hover,
            .s-post-header .meta > .post-category a, .breadcrumbs .location,
            .error-number h4, .redirect-home,
            .bk-author-box .author-info .bk-author-page-contact a:hover, .bk-blog-content .meta .post-category a, .widget-social-counter ul li .social-icon,
            #pagination .page-numbers, .post-page-links a, .single-page .icon-play:hover, .bk-author-box .author-info h3,
            #wp-calendar tbody td a, #wp-calendar tfoot #prev, .widget-feedburner > h3, 
            a.bk_u_login:hover, a.bk_u_logout:hover, .widget-feedburner .feedburner-inner > h3,
            .meta .post-author a, .content_out.small-post .post-category a, .widget-tabs .cm-header .author-name, blockquote, blockquote:before, 
            /* Title hover */
            .bk-main-feature-inner .bk-small-group .title:hover, .row-type h4:hover, .content_out.small-post h4:hover, 
            .widget-tabs .author-comment-wrap h4:hover, .widget_comment .post-title:hover, .classic-blog-type .post-c-wrap .title:hover, 
            .module-large-blog .post-c-wrap h4:hover, .widget_reviews_tabs .post-list h4:hover, .module-tiny-row .post-c-wrap h4:hover, .pros-cons-title, 
            .article-content p a:hover, .article-content p a:visited, .article-content p a:focus, .s-post-nav .nav-btn h3:hover,
            .widget_recent_entries a:hover, .widget_archive a:hover, .widget_categories a:hover, .widget_meta a:hover, .widget_pages a:hover, .widget_recent_comments a:hover, .widget_nav_menu > div a:hover,
            .widget_rss li a:hover, .widget.timeline-posts li a:hover, .widget.timeline-posts li a:hover .post-date, 
            .bk-header-2 .header-social .social-icon a:hover, .bk-header-90 .header-social .social-icon a:hover,
            /*** Woocommerce ***/
            .woocommerce-page .star-rating span, .woocommerce-page p.stars a, .woocommerce-page div.product form.cart table td .reset_variations:hover,
            .bk_small_cart .widget_shopping_cart .cart_list a:hover,
            /*** BBPRESS ***/
            #subscription-toggle, #subscription-toggle:hover, #bbpress-forums li > a:hover,
            .widget_recent_topics .details .comment-author a, .bbp-author-name, .bbp-author-name:hover, .bbp-author-name:visited, 
            .widget_latest_replies .details .comment-author, .widget_recent_topics .details .post-title:hover, .widget_display_views ul li a:hover, .widget_display_topics ul li a:hover, 
            .widget_display_replies ul li a:hover, .widget_display_forums ul li a:hover, 
            .widget_latest_replies .details h4:hover
            { color: {{ $sitesetting->color }} }
            
            .widget_tag_cloud .tagcloud a:hover,
            #comment-submit:hover, .main-nav, 
            #pagination .page-numbers, .post-page-links a, .post-page-links > span, .widget_latest_comments .flex-direction-nav li a:hover,
            #mobile-inner-header, input[type="submit"]:hover, #pagination .page-numbers, .post-page-links a, .post-page-links > span, .bk-login-modal, .lwa-register.lwa-register-default,
            .button:hover, .bk-back-login:hover, .footer .widget-title h3, .footer .widget-tab-titles li.active h3,
            #mobile-inner-header, .readmore a:hover, .loadmore span.ajaxtext:hover, .result-msg a:hover, .top-bar, .widget.timeline-posts li a:hover .meta:before,
            .button:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page input.button:hover, .woocommerce-page div.product form.cart .button:hover,
            .woocommerce-page .woocommerce-message .button:hover, .woocommerce-page a.button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
            .bk_small_cart .woocommerce.widget_shopping_cart .buttons a:hover, .recommend-box h3:after
            { border-color: {{ $sitesetting->color }}; }

            .flex-direction-nav li a:hover, #back-top, .module-fw-slider .flex-control-nav li a.flex-active, .related-box h3 a.active,
            .footer .cm-flex .flex-control-paging li a.flex-active, .main-nav #main-menu .menu > li:hover, #main-menu > ul > li.current-menu-item,
            .module-title h2, .page-title h2, .row-type .post-category a, .bk-small-group .post-category a, .module-grid-carousel .bk-carousel-wrap .item-child .post-category a,
            .bk-review-box .bk-overlay span, .bk-score-box, .share-total, #pagination .page-numbers.current, .post-page-links > span, .widget_latest_comments .flex-direction-nav li a:hover,
            .searchform-wrap .search-icon, .module-square-grid .content_in_wrapper, .module-large-blog .post-category a, .result-msg a:hover,
            .readmore a:hover, .module-fw-slider .post-c-wrap .post-category a, .rating-wrap, .inner-cell .innerwrap .post-category a, .module-carousel .post-c-wrap .post-category a, 
            .widget_slider .post-category a, .module-square-grid .post-c-wrap .post-category a, .module-grid .post-c-wrap .post-category a,.module-title .bk-tabs.active a, .classic-blog-type .post-category a, .sidebar-wrap .widget-title h3, .widget-tab-titles li.active h3, 
            .module-fw-slider .post-c-wrap .readmore a:hover, .loadmore span.ajaxtext:hover, .widget_tag_cloud .tagcloud a:hover, .widget.timeline-posts li a:hover .meta:before,
            .s-tags a:hover, .singletop .post-category a, .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar, .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar, 
            .mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar, .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar, .widget-postlist .large-post .post-category a,
            input[type="submit"]:hover, .widget-feedburner .feedburner-subscribe:hover button, .bk-back-login:hover, #comment-submit:hover,
            .bk-header-slider .post-c-wrap .readmore a,
            /** Woocommerce **/
            .woocommerce span.onsale, .woocommerce-page span.onsale, .button:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page input.button:hover, .woocommerce-page div.product form.cart .button:hover,
            .woocommerce-page .woocommerce-message .button:hover, .woocommerce-page a.button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, 
            .woocommerce-page div.product .summary .product_title span, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, 
            .related.products > h2 span, .woocommerce-page #reviews h3 span, .upsells.products > h2 span, .cross-sells > h2 span, .woocommerce-page .cart-collaterals .cart_totals h2 span, 
            .woocommerce-page div.product .summary .product_title span, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, 
            .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .product_meta .post-tags a:hover, .widget_display_stats dd strong, 
            .bk_small_cart .woocommerce.widget_shopping_cart .buttons a:hover, .bk_small_cart .cart-contents span,
            /*** BBPRESS ***/
            #bbpress-forums #bbp-search-form .search-icon, .widget_display_search .search-icon, #bbpress-forums div.bbp-topic-tags a:hover
            { background-color: {{ $sitesetting->color }}; }
            @-webkit-keyframes rotateplane { 
                0% { 
                    -webkit-transform: perspective(120px) scaleX(1) scaleY(1);
                    background-color: {{ $sitesetting->color }};
                 }
                25% { 
                    -webkit-transform: perspective(120px) rotateY(90deg) scaleX(1) scaleY(1);
                    background-color: {{ $sitesetting->color }};
                 }
                25.1% { 
                    -webkit-transform: perspective(120px) rotateY(90deg) scaleX(-1) scaleY(1);
                    background-color: #333333;
                 }
                50% { 
                    -webkit-transform: perspective(120px) rotateY(180deg) scaleX(-1) scaleY(1);
                    background-color: #333333;
                 }
                75% { 
                    -webkit-transform: perspective(120px) rotateY(180deg) rotateX(90deg) scaleX(-1) scaleY(1);
                    background-color: #333333;
                 }
                75.1% { 
                    -webkit-transform: perspective(120px) rotateY(180deg) rotateX(90deg) scaleX(-1) scaleY(-1);
                    background-color: {{ $sitesetting->color }};
                 }
                100% { 
                    -webkit-transform: perspective(120px) rotateY(180deg) rotateX(180deg) scaleX(-1) scaleY(-1);
                    background-color: {{ $sitesetting->color }};
                 }
             }
            @keyframes rotateplane { 
                0% { 
                    transform: perspective(120px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
                    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
                    background-color: {{ $sitesetting->color }};
                 }
                25% { 
                    transform: perspective(120px) rotateX(-90deg) rotateY(0deg) scaleX(1) scaleY(1);
                    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
                    background-color: {{ $sitesetting->color }};
                 }
                25.1% { 
                    transform: perspective(120px) rotateX(-90deg) rotateY(0deg) scaleX(1) scaleY(-1);
                    -webkit-transform: perspective(120px) rotateX(-90deg) rotateY(0deg) scaleX(1) scaleY(-1);
                    background-color: #333333;
                 }
                50% { 
                    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) scaleX(1) scaleY(-1);
                    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) scaleX(1) scaleY(-1);
                    background-color: #333333;
                 }
                75% { 
                    transform: perspective(120px) rotateX(-180.1deg) rotateY(-90deg) scaleX(1) scaleY(-1);
                    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(-90deg) scaleX(1) scaleY(-1);
                    background-color: #333333;
                 }
                75.1% { 
                    transform: perspective(120px) rotateX(-180.1deg) rotateY(-90deg) scaleX(-1) scaleY(-1);
                    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(-90deg) scaleX(-1) scaleY(-1);
                    background-color: {{ $sitesetting->color }};
                 }
                100% { 
                    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg) scaleX(-1) scaleY(-1);
                    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg) scaleX(-1) scaleY(-1);
                    background-color: {{ $sitesetting->color }};
                 }
             }
            .content_out .review-score, ::-webkit-scrollbar-thumb, ::-webkit-scrollbar-thumb:window-inactive 
            { background-color: rgba(209,48,48,0.9); }
            
            .footer .cm-flex .flex-control-paging li a
            { background-color: rgba(209,48,48,0.3); }
            

                 
            .widget_most_commented .comments:after 
            { border-right-color: #333946; }
            #main-mobile-menu, .bk-dropdown-menu, .bk-sub-sub-menu, .sub-menu, .bk-mega-menu, .bk-mega-column-menu ,
            .ajax-form input, .module-title .main-title, .sidebar-wrap .widget-title, .widget_most_commented .comments,
            .related-box h3 a, .widget-tab-titles, .bk-tabs-wrapper, .widget-feedburner .feedburner-email, .widget-feedburner .feedburner-subscribe button
            { background-color: #333946; }
            
            #page-wrap {  width: auto;  }
            #top-menu>ul>li, #top-menu>ul>li .sub-menu li, .bk_u_login, .bk_u_logout, .bk-links-modal{ font-family:"Open Sans","DroidKufi-Regular";font-weight:600;font-style:normal; }.header .logo.logo-text h1 a, .module-title h2, .page-title h2, .sidebar-wrap .widget-title h3, .widget-tab-titles h3, .main-nav #main-menu .menu > li, .main-nav #main-menu .menu > li > a, .mega-title h3, .header .logo.logo-text h1, .bk-sub-posts .post-title,
                            .comment-box .comment-author-name, .today-date, .related-box h3, .comment-box .comments-area-title h3, .comment-respond h3, .comments-area .comments-area-title h3, 
                            .bk-author-box .author-info h3, .footer .widget-title h3, .recommend-box h3, .bk-login-title, #footer-menu a, .bk-copyright, 
                            .woocommerce-page div.product .product_title, .woocommerce div.product .woocommerce-tabs ul.tabs li a, 
                            .related.products > h2 span, .woocommerce-page #reviews h3 span, .upsells.products > h2 span, .cross-sells > h2 span, 
                            .woocommerce-page .cart-collaterals .cart_totals h2 span, .woocommerce-page div.product .summary .product_title span{ font-family:"Open Sans","DroidKufi-Regular";font-weight:400;font-style:normal; }.review-score, .bk-criteria-wrap > span, .rating-wrap span, .pros-cons-title{ font-family:"Archivo Narrow","DroidKufi-Regular";font-weight:700;font-style:normal; }.widget-tabs .cm-header, .widget-review-tabs ul li .bk-final-score, .widget-social-counter .counter, .widget-social-counter ul li .data .subscribe, .meta, .post-category, .widget_comment .cm-header div, .comment-box .comment-time, .share-box ul li .share-item__value,.share-box .bk-share .share-item__valuem, .share-total, .loadmore span.ajaxtext, .bk-search-content .nothing-respond, .share-sticky .total-share-wrap{ font-family:"Archivo Narrow","DroidKufi-Regular";font-weight:400;font-style:normal; }h1, h2, h3, h4, h5, #mobile-top-menu > ul > li, #mobile-menu > ul > li, .widget_display_stats dt,
                            .widget_display_views ul li a, .widget_display_topics ul li a, .widget_display_replies ul li a, 
                            .widget_display_forums ul li a, .widget_loginwithajaxwidget .bk-user-data ,.bk-share-box-top > span{ font-family:"Roboto Slab","DroidKufi-Regular";font-weight:700;font-style:normal; }body, textarea, input, p, .ticker-wrapper h4,
                            .entry-excerpt, .comment-text, .comment-author, .article-content,
                            .comments-area, .tag-list, .bk-mega-menu .bk-sub-posts .feature-post .menu-post-item .post-date, .comments-area small{ font-family:"Open Sans","DroidKufi-Regular";font-weight:400;font-style:normal; }
                            .module-title, .page-title, .bk-header {

                                text-align: right;
                                padding-bottom: 30px;
                                position: relative;

                            }
        </style>

        <!-- <script src='https://www.google.com/recaptcha/api.js?render=6Ld_EYwUAAAAAPrIdt2r9hSxgxmZYfQwznsZNUgn'></script> -->
        <!-- <script src='https://www.google.com/recaptcha/api.js?render=6Ld_EYwUAAAAAPrIdt2r9hSxgxmZYfQwznsZNUgn'></script> -->


    </head>
    
    <body class="{{ $class_body }}" itemscope itemtype="http://schema.org/WebPage">
        <div id="page-wrap" class= 'wide'>
            @include('front.layouts.mobile-menu')
            <div id="page-inner-wrap">
                <div class="page-cover mobile-menu-close"></div>
                @include('front.header.header')
        		<div id="back-top"><i class="fa fa-long-arrow-up"></i></div>
                <div id="{{ $main_class }}">
                    @yield('body')
                </div>
                @include('front.footer.footer')
            </div>
    	</div>
        
        
        <script type='text/javascript' src='{{ url("/") }}/front/js/jquery.form.min.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/jquery.validate.min.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var _wpcf7 = { "loaderUrl":"{{ url('/') }}/front/images\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1" };
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/scripts.js'></script>


        <script type='text/javascript' src='{{ url("/") }}/front/js/widget.min.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/tabs.min.js'></script>
        <script type='text/javascript'>
            var bkSmoothScroll = { "status":"0" };
            var ajaxurl = '{{ url("/ajax/bk_ajax_search_post") }}';
        </script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/theme_plugins-rtl.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/onviewport.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/module-load-post.js'></script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/menu.js'></script>
        <script type='text/javascript'>
        /* <![CDATA[ */
        var megamenu_carousel_el = { "bk-carousel-620":"3" };
        var megamenu_carousel_el = { "bk-carousel-620":"3","bk-carousel-613":"3" };
        var megamenu_carousel_el = { "bk-carousel-620":"3","bk-carousel-613":"3","bk-carousel-657":"4" };
        var justified_ids = ["149146964"];
        var ajax_c = { "tickerid":"ticker-5748cda317a44","tickertitle":"{{ trans('front.Breaking-News') }}","block_1-5748cda326ca19.06613330":{ "tab1":{ "cat":"3","offset":"0","order":"date","content":"" },"tab2":{ "cat":"8","offset":"0","order":"date","content":"" },"tab3":{ "cat":"10","offset":"0","order":"date","content":"" },"args":{ "post_type":"post","ignore_sticky_posts":1,"post_status":"publish","posts_per_page":5,"offset":"0","orderby":"date","cat":"3" } },"block_2-5748cda32f1241.05667021":{ "tab1":{ "cat":"9","offset":"0","order":"date","content":"" },"tab2":{ "cat":"6","offset":"0","order":"date","content":"" },"tab3":{ "cat":"5","offset":"0","order":"date","content":"" },"args":{ "post_type":"post","ignore_sticky_posts":1,"post_status":"publish","posts_per_page":"5","offset":"0","orderby":"date","cat":"9" } },"masonry-5748cda3374370.10229173":{ "columns":"col-md-6 col-sm-6","entries":"4","tab1":{ "cat":"0","offset":"0","order":"date","content":"" },"nomore-1":"","args":{ "post_type":"post","ignore_sticky_posts":1,"post_status":"publish","posts_per_page":"6","offset":"0","orderby":"date" } },"masonry-5753dbd5c23397.95853909":{ "columns":"col-md-6 col-sm-6","entries":"4","tab1":{ "cat":"0","offset":"0","order":"date","content":"" },"nomore-1":"","args":{ "post_type":"post","ignore_sticky_posts":1,"post_status":"publish","posts_per_page":"8","offset":"0","orderby":"date" } } };
        var fixed_nav = "1";
        var customconfig = null;
        /* ]]> */
            jQuery(document).ready(function() {
            	jQuery('.fancybox').fancybox();
            	//-----------------------------
            	if(jQuery("#form-review").length > 0){
            	// Validate the contact form
            	  jQuery('#form-review').validate({	
            		submitHandler: function(form) {
            			jQuery("#submit-review").attr("value", "{{ trans('front.voiting') }} ...");
            			jQuery(form).ajaxSubmit({
            				success: function(responseText, statusText, xhr, $form) {									
            					jQuery(".review_removes").remove();					
            				}
            			});
            			return false;
            		}
            	  });
            	}	
            });
        </script>
        <script type='text/javascript' src='{{ url("/") }}/front/js/customjs-rtl.js?ver=4.5.2'></script>
        
        <script src='https://www.google.com/recaptcha/api.js?hl=ar'></script>
        @yield('script')
        <!-- <script type="text/javascript">
          var onloadCallback = function() {
            grecaptcha.render('g-recaptcha', {
              'sitekey' : '6LfaXIwUAAAAANcVvXAQdeC6ogn1zDrMxCMVDttS'
            });
          };
        </script> -->

</body>
</html>