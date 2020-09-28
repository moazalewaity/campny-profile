<template>
<div>

<!-- <li v-for="slide of slider" :key="slide.id">
    Slode  {{ slide.title }}
</!--> 
<div id="header-bottom-wrap" class="is-clearfix">
    <div id="header-bottom" class="site-header-bottom">
      <div id="header-bottom-inner" class="site-header-bottom-inner ">
        <section class="hero slider is-clearfix ">
          <h2 class="display-none">slider</h2>
          <div class="rev_slider_wrapper fullscreen-container ">
            <div id="rev_slider_1" class="rev_slider tp-overflow-hidden fullscreenbanner" data-version="5.4.7" style="display:none">
              <ul>

                <li v-for="slide of slider" :key="slide.id"  data-transition="crossfade">
                  <img alt="Joo - Niche Multi-Purpose HTML Template" class="rev-slidebg" src="assets/images/slider/1.png" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone"
                    data-scalestart="100" data-scaleend="115" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="15">
                  <div class="tp-caption tp-resizeme large_text" data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                    data-x="center" data-hoffset="['0','0','0','0']" data-y="center" data-voffset="['-45','-45','0','0']" data-width="['auto']" data-textAlign="['center','center','center','center']" data-height="['auto']"> {{ slide.title }} </div>
                  <div class="tp-caption tp-resizeme small_text" data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                    data-x="center" data-hoffset="['0','0','0','0']" data-y="center" data-voffset="['45','45','0','0']" data-width="['auto']" data-textAlign="['center','center','center','center']" data-height="['auto']"> قالب بسيط ومميز لموقع شركتك الرائعة </div>
                  <a class="tp-caption tp-resizeme button is-outlined is-white is-rounded" href="#" data-frames='[{"delay":1600,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                    data-x="center" data-hoffset="['-90','-90','0','0']" data-y="center" data-voffset="['125','125','0','0']" data-type="button"> اتصل بنا </a>
                  <a class="tp-caption tp-resizeme button is-primary is-rounded" href="#" data-frames='[{"delay":1600,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                    data-x="center" data-hoffset="['90','90','0','0']" data-y="center" data-voffset="['125','125','0','0']" data-type="button"> اقرأ المزيد </a>
                </li>
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

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL } from '../../config.js';

    export default {
       data() {
    return {
      slideer : []
    }
  },

   mounted () {
    axios
      .get(API_BASE_URL + '/topSlider')
      .then(response => (
        this.slideer = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
  }

  //   async created() {
  //   try {
  //     const res = await axios.get(`http://campny.test/api/topSlider`)
  //     this.slideer = res.data;

  //   } catch(e) {
  //     console.error(e)
  //   }
  // }
      
  }
    
</script>
