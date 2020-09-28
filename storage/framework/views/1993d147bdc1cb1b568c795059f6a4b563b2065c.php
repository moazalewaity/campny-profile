<div id="header-bottom-wrap" class="is-clearfix">
  <div id="header-bottom" class="site-header-bottom">
    <div id="header-bottom-inner" class="site-header-bottom-inner ">
      <section class="hero slider is-clearfix ">
        <h2 class="display-none">slider</h2>
        <div class="rev_slider_wrapper fullscreen-container ">
          <div id="rev_slider_1" class="rev_slider tp-overflow-hidden fullscreenbanner" data-version="5.4.7" style="display:none">
            <ul>

              <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li data-transition="crossfade">
              <img alt="<?php echo e($item->title); ?>" class="rev-slidebg" src="<?php echo e(url('/')); ?>/media/sliders/img/<?php echo e($item->image); ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone"
                  data-scalestart="100" data-scaleend="115" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="15">
                <div class="tp-caption tp-resizeme large_text" data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                  data-x="center" data-hoffset="['0','0','0','0']" data-y="center" data-voffset="['-45','-45','0','0']" data-width="['auto']" data-textAlign="['center','center','center','center']" data-height="['auto']"> <?php echo e(App::getLocale() == 'ar' ? $item->title : $item->title_en); ?> </div>
                <div class="tp-caption tp-resizeme small_text" data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                  data-x="center" data-hoffset="['0','0','0','0']" data-y="center" data-voffset="['45','45','0','0']" data-width="['auto']" data-textAlign="['center','center','center','center']" data-height="['auto']">  <?php echo e(App::getLocale() == 'ar' ? $item->subtitle : $item->subtitle_en); ?> </div>
               
                  
                  
                   
                   
                   <router-link replace :to="{ name : 'campnycontact'}"  class="contact tp-caption tp-resizeme button is-outlined is-white is-rounded"  data-frames='[{"delay":1600,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                   data-x="center" data-hoffset="['-90','-90','0','0']" data-y="center" data-voffset="['125','125','0','0']" data-type="button">
                 
                        <?php echo e(App::getLocale() == 'ar' ? 'اتصل بنا ': 'Call Us'); ?>

                  </router-link>

                
                  <router-link   :to="{ name : 'services1'}"  class="contact tp-caption tp-resizeme button is-primary is-rounded" href="#" data-frames='[{"delay":1600,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                  data-x="center" data-hoffset="['90','90','0','0']" data-y="center" data-voffset="['125','125','0','0']" data-type="button">
                  
                        <?php echo e(App::getLocale() == 'ar' ? '  اقرأ المزيد ': 'Read More'); ?>

          </router-link>

              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              <!-- slide -->
            </ul>
          </div>
          <!-- .rev_slider -->
        </div>
        <!-- .rev_slider_wrapper -->
      </section>
      <!-- .slider -->
    </div>
    <!-- #header-bottom-inner -->
  </div>
  <!-- #header-bottom -->
</div>