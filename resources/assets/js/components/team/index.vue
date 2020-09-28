<template>
<div>
  <section id="team" class="section fun-facts  is-clearfix">
              <div class="container">
                <h1 class="heading-title style-1" style="color:white;">
                  
                 {{ lang_s == 1  ? ' فريق العمل' : 'Team Work '}}
                  </h1>
                <!-- <p class="heading-title-bottom has-text-centered">هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ -->
                  <!-- <br> غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p> -->
                <br>
                <br>
                <div class="team style-1">
                  <div class="columns is-variable is-4 is-multiline">

                    <div v-for="team of teams" :key="team.id"  class="column is-4">
                      <div  class="team-member">
                        <figure class="team-member-img">
                          <a href="#">
                            <img :alt="team.name" :src="`${base1}/media/teams/img/${team.image}`"> </a>
                        </figure>
                        <div class="team-member-meta">
                          <div class="team-info">
                            <h3>
                              <a href="#">
                             {{ lang_s == 1 ? team.name : team.name_en }} 
                                  </a>
                            </h3>
                            <h5>
                              <a href="#">
                               {{ lang_s == 1 ? team.jobTitlt : team.jobTitlt_en }} 
                                </a>
                            </h5>
                          </div>
                          <ul class="team-social-links">
                            <li>
                              <a :href="team.fb_url" target="_blank">
                                <span class="icon">
                                  <i class="fab fa-facebook-f"></i>
                                </span>
                              </a>
                            </li>
                            <li>
                              <a :href="team.t_url" target="_blank">
                                <span class="icon">
                                  <i class="fab fa-twitter"></i>
                                </span>
                              </a>
                            </li>
                            <li>
                              <a :href=" team.in_url" target="_blank">
                                <span class="icon">
                                  <i class="fab fa-instagram"></i>
                                </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- .team-member -->
                    </div>


                  </div>
                  <!-- /.columns -->
                </div>
                <!-- /.team -->
                <br>
                <br>
                <br>
                <!-- <div class="has-text-centered">
                  <a class="button" href="#">تعرف على الفريق</a>
                </div> -->
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
      teams : [] ,
       base : location.origin ,
      base1 : location.origin ,
            lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

   mounted () {
     
    axios
      .get(API_BASE_URL+ '/teams')
      .then(response => (
        this.teams = response.data  
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