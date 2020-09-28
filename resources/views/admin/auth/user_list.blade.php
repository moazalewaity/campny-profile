@extends('admin.layouts.backend')

@section('title','عرض المستخدمين')

@section('page_level_plugins_styles')

<link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

@endsection



@section('page_global_styles')

@endsection



@section('page_level_styles')

@endsection



@section('theme_layout_styles')

@endsection



@section('style')

<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">

<style type="text/css">



div#sample_1_length.dataTables_length{

  float: right;

}

            .loading>i {
                display: none !important;
            }
            .loading.active>span {
                display: none !important;
            }
            .loading.active>i {
                display: inline-block !important;
            }
table td:last-child{
  text-align: center;
}
table td:last-child span{
  display: inline-block;
  width: 100%;
  text-align: center;
}
table td:last-child img{
  display: inline-block;
  width: 85px;
  height: 85px;
  border-radius: 50% !important;
  margin-bottom: 5px;
}

</style>



@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid  page-sidebar-closed ' )

@section('page_bar')

<li>

  <a href="{{url('/' , $list_url)}}">عرض المستخدمين</a>

  <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>

</li>

@endsection









@section('content')





<div class="row">

  <div class="col-md-12">

    <!-- BEGIN EXAMPLE TABLE PORTLET-->

    <div class="portlet light bordered">

     <div class="portlet-title">

      <div class="caption">

        <i class="icon-settings font-dark"></i>

        <span class="caption-subject font-dark sbold uppercase">{{ $list_title }}</span>

      </div>

    </div>

    <div class="portlet-body">

     <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">           
      <thead>
        <tr class="heading">
          <th width="150px">{{ trans('mainpage.user_username') }}</th>
          <th width="30%">{{ trans('mainpage.user_fullname') }}</th>
          <th width="100px">الصلاحية</th>
          <th width="50px">الحالة</th>
          <th width="50px">{{ trans('mainpage.edit') }}</th>
          <th width="50px">الصورة</th>
        </tr> 
        <tr class="filter">
          <td class="select-filter"></td>
          <td class="select-filter"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>

</div>

<!-- END EXAMPLE TABLE PORTLET-->

</div></div>







@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')



<script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>

<script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

<script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

       <script src="{{url('/')}}/admin/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>


@endsection





@section('page_level_scripts_js')



<script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>



@endsection







@section('scripts')  

<script type="text/javascript">

  $(document).ready( function() {

   show_data();

   $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");



 });









  function show_data(){
    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      //stateSave: true,
      "pageLength": 10,
      ajax: '{{ url("/adminpanel/user", $list_data_url."_data") }}',
      columns: [
        {data: 'username', name: 'username', orderable: false, searchable: true},
        {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
        {data: 'role_name', name: 'role_name', orderable: false, searchable: true},
        {data: 'statuss', name: 'statuss', orderable: false, searchable: true},
        { data: 'edit', name: 'edit', orderable: false, searchable: false },
        { data: 'personal_photos', name: 'personal_photos', orderable: false, searchable: false }

      ],initComplete: function () {
       this.api().columns([0, 1]).every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).addClass("form-control");
        $(input).addClass("input-small");
        $(input).appendTo($(column.header()).empty())
        .on('change', function () {
          column.search($(this).val()).draw();
        });
      }); 
     },
     "fnDrawCallback" : function(settings, json){
      $('.make-switch').bootstrapSwitch({
       onText: '<i class="fa fa-check" aria-hidden="true"></i>',
       offText: '<i class="fa fa-times" aria-hidden="true"></i>',
       onColor: 'success',
       offColor: 'warning',
       onSwitchChange: function (event, state) {
        $(this).val(state ? 'on' : 'off');
        var id = $(this).data('id');
        var value = $(this).val();
        var state = '0';
        if(value == 'on'){
         var state = '1';
       }
       $.ajax({
        url: "{{ url('/') }}/adminpanel/user/user_list/changestatus/" + id + "/"+state,
        type: "get",
        success: function (data) {
          if (data == "success") {
            // oTable.draw();
          }
        }
      });
     }
   });
    }
  });

  }

  function user_image( obj , user){
    jQuery(obj).addClass('active');
    var url = "{{ url('/adminpanel/user/user_image') }}/"+user;
    $.get(url , function(data){
      jQuery('#'+user).html(data);
      jQuery('.loading').removeClass('active');
    });
  }
</script>



@endsection                  



