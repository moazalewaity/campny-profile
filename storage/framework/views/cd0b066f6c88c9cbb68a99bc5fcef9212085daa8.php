 <style type="text/css">
<?php  use \Carbon\Carbon ; ?>
  



.page-header.navbar .page-logo .logo-default {
   margin: 2px 25px;



}
</style>
<div class="page-header navbar navbar-fixed-top">
           <!-- BEGIN HEADER INNER -->
           <div class="page-header-inner ">
               <!-- BEGIN LOGO -->
               <div class="page-logo" style="text-align: center" >
                   <a href="<?php echo e(url('/adminpanel/')); ?>">
                       
                       <img src="<?php echo e(url('/')); ?>/img/logo.png" width="50" height="50" alt="" style="height:auto" />

                     <h5><?php echo e($setting->title); ?></h5>
                    </a>
                   <div class="menu-toggler sidebar-toggler" style="display: inline;">
                       <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                   </div>
               </div>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse" > </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <!-- BEGIN PAGE ACTIONS -->
               <!-- DOC: Remove "hide" class to enable the page header actions -->




              <div class="page-actions" style="display:none">
                   <div class="btn-group">
                       <button type="button" class="btn btn-circle btn-outline red dropdown-toggle" data-toggle="dropdown">
                           <i class="fa fa-plus"></i>&nbsp;
                           <span class="hidden-sm hidden-xs page-actions-title">New&nbsp;</span>
                       </button>
                       
                   </div>
               </div> 




               <!-- END PAGE ACTIONS -->
               <!-- BEGIN PAGE TOP -->
               <div class="page-top">
                   <!-- BEGIN HEADER SEARCH BOX -->
                   <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->




                 <!--  <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search..." name="query">
                           <span class="input-group-btn">
                               <a href="javascript:;" class="btn submit">
                                   <i class="icon-magnifier"></i>
                               </a>
                           </span>
                       </div>
                   </form>  -->




                   <!-- END HEADER SEARCH BOX -->
                   <!-- BEGIN TOP NAVIGATION MENU -->
                   <div class="top-menu">
                       <ul class="nav navbar-nav pull-right">
                          


                           <?php  

                                $user_id= Sentinel::getUser()->id; 

                                $user =\App\User::find($user_id);

                            ?> 




                          <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">-->
                          <!--     <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">-->
                          <!--         <i class="icon-bell"></i>-->
                          <!--         <span class="badge badge-default" id="unread_notification" style="display:none;background-color: #f36a5a;">-->

                          <!--         </span>-->
                          <!--     </a>-->
                       
                          <!--     <ul class="dropdown-menu">-->
                          <!--         <li class="external">-->
                          <!--             <h3>-->
                          <!--                 <span class="bold"><?php echo e(trans('mainpage.menu_notoficlast')); ?> </span> <?php echo e(trans('mainpage.menu_notofic')); ?> </h3>-->
                                       
                          <!--         </li>-->
                          <!--         <li>-->
                          <!--             <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="d_n_r">-->
                                      
                                     
                                          
                                         
                                          
                                          
                          <!--             </ul>-->
                                      
                          <!--         </li>-->
                          <!--     </ul>-->
                          <!-- </li> -->



                           <!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">-->
                           <!--    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">-->
                           <!--        <i class="icon-bubble"></i>-->
                           <!--        <span class="badge badge-default" id="unread_messages" style="display:none;background-color: #f36a5a;">  </span>-->
                           <!--    </a>-->
                           <!--    <ul class="dropdown-menu">-->
                           <!--        <li class="external">-->
                           <!--            <h3><?php echo e(trans('mainpage.menu_newmessage')); ?></h3>                                       -->
                           <!--        </li>-->
                           <!--        <li>-->
                           <!--            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="new_messages">-->
                                           
                           <!--            </ul>-->
                           <!--        </li>-->
                           <!--    </ul>-->
                           <!--</li>-->




                           <!-- END INBOX DROPDOWN -->
                           <!-- BEGIN TODO DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
             <!--              <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                   <i class="icon-calendar"></i>
                                   <span class="badge badge-default"> 3 </span>
                               </a>
                               <ul class="dropdown-menu extended tasks">
                                   <li class="external">
                                       <h3>You have
                                           <span class="bold">12 pending</span> tasks</h3>
                                       <a href="app_todo.html">view all</a>
                                   </li>
                                   <li>
                                       <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">New release v1.2 </span>
                                                       <span class="percent">30%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">40% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">Application deployment</span>
                                                       <span class="percent">65%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">65% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">Mobile app release</span>
                                                       <span class="percent">98%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">98% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">Database migration</span>
                                                       <span class="percent">10%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">10% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">Web server upgrade</span>
                                                       <span class="percent">58%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">58% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">Mobile development</span>
                                                       <span class="percent">85%</span>
                                                   </span>
                                                   <span class="progress">
                                                       <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">85% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="javascript:;">
                                                   <span class="task">
                                                       <span class="desc">New UI release</span>
                                                       <span class="percent">38%</span>
                                                   </span>
                                                   <span class="progress progress-striped">
                                                       <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                           <span class="sr-only">38% Complete</span>
                                                       </span>
                                                   </span>
                                               </a>
                                           </li>
                                       </ul>
                                   </li>
                               </ul>
                           </li>  -->
                           <!-- END TODO DROPDOWN -->
                           <!-- BEGIN USER LOGIN DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                           <!--<li class="dropdown dropdown-user">-->

                           <!--     <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">-->

                           <!--         <span class="username username-hide-on-mobile"> </span>-->

                           <!--         <i class="fa fa-angle-down"></i>-->

                           <!--         <?php if(Sentinel::check()): ?>-->

                           <!--             <?php echo e(trans('mainpage.langs')); ?>-->

                           <!--         <?php endif; ?>-->

                           <!--     </a>-->

                           <!--     <ul class="dropdown-menu dropdown-menu-default">-->

                           <!--         <li class="divider"> </li>-->

                           <!--         <?php if(isset($alllangs)): ?>-->

                           <!--         <?php $__currentLoopData = $alllangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>-->

                           <!--             <li>-->

                           <!--                     <a href="<?php echo e(url('/adminpanel/user/userlangs/'.$row->id)); ?>"><?php echo e($row->name); ?></a>-->

                           <!--             </li> -->

                           <!--         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>-->

                           <!--         <?php endif; ?>-->

                           <!--     </ul>-->

                           <!-- </li>-->

                            <li class="dropdown dropdown-user">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                <?php if(Sentinel::check()): ?>

                                 <?php if(Sentinel::getUser()->image == 'not_found' || Sentinel::getUser()->image == '' ): ?>

                                  <img alt="" class="img-circle" src="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/img/avatar3_small.jpg" />

                                 <?php else: ?>

                                  <img alt="" class="img-circle" src="<?php echo e(url('/')); ?>/admin/user_image/<?php echo e(Sentinel::getUser()->image); ?>"/>

                                 <?php endif; ?>

                                     <?php else: ?>

                                     <img alt="" class="img-circle" src="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/img/avatar3_small.jpg" />

                                    <?php endif; ?>

                                    <span class="username username-hide-on-mobile"> </span>

                                    <i class="fa fa-angle-down"></i>

                                    <?php if(Sentinel::check()): ?> 

                                        <?php echo e(Sentinel::getUser()->full_name); ?>


                                    <?php endif; ?>

                                </a>

                                <ul class="dropdown-menu dropdown-menu-default">

                                    <li class="divider"> </li>

                                    <li>

                                        <a href="<?php echo e(url('/adminpanel/user/update_password')); ?>">

                                            <i class="icon-lock"></i><?php echo e(trans('mainpage.menu_changepas')); ?>  </a>

                                    </li> 

                                    <li>

                                        <a href="<?php echo e(url('/adminpanel/logout')); ?>" ><i class="icon-key"></i><?php echo e(trans('mainpage.menu_logout')); ?> </a>

                                    </li>

                                </ul>

                            </li>


                           <!-- END USER LOGIN DROPDOWN -->
                           <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                  <!--         <li class="dropdown dropdown-extended quick-sidebar-toggler">
                               <span class="sr-only">Toggle Quick Sidebar</span>
                               <i class="icon-logout"></i>
                           </li>  -->




                           <!-- END QUICK SIDEBAR TOGGLER -->
                       </ul>
                   </div>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
               <!-- END PAGE TOP -->
           </div>
           <!-- END HEADER INNER -->
       </div>