   <div   >
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class=""></i>{{$main_title}}</div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
            
             @foreach ($datas as $data)
             <div>
               <label style="display: inline-block;">
               
               <input type="checkbox"  name="{{$mkey}}[]" class="icheck " 

                <?php
            $prog_num_selected=$data->id;

                 if( isset($list) ){  
                 if (in_array($prog_num_selected, $list)) {
                   echo "checked";
                        }
               
                  ?>  <?php } ?>
                 value="{{$data->id}}" data-checkbox="icheckbox_square-grey"> 
                {{$data->title}} 


               

               </label>
  
            </div>
              @endforeach          
                    
                </div>
            </div>
        </div>
               


          </div>