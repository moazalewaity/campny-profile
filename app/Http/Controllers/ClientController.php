<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use Validator;
use File;

use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public $clientsInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->clientsInfo=array();
       $this->clientsInfo['clients']='clients'; 
       $this->clientsInfo['contype']=0; 
       $this->clientsInfo['depid']=28; 
       $this->clientsInfo['showcontype']=true;
       $this->clientsInfo['showgallerytab']=true;
       $this->clientsInfo['showembdtab']=true;
       $this->clientsInfo['showlinktab']=true;
       $this->clientsInfo['showoptiontab']=true;
       $this->clientsInfo['title']='العملاء'; 
       $this->clientsInfo['singletitle']='عميل'; 
    }

   public function view(){
       $clientsInfo=$this->clientsInfo;
       return view('admin.clients.clients',compact('clientsInfo'));
   }
   // }
   public function dataclients(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Client::query()
           ->leftjoin('department_lang','department_lang.depid','=','clients.depid')
           ->leftjoin('users','users.id','=','clients.userid')
           ->leftjoin('clients_lang','clients_lang.clientsid','=','clients.id')
           ->select('clients.id','clients.status','clients_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('clients.sortable' , 'DESC')
           ->where('clients_lang.langid' , $langs_site)
           ->where('clients.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('clients_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->clientsInfo['contype']<0) {
               $modal->where('clients.contype' ,'=', $this->clientsInfo['contype']);
           }else {
               $modal->where('clients.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('clients.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('clients.edit',url('/adminpanel/'.$this->clientsInfo['Client'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('clients.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('clients.delete',url('/adminpanel/'.$this->clientsInfo['Client'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delclients', $row->id);
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
       $clientsInfo=$this->clientsInfo;
       $data = null;
       $id = null;

       $clientsLang = array();
       $clientsLinks = array();
       $clientsGallery = array();
       
       return view('admin.clients.create' , compact('clientsInfo','data','id','clientsLang' ,'clientsLinks' ,'clientsGallery') );
   }
   

   public function changestatus($id , $state){
       $clients = Client::find($id);
       if(!$clients){
           return response()->json('error' , 400);
       }else{
           $clients->status = $state;
           if(!$clients->save()){
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
        'name' => 'required|string|max:255',
        'descrption' => 'required',
        'addres' => 'required',
     //    'status' => 'required',
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


    $data = new Client();
    if($id != null){
        $data = Client::find($id);
    }

    $data->name = $request->name;
    $data->addres = $request->addres;
    $data->descrption = implode(' ', $request->descrption);
    $data->name_en = $request->name_en;
    $data->descrption_en = implode(' ', $request->descrption_en);
    // $data->iamge = $request->iamge;
    $data->status = $request->status;
    

    if(isset($request->iamge)){
        $FolderPath = public_path().'/media/clients/'.'img/';
        if(!file_exists($FolderPath)){
            $result = File::makeDirectory( $FolderPath , 0775, true, true);
        }
        $iamge = time().'_img.'.$request->iamge->getClientOriginalExtension();
        $request->iamge->move($FolderPath, $iamge);
        $data->iamge = $iamge;
    }else{
            $iamge = 'defulte.png';
            $data->iamge = $iamge;
        
    }

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
           $FolderPath = public_path().'/'.'media/clients/gallery/'.$path;
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

           $last_sort = clientsGallery::where('clientsid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new clientsGallery;
           $data->file = $image;
           $data->clientsid = $data_id;
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
       $clientsInfo=$this->clientsInfo;
       $data = Client::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.clients.create' , compact('clientsInfo','data','clientsLang','clientsLinks','clientsGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Client::find($id);
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
                   $data1 = clientsGallery::find($nitem);
                   $data2 = clientsGallery::find($nitem2);

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
                   $data1 = Client::find($nitem);
                   $data2 = Client::find($nitem2);
                   
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
    $modal = Client::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('clients.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('clients.list',url('/adminpanel/'.$this->clientsInfo['clients'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('clients.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('clients.list',url('/adminpanel/'.$this->clientsInfo['clients'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}
}
