<div id="site-wrap" class="site">
  <div id="header-wrap" class="is-clearfix">
    <header id="header" class="site-header">
      <div id="header-inner" class="site-header-inner container">
        <div class="level">
          <div class="level-left">
            <div id="header-logo" class="site-logo ">
              <div id="logo-inner" class="site-logo-inner">
               
                 <router-link replace exact :to="{ name : 'home' , query: { lang: '<?php echo App::getLocale() ?>' } }" class="home">  
                
                 <img alt=" <?php echo e($setting->title); ?>" src="<?php echo e(url('/')); ?>/img/logo.png">
                 <span style="margin-right: 5px; margin-top: 10px; font-size:22px;font-family: 'DroidArabicKufiRegular' ">
                 
                  <?php echo e(App::getLocale() == 'ar' ? $setting->title  : "Wathiq Company"); ?>


                
                </span>

                 </router-link>
                 
              </div>
              <!-- #logo-inner -->
            </div>
            <!-- #header-logo -->
          </div>
          <!-- .level-left -->
          <div class="level-left">
            <div class="nav-wrap">
              <nav class="main-navigation left">
                <ul class="menu">
                  <li class="mega-menu niche-templates">
                  
                  <router-link replace exact :to="{ name : 'home' , query: { lang: '<?php echo App::getLocale() ?>' } }" class="home">                        <?php echo e(App::getLocale() == 'ar' ? 'الرئيسية ' : 'Home '); ?>

                    </router-link>
                  
                  </li>
                  <li>
                    
                    <router-link   :to="{ name : 'services1'}" class="contact">
                      <?php echo e(App::getLocale() == 'ar' ? 'خدماتنا' : 'Services '); ?>

                    </router-link>

                   
                  </li>

                  <li>
                    <!--<a href="#clients">قالوا عنا </a>-->
                     <router-link  :to="{ name : 'contact2' , params: { id: 2 } }" class="contact"> 
                      <?php echo e(App::getLocale() == 'ar' ? 'من نحن' : 'who are we '); ?>

                      </router-link>
                   
                  </li>
                 
                  <li>
                    
                    <router-link  :to="{ name : 'works1'}" class="work" >
                      <?php echo e(App::getLocale() == 'ar' ? 'مشاريعنا' : 'Projects'); ?>

                    </router-link>

                   
                  </li>
                 
                  <li>
                    
                    <router-link  :to="{ name : 'blog'}" class="contact">
                      <?php echo e(App::getLocale() == 'ar' ? 'المدونة' : 'blog '); ?>

                    </router-link>

                   
                  </li>
                  <li class="mega-menu">
                    
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
          <!-- .level-left -->
          <div class="level-right">
            <ul class="header-menu-icons ">
              <li>
                <a href="javascript:void(0);">
                  <span class="icon">
                    
                      
                      <i class="fas fa-sync"  onclick="location.reload();"></i>
                    
                  </span>
                </a>
               
              </li>

             <li>
              <div class="dropdown is-right">
                <div class="dropdown-trigger">
                    <span><i class="fa fa-language" aria-hidden="true" style="font-size:28px;color:#1E6BF7;"></i>                    </span>
                    
                </div>

                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                  <div class="dropdown-content"  style="background:black">
                    <a style="color:white" class="is-12  dropdown-item" href="<?php echo e(url('/')); ?>?lang=ar">عربى</a><br/>
                    <a style="color:white" class="is-12  dropdown-item" href="<?php echo e(url('/')); ?>?lang=en" > English </a>
                  </div>
                </div>
               
              </div>
            </li>


          
           
              
            </ul>
            <!-- .header-menu-icons -->
         
            <!-- .modal.search-form-overlay -->
            <div id="quickviewInfo" class="quickview">
              <div class="quickview-header">
                <p class="title"></p>
                <span class="delete" data-dismiss="quickview"></span>
              </div>
              <div class="quickview-body">
                <div class="quickview-block">
                  <div class="footer">
                    <div class="columns is-variable is-multiline">
                      <div class="column is-12">
                        <div class="widget widget-html">
                          <div class="textwidget">
                            <div id="footer-logo-menu" class="site-logo ">
                              <a href="./index.html">
                                <span class="logo-text"> 
                                  <?php echo e($setting->title); ?>

                                </span>
                              </a>
                            </div>
                            
                            <!-- #footer-logo -->
                            <br>
                            
                            <div class="footer-social-links ">
                              <ul>
                                <li>
                                  <a href="<?php echo e($setting->facebook); ?>" target="_blank">
                                    <span class="icon">
                                      <i class="fab fa-facebook-f"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo e($setting->twitter); ?>" target="_blank">
                                    <span class="icon">
                                      <i class="fab fa-twitter"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo e($setting->instgram); ?>" target="_blank">
                                    <span class="icon">
                                      <i class="fab fa-instagram"></i>
                                    </span>
                                  </a>
                                </li>
                                
                              </ul>
                            </div>
                          </div>
                          <!-- .textwidget -->
                        </div>
                      </div>
                      <!-- .column -->
                      <div class="column is-12">
                        <div class="widget widget-html">
                          <div class="textwidget">
                            <a href="./pages/about.html">
                            <img alt="Joo - Niche Multi-Purpose HTML Template" src="<?php echo e(url('/')); ?>/assets/images/services/1.png"> </a>
                          </div>
                          <!-- .textwidget -->
                        </div>
                      </div>
                      <!-- .column -->
                      <div class="column is-12">
                        <div class="widget widget-form">
                          <h3 class="widget-title ">القائمة البريدية</h3>
                          
                          <br>
                          <form>
                            <div class="field">
                              <div class="control is-expanded">
                                <input class="input" type="text" placeholder="your@email.com">
                                <button type="submit" class="button is-radiusless">
                                  <span class="icon">
                                    <i class="icon-envelope"></i>
                                  </span>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- .column -->
                    </div>
                    <!-- .columns -->
                  </div>
                  <!-- .footer -->
                </div>
              </div>
            </div>
          </div>
          <!-- .level-right -->
        </div>
        <!-- .level -->
      </div>
      <!-- #header-inner -->
    </header>
    <!-- #header -->
  </div>

  <!-- #header-wrap -->
  
  
  <?php if( Request::segment(1) == "" ||Request::segment(1) == NULL  ): ?>
   
  <div id="slideerhome">
  <?php echo $__env->make('layout.site_layout.slide_home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </div>
 <?php else: ?> 
 <div id="slideerhome1" style="display:none">
  <?php echo $__env->make('layout.site_layout.slide_home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </div>
  <?php endif; ?>



  
  <!-- #header-bottom-wrap -->


     <div id="content-main-wrap" class="is-clearfix">
        <div id="content-area" class="site-content-area">
          <div id="content-area-inner" class="site-content-area-inner">