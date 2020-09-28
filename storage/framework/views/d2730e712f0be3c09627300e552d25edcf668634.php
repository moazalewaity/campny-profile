<?php $datas=DB::select("select *  from alert_messages where close_all_alret=1");
	// dd($datas);
   foreach ($datas as $data ) {
  ?>

<div  class="custom-alerts alert alert-<?php echo e($data->type); ?> ">
    <?php if($data->closable)  {?>
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <?php } ?>
    	<i class="fa-lg fa fa-<?php echo e($data->font_awsome); ?>"></i>
    <?php echo e($data->content); ?>

</div> 

<?php
}
  ?>        