<?php

namespace App\Http\Controllers\alerts;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use \Carbon\Carbon ;
use Sentinel;
use Image;
use File;
use App\Classes\easyphpthumbnail;
use PDO;

class AlertsController extends Controller{


  public function new_alerts_view( ){
  	return view('admin.alerts.alerts_operations');
  	}
//////////////////////////////////////////////////////
  public function new_alert_data(Request $request){
  	$content=$request->content;
  	$type=$request->type;
  	$placment=$request->placment;
    $closable=$request->closable;
    $close_all_alret=$request->close_all_alret;
    $close_in_second=$request->close_in_second;
  	$font_awsome=$request->font_awsome;
  	$new_alert=DB::insert("insert into alert_messages (type ,content , placment , closable ,close_all_alret,close_in_second , font_awsome) values (? , ? , ? , ? , ? , ? , ? )",[$type,$content,$placment,$closable,$close_all_alret,$close_in_second,$font_awsome]);
  	if($new_alert){
  		 $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;

  	}
  	else {
  		 $return=["result"=>"error","response"=>"حدث خطأ فى عملية الاضافة"];
       return  $return;

  	}
  }
//////////////////////////////////////////////
  public function show_alert_view(){
    return view('admin.alerts.show_alert_view');

  }
  
  public function show_alert_data(){
    $alerts=DB::table("alert_messages")->select('id','type','content','placment','closable','close_all_alret','close_in_second','font_awsome');



      return  Datatables::of($alerts->get()) 

        ->addColumn('closable_data', function ($alert) {
       if($alert->closable){
        return  "قابلة للإغلاق";
       }
       else {
        return  "غير قابلة للإغلاق";
       }
        })


         ->addColumn('close_all_alret', function ($alert) {
       if($alert->closable){
        return  "إغلاق كل ال alert";
       }
       else {
        return  "جميع الاستعلامات بافقية";
       }

        })


           ->addColumn('opration', function ($alert) {
           
           return '<a class="btn btn-warning" onclick="edit('.$alert->id.')" ><i class="fa fa-edit"></i></a>';

        })

       
      
       ->make(true);                                             


  }

///////////////////////////////////////////////////////////////////
  public function alert_data($id){
    $data=DB::table('alert_messages')->select('id','type','content','placment','closable','close_all_alret','close_in_second','font_awsome')->where('id','=',$id)->get();
    return $data;
  }
////////////////////////////////////////////////
  public function edit_alert($id,Request $request){
    $content=$request->content;
    $type=$request->type;
    $placment=$request->placment;
    $closable=$request->closable;
    $close_all_alret=$request->close_all_alret;
    $close_in_second=$request->close_in_second;
    $font_awsome=$request->font_awsome;

    $update_data=DB::update("update alert_messages set content=? , type=? ,placment=? , closable=? , close_all_alret=? , close_in_second=? , font_awsome=?  where id=?  ",[$content,$type,$placment,$closable,$close_all_alret,$close_in_second,$font_awsome,$id]);
    if($update_data){
       $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

    }
    else {
       $return=["result"=>"error","response"=>"حدث خطأ فى عملية التعديل"];
       return  $return;
    }


  }
  ////////////////////////////////////////////////////////
}



