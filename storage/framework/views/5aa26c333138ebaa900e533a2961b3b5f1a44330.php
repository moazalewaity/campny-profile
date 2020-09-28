  <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
               <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <?php $menu_for_user=Sentinel::getUser(); ?>

                    <?php $__currentLoopData = \App\Menu::where('p_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menues): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                 
                    //dd($menu_for_user);
                    
                    //echo $menues->slug;exit;
                    ?>
                    <?php if($menu_for_user->hasAccess($menues->slug.'.*') || $menues->ignore_permission==1): ?>
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="<?php echo e($menues->icon); ?>"></i>
                                <span class="title"><?php echo e($menues->title); ?></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                             <?php $__currentLoopData = $menues->submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenues): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                             
                              <?php if($menu_for_user->hasAccess($submenues->slug) || $menu_for_user->hasAccess($submenues->slug.'.*')  ||  $submenues->ignore_permission==1 ): ?>

                                <li class="nav-item start ">
                                   <?php if($submenues->typeoflink): ?>
                                 <a href="<?php echo e($submenues->url); ?>" class="nav-link "  target="_blank">
                                        <i class="<?php echo e($submenues->icon); ?>"></i>
                                        <span class="title"><?php echo e($submenues->title); ?> </span>
                                    </a>
                                <?php else: ?>

                                <a href="<?php echo e(url('/adminpanel/')); ?><?php echo e($submenues->url); ?>" class="nav-link ">
                                        <i class="<?php echo e($submenues->icon); ?>"></i>
                                        <span class="title"><?php echo e($submenues->title); ?> </span>
                                    </a>

                                <?php endif; ?>
                                  <ul class="sub-menu">
                                    
                                   <?php $__currentLoopData = $submenues->submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenues_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <?php if($menu_for_user->hasAccess($submenues_data->slug)  || $submenues_data->submenues_data==1 ): ?>  
                               <li class="nav-item start ">
                                 
                                 <?php if($submenues_data->typeoflink): ?>
                                  <a href="<?php echo e($submenues_data->url); ?>" class="nav-link "  target="_blank">
                                        <i class="<?php echo e($submenues_data->icon); ?>"></i>
                                        <span class="title"><?php echo e($submenues_data->title); ?> </span>
                                    </a>
                                 <?php else: ?>
                                    <a href="<?php echo e(url('/adminpanel/')); ?><?php echo e($submenues_data->url); ?>" class="nav-link ">
                                        <i class="<?php echo e($submenues_data->icon); ?>"></i>
                                        <span class="title"><?php echo e($submenues_data->title); ?> </span>
                                    </a>
                                 <?php endif; ?>
                             </li> 
                                  <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                             
                                 </ul>

                                </li>


                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
                                
                            </ul>
                        </li>
                        <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
                      
                     
                     
                       
                       
                        
                       
                       
                        
                      
                    
                       
                     
                       
                      
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>