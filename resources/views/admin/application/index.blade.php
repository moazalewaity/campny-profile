@extends('admin.layouts.backend')
@section('title','القوائم')

@section('page_level_plugins_styles')
       <link href="{{url('/')}}/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_global_styles')
@endsection

@section('page_level_styles')
       <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />         
       <link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />         
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
                            <i class="fa fa-search font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> {{ trans('mainpage.engeuiry') }}</span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <form method="POST" id="search_form" class="form-inline" role="form">
                            <div class="form-group">
                                   <label for="name">{{ trans('mainpage.address') }}</label>
                                   <input class="form-control" name="name" id="name" placeholder="{{ trans('mainpage.address') }}" type="text">
                                   {{ csrf_field() }}
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('mainpage.save') }}</button>
                     </form>
              </div>
       </div>
       <div class="portlet light bordered">
              <div class="portlet-title">
                     <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">{{ trans('mainpage.view_dep') }}</span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <div class="table-responsive">
                            <table class="table table-bordered" id="myTablesw">
                                   <thead>
                                          <tr>
                                                 <th>
                                                        #
                                                 </th>
                                                 <th>الاسم الكامل</th>
                                                 <th>السجل المدني</th>
                                                 <th>البريد الالكتروني</th>
                                                 <th>رقم الهاتف</th>
                                                 <th>الجامعة</th>
                                                 <th width="135px">الصورة الشخصية</th>
                                          </tr>
                                          @foreach($application as $row)
                                          <tr>
                                              <td>{{ $row->fullname }}</td>
                                              <td>{{ $row->record }}</td>
                                              <td>{{ $row->email }}</td>
                                              <td>{{ $row->mobile }}</td> 
                                              <td>{{ $row->univirsty }}</td>
                                              <td>{{ url('public/strage/pic_person') }}{{ $row->pic_person }}</td>
                                              <td>عرض</td>
                                          </tr>
                                          @endforeach
                                          
                                          
                                          
                                          
                                   </thead>
                            </table>
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
                            url: '{{ route("department/getdata") }}' ,
                            data: function (d) {
                                   d._token = $('input[name=_token]').val();
                                   d.name = $('input[name=name]').val();
                            }
                     },
                     columns: [
                            {data: 'id', name: 'id'},
                            {data: 'shortname', name: 'shortname'},
                            {data: 'image', render: function(data){
                                          var items = data;
                                          var item = '{{  url("media/department/img/") }}';
                                          if(data && data != 'defulte.png'){
                                                 var image = '<img src="'+item+'/'+data+'"  height="50px">';
                                          }else{
                                                 var image = '';
                                          }
                                          return image;
                                   } , "searchable": false
                            },
                            {data: 'icon', render: function(data){
                                   var items = data;
                                   var item = '{{  url("media/department/icon/") }}';
                                   if(data && data != 'defulte.png'){
                                          var icon = '<img src="'+item+'/'+data+'"  height="50px">';
                                   }else{
                                          var icon = '';
                                   }
                                   return icon;
                                   } , "searchable": false
                            },
                            {data: 'banner', render: function(data){
                                   var items = data;
                                   var item = '{{  url("media/department/banner/") }}';
                                   if(data && data != 'defulte.png'){
                                          var banner = '<img src="'+item+'/'+data+'"  height="50px">';
                                   }else{
                                          var banner = '';
                                   }
                                   return banner;
                                   } , "searchable": false
                            },
                            {data: 'color', render: function(data){
                                   if(data && data != 'defulte.png'){
                                          var color = '<p style="background:'+data+';width: 20px;height: 20px;margin: 0;"></p>';
                                   }else{
                                          var color = '';
                                   }
                                   return color;
                                   } , "searchable": false
                            },
                            { data: null , render: function(data){
                                   var edit_button = data.edit_url;
                                   var delete_button = data.delete_url;
                                   var move = data.move;
                                   return edit_button + delete_button + move;
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
       });
</script>
<script>
       jQuery(document).ready( function ($){
              $("#myTablesw tbody").sortable({
                     containerSelector:'table',
                     itemPath:'> tbody',
                     itemSelector:'tr',
                     handle: '.icon-move',
                     stop: function(en , ui){
                            var item = $("#myTablesw tbody").sortable("toArray");
                            console.log(item);
                            $.ajaxSetup({
                                   headers: {
                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                   }
                            });
                            $.ajax({
                                   url: "{{ url('/') }}/department/resort_table",
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
              $('.select2_category').select2({
                     placeholder: "Select an option",
                     allowClear: true
              });
       </script>

@endsection




