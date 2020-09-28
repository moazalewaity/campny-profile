@extends('admin.layouts.backend')

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
                            <span class="caption-subject bold uppercase"> استعلام</span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <form method="POST" id="search_form" class="form-inline" role="form">
                            <div class="form-group">
                                   <label for="name">العنوان</label>
                                   <input class="form-control" name="name" id="name" placeholder="العنوان" type="text">
                                   {{ csrf_field() }}
                            </div>
                            <div class="form-group">
                                   <label for="department">القائمة</label>
                                   <input class="form-control" name="department" id="department" placeholder="القائمة" type="text">
                            </div>
                            <button type="submit" class="btn btn-primary">بحث</button>
                     </form>
              </div>
       </div>
       <div class="portlet light bordered">
              <div class="portlet-title">
                     <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> عرض المواضيع</span>
                     </div>
              </div>
              <div class="portlet-body form">
                     <div class="table-responsive">
                            <table class="table table-bordered datatable" id="myTablesw">
                                   <thead>
                                          <tr>
                                                 <th>
                                                        #
                                                 </th>
                                                 <th>عنوان الموضوع</th>
                                                 <th>اسم القائمة</th>
                                                 <th>صورة</th>
                                                 <th>المستخدم</th>
                                                 <th width="135px">الاعدادات</th>
                                          </tr>
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
       <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
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
                            url: '{{ route("post/getdata") }}' ,
                            data: function (d) {
                                   d._token = $('input[name=_token]').val();
                                   d.name = $('input[name=name]').val();
                                   d.department = $('input[name=department]').val();
                            }
                     },
                     columns: [
                            {data: 'id', name: 'id'},
                            {data: 'title', name: 'title'},
                            {data: 'deptitle', name: 'deptitle'},
                            {data: 'image', render: function(data){
                                          var items = data;
                                          var item = '{{  url("Gallary/") }}';
                                          if(data && data != 'defulte.png'){
                                                 var image = '<img src="'+item+'/'+data+'" width="50px" height="50px">';
                                          }else{
                                                 var image = '';
                                          }
                                          return image;
                                   } , "searchable": false
                            },
                            {data: 'username', name:'username' , "searchable": false},
                            { data: null , render: function(data){
                                   var move = '<span class="icon-move"><i class="fa fa-arrows"></i></span>';
                                   var edit_button = '<a href="' + data.edit_url + '" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>';
                                   var delete_button = '<a href="' + data.delete_url + '" class="btn btn-danger delete" role="button" aria-pressed="true"><i class="fa fa-trash"></i></a>';
                                   return edit_button + delete_button + move;
                                   }, "searchable": false
                            }
                     ]
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
                                          url: "{{ url('/') }}/adminpanel/post/resort_table",
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




