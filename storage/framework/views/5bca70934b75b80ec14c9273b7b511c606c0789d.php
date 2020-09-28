

           <?php

         //  echo $prem;

             //echo $g_perm;

           if ( !empty ( $g_perm ) ) {

           $global_per=$g_perm;







          $menues=DB::table('menus')->select('p_id')->where('slug', 'like', $global_per)->count();



          

         

        if ($menues == 0) {

   

}else {



	   $menues_data=DB::table('menus')->select('p_id')->where('slug', 'like', $global_per)->get();

            $p_id_global=$menues_data[0]->p_id;



          $menues_data_gs=DB::table('menus')->select('title','url','icon','slug','visible','p_id','typeoflink','color')->where('p_id', '=', $p_id_global)->where('visible','=',1)->orderBy('new_order')->get();

          

$menu_for_user=Sentinel::getUser();







             ?>



                   <style type="text/css">



   .dashboard-stat {

   	margin-bottom: 15px;

   }                

                    



   .dashboard-stat .visual {

    width: 40px;

    height: 57px;

    display: block;

    float: right;

    padding-left: 10px;

    margin-bottom: 15px;

    font-size: 18px

    line-height: 20px;

}



.dashboard-stat.dashboard-stat-v2 .visual {

    padding-top: 27px;

    margin-bottom: 6px;

}













.dashboard-stat .visual>i {

    margin: -36px 131px ;

    font-size: 35px;

    line-height: 40px;

   

}



.dashboard-stat.mured .visual>i {

	 opacity: 0.5;

}

.dashboard-stat .details .number  {

    padding: 1px 23px; 

    text-align: right;

   

    line-height: 15px;

    letter-spacing: -1px;

    margin-bottom: 0;

    font-family: 'DroidArabicKufiRegular', sans-serif;

   

}  

.dashboard-stat .details .number span {

	 font-size: 14px !important ;

	 font-weight: 400;

} 



.dashboard-stat .details {

    position: absolute;

    right: 0px;

    padding-right: 0px;

    left:auto;

    padding-left:0px;

}        

                   </style> 

                   <div class="row">



                    <?php $__currentLoopData = $menues_data_gs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menues_data_g): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>



                     <?php if($menu_for_user->hasAccess($menues_data_g->slug)): ?>



                       <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">



                         <?php if($menues_data_g->typeoflink): ?>

                            <a class="dashboard-stat dashboard-stat-v2 mured <?php echo e($menues_data_g->color); ?>" href="<?php echo e($menues_data_g->url); ?>" target="_blank">

                          <?php else: ?>  

                          <a class="dashboard-stat dashboard-stat-v2 mured <?php echo e($menues_data_g->color); ?>" href="<?php echo e(url('/')); ?>/adminpanel<?php echo e($menues_data_g->url); ?>">  



                          <?php endif; ?> 

                                <div class="visual">

                                    <i class="<?php echo e($menues_data_g->icon); ?>"></i>

                                </div>

                                <div class="details" >

                                    <div class="number">

                                   

                                        <span data-counter="counterup" data-value="">



                                   

                                    <?php echo e($menues_data_g->title); ?>


                                         </span></div>

                                    <div class="desc">  </div>

                                </div>

                            </a>

                        </div>

                       <?php endif; ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 

                       



                      





                        

                    </div>  



                



                    <?php }} ?>