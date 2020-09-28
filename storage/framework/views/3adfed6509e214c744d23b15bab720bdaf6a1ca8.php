<?php echo $__env->make('admin.alert_data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php echo $__env->yieldContent('menues_bar'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo e(url('/adminpanel')); ?>">
                    <?php echo e(trans('mainpage.home')); ?>

                </a>
                <i class="fa <?php echo e(trans('mainpage.menu_iconsw')); ?>"></i>
            </li>
            <?php echo $__env->yieldContent('page_bar'); ?>
        </ul>
    </div>
<?php echo $__env->make('admin.menue_according_permission', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>              

