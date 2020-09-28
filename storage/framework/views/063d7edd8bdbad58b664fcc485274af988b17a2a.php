<?php $__env->startSection('title', 'لوحة التحكم '); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
	.feeds li .col2 {
    float: right;
    width: 80px;
    margin-right: -80px;
}.slimScrollBar {
    right: auto !important;
    left: 1px;
}
.dashboard-stat .visual{
	float: left;
}
.dashboard-stat .details {
    position: absolute;
    left: auto;
    right: 15px;
    padding-left: 0;
    padding-right: 15px;
    padding-top: 15px;
}
.dashboard-stat .visual {
    float: left;
    height: 50px;
    text-align: center;
}
.dashboard-stat .visual>i {
    margin-right: -15px;
    line-height: 50px;
    font-size: 50px;
}.portlet .dashboard-stat:last-child {
    margin-bottom: 5px;
}
</style>
<?php 
$user = Sentinel::getUser();
$cons = 0;
$rol = \DB::table("role_users")->where('user_id' , $user->id)->get();
foreach ($rol as $value) {
	if($value->role_id == '1'){
		$cons++;
	}
}
// dd($user);
?>
<?php if($cons != 0): ?>
<div class="row widget-row">
	<div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading"> المسؤولين</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green fa fa-user-secret"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($admins[0]->counter); ?>"><?php echo e($admins[0]->counter); ?></span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading"> الخدمات </h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green-jungle fa fa-user"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($services->count()); ?>"><?php echo e($services->count()); ?></span>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading">العملاء </h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-warning icon-layers"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($clients->count()); ?>"><?php echo e($clients->count()); ?></span>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">الطلاب</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-red fa fa-graduation-cap"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($students[0]->counter); ?>"><?php echo e($students[0]->counter); ?></span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">التخصصات</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-blue fa fa-university"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($specializations[0]->counter); ?>"><?php echo e($specializations[0]->counter); ?></span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">المقررات</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-grey-gallery fa fa-book"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($courses[0]->counter); ?>"><?php echo e($courses[0]->counter); ?></span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
</div>
<?php endif; ?>  
  
<!-- <div class="row"> -->
	<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
		<?php $menu_for_user=Sentinel::getUser(); ?>
		<?php $__currentLoopData = \App\Menu::where('p_id','=',0)->orderby('new_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menues): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<?php if($menu_for_user->hasAccess($menues->slug.'.*') || $menues->ignore_permission==1): ?>
	    	<div class="portlet light">
	            <div class="portlet-title">
	                <div class="caption">
	                    <i class="icon-equalizer font-dark hide"></i>
	                    <span class="caption-subject font-dark bold uppercase"><?php echo e($menues->title); ?></span>
	                </div>
	                <div class="tools">
	                    <a href="" class="collapse"> </a>
	                </div>
	            </div>
	            <div class="portlet-body">
					<div class="row">
				        <?php $__currentLoopData = $menues->submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenues): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				            <?php if($menu_for_user->hasAccess($submenues->slug) || $menu_for_user->hasAccess($submenues->slug.'.*')  ||  $submenues->ignore_permission==1 ): ?>
				            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <a class="dashboard-stat dashboard-stat-v2 <?php echo e($submenues->color); ?>" href="<?php echo e(url('/adminpanel/')); ?><?php echo e($submenues->url); ?>">
				                        <div class="visual">
				                            <i class="<?php echo e($submenues->icon); ?>"></i>
				                        </div>
				                        <div class="details">
				                            <div class="desc"> <?php echo e($submenues->title); ?> </div>
				                        </div>
				                    </a>
				                </div>
								<?php $__currentLoopData = $submenues->submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenues_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				                    <?php if($menu_for_user->hasAccess($submenues_data->slug)  || $submenues_data->submenues_data==1 ): ?>
						            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    <a class="dashboard-stat dashboard-stat-v2  <?php echo e($submenues_data->color); ?>" href="<?php echo e(url('/adminpanel/')); ?><?php echo e($submenues_data->url); ?>">
						                        <div class="visual">
				                            		<i class="<?php echo e($submenues_data->icon); ?>"></i>
						                        </div>
						                        <div class="details">
						                            <div class="desc"> <?php echo e($submenues_data->title); ?> </div>
						                        </div>
						                    </a>
						                </div>
				                    <?php endif; ?>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				            <?php endif; ?>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			        </div>
		        </div>
		    </div>
		    <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <!-- </div> -->
<!-- </div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_level_plugins_js'); ?>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/assets/global/plugins/amcharts/amcharts/themes/serial.js" type="text/javascript"></script> -->

<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!-- <script src="https://www.amcharts.com/lib/4/core.js"></script> -->
<!-- <script src="https://www.amcharts.com/lib/4/charts.js"></script> -->
<!-- <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script> -->



<style type="text/css">

#dashboard_amchart_2,
#dashboard_amchart_3 {
  width: 100%;
  height: 500px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_level_scripts_js'); ?>
<script type="text/javascript">
	$(function(){
		$('.scroller').slimScroll({
			height: '250px'
		});
	});
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/validator.min.js"></script>
<?php $__env->stopSection(); ?>










<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>