@extends('admin.layouts.backend')



@section('page_level_plugins_styles')

 <link href="{{url('/')}}/admin/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

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

<style type="text/css">

.form-group .grand{

  height: 260px;

  border: 2px solid #ddd;

  overflow: auto;

  padding: 0px  0px;

  margin: 10px 40px ;

 

}

.form-horizontal .form-group {

    margin-right: 5px;

    margin-left: 0px;

}



</style>





@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')

 @if( isset($role) )

<li>

        <a href="#">{{ trans('mainpage.rule_new_role') }}</a>

        <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>

    </li>

@else

 <li>

        <a href="#">{{ trans('mainpage.rule_new') }}</a>

        <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>

    </li>

 @endif      

@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">

      @if( isset($role) ) 

    update new role

    @else

    add role

    @endif

    </span>

</div>

        

    </div>



<div class="portlet-body form">

    @if( isset($role) )                                             <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_role" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="update_role_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>



             <input name="_method" type="hidden" value="PUT">  

@else



      <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_rule" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addrule_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div> 

        @endif                                     

        

        <div class="form-body">



            <div class="form-group">

                <label class="col-md-3 control-label">slug</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="slug" id="slug" name="slug" required 

               value="{{ old('slug',  isset($role->slug) ? $role->slug : null) }}"

                      data-error="{{ trans('mainpage.rule_name') }}  slug">

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            

           

            

            <div class="form-group">

                <label class="col-md-3 control-label">name</label>

                <div class="col-md-4">

                    

            <input type="text" class="form-control" placeholder="name" 

            value="{{ old('name',  isset($role->name) ? $role->name : null) }}"

           required id="name" name="name"  data-error="{{ trans('mainpage.rule_name') }} ">

             <div class="help-block with-errors"></div>

                </div>

            </div>
                  <div class="form-body form-horizontal">
            <div class="form-group " >
            <!--==================================-->
         @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)    

        <div class="col-md-3 grand"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class="{{ $menues->icon}}"></i>{{ $menues->title}} </div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
            @foreach ($menues->user_permissions as $submenue)
              @if( isset($role) ) 
                <?php $permission_role =Sentinel::findRoleBySlug($role->slug);  ?>
              @endif


    
             <div onclick="$(this).find('.s_m').toggle(); $(this).find('.plusminus').removeClass('fa-plus').addClass('fa-minus')">

              <?php  if (count($submenue->user_permissions) > 0 ) { ?>

            <label style="display: inline-block;">
                 <a  class="btn btn-info btn-xs" >
                <i class="fa fa-plus plusminus"></i>
               </a>   {{$submenue['title']}}
            </label>


              <?php } else {?>

              <?php if($submenue->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('{{$submenue['slug']}}')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


            <?php }  ?>


               <label style="display: inline-block;">
                <?php  $sub_permission=isset($submenue->sub_permission) ? $submenue->sub_permission:null; ?>
               <input type="checkbox"  class="icheck permission" 
                <?php
                  if(isset($role)) {
                if($permission_role->hasAccess($submenue->slug))
                 echo "checked";
             }
                 ?>
                 value="{{$submenue['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$submenue['title']}} 
               

               </label>
     <?php  } ?>
   <!--===================================================================================================-->
               @foreach ($submenue->user_permissions as $data_menu) 
                 <div  class="s_m">
         <?php  $sub_permission_menue=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>


                  <?php if($data_menu->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('{{$data_menu['slug']}}')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


            <?php }  ?>




                <label style="display: inline-block;padding-right:20px;">
                <?php  $sub_permission_data=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>
               <input type="checkbox"  class="icheck permission" 
                <?php 
                  if(isset($role)) {
                if($permission_role->hasAccess($data_menu['slug']))
                 echo "checked";
               }
                 ?>
                 value="{{$data_menu['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$data_menu['title']}} 
               

               </label>

                @if( isset($user) ) 
    <?php if( $sub_permission_data != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction({{$data_menu->id}},{{$user->id}})"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
@endif

               </div>


               @endforeach
  <!--======================================================================================================-->
   @if( isset($user) ) 
    <?php if( $sub_permission != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction({{$submenue->id}},{{$user->id}})"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
@endif
  <!--=====================================================================================================-->               </div>
              @endforeach          
                    
                </div>
            </div>
        </div>
               


          </div>
            



  @endforeach 

 
  
          
          
 
</div></div>

    </div>





           <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">{{ trans('mainpage.edit') }}</button>

                    <button type="button" class="btn default">{{ trans('mainpage.cancel') }}</button>

                </div>

            </div>

        



        </div>

    </form>

    <!-- END FORM-->

</div> </div></div>

<meta name="_token" content="{!! csrf_token() !!}" />



  <div class="modal fade" id="user_can_access" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #000">المستخدمين الحاصلين على الصلاحية</h4>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                     <tr>
                       <th>الغاء الصلاحية</th>
                       <th>المستخدم </th>
                    </tr>
                </thead>
                <tbody id="user_have_permision">
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')



  <script src="{{url('/')}}/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>

   <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>



@endsection





@section('page_level_scripts_js')

@endsection







@section('scripts')

<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>

<script type="text/javascript">


  $(document).ready(function(){
    $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
  });
  $( document ).ready(function() {
    $('.s_m').hide();
  });

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

 



  var permissions = []; 

 $(".permission").each(function(i, selected)

        {

            if($(this).is(':checked'))

            {

              permissions[i]= $(this).val();

            }

            else

            {

                // Checkbox isn't checked

            }



           });  



                            

  var array = {

      "name":$('#name').val(),

      "slug":$('#slug').val(),

      "permissions":permissions





     

  };







 ////////////////////////////////////////////////////////////////

   



         $.ajax({

                type: 'POST',

                dataType: "json",

                url: "{!! URL::asset('/adminpanel/roles') !!}",

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











 

/////////////////////////////////////////////////////////

  

  $(document).ready(function (e) {

  var role_id = '{{isset($role->id) ? $role->id : null }}';  

$("#update_role").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 



 ///////////////////////////////////////////////////////////////////////

 



  var permissions = []; 

 $(".permission").each(function(i, selected)

        {

            if($(this).is(':checked'))

            {

              permissions[i]= $(this).val();

            }

            else

            {

                // Checkbox isn't checked

            }



           });  



                            

  var array = {

      "name":$('#name').val(),

      "slug":$('#slug').val(),

      "_method":$('input[name=_method]').val(),

      "permissions":permissions





     

  };







 ////////////////////////////////////////////////////////////////

   



         $.ajax({

                type: 'POST',

                dataType: "json",

                  url: '{!! URL::asset("/adminpanel/roles/'+role_id+'") !!}',

                data: array,

                success: function (e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#update_role_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#update_role_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#update_role_alert').show();

              $('#error').empty();

              var error = e.responseJSON;

              $.each(error, function (i, member) {

              for (var i in member) {

              $('#error').append('<li >'+ member[i] +'</li>' );

             }

           });



             jError("حدث خطأ فى عملية التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});

            }           

       });



  }

            

        }); 

  });


function myfunction (id,userid){
  $('#myModal').modal('toggle');
  $('#submenue_id').val(id);
  var add_url='{!! URL::asset("/adminpanel/display_prog_num/'+id +'/'+userid+'") !!}';
  $.get( add_url ) .done(function( data ) {
    $('.modal-body').html(data);
  });
}

function user_have(slug) {
  $('#user_can_access').modal('toggle');
  disply_user_have_per(slug);
}

function disply_user_have_per(slug) {
  var add_url='{!! URL::asset("/adminpanel/user/user_has_permission/'+slug +'") !!}';
  $.get( add_url ) .done(function( data ) {
    $("#user_have_permision").empty();
    for (i=0 ; i<data.length ; i++) {
      var user_data = data[i].split("-");
      $("#user_have_permision").append('<tr><td><i class="fa fa-times item_delete" aria-hidden="true" onclick="per_op('+user_data[0]+',\''+slug+'\')"></i> </td>  <td><a href="{!! URL::asset("/adminpanel/user_view/'+user_data[0] +'") !!}" target="_blank">'+user_data[1]+'</a></td> </tr>');
    }
  });
}

function per_op (user_id,slug){
  var add_url='{!! URL::asset("/adminpanel/user/remove_permission/'+user_id +'/'+slug+'")  !!}';
  $.get( add_url ) .done(function( data ) {
    disply_user_have_per(slug);
  });
}



</script>

@endsection









