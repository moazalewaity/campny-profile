<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

use Validator;
use File;

class TeamController extends Controller
{
    public $teamsInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->teamsInfo=array();
       $this->teamsInfo['teams']='teams'; 
       $this->teamsInfo['contype']=0; 
       $this->teamsInfo['depid']=28; 
       $this->teamsInfo['showcontype']=true;
       $this->teamsInfo['showgallerytab']=true;
       $this->teamsInfo['showembdtab']=true;
       $this->teamsInfo['showlinktab']=true;
       $this->teamsInfo['showoptiontab']=true;
       $this->teamsInfo['title']='الأعمال'; 
       $this->teamsInfo['singletitle']='عمل'; 
    }

   public function view(){
       $teamsInfo=$this->teamsInfo;
       return view('admin.teams.teams',compact('teamsInfo'));
   }
   // }
   public function datateams(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Team::query()
           ->leftjoin('department_lang','department_lang.depid','=','teams.depid')
           ->leftjoin('users','users.id','=','teams.userid')
           ->leftjoin('teams_lang','teams_lang.teamsid','=','teams.id')
           ->select('teams.id','teams.status','teams_lang.title','department_lang.title as deptitle','users.first_name','users.last_name')
           ->orderBy('teams.sortable' , 'DESC')
           ->where('teams_lang.langid' , $langs_site)
           ->where('teams.status' ,'!=', '9')
           ->where('department_lang.langid' , $langs_site);
           if (request()->has('name')) {
               $modal->where('teams_lang.title', 'like', "%" . request('name') . "%");
           }
           if (request()->has('department')) {
               $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
           }
           if ($this->teamsInfo['contype']<0) {
               $modal->where('teams.contype' ,'=', $this->teamsInfo['contype']);
           }else {
               $modal->where('teams.contype' ,'>=', 0);
           }

       return \Datatables::of($modal)
           ->addColumn('statuss', function($row){
               $checked = ' ';
               if($row->status == 1){
                 $checked = 'checked';
               }
               
               $item = $this->checkAccess('teams.status',$row->id,'fa fa-switch',$row->status);
               if($item != null){
                   $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
               }else{
                   $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
               }

               return $p;
           })
           ->addColumn('edit_url', function($row){
               return $this->checkAccess('teams.edit',url('/adminpanel/'.$this->teamsInfo['Team'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
           })
           ->addColumn('move', function($row){
               return $this->checkAccess('teams.edit','#','fa fa-arrows','icon-move');
           })
           ->addColumn('delete_url', function($row){
               return $this->checkAccess('teams.delete',url('/adminpanel/'.$this->teamsInfo['Team'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
             // return route('delteams', $row->id);
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
       $teamsInfo=$this->teamsInfo;
       $data = null;
       $id = null;

       $teamsLang = array();
       $teamsLinks = array();
       $teamsGallery = array();
       
       return view('admin.teams.create' , compact('teamsInfo','data','id','teamsLang' ,'teamsLinks' ,'teamsGallery') );
   }
   

   public function changestatus($id , $state){
       $teams = Team::find($id);
       if(!$teams){
           return response()->json('error' , 400);
       }else{
           $teams->status = $state;
           if(!$teams->save()){
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
        'phone' => 'required',
        'email' => 'required',
        // 'category_id' => 'required',
        // 'url' => 'required',
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


    $data = new Team();
    if($id != null){
        $data = Team::find($id);
    }

    $data->name = $request->name;
    $data->name_en = $request->name_en;
    $data->phone = $request->phone;
    $data->email = $request->email;
    $data->t_url = $request->t_url;
    $data->fb_url = $request->fb_url;
    $data->in_url = $request->in_url;
    $data->jobTitlt = $request->jobTitlt;
    $data->jobTitlt_en = $request->jobTitlt_en;
    
    // $data->url = implode(' ', $request->url);

    // $data->descrption = $request->descrption;
    $data->descrption = implode(' ', $request->descrption);
    // $data->iamge = $request->iamge;
    $data->status = 1;
    

    if(isset($request->image)){
        $FolderPath = public_path().'/media/teams/'.'img/';
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
           $FolderPath = public_path().'/'.'media/teams/gallery/'.$path;
           if(!file_exists($FolderPath)){
               $result = File::makeDirectory( $FolderPath , 0775, true, true);
           }
           $image = time().'_'.$request->file->getteamsize().'_gallary.'.$request->file->getTeamOriginalExtension();
           $request->file->move($FolderPath, $image);
           $dp = $request->file('file');

           $data_id = $id;
           if($id == null){
               $data_id = '0';
           }

           $last_sort = teamsGallery::where('teamsid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
           // dd($last_sort);
           if($last_sort){
               $last_sort_val = $last_sort->sortable+1;
           }else{
               $last_sort_val = '1';
           }

           $data = new teamsGallery;
           $data->file = $image;
           $data->teamsid = $data_id;
           $data->name = $request->file->getTeamOriginalName();
           $data->size = $request->file->getteamsize();
           $data->type = $request->file->getTeamMimeType();
           $data->ext = $request->file->getTeamOriginalExtension();
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
       $teamsInfo=$this->teamsInfo;
       $data = Team::find($id);
       if(!$data){
           return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
       }
       // dd($data);
       
       return view('admin.teams.create' , compact('teamsInfo','data','teamsLang','teamsLinks','teamsGallery' ,'id') );
   }

   
   public function delete($id){
       $data = Team::find($id);
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
                   $data1 = teamsGallery::find($nitem);
                   $data2 = teamsGallery::find($nitem2);

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
                   $data1 = Team::find($nitem);
                   $data2 = Team::find($nitem2);
                   
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
    $modal = Team::query()
        ->select('*')
        ->orderBy('id' , 'DESC')
        ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->status == 1){
              $checked = 'checked';
            }
            
            $item = $this->checkAccess('teams.list',$row->id,'fa fa-switch',$row->status);
            if($item != null){
                $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            }else{
                $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
            }

            return $p;
        })
        ->addColumn('edit_url', function($row){
            return $this->checkAccess('teams.list',url('/adminpanel/'.$this->teamsInfo['teams'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
        })
        ->addColumn('move', function($row){
            return $this->checkAccess('teams.list','#','fa fa-arrows','icon-move');
        })
        ->addColumn('delete_url', function($row){
            return $this->checkAccess('teams.list',url('/adminpanel/'.$this->teamsInfo['teams'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
          // return route('delpost', $row->id);
        })
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}
}
