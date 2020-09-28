<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;


use Validator;
use File;

class SliderController extends Controller
{
    public $slidersInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->slidersInfo=array();
       $this->slidersInfo['sliders']='sliders'; 
       $this->slidersInfo['contype']=0; 
       $this->slidersInfo['depid']=28; 
       $this->slidersInfo['showcontype']=true;
       $this->slidersInfo['showgallerytab']=true;
       $this->slidersInfo['showembdtab']=true;
       $this->slidersInfo['showlinktab']=true;
       $this->slidersInfo['showoptiontab']=true;
       $this->slidersInfo['title']='السلايدر'; 
       $this->slidersInfo['singletitle']='شريحة'; 
    }

   public function view(){
       $slidersInfo=$this->slidersInfo;
       return view('admin.sliders.sliders',compact('slidersInfo'));
   }
   // }
   public function datasliders(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Slider::query()
           ->leftjoin('department_lang','department_lang.depid','=','sliders.depid')
           ->leftjoin('users','users.id','=','sliders.userid')
           ->leftjoin('sliders_lang','sliders_lang.slidersid','=','sliders.id')
           ->select('sliders.id','sliders.status','sliders_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('sliders.sortable' , 'DESC')
           ->where('sliders_lang.langid' , $langs_site)
           ->where('sliders.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('sliders_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->slidersInfo['contype']<0) {
               $modal->where('sliders.contype' ,'=', $this->slidersInfo['contype']);
           }else {
               $modal->where('sliders.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('sliders.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('sliders.edit',url('/adminpanel/'.$this->slidersInfo['Slider'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('sliders.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('sliders.delete',url('/adminpanel/'.$this->slidersInfo['Slider'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delsliders', $row->id);
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
       $slidersInfo=$this->slidersInfo;
       $data = null;
       $id = null;

       $slidersLang = array();
       $slidersLinks = array();
       $slidersGallery = array();
       
       return view('admin.sliders.create' , compact('slidersInfo','data','id','slidersLang' ,'slidersLinks' ,'slidersGallery') );
   }
   

   public function changestatus($id , $state){
       $sliders = Slider::find($id);
       if(!$sliders){
           return response()->json('error' , 400);
       }else{
           $sliders->status = $state;
           if(!$sliders->save()){
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
        'subtitle' => 'required',
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


    $data = new Slider();
    if($id != null){
        $data = Slider::find($id);
    }

    $data->title = $request->title;
    $data->subtitle = $request->subtitle;
    $data->title_en = $request->title_en;
    $data->subtitle_en = $request->subtitle_en;
    // $data->iamge = $request->iamge;
    $data->status = $request->status;
    $data->in_slider = $request->in_slider;
    
    

    if(isset($request->image)){
        $FolderPath = public_path().'/media/sliders/'.'img/';
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
           $FolderPath = public_path().'/'.'media/sliders/gallery/'.$path;
           if(!file_exists($FolderPath)){
               $result = File::makeDirectory( $FolderPath , 0775, true, true);
           }
           $image = time().'_'.$request->file->getslidersize().'_gallary.'.$request->file->getSliderOriginalExtension();
           $request->file->move($FolderPath, $image);
           $dp = $request->file('file');

           $data_id = $id;
           if($id == null){
               $data_id = '0';
           }

           $last_sort = slidersGallery::where('slidersid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new slidersGallery;
           $data->file = $image;
           $data->slidersid = $data_id;
           $data->name = $request->file->getSliderOriginalName();
           $data->size = $request->file->getslidersize();
           $data->type = $request->file->getSliderMimeType();
           $data->ext = $request->file->getSliderOriginalExtension();
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
       $slidersInfo=$this->slidersInfo;
       $data = Slider::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.sliders.create' , compact('slidersInfo','data','slidersLang','slidersLinks','slidersGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Slider::find($id);
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
                   $data1 = slidersGallery::find($nitem);
                   $data2 = slidersGallery::find($nitem2);

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
                   $data1 = Slider::find($nitem);
                   $data2 = Slider::find($nitem2);
                   
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
    $modal = Slider::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('sliders.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('sliders.list',url('/adminpanel/'.$this->slidersInfo['sliders'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('sliders.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('sliders.list',url('/adminpanel/'.$this->slidersInfo['sliders'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}
}
