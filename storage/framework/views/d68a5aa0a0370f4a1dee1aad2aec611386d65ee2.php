<?php $__env->startSection('page_level_plugins_styles'); ?>

 <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_global_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_level_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('theme_layout_styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('style'); ?>

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/droidarabickufi.css">



<?php $__env->stopSection(); ?>



<?php $__env->startSection('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'); ?>

<?php $__env->startSection('page_bar'); ?>

<li>

        <a href="<?php echo e(url('/menus')); ?>"><?php echo e(trans('mainpage.menu_lists')); ?></a>

        <i class="fa fa-angle-left"></i>

    </li>

<?php $__env->stopSection(); ?>









<?php $__env->startSection('content'); ?>





<div class="row">

                            <div class="col-md-12">

                                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                                <div class="portlet light bordered">

                                    <div class="portlet-title">

                                        <div class="caption font-dark">

                                            <i class="icon-settings font-dark"></i>

                                            <span class="caption-subject bold uppercase">Column Reordering</span>

                                        </div>

                                        <div class="tools"> </div>

                                    </div>

                                    <div class="portlet-body">

                                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                                            <thead>

                                                <tr>

                                                    <th><?php echo e(trans('mainpage.menu_lists1')); ?></th>

                                                    <th><?php echo e(trans('mainpage.menu_lists2')); ?></th>

                                                    <th><?php echo e(trans('mainpage.menu_lists3')); ?></th>

                                                   

                                                    

                                                </tr>



                                                <tr>

                                                    <th><?php echo e(trans('mainpage.menu_lists1')); ?> </th>

                                                    <th><?php echo e(trans('mainpage.menu_lists2')); ?></th>

                                                    <th>  </th>

                                                   

                                                    

                                                </tr>



                                             

                                            </thead>

                                            <tbody>

                                              

                                             

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <!-- END EXAMPLE TABLE PORTLET-->

</div></div>







<?php $__env->stopSection(); ?>



<?php $__env->startSection('body'); ?>

<?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('page_level_plugins_js'); ?>



 <script src="<?php echo e(url('/')); ?>/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>

        <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

        <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>



<?php $__env->stopSection(); ?>





<?php $__env->startSection('page_level_scripts_js'); ?>

 

  <script src="<?php echo e(url('/')); ?>/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('scripts'); ?>  



<script type="text/javascript" >

$(document).ready( function() {

 show_data();



});

  function show_data(){

    $('#sample_1').DataTable({

      

        destroy: true,

        processing: true,

      serverSide: true,

      //stateSave: true,

     "pageLength": 10,

      ajax: '<?php echo URL::asset("/adminpanel/menu_list"); ?>',

      columns : [

        { data: 'title', name: 'title', orderable: false, searchable: true },

        { data: 'father_menu', name: 'father_menu' , orderable: false, searchable: true },

        { data: 'edit', name: 'edit', orderable: false, searchable: false },

        ],initComplete: function () {  

             this.api().columns([0, 1]).every(function () {

                var column = this;

                var input = document.createElement("input");

                $(input).addClass("form-control");

                $(input).addClass("input-small");

                $(input).appendTo($(column.header()).empty())

                .on('change', function () {

                    column.search($(this).val()).draw();

                });

            }); 





          }



    });

  }

</script>

<?php $__env->stopSection(); ?>                  




<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>