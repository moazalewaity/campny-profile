<template>
<div>




<div id="header-bottom-wrap" class="is-clearfix"><div id="header-bottom" class="site-header-bottom"><div id="header-bottom-inner" class="site-header-bottom-inner "><section class="hero page-title is-medium has-text-centered blog-single"><div class="hero-body"><div class="container">
    <h1>
         {{ lang_s == 1 ? work.title : work.title_en  }} 
        </h1>
 
 </div></div></section></div></div></div>


      <div id="content-main-wrap" class="is-clearfix" style="background-color: rgb(22, 22, 22);">
        <div id="content-area" class="site-content-area">
          <div id="content-area-inner" class="site-content-area-inner">
            <!-- portfolio-single content section -->
            <section class="section portfolio-single is-clearfix">
              <div class="container">
                <div class="columns is-centered">
                  <div class="column is-two-thirds has-text-centered">
                    <h1 class="heading-title style-1">{{ work.title}}</h1>
                    <p v-html="lang_s == 1 ? work.descrption : work.descrption_en">  </p>
                    <br>
                    <br>
                    <br> </div>
                </div>
                <div class="columns is-centered">
                  <div class="column is-three-quarters has-text-centered">
                    <div class="columns is-variable is-multiline is-4">
                      <div class="column widget is-3 widget-links">
                        <h3 class="widget-title has-text-primary-6 margin-top-none">العميل </h3>
                        <ul>
                          <li>{{ work.client}}</li>
                        </ul>
                      </div>
                      <div class="column widget is-3 widget-links">
                        <h3 class="widget-title has-text-primary-6">تاريخ المشروع</h3>
                        <ul>
                          <li>{{ work.date}}</li>
                        </ul>
                      </div>


                       <div class="column widget is-3 widget-links">
                        <h3 class="widget-title has-text-primary-6">رابط المشروع </h3>
                        <ul>
                          <li>{{ work.url}}</li>
                        </ul>
                      </div>
                     
                    </div>
                  </div>
                </div>


                <img :alt="work.title"  :src="`${base1}/media/works/img/${work.image}`" />


                <br>
                <br>
                <div class="has-text-centered">
                  <div class="global-social-links style-1">
                    <ul>
                      <li>
                        <a href="#">
                          <span class="icon">
                            <i class="fab fa-facebook-f"></i>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="icon">
                            <i class="fab fa-twitter"></i>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
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
            <!-- works section -->
          
            <!-- .related-works -->
          </div>
          <!-- #content-area-inner -->
        </div>
        <!-- #content-area -->
      </div>

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL , LANG } from '../../config.js';

    export default {
       data() {
    return {
      work : [],
         base : location.origin ,
      base1 : location.origin ,
            lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

   mounted () {
    axios
      .get(API_BASE_URL+'/work/'+this.$route.params.id)
      .then(response => (
        this.work = response.data  
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
