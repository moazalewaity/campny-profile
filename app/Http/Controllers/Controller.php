<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Sentinel;
use App\Classes\easyphpthumbnail;
use App\Client;
use App\Service;
use View;
use \Carbon\Carbon ;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use DB;

use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

 protected $notNegotiate = "img/logo-10.png";


   
   // cloud storage
   public $cloudStorageUploadPath;
   public $cloudStorageUploadThumbPath;
   public $cloudStorageRecyclePinPath;
   public $cloudStorageRecyclePinThumbPath;

   public $factoryAddressUploadPath;
   public $factoryAddressUploadThumbPath;
   public $factoryAddressRecyclePinPath;
   public $factoryAddressRecyclePinThumbPath;
   

  
  
   public function __construct()
    {

    	$this->cloudStorageUploadPath=config('global.cloud_storage_upload_path');
        $this->cloudStorageUploadThumbPath=config('global.cloud_storage_upload_thumb_path');
        $this->cloudStorageRecyclePinPath=config('global.cloud_storage_recyclepin_path');
        $this->cloudStorageRecyclePinThumbPath=config('global.cloud_storage_recyclepin_thumb_path');
        
        $this->CoursesUploadPath=config('global.courses_upload_path');
        $this->CoursesUploadThumbPath=config('global.courses_upload_thumb_path');
        $this->CoursesRecyclePinPath=config('global.courses_recyclepin_path');
        $this->CoursesRecyclePinThumbPath=config('global.courses_recyclepin_thumb_path');
  
    }
    public function getiduser(){
        $user = Sentinel::getUser();
        // dd($user);
        // $langs = site_lang($user->cplanguage);
        // $langss = \App\Languages::where('id' , $user->cplanguage)->first();
        // dd($langss->shortname);
        // \App::setLocale($langss->shortname);
        return $user;
    }



    /////////////////////////////////////////////////////////////////////////////////////

    public function database_date(){

    $data = DB::table('users')->select(DB::raw("day (now() ) d") , DB::raw("year (now()) y "),DB::raw(" month (now()) m"))->first();

    $return['month_data'] = $data->m;
    $return['year_data']= $data->y;

    return $return;


    }




    ///////////////////////////////////////////////////////////////////////////////////


     public function checkAccess($per,$url,$icon,$onclick,$title="")
     {  
      if( Sentinel::getUser()->hasAccess($per) )
      {
         if($icon === 'fa fa-edit') {
        return '<a class="btn btn-warning " onclick="'.$onclick.'"  href="'.$url.'"  ><i class="'.$icon.'"></i></a>';
         }
         if($icon === 'fa fa-edit_option') {
          return '<a class="btn btn-warning edit" data-id="'.$onclick.'" ><i class="fa fa-edit"></i></a>';
         }
         else if($icon === 'fa fa-eye') {
        return '<a class="btn btn-success " onclick="'.$onclick.'"  href="'.$url.'"  ><i class="'.$icon.'"></i></a>';      
         }
         else if($icon === 'fa fa-print') {
        return '<a class="btn btn-info " onclick="'.$onclick.'"  href="'.$url.'" target="_blank" ><i class="'.$icon.'"></i></a>';     
         }
         else if($icon === 'add-new') {
         return '<button type="button" class="btn btn-circle btn-outline red dropdown-toggle" data-toggle="dropdown" onclick="'.$onclick.'"><i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs">'.$title.'&nbsp;</span>&nbsp;</button>';
         }
         else  if($icon === 'edit-current') {
         return '<button type="button" class="btn blue" data-dismiss="modal"  aria-hidden="true" onclick="'.$onclick.'">تعديل</button>';
         }
         else  if($icon === 'fa fa-trash') {
         return '<a class="btn btn-danger delete" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }
         else  if($icon === 'fa fa-trash-post') {
          return '<a class="btn btn-danger delete_post" onclick="'.$onclick.'"  href="'.$url.'" ><i class="fa fa-trash"></i></a>';
         }
         else  if($icon === 'fa fa-trash_citizen') {
          return '<a class="btn btn-danger" onclick="'.$onclick.'"  href="'.$url.'" ><i class="fa fa-trash"></i></a>';
         }

           else  if($icon === 'fa fa-camera ') {
         return '<a class="btn btn-info" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }
           else  if($icon === 'fa fa-arrows') {
         return '<a class="btn btn-info '.$onclick.'" ><i class="'.$icon.'"></i></a>';
         }
          else  if($icon === 'fa fa-switch') {
              return 'true';
          }

           else  if($icon === 'fa fa-picture-o ') {
         return '<a class="btn green" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }
        else  if($icon === 'is is_admin') {
          return '1';
        }
         return '<a class="btn btn-info" onclick="'.$onclick.'"  href="'.$url.'"  target="_blank"><i class="'.$icon.'"></i></a>';
      }
      return '';
     }

     public function filterText($text,$allow_space=false){

    $string=str_replace( 'أ', 'ا',str_replace( 'إ', 'ا',str_replace( 'آ', 'ا',str_replace( 'ة', 'ه',str_replace( 'ى','ي',$text)))));
    
    if(!$allow_space) $string=str_replace(  ' ', '%',$string);

    return $string;
     
}


 public function filterTextDB($colname,$allow_space=false){

      $string= " REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( $colname, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ة', 'ه'), 'ى', 'ي')";

    if(!$allow_space) $string=" REPLACE( ".$string.", ' ', '') ";

    return $string;
     
}


public function downloadLink($link){
return ' <a class="btn btn-primary btn-sm " href="'.$link.'" target="_blank"><i class="fa  fa-download"> </a>';

}


public function watermarkImage($path,$watermark='notNegotiate'){
  //echo $_SERVER['SERVER_NAME'];
  
	   $checkServer=explode(">",$path);
	   $serverInfo=explode("_",$checkServer[0]);
	   
	   if(true)
	   {
		   //$path=$checkServer[1];
		   //if(!is_dir($path) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));		   		   
		   $storageDisk=Storage::disk();
	   }else if(!is_dir($path) &&  $_SERVER['SERVER_NAME']==config('global.win_server_ip'))
       {
 // echo "hi";
        //system( config('global.winqnapcmd'));
  
        }

//echo $path;exit;
   $username=Sentinel::getUser()->username;

  $easyThumb = new easyphpthumbnail;
  if(isset($_GET['print'])=='true')
  {
	  $easyThumb -> Thumbsize = 800;
      $easyThumb -> Quality = 80;
  }else
  {
    $easyThumb -> Thumbsize = 0;
    $easyThumb -> Quality = 100;
  }
    //$easyThumb -> Inflate = true; 
    if($watermark!='' && $watermark!='none')
	 {
	 	if($watermark=='notNegotiate') $watermark=$this->notNegotiate; 
		$easyThumb -> Addtext = array(
		  array(1,'buraqshipping - '.$username.' - ','50% 50%','',100,'#000000')
		);
		//$easyThumb -> Thumblocation = "";
		$easyThumb->Watermarkpng = $watermark;
		
		  $easyThumb->Watermarkposition = '50% 50%';
		  $easyThumb->Watermarktransparency = 40;
	 }
    //dd(storage_path('app').$path);
    if ($storageDisk->exists($path)) $easyThumb -> Createthumb(storage_path('app').$path,'screen');
	else echo "File Not found";
    exit;

 }
  
  public function uniqIdGenerator()
  {
    return str_replace('.','_',uniqid(mt_rand().'_',true));
  }

  public function uploadeImage($mainPath,$thumbPath,$files)
  {
  //  echo $mainPath;
  //  exit;
      ini_set('memory_limit','256M');
      $dt = Carbon::now();

      $current = Carbon::now();
  
      $newformat = $current->format('d/m/y');
  
      $user_id=Sentinel::getUser()->id;
      /////////////////////////////
      $data_date= $this->database_date();
     
      $month=intval($data_date['month_data']);
      $arch_year=intval($data_date['year_data']);
/////////////////////////////////////////////////
     // $arch_year=Carbon::createFromFormat('Y-m-d H:i:s', $current)->year;
     // $month=Carbon::createFromFormat('Y-m-d H:i:s', $current)->month;
      $ipaddress=$_SERVER['REMOTE_ADDR'];
       
	   $checkServer=explode(">",$mainPath);
	   $serverInfo=explode("_",$checkServer[0]);
	   //dd($mainPath.'**'.$thumbPath);
	   if(true)
	   {		  
		   $storageDisk=Storage::disk();
	   }else
	   {
		    $mainPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$mainPath);
		    $thumbPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$thumbPath);
			$storageDisk=Storage::disk('ftp');
	   }
	   
      foreach($files as $file) {
          $destinationPath = $mainPath."$arch_year/$month/";
          $destienationThumb= $thumbPath."$arch_year/$month/";
     // dd($destinationPath.'**'.$destienationThumb);
	 //dump(storage_path().$destinationPath);
      if(!$storageDisk->exists($destinationPath)) $storageDisk->makeDirectory($destinationPath);
      
      if(!$storageDisk->exists($destienationThumb)) $storageDisk -> makeDirectory($destienationThumb);
      
          $fileName = $file->getClientOriginalName();
          $sourceFilePath = $file->getPathname()."/";
          // exit;
          $file_exe = $file->getClientOriginalExtension();
          $type=$file->getClientMimeType();
          $size=$file->getClientSize();
          $new_name = $this->uniqIdGenerator().'.'.$file_exe;
         // $file->move($destinationPath, $new_name);
   $storageDisk -> put( $destinationPath.$new_name, file_get_contents($file -> getRealPath()));
          
      if( ($file_exe=='JPG' || $file_exe=='PNG'  || $file_exe=='GIF' || $file_exe=='jpg' || $file_exe=='png' || $file_exe=='gif' ) )
          {  
             $thumb=Image::make($file -> getRealPath())->resize(150,150);
        $storageDisk -> put( $destienationThumb.$new_name, $thumb->encode());
          }
          $info[]=array('fileName'=>$fileName,'type'=>$type,'file_exe'=>$file_exe,'size'=>$size,'new_name'=>$new_name,'user_id'=>$user_id,'arch_year'=>$arch_year,'month'=>$month,'ipaddress'=>$ipaddress,'destinationPath'=>$destinationPath);
        }
        return $info;
  }

  public function deleteImage($mainPath,$thumbPath,$recpinMainPath,$recpinThumbPath,$imgname,$imgext)
  { 
		
		if(true)
	   {
		   
		   $storageDisk=Storage::disk();
	   }else 
	   {
		   $mainPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$mainPath);
		   $thumbPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$thumbPath);
		   $recpinMainPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$recpinMainPath);
		   $recpinThumbPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$recpinThumbPath);
		   $storageDisk=Storage::disk('ftp');
	   }
  
    
   if(!$storageDisk->exists($recpinMainPath)) $storageDisk -> makeDirectory($recpinMainPath);

    if(!$storageDisk->exists($mainPath.$imgname)) $storageDisk -> move($mainPath.$imgname, $recpinMainPath.$imgname);
    
   if( ($imgext=='JPG' || $imgext=='PNG'  || $imgext=='GIF' || $imgext=='jpg' || $imgext=='png' || $imgext=='gif' ) )  {
   // echo str_replace(config('global.qnap'),config('global.ftpqnap'),$recpinThumbPath);
   // exit;
          if(!$storageDisk->exists($recpinThumbPath)) $storageDisk -> makeDirectory($recpinThumbPath);
          
      	  if(!$storageDisk->exists($thumbPath.$imgname)) $storageDisk -> move($thumbPath.$imgname, $recpinThumbPath.$imgname);
     }
  }


  public function downloadFile($path,$filename,$ext){
	  //dd($path);
		if(true)
	   {
		   $storageDisk=Storage::disk();
	   }else 
	   {
		   $mainPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$mainPath);
		   $thumbPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$thumbPath);
		   $recpinMainPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$recpinMainPath);
		   $recpinThumbPath=str_replace(config('global.qnap'),config('global.ftpqnap'),$recpinThumbPath);
		   $storageDisk=Storage::disk('ftp');
	   }
    if ($storageDisk -> exists($path)) {
    //-----------------------------------
    //$ext=explode(".",$path);
    header("Content-type: charset: UTF-8");
    header("Content-type: ".$ext);
    header("Content-Length: " . $storageDisk ->size($path) );
    header("Content-Type: ".$ext);
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header("Content-Transfer-Encoding: binary\n");
    return $storageDisk ->get($path);
    //--------------------------------------
  }else return "File Not found";

  }
  //-----------------------------------------
  public function curlGetData($url) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  $html = curl_exec($ch);
  $redirectURL = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
  curl_close($ch);
  return $html;
}

public function index_main(){
    $cond=" 1=1";
	$admins=DB::select("select count(user_id) counter from role_users where role_id=1");
	$students=DB::select("select count(user_id) counter from role_users where role_id=2");	
	$trainers=DB::select("select count(user_id) counter from role_users where role_id=4");
	$managers=DB::select("select count(user_id) counter from role_users where role_id=5");
	$courses=DB::select("select count(id) counter from courses where status<>999");

  $clients= Client::where('status' , '=' , 1)->get() ;
	$services=Service::where('status' , '=' , 1)->get() ;


  $specializations=DB::select("select count(id) counter from specializations where status<>999");
    return view('admin.index',compact('services' , 'clients' , 'courses','specializations','admins','students','trainers','managers'));
}

public function submenu($type,$id){
		switch($type)
		{
        	case 'country': $menus = DB::select('select id,name from universities where countryid=?',[$id]);break;
			case 'university': $menus = DB::select('select id,name from colleges where universityid=?',[$id]);break;
			case 'college': $menus = DB::select('select id,name from specializations where collegeid=?',[$id]);break;
		}
        return response()->json($menus , 200);
}
}
