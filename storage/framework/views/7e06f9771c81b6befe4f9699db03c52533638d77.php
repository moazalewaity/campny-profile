<!DOCTYPE html>
<html dir="<?php echo e(App::getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>" lang="<?php echo e(App::getLocale() == 'ar' ? 'ar' : 'en'); ?>" class="no-js no-svg <?php echo e(App::getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jozoor">
    <meta name="description" content="Joo - Niche Multi-Purpose HTML Template">
    <meta name="keywords" content="creative, niche, responsive, html5, css3, multipurpose, all in one, html, template">
  <title>
      
     <?php echo e(App::getLocale() == 'ar' ? "$setting->title  | الرئيسية" : "wathiq company  | Home"); ?>

    
    </title>
     <?php if(App::getLocale() == 'ar'): ?>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/vendor.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/styles.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/styles-rtl.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/custom.css?v=1557445517809">
    <?php else: ?> 
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets_en/css/vendor.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets_en/css/styles.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets_en/css/styles-rtl.min.css?v=1557445517809">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets_en/css/custom.css?v=1557445517809">
    <?php endif; ?>
    <!-- cdn icon fonts
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css?v=1557445407815" crossorigin="anonymous">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css?v=1557445407815">
			<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?v=1557445407815" rel="stylesheet">
		-->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('/')); ?>/img/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="<?php echo e($setting->title); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo e($setting->title); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('/')); ?>/img/logo.png">
    <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/img/logo.png">

    <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>

  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>


        <style>
           
            *:{
              font-family: 'DroidArabicKufiRegular';

            }
               loading: {
                color: 'blue',
                height: '3px',
                rtl: true,
              },
              .heading-title1 {
                    text-transform: capitalize;
                    color: white;
                    letter-spacing: 0;
                    font-size: 42px;
                    font-size: 2.625rem;
                    text-align: center;
                    font-weight: 600;
                    padding-bottom: 0;
                    position: relative;
                    margin-bottom: 3rem !important;
}
           </style>

 </head>

  <body  class="<?php echo e(App::getLocale() == 'ar' ? 'rtl' : 'ltr'); ?> active-pageloader corporate header-sticky hide-on-scroll header-menu-with-icons header-transparent header-menu-border-bottom menu-center footer-widgets footer-background dark-color widgets-6 submenu-show-arrow-right menu-is-capitalized submenu-is-capitalized logo-text-is-capitalized page-index">

    <div class="pageloader  has-background-info is-active">
      <span class="title">
      
       <?php echo e(App::getLocale() == 'ar' ? 'جار التحميل' : 'loading'); ?>

        </span>
    </div>

    <div id="app">
    



    <?php echo $__env->make('layout.site_layout.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
    
    <?php echo $__env->yieldContent('content'); ?>




    
      <!-- #footer-top-wrap -->
    
     
      <?php if( Request::segment(1) == "" ||Request::segment(1) == NULL  ): ?>
      <div id="footer-top-wrap" class="is-clearfix">
        <div id="footer-top" class="site-footer-top">
          <div id="footer-top-inner" class="site-footer-top-inner ">
            <section id="hero" class="home hero clients-section is-clearfix">
              <div class="container">
                <h2 class="display-none">clients</h2>
                <nav class="clients-list level  owl-carousel no-dots carousel-items-4">
                 <?php $__currentLoopData = $partnera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="client-item has-text-centered level-item">
                    <a href="#" target="_blank">
                    <img alt="<?php echo e($item->name); ?>" src="<?php echo e(url('/')); ?>/media/partners/img/<?php echo e($item->image); ?>"> </a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  
                </nav>
              </div>
            </section>
          </div>
          <!-- #footer-top-inner -->
        </div>
        <!-- #footer-top -->
      </div>
      <?php endif; ?>


      <section style="padding: 3rem  0.5rem;" class="site-footer-top follow-us-section is-clearfix">
        <div class="container has-text-centered">
          <h1 class="heading-title style-3 has-text-white">
            

             <?php echo e(App::getLocale() == 'ar' ? ' تابعنا على مواقع التواصل الاجتماعى ' : 'Follow us on social media'); ?>

             </h1>
          <br>
          <br>
          <div class="has-text-centered">
            <div class="global-social-links">
              <ul>
                <li>
                  <a href="<?php echo e($setting->facebook); ?>">
                    <span class="icon">
                      <i class="fab fa-facebook-f"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo e($setting->twitter); ?>">
                    <span class="icon">
                      <i class="fab fa-twitter"></i>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo e($setting->instgram); ?>">
                    <span class="icon">
                      <i class="fab fa-instagram"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      
      <!-- #footer-wrap -->
      <div id="footer-bottom-wrap" class="is-clearfix">
        <div id="footer-bottom" class="site-footer-bottom">
          <div id="footer-bottom-inner" class="site-footer-bottom-inner ">
            <section class="section footer-bottom-content">
              <div class="container">
                <h2 class="display-none">footer</h2>
                <div class="level">
                  <div class="level-left">
                    <span class="footer-copyright">
                      <a href='/'>
                         <?php echo e(App::getLocale() == 'ar' ? ' $setting->title ' : 'wathiq company'); ?>


                         </a> ©
                      <span class='current-year'></span>
                     
                      <?php echo e(App::getLocale() == 'ar' ? ' . جميع الحقوق محفوظة.' : '. all rights are save.'); ?>


                       </span>
                  </div>
                  <!-- .level-left -->
                  <div class="level-right">
                    <div class="nav-wrap">
                      <nav class="main-navigation right">
                        <ul class="menu">
                          <li>
                            <router-link  :to="{ name : 'contact2' , params: { id: 2 } }" class="contact"> 
                      <?php echo e(App::getLocale() == 'ar' ? 'من نحن' : 'who are we '); ?>

                      </router-link>
                          </li>
                          <li>
                            <router-link   :to="{ name : 'services1'}" class="contact">
                      <?php echo e(App::getLocale() == 'ar' ? 'خدماتنا' : 'Services '); ?>

                    </router-link>                          </li>
                          <li>
                            <router-link  :to="{ name : 'blog'}" class="contact">
                      <?php echo e(App::getLocale() == 'ar' ? 'المدونة' : 'blog '); ?>

                    </router-link>                          </li>
                          <li>
                            <router-link  :to="{ name : 'campnycontact'}" class="contact">
                      <?php echo e(App::getLocale() == 'ar' ? 'اتصل بنا' : 'call us'); ?>

                     </router-link>
                          </li>
                        </ul>
                      </nav>
                      <!-- #site-navigation -->
                    </div>
                    <!-- #nav-wrap -->
                  </div>
                  <!-- .level-right -->
                </div>
                <!-- .level -->
              </div>
            </section>
            <!-- .footer-bottom-content -->
          </div>
          <!-- #footer-bottom-inner -->
        </div>
        <!-- #footer-bottom -->
      </div>
      <!-- #footer-bottom-wrap -->
      <!-- show floating buttons -->
      
    </div>
  
  </div> </div> </div>
  </div>

  
    <!-- #site-wrap -->
    <script src=" <?php echo e(url('/')); ?>/assets/js/vendor.min.js?v=1557445517809"></script>
    <script src=" <?php echo e(url('/')); ?>/assets/js/scripts.min.js?v=1557445517809"></script>
    <script src=" <?php echo e(url('/')); ?>/assets/js/custom.js?v=1557445517809"></script>
    <script  src="<?php echo e(url('/')); ?>/js/app.js"></script>
    <script  src="<?php echo e(url('/')); ?>/js/topbar.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script  src="<?php echo e(url('/')); ?>/js/jquery.nicescroll.min.js"></script>

<script>
  $(document).ready(function() {
  
	var nice = $("html").niceScroll({
		  cursorcolor:"#1e6bf7",
		  cursorwidth:"14px",
		  background:"rgba(20,20,20,0.3)",
		  cursorborder:"1px solid black",
		  cursorborderradius:0
		});  // The document page (body)
	
    
  });
</script>


<script>

  $("a").click(function() {
  topbar.config({
    autoRun      : false, 
    barThickness : 5,
    barColors    : {
      '0'        : 'rgb(24, 102, 247)',
      '.3'       : 'rgb(24, 102, 247)',
      '1.0'      : 'rgb(24, 102, 247)'
    },
    shadowBlur   : 5,
    shadowColor  : 'rgba(0, 0, 0, .5)'
  })
  topbar.show();
  setTimeout(function() {
    topbar.hide();
}, 3000);
  (function step() {
    setTimeout(function() {  
      if (topbar.progress('+.01') < 1) step()
    }, 16)
  })()
});


$(function() {


    $(".contact").click(function(){
      $("#slideerhome").hide();
      $("#slideerhome1").hide();
      $("#hero").hide();
      
      $("#services").css({"background-color":"#161616" , "color":"#FFFFFF" , " margin-top": "50" });
      $(".heading-title").css({"font-size":"60px" ,"margin-top": "100px" , "color":"#FFFFFF" });
      $(".columns").css({"color":"#FFFFFF"});


      $("#works").css({"background-color":"#000000" , "color":"#FFFFFF" , " margin-top": "50" });
      
    });


    $(".work").click(function(){
      $("#slideerhome").hide(); 
      $("#works").css({"background-color":"#CBCBCB" });
      $("#works").css({"margin-top": "250px" });
      $("#site-wrap").css({"background-color":"#161616" });
      // $("header-bottom").append("<h1 class="heading-title">خدماتنا</h1>");
      // header-bottom
      // heading-title 
      
      
    });
    
    $(".home").click(function(){
      console.log("clcick");
      // $("#slideerhome").show();
      $("#slideerhome1").show();
      $("#slideerhome").show();
      // $(".slideerhome1").show();
      
    });

    $(".router-link").click(function(){
      console.log("clcick");
      
    });

  });


  </script>
  </body>
</html>