<?php

namespace App\Http\Controllers\Courses;
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


class CoursesController extends Controller{

	
  

   public function __construct()
    {
         parent::__construct();

          

    } 
    
 public function index(){
   	  $countries=DB::select("select id, ar_name from country where 1=1 order by ar_name ASC");
	 $html_content=array(
	 	'add_new'=>$this->checkAccess('courses.insert','#','add-new',"open_modal('courses_modal','0')","إضافة مقرر")

	 );
 
	
	 return view('admin.courses.index',compact('countries','html_content'));

  }//end viewall function 


/////////////////////////////////////////////////////////////  
  public function index_data(Request  $request){
	
	
    $name=$this->filterText($request->name);
	$sps=intval($request->sps);
	$country=intval($request->country);
	$university=intval($request->university);
	$college=intval($request->college);
	
  	$user_name=Sentinel::getUser()->username;
 	$courses=DB::table("courses")->select("id", "name","countryid","universityid","collegeid", "spsid", "summery","image");

  	if (!empty($name) ){
    	$courses->whereRaw($this->filterTextDB("name")." like ?", ["%{$port}%"]);
  	}
	
	if ($country>0 ){
    	$courses->whereRaw("countryid = ?", ["$country"]);
  	}
	
	if ($university>0 ){
    	$courses->whereRaw("universityid = ?", ["$university"]);
  	}
	
	if ($college>0 ){
    	$courses->whereRaw("collegeid = ?", ["$college"]);
  	}

	
	if ($sps>0 ){
    	$courses->whereRaw("spsid = ?", ["$sps"]);
  	}

	$courses->whereRaw("status=?",['1']);
	$courses->orderBy("name",'asc');
	//echo $orders->toSql();
	//exit;
    return  Datatables::of($courses) 
       ->addColumn('control', function ($data) {
       	

    	   	return $this->checkAccess('courses.update','#','fa fa-edit','editCourses('.$data->id.')').$this->checkAccess('courses.delete','#','fa fa-trash','trashCourses('.$data->id.')'); 

	   })
	   ->addColumn('countrytxt', function ($data) {       		
			 $countries=DB::select("select id, ar_name from country where id=? order by ar_name ASC",[$data->countryid]);
    	   	return (isset($countries[0]))?$countries[0]->ar_name:''; 

	   }) 
	   ->addColumn('universitytxt', function ($data) {       		
			 $universities=DB::select("select id, name from universities where id=? order by name ASC",[$data->universityid]);
    	   	return (isset($universities[0]))?$universities[0]->name:''; 

	   })
	   ->addColumn('collegetxt', function ($data) {       		
			 $colleges=DB::select("select id, name from colleges where id=? order by name ASC",[$data->collegeid]);
    	   	return (isset($colleges[0]))?$colleges[0]->name:''; 

	   })
	    ->addColumn('spstxt', function ($data) {
       		$specializations=DB::select("select id, name from specializations where id=? order by name ASC",[$data->spsid]);
			
    	   	return (isset($specializations[0]))?$specializations[0]->name:''; 

	   })  
	    ->addColumn('image', function ($data) {
       		
			if($data->image!='')
			{
				return '<div class="mt-element-overlay">'.
                                        '<div class="row">'.
                                            '<div class="col-md-12">'.
                                                '<div class="mt-overlay-1 mt-scroll-right">'.
                                                    '<img src="'.url('/adminpanel/').$data->image.'" id="courseimage" style="width:100%;height:auto" />'.
                                                    '<div class="mt-overlay">'.
                                                        '<ul class="mt-info">'.
                                                            '<li>'.
                                                                '<a class="btn default btn-outline fancybox-buttons" data-fancybox-group="image" href="'.url('/adminpanel/').$data->image.'">'.
                                                                    '<i class="icon-magnifier"></i>'.
                                                                '</a>'.
                                                            '</li>'.                                                            
                                                        '</ul>'.
                                                    '</div>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';
			}
    	   	return ''; 

	   })  	  
       ->make(true);                                                

	}//end viewall_data function 
//////////////////////////////////////////////////////	
	public function validateRequest( $request)
	{		
		
		$data=array();
		$data['id'] = intval($request->id); 
    	$data['name'] = $request->name;    	
    	$data['summery']  = $request->summery;
		$data['country'] = intval($request->country); 
		$data['university'] = intval($request->university);   	
    	$data['college'] = intval($request->college);    	
    	$data['sps'] = intval($request->sps);
		
		
    	//$data['current'] = Carbon::now();
   		//$data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $data['current']);
		return $data;
	}
	/////////////////////////////////////////////////////////////
	public function insert(Request $request){
     
 		$data=$this->validateRequest($request);
		if(true){
			$serial=DB::insert("INSERT INTO courses (name, summery,countryid,universityid,collegeid, spsid, create_at, update_at, status) VALUES (?, ?, ?, ?, ?, ?, Now(), Now(), 1)",
		  [$data['name'], $data['summery'],$data['country'],$data['university'],$data['college'], $data['sps']]);
			
             $last_id=DB::select("SELECT max(id) lastid FROM courses WHERE 1=1"); 
             $l_id= $last_id[0]->lastid;
			 $this->uploadFile($request,$l_id);
		}
			
		
		$return=["result"=>"ok","response"=>"تمت الاضافة بنجاح","id"=>"$l_id"];
  		return  $return;
	}
	
	public function update(Request $request){
     
 		$data=$this->validateRequest($request);
		if(true){			
				$serial=DB::update("UPDATE courses SET name=?, summery=?, countryid=?, universityid=?, collegeid=?, spsid=?, update_at=Now()  WHERE id=?",
		  [$data['name'], $data['summery'],$data['country'],$data['university'],$data['college'], $data['sps'], $data['id']]);
			 $l_id= $data['id'];
			 $this->uploadFile($request,$l_id);
				
		}			
		
		$return=["result"=>"ok","response"=>"تم التعديل بنجاح","id"=>"$l_id"];
  		return  $return;
	}
	//////////////////////////////////////////////////////////////
	public function download_image($year,$month,$file){
        
    	return $this->downloadFile($this->CoursesUploadPath.$year."/".$month."/".$file,"image","jpg");
      
     }
	public function uploadFile($attachment,$id)
	{
	    if (!empty($attachment->file('image') ) ) 
	    {
            	$files=array($attachment->file('image'));
            	foreach($files as $file)
            	{
            		$size=$file->getClientSize();
            		if($size>10000000) exit;
            	}
                 
                 $uploadedInfo=$this->uploadeImage($this->CoursesUploadPath,$this->CoursesUploadThumbPath,$files);
            	 $user_id= Sentinel::getUser()->id;
             
                 foreach($uploadedInfo as $info) {
                 
                      DB::update("UPDATE courses SET image=? WHERE id=? ", [$info['destinationPath'].$info['new_name'], $id ]);
			
                }
        }
	}
	////////////////////////////////////////////////////////////////////////////
	public function delete($id)
	{		
		 $serial=DB::update("UPDATE courses SET status=999 WHERE id=?",[$id]);
		 $return=["result"=>"ok","response"=>"تم الحذف بنجاح","id"=>"$id"];
  		 return  $return;
	}

/////////////////////////////////////////////////////////
	public function view($id){
		$course=DB::table("courses")->select("id", "name", "summery","countryid","universityid","collegeid", "spsid","image")->where('id','=',$id)->get();
		return $course;
	}
////////////////////////////////////////////////////////	
}