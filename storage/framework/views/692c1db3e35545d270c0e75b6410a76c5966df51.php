<?php $__env->startSection('page_level_plugins_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_global_styles'); ?>

<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />

<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_level_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('theme_layout_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('style'); ?>

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/droidarabickufi.css">

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/jNotify.jquery.css">









<?php $__env->stopSection(); ?>



<?php $__env->startSection('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'); ?>

<?php $__env->startSection('page_bar'); ?>

 <?php if( !isset($menu) ): ?> 

<li>

        <a href="#"><?php echo e(trans('mainpage.rule_rul_new')); ?></a>

        <i class="fa fa-angle-left"></i>

    </li>

  <?php else: ?>

  <li>

        <a href='#'><?php echo e(trans('mainpage.rule_rul_new_edit')); ?></a>

        <i class="fa fa-angle-left"></i>

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

<?php if( !isset($menu) ): ?> 

    <?php echo e(trans('mainpage.rule_rul_new')); ?> 

    <?php else: ?>

    <?php echo e(trans('mainpage.rule_rul_new_edit')); ?>


    <?php endif; ?>

    </span>

</div>

        

    </div>



<div class="portlet-body form">

   <?php if( !isset($menu) ): ?>                                              <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_menu" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addmenu_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>





<?php else: ?>

        <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_menu" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="updatemenu_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>

                 <input name="_method" type="hidden" value="PUT">                   

<?php endif; ?>   

        <div class="form-body">



    

            <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_rul')); ?></label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="<?php echo e(trans('mainpage.rule_rul')); ?>" id="slug" name="slug"

                     required  data-error="<?php echo e(trans('mainpage.rule_rul_pls')); ?>" value="<?php echo e(old('slug',  isset($menu->slug) ? $menu->slug : null)); ?>">

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_address')); ?></label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="<?php echo e(trans('mainpage.rule_rul')); ?>" data-error="<?php echo e(trans('mainpage.rule_address')); ?>" 

                  id="title" name="title" value="<?php echo e(old('title',  isset($menu->title) ? $menu->title : null)); ?>" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





             <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_rul_color')); ?> </label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="<?php echo e(trans('mainpage.rule_rul_color')); ?>" data-error="<?php echo e(trans('mainpage.rule_rul_color')); ?>" 

                  id="color" name="color" value="<?php echo e(old('color',  isset($menu->color) ? $menu->color : null)); ?>" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>







             <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_icon')); ?></label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="<?php echo e(trans('mainpage.rule_icon')); ?> " data-error="<?php echo e(trans('mainpage.rule_link_icon')); ?>"  id="icon" name="icon" 

                 value="<?php echo e(old('icon',  isset($menu->icon) ? $menu->icon : null)); ?>" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





               <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.link')); ?> </label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="<?php echo e(trans('mainpage.link')); ?>" data-error="<?php echo e(trans('mainpage.rule_link_icon')); ?>"  id="url" name="url" 

                 value="<?php echo e(old('url',  isset($menu->url) ? $menu->url : null)); ?>">  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





           

            

          



           <div class="form-group">

            <label class="control-label col-md-3"><?php echo e(trans('mainpage.showAlert_process')); ?> </label>

            <div class="col-md-6">

                <input type="text" class="form-control input-large" name="functions" data-role="tagsinput" value="<?php echo e(old('functions',  isset($menu->functions) ? $menu->functions : null)); ?>"> </div>

        </div>



         <div class="form-group">

            <label class="control-label col-md-3"><?php echo e(trans('mainpage.rule_jobs')); ?> </label>

            <div class="col-md-6">

               <textarea name="sub_permission" id="sub_permission" class="form-control"  rows="10" style="direction: ltr; text-align: left"><?php echo e(old('sub_permission',  isset($menu->sub_permission) ? $menu->sub_permission : null)); ?></textarea>  </div>

        </div>







            <div class="form-group">

            <label class="col-md-3 control-label"><?php echo e(trans('mainpage.menu_lists3')); ?>  </label>

            <div class="col-md-9">

                <div class="mt-radio-inline">

                    <label class="mt-radio">

                        <input type="radio" name="visible" id="optionsRadios25"  required value="1" 

                         <?php if( isset($menu) ): ?> 

                       <?php echo e($menu->visible ? "checked" : ""); ?> 

                       <?php endif; ?>

                        > <?php echo e(trans('mainpage.rule_view1')); ?> 

                        <span></span>

                    </label>

                    <label class="mt-radio">

                        <input type="radio" name="visible" id="optionsRadios26" value="0" 

                     <?php if( isset($menu) ): ?> 

                        <?php echo e($menu->visible ? "" : "checked"); ?>


                        <?php endif; ?> > <?php echo e(trans('mainpage.rule_view2')); ?> 

                        <span></span>

                    </label>

                    

                </div>

            </div>

        </div>





           <div class="form-group">

            <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_log_rejest')); ?> </label>

            <div class="col-md-9">

                <div class="mt-radio-inline">

                    <label class="mt-radio">

                        <input type="radio" name="tracking" id="optionsRadios27"  required value="1" 

                         <?php if( isset($menu) ): ?> 

                       <?php echo e($menu->tracking ? "checked" : ""); ?> 

                       <?php endif; ?>

                        > <?php echo e(trans('mainpage.rule_log_rejest1')); ?>  

                        <span></span>

                    </label>

                    <label class="mt-radio">

                        <input type="radio" name="tracking" id="optionsRadios28" value="0" 

                     <?php if( isset($menu) ): ?> 

                        <?php echo e($menu->tracking ? "" : "checked"); ?>


                        <?php endif; ?> > <?php echo e(trans('mainpage.rule_log_rejest2')); ?> 
                        <span></span>

                    </label>

                    

                </div>

            </div>

        </div>





         <div class="form-group">

            <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_type')); ?> </label>

            <div class="col-md-9">

                <div class="mt-radio-inline">

                    <label class="mt-radio">

                        <input type="radio" name="typeoflink" id="optionsRadios27"  required value="1" 

                         <?php if( isset($menu) ): ?> 

                         



                       <?php echo e($menu->typeoflink ? "checked" : ""); ?> 

                       <?php endif; ?>

                        ><?php echo e(trans('mainpage.rule_type1')); ?>  

                        <span></span>

                    </label>

                    <label class="mt-radio">

                        <input type="radio" name="typeoflink" id="optionsRadios28" value="0" 

                     <?php if( isset($menu) ): ?> 

                        <?php echo e($menu->typeoflink ? "" : "checked"); ?>


                        <?php endif; ?> > <?php echo e(trans('mainpage.rule_type2')); ?>  

                        <span></span>

                    </label>

                    

                </div>

            </div>

        </div>





         <div class="form-group">

            <label class="col-md-3 control-label"> <?php echo e(trans('mainpage.rule_rols')); ?> </label>

            <div class="col-md-9">

                <div class="mt-radio-inline">

                    <label class="mt-radio">

                        <input type="radio" name="ignore_permission" id="optionsRadios27"  required value="0" 

                         <?php if( isset($menu) ): ?> 

                         



                       <?php echo e($menu->ignore_permission ? "" : "checked"); ?> 

                       <?php endif; ?>

                        ><?php echo e(trans('mainpage.rule_rols1')); ?>  

                        <span></span>

                    </label>

                    <label class="mt-radio">

                        <input type="radio" name="ignore_permission" id="optionsRadios28" value="1" 

                     <?php if( isset($menu) ): ?> 

                        <?php echo e($menu->ignore_permission ? "checked" : ""); ?>


                        <?php endif; ?> > <?php echo e(trans('mainpage.rule_rols2')); ?>  

                        <span></span>

                    </label>

                    

                </div>

            </div>

        </div>











            <div class="form-group">

                <label class="col-md-3 control-label"><?php echo e(trans('mainpage.rule_sub')); ?> </label>

                <div class="col-md-4">

               <select class="form-control select2" id="p_id" name="p_id"> 

               <option value="0"><?php echo e(trans('mainpage.rule_sub_pls')); ?></option>    

               <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one_menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 

               <option 

               <?php if( isset($menu) ): ?> 

                <?php if($one_menu->id == $menu->p_id) { echo "selected" ;} ?>

                 <?php endif; ?>

             value="<?php echo e($one_menu->id); ?>"><?php echo e($one_menu->title); ?></option>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

               </select>

                </div>

            </div>









            





            





             



          

            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green"><?php echo e(trans('mainpage.add')); ?> </button>

                    <button type="button" class="btn default"><?php echo e(trans('mainpage.cancel')); ?> </button>

                </div>

            </div>

        



        </div>

    </form>

    <!-- END FORM-->

</div> </div></div>

<meta name="_token" content="<?php echo csrf_token(); ?>" />





<?php $__env->stopSection(); ?>



<?php $__env->startSection('body'); ?>

<?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('page_level_plugins_js'); ?>

<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

   <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('page_level_scripts_js'); ?>

<script src="<?php echo e(url('/')); ?>/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/validator.min.js"></script>

<script type="text/javascript">

  

  $(document).ready(function (e) {

$("#add_menu").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 

    $.ajax({

      url:"<?php echo URL::asset('/adminpanel/menus'); ?>",

      data:new FormData($("#add_menu")[0]),

      dataType:'json',

      async:false,

      type:'POST',

      processData: false,

      contentType: false,

      success:function(e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#addmenu_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#addmenu_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#addmenu_alert').show();

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



///////////////////////////////////////////////

var menu_id ='<?php echo e(isset($menu->id) ? $menu->id : null); ?>';

$("#update_menu").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 

  var form = $('#update_menu')[0]; 



  var formData = new FormData(form);



  

         $.ajax({

                type: 'POST',

                dataType: "json",

                url: '<?php echo URL::asset("/adminpanel/menus/'+menu_id+'"); ?>',

                data: formData,

                 contentType: false, 

                 processData: false,

                success: function (e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#updatemenu_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#updatemenu_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#updatemenu_alert').show();

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















 



</script>

<?php $__env->stopSection(); ?>










<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>