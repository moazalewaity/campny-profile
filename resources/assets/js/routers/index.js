import Home  from '../components/Home.vue'
import Services from '../components/services/index.vue'
import Hero from '../components/hero/index.vue'
import WatchVideo from '../components/watch/index.vue'
import Contact from '../components/contact/index.vue'
import Works from '../components/lastWork/page.vue'
import Clients from '../components/clients/index.vue'
import Page from '../components/page/index.vue'
import Blog from '../components/blog/index.vue'
import Work from '../components/lastWork/work.vue'
import Contact2 from '../components/page/page.vue'

import news from '../components/news/index.vue'

export default {
    mode : "history" , 

    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
          return savedPosition
        } 
          return { x: 0, y: 0 }
        
      },
    routes : [
        {
            path: '/',
            component : Home ,
            name : 'home',
            meta: {
                title: 'الرئيسية',
            }
        },

        {
            path: '/campny',
            component : Home ,
            name : 'campny',
            meta: {
                title: 'الرئيسية',
            },
        },

        
        {
            path: '/works',
            component : Works ,
            name : 'works',
            meta: {
                title: 'المشاريع',
            }
        },
        {
            path: '/services',
            component : Services ,
            name : 'services',
            meta: {
                title: 'الخدمات',
            }
        },

        {
            path: '/hero',
            component : Hero ,
            name : 'hero',
            meta: {
                title: 'الاحصائيات',
            }
        },
        {
            path: '/watch',
            component : WatchVideo ,
            name : 'watch',
            meta: {
                title: 'شاهد الان',
            }
        },

        {
            path: '/contact',
            component : Contact ,
            name : 'contact',
            meta: {
                title: 'اتصل بنا',
            }
        },

        {
            path: '/clients',
            component : Clients ,
            name : 'clients',
            meta: {
                title: ' العملاء',
            }
        },

        {
            path: '/contact',
            component : Contact ,
            name : 'campnycontact',
            meta: {
                title: 'اتصل بنا ',
            }
        },


        {
            path: '/works',
            component : Works ,
            name : 'works1',
            meta: {
                title: 'المشاريع',
            }
        },
        {
            path: '/services',
            component : Services ,
            name : 'services1',
            meta: {
                title: 'الخدمات',
            }
        },

        {
            path: '/page/:id',
            component : Page ,
            name : 'page',
            
        },

        {
            path: '/contact2/:id',
            component : Contact2 ,
            name : 'contact2',
            
        },

        

        {
            path: '/work/:id',
            component : Work ,
            name : 'work',
            
        },

        {
            path: '/news',
            component : news ,
            name : 'news',
            
        },


        
        {
            path: '/blog',
            component : Blog ,
            name : 'blog',
            meta: {
                title: 'الصفحات',
            }
        },
         

        
    ]
}