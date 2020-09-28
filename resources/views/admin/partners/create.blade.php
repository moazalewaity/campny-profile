@extends('admin.layouts.backend')
@section('title','اضافة '.$partnersInfo['title'])
@section('page_level_plugins_styles')
<link href="{{url('/')}}/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_field() }}">
@endsection
@section('page_global_styles')
@endsection
@section('page_level_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/yusuf/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('theme_layout_styles')
@endsection
@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
@endsection
@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
@endsection
@section('content')
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption font-red-sunglo">
			<i class="icon-settings font-red-sunglo"></i>
			<span class="caption-subject bold uppercase">{{ trans('mainpage.add_post') }}</span>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_90" data-toggle="tab"> {{ trans('mainpage.general_data') }} </a>
						</li>
						
						
					</ul>
					
					<div class="tab-content">
						<form method="POST" action="{{ url('/adminpanel/'.$partnersInfo['partners'].'/create/'.$id) }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="tab-pane active" id="tab_90">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="name">  الاسم  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="name" name="name" value="{{ $data->name or '' }}">
												</div>
												@if ($errors->has('name'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
												@endif
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="addres">  الرابط    </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="url" name="url" value="{{ $data->url or '' }}">
												</div>
												@if ($errors->has('url'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('url') }}</strong>
												</span>
												@endif
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="image"> الصورة  </label>
												<div class="col-md-10">
													<input type="file" class="form-control" id="image" name="image" value="{{ $data->image or '' }}">
												</div>
												@if ($errors->has('image'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('image') }}</strong>
												</span>
												@endif
												
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="description"> الوصف </label>
												<div class="col-md-10">
													<textarea class="form-control" id="descrption" name="descrption[]"><?php if(isset($data->descrption)){ echo $data->descrption; } ?></textarea>
												</div>
												@if ($errors->has('descrption'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('descrption') }}</strong>
												</span>
												@endif
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="status">{{ trans('mainpage.status') }}</label>
												<div class="col-md-10">
													<select class="select2_category form-control" tabindex="1" name="status">
														<option value="">{{ trans('mainpage.status_post') }}</option>
														<option value="0" <?php if(isset($data->status) && $data->status == '0' ){ echo 'selected'; } ?>>{{ trans('mainpage.public') }}</option>
														<option value="1" <?php if(isset($data->status) && $data->status == '1' ){ echo 'selected'; } ?>>{{ trans('mainpage.not_public') }}</option>
													</select>
												</div>
												@if ($errors->has('status'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('status') }}</strong>
												</span>
												@endif
											</div>
										</div>
										
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue">{{ trans('mainpage.save') }}</button>
										</div>
									</div>
								</div>
							</div>
							
							@if($partnersInfo['showembdtab'])
							<div class="tab-pane" id="tab_92">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="embed">{{ trans('mainpage.embd') }}</label>
												<div class="col-md-10">
													<textarea class="form-control" id="embed" name="embed">{{ $data->embed or '' }}</textarea>
												</div>
												@if ($errors->has('embed'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('embed') }}</strong>
												</span>
												@endif
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue">{{ trans('mainpage.save') }}</button>
										</div>
									</div>
								</div>
							</div>
							@endif
							@if($partnersInfo['showlinktab'])
							<div class="tab-pane" id="tab_93">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12 morelink">
											<?php $con = 0; ?>
											@if(isset($postLinks) && sizeof($postLinks) != 0)
											@foreach ($postLinks as $row)
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="{{ trans('mainpage.address') }}" value="<?php if(isset($row->title)){ echo $row->title; } ?>"/>
													<input type="hidden" name="row_id[]" value="<?php if(isset($row->id)){ echo $row->id; } ?>"/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="{{ trans('mainpage.link') }}" value="<?php if(isset($row->url)){ echo $row->url; } ?>"/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green">{{ trans('mainpage.add') }}</button>
													</div>
												</div>
												@if ($errors->has('embed'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('embed') }}</strong>
												</span>
												@endif
												<?php } ?>
											</div>
											<?php $con++; ?>
											@endforeach
											@else
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="{{ trans('mainpage.address') }}" value=""/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="{{ trans('mainpage.link') }}" value=""/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green">{{ trans('mainpage.add') }}</button>
													</div>
												</div>
												@if ($errors->has('embed'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('embed') }}</strong>
												</span>
												@endif
												<?php } ?>
											</div>
											@endif
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue">{{ trans('mainpage.save') }}</button>
										</div>
									</div>
								</div>
							</div>
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('body')
@include('admin.content.body_full')
@endsection
@section('page_level_plugins_js')
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> -->
<script src="{{url('/')}}/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/yusuf/bootstrap-tagsinput.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/yusuf/sortable.min.js" type="text/javascript"></script>
@endsection
@section('page_level_scripts_js')
@endsection
@section('scripts')
<script>
jQuery(document).ready( function ($){
$(".view_imageers").sortable({
handle: '.icon-move',
stop: function(en , ui){
var item = $(".view_imageers").sortable("toArray");
$.ajax({
url: "{{ url('/adminpanel/'.$partnersInfo['partners'].'/resort') }}",
type: "post",
data: {
"_token":"{{ csrf_token() }}",
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
					url: "{{ url('/adminpanel/'.$partnersInfo['partners'].'/imageupload/'.$id) }}",
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
$('.morelink').append('<div class="form-group form-md-line-input"><div class="col-md-5"><input class="form-control" name="title_link[]" placeholder="{{ trans("mainpage.address") }}" /><input type="hidden" name="row_id[]" value="-1"/></div><div class="col-md-5"><input class="form-control" name="url[]" placeholder="{{ trans("mainpage.link") }}"/></div></div>')
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
showError("{{ trans('mainpage.success') }}",'success',true);
$('.view_imageers').find('.redfordelete').parent().remove();
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
showError("{{ trans('mainpage.error') }}",'error',true);
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
url: "{{ url('/') }}/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu">{{ trans("mainpage.menu") }}</label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value="">{{ trans("mainpage.menu_chose") }}</option></select></div></div>');
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
url: "{{ url('/') }}/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu">{{ trans("mainpage.menu") }}</label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value="">{{ trans("mainpage.menu_chose") }}</option></select></div></div>');
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
var postid = "{{ $id or 'null' }}";
newoption_change(id,postid);
});
$(document).on("change",'.newoption' , function(){
var id = $(this).val();
var postid = "{{ $id or 'null' }}";
newoption_change(id,postid);
});
function newoption_change(id,postid){
$.ajax({
url: "{{ url('/') }}/adminpanel/department/getoptionmenu/"+id+"/"+postid,
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
@endsection