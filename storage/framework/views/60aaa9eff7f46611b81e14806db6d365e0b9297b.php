<?php $__env->startSection('content'); ?>


        
        
            <keep-alive>
              <router-view></router-view>
            </keep-alive>
          
    
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.site_layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>