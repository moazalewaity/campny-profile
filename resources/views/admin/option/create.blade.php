@extends('admin.layouts.backend')

@section('title','اضافة مخصص')

@section('page_level_plugins_styles')
       <link href="{{url('/')}}/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
        <meta name="_token" content="{{csrf_token()}}" />
@endsection

@section('page_global_styles')
@endsection

@section('page_level_styles')
       <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />   
       <link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />         
       <link href="{{url('/')}}/admin/assets/yusuf/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />               
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />               
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
       <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
       <link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
       <style type="text/css">
       .modal-title{
              color: #777;display: inline-block;
       }
       .form-group.form-md-line-input{
              display: inline-block;
              width: 100%;
              padding: 0;
              margin: 8px 0;
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
                     <button type="button" class="btn btn-primary pull-right btnmodasw" data-toggle="modal" data-id="{{ $id }}" data-target="#exampleModal">{{ trans('mainpage.add') }}</button>
              </div>
              <div class="portlet-body form">
                     <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered datatable" id="myTablesw">
                                   <thead>
                                          <tr>
                                                 <th>
                                                        #
                                                 </th>
                                                 <th>{{ trans('mainpage.name') }}</th>
                                                 <th>{{ trans('mainpage.types') }}</th>
                                                 <th>{{ trans('mainpage.langs') }}</th>
                                                 <th width="135px">{{ trans('mainpage.setting') }}</th>
                                          </tr>
                                   </thead>
                            </table>
                     <!-- </div> -->
              </div>
       </div>
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form class="modalpop" method="POST" action="" enctype="multipart/form-data">
                     <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{ trans('mainpage.data_option') }}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">
                                         <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group form-md-line-input">
                                                               <label class="col-md-2 control-label" for="status">{{ trans('mainpage.type_option') }}</label>
                                                               <div class="col-md-10">
                                                                      <select class="select2_category form-control maintype" data-placeholder="{{ trans('mainpage.type_option') }}" tabindex="1" name="type">
                                                                             <option value="">{{ trans('mainpage.type_option') }}</option>
                                                                             @foreach($types as $row)
                                                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                             @endforeach
                                                                      </select>
                                                               </div>
                                                        </div>
                                                 </div>

                                                 <div class="col-md-12 itep">
                                                        <div class="form-group form-md-line-input selectitep">
                                                               <label class="col-md-2 control-label" for="catid">{{ trans('mainpage.op_option') }}</label>
                                                               <div class="col-md-10">
                                                                      <select class="select2_category catid form-control" id="catid" tabindex="1" name="catid">
                                                                             <option value="">{{ trans('mainpage.menu_chose') }}</option>
                                                                             <option value="0">{{ trans('mainpage.not_cat_spc') }}</option>
                                                                             @foreach ($menus as $row)
                                                                                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                                                             @endforeach
                                                                      </select>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-12 itep">
                                                        <div class="form-group form-md-line-input">
                                                               <label class="col-md-2 control-label" for="name_cat">{{ trans('mainpage.op_option') }}</label>
                                                               <div class="col-md-10">
                                                                      <input type="text" class="form-control nedel" id="name_cat" name="name_cat" value="">
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-12">
                                                        <div class="form-group form-md-line-input">
                                                               <label class="col-md-2 control-label" for="name">{{ trans('mainpage.name') }}</label>
                                                               <div class="col-md-10">
                                                                      <input type="text" class="form-control nedel" id="name" name="name" value="">
                                                               </div>
                                                        </div>
                                                 </div>
                                                 @foreach ($langs as $row)
                                                        <div class="col-md-12">
                                                               <div class="form-group form-md-line-input">
                                                                      <label class="col-md-2 control-label" for="title">اللغة {{ $row->name }}</label>
                                                                      <div class="col-md-10">
                                                                             <input type="text" class="form-control nedel" id="title_{{ $row->id }}" name="title[]" value="">
                                                                             <input type="hidden" name="langid[]" id="titles_{{ $row->id }}" value="{{ $row->id }}">
                                                                      </div>
                                                               </div>
                                                        </div>
                                                 @endforeach
                                          </div>
                                   </div>
                                   <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('mainpage.cancel') }}</button>
                                          <button type="button" class="btn btn-primary save pull-left">{{ trans('mainpage.save') }}</button>
                                          <input type="hidden" class="valitemid" name="valitemid" value="">
                                          <input type="hidden" class="_method" name="_method" value="POST">
                                   </div>
                            </div>
                     </div>
              </form>
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
       <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/yusuf/sortable.min.js" type="text/javascript"></script>
       
@endsection


@section('page_level_scripts_js')

@endsection



@section('scripts')
       <script type="text/javascript">
              $(document).ready(function() {
                     var oTable =  $('.datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: {
                                   url: '{{ route("option/getdata") }}' ,
                                   data: function (d) {
                                          d._token = $('input[name=_token]').val();
                                          d.name = $('input[name=name]').val();
                                          d.type = $('input[name=type]').val();
                                   }
                            },
                            columns: [
                                   {data: 'id', name: 'id'},
                                   {data: 'name', name: 'name'},
                                   {data: 'name_type', name: 'name_type'},
                                   {data: 'name_lang', name: 'name_lang'},
                                   { data: null , render: function(data){
                                          var edit_button = data.edit_url;
                                          var delete_button = data.delete_url;
                                          return edit_button + delete_button;
                                          }, "searchable": false
                                   }
                            ],
                           "language": {
                               "lengthMenu": "{{ trans('mainpage.datatable_lengthMenu') }}",
                               "zeroRecords": "{{ trans('mainpage.datatable_zeroRecords') }}",
                               "info": "{{ trans('mainpage.datatable_info') }}",
                               "infoEmpty": "{{ trans('mainpage.datatable_infoEmpty') }}",
                               "search": "{{ trans('mainpage.datatable_search') }}",
                               "infoFiltered": "{{ trans('mainpage.datatable_infoFiltered') }}"
                           }
                     });

                     $('#search_form').on('submit', function(e) {
                            // alert('asd');
                            oTable.draw();
                            e.preventDefault();
                     });

                     $('.btnmodasw').click(function(e){
                            $('.nedel').val('');
                            $('.valitemid').val('');
                            $('._method').val('POST');
                            $('.select2_category').val(null).trigger('change');
                     });

                     $('.modalpop .save').click(function(e){
                            e.preventDefault();
                            var id = $('.valitemid').val();
                            console.log(id);
                            if(id == ''){
                                   var url = "{{ route('createoptions') }}";
                            }else{
                                   var url = "{{ route('createoption') }}/"+id;
                            }
                            var values = $('.modalpop').serialize();
                            console.log('url ' + url);
                            console.log('data: ' + values);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                }
                            });
                            $.ajax({
                                   url: url,
                                   type: "post",
                                   dataType: 'json',
                                   data: values ,
                                   success: function (data) {
                                          $('#exampleModal').modal('hide');
                                          $('.nedel').val('');
                                          $('.valitemid').val('');
                                          $('._method').val('POST');
                                          $('.select2_category').val(null).trigger('change');
                                          showError("{{ trans('mainpage.success') }}",'success',true);
                                          oTable.draw();
                                   },
                                   error: function (xhr, ajaxOptions, thrownError) {
                                          $('#exampleModal').modal('hide');
                                          showError("{{ trans('mainpage.error') }}",'error',true);
                                   }
                            });
                     });

                  $(document).on("click",".edit",function(e) {
                     e.preventDefault();
                     var id = $(this).data('id');
                     var url = "{{ url('/adminpanel/option' ) }}/"+id;
                     $.ajax({
                            url: url,
                            type: "get",
                            success: function (data) {

                                   $('.modal-dialog').find('input').val('');
                                   $('.select2_category').val(null).trigger('change');
                                   $('._method').val('PUT');

                                   for (var i = 0; i < data.length; i++) {
                                          console.log(data[i].name);
                                          if(data[i].name){
                                                 $('#exampleModal').find('input[name="name"]').val(data[i].name);
                                                 $('#exampleModal').find('.valitemid').val(data[i].id);
                                                 $('.select2_category').val(data[i].type);
                                                 $('.catid').val(data[i].catid);
                                                 $('.select2_category').trigger('change');
                                          }

                                          for (var c = 0; c < data[i].length; c++) {
                                                 $('#exampleModal').find('#title_'+data[i][c].langid).val(data[i][c].title);
                                                 $('#exampleModal').find('#titles_'+data[i][c].langid).val(data[i][c].langid);
                                          }
                                   }

                                   $('#exampleModal').modal('show');
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                   $('#exampleModal').modal('hide');
                                   showError("{{ trans('mainpage.error') }}",'error',true);
                                   // $('.view_imageers').find('.redfordelete').removeClass('redfordelete');
                            }
                     });
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
                                   showError("{{ trans('mainpage.error') }}",'error',true);
                                   $('.view_imageers').find('.redfordelete').removeClass('redfordelete');
                            }
                     });
                  });
              });
       </script>

       <script>
              $('.itep').hide();
              $( function () {
                     $(".maintype").change( function() {
                            var id = $(this).val();
                            if(id == '3' || id == '4' || id == '5' || id == '6' || id == '14'){
                                   $('.itep').show();
                            }else{
                                   $('.itep').hide();
                            }
                            console.log(id);
                     });
              });
       </script>

       <script>
              $( function () {
                     $(".caption-subject").click( function() {
                            var item = $(".view_imageers").sortable("toArray");
                            console.log(item);
                     });
              });
       </script>

       <script>
              $('.select2_category').select2({
                     placeholder: "Select an option",
                     allowClear: true
              });
       </script>
       
       <script>
              $(".select2_sample3").tagsinput();
       </script>
       
       



@endsection




