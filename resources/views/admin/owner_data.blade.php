 <div class="modal fade" id="owner_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " >


 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">
   <img src="http://10.12.161.6:82/pla/public/admin/assets/global/img/loading5.gif" style="display:none;height:25px;float:left"  id="loading1" >

  <div class="form-group col-sm-2" >
     
      <span class="col-sm-8 control-label" for="current_flag" style="font-weight:bold">اخفاء الملغى</span>
      <div class="  col-sm-4 ">
      <input type="checkbox"  name="current_flag" id="current_flag"  checked="checked" >
     </div> 
    </div>
   </div> 
 <div class=" col-md-12" >
  <div class="form-group col-sm-2" >
  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="الاسم"  >
  </div>

    <div class="form-group col-sm-2" >
     <input type="text" class="form-control" name="father_name" id="father_name" placeholder="الاب" >
     </div>

    <div class="form-group col-sm-2" >
      <input type="text" class="form-control" name="grand_name" id="grand_name" placeholder="الجد"  >
    </div>

    <div class="form-group col-sm-2" >
      <input type="text" class="form-control" name="family_name" id="family_name" placeholder="العائلة"  >
    </div>
<div class="form-group col-sm-2" >
    <button type="button" class="btn green" style="float:left" onclick="owner_data_info()"> <i class="fa fa-search"></i> بحث </button>
</div>
 
 </div>

 



</div></div>

                      <div class="portlet-title">
                                    <div class="caption">
                                       
                                    </div>
                                  
                                </div>
                               
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                          <thead>
                                            <th>الاسم الأول</th>
                                            <th>اسم الاب</th>
                                            <th>اسم الجد</th>
                                            <th>اسم العائلة</th>
                                            <th>رقم الهوية</th>
                                            <th>قطعة</th>
                                            <th>قسيمة</th>
                                            <th>رقم العقد</th>
                                            <th>تاريخ العقد</th>
                                            <th>المساحة بالمتر</th>
                                            <th>نوع الملك</th>
                                            <th>الحالة</th>


                                          </thead>
                                            
                                             <tbody id="owner_data_info">
                                                
                                              
                                               
                                                
                                            </tbody>
                                        </table>
                                    </div>
   
    
                                        </div>
                        <div class="modal-footer">
                          
                           
                        </div>
                    </div>
                </div>
            </div>




<script type="text/javascript">
 
function owner_data(first_name , father_name , grand_name , family_name) {
$('#owner_data').modal('toggle');
$("#first_name").val(first_name);
$("#father_name").val(father_name);
$("#grand_name").val(grand_name);
$("#family_name").val(family_name);
dispaly_owner(first_name , father_name , grand_name , family_name,1);
}    
  
///////////////////////////////////////قطع وقسائم المالك المؤشر عليه/////////////////

function dispaly_owner(first_name , father_name , grand_name , family_name ,current_flag){
  $("#loading1").show();
  var url1='{!! URL::asset("/tabo/owner_data") !!}';

    $.get(url1,{"first_name": first_name , "father_name": father_name , "grand_name": grand_name  , "family_name": family_name ,"current_flag":current_flag}, function (e) {
      $("#loading1").hide();
   $('#owner_data_info').empty();

      $.each(e, function(k, v) {
   $('#owner_data_info').append('<tr><td>'+v['first_name']+'</td> <td>'+v['father_name']+'</td> <td>'+v['grand_name']+'</td> <td>'+v['family_name']+'</td> <td>'+v['doc_no']+'</td> <td>'+v['piece_num']+'</td> <td>'+v['part_num']+'</td> <td>'+v['contract_num']+'</td> <td>'+v['registration_date']+'</td> <td>'+v['owner_area']+'</td><td>'+v['owner_type_name']+'</td><td>'+v['status']+'</td> </tr>');
    }); 



    });
}

///////////////////////////////////////////////////////////////
 function owner_data_info(){
  var first_name=$('#first_name').val();

  var father_name= $('#father_name').val();
  var grand_name =$('#grand_name').val();
  var family_name=$('#family_name').val();
      if($("#current_flag").prop('checked')){
 var current_flag = 1;
        }else {
var current_flag = 0;
        }
       
dispaly_owner(first_name , father_name , grand_name , family_name ,current_flag);

}

///////////////////////////////////الحقوق والمحظورات//////////////////////////////////
</script>
