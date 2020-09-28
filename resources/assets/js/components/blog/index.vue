<template>
<div>


 <div id="header-bottom-wrap" class="is-clearfix">
        <div id="header-bottom" class="site-header-bottom">
          <div id="header-bottom-inner" class="site-header-bottom-inner ">
            <section class="hero page-title is-medium has-text-centered blog">
              <div class="hero-body">
                <div class="container">
                  <h1>
                    {{ lang_s == 1  ? 'المدونة ' : 'Blog'}} </h1>
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
        <section class="section content-with-sidebar is-clearfix">
          <div class="container">
            <div class="columns is-variable is-5 ">
              <div class="column is-8">
                <div id="content-area" class="site-content-area">
                  <div id="content-area-inner" class="site-content-area-inner">
                    <div class="blog-list default-style-1 columns is-variable is-4 is-multiline">
                      <div v-for="post of posts" :key="post.id" class="column is-12">
                        <article class="blog-post">
                          <figure class="post-image">
                             <router-link exact replace  class="contact" :to="{ name : 'page' , params: { id: post.id } }">  
                              <img  :alt="post.name" :src="`${base1}/media/post/gallery/${post.image}`">
                               </router-link>
                          </figure>
                          <div class="entry-header">
                            <div class="post-meta">
                              <ul>
                                <li>
                                  <span class="icon">
                                    <i class="icon-clock"></i>
                                  </span>
                                  <span> {{ post.insertdate}}</span>
                                </li>
                               
                                <li>
                                  <span class="icon">
                                    <i class="icon-folder"></i>
                                  </span>
                                 
                                </li>
                                <li>
                                  <span class="icon">
                                    <i class="icon-bubbles"></i>
                                  </span>
                                 
                                </li>
                              </ul>
                            </div>
                            <!-- .post-meta -->
                            <h2 class="entry-title">
                            <router-link exact replace class="contact" :to="{ name : 'page' , params: { id: post.id } }">
                           {{ lang_s == 1  ? post.title : post.title_en}}
                              </router-link>
                            </h2>
                          </div>
                          <!-- .entry-header -->
                          <div class="entry-content">
                            <p v-html="lang_s == 1 ? post.summary : post.summary_en"></p>
                          </div>
                          <!-- .entry-content -->
                          <div class="entry-footer">
                             <router-link exact replace  class="button contact" :to="{ name : 'page' , params: { id: post.id } }"> 
                            {{ lang_s == 1  ? '  أكمل القراءة' : 'Read More'}}
                            </router-link>

                          </div>
                          <!-- .entry-footer -->
                        </article>
                        <!-- .blog-post -->
                      </div>
                    </div>
                    <!-- .columns -->
                  
                  </div>
                  <!-- #content-area-inner -->
                </div>
                <!-- #content-area -->
              </div>
              <!-- .column -->
              <div class="column is-narrow is-4">
                <aside id="sidebar" class="sidebar ">
                  <div id="sidebar-inner" class="site-sidebar-inner">
                    <!-- import widgets -->
                    <!-- widgets list -->
                    <div class="widget widget-form">
                      <form>
                        <div class="field">
                          <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Search...">
                            <button type="submit" class="button">
                              <span class="icon">
                                <i class="icon-magnifier"></i>
                              </span>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- .widget -->
                    <div class="widget widget-links">
                      <h3 class="widget-title ">
                        
                          {{ lang_s == 1  ? 'التصنيفات ' : 'Category'}} </h3>
                      <ul>
                        <li v-for="item of category" :key="item.id">
                          <a href="#"> {{ item.shortname}} </a>
                          <!-- <span>(4)</span> -->
                        </li>
                        
                      </ul>
                    </div>
                    <!-- .widget -->
                    
                    <!-- .widget -->
                    <div class="widget widget-social">
                      <h3 class="widget-title ">
                       {{ lang_s == 1  ? 'إتبعنا ' : 'Fllow'}} </h3>
                      <ul>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-facebook-f"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-twitter"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-instagram"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-pinterest-p"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-dribbble"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" target="_blank">
                            <span class="icon">
                              <i class="fab fa-google"></i>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- .widget -->
                    <div class="widget widget-tags">
                      <h3 class="widget-title ">
                        {{ lang_s == 1  ? 'سحابة الوسوم ' : 'Tag'}} 
                        </h3>
                      <div class="tagcloud">

                        <a v-for="item of category" :key="item.id" href="#">
                          {{ item.shortname }}
                         </a>

                      </div>
                      <!-- .tagcloud -->
                    </div>
                 
                    <!-- .widget -->
                  </div>
                  <!-- #sidebar-inner -->
                </aside>
                <!-- #sidebar -->
              </div>
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
import { API_BASE_URL , LANG } from '../../config.js';

    export default {
       data() {
    return {
      posts : [],
      category:[],
      base : location.origin ,
      base1 : location.origin ,
          lang_s: LANG == 'ar' ? 1 : 0 ,
    }
  },

   mounted () {
    axios
      .get(API_BASE_URL +'/posts')
      .then(response => (
        this.posts = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
  },

  created(){

     axios
      .get(API_BASE_URL+ '/category')
      .then(response => (
        this.category = response.data  
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
