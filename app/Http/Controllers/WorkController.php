<?php

namespace App\Http\Controllers;

use App\Department;
use App\Work;
use Illuminate\Http\Request;
use Validator;
use File;

class WorkController extends Controller
{
    public $worksInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->worksInfo=array();
       $this->worksInfo['works']='works'; 
       $this->worksInfo['contype']=0; 
       $this->worksInfo['depid']=28; 
       $this->worksInfo['showcontype']=true;
       $this->worksInfo['showgallerytab']=true;
       $this->worksInfo['showembdtab']=true;
       $this->worksInfo['showlinktab']=true;
       $this->worksInfo['showoptiontab']=true;
       $this->worksInfo['title']='الأعمال'; 
       $this->worksInfo['singletitle']='عمل'; 
    }

   public function view(){
       $worksInfo=$this->worksInfo;
       return view('admin.works.works',compact('worksInfo'));
   }
   // }
   public function dataworks(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Work::query()
           ->leftjoin('department_lang','department_lang.depid','=','works.depid')
           ->leftjoin('users','users.id','=','works.userid')
           ->leftjoin('works_lang','works_lang.worksid','=','works.id')
           ->select('works.id','works.status','works_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('works.sortable' , 'DESC')
           ->where('works_lang.langid' , $langs_site)
           ->where('works.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('works_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->worksInfo['contype']<0) {
               $modal->where('works.contype' ,'=', $this->worksInfo['contype']);
           }else {
               $modal->where('works.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('works.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('works.edit',url('/adminpanel/'.$this->worksInfo['Work'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('works.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('works.delete',url('/adminpanel/'.$this->worksInfo['Work'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delworks', $row->id);
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
       $worksInfo=$this->worksInfo;
       $data = null;
       $id = null;

       $worksLang = array();
       $worksLinks = array();
       $worksGallery = array();
       $category = Department::where('status' , '1')->get();
       
       return view('admin.works.create' , compact('category' ,'worksInfo','data','id','worksLang' ,'worksLinks' ,'worksGallery') );
   }
   

   public function changestatus($id , $state){
       $works = Work::find($id);
       if(!$works){
           return response()->json('error' , 400);
       }else{
           $works->status = $state;
           if(!$works->save()){
               return response()->json('error' , 500);
           }
       }
       return response()->json('success' , 200);
   }
   
   public function create(Request $request , $id = null){
    // dd($request->all());
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
        'date' => 'required',
        'client' => 'required',
        // 'category_id' => 'required',
        // 'url' => 'required|url',
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


    $data = new Work();
    if($id != null){
        $data = Work::find($id);
    }

    $data->title = $request->title;
    $data->title_en = $request->title_en;
    $data->date = $request->date;
    $data->client = $request->client;
    // $data->category_id = $request->category_id;
    $data->url =   $request->url_work;

    // $data->descrption = $request->descrption;
    $data->descrption = implode(' ', $request->descrption);
    $data->descrption_en = implode(' ', $request->descrption_en);
    // $data->iamge = $request->iamge;
    $data->status = $request->status;
    
 
    if(isset($request->image)){
        $FolderPath = public_path().'/media/works/'.'img/';
        if(!file_exists($FolderPath)){
            $result = File::makeDirectory( $FolderPath , 0775, true, true);
        }
        $image = time().'_img.'.$request->image->getClientOriginalExtension();
        $request->image->move($FolderPath, $image);
        $data->image = $image;
    }else{
            $image = $data->image != '' ? $data->image : 'defulte.png';
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
           $FolderPath = public_path().'/'.'media/works/gallery/'.$path;
           if(!file_exists($FolderPath)){
               $result = File::makeDirectory( $FolderPath , 0775, true, true);
           }
           $image = time().'_'.$request->file->getworksize().'_gallary.'.$request->file->getWorkOriginalExtension();
           $request->file->move($FolderPath, $image);
           $dp = $request->file('file');

           $data_id = $id;
           if($id == null){
               $data_id = '0';
           }

           $last_sort = worksGallery::where('worksid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new worksGallery;
           $data->file = $image;
           $data->worksid = $data_id;
           $data->name = $request->file->getWorkOriginalName();
           $data->size = $request->file->getworksize();
           $data->type = $request->file->getWorkMimeType();
           $data->ext = $request->file->getWorkOriginalExtension();
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
       $worksInfo=$this->worksInfo;
       $data = Work::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.works.create' , compact('worksInfo','data','worksLang','worksLinks','worksGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Work::find($id);
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
                   $data1 = worksGallery::find($nitem);
                   $data2 = worksGallery::find($nitem2);

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
                   $data1 = Work::find($nitem);
                   $data2 = Work::find($nitem2);
                   
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
    $modal = Work::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('works.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('works.list',url('/adminpanel/'.$this->worksInfo['works'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('works.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('works.list',url('/adminpanel/'.$this->worksInfo['works'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}




}
