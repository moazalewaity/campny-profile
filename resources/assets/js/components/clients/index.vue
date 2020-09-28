<template>
<div>

 <section id="clients" class="section has-background-secondary-2  is-clearfix">
              <div class="container">
                <h1 class="heading-title style-3 has-text-white">
                 
                     {{ lang_s == 1  ? '  قالوا عنا ' : 'They said about us'}}
                   </h1>
                <div class="testimonials-quote has-text-centered">
                  <span class="icon">
                    <i class="fas fa-quote-right"></i>
                  </span>
                </div>
                 <!-- eeeeeeeeeeeeeeeee -->


              <div class="testimonials style-4 owl-carousel dots carousel-items- owl-rtl owl-loaded owl-drag">
                 <template>
                  <div  v-for="client of clients" :key="client.id" class="testimonials-item">
                    <p style="color:white"  v-html="lang_s == 1 ? client.descrption : client.descrption_en"></p>
                    <div>
                      <!-- <img alt="Joo - Niche Multi-Purpose HTML Template" src="./assets/images/testimonials/1.png"> </div> -->
                    <h3> {{ lang_s == 1 ? client.name : client.name_en }}
                      <br>
                      <span>
                        {{ client.addres }}
                        </span>
                    </h3>
                  </div>

                </div>
                </template>
               


              </div>
              </div>
            
              
            </section>

</div>
</template>


<script>
import axios from 'axios';
import { API_BASE_URL , LANG } from '../../config.js';

    export default {
       data() {
    return {
      clients : [] , 
            lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

   mounted () {
     
    axios
      .get(API_BASE_URL+ '/clients')
      .then(response => (
        this.clients = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
  }
    }
  // v-for="client of clients" :key="client.id"
 
    
</script>
