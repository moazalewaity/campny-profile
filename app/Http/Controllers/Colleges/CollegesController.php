<?php

namespace App\Http\Controllers\Colleges;
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


class CollegesController extends Controller{

	
  

   public function __construct()
    {
         parent::__construct();

          

    } 
    
 public function index(){
	 $countries=DB::select("select id, ar_name from country where 1=1 order by ar_name ASC");
	 $html_content=array(
	 	'add_new'=>$this->checkAccess('colleges.insert','#','add-new',"open_modal('colleges_modal','0')","إضافة كلية")

	 );
   	
	 return view('admin.colleges.index',compact('html_content','countries'));

  }//end viewall function 

 
  
/////////////////////////////////////////////////////////////  
  public function index_data(Request  $request){
	 $name=$this->filterText($request->name);
	$country=intval($request->country);
	$university=intval($request->university);
	
	
  	$user_name=Sentinel::getUser()->username;
 	$colleges=DB::table("colleges")->select("id", "name", "countryid", "universityid");
	
	
	

  	if (!empty($name) ){
    	$colleges->whereRaw($this->filterTextDB("name")." like ?", ["%{$name}%"]);
  	}
	
	if ($country>0 ){
    	$colleges->whereRaw("countryid = ?", ["$country"]);
  	}
	
	if ($university>0 ){
    	$colleges->whereRaw("universityid = ?", ["$university"]);
  	}

	$colleges->whereRaw("status<>?",['999']);
	$colleges->orderBy("name",'asc');
	//echo $orders->toSql();
	//exit;
    return  Datatables::of($colleges) 
       ->addColumn('control', function ($data) {
       	

    	   	return $this->checkAccess('colleges.update','#','fa fa-edit','editColleges('.$data->id.')').$this->checkAccess('colleges.delete','#','fa fa-trash','trashColleges('.$data->id.')'); 

	   })	
	    ->addColumn('countrytxt', function ($data) {       		
			 $countries=DB::select("select id, ar_name from country where id=? order by ar_name ASC",[$data->countryid]);
    	   	return (isset($countries[0]))?$countries[0]->ar_name:''; 

	   }) 
	    ->addColumn('universitytxt', function ($data) {       		
			 $universities=DB::select("select id, name from universities where id=? order by name ASC",[$data->universityid]);
    	   	return (isset($universities[0]))?$universities[0]->name:''; 

	   })     	  
       ->make(true);                                                

	}//end viewall_data function 
//////////////////////////////////////////////////////	
	public function validateRequest( $request)
	{		
		
		$data=array();
		$data['id'] = intval($request->id); 
    	$data['name'] = $request->name;  
		$data['country'] = intval($request->country); 
		$data['university'] = intval($request->university);    	
    	
    	//$data['current'] = Carbon::now();
   		//$data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $data['current']);
		return $data;
	}
	/////////////////////////////////////////////////////////////
	public function insert(Request $request){
     
 		$data=$this->validateRequest($request);
		if(true){
			$serial=DB::insert("INSERT INTO colleges (name, countryid, universityid, create_at, update_at, status) VALUES (?,?,?, Now(), Now(), 1)",
		  [$data['name'],$data['country'],$data['university']]);
			
             $last_id=DB::select("SELECT max(id) lastid FROM colleges WHERE 1=1"); 
             $l_id= $last_id[0]->lastid;
		}
			
		
		$return=["result"=>"ok","response"=>"تمت الاضافة بنجاح","id"=>"$l_id"];
  		return  $return;
	}
	
	public function update(Request $request){
     
 		$data=$this->validateRequest($request);
		if(true){			
				$serial=DB::update("UPDATE colleges SET name=?, countryid=?, universityid=?, update_at=Now()  WHERE id=?",
		  [$data['name'], $data['country'], $data['university'], $data['id']]);
			 $l_id= $data['id'];
				
		}			
		
		$return=["result"=>"ok","response"=>"تم التعديل بنجاح","id"=>"$l_id"];
  		return  $return;
	}
	//////////////////////////////////////////////////////////////
	
	////////////////////////////////////////////////////////////////////////////
	public function delete($id)
	{		
		 $serial=DB::update("UPDATE colleges SET status=999 WHERE id=?",[$id]);
		 $return=["result"=>"ok","response"=>"تم الحذف بنجاح","id"=>"$id"];
  		 return  $return;
	}

/////////////////////////////////////////////////////////
	public function view($id){
		$specialization=DB::table("colleges")->select("id", "name", "countryid", "universityid")->where('id','=',$id)->get();
		return $specialization;
	}
////////////////////////////////////////////////////////	
}