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

        <a href="{{url('/menus')}}">{{ trans('mainpage.menu_lists') }}</a>

        <i class="fa fa-angle-left"></i>

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

                                            <span class="caption-subject bold uppercase">Column Reordering</span>

                                        </div>

                                        <div class="tools"> </div>

                                    </div>

                                    <div class="portlet-body">

                                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                                            <thead>

                                                <tr>

                                                    <th>{{ trans('mainpage.menu_lists1') }}</th>

                                                    <th>{{ trans('mainpage.menu_lists2') }}</th>

                                                    <th>{{ trans('mainpage.menu_lists3') }}</th>

                                                   

                                                    

                                                </tr>



                                                <tr>

                                                    <th>{{ trans('mainpage.menu_lists1') }} </th>

                                                    <th>{{ trans('mainpage.menu_lists2') }}</th>

                                                    <th>  </th>

                                                   

                                                    

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



@endsection





@section('page_level_scripts_js')

 

  <script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>

@endsection







@section('scripts')  



<script type="text/javascript" >

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

      ajax: '{!! URL::asset("/adminpanel/menu_list") !!}',

      columns : [

        { data: 'title', name: 'title', orderable: false, searchable: true },

        { data: 'father_menu', name: 'father_menu' , orderable: false, searchable: true },

        { data: 'edit', name: 'edit', orderable: false, searchable: false },

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





          }



    });

  }

</script>

@endsection                  



