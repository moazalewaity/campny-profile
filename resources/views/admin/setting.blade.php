@extends('admin.layouts.backend')
@section('title','اعدادات الموقع')
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
			<span class="caption-subject bold uppercase"> اعدادات الموقع </span>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_90" data-toggle="tab"> اعدادات الموقع </a>
						</li>
						
						
					</ul>
					
					<div class="tab-content">
						<form method="POST" action="{{ url('/adminpanel/settings/create/') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="tab-pane active" id="tab_90">
								<div class="form-body">
									<div class="row">



										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="title"> شعار الموقع   </label>
												<div class="col-md-10">
													<input type="file" class="form-control" id="logo" name="logo" value="{{ $data->logo or '' }}">
												<img src="{{ url('/')}}/media/site/img/{{$data->logo}} " width="100" height="100" />
												</div>
												
											</div>
										</div>



										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="title">  اسم الموقع   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="title" name="title" value="{{ $data->title or '' }}">
												</div>
												
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="client">  وصف الموقع   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="descrption" name="descrption" value="{{ $data->descrption or '' }}">
												</div>
												
											</div>
										</div>



										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="date"> العنوان  </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="address" name="address" value="{{ $data->address or '' }}">
												</div>
												
											</div>
										</div>


										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="url"> الهاتف   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone or '' }}">
												</div>
												
											</div>
                                        </div>
                                        
                                        <div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="email"> البريد الالكتروني    </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="email" name="email" value="{{ $data->email or '' }}">
												</div>
												
											</div>
                                        </div>
                                        


                                        <div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="facebook"> فيس بوك   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="facebook" name="facebook" value="{{ $data->facebook or '' }}" >
												</div>
												
											</div>
                                        </div>


                                        <div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="twitter"> تويتر   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="twitter" name="twitter" value="{{ $data->twitter or '' }}">
												</div>
												
											</div>
                                        </div>


                                        <div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="instgram"> انستجرام   </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="instgram" name="instgram" value="{{ $data->instgram or '' }}">
												</div>
												
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


