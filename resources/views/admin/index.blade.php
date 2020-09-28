@extends('admin.layouts.backend')


@section('title', 'لوحة التحكم ')

@section('page_level_plugins_styles')

<link href="{{url('/')}}/admin/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

@endsection



@section('page_global_styles')

@endsection



@section('page_level_styles')

@endsection



@section('theme_layout_styles')

@endsection



@section('style')



<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">

<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">

<style type="text/css">

.form-group .grand{

  height: 260px;

  border: 2px solid #ddd;

  overflow: auto;

  padding: 0px  0px;

  margin: 10px 40px ;



}

.form-horizontal .form-group {

  margin-right: 5px;

  margin-left: 0px;

}



</style>





@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')
@endsection

@section('content')
<style type="text/css">
	.feeds li .col2 {
    float: right;
    width: 80px;
    margin-right: -80px;
}.slimScrollBar {
    right: auto !important;
    left: 1px;
}
.dashboard-stat .visual{
	float: left;
}
.dashboard-stat .details {
    position: absolute;
    left: auto;
    right: 15px;
    padding-left: 0;
    padding-right: 15px;
    padding-top: 15px;
}
.dashboard-stat .visual {
    float: left;
    height: 50px;
    text-align: center;
}
.dashboard-stat .visual>i {
    margin-right: -15px;
    line-height: 50px;
    font-size: 50px;
}.portlet .dashboard-stat:last-child {
    margin-bottom: 5px;
}
</style>
<?php 
$user = Sentinel::getUser();
$cons = 0;
$rol = \DB::table("role_users")->where('user_id' , $user->id)->get();
foreach ($rol as $value) {
	if($value->role_id == '1'){
		$cons++;
	}
}
// dd($user);
?>
@if($cons != 0)
<div class="row widget-row">
	<div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading"> المسؤولين</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green fa fa-user-secret"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$admins[0]->counter}}">{{$admins[0]->counter}}</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading"> الخدمات </h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green-jungle fa fa-user"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $services->count() }}">{{ $services->count() }}</span>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-md-4">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
            <h4 class="widget-thumb-heading">العملاء </h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-warning icon-layers"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">العدد الاجمالي</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $clients->count() }}">{{ $clients->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">الطلاب</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-red fa fa-graduation-cap"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$students[0]->counter}}">{{$students[0]->counter}}</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">التخصصات</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-blue fa fa-university"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$specializations[0]->counter}}">{{$specializations[0]->counter}}</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="col-md-4">-->
    <!--    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">-->
    <!--        <h4 class="widget-thumb-heading">المقررات</h4>-->
    <!--        <div class="widget-thumb-wrap">-->
    <!--            <i class="widget-thumb-icon bg-grey-gallery fa fa-book"></i>-->
    <!--            <div class="widget-thumb-body">-->
    <!--                <span class="widget-thumb-subtitle">العدد الاجمالي</span>-->
    <!--                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$courses[0]->counter}}">{{$courses[0]->counter}}</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
</div>
@endif  
  
<!-- <div class="row"> -->
	<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
		<?php $menu_for_user=Sentinel::getUser(); ?>
		@foreach (\App\Menu::where('p_id','=',0)->orderby('new_order')->get() as $menues)
			@if($menu_for_user->hasAccess($menues->slug.'.*') || $menues->ignore_permission==1)
	    	<div class="portlet light">
	            <div class="portlet-title">
	                <div class="caption">
	                    <i class="icon-equalizer font-dark hide"></i>
	                    <span class="caption-subject font-dark bold uppercase">{{ $menues->title }}</span>
	                </div>
	                <div class="tools">
	                    <a href="" class="collapse"> </a>
	                </div>
	            </div>
	            <div class="portlet-body">
					<div class="row">
				        @foreach ($menues->submenus as $submenues)
				            @if($menu_for_user->hasAccess($submenues->slug) || $menu_for_user->hasAccess($submenues->slug.'.*')  ||  $submenues->ignore_permission==1 )
				            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <a class="dashboard-stat dashboard-stat-v2 {{ $submenues->color }}" href="{{url('/adminpanel/')}}{{$submenues->url}}">
				                        <div class="visual">
				                            <i class="{{ $submenues->icon }}"></i>
				                        </div>
				                        <div class="details">
				                            <div class="desc"> {{$submenues->title}} </div>
				                        </div>
				                    </a>
				                </div>
								@foreach ($submenues->submenus as $submenues_data)
				                    @if($menu_for_user->hasAccess($submenues_data->slug)  || $submenues_data->submenues_data==1 )
						            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    <a class="dashboard-stat dashboard-stat-v2  {{ $submenues_data->color }}" href="{{url('/adminpanel/')}}{{$submenues_data->url}}">
						                        <div class="visual">
				                            		<i class="{{ $submenues_data->icon }}"></i>
						                        </div>
						                        <div class="details">
						                            <div class="desc"> {{$submenues_data->title}} </div>
						                        </div>
						                    </a>
						                </div>
				                    @endif
				                @endforeach
				            @endif
				        @endforeach
			        </div>
		        </div>
		    </div>
		    @endif
		@endforeach
    <!-- </div> -->
<!-- </div> -->
@endsection

@section('body')

@include('admin.content.body_full')
@endsection

@section('page_level_plugins_js')
<script src="{{url('/')}}/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/assets/global/plugins/amcharts/amcharts/themes/serial.js" type="text/javascript"></script> -->

<!-- <script src="{{url('/')}}/admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script> -->
<!-- <script src="{{url('/')}}/admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!-- <script src="https://www.amcharts.com/lib/4/core.js"></script> -->
<!-- <script src="https://www.amcharts.com/lib/4/charts.js"></script> -->
<!-- <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script> -->



<style type="text/css">

#dashboard_amchart_2,
#dashboard_amchart_3 {
  width: 100%;
  height: 500px;
}
</style>
@endsection

@section('page_level_scripts_js')
<script type="text/javascript">
	$(function(){
		$('.scroller').slimScroll({
			height: '250px'
		});
	});
</script>

@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
@endsection









