



<!DOCTYPE html>



<!-- 



Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7



Version: 4.7.5



Author: KeenThemes



Website: http://www.keenthemes.com/



Contact: support@keenthemes.com



Follow: www.twitter.com/keenthemes



Dribbble: www.dribbble.com/keenthemes



Like: www.facebook.com/keenthemes



Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes



Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes



License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.



-->



<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->



<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->



<!--[if !IE]><!-->



<html lang="en" dir="rtl">



    <!--<![endif]-->



    <!-- BEGIN HEAD -->







    <head>



        <meta charset="utf-8" />



        <title>تسجيل الدخول</title>



        <meta http-equiv="X-UA-Compatible" content="IE=edge">



        <meta content="width=device-width, initial-scale=1" name="viewport" />



        <meta content="Preview page of Metronic Admin RTL Theme #2 for " name="description" />



        <meta content="" name="author" />



        <!-- BEGIN GLOBAL MANDATORY STYLES -->



        <link href="{{url('/')}}/admin/assets/fonts_googleapis.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />



        <!-- END GLOBAL MANDATORY STYLES -->



        <!-- BEGIN PAGE LEVEL PLUGINS -->



        <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />



        <!-- END PAGE LEVEL PLUGINS -->



        <!-- BEGIN THEME GLOBAL STYLES -->



        <link href="{{url('/')}}/admin/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />



        <!-- END THEME GLOBAL STYLES -->



        <!-- BEGIN PAGE LEVEL STYLES -->



        <link href="{{url('/')}}/admin/assets/pages/css/login-rtl.min.css" rel="stylesheet" type="text/css" />



        <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">



        <!-- END PAGE LEVEL STYLES -->



        <!-- BEGIN THEME LAYOUT STYLES -->



        <!-- END THEME LAYOUT STYLES -->



         <link rel="shortcut icon" href="{{url('/')}}/admin/assets/layouts/layout2/img/favicon.ico" /> </head>



    <!-- END HEAD -->

    <style type="text/css">

    /* body{
        background-image: url('../img/1.gif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        /* background-position: center; */
        /* background-origin: content-box; */

    } */

        .logo > img {

            position: absolute;

            left: 25%;

            top: 0%;

            width: 270px;

            z-index: -9;

            -webkit-animation:linear infinite alternate;

            -webkit-animation-name: run;

            -webkit-animation-duration: 5s;

        }

        @-webkit-keyframes run {

            0% { transform: rotate(5deg); }

            50%{ transform: rotate(-5deg); }

            100%{  transform: rotate(5deg);  }

        }

    </style>





    <body class=" login">



        <!-- BEGIN LOGO -->



        <div class="logo">



            <a href="index.html" style="text-decoration: none">



                <img src="{{url('/')}}/img/logo.png" width="100" height="100" alt="" style="height:auto" />
                <h2>{{ $setting->title }}</h2>
             </a>

            <!-- <img src="{{ url('/') }}/admin/image.png" title="Happy New Year 2019"> -->

        </div>



        <!-- END LOGO -->
     


        <!-- BEGIN LOGIN -->



        <div class="content">



            <!-- BEGIN LOGIN FORM -->



            <form class="login-form" action="{{url('/adminpanel/login')}}" method="post">



              {{ csrf_field() }}







                <h3 class="form-title font-green" style="font-family: 'DroidArabicKufiRegular', sans-serif;">تسجيل الدخول</h3>



              @if(session('error'))



                <div class="alert alert-danger ">







                    <button class="close" data-close="alert"></button>











                    <span> {{session('error')}} </span>



                </div>



                @endif







                <div class="form-group">



                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->



                    <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>



                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم" name="email" required /> </div>



                <div class="form-group">



                    <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>



                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" required /> </div>



                <div class="form-actions">



                    <button type="submit" class="btn green uppercase">تسجيل الدخول</button>



                    



                       



                        <span></span>



                    </label>



                   



                </div>



                



               



            </form>




            <!-- END LOGIN FORM -->



            <!-- BEGIN FORGOT PASSWORD FORM -->



           @include('admin.content.fpassword')



            <!-- END FORGOT PASSWORD FORM -->



            <!-- BEGIN REGISTRATION FORM -->



           @include('admin.content.register')



            <!-- END REGISTRATION FORM -->



        </div>

        {{-- <center> --}}
            {{-- <img src="{{url('/')}}/img/1.gif" width="300" height="300" /> --}}
        {{-- </center> --}}



        <div class="copyright"> 2019 © جميع الحقوق محفوظة  </div>



        <!--[if lt IE 9]>



<script src="{{url('/')}}/admin/assets/global/plugins/respond.min.js"></script>



<script src="{{url('/')}}/admin/assets/global/plugins/excanvas.min.js"></script> 



<script src="{{url('/')}}/admin/assets/global/plugins/ie8.fix.min.js"></script> 



<![endif]-->



        <!-- BEGIN CORE PLUGINS -->



        <script src="{{url('/')}}/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>



        <!-- END CORE PLUGINS -->



        <!-- BEGIN PAGE LEVEL PLUGINS -->



        <script src="{{url('/')}}/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>



        <!-- END PAGE LEVEL PLUGINS -->



        <!-- BEGIN THEME GLOBAL SCRIPTS -->



        <script src="{{url('/')}}/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>



        <!-- END THEME GLOBAL SCRIPTS -->



        <!-- BEGIN PAGE LEVEL SCRIPTS -->



        <script src="{{url('/')}}/admin/assets/pages/scripts/login.min.js" type="text/javascript"></script>



        <!-- END PAGE LEVEL SCRIPTS -->



        <!-- BEGIN THEME LAYOUT SCRIPTS -->



        <!-- END THEME LAYOUT SCRIPTS -->



        <script>



            $(document).ready(function()



            {



                $('#clickmewow').click(function()



                {



                    $('#radio1003').attr('checked', 'checked');



                });



            })



        </script>



    <!-- Google Code for Universal Analytics -->







<!-- End -->







<!-- Google Tag Manager -->



<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W276BJ"



height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>



<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':



new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],



j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=



'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);



})(window,document,'script','dataLayer','GTM-W276BJ');</script>



<!-- End -->



</body>











</html>