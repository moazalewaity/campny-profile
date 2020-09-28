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

        <a href="#">{{ trans('mainpage.rule_new') }}</a>

        <i class="fa fa-angle-left"></i>

    </li>

@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">add new rule</span>

</div>

        

    </div>



<div class="portlet-body form">

                                                <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_rule" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addrule_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>

        

        <div class="form-body">



            <div class="form-group">

                <label class="col-md-3 control-label">slug</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="slug" id="slug" name="slug" required  data-error="الرجاء ادخال ال slug">

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            

           

            

            <div class="form-group">

                <label class="col-md-3 control-label">name</label>

                <div class="col-md-4">

                    

            <input type="text" class="form-control" placeholder="name"  required id="name" name="name"  data-error="الرجاء ادخال الاسم">

             <div class="help-block with-errors"></div>

                </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label">  permissions </label>

                <div class="col-md-4">

                <select class="mt-multiselect btn btn-default" name="permissions" 

                 id="permissions"   multiple="multiple" data-width="100%">

                @foreach ($permissions as $permission)



                     <option value="{{$permission->slug}}">{{$permission->title}}</option>

                                        

                                 @endforeach       

                                    </select>

                  <div class="help-block with-errors"></div>



                </div>

            </div>





            





             



          

            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">{{ trans('mainpage.add') }}</button>

                    <button type="button" class="btn default">{{ trans('mainpage.cancel') }}</button>

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

$("#add_rule").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 



 ///////////////////////////////////////////////////////////////////////

 /*var permissions = new Array();

 $.each($('#permissions :selected'), function (key, value) {

      permissions.push(value.value);

         });*/



 var permissions = []; 

$('#permissions :selected').each(function(i, selected){ 

  permissions[i] = $(selected).val(); 

});

//alert(permissions);

                            

  var array = {

      "name":$('#name').val(),

      "slug":$('#slug').val(),

      "permissions":permissions





     

  };







 ////////////////////////////////////////////////////////////////

   



         $.ajax({

                type: 'POST',

                dataType: "json",

                url: "{!! URL::asset("/rules") !!}",

                data: array,

                success: function (e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#addrule_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#addrule_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#addpermission_alert').show();

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









