@extends('admin.layouts.backend')

@section('page_level_plugins_styles')

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
@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')

@endsection




@section('content')


@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')
  <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

@endsection


@section('page_level_scripts_js')

@endsection



@section('scripts')

@endsection




