<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

use Validator;
use File;
use Sentinel;
class ServiceController extends Controller
{
   
	public $servicesInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->servicesInfo=array();
       $this->servicesInfo['service']='services'; 
       $this->servicesInfo['contype']=0; 
       $this->servicesInfo['depid']=28; 
       $this->servicesInfo['showcontype']=true;
       $this->servicesInfo['showgallerytab']=true;
       $this->servicesInfo['showembdtab']=true;
       $this->servicesInfo['showlinktab']=true;
       $this->servicesInfo['showoptiontab']=true;
       $this->servicesInfo['title']='الخدمات'; 
       $this->servicesInfo['singletitle']='خدمة'; 
    }

   public function view(){
       $servicesInfo=$this->servicesInfo;
       return view('admin.services.servicess',compact('servicesInfo'));
   }
   // }
   public function dataservices(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Service::query()
           ->leftjoin('department_lang','department_lang.depid','=','services.depid')
           ->leftjoin('users','users.id','=','services.userid')
           ->leftjoin('services_lang','services_lang.servicesid','=','services.id')
           ->select('services.id','services.status','services_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('services.sortable' , 'DESC')
           ->where('services_lang.langid' , $langs_site)
           ->where('services.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('services_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->servicesInfo['contype']<0) {
               $modal->where('services.contype' ,'=', $this->servicesInfo['contype']);
           }else {
               $modal->where('services.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('services.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('services.edit',url('/adminpanel/'.$this->servicesInfo['service'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('services.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('services.delete',url('/adminpanel/'.$this->servicesInfo['service'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delservices', $row->id);
           })
           ->addColumn('username', function($row){
             return $row->first_name.' '.$row->last_name;
           })
           ->addColumn('deptitle', function($row){
             return $row->deptitle;
           })
           ->setRowId(function ($row) {
               return $row->id;
           })
           ->make(true);
   }


   public function add(){
       $servicesInfo=$this->servicesInfo;
       $data = null;
       $id = null;

       $servicesLang = array();
       $servicesLinks = array();
       $servicesGallery = array();
       
       return view('admin.services.create' , compact('servicesInfo','data','id','servicesLang' ,'servicesLinks' ,'servicesGallery') );
   }
   

   public function changestatus($id , $state){
       $services = Service::find($id);
       if(!$services){
           return response()->json('error' , 400);
       }else{
           $services->status = $state;
           if(!$services->save()){
               return response()->json('error' , 500);
           }
       }
       return response()->json('success' , 200);
   }
   
   public function create(Request $request , $id = null){
       // dd($request->all());

       $langs_site = $this->getiduser()->cplanguage;
       $massage = [
           'required' => 'هذا الحقل مطلوب',
           'string' => 'هذا الحقل يجب ان يكون نص',
           'confirmed' => 'يجب ان تتأكد من مطباقة كلمة المرور'
       ];

       $validator = Validator::make($request->all() ,[
           'title' => 'required|string|max:255',
           'descrption' => 'required',
        //    'status' => 'required',
           'icon' => 'required',
       ], $massage);

       if ($validator->fails()){
           return redirect()->back()->withInput()->withErrors($validator);
       }

       $depid = $request->depid;

       if(isset($request->submenu)){
           if(sizeof($request->submenu) != 0){
               for ($i=0; $i < sizeof($request->submenu) ; $i++) { 
                   if($request->submenu[$i] != null){
                       $depid = $request->submenu[$i];
                   }
               }
           }
       }


       $data = new Service;
       if($id != null){
           $data = Service::find($id);
       }

       $data->title = $request->title;
    //    $data->descrption = $request->descrption;
       $data->descrption = implode(' ', $request->descrption);

       $data->title_en = $request->title_en;
       $data->descrption_en = implode(' ', $request->descrption_en);
       $data->icon = $request->icon;
       $data->status = $request->status;
       

       if(!$data->save()){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       if($id == null){
           $data->save();
       }
       


       return redirect()->back()->with('Success','تمت العملية بنجاح ');
   }

   
   public function upladimage(Request $request , $id = null){
       // dd($request->all());

       $path = date('Y').'/'.date('m');
       if(isset($request->file)){
           $FolderPath = public_path().'/'.'media/services/gallery/'.$path;
           if(!file_exists($FolderPath)){
               $result = File::makeDirectory( $FolderPath , 0775, true, true);
           }
           $image = time().'_'.$request->file->getClientSize().'_gallary.'.$request->file->getClientOriginalExtension();
           $request->file->move($FolderPath, $image);
           $dp = $request->file('file');

           $data_id = $id;
           if($id == null){
               $data_id = '0';
           }

           $last_sort = servicesGallery::where('servicesid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new servicesGallery;
           $data->file = $image;
           $data->servicesid = $data_id;
           $data->name = $request->file->getClientOriginalName();
           $data->size = $request->file->getClientSize();
           $data->type = $request->file->getClientMimeType();
           $data->ext = $request->file->getClientOriginalExtension();
           $data->path = $path;
           $data->token = $request->_token;
           $data->status = '1';
           $data->sortable = $last_sort_val;
           $data->folderid = '0';
           $data->insertdate = date('Y-m-d h:m:s');
           $data->oldfolderid = '0';
       }


       if($data->save()){
           if($id == null){
               $data->sortable = $data->id;
               $data->save();
           }
           return response()->json($image , 200);
       }else{
           return response()->json('error',400);
       }
       
   }
   
   public function edit($id){
       $servicesInfo=$this->servicesInfo;
       $data = Service::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.services.create' , compact('servicesInfo','data','servicesLang','servicesLinks','servicesGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Service::find($id);
       if($data->delete() ){
               return redirect()->back()->with('Success','تمت العملية بنجاح ');
           
       }else{
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
   }
   
  
   

   public function resort(Request $request){
       dump($request->item);
       // dump($data);
       $c = 1;
       for ($i=0; $i < sizeof($request->item) ; $i++) {
           $nitem = $request->item[$i];
           // dump($nitem);
           if($i == ( sizeof($request->item)-1 )){

           }else{
               $c = $i + 1;
               $nitem2 = $request->item[$c];
               if(true){
                   $data1 = servicesGallery::find($nitem);
                   $data2 = servicesGallery::find($nitem2);

                   if($data1->sortable > $data2->sortable){
                       $sort1 = $data1->sortable;
                       $sort2 = $data2->sortable;
                       dump($nitem.'_'.$sort1 .'>'. $nitem2.'_'.$sort2);
                       // dump( $sort1);
                       // dump( $sort2);
                       $data1->sortable =  $sort2;
                       if(!$data1->save()){
                           return response()->json('error save data1' , 400);
                       }

                       $data2->sortable =  $sort1;
                       if(!$data2->save()){
                           return response()->json('error save data1' , 400);
                       }
                   }
               }
           }
       }
       return response()->json('done' , 200);
   }

   public function resort_table(Request $request){
       $c = 1;
       for ($i=0; $i < sizeof($request->item) ; $i++) {
           $nitem = $request->item[$i];
           if($i == ( sizeof($request->item)-1 )){

           }else{
               $c = $i + 1;
               $nitem2 = $request->item[$c];
               if(true){
                   $data1 = Service::find($nitem);
                   $data2 = Service::find($nitem2);
                   
                   if($data1->sortable < $data2->sortable){
                       $sort1 = $data1->sortable;
                       $sort2 = $data2->sortable;
                       // dump($nitem.'_'.$sort1 .'>'. $nitem2.'_'.$sort2);
                       // dump( $sort1);
                       // dump( $sort2);
                       $data1->sortable =  $sort2;
                       if(!$data1->save()){
                           return response()->json('error save data1' , 400);
                       }

                       $data2->sortable =  $sort1;
                       if(!$data2->save()){
                           return response()->json('error save data1' , 400);
                       }
                   }
               }
           }
       }
       return response()->json('done' , 200);
   }




   public function datapost(Request $request){
    $langs_site = $this->getiduser()->cplanguage;
    // dd('asd0369');exit;
    $modal = Service::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('services.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('services.list',url('/adminpanel/'.$this->servicesInfo['service'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('services.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('services.list',url('/adminpanel/'.$this->servicesInfo['service'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}


}
