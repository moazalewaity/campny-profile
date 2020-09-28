@extends('admin.layouts.backend')



@section('page_level_plugins_styles')

@endsection



@section('page_global_styles')

@endsection



@section('page_level_styles')

@endsection



@section('theme_layout_styles')

@endsection



@section('style')

<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">

<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">









@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')

<li>

        <a href="{{url('/adminpanel/user/update_password')}}">تغير كلمة المرور</a>

        <i class="fa fa-angle-left"></i>

    </li>

@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">تغير كلمة المرور</span>

</div>

        

    </div>



<div class="portlet-body form">

                                                <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_password" enctype="multipart/form-data" >

      {{ csrf_field() }}

     <div class="alert alert-danger" id="update_password_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>

        

        <div class="form-body">



            <div class="form-group">

                <label class="col-md-3 control-label">كلمة المرور القديمة </label>

                <div class="col-md-4">

                    <input type="password" class="form-control" placeholder="كلمة المرور القديمة" id="old_password" name="old_password" required=""  data-error="الرجاء ادخال كلمة المرور" required="">

                     <div class="help-block with-errors"></div>

                    </div>

                

            </div>







            <div class="form-group">

                <label class="col-md-3 control-label">كلمة المرور الجديدة</label>

                <div class="col-md-4">

                    <div class="input-group">

                        

                        <input type="password" class="form-control"  required placeholder="كلمة المرور الجديدة" 

                        data-error="الرجاء ادخال كلمة المرور"  id="password" name="password"> 

                        <span class="input-group-addon">

                            <i class="fa fa-lock" ></i>

                        </span>



                            </div>

                        <div class="help-block with-errors"></div>



                </div>

            </div>









            <div class="form-group">

                <label class="col-md-3 control-label">تأكيد كلمة المرور</label>

                <div class="col-md-4">

                    <div class="input-group">

                        <input type="password" class="form-control" placeholder="كلمة المرور" 

                        required id="re_password" name="re_password"   data-error="الرجاء ادخال تأكيد كلمة المرور">

                        <span class="input-group-addon">

                            <i class="fa fa-lock"></i>

                        </span>

                       

                    </div>

                     <div class="help-block with-errors"></div>

                     

                </div>

            </div>







            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">حفظ</button>

                    <button type="button" class="btn default">الغاء</button>

                </div>

            </div>

        



        </div>

    </form>

    <!-- END FORM-->

</div> </div></div>

<meta name="_token" content="{!! csrf_token() !!}" />





@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')



@endsection





@section('page_level_scripts_js')

@endsection







@section('scripts')

<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>

<script type="text/javascript">



 $(document).ready(function (e) {

$("#update_password").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



  





  e.preventDefault(); 

    

         $.ajax({

                type: 'POST',

                dataType: "json",

                url: '{!! URL::asset("/adminpanel/user/update_password") !!}',

                data: new FormData($("#update_password")[0]),

                 contentType: false, 

                 processData: false,

                success: function (e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#update_password_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#update_password_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#update_password_alert').show();

              $('#error').empty();

              var error = e.responseJSON;

              $.each(error, function (i, member) {

              for (var i in member) {

              $('#error').append('<li >'+ member[i] +'</li>' );

             }

           });



             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});

            }           

       });



  }

            

        }); 

  });







 



</script>

  



@endsection









