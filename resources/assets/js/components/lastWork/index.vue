<template>
<div>

<section id="works" class="hero has-background-primary-light padding-bottom-none">
            
          <section>

             <!-- <div class="column is-12-desktop is-12-tablet"> -->
                    <h1 style="margin-top: 90px;" class="heading-title style-1 has-text-center">
                        <!-- مشاريعنا -->
                       {{ lang_s == 1  ? 'مشاريعنا' : 'Projects'}}
                       <!-- {{ LANG }} -->
                       </h1>
                  <!-- </div> -->

              <div >
                <br>
                <br>


                <div v-for="(work , index ) of works" :key="work.id" class="columns is-variable is-12 is-multiline">
                  <template v-if="index % 2 == 0">

                   <div class="column is-6-desktop is-12-tablet has-text-centered">
                    <div class="works-latest">
                      <div class="works-latest-item">
                        <img width="1800" style="height: 500px;"  :alt="work.title" :src="`${base1}/media/works/img/${work.image}`">
                        
                        <!-- .works-latest-icon -->
                      </div>
                      <!-- .works-latest-item -->
                    </div>
                  </div>
                  
                  <div style="margin-top: 100px;" class="column is-6-desktop is-12-tablet">
                    <br>
                    <center>
                     <img :alt="work.title" :src="`${base1}/media/works/logos/img/${work.logo}`" width="100" height="100" />
                     </center>
                    <h1 class="heading-title style-1">
                        {{ lang_s == 1 ? work.title : work.title_en }} 
                     </h1>
                    
                    <center><p  v-html="lang_s == 1 ? work.descrption : work.descrption_en"></p></center>
                    <br>
                    <center>
                    <div class="works-button">
                      <a :href="work.url" target="_new" class="button is-primary is-rounded">
                        
                      {{ lang_s == 1 ? ' عرض الموقع' : 'View the site' }} 
                      </a>
                    </div>
                    </center>
                    <!-- .works-button -->
                  </div>
                  </template>

                  <template v-else>
                  <div style="margin-top: 100px;" class="column is-6-desktop is-12-tablet">
                    <br>
                    <center><img :alt="work.title" :src="`${base1}/media/works/logos/img/${work.logo}`" width="100" height="100" /></center>
                    <h1 class="heading-title style-1">
                         {{ lang_s == 1 ? work.title : work.title_en }} 
                         </h1>

                    <center>
                      <p  v-html="lang_s == 1 ? work.descrption : work.descrption_en">

                      </p>
                      </center>
                    <br>
                    <center>
                    <div class="works-button">
                      <a :href="work.url" target="_new" class="button is-primary is-rounded">
                         {{ lang_s == 1 ? ' عرض الموقع' : 'View the site' }} 
                          </a>
                    </div>
                    </center>
                    <!-- .works-button -->
                  </div>
                   <div class="column is-6-desktop is-12-tablet has-text-centered">
                    <div class="works-latest">
                      <div class="works-latest-item">
                        <img width="1800" style="height: 500px;"  :alt="work.title" :src="`${base1}/media/works/img/${work.image}`">
                        
                        <!-- .works-latest-icon -->
                      </div>
                      <!-- .works-latest-item -->
                    </div>
                  </div>

                  </template>
                 
                </div>
                </div>
            </section>
              <!-- .works -->
            </section>

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


  created(){

// console.log( LANG );
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
