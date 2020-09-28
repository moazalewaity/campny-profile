<?php $__env->startSection('page_level_plugins_styles'); ?>

 <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_global_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_level_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('theme_layout_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('style'); ?>



<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/droidarabickufi.css">

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/jNotify.jquery.css">

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





<?php $__env->stopSection(); ?>



<?php $__env->startSection('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'); ?>

<?php $__env->startSection('page_bar'); ?>

 <?php if( isset($role) ): ?>

<li>

        <a href="#"><?php echo e(trans('mainpage.rule_new_role')); ?></a>

        <i class="fa <?php echo e(trans('mainpage.menu_iconsw')); ?>"></i>

    </li>

<?php else: ?>

 <li>

        <a href="#"><?php echo e(trans('mainpage.rule_new')); ?></a>

        <i class="fa <?php echo e(trans('mainpage.menu_iconsw')); ?>"></i>

    </li>

 <?php endif; ?>      

<?php $__env->stopSection(); ?>









<?php $__env->startSection('content'); ?>



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">

      <?php if( isset($role) ): ?> 

    update new role

    <?php else: ?>

    add role

    <?php endif; ?>

    </span>

</div>

        

    </div>



<div class="portlet-body form">

    <?php if( isset($role) ): ?>                                             <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_role" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="update_role_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>



             <input name="_method" type="hidden" value="PUT">  

<?php else: ?>



      <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_rule" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addrule_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div> 

        <?php endif; ?>                                     

        

        <div class="form-body">



            <div class="form-group">

                <label class="col-md-3 control-label">slug</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="slug" id="slug" name="slug" required 

               value="<?php echo e(old('slug',  isset($role->slug) ? $role->slug : null)); ?>"

                      data-error="<?php echo e(trans('mainpage.rule_name')); ?>  slug">

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            

           

            

            <div class="form-group">

                <label class="col-md-3 control-label">name</label>

                <div class="col-md-4">

                    

            <input type="text" class="form-control" placeholder="name" 

            value="<?php echo e(old('name',  isset($role->name) ? $role->name : null)); ?>"

           required id="name" name="name"  data-error="<?php echo e(trans('mainpage.rule_name')); ?> ">

             <div class="help-block with-errors"></div>

                </div>

            </div>
                  <div class="form-body form-horizontal">
            <div class="form-group " >
            <!--==================================-->
         <?php $__currentLoopData = \App\Menu::where('p_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menues): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>    

        <div class="col-md-3 grand"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class="<?php echo e($menues->icon); ?>"></i><?php echo e($menues->title); ?> </div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
            <?php $__currentLoopData = $menues->user_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenue): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <?php if( isset($role) ): ?> 
                <?php $permission_role =Sentinel::findRoleBySlug($role->slug);  ?>
              <?php endif; ?>


    
             <div onclick="$(this).find('.s_m').toggle(); $(this).find('.plusminus').removeClass('fa-plus').addClass('fa-minus')">

              <?php  if (count($submenue->user_permissions) > 0 ) { ?>

            <label style="display: inline-block;">
                 <a  class="btn btn-info btn-xs" >
                <i class="fa fa-plus plusminus"></i>
               </a>   <?php echo e($submenue['title']); ?>

            </label>


              <?php } else {?>

              <?php if($submenue->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('<?php echo e($submenue['slug']); ?>')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


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
                 value="<?php echo e($submenue['slug']); ?>" data-checkbox="icheckbox_square-grey"> 
                <?php echo e($submenue['title']); ?> 
               

               </label>
     <?php  } ?>
   <!--===================================================================================================-->
               <?php $__currentLoopData = $submenue->user_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                 <div  class="s_m">
         <?php  $sub_permission_menue=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>


                  <?php if($data_menu->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('<?php echo e($data_menu['slug']); ?>')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


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
                 value="<?php echo e($data_menu['slug']); ?>" data-checkbox="icheckbox_square-grey"> 
                <?php echo e($data_menu['title']); ?> 
               

               </label>

                <?php if( isset($user) ): ?> 
    <?php if( $sub_permission_data != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction(<?php echo e($data_menu->id); ?>,<?php echo e($user->id); ?>)"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
<?php endif; ?>

               </div>


               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  <!--======================================================================================================-->
   <?php if( isset($user) ): ?> 
    <?php if( $sub_permission != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction(<?php echo e($submenue->id); ?>,<?php echo e($user->id); ?>)"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
<?php endif; ?>
  <!--=====================================================================================================-->               </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>          
                    
                </div>
            </div>
        </div>
               


          </div>
            



  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 

 
  
          
          
 
</div></div>

    </div>





           <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green"><?php echo e(trans('mainpage.edit')); ?></button>

                    <button type="button" class="btn default"><?php echo e(trans('mainpage.cancel')); ?></button>

                </div>

            </div>

        



        </div>

    </form>

    <!-- END FORM-->

</div> </div></div>

<meta name="_token" content="<?php echo csrf_token(); ?>" />



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



<?php $__env->stopSection(); ?>



<?php $__env->startSection('body'); ?>

<?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('page_level_plugins_js'); ?>



  <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>

   <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>



<?php $__env->stopSection(); ?>





<?php $__env->startSection('page_level_scripts_js'); ?>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/validator.min.js"></script>

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

                url: "<?php echo URL::asset('/adminpanel/roles'); ?>",

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

  var role_id = '<?php echo e(isset($role->id) ? $role->id : null); ?>';  

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

                  url: '<?php echo URL::asset("/adminpanel/roles/'+role_id+'"); ?>',

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
  var add_url='<?php echo URL::asset("/adminpanel/display_prog_num/'+id +'/'+userid+'"); ?>';
  $.get( add_url ) .done(function( data ) {
    $('.modal-body').html(data);
  });
}

function user_have(slug) {
  $('#user_can_access').modal('toggle');
  disply_user_have_per(slug);
}

function disply_user_have_per(slug) {
  var add_url='<?php echo URL::asset("/adminpanel/user/user_has_permission/'+slug +'"); ?>';
  $.get( add_url ) .done(function( data ) {
    $("#user_have_permision").empty();
    for (i=0 ; i<data.length ; i++) {
      var user_data = data[i].split("-");
      $("#user_have_permision").append('<tr><td><i class="fa fa-times item_delete" aria-hidden="true" onclick="per_op('+user_data[0]+',\''+slug+'\')"></i> </td>  <td><a href="<?php echo URL::asset("/adminpanel/user_view/'+user_data[0] +'"); ?>" target="_blank">'+user_data[1]+'</a></td> </tr>');
    }
  });
}

function per_op (user_id,slug){
  var add_url='<?php echo URL::asset("/adminpanel/user/remove_permission/'+user_id +'/'+slug+'"); ?>';
  $.get( add_url ) .done(function( data ) {
    disply_user_have_per(slug);
  });
}



</script>

<?php $__env->stopSection(); ?>










<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>