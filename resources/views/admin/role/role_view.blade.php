@extends('admin.layouts.backend')
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
<li>
  <a href="#">{{ trans('mainpage.rule_new_role') }}</a>
  <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>
</li>
@endsection
@section('content')
<div class="row " >
<div class="portlet light ">
  <div class="portlet-title">
    <div class="caption">
      <i class="icon-share font-dark"></i>
      <span class="caption-subject font-dark bold uppercase">update new rule</span>
    </div>
  </div>
  <div class="portlet-body form">
    <!-- BEGIN FORM-->
    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_role" enctype="multipart/form-data" >
      <div class="alert alert-danger" id="update_role_alert" style="display:none" >
        <ul id="error"> 
        </ul>
      </div>
      <input name="_method" type="hidden" value="PUT">               
      <div class="form-body">
        <div class="form-group">
          <label class="col-md-3 control-label">slug</label>
          <div class="col-md-4">
            <input type="text" class="form-control" 
              placeholder="slug" id="slug" name="slug" required value="{{$role->slug}}"  data-error="{{ trans('mainpage.rule_name') }}  slug">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">name</label>
          <div class="col-md-4">
            <input type="text" class="form-control" placeholder="name" value="{{$role->name}}"  required id="name" name="name"  data-error="{{ trans('mainpage.rule_name') }} ">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="form-group " >
          <!--==================================-->
          @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)    
          <div class="col-md-3 grand"  >
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption">
                  <i class="{{ $menues->icon}}"></i>{{ $menues->title}} 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="icheck-list">
                  <?php    $user_id=isset($user->id) ? $user->id : null;
                    if($user_id != null) {
                      $userpermission = \Sentinel::findById($user_id); 
                    }
                  ?>  
                  @foreach ($menues->user_permissions as $submenue)
                  <div>
                    <?php  if (count($submenue->user_permissions) > 0 ) { ?>
                    <label style="display: inline-block;">
                    <a  class="btn btn-info btn-xs" onclick="$('.s_m').toggle()">
                    <i class="fa fa-plus"></i>
                    </a>   {{$submenue['title']}}
                    </label>
                    <?php } else {?>
                    <?php if($submenue->ignore_permission == 1) { } else { ?>
                    <a style="display: inline-block;"  onclick="user_have('{{$submenue['slug']}}')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 
                    <?php }  ?>
                    <label style="display: inline-block;">
                    <?php  $sub_permission=isset($submenue->sub_permission) ? $submenue->sub_permission:null; ?>
                    <input type="checkbox"  class="icheck permission" 
                      <?php 
                        if($user_id != null) {
                          if($userpermission->hasAccess($submenue['slug']))
                            echo "checked";
                        }
                        ?>
                      value="{{$submenue['slug']}}" data-checkbox="icheckbox_square-grey"> 
                    {{$submenue['title']}}
                    </label>
                  </div>
                  @endforeach     
                </div>
              </div>
            </div>
          </div>
          @endforeach 
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn green">{{ trans('mainpage.edit') }}</button>
              <button type="button" class="btn default">{{ trans('mainpage.cancel') }}</button>
            </div>
          </div>
        </div>
    </form>
    <!-- END FORM-->
    </div> 
  </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection
@section('body')
@include('admin.content.body_full')
@endsection
@section('page_level_plugins_js')
<script src="{{url('/')}}/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
@endsection
@section('page_level_scripts_js')
@endsection
@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript">
  $(document).ready(function (e) {
  
    var role_id = '{{$role->id}}';  
  
    $("#update_role").validator().on('submit', function(e) {
  
  
  
  
  
     if (e.isDefaultPrevented()) {
  
  
  
     } else {
  
  
  
      $.ajaxSetup({
  
        headers: {
  
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  
        }
  
      })
  
  
  
      e.preventDefault(); 
  
  
  
  ///////////////////////////////////////////////////////////////////////
  
  
  
  
  
  var permissions = []; 
  
  $(".permission").each(function(i, selected)
  
  {
  
  if($(this).is(':checked'))
  
  {
  
  permissions[i]= $(this).val();
  
  }
  
  else
  
  {
  
        // Checkbox isn't checked
  
      }
  
  
  
    });  
  
  
  
  
  
  var array = {
  "name":$('#name').val(),
  "slug":$('#slug').val(),
  "_method":$('input[name=_method]').val(),
  "permissions":permissions
  };
  ////////////////////////////////////////////////////////////////
  $.ajax({
  type: 'POST',
  dataType: "json",
  url: '{!! URL::asset("/adminpanel/roles/'+role_id+'") !!}',
  data: array,
  success: function (e) {
  if (e['result'] == 'ok') {
  jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
  $('#update_role_alert').hide();
  }
  else if (e['result'] == 'error')
  {
  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
  $('#update_role_alert').hide();
  }
  else
  {
  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
  }
  },
  error: function(e) 
  {
  $('#update_role_alert').show();
  $('#error').empty();
  var error = e.responseJSON;
  $.each(error, function (i, member) {
  for (var i in member) {
  $('#error').append('<li >'+ member[i] +'</li>' );
  }
  });
  jError("حدث خطأ فى عملية التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});
  }           
  });
  }
  }); 
  });
</script>
@endsection