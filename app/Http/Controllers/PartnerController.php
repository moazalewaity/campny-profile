<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Validator;
use File;

class PartnerController extends Controller
{
    public $partnersInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->partnersInfo=array();
       $this->partnersInfo['partners']='partners'; 
       $this->partnersInfo['contype']=0; 
       $this->partnersInfo['depid']=28; 
       $this->partnersInfo['showcontype']=true;
       $this->partnersInfo['showgallerytab']=true;
       $this->partnersInfo['showembdtab']=true;
       $this->partnersInfo['showlinktab']=true;
       $this->partnersInfo['showoptiontab']=true;
       $this->partnersInfo['title']='الشركاء'; 
       $this->partnersInfo['singletitle']='شريك'; 
    }

   public function view(){
       $partnersInfo=$this->partnersInfo;
       return view('admin.partners.partners',compact('partnersInfo'));
   }
   // }
   public function datapartners(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Partner::query()
           ->leftjoin('department_lang','department_lang.depid','=','partners.depid')
           ->leftjoin('users','users.id','=','partners.userid')
           ->leftjoin('partners_lang','partners_lang.partnersid','=','partners.id')
           ->select('partners.id','partners.status','partners_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('partners.sortable' , 'DESC')
           ->where('partners_lang.langid' , $langs_site)
           ->where('partners.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('partners_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->partnersInfo['contype']<0) {
               $modal->where('partners.contype' ,'=', $this->partnersInfo['contype']);
           }else {
               $modal->where('partners.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('partners.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('partners.edit',url('/adminpanel/'.$this->partnersInfo['Partner'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('partners.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('partners.delete',url('/adminpanel/'.$this->partnersInfo['Partner'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delpartners', $row->id);
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
       $partnersInfo=$this->partnersInfo;
       $data = null;
       $id = null;

       $partnersLang = array();
       $partnersLinks = array();
       $partnersGallery = array();
       
       return view('admin.partners.create' , compact('partnersInfo','data','id','partnersLang' ,'partnersLinks' ,'partnersGallery') );
   }
   

   public function changestatus($id , $state){
       $partners = Partner::find($id);
       if(!$partners){
           return response()->json('error' , 400);
       }else{
           $partners->status = $state;
           if(!$partners->save()){
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
        'image' => 'required',
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


    $data = new Partner();
    if($id != null){
        $data = Partner::find($id);
    }

    $data->name = $request->name;
    // $data->url = $request->url;
    $data->url = implode(' ', $request->url);
    $data->descrption = implode(' ', $request->descrption);
    // $data->iamge = $request->iamge;
    $data->status = $request->status;
    

    if(isset($request->image)){
        $FolderPath = public_path().'/media/partners/'.'img/';
        if(!file_exists($FolderPath)){
            $result = File::makeDirectory( $FolderPath , 0775, true, true);
        }
        $image = time().'_img.'.$request->image->getClientOriginalExtension();
        $request->image->move($FolderPath, $image);
        $data->image = $image;
    }else{
            $image = 'defulte.png';
            $data->image = $image;
        
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
           $FolderPath = public_path().'/'.'media/partners/gallery/'.$path;
           if(!file_exists($FolderPath)){
               $result = File::makeDirectory( $FolderPath , 0775, true, true);
           }
           $image = time().'_'.$request->file->getpartnersize().'_gallary.'.$request->file->getPartnerOriginalExtension();
           $request->file->move($FolderPath, $image);
           $dp = $request->file('file');

           $data_id = $id;
           if($id == null){
               $data_id = '0';
           }

           $last_sort = partnersGallery::where('partnersid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new partnersGallery;
           $data->file = $image;
           $data->partnersid = $data_id;
           $data->name = $request->file->getPartnerOriginalName();
           $data->size = $request->file->getpartnersize();
           $data->type = $request->file->getPartnerMimeType();
           $data->ext = $request->file->getPartnerOriginalExtension();
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
       $partnersInfo=$this->partnersInfo;
       $data = Partner::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.partners.create' , compact('partnersInfo','data','partnersLang','partnersLinks','partnersGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Partner::find($id);
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
                   $data1 = partnersGallery::find($nitem);
                   $data2 = partnersGallery::find($nitem2);

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
                   $data1 = Partner::find($nitem);
                   $data2 = Partner::find($nitem2);
                   
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
    $modal = Partner::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('partners.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('partners.list',url('/adminpanel/'.$this->partnersInfo['partners'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('partners.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('partners.list',url('/adminpanel/'.$this->partnersInfo['partners'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}
}
