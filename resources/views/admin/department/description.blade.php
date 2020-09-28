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
                            <span class="caption-subject bold uppercase"> اضافة قوائم</span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <div class="row">
                            <div class="col-md-12">
                                   <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                                          <ul class="nav nav-tabs">
                                                 <?php $i = 0; ?>
                                                 @foreach ($langs as $row)
                                                        <li class="<?php if($i == 0){ echo 'active'; } ?>">
                                                               <a href="{{ '#tab_'.$row->id }}" data-toggle="tab"> بيانات {{ $row->name }} </a>
                                                        </li>
                                                 <?php $i++; ?>
                                                 @endforeach
                                          </ul>
                                          <div class="tab-content">
                                                 <?php $i = 0; $c = 0; ?>
                                                 @foreach ($langs as $row)
                                                        @foreach ($depall as $rows)
                                                               <?php if($rows->langid == $row->id){ $c++; ?>
                                                                      <div class="tab-pane <?php if($i == 0){ echo 'active'; } ?>" id="{{ 'tab_'.$row->id }}">
                                                                             <form method="POST" action="{{ route('add_description' , [$menus->id , $row->id]) }}" enctype="multipart/form-data">
                                                                                    {{ csrf_field() }}
                                                                                    <div class="form-body">
                                                                                           <div class="col-md-12">
                                                                                                  <div class="form-group form-md-line-input">
                                                                                                         <label class="col-md-2 control-label" for="title">العنوان</label>
                                                                                                         <div class="col-md-10">
                                                                                                                <input type="text" class="form-control" id="title" name="title" value="{{ $rows->title or '' }}">
                                                                                                         </div>
                                                                                                         @if ($errors->has('title'))
                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                       <strong>{{ $errors->first('title') }}</strong>
                                                                                                                </span>
                                                                                                         @endif
                                                                                                  </div>
                                                                                                  <div class="form-group form-md-line-input">
                                                                                                         <label class="col-md-2 control-label" for="summary">نبذة</label>
                                                                                                         <div class="col-md-10">
                                                                                                                <textarea class="form-control summernote" id="summary" name="summary">{{ $rows->summary or '' }}</textarea>
                                                                                                         </div>
                                                                                                         @if ($errors->has('summary'))
                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                       <strong>{{ $errors->first('summary') }}</strong>
                                                                                                                </span>
                                                                                                         @endif
                                                                                                  </div>
                                                                                                  <div class="form-group form-md-line-input">
                                                                                                         <label class="col-md-2 control-label" for="description">تفاصيل</label>
                                                                                                         <div class="col-md-10">
                                                                                                                <textarea class="form-control" id="description" name="description">{{ $rows->description or '' }}</textarea>
                                                                                                         </div>
                                                                                                         @if ($errors->has('description'))
                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                       <strong>{{ $errors->first('description') }}</strong>
                                                                                                                </span>
                                                                                                         @endif
                                                                                                  </div>
                                                                                                  <div class="form-group form-md-line-input">
                                                                                                         <label class="col-md-2 control-label" for="keywords">كلمات مفتاحية</label>
                                                                                                         <div class="col-md-10">
                                                                                                                <input type="text" class="form-control select2_sample3" id="keywords" name="keywords" value="{{ $rows->keywords or '' }}">
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
                                                                                                         <button  type="submit" type="button" class="btn blue">حفظ</button>
                                                                                                  </div>
                                                                                           </div>
                                                                                    </div>
                                                                             </form>
                                                                      </div>
                                                               <?php $i++; } ?>
                                                        @endforeach
                                                        <?php if(sizeof($langs) > $c){ ?>
                                                               <div class="tab-pane <?php if($i == 0){ echo 'active'; } ?>" id="{{ 'tab_'.$row->id }}">
                                                                      <form method="POST" action="{{ route('add_description' , [$menus->id , $row->id]) }}" enctype="multipart/form-data">
                                                                             {{ csrf_field() }}
                                                                             <div class="form-body">
                                                                                    <div class="col-md-12">
                                                                                           <div class="form-group form-md-line-input">
                                                                                                  <label class="col-md-2 control-label" for="title">العنوان</label>
                                                                                                  <div class="col-md-10">
                                                                                                         <input type="text" class="form-control" id="title" name="title" value="{{ old('title') or '' }}">
                                                                                                  </div>
                                                                                                  @if ($errors->has('title'))
                                                                                                         <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $errors->first('title') }}</strong>
                                                                                                         </span>
                                                                                                  @endif
                                                                                           </div>
                                                                                           <div class="form-group form-md-line-input">
                                                                                                  <label class="col-md-2 control-label" for="summary">نبذة</label>
                                                                                                  <div class="col-md-10">
                                                                                                         <textarea class="form-control summernote" id="summary" name="summary">{{ old('summary') or '' }}</textarea>
                                                                                                  </div>
                                                                                                  @if ($errors->has('summary'))
                                                                                                         <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $errors->first('summary') }}</strong>
                                                                                                         </span>
                                                                                                  @endif
                                                                                           </div>
                                                                                           <div class="form-group form-md-line-input">
                                                                                                  <label class="col-md-2 control-label" for="description">تفاصيل</label>
                                                                                                  <div class="col-md-10">
                                                                                                         <textarea class="form-control" id="description" name="description">{{ old('description') or '' }}</textarea>
                                                                                                  </div>
                                                                                                  @if ($errors->has('description'))
                                                                                                         <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $errors->first('description') }}</strong>
                                                                                                         </span>
                                                                                                  @endif
                                                                                           </div>
                                                                                           <div class="form-group form-md-line-input">
                                                                                                  <label class="col-md-2 control-label" for="keywords">كلمات مفتاحية</label>
                                                                                                  <div class="col-md-10">
                                                                                                         <input type="text" class="form-control select2_sample3" id="keywords" name="keywords" value="{{ old('keywords') or '' }}">
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
                                                                                                  <button  type="submit" type="button" class="btn blue">حفظ</button>
                                                                                           </div>
                                                                                    </div>
                                                                             </div>
                                                                      </form>
                                                               </div>
                                                        <?php $i++; } ?>
                                                 @endforeach

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
       
@endsection


@section('page_level_scripts_js')

@endsection



@section('scripts')
       <script>
              $(".select2_sample3").tagsinput();
       </script>
       <script>
              $(".summernote").summernote({
                     height:100
              });
       </script>

@endsection




