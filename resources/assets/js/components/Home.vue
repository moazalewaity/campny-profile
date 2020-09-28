<template>
    <div>
       <!-- <Hero></Hero> -->
       <!-- <WatchVideo></WatchVideo> -->
       <work></work>
      <Services></Services>
       <Team></Team> 
       <Clients></Clients>
       <CallAction></CallAction>
       <News></News>
    </div>
</template>

<script>

import Services from './services/index.vue'
import Hero from './hero/index.vue'
import WatchVideo from './watch/index.vue'
import Work from './lastWork/index.vue'
import Team from './team/index.vue'
import CallAction from './callAction/index.vue'

import Clients from './clients/index.vue'
import News from './news/index.vue'

    export default {
        components:{
            Services  ,Hero , WatchVideo ,Work , Team , Clients ,CallAction , News
        }
    }
</script>
