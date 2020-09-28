<template>
<div>

 <section class="section call-to-action style-1 has-background-primary is-clearfix">
              <div class="container">
                <div class="level">
                  <div>
                    <h1 class="title has-text-white">
                     
                        {{ lang_s == 1  ? '  دعنا نعمل على فكرتك بشكل ابداعى ومتقن  .' : 'Let us work on your idea creatively and elaborately.'}}
                       </h1>
                  </div>
                  <div class="level-right">
                    <!-- <a href="./pages/contact.html" class="button is-white">ابدأ مشروعك</a> -->
                <router-link :to="{ name : 'contact'}"  replace  class="button is-white"> 
                
                   {{ lang_s == 1  ? '  ابدأ مشروعك' : 'Start your project'}}
                  </router-link>
                  </div>
                  <!-- .level-right -->
                </div>
                <!-- .level -->
              </div>
            </section>

</div>
</template>

<script>
import { API_BASE_URL , LANG } from '../../config.js'


    export default {
       data() {
    return {
      lang_s: LANG == 'ar' ? 1 : 0 ,
    }
  }
    }
</script>
