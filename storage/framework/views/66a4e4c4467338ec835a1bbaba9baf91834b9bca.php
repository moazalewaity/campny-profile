  <!-- BEGIN HEADER -->
       <?php echo $__env->make('admin.content.uppernav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php echo $__env->make('admin.content.navsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                     <?php echo $__env->make('/admin/content/panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- END THEME PANEL -->
                   <!-- <h1 class="page-title"> Blank Page Layout
                        <small>blank page layout</small>
                    </h1>-->
                    <?php echo $__env->make('/admin/content/page_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- END PAGE HEADER-->
                     <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
           <?php echo $__env->make('/admin/content/quick_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
       <?php echo $__env->make('/admin/content/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>