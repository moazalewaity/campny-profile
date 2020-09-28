<?php

namespace App\Http\Controllers\Comments;
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
use Notification;


class CommentsController extends Controller{

	
  

   public function __construct()
    {
         parent::__construct();

          

    } 
    
 public function index(){
	 /*$html_content=array(
	 	'add_new'=>$this->checkAccess('comments.insert','#','add-new',"open_modal('comments_modal','0')","إضافة تعليق")

	 );*/
   	
	 return view('admin.comments.index');//,compact('html_content')

  }//end viewall function 

 
  
/////////////////////////////////////////////////////////////  
  public function index_data(Request  $request){
	 //$name=$this->filterText($request->name);
	
	
	
  	$user_name=Sentinel::getUser()->username;
 	$comments=DB::table("post_comments")->select("id", "postid", "status", "title", DB::raw("CONCAT('الاسم:',name, '<br>الايميل:',email, '<br>الدولة:',country) name"), "email", "country", "comment", "website", "ipaddress", "userid", DB::raw("DATE_FORMAT(recorddate, '%Y-%m-%d') recorddate"));
	
	
	

  	/*if (!empty($name) ){
    	$comments->whereRaw($this->filterTextDB("name")." like ?", ["%{$name}%"]);
  	}*/

	$comments->whereRaw("status<>?",['999']);
	//$comments->orderBy("name",'asc');
	//echo $orders->toSql();
	//exit;
    return  Datatables::of($comments) 
       ->addColumn('statuss', function($row){
                $checked = ' ';
                if($row->status == 1){
                  $checked = 'checked';
                }
                
                $item = $this->checkAccess('comments.status',$row->id,'fa fa-switch',$row->status);
                if($item != null){
                    $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
                }else{
                    $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
                }

                return $p;
            })   	
	    ->addColumn('postid', function($row){
                if($row->postid==0) return 'اتصل بنا';
				$langs_site = $this->getiduser()->cplanguage;
				$post=DB::select("select title from post_lang where postid=? and langid=?",[$row->postid,$langs_site]);
                if(isset($post[0])) return '<a>'.$post[0]->title.'</a>';
				return 'غير معروف';
            })   
		->addColumn('control', function ($data) {
       	

    	   	return $this->checkAccess('comments.delete','#','fa fa-trash','trashComments('.$data->id.')'); 

	   })	 	  
       ->make(true);                                                

	}//end viewall_data function 
	
	////////////////////////////////////////////////////////////////////////////
	public function delete($id)
	{		
		 $serial=DB::update("UPDATE post_comments SET status=999 WHERE id=?",[$id]);
		 $return=["result"=>"ok","response"=>"تم الحذف بنجاح","id"=>"$id"];
  		 return  $return;
	}
	/////////////////////////////////////////////////////////
	public function changestatus($id , $state){
        $serial=DB::update("UPDATE post_comments SET status=? WHERE id=?",[$state,$id]);
        return response()->json('success' , 200);
    }

/////////////////////////////////////////////////////////
	public function view($id){
		$comment=DB::table("post_comments")->select("id", "postid", "status", "title", "name", "email", "country", "comment", "website", "ipaddress", "userid", DB::raw("DATE_FORMAT(recorddate, '%Y-%m-%d') recorddate"))->where('id','=',$id)->get();
		return $comment;
	}
////////////////////////////////////////////////////////	
}