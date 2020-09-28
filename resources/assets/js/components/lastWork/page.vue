<template>
<div>


  <div id="header-bottom-wrap" class="is-clearfix">
        <div id="header-bottom" class="site-header-bottom">
          <div id="header-bottom-inner" class="site-header-bottom-inner ">
            <section class="hero page-title is-medium has-text-centered about">
              <div class="hero-body">
                <div class="container">
                  <h1>  {{ lang_s == 1  ? 'مشاريعنا' : 'Projects'}}  </h1>
                  <!-- <h3>Break Through Self Doubt And Fear</h3> -->
                </div>
                <!-- .hero-body -->
              </div>
              <!-- .container -->
            </section>
            <!-- .page-title -->
          </div>
          <!-- #header-bottom-inner -->
        </div>
        <!-- #header-bottom -->
      </div>
      <!-- #header-bottom-wrap -->
      <!-- import content layouts and modules -->
      <div id="content-main-wrap" class="is-clearfix">
        <div id="content-area" class="site-content-area">
          <div id="content-area-inner" class="site-content-area-inner">
            <section class="section counters is-clearfix">
              <div class="container">
                <br>
                <div class="team style-2">
                  <div class="columns is-variable is-4 is-multiline">


                    <div v-for="work of works" :key="work.id" class="column is-4">
                      <div class="team-member">
                        <figure class="team-member-img">
                         <router-link  :to="{ name : 'work' , params: { id: work.id } }" class="contact"> 

                            <img :alt="work.title" :src="`${base1}/media/works/img/${work.image}`">
                             </router-link>
                        </figure>
                        <div class="team-member-meta">
                          <h3>
                          <router-link  :to="{ name : 'work' , params: { id: work.id } }" class="contact"> 

                              {{ lang_s == 1 ? work.title : work.title_en  }} 
                           </router-link>
                          </h3>
                          <h5>
                            <a style="color:black" :href="work.url" target="_new" class="button is-black is-outlined is-radiusless">
                              
                                 
                          {{ lang_s == 1  ? '   عرض الموقع' : 'View the site'}}
                                </a>
                          </h5>
                          
                        </div>
                      </div>
                      <!-- .team-member -->
                    </div>


                  </div>
                  <!-- /.columns -->
                </div>
                <!-- /.team -->
                <br> </div>
            </section>
           
          </div>
          <!-- #content-area-inner -->
        </div>
        <!-- #content-area -->
      </div>

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL , LANG } from '../../config.js'


    export default {
       data() {
    return {
      works : [],
      category:[],
      base : location.origin ,
      base1 : location.origin ,
       lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

   mounted () {
    axios
      .get(API_BASE_URL +'/works')
      .then(response => (
        this.works = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
  },

  
    }
  // v-for="client of clients" :key="client.id"
 
    
</script>
