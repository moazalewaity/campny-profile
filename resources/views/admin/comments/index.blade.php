@extends('admin.layouts.backend')
@section('title','قائمة التعليقات / التواصل')
@section('page_level_plugins_styles')
   <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" /> 

 <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

          <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
      

  
@endsection

@section('page_global_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('page_level_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('theme_layout_styles')
@endsection
@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">


<link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5"  media="screen">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" href="{{url('/')}}/css/style.css">



 


<style type="text/css">



@media (min-width: 768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto;
  }
 
}

@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}


@media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}


    .fancybox-custom .fancybox-skin {
      box-shadow: 0 0 50px #222;
    }

.modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #0480be;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
   
  

  
</style>
@endsection
@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')

@section('page_bar')
<li>
        <a href="#">قائمة التعليقات / التواصل</a>
        <i class="fa fa-angle-left"></i>
    </li>

@endsection


@section('content')
    <style type="text/css">
        .color-view{
            margin: 4px 0 7px;
        }
    </style>


    


 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">
 

      <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="5%">الحالة</th>                 
                    <th width="15%">الموضوع</th>
                    <th width="15%">العنوان</th>
                    <th width="25%">النص</th>
                    <th width="15%">المرسل</th>
                    <th width="10%">التاريخ</th>
                    <th width="10%">التحكم</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
 </div></div></div>


<form id="form_trash_comments" name="form_trash_comments" method="post" style="display:none">
<input type="hidden" name="token" value="{!! csrf_token() !!}" >
<input type="hidden" name="_method" id="_method" value="DELETE" >
<input type="hidden" name="trashID" id="trashID" value="" >
<input type="submit" value="delete " >
</form>

<meta name="_token" content="{!! csrf_token() !!}" />

@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

<script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>


 <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>


@endsection


@section('page_level_scripts_js')
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
      <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

    <script src="{{url('/')}}/admin/assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
       <script src="{{url('/')}}/admin/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>

  @endsection

@section('theme_layout_scripts_js')
@endsection

 



@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>


<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


<script type="text/javascript">

    var delete_url = '{!! URL::asset("/adminpanel/comments/delete_by_name_courtvw/") !!}'+'/';
  var show_url = '{!! URL::asset("/adminpanel/comments/show_image/") !!}'+'/';
  var thumbnail_url='{!! URL::asset("/adminpanel/comments/show_thumb/") !!}'+'/';
  var download_url='{!! URL::asset("/adminpanel/comments/show_image/") !!}'+'/';
  var delete_url_2 ='{!! URL::asset("/adminpanel/comments/delete_by_name_courtvw/") !!}'+'/';
  var my_data =6;
var table;
function show_data(){
    return $('#sample_1').DataTable({
      destroy: true,
	  //order: [ [1, 'desc'], [5, 'desc']],
	  targets: 'no-sort',
      orderable: false,
	  order: [ ],
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/adminpanel/comments/data") !!}',
            "data": function ( d ) {
            d.name=$('#search').find('#name').val();
            /*d.port=$('#search').find('#port').val();
            d.datefrom=$('#search').find('#datefrom').val();
			d.dateto=$('#search').find('#dateto').val();
			d.reg20=$('#search').find('#reg20').val();
			d.hq40=$('#search').find('#hq40').val();*/
			
             }
           },
	"columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ],
       columns: [
           
               {data: 'id', name: 'id'},
               {data: 'statuss', name: 'statuss'},              	   
			   {data: 'postid', name: 'postid'},
               {data: 'title', name: 'title'},
			   {data: 'comment', name: 'comment'},
			   {data: 'name', name: 'name'},
			   {data: 'recorddate', name: 'recorddate'},
			   {data: 'control', name: 'control'},
			   
        ],
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
                                            url: "{{ url('/adminpanel/comments/changestatus') }}/" + id + "/"+state,
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


//////////////////////////////////////////////

//------------------------------------------------------------------------------
function trashComments(id)
{
                swal.queue([{
                    title: "{{ trans('mainpage.delete_m1') }}",
                    text: "{{ trans('mainpage.delete_m2') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ trans('mainpage.delete_m3') }}",
                    cancelButtonText: "{{ trans('mainpage.delete_m4') }}",
                    showLoaderOnConfirm: false,
                    reverseButtons:true,
                    preConfirm: function (value) {
                        return new Promise(function (resolve) {
                            if(value){
                               jQuery("#form_trash_comments").find("#trashID").val(id);	
								jQuery("#form_trash_comments").find("#_method").val('DELETE');	
								jQuery("#form_trash_comments").submit();
                            }
                            resolve();
                        })
                    }
                }]);           	
}


//------------------------------------------------------------------------------

//--------------------



//-----------------------------------------------------------------

//////////////////////////////////////////////////////////////////////////////////
$(document).ready(function (e) {
    
    //==========================================
	table = show_data();   
   $("#search").on('submit', function(e) {
        e.preventDefault();
		 table = show_data();
	});
//----------------	
$(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
//------------------	
	$('#sample_1 tbody').on( 'click', 'a.btn-danger', function () {
		if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
	});
	//--------------------------------------------------------------------
	
	$("#form_trash_comments").validator().on('submit', function(e) {
	
		if (e.isDefaultPrevented()) {
		
		} else {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
		
		 e.preventDefault(); 
		
		 $.ajax({
			  url:" {!! URL::asset('/adminpanel/comments/') !!}/"+$('#trashID').val(),
			  data:new FormData($("#form_trash_comments")[0]),
			  dataType:'json',
			  async:false,
			  type:'POST',
			  processData: false,
			  contentType: false,
			  success:function(e) { 
			  	table.row('.selected').remove().draw( false );	
				alert(e['response']);
					
			  }
		 })
		}
	});
	
	//-------------------------------------
});
///////////////////////////////////////////////////////////////////////////////



</script>
@endsection
