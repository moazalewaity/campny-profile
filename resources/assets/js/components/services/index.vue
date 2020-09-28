<template>
<div>
 <section id="services" class="section padding-bottom-none is-clearfix">
              <div class="container">
                <h1 class="heading-title style-1">
                   
                    {{ lang_s == 1  ? 'خدماتنا' : 'Services'}}
                     </h1>
                <!-- <p class="heading-title-bottom has-text-centered">هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ -->
                  <!-- <br> غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p> -->
                <br>
                <br>
                <div class="columns is-variable is-8 is-multiline boxes-style-1">

                  <div v-for="service of services" :key="service.id" class="column is-4" >
                    <div class="box-item ">
                      <a href="#" style="color:#1e6bf7;">
                        <span class="icon">
                          <i :class="service.icon"></i>
                        </span>
                      </a>
                      <h3>
                        <a href="#">
                           {{ lang_s == 1 ? service.title : service.title_en }} 
                           </a>
                      </h3>
                      <p v-html="lang_s == 1 ? service.descrption : service.descrption_en"> </p>
                      <a href="#" class="button">
                         
                          {{ lang_s == 1  ? 'المزيد' : 'More'}}
                        </a>
                    </div>
                    <!-- .box-item -->
                  </div>

                </div>
                <!-- .columns -->
                <br>
                <br>
                <br> </div>
              <!-- .container -->
              <!-- <div class="has-text-centered">
                <img alt="Joo - Niche Multi-Purpose HTML Template" src="assets/images/global/3.png" data-aos="fade-up" class="is-block" style="margin:0 auto;">
                 </div> -->
            </section>
            </div>

</template>


<script>
import axios from 'axios';
import { API_BASE_URL , LANG } from '../../config.js';

    export default {
       data() {
    return {
      services : [] ,
            lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

   mounted () {
      // console.log(location.host + "moaz" + location.origin);
    axios
      .get(API_BASE_URL+'/topServices')
      .then(response => (
        this.services = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })

         console.log('Component mounted.')
  }

    }

 
    
</script>
