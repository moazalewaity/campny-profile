@extends('admin.layouts.backend')

@section('title','القوائم')

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
       <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />      
       <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />      
       <link href="{{url('/')}}/admin/assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />      
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
       <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
       <link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
       <style type="text/css">
       .view_imageersw li span {
            color: green;
            font-size: 16px;
        }
        .view_imageersw {
            float: right;
            width: 100%;
            text-align: right;
            list-style: none;
        }
        .view_imageersw li {
            float: right;
            min-width: 100%;
            font-size: 12px;
        }
      </style>
@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')
@endsection




@section('content')
       <div class="portlet light bordered">
          <div class="portlet-title">
                 <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">{{ trans('mainpage.add_dep') }} </span>
                 </div>
          </div>
          <div class="portlet-body form">
            <form method="POST" action="{{ route('adddep' , [$id]) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#tab_90" data-toggle="tab">{{ trans('mainpage.general_data') }}</a>
                    </li>
                    @foreach ($langs as $row)
                      <li>
                        <a href="{{ '#tab_'.$row->id }}" data-toggle="tab"> {{ trans('mainpage.data') }} {{ $row->name }} </a>
                      </li>
                    @endforeach
                    @if($id)
                    <li>
                      <a href="#tab_91" data-toggle="tab">{{ trans('mainpage.general_option') }}</a>
                    </li>
                    @endif
                  </ul>
                  <div class="tab-content">
                        <div class="tab-pane active" id="tab_90">
                          <div class="form-body">
                                 <div class="row">
                                   <div class="col-md-6">
                                          <div class="form-group form-md-line-input">
                                                 <label class="col-md-2 control-label" for="shortname">{{ trans('mainpage.name_dep') }}</label>
                                                 <div class="col-md-10">
                                                        <input type="text" class="form-control" id="shortname" name="shortname" value="{{ $data->shortname or '' }}">
                                                 </div>
                                                 @if ($errors->has('shortname'))
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('shortname') }}</strong>
                                                        </span>
                                                 @endif
                                          </div>
                                   </div>
                                   <div class="col-md-4">
                                          <div class="form-group form-md-line-input">
                                                 <label class="col-md-2 control-label" for="image">{{ trans('mainpage.image') }}</label>
                                                 <div class="col-md-10">
                                                        <input type="file" class="form-control" id="image" name="image"  accept="image/*">
                                                 </div>
                                                 @if ($errors->has('image'))
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                                 @endif
                                          </div>
                                   </div>
                                   <div class="col-md-2">
                                          <div class="form-group form-md-line-input">
                                                 <div class="col-md-10">
                                                        <?php if(isset($data->image)){ ?>
                                                               <img src="{{ url('/media/department/img/'.$data->image) }}" width="100px" />
                                                        <?php } ?>
                                                 </div>
                                          </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-6">
                                          <div class="form-group form-md-line-input selectitep">
                                             <label class="col-md-2 control-label" for="parentid">{{ trans('mainpage.sub_dep') }}</label>
                                             <div class="col-md-10">
                                                <select class="select2_category form-control" id="parentid" tabindex="1" name="parentid">
                                                  <option value="">{{ trans('mainpage.menu_chose') }}</option>
                                                  @foreach ($menus as $row)
                                                          <option value="{{ $row->id }}" <?php if(isset($data->parentid) && $data->parentid == $row->id ){ echo 'selected'; } ?>>{{ $row->shortname }}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                             @if ($errors->has('parentid'))
                                                    <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $errors->first('parentid') }}</strong>
                                                    </span>
                                             @endif
                                          </div>
                                          <div class="form-group form-md-line-input submensuw selectiteps">
                                          </div>
                                   </div>
                                   <div class="col-md-4">
                                          <div class="form-group form-md-line-input">
                                                 <label class="col-md-2 control-label" for="icon">{{ trans('mainpage.icon') }}</label>
                                                 <div class="col-md-10">
                                                        <input type="file" class="form-control" id="icon" name="icon"  accept="image/*">
                                                 </div>
                                                 @if ($errors->has('icon'))
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('icon') }}</strong>
                                                        </span>
                                                 @endif
                                          </div>
                                   </div>
                                   <div class="col-md-2">
                                          <div class="form-group form-md-line-input">
                                                 <div class="col-md-10">
                                                        <?php if(isset($data->icon)){ ?>
                                                               <img src="{{ url('/media/department/icon/'.$data->icon) }}"  width="100px" />
                                                        <?php } ?>
                                                 </div>
                                          </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-6">
                                          <div class="form-group form-md-line-input">
                                                 <label class="col-md-2 control-label" for="color">{{ trans('mainpage.color') }}</label>
                                                 <div class="col-md-10">
                                                  <input type="text" id="position-bottom-left color" class="form-control color_demo" data-position="bottom left" value="{{ $data->color or '' }}" name="color">
                                                 </div>
                                                 @if ($errors->has('color'))
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('color') }}</strong>
                                                        </span>
                                                 @endif
                                          </div>
                                   </div>
                                   <div class="col-md-4">
                                          <div class="form-group form-md-line-input">
                                                 <label class="col-md-2 control-label" for="banner">{{ trans('mainpage.bannar') }}</label>
                                                 <div class="col-md-10">
                                                        <input type="file" class="form-control" id="banner" name="banner" accept="image/*">
                                                 </div>
                                                 @if ($errors->has('banner'))
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('banner') }}</strong>
                                                        </span>
                                                 @endif
                                          </div>
                                   </div>
                                   <div class="col-md-2">
                                          <div class="form-group form-md-line-input">
                                                 <div class="col-md-10">
                                                        <?php if(isset($data->banner)){ ?>
                                                               <img src="{{ url('/media/department/banner/'.$data->banner) }}"  width="100px" />
                                                        <?php } ?>
                                                 </div>
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
                       
                        <?php $i = 0; $c = 0; ?>
                        @foreach ($langs as $lang_row)
                          @foreach ($depall as $dep_row)
                            <?php if($dep_row->langid == $lang_row->id){ $c++; ?>
                              <div class="tab-pane" id="{{ 'tab_'.$lang_row->id }}">
                                <div class="form-body">
                                   <div class="col-md-12">
                                      <div class="form-group form-md-line-input">
                                             <label class="col-md-2 control-label" for="title">{{ trans('mainpage.address') }}</label>
                                             <div class="col-md-10">
                                                    <input type="text" class="form-control" id="title" name="title[]" value="{{ $dep_row->title or '' }}">
                                                    <input type="hidden" class="form-control" id="langid" name="langid[]" value="{{ $lang_row->id or '' }}">
                                             </div>
                                             @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                             @endif
                                      </div>
                                      <div class="form-group form-md-line-input">
                                             <label class="col-md-2 control-label" for="summary">{{ trans('mainpage.descript') }}</label>
                                             <div class="col-md-10">
                                                    <textarea class="form-control" id="summary" name="summary[]">{{ $dep_row->summary or '' }}</textarea>
                                             </div>
                                             @if ($errors->has('summary'))
                                                    <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $errors->first('summary') }}</strong>
                                                    </span>
                                             @endif
                                      </div>
                                      <div class="form-group form-md-line-input">
                                             <label class="col-md-2 control-label" for="description">{{ trans('mainpage.detils') }}</label>
                                             <div class="col-md-10">
                                                    <textarea class="form-control summernote" id="description" name="description[]">{{ $dep_row->description or '' }}</textarea>
                                             </div>
                                             @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                             @endif
                                      </div>
                                      <div class="form-group form-md-line-input">
                                             <label class="col-md-2 control-label" for="keywords">{{ trans('mainpage.keyword') }}</label>
                                             <div class="col-md-10">
                                                    <input type="text" class="form-control select2_sample3" id="keywords" name="keywords[]" value="{{ $dep_row->keywords or '' }}">
                                             </div>
                                             @if ($errors->has('keywords'))
                                                    <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $errors->first('keywords') }}</strong>
                                                    </span>
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
                            <?php $i++; $c++; } ?>
                          @endforeach
                          <?php if(sizeof($langs) > $c){ ?>
                                 <div class="tab-pane assadas" id="{{ 'tab_'.$lang_row->id }}">
                                     <div class="form-body">
                                        <div class="col-md-12">
                                           <div class="form-group form-md-line-input">
                                                  <label class="col-md-2 control-label" for="title">{{ trans('mainpage.address') }}</label>
                                                  <div class="col-md-10">
                                                        <input type="text" class="form-control" id="title" name="title[]" value="{{ old('title') or '' }}">
                                                        <input type="hidden" class="form-control" id="langid" name="langid[]" value="{{ $lang_row->id or '' }}">

                                                  </div>
                                                  @if ($errors->has('title'))
                                                         <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                         </span>
                                                  @endif
                                           </div>
                                           <div class="form-group form-md-line-input">
                                                  <label class="col-md-2 control-label" for="summary">{{ trans('mainpage.descript') }}</label>
                                                  <div class="col-md-10">
                                                         <textarea class="form-control" id="summary" name="summary[]">{{ old('summary') or '' }}</textarea>
                                                  </div>
                                                  @if ($errors->has('summary'))
                                                         <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('summary') }}</strong>
                                                         </span>
                                                  @endif
                                           </div>
                                           <div class="form-group form-md-line-input">
                                                  <label class="col-md-2 control-label" for="description">{{ trans('mainpage.detils') }}</label>
                                                  <div class="col-md-10">
                                                         <textarea class="form-control summernote" id="description" name="description[]">{{ old('description') or '' }}</textarea>
                                                  </div>
                                                  @if ($errors->has('description'))
                                                         <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                         </span>
                                                  @endif
                                           </div>
                                           <div class="form-group form-md-line-input">
                                                  <label class="col-md-2 control-label" for="keywords">{{ trans('mainpage.keyword') }}</label>
                                                  <div class="col-md-10">
                                                         <input type="text" class="form-control select2_sample3" id="keywords" name="keywords[]" value="{{ old('keywords') or '' }}">
                                                  </div>
                                                  @if ($errors->has('keywords'))
                                                         <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('keywords') }}</strong>
                                                         </span>
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
                          <?php $i++; } ?>
                        @endforeach

                        <div class="tab-pane" id="tab_91">
                          <div class="form-body">
                            <div class="col-md-4 col-md-offset-4">
                            <ul class="view_imageersw">
                              @foreach($olist as $row)
                                 <li class="view_imageersw_item" id="{{ $row->id }}">
                                  <div class="form-group form-md-line-input">
                                    <span class="icon-move"><i class="fa fa-arrows"></i></span>
                                      <input type="checkbox" value='{{$row->id}}' data-id="{{ $id }}" data-rowid="{{ $row->id }}" <?php if($row->skc){ echo'checked'; } ?> class="make-switch" name="options[]"> 
                                    {{ $row->name_lang }}
                                  </div>
                                 </li>
                              @endforeach
                            </ul>
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
       <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
       
@endsection


@section('page_level_scripts_js')

@endsection



@section('scripts')
      <script type="text/javascript">
        $('.make-switch').bootstrapSwitch({
          onText: '<i class="fa fa-check" aria-hidden="true"></i>',
          offText: '<i class="fa fa-times" aria-hidden="true"></i>',
          onColor: 'success',
          offColor: 'warning',
          onSwitchChange: function (event, state) {
            $(this).val(state ? 'on' : 'off');
            var id = $(this).data('id');
            var rowid = $(this).data('rowid');
            var chk = $(this).data('chk');
            var value = $(this).val();
              $.ajax({
                url: "{{ url('/') }}/adminpanel/department/status_option/" + id + "/"+rowid+ "/"+value,
                type: "get",
                success: function (data) {
                  console.log('data');
                }
              });
          }
        });
      </script>
      @if($id)
      <script>
        jQuery(document).ready( function ($){
          $(".view_imageersw").sortable({
            handle: '.icon-move',
            stop: function(en , ui){
              var item = $(".view_imageersw").sortable("toArray");
              // console.log(item);
              $.ajax({
                url: "{{ url('/') }}/adminpanel/department/sort_option/{{$id}}",
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
       @endif
       <script>
              $(".select2_sample3").tagsinput();
       </script>
       <script>
              jQuery(document).ready( function ($){
                $(".summernote").summernote({
                       height:100
                });
              });
       </script>
       <script>
              $('.select2_category').select2({
                     placeholder: "Select an option",
                     allowClear: true
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
                                         $('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu">فرع الفرع</label><div class="col-md-10"><select class="select2_category form-control" id="submenu" data-placeholder="اختر فرع" tabindex="1" name="submenu[]"><option value="">الفرع الذي يتبع له هذا القسم</option></select></div></div>');
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
                                         $('.submensuw').append('<div class="form-group form-md-line-input itsssem'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu">فرع الفرع</label><div class="col-md-10"><select class="select2_category form-control submenu" id="submenu" data-placeholder="اختر فرع" tabindex="1" name="submenu[]"><option value="">الفرع الذي يتبع له هذا القسم</option></select></div></div>');
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

<script>
    $(document).ready( function() {

      $('.color_demo').each( function() {
        $(this).minicolors({
          control: $(this).attr('data-control') || 'hue',
          defaultValue: $(this).attr('data-defaultValue') || '',
          format: $(this).attr('data-format') || 'hex',
          keywords: $(this).attr('data-keywords') || '',
          inline: $(this).attr('data-inline') === 'true',
          letterCase: $(this).attr('data-letterCase') || 'lowercase',
          opacity: $(this).attr('data-opacity'),
          position: $(this).attr('data-position') || 'bottom',
          swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
          change: function(value, opacity) {
            if( !value ) return;
            if( opacity ) value += ', ' + opacity;
            if( typeof console === 'object' ) {
              console.log(value);
            }
          },
          theme: 'bootstrap'
        });

      });

    });
  </script>
@endsection




