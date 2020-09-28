<?php $__env->startSection('title','اضافة '.$teamsInfo['title']); ?>
<?php $__env->startSection('page_level_plugins_styles'); ?>
<link href="<?php echo e(url('/')); ?>/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="<?php echo e(csrf_field()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_global_styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_level_styles'); ?>
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/yusuf/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
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
			<i class="icon-settings font-red-sunglo"></i>
			<span class="caption-subject bold uppercase"><?php echo e(trans('mainpage.add_post')); ?></span>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_90" data-toggle="tab"> <?php echo e(trans('mainpage.general_data')); ?> </a>
						</li>
						
						
					</ul>
					
					<div class="tab-content">
						<form method="POST" action="<?php echo e(url('/adminpanel/'.$teamsInfo['teams'].'/create/'.$id)); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="tab-pane active" id="tab_90">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="name">  الاسم  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="name" name="name" value="<?php echo e(isset($data->name) ? $data->name : ''); ?>">
												</div>
												<?php if($errors->has('name')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('name')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="name_en">  الاسم -en </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo e(isset($data->name_en) ? $data->name_en : ''); ?>">
												</div>
												<?php if($errors->has('name_en')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('name_en')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
										
										
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="jobTitlt">  المسمي الوظيفي   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="jobTitlt" name="jobTitlt" value="<?php echo e(isset($data->jobTitlt) ? $data->jobTitlt : ''); ?>">
												</div>
												<?php if($errors->has('jobTitlt')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('jobTitlt')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="jobTitlt_en">  المسمي الوظيفي -en  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="jobTitlt_en" name="jobTitlt_en" value="<?php echo e(isset($data->jobTitlt_en) ? $data->jobTitlt_en : ''); ?>">
												</div>
												<?php if($errors->has('jobTitlt_en')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('jobTitlt_en')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="description">  نبذة عن :  </label>
												<div class="col-md-10">
													<textarea class="form-control" id="descrption" name="descrption[]"><?php if(isset($data->descrption)){ echo $data->descrption; } ?></textarea>
												</div>
												<?php if($errors->has('descrption')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('descrption')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="phone">  الهاتف  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(isset($data->phone) ? $data->phone : ''); ?>">
												</div>
												<?php if($errors->has('phone')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('phone')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="email">  البريد الالكتروني  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="email" name="email" value="<?php echo e(isset($data->email) ? $data->email : ''); ?>">
												</div>
												<?php if($errors->has('email')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('email')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>




										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="in_url">  رابط انستجرام   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="in_url" name="in_url" value="<?php echo e(isset($data->in_url) ? $data->in_url : ''); ?>">
												</div>
												<?php if($errors->has('in_url')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('in_url')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="fb_url">   رابط فيس بوك  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="fb_url" name="fb_url" value="<?php echo e(isset($data->fb_url) ? $data->fb_url : ''); ?>">
												</div>
												<?php if($errors->has('fb_url')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('fb_url')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="t_url">   رابط تويتر  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="t_url" name="t_url" value="<?php echo e(isset($data->t_url) ? $data->t_url : ''); ?>">
												</div>
												<?php if($errors->has('t_url')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('t_url')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>


										


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="image"> الصورة  </label>
												<div class="col-md-10">
													<input type="file" class="form-control" id="image" name="image" value="<?php echo e(isset($data->image) ? $data->image : ''); ?>">
												</div>
												<?php if($errors->has('image')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('image')); ?></strong>
												</span>
												<?php endif; ?>
												
											</div>
										</div>
										
										
										
										
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							
							<?php if($teamsInfo['showembdtab']): ?>
							<div class="tab-pane" id="tab_92">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="embed"><?php echo e(trans('mainpage.embd')); ?></label>
												<div class="col-md-10">
													<textarea class="form-control" id="embed" name="embed"><?php echo e(isset($data->embed) ? $data->embed : ''); ?></textarea>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if($teamsInfo['showlinktab']): ?>
							<div class="tab-pane" id="tab_93">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12 morelink">
											<?php $con = 0; ?>
											<?php if(isset($postLinks) && sizeof($postLinks) != 0): ?>
											<?php $__currentLoopData = $postLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="<?php echo e(trans('mainpage.address')); ?>" value="<?php if(isset($row->title)){ echo $row->title; } ?>"/>
													<input type="hidden" name="row_id[]" value="<?php if(isset($row->id)){ echo $row->id; } ?>"/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="<?php echo e(trans('mainpage.link')); ?>" value="<?php if(isset($row->url)){ echo $row->url; } ?>"/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green"><?php echo e(trans('mainpage.add')); ?></button>
													</div>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
												<?php } ?>
											</div>
											<?php $con++; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											<?php else: ?>
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="<?php echo e(trans('mainpage.address')); ?>" value=""/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="<?php echo e(trans('mainpage.link')); ?>" value=""/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green"><?php echo e(trans('mainpage.add')); ?></button>
													</div>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
												<?php } ?>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
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
<script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/bootstrap-tagsinput.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/sortable.min.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_level_scripts_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
jQuery(document).ready( function ($){
$(".view_imageers").sortable({
handle: '.icon-move',
stop: function(en , ui){
var item = $(".view_imageers").sortable("toArray");
$.ajax({
url: "<?php echo e(url('/adminpanel/'.$teamsInfo['teams'].'/resort')); ?>",
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
$( function () {
$(".caption-subject").click( function() {
var item = $(".view_imageers").sortable("toArray");
console.log(item);
});
			
			$("#my-dropzone").dropzone({
					url: "<?php echo e(url('/adminpanel/'.$teamsInfo['teams'].'/imageupload/'.$id)); ?>",
					addRemoveLinks : false,
					//maxFilesize: 5,
					dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
					dictResponseError: 'Error uploading file!',
					params: {
						'_token': $('meta[name="csrf-token"]').attr('content')
					},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
});
</script>
<script>
/*var FormDropzone = function () {
return {
//main function to initiate the module
init: function () {
Dropzone.options.myDropzone = {
init: function() {
this.on("addedfile", function(file) {
// Create the remove button
var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
// Capture the Dropzone instance as closure.
var _this = this;
// Listen to the click event
removeButton.addEventListener("click", function(e) {
// Make sure the button click doesn't submit the form:
e.preventDefault();
e.stopPropagation();
// Remove the file preview.
_this.removeFile(file);
// If you want to the delete the file on the server as well,
// you can do the AJAX request here.
});
// Add the button to the file preview element.
file.previewElement.appendChild(removeButton);
});
}
}
}
};
}();*/
</script>
<script>
jQuery(document).ready( function ($){
$('.itemapts button').click( function(e){
$('.morelink').append('<div class="form-group form-md-line-input"><div class="col-md-5"><input class="form-control" name="title_link[]" placeholder="<?php echo e(trans("mainpage.address")); ?>" /><input type="hidden" name="row_id[]" value="-1"/></div><div class="col-md-5"><input class="form-control" name="url[]" placeholder="<?php echo e(trans("mainpage.link")); ?>"/></div></div>')
});
});
</script>
<script>
jQuery(document).ready( function ($){
$('#image').change( function(e){
var images = $(this).length;
console.log(image);
for(var i=0 ; i < image.length ; i++){
}
});
});
</script>
<script type="text/javascript">
jQuery(document).ready( function ($){
$('.view_imageers a').click(function(e){
e.preventDefault();
var id = $(this).attr('href');
$(this).addClass('redfordelete');
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: id,
type: "get",
success: function (data) {
console.log(data);
showError("<?php echo e(trans('mainpage.success')); ?>",'success',true);
$('.view_imageers').find('.redfordelete').parent().remove();
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
showError("<?php echo e(trans('mainpage.error')); ?>",'error',true);
$('.view_imageers').find('.redfordelete').removeClass('redfordelete');
}
});
});
});
</script>
<script type="text/javascript">
jQuery(document).ready( function ($){
$('#parentid').change(function(){
var id = $(this).val();
$('.submensuw .mainselect').remove();
$('.submensuw .form-group.form-md-line-input').remove();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu"><?php echo e(trans("mainpage.menu")); ?></label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value=""><?php echo e(trans("mainpage.menu_chose")); ?></option></select></div></div>');
for(var i=0 ; i < data.length ; i++){
$('.submensuw').find('.itsssems'+id).find('select').append('<option value="'+data[i].id+'">'+data[i].shortname+'</option>')
}
}
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
});
});
</script>
<script type="text/javascript">
$(document).on("change",'.selectiteps select' , function(){
var id = $(this).val();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu"><?php echo e(trans("mainpage.menu")); ?></label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value=""><?php echo e(trans("mainpage.menu_chose")); ?></option></select></div></div>');
for(var i=0 ; i < data.length ; i++){
$('.submensuw').find('.itsssem'+id).find('select').append('<option value="'+data[i].id+'">'+data[i].shortname+'</option>')
}
}
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
var id = $('.newoption').val();
var postid = "<?php echo e(isset($id) ? $id : 'null'); ?>";
newoption_change(id,postid);
});
$(document).on("change",'.newoption' , function(){
var id = $(this).val();
var postid = "<?php echo e(isset($id) ? $id : 'null'); ?>";
newoption_change(id,postid);
});
function newoption_change(id,postid){
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/getoptionmenu/"+id+"/"+postid,
type: "get",
success: function (data) {
for (var i = 0; i < data.length; i++) {
if(data[i].length != 0){
// for (var c = 0; c < data[i].length; c++) {
var item = data[i];
// console.log(item);
if(item.types == 'text'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="text" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'textarea'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><textarea class="form-control" name="'+item.optnid+'">'+item.val_item+'</textarea></div></div>');
}
if(item.types == 'colorpicker'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="color" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'date' || item.types == 'datepicker' || item.types == 'timepicker'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="date" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'editor'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><textarea class="form-control summernote" name="'+item.optnid+'">'+item.val_item+'</textarea></div></div>');
}
if(item.types == 'number'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="number" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'image' || item.types == 'file'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="file" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'radiobutton'  && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><div class="mt-radio-list item_'+item.id+'"></div></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-radio mt-radio-outline"><input type="radio" name="'+item.optnid+'" id="optionsRadios'+list.id+'" value="'+list.id+'" checked>'+list.title_name+'<span></span></label>');
}else{
$('.allitemos').find('.item_'+item.id).append('<label class="mt-radio mt-radio-outline"><input type="radio" name="'+item.optnid+'" id="optionsRadios'+list.id+'" value="'+list.id+'">'+list.title_name+'<span></span></label>');
}
}
}
}
if(item.types == 'multicheckbox' && item.item_list.length != 0 || item.types == 'checkbox' && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><div class="mt-checkbox-list item_'+item.id+'"></div></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
var ip = item.val_item;
var c = 0;
for (var p = 0; p < ip.length; p++) {
if(list.id == ip[p]){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" name="'+item.optnid+'[]" id="optionsRadioss'+list.id+'" value="'+list.id+'" checked>'+list.title_name+'<span></span></label>');
var c = c+1;
}
}
if(c == 0){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" name="'+item.optnid+'[]" id="optionsRadioss'+list.id+'" value="'+list.id+'">'+list.title_name+'<span></span></label>');
}
}
}
}
if(item.types == 'select' && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><select class="select2_category form-control item_'+item.id+'" id="optnval" tabindex="1" name="'+item.optnid+'"><option value=""></option></select></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'" selected>'+list.title_name+'</option>');
}else{
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'">'+list.title_name+'</option>');
}
}
}
}
if(item.types == 'multiselect'  && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><select class="select2_category form-control item_'+item.id+'" id="optnval" tabindex="1" name="'+item.optnid+'" multiselect ><option value=""></option></select></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'" selected>'+list.title_name+'</option>');
}else{
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'">'+list.title_name+'</option>');
}
}
}
}
// }
}
}
console.log('done');
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
};
</script>
<script>
$('.select2_category').select2({
placeholder: "Select an option",
allowClear: true
});
$(".select2_sample3").tagsinput();
</script>
<script>
$(document).ready(function() {
$(".summernote").summernote({
height:150
});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>