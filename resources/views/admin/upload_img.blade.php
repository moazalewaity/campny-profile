 <div class="modal fade" id="upload_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " >

   
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user"></i>
                                        <span class="caption-subject font-dark bold uppercase" id="cont_name1"></span>
                                    </div>
                                  
                                </div>
                               
                                    <div class="table-scrollable" id="upload_info">

                                       
                                    </div>

                                     <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" data-toggle="validator"   id="upload_file">
       <div  class="col-sm-12 form-group">
        
           <div class="col-sm-12">
          <div class="dropzone dropzone-previews"  id="my-awesome-dropzone">
            
          </div>
      </div>
      </div>
      </form>
      </div>
                              
                            
                            <br><br> <br><br> <br><br> <br><br>
   
    
   
 <div  class="col-sm-12">


 


<p id="attache">
   

  
  </p>


  

 
</div>
                                                

                  
                       
                        </div>
                        <div class="modal-footer">
                        <!--<div  class="col-sm-12">
                         <a  class="btn btn-danger" onclick="delete_all_attach()" ><i class="fa fa-trash"></i> حذف الكل</a> 
                         </div>-->
                          <div  class="col-sm-6">
                         <label>تحديد الكل</label>
                         <input type="checkbox" name="checkAll" id="checkAll" />
                         </div>

                         <div  class="col-sm-6">
                         <a  class="btn btn-danger" onclick="delete_selected_attach()" ><i class="fa fa-trash"></i> حذف التحديد</a> 
                         </div>
                           
                        </div>
                    </div>
                </div>
            </div>



<script type="text/javascript">
  function displatAttach(e)
  {
$.each(e, function(k, v) {
//alert(v['imgext']);
      if(v['imgext']=='JPG' || v['imgext']=='PNG'  || v['imgext']=='GIF' || v['imgext']=='jpg' || v['imgext']=='png' || v['imgext']=='gif'  ){
<?php $user_test=Sentinel::getUser();//$user_test->id!='1'
if(false){  ?>
         $('#attache').append(' <div class="color-demo tooltips col-md-3"><div class="color-view bg-white bg-font-white bold uppercase"><a  style="margin:10px" class="fancybox-buttons" data-fancybox-group="image" href="'+show_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'" > <img  style="padding:10px;width:100px;height:100px;" src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'" alt=""></a></div><div class="color-info bg-white c-font-14 sbold"> <a class="btn btn-block btn-danger" onclick="delete_attach(\''+v['imgname']+'\')"><i class="fa fa-trash"></i> حذف </a> <input type="checkbox" value="'+v['imgname']+'" name="del_imag[]" class="del_imag[]"> </div></div>');
<?php }else{?>
		  $('#attache').append('<div class="mt-element-overlay col-sm-6 col-md-3">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
													'<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'); width:100%; height:200px"></div>'+
                                                    '<div class="mt-overlay">'+
                                                       '<h2>تحديد <input type="checkbox" value="'+v['imgname']+'" name="del_imag[]" class="del_imag[]"></h2>'+
													    '<ul class="mt-info">'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline fancybox-buttons" data-fancybox-group="image" href="'+show_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                                                                    '<i class="icon-magnifier"></i>'+
                                                                '</a>'+
                                                            '</li>'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="javascript:delete_attach(\''+v['imgname']+'\');">'+
                                                                    '<i class="icon-trash"></i>'+
                                                                '</a>'+
                                                            '</li>'+															
                                                        '</ul>'+
														
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>');
									<?php }?>

       } else {

          var val;


 switch (v['imgext']) {
    case 'doc': val='{!!URL::asset("/icon/DOC.png")!!}';break;
    case 'docx': val='{!!URL::asset("/icon/DOCX.png")!!}';break;
    case 'pdf': val='{!!URL::asset("/icon/PDF.png")!!}';break;
    case 'dwg': val='{!!URL::asset("/icon/DWG.png")!!}';break;
     case 'jpeg': val='{!!URL::asset("/icon/JPEG.png")!!}';break;
    default: val='{!!URL::asset("/")!!}icon/'+v['imgext'].toUpperCase()+'.png';
   }

<?php $user_test=Sentinel::getUser();//$user_test->id!='1'
if(false){  ?>
         $('#attache').append(' <div class="color-demo tooltips col-md-3"><div class="color-view bg-white bg-font-white bold uppercase"><a  style="margin:10px" class="" data-fancybox-group="image" href="'+download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'" > <img  style="padding:10px;width:100px;height:100px;" src="'+val+'" alt=""></a></div><div class="color-info bg-white c-font-14 sbold"> <a class="btn btn-block btn-danger"  onclick="delete_attach(\''+v['imgname']+'\')"><i class="fa fa-trash"></i> حذف </a> <input type="checkbox" value="'+v['imgname']+'" name="del_imag[]" class="del_imag[]"> </div></div>')
<?php }else{?>
$('#attache').append('<div class="mt-element-overlay col-sm-6 col-md-3">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
													'<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+val+'); width:100%; height:200px"></div>'+
                                                    '<div class="mt-overlay">'+
                                                       '<h2>تحديد <input type="checkbox" value="'+v['imgname']+'" name="del_imag[]" class="del_imag[]"></h2>'+
													    '<ul class="mt-info">'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="'+download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                                                                    '<i class="fa fa-download"></i>'+
                                                                '</a>'+
                                                            '</li>'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="javascript:delete_attach(\''+v['imgname']+'\');">'+
                                                                    '<i class="icon-trash"></i>'+
                                                                '</a>'+
                                                            '</li>'+															
                                                        '</ul>'+
														
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>');
									<?php }?>
       }
});
  }
  //-------------------------------------------------------------
  function delete_selected_attach(){
var where_to= confirm('هل انت متاكد انك تريد حذف الصور؟');
	if (where_to== true)
	{			
		
var checked = []
$("input[name='del_imag[]']:checked").each(function ()
{



   var url=delete_url+$(this).val();

   $.get(url, function (data) { 

 
 switch (my_data) {
    case 1:
        display_images(data['year'],data['file_num']);
        break;
    case 2:
          display_images(data['spe_id'],data['book_no']);
        break;
    case 3:
       
  display_images(data['id']);
    break;
    case 4 :
      display_images(data['sequare_no'],data['divider_no'],data['divider_id']);
      break;

    case 5 :
     display_images(data['app_year'],data['app_no']);
     break;  

     case 6 :
       display_images(data['order_id']);
       break;

        case 7 :
       display_images(data['app_id']);
       break;
}

 
   
   
});


});
	}
}

//////////////////////////////
function delete_attach(imgname){
   var where_to= confirm('هل انت متاكد انك تريد حذف الصورة؟');
	if (where_to== true)
	{			
		
   var url=delete_url_2+imgname;



   $.get(url, function (data) { 

 switch (my_data) {
    case 1:
        display_images(data['year'],data['file_num']);
        break;
    case 2:
          display_images(data['spe_id'],data['book_no']);
        break;
    case 3:

  display_images(data['id']);
    break;
    case 4 :
      display_images(data['sequare_no'],data['divider_no'],data['divider_id']);
      break;
       case 5 :
     display_images(data['app_year'],data['app_no']);
     break;  
      case 6 :
       display_images(data['order_id']);
       break;
        case 7 :
       display_images(data['app_id']);
       break;
      
}

   
   
   
});

	}
}

//////////////////////////
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
