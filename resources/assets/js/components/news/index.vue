<template>
<div>

  <section id="news" class="section has-background-primary-light is-clearfix">
              <div class="container">
                <h1 class="heading-title style-1 has-text-left">
                 
                   {{ lang_s == 1  ? ' آخر الأخبار' : 'Last News'}}
                  </h1>
                <!-- sss -->
                      <div class="blog-list style-2 columns is-variable is-4 is-multiline">
                 
                  <div v-for="post of posts" :key="post.id" class="column is-4">
                    <article class="blog-post">
                      <figure class="post-image">
                         <router-link   class="contact" :to="{ name : 'page' , params: { id: post.id } }">  
                        <img :alt="post.name" :src="`${base1}/media/post/gallery/${post.image}`">
                      </router-link>
                      </figure>
                      <div class="entry-header">
                        <h2 class="entry-title">
                            <router-link   class="contact" :to="{ name : 'page' , params: { id: post.id } }"> 
                          
                          {{ lang_s == 1  ? post.title : post.title_en}}
                        </router-link>
                        </h2>
                        <div class="post-meta">
                          <ul>
                           
                            <li>
                              <span>{{ post.insertdate }}</span>
                            </li>
                          </ul>
                        </div>
                        <!-- .post-meta -->
                      </div>
                      <!-- .entry-header -->
                      <div class="entry-content">
                        <p v-html="lang_s == 1  ? post.summary : post.summary_en"></p>
                      </div>

                                <div class="entry-footer">
                             <router-link   class="button contact" :to="{ name : 'page' , params: { id: post.id } }"> 
                          
                          {{ lang_s == 1  ? '  أكمل القراءة' : 'Read More'}}
                            </router-link>

                     </div>
                      <!-- .entry-content -->
                    </article>
                    <!-- .blog-post -->
                  
                  </div>


                </div>
              </div>
            </section>

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL , LANG } from '../../config.js'

    export default {
       data() {
    return {
      posts : [] ,
      base : location.origin ,
       base1 : location.origin ,
      lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },


  mounted () {
     
    axios
      .get(API_BASE_URL+ '/postsLimt')
      .then(response => (
        this.posts = response.data  
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

