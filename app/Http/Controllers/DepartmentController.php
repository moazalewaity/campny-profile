<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\DepartmentLang;
use App\DepartmentOptions;
use App\Languages;

use Validator;
use File;



class DepartmentController extends Controller
{
    public function view(){
        return view('admin.department.menus');
    }
    public function datapost(Request $request){
        $modal = Department::query()->where('status' , '1')->orderBy('sortable' , 'DESC');
        return \Datatables::of($modal)
            ->filter(function($row){
                if (request()->has('name')) {
                    $row->where('shortname', 'like', "%" . request('name') . "%");
                }
            }, true)

            ->addColumn('edit_url', function($row){
                return $this->checkAccess('department.add',route('editdep', $row->id),'fa fa-edit','editEXPReply('.$row->id.')');
            })
            ->addColumn('move', function($row){
                return $this->checkAccess('department.add','#','fa fa-arrows','icon-move');
            })
            ->addColumn('delete_url', function($row){
                return $this->checkAccess('department.delete',route('deletedep', $row->id),'fa fa-trash','editEXPReply('.$row->id.')');
              // return route('delpost', $row->id);
            })
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->make(true);
    }

    public function add($id = null){
        $langs_site = $this->getiduser()->cplanguage;
        if($id == null){
            $data = null;
        }else{
            $data = Department::find($id);
            if(!$data){
                return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
            }
        }

        if($id == null){
            $depall = array();
            $doption = array();
        }else{
            $depall = DepartmentLang::where('depid' , $id)->get();
            $doption = DepartmentOptions::where('deptid' , $id)->get();
        }
        
        // dump($doption);
        $langs = Languages::get();
        $menus = Department::where('status' , '1')->get();
        // dump($id);
        $olist = \App\OptionsList::
            leftjoin('options_type','options_type.id','=','options_list.type')
            ->leftjoin('options_lang','options_lang.optnid','=','options_list.id')
            ->leftJoin('department_options', function($q) use ($id)
            {
                // dump($id);
                $q->on('department_options.optnid', '=', 'options_list.id')
                    ->where('department_options.deptid', '=', $id);
            })
            ->where('options_lang.langid' , $langs_site)
            ->orderBy('department_options.sortable' , 'DESC')
            ->select('options_list.*','options_type.name as name_type' ,'options_lang.title as name_lang' , 'department_options.id as skc', 'department_options.sortable')
            ->get();

        // dd($olist);


    	return view('admin.department.create' , compact('menus','langs','olist','depall' ,'data' , 'id' ,'doption') );
    }
    

    public function get_submenu($id){
        $menus = Department::where('status' , '1')->where('parentid' , $id)->get();
        return response()->json($menus , 200);
    }
    
    public function create(Request $request , $id = null){
        // dump($id);
        // dd($request->all());
        $massage = [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يكون نص',
            'confirmed' => 'يجب ان تتأكد من مطباقة كلمة المرور'
        ];

        $validator = Validator::make($request->all() ,[
            'shortname' => 'required|string|max:255',
        ], $massage);

        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $parentid = '0';
        if(isset($request->submenu) && sizeof($request->submenu) != 0){
            for ($i=0; $i < sizeof($request->submenu) ; $i++) { 
                $parentid = $request->submenu[$i];
            }
        }elseif($request->parentid){
            // dump('asd');
            $parentid = $request->parentid;
        }
        // dd($request->all());
        if($id == null){
            $data = new Department();
        }else{
            $data = Department::find($id);
            if(!$data){
                return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
            }
        }

        if(isset($request->image)){
            $FolderPath = public_path().'/media/department/'.'img/';
            if(!file_exists($FolderPath)){
                $result = File::makeDirectory( $FolderPath , 0775, true, true);
            }
            $image = time().'_img.'.$request->image->getClientOriginalExtension();
            $request->image->move($FolderPath, $image);
            $data->image = $image;
        }else{
            if($id == null){
                $image = 'defulte.png';
                $data->image = $image;
            }
        }

        if(isset($request->icon)){
            $FolderPath1 = public_path().'/media/department/'.'icon/';
            if(!file_exists($FolderPath1)){
                $result = File::makeDirectory( $FolderPath1 , 0775, true, true);
            }
            $icon = time().'_icon.'.$request->icon->getClientOriginalExtension();
            $request->icon->move($FolderPath1, $icon);
            $data->icon = $icon;
        }else{
            if($id == null){
                $icon = 'defulte.png';
                $data->icon = $icon;
            }
        }

        if(isset($request->banner)){
            $FolderPath1 = public_path().'/media/department/'.'banner/';
            if(!file_exists($FolderPath1)){
                $result = File::makeDirectory( $FolderPath1 , 0775, true, true);
            }
            $banner = time().'_banner.'.$request->banner->getClientOriginalExtension();
            $request->banner->move($FolderPath1, $banner);
            $data->banner = $banner;
        }else{
            if($id == null){
                $banner = 'defulte.png';
                $data->banner = $banner;
            }
        }


        $data->shortname = $request->shortname;
        $data->status = '1';
        $data->sortable = '0';
        $data->main_option = '0';
        $data->classicon = '0';
        $data->parentid = $parentid;
        $data->color = $request->color;

        if(!$data->save()){
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }
        if($id == null){
            $data->sortable = $data->id;
            $data->save();
        }


        if(isset($request->langid) && sizeof($request->langid) != 0){
            for ($i=0; $i < sizeof($request->langid) ; $i++) { 

                $deplang = DepartmentLang::where('depid' , $id)->where('langid', $request->langid[$i])->first();
                if(!$deplang){
                    $deplang = new DepartmentLang();
                    $deplang->depid = $data->id;
                    $deplang->langid = $request->langid[$i];
                }

                $deplang->title = $request->title[$i];
                $deplang->summary = $request->summary[$i];
                $deplang->description = $request->description[$i];
                $deplang->keywords = $request->keywords[$i];
                // dump($deplang);
                if(!$deplang->save()){
                    return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
                }
            }
        }

        // $options = 0;
        // if(sizeof($request->options) != 0){
        //     for ($i=0; $i < sizeof($request->options) ; $i++) {
        //         // dump($request->options[$i]);

        //         $depoption = DepartmentOptions::where('deptid' , $data->id)->where('optnid' , $request->options[$i])->first();
        //         // dump($depoption);
        //         if(!$depoption){
        //             $depoption = new DepartmentOptions();
        //             $depoption->deptid = $data->id;
        //             $depoption->optnid = $request->options[$i];
        //         }

        //         $depoption->main = '0';
        //         $depoption->sortable = '0';
        //         $depoption->searchable = '0';
        //         // dump($depoption);
        //         if(!$depoption->save()){
        //             return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        //         }
        //     }
        // }

        return redirect()->back()->with('Success','تمت العملية بنجاح ');
    }



    
    public function delete($id){
        $data = Department::find($id);
        if($data){
            $data->status = '9';
            if($data->save()){
                return redirect()->back()->with('Success','تمت العملية بنجاح ');
            }else{
                return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
            }
        }else{
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }
    }
    
    public function resort_table(Request $request){
        // dd($request->all());
        $c = 1;
        for ($i=0; $i < sizeof($request->item) ; $i++) {
            $nitem = $request->item[$i];
            if($i == ( sizeof($request->item)-1 )){

            }else{
                $c = $i + 1;
                $nitem2 = $request->item[$c];
                if(true){
                    $data1 = Department::find($nitem);
                    $data2 = Department::find($nitem2);
                    
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

    public function sort_option(Request $request , $id){
        // dd($request->all());
        $c = 1;
        for ($i=0; $i < sizeof($request->item) ; $i++) {
            $nitem = $request->item[$i];
            $data = DepartmentOptions::where('deptid' , $id)->where('optnid' , $nitem)->first();
            if($data){
                $data->sortable = $c;
                if(!$data->save()){
                    return response()->json('error' , 400);
                }
                $c++;
            }
        }
        return response()->json('done' , 200);
    }

    public function getoptionmenu($id , $postid = null){
        $langs_site = $this->getiduser()->cplanguage;
        $data = \App\DepartmentOptions::where( 'department_options.deptid' , $id)
        ->leftjoin('options_list' , 'options_list.id' , '=' , 'department_options.optnid')
        ->leftjoin('options_type' , 'options_type.id' , '=' , 'options_list.type')
        ->leftjoin('options_lang' , 'options_lang.optnid' , '=' , 'options_list.id')
        ->where('options_lang.langid' , $langs_site)
        ->select('department_options.*' , 'options_list.catid', 'options_lang.title as list_title', 'options_type.name as types')
        ->get();

        // dd($data);
        // dump(\App\PostOptions::get());
        // dump($data);
        for ($i=0; $i < sizeof($data) ; $i++) { 
            if($data[$i]->types == 'select' || $data[$i]->types == 'multiselect' || $data[$i]->types == 'checkbox' || $data[$i]->types == 'radiobutton' || $data[$i]->types == 'multicheckbox'){
                $data[$i]['item_list'] = \App\Category::
                    where('category.pid' , $data[$i]->catid)
                    ->where('category.status' , '1')
                    ->leftjoin('category_lang' , 'category_lang.catid' ,'=' ,'category.id')
                    ->where('category_lang.langid' , $langs_site)
                    ->select('category.*' ,'category_lang.title as title_name')
                    ->get();
            }
            if($postid){
                // dump($data[$i]->optnid);
                // dump($postid);
                $datapostop = \App\PostOptions::where('postid' , $postid)->where('optnid' , $data[$i]->optnid)->first();
                // dump($datapostop);
                if($datapostop){
                    // dump('1');
                    $data[$i]['val_item'] = explode(",",$datapostop->optnval);
                }else{
                    $data[$i]['val_item'] = '';

                }

            }
        }

        return response()->json( $data , 200);
    }


    public function status_option($id , $val , $status){
        // dd($request->all());

        $data = DepartmentOptions::where('deptid' , $id)->where('optnid' , $val)->first();
        // dd($data);
        if($data){
            if($data->delete()){
                return response()->json('done' , 200);
            }else{
                return response()->json('Error' , 400);
            }
        }else{
                $depoption = new DepartmentOptions();
                $depoption->deptid = $id;
                $depoption->optnid = $val;
                $depoption->main = '0';
                $depoption->sortable = '0';
                $depoption->searchable = '0';

            if($depoption->save()){
                return response()->json('done' , 200);
            }else{
                return response()->json('Error' , 400);
            }
        }
    }



}
