@extends('admin.layouts.backend')



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



@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')

<li>

        <a href="{{url('/menus')}}">{{ trans('mainpage.rule_type_user') }}</a>

        <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>

    </li>

@endsection









@section('content')





<div class="row">

                            <div class="col-md-12">

                                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                                <div class="portlet light bordered">

                                    <div class="portlet-title">

                                        <div class="caption font-dark">

                                            <i class="icon-settings font-dark"></i>

                                            <span class="caption-subject bold uppercase">{{ trans('mainpage.rule_type_user') }}</span>

                                        </div>

                                        <div class="tools"> </div>

                                    </div>

                                    <div class="portlet-body">

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                                            <thead>

                                                <tr>

                                                    <th>{{ trans('mainpage.name') }} </th>

                                                    <th>{{ trans('mainpage.rule_type_namew') }}</th>

                                                    <th>{{ trans('mainpage.menu_lists3') }}  </th>

                                                    

                                                    

                                                </tr>

                                            </thead>

                                            <tbody>

                                              

                                               

                                              <tr>

                                              

                                                    <td>  </td>

                                                    <td>  </td>

                                                   

                                                    <td>  </td>

                                                    

                                                    

                                                

                                                </tr>

                                                 

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <!-- END EXAMPLE TABLE PORTLET-->

</div></div>





  <div class="modal fade" id="user_can_access" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #000">المستخدمين الحاصلين على الصلاحية</h4>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                     <tr>
                       <th>الغاء الصلاحية</th>
                       <th>المستخدم </th>
                    </tr>
                </thead>
                <tbody id="user_have_permision">
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')



 <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>



@endsection





@section('page_level_scripts_js')

 

  <script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>

@endsection





@section('scripts')  

<script type="text/javascript">



$(document).ready( function() {

 show_data();



});

  function show_data(){

    $('#sample_1').DataTable({

      

        destroy: true,

        processing: true,

      serverSide: true,

      //stateSave: true,

     "pageLength": 10,

      ajax: '{!! URL::asset("/adminpanel/roles_list_data") !!}',

      columns: [

           

            {data: 'name', name: 'name'},

            {data: 'slug', name: 'slug'},

            { data: 'edit', name: 'edit', orderable: false, searchable: false }

           

        ],initComplete: function () {  

            this.api().columns().every(function () {

                var column = this;

                var input = document.createElement("input");

                $(input).addClass("form-control");

                $(input).addClass("input-small");

                $(input).appendTo($(column.footer()).empty())

                .on('change', function () {

                    column.search($(this).val()).draw();

                });

            }); }

























    });

  }

//////////////////////////////////////////
function role_have(slug) {
  $('#user_can_access').modal('toggle');
  disply_role_have_per(slug);
}

function disply_role_have_per(slug) {
  var add_url='{!! URL::asset("/adminpanel/roles/role_has_permission/'+slug +'") !!}';
  $.get( add_url ).done(function(data) {
    $("#user_have_permision").empty();
    for (i=0 ; i<data.length ; i++) {
      var user_data = data[i].split("-");
      $("#user_have_permision").append('<tr><td> <i class="fa fa-times item_delete" aria-hidden="true" onclick="per_op('+user_data[0]+',\''+slug+'\')"></i> </td>  <td><a href="{!! URL::asset("/adminpanel/user_view/'+user_data[0] +'") !!}" target="_blank">'+user_data[1]+'</a></td> </tr>');
    }
  });
}
////////////////////////////////////إزالة الصلاحية من المستخدم ///////////////////////////////////
function per_op (user_id,slug){
  var add_url='{!! URL::asset("/adminpanel/roles/remove_role_has_permission/'+user_id +'/'+slug+'")  !!}';
  $.get( add_url ) .done(function( data ) {
    disply_role_have_per(slug);
  });
}

</script>

@endsection                  



