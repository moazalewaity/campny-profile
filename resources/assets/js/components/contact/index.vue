<template>
<div>

  <div id="header-bottom-wrap" class="is-clearfix">
        <div id="header-bottom" class="site-header-bottom">
          <div id="header-bottom-inner" class="site-header-bottom-inner ">
            <section class="hero page-title is-medium has-text-centered contact">
              <div class="hero-body">
                <div class="container">
                  <h1>
                   
                   {{ lang_s == 1  ? ' اتصل بنا ' : 'Call Us'}}
                    </h1>

                  <h3>
                    
                    {{ lang_s == 1  ? '  ابقى على تواصل دائما ' : 'Always keep in touch'}}
                     </h3>
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
            <!-- contact-form section -->
            <section class="section contact-form is-clearfix">
              <div class="container">
             
                <div class="columns is-multiline is-variable is-8" >
                  <div class="column is-4">
                    <div class="columns is-variable is-4 is-multiline boxes-style-3">
                      <div class="column is-12" >
                        <div class="box-item media">
                          <div class="media-left">
                            <a href="#">
                              <span class="icon">
                                <i class="ion-ios-pin-outline"></i>
                              </span>
                            </a>
                          </div>
                          <div class="media-content">
                            <h3>
                              <a href="#">
                                
                               {{ lang_s == 1  ? 'العنوان ' : 'address'}} </a>
                            </h3>
                            <p> {{ setting.address}}
                            </p>
                          </div>
                        </div>
                        <!-- .box-item -->
                      </div>
                      <div class="column is-12">
                        <div class="box-item media">
                          <div class="media-left">
                            <a href="#">
                              <span class="icon">
                                <i class="ion-ios-call-outline"></i>
                              </span>
                            </a>
                          </div>
                          <div class="media-content">
                            <h3>
                              <a href="#">
                                
                                 {{ lang_s == 1  ? '  الهاتف ' : 'Phone'}}
                                </a>
                            </h3>
                            <p> {{ setting.phone}} </p>
                          </div>
                        </div>
                        <!-- .box-item -->
                      </div>
                      <div class="column is-12">
                        <div class="box-item media">
                          <div class="media-left">
                            <a href="#">
                              <span class="icon">
                                <i class="ion-ios-mail-outline"></i>
                              </span>
                            </a>
                          </div>
                          <div class="media-content">
                            <h3>
                              <a href="#">
                                  {{ lang_s == 1  ? '  البريد الالكتروني ' : 'Email'}} </a>
                            </h3>
                            <p>{{ setting.email}}</p>
                          </div>
                        </div>
                        <!-- .box-item -->
                      </div>
                    </div>
                    <!-- .columns -->
                  </div>
                  <div class="column is-8">
                    <!-- successful form message -->
                    <div class="overhang-message-content is-hidden success">
                      <span class="icon">
                        <i class="ion-md-notifications"></i>
                      </span> شكرا لكم! لقد تم ارسال رسالتك بنجاح. </div>
                    <!-- error form message -->
                    <div class="overhang-message-content is-hidden error">
                      <span class="icon">
                        <i class="ion-md-notifications"></i>
                      </span> اوبس ! حدث خطأ ما ، لم نتمكن من إرسال رسالتك. </div>
                    <!-- ajax contact form -->
                    <form @submit.prevent="create" accept-charset="UTF-8" class="ajax-contact-form"  method="POST">
                      <div class="field is-horizontal">
                        <div class="field-body">
                          <div class="field">
                            <div class="control is-expanded">
                              <input autofocus class="input" v-model="form.name" type="text" name="name" placeholder="الاسم " required> </div>
                          </div>
                          <!-- .field -->
                          <div class="field">
                            <div class="control is-expanded">
                              <input class="input" type="text" v-model="form.subject"  name="subject" placeholder="الموضوع" required> </div>
                          </div>
                          <!-- .field -->
                        </div>
                        <!-- .field-body -->
                      </div>
                      <!-- .field -->
                      <div class="field is-horizontal">
                        <div class="field-body">
                          <div class="field">
                            <div class="control is-expanded">
                              <input class="input" type="tel" v-model="form.phone"  name="phone" placeholder="الهاتف" required> </div>
                          </div>
                          <!-- .field -->
                          <div class="field">
                            <div class="control is-expanded">
                              <input class="input" type="email" v-model="form.email"  name="email" placeholder="البريد الالكترونى" required> </div>
                          </div>
                          <!-- .field -->
                        </div>
                        <!-- .field-body -->
                      </div>
                      <!-- .field -->
                      <div class="field ">
                        <div class="control is-expanded">
                          <textarea class="textarea" v-model="form.textarea" name="textarea" placeholder="رسالتك" required></textarea>
                        </div>
                      </div>
                      <!-- .field -->
                      <div class="field ">
                        <div class="control has-text-centered">
                          <button :class="className" type="submit">
                           
                            {{ lang_s == 1  ? ' ارسال الرسالة ' : 'Send the message'}} 
                            </button>
                        </div>
                      </div>
                      <!-- .field -->
                    </form>
                  </div>
                </div>
                <br> </div>
            </section>
            <!-- .contact-form -->
            <!-- google-maps section -->
            <!-- <section class="hero google-maps is-clearfix">
              <div>
                <div>
                  <iframe src="https://snazzymaps.com/embed/127304" width="100%" height="500px" style="border:none;"></iframe>
                </div>
              </div>
            </section> -->
            <!-- .google-maps -->
          </div>
          <!-- #content-area-inner -->
        </div>
        <!-- #content-area -->
      </div>

</div>
</template>

<script>
import axios from 'axios';
import { API_BASE_URL  , LANG} from '../../config.js'

    export default {

        data() {
    return {
      form:{
        name:"",
        phone:"",
        email:"",
        subject:"",
        textarea:"",

      },
      data:[],
      className:"button",
      base : location.origin ,
      base1 : location.origin ,
      setting:[],
            lang_s: LANG == 'ar' ? 1 : 0 ,

    }
  },

  methods: {
  
//  create() {
//     const { data } = axios.post(API_BASE_URL+'/concat' , this.form);
//     // this.cruds.push(new Crud(data));
//     alert("تم ارسلا رسالتك بنجاح ");
//   },
     create(){
          try{
          axios.post(API_BASE_URL+'/concat' , this.form )
          .then(res =>{
             this.data =  res.data
              alert("تمت العملية بنجاح ");
              this.className = "button overhang-top overhang-success";
            })             
          }catch(error){
            alert("لم تتم العملية بنجاح ");
             console.log(error);
          }
      },
 

  },
       created(){

     axios
      .get(API_BASE_URL+ '/setting')
      .then(response => (
        this.setting = response.data  
        // console.log(response.data)
        ))
        .catch(function (error) {
          // handle error
          console.log(error);
        })

  }

        
    }
</script>
