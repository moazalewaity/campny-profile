@extends('admin.layouts.backend')

@section('title','إضافة مستخدم جديد')

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



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed ')

@section('page_bar')

<li>

        <a href="{{url('/user/register')}}">مستخدم جديد</a>

        <i class="fa fa-angle-left"></i>

    </li>

@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">تسجيل مستخدم جديد</span>

</div>

        

    </div>



<div class="portlet-body form">

                                                <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_user" enctype="multipart/form-data" >

      {{ csrf_field() }}

     <div class="alert alert-danger" id="adduser_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>

        

        <div class="form-body">



            <div class="form-group">

                <label class="col-md-3 control-label">اسم المستخدم</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" placeholder="اسم المستخدم" id="username" name="username" required=""  data-error="الرجاء ادخال اسم المستخدم">

                     <div class="help-block with-errors"></div>

                    </div>

                

            </div>







            <div class="form-group">

                <label class="col-md-3 control-label">الايميل</label>

                <div class="col-md-4">

                    <div class="input-group">

                        

                        <input type="email" class="form-control"  required placeholder="الايميل" 

                        data-error="الرجاء ادخال الايميل"  id="email" name="email"> 

                        <span class="input-group-addon">

                            <i class="fa fa-envelope"></i>

                        </span>



                            </div>

                        <div class="help-block with-errors"></div>



                </div>

            </div>









            <div class="form-group">

                <label class="col-md-3 control-label">كلمة المرور</label>

                <div class="col-md-4">

                    <div class="input-group">

                        <input type="password" class="form-control" placeholder="كلمة المرور" 

                        required id="password" name="password"   data-error="الرجاء ادخال كلمة المرور">

                        <span class="input-group-addon">

                            <i class="fa fa-user"></i>

                        </span>

                       

                    </div>

                     <div class="help-block with-errors"></div>

                     

                </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label">الاسم الأول</label>

                <div class="col-md-4">

                    <div class="input-icon right">

                        <i class="fa fa-user"></i>

                        <input type="text" class="form-control"  

                        required placeholder="الاسم الأول" id="first_name"  name="first_name" data-error="الرجاء ادخال الاسم الاول"> </div>

                       <div class="help-block with-errors"></div> 

                </div>

                

                 

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label"> العائلة</label>

                <div class="col-md-4">

                    <div class="input-icon right">

                        <i class="fa fa-user"></i>

                        <input type="text" class="form-control" required placeholder="العائلة" data-error="الرجاء ادخال العائلة"  id="last_name" name="last_name"> </div>

                         <div class="help-block with-errors "></div>

                         

                </div>

               

                

            </div>





             <div class="form-group">

                <label class="col-md-3 control-label">صورة المستخدم</label>

                <div class="col-md-4">

                    <div class="input-icon right">

                        <i class="fa fa-user"></i>

                        <input type="file" class="form-control" placeholder="صورة المستخدم"  id="image" name="image"> </div>

                </div>

            </div>





          



      <div class="form-group">

                <label class="col-md-3 control-label">  نوع المستخدم </label>

                <div class="col-md-4">

                <select class="mt-multiselect btn btn-default" name="role" 

                 id="role"   multiple="multiple" data-width="100%">

                @foreach ($roles as $role)



                     <option value="{{$role->slug}}">{{$role->name}}</option>

                                        

                                 @endforeach       

                                    </select>

                 



                </div>

            </div>











            <div class="form-group">

                <label class="col-md-3 control-label">رقم الجوال</label>

                <div class="col-md-4">

                <div class="input-icon right">

                 <i class="fa fa-phone"></i>

                    <input type="text" class="form-control spinner" pattern="[0-9]{10}" data-error="الرجاء ادخال ارقام فقط" placeholder="رقم الجوال" id="mobile_no"  name="mobile_no"> 

                    </div>

            <div class="help-block with-errors "></div>



                    </div>

            </div>





            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">إضافة</button>

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

     $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

$("#add_user").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



  





  e.preventDefault(); 

    var roles = []; 

  $('#role :selected').each(function(i, selected){ 

  roles[i] = $(selected).val(); 

  });



                            

   

         var form = $('#add_user')[0]; 

         var formData = new FormData(form);

         formData.append('roles', JSON.stringify(roles));

         $.ajax({

                type: 'POST',

                dataType: "json",

                url: "{{url('/user/register')}}999999",

                data: formData,

                 contentType: false, 

                 processData: false,

                success: function (e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#adduser_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#adduser_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#adduser_alert').show();

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









