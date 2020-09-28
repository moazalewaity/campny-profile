<template>
<div>


  
  <div id="header-bottom-wrap" class="is-clearfix">
        <div id="header-bottom" class="site-header-bottom">
          <div id="header-bottom-inner" class="site-header-bottom-inner ">
            <section class="hero page-title is-medium has-text-centered contact">
              <div class="hero-body">
                <div class="container">
                 <h3>
                   {{ lang_s == 1  ? page.title : page.title_en}}
                   </h3>
                   <br/>
                  <img :alt="page.name" :src="`${base1}/media/post/gallery/${page.image}`" style="height: 400px;width: 50%;" />
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


  <div id="header-bottom-wrap" class="is-clearfix">
        <div id="header-bottom" class="site-header-bottom">
          <div id="header-bottom-inner" class="site-header-bottom-inner ">
            <section class="hero page-name  has-text-centered blog-single">
              <div class="hero-body">
                <div class="container">
                  <h1> {{ lang_s == 1  ? page.title : page.title_en }} </h1>
                  <h3> {{ lang_s == 1  ? page.summary : page.summary_en }} </h3>
                </div>
                <!-- .hero-body -->
              </div>
              <!-- .container -->
            </section>
            <!-- .page-name -->
          </div>
          <!-- #header-bottom-inner -->
        </div>
        <!-- #header-bottom -->
      </div>
      <!-- #header-bottom-wrap -->
      <!-- import content layouts and modules -->
      <div id="content-main-wrap" class="is-clearfix">
        <section class=" is-clearfix">
          <div class="container">
            <div class="columns is-variable is-5 ">
              <div class="column is-12">
                <div id="content-area" class="site-content-area">
                  <div id="content-area-inner" class="site-content-area-inner">
                    <div class="blog-single">
                      <article class="blog-post ">
                        <figure class="post-image">
                          <!-- <img alt="Joo - Niche Multi-Purpose HTML Template" src="/assets/images/blog/1.png"> </figure> -->
                        <div class="entry-header">
                          <div class="post-meta">
                            <ul>
                              <li>
                                <span class="icon">
                                  <i class="icon-clock"> </i>
                                </span>
                                <span> {{page.insertdate}} </span>
                              </li>
                            </ul>
                          </div>
                          <!-- .post-meta -->
                          <h1 class="entry-name">
                              {{ lang_s == 1  ? page.title : page.title_en }}
                              
                               </h1>
                        </div>
                        <!-- .entry-header -->
                        <div class="entry-content content">
                          <p v-html="lang_s == 1 ? page.description : page.description_en"> </p>
                        </div>
                        </figure>
                        <!-- .entry-content -->
                       
                        <!-- .entry-footer -->
                      </article>
                      <!-- .blog-post -->
                    
                     
                    </div>
                    <!-- .blog-single -->
                  </div>
                  <!-- #content-area-inner -->
                </div>
                <!-- #content-area -->
              </div>
              <!-- .column -->
            
              <!-- .column -->
            </div>
            <!-- .columns -->
          </div>
        </section>
        <!-- .content-with-sidebar -->
      </div>

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL , LANG} from '../../config.js';

    export default {
       data() {
    return {
      page : [] , 
     lang_s: LANG == 'ar' ? 1 : 0 ,
         base : location.origin ,
      base1 : location.origin ,

    }
  },
//created ,mounted
   created  () {

   
    axios
      .get(API_BASE_URL+'/post/'+this.$route.params.id)
      .then(response => (
        //  setInterval(function(){
        this.page = response.data  
          // }, 3000)
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
