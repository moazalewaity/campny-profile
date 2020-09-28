<?php $__env->startSection('title','عرض '.$worksInfo['title']); ?>

<?php $__env->startSection('page_level_plugins_styles'); ?>
       <link href="<?php echo e(url('/')); ?>/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_global_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_level_styles'); ?>
       <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />    
       <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />         
       <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />         
     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('theme_layout_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
       <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/droidarabickufi.css">
       <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/jNotify.jquery.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'); ?>

<?php $__env->startSection('page_bar'); ?>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
       <div class="portlet light bordered">
              <div class="portlet-title">
                     <div class="caption font-red-sunglo">
                            <i class="fa fa-search font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> بحث عن  <?php echo e($worksInfo['title']); ?>  </span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <form method="POST" id="search_form" class="form-inline" role="form">
                            <div class="form-group">
                                   <label for="name"><?php echo e(trans('mainpage.address')); ?></label>
                                   <input class="form-control" name="name" id="name" placeholder="<?php echo e(trans('mainpage.address')); ?>" type="text">
                                   <?php echo e(csrf_field()); ?>

                            </div>
                            <div class="form-group">
                                   <label for="department"><?php echo e(trans('mainpage.menu')); ?></label>
                                   <input class="form-control" name="department" id="department" placeholder="<?php echo e(trans('mainpage.menu')); ?>" type="text">
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('mainpage.search')); ?></button>
                     </form>
              </div>
       </div>
       <div class="portlet light bordered">

              <div class="portlet-title">
                     <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> عرض <?php echo e($worksInfo['title']); ?></span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered datatable" id="myTablesw">
                                   <thead>
                                          <tr>
                                                 <th>
                                                        #
                                                 </th>
                                                 <th><?php echo e(trans('mainpage.status')); ?></th>
                                                 <th>  العنوان  </th>
                                                 <th>  تاريخ المشروع  </th>
                                                 <th>   العميل  </th>
                                                 <th>  الوصف  </th>
                                                 <th><?php echo e(trans('mainpage.image_post')); ?></th>
                                                 <th width="135px"><?php echo e(trans('mainpage.setting')); ?></th>
                                          </tr>
                                   </thead>
                            </table>
                     <!-- </div> -->
              </div>
       </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
       <?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_level_plugins_js'); ?>
       <!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script> -->
       <!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script> -->
       <!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script> -->
       <!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> -->
       <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/sortable.min.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
       <script src="<?php echo e(url('/')); ?>/admin/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
       
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_level_scripts_js'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
       $(document).ready(function() {
              var oTable =  $('.datatable').DataTable({
                     processing: true,
                     serverSide: true,
                     ajax: {
                            url: "<?php echo e(url('/adminpanel/works/getdata')); ?>" ,
                            data: function (d) {
                                   d._token = $('input[name=_token]').val();
                                   d.name = $('input[name=name]').val();
                                   d.department = $('input[name=department]').val();
                            }
                     },
                     columns: [
                            {data: 'id', name: 'id'},
                            { data: 'statuss' , name:'statuss' , "searchable": false
                            },
                            {data: 'title', name: 'title'},
                            {data: 'date', name: 'date'},
                            {data: 'client', name: 'client'},
                            {data: 'descrption', name: 'descrption'},
                            {data: 'image', render: function(data){
                                          var items = data;
                                          var item = '<?php echo e(url("media/works/img/")); ?>';
                                          if(data && data != 'defulte.png'){
                                                 var image = '<img src="'+item+'/'+data+'" width="100px" height="100px">';
                                          }else{
                                                 var image = '<img src="'+item+'/'+data+'" width="100px" height="100px">';
                                          }
                                          return image;
                                   } , "searchable": false
                            },
                            { data: null , render: function(data){
                                   // var move = '<span class="icon-move"><i class="fa fa-arrows"></i></span>';
                                   // var edit_button = '<a href="' + data.edit_url + '" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>';

                                   var edit_button = data.edit_url;
                                   var delete_button = data.delete_url;
                                   var move = data.move;
                                   return edit_button + delete_button + move;
                                   }, "searchable": false
                            }
                     ],
                    "language": {
                        "lengthMenu": "<?php echo e(trans('mainpage.datatable_lengthMenu')); ?>",
                        "zeroRecords": "<?php echo e(trans('mainpage.datatable_zeroRecords')); ?>",
                        "info": "<?php echo e(trans('mainpage.datatable_info')); ?>",
                        "infoEmpty": "<?php echo e(trans('mainpage.datatable_infoEmpty')); ?>",
                        "search": "<?php echo e(trans('mainpage.datatable_search')); ?>",
                        "infoFiltered": "<?php echo e(trans('mainpage.datatable_infoFiltered')); ?>"
                    },
                     "fnDrawCallback" : function(settings, json){
                            $('.make-switch').bootstrapSwitch({
                                   onText: '<i class="fa fa-check" aria-hidden="true"></i>',
                                    offText: '<i class="fa fa-times" aria-hidden="true"></i>',
                                    onColor: 'success',
                                    offColor: 'warning',
                                   onSwitchChange: function (event, state) {
                                          $(this).val(state ? 'on' : 'off');
                                          var id = $(this).data('id');
                                          var value = $(this).val();
                                          var state = '0';
                                          if(value == 'on'){
                                                 var state = '1';
                                          }
                                          $.ajax({
                                            url: "<?php echo e(url('/adminpanel/'.$worksInfo['works'].'/changestatus')); ?>/" + id + "/"+state,
                                            type: "get",
                                            success: function (data) {
                                                if (data == "success") {
                                                        // oTable.draw();
                                                }
                                            }
                                        });
                                   }
                            });
                     }
              });

              $('#search_form').on('submit', function(e) {
                     // alert('asd');
                     oTable.draw();
                     e.preventDefault();
              });

       });
</script>
       <script>
              jQuery(document).ready( function ($){
                     $("#myTablesw tbody").sortable({
                            containerSelector:'table',
                            itemPath:'> tbody',
                            itemSelector:'tr',
                            handle: '.icon-move',
                            stop: function(en , ui){
                                   var item = $("#myTablesw tbody").sortable("toArray");
                                   console.log(item);
                                   $.ajaxSetup({
                                          headers: {
                                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          }
                                   });
                                   $.ajax({
                                          url: "<?php echo e(url('/adminpanel/'.$worksInfo['works'].'/resort_table')); ?>",
                                          type: "post",
                                          data: {
                                                 "_token":"<?php echo e(csrf_token()); ?>",
                                                 "item":item
                                          },
                                          dataType:'JSON',
                                          success: function (data) {
                                                 console.log('success');
                                          },
                                          error: function (xhr, ajaxOptions, thrownError) {
                                                 console.log('Error');
                                          }
                                   });
                            }
                     });
              });
       </script>
       <script>
              $('.select2_category').select2({
                     placeholder: "Select an option",
                     allowClear: true
              });
       </script>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>