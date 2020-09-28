<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostComments;
use App\PostGallery;
use App\PostGalleryFolder;
use App\PostInCart;
use App\PostLang;
use App\PostLinks;
use App\PostOptions;
use App\Department;
use App\DepartmentLang;
use App\Languages;

use Validator;
use File;
use Sentinel;
// use View;



class OptionsController extends Controller
{
    public function add($id = null){
        $langs_site = $this->getiduser()->cplanguage;
        $types = \App\OptionsType::get();
        $langs = Languages::get();
        $data = array();
        $datalang = array();

        if($id != null){
            $data = \App\OptionsList::find($id);
            $datalang = \App\OptionsLang::where('optnid' , $data->id)->get();
        }


        $menus = \App\Category::
            join('category_lang','category_lang.catid','=','category.id')
            ->where('category_lang.langid' , $langs_site)
            ->where('category.status' , '1')
            ->select('category.*','category_lang.title as cat_name')
            ->get();

        $olang = \App\OptionsLang::get();

        // dd($data);
        // dd('asd');
        return view('admin.option.create' , compact('id','types','data','datalang' , 'langs' , 'olang' ,'menus' ));
    }

    public function edit($id){
        $types = \App\OptionsType::get();
        $langs = Languages::get();

        $data = \App\OptionsList::find($id);
        if(!$data){
            return response()->json('نعتذر لم تتم العملية بنجاح' , 400);
        }

        $datalang = \App\OptionsLang::where('optnid' , $data->id)->get();

        return response()->json([ $data , $datalang ] , 200);
    }
    
    public function create(Request $request , $id = null){
        // dd($request->all());
         // $id = null;
        // dd('asd');
        $data = new \App\OptionsList;
        if($id != null){
            $data = \App\OptionsList::find($id);
        }

        if($request->catid){
            $catid = $request->catid;
        }else{
            $catid = '0';
        }

        $po = $catid;

        if($request->name_cat){
            $datacat = new \App\Category;
            $datacat->icon = '';
            $datacat->name = $request->name_cat;
            $datacat->pid = (int)$catid;
            $datacat->status = '1';
            $datacat->temp_name = '1';
            $datacat->pcode = '1';
            if(!$datacat->save()){
                return response()->json('نعتذر لم تتم العملية بنجاح' , 400);
            }

            $po = $datacat->id;
            
            $langs = Languages::get();
            foreach ($langs as $i => $row) {
                $data_lang = \App\CategoryLang::where('catid',$po)->where('langid',$row->id)->first();
                if(!$data_lang){
                    $data_lang = new \App\CategoryLang();
                    $data_lang->catid = $po;
                    $data_lang->langid = $row->id;
                    $data_lang->title = $request->name_cat;
                    // dump($data_lang);
                    if(!$data_lang->save()){
                        return response()->json('نعتذر لم تتم العملية بنجاح' , 400);
                    }
                }
            }
        }

        $data->name = $request->name;
        $data->type = $request->type;
        $data->catid = $po;
        $data->searchable = '0';
        $data->template = '0';
        $data->poptnid = '0';
        $data->coptnid = '0';

        if(!$data->save()){
            return response()->json('نعتذر لم تتم العملية بنجاح' , 400);
        }
        
        if(isset($request->langid)){
            if(sizeof($request->langid) != 0){
                for ($i=0; $i < sizeof($request->langid) ; $i++) { 


                    
                    if($id != null){
                        $optiondata = \App\OptionsLang::where('optnid' , $data->id)->where('langid' , $request->langid[$i])->first();
                        // dump($request->langid[$i]);
                        // dump($data);
                        // dd($optiondata);
                    }else{
                        $optiondata = new \App\OptionsLang;
                        $optiondata->optnid = $data->id;
                        $optiondata->langid = $request->langid[$i];
                    }

                    $optiondata->title = $request->title[$i];

                    if(!$optiondata->save()){
                        return response()->json('نعتذر لم تتم العملية بنجاح' , 400);
                    }
                    
                }
            }
        }

        return response()->json('تمت العملية بنجاح ' , 200);
    }

    
    
    public function datapost(Request $request){

        $modal = \App\OptionsList::query()
            ->join('options_type','options_type.id','=','options_list.type')
            ->join('options_lang','options_lang.optnid','=','options_list.id')
            ->where('options_lang.langid' , '2')
            ->select('options_list.*','options_type.name as name_type','options_lang.title as name_lang')
            ->orderBy('options_list.id' , 'DESC');

            if (request()->has('name')) {
                $modal->where('options_list.name', 'like', "%" . request('name') . "%");
            }
            if (request()->has('type')) {
                $modal->where('options_list.type', 'like', "%" . request('type') . "%");
            }

        return \Datatables::of($modal)

            ->addColumn('edit_url', function($row){
                return $this->checkAccess('option.add','','fa fa-edit_option',$row->id);
            })
            ->addColumn('delete_url', function($row){
                return $this->checkAccess('option.add',route('deloption', $row->id),'fa fa-trash','');
            })
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->make(true);
    }

    
    public function get_submenu($id){
        $menus = Department::where('parentid' , $id)->get();
        return response()->json($menus , 200);
    }
    
    
    public function delete($id){
        $data = \App\OptionsList::find($id);
        if($data){
            if($data->delete()){
                $data2 = \App\OptionsLang::where('optnid' , $id)->delete();
                if(!$data2){
                    return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
                }
            }else{
                return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
            }
        }else{
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }

        return redirect()->back()->with('Success','تمت العملية بنجاح ');
    }
    

    public function resort(Request $request){
        // dump($request->item);
        // dump($data);
        $c = 1;
        for ($i=0; $i < sizeof($request->item) ; $i++) {
            $nitem = $request->item[$i];
            if($i == ( sizeof($request->item)-1 )){

            }else{
                $c = $i + 1;
                $nitem2 = $request->item[$c];
                if(true){
                    $data1 = PostGallery::find($nitem);
                    $data2 = PostGallery::find($nitem2);
                    
                    if($data1->sortable > $data2->sortable){
                        $sort1 = $data1->sortable;
                        $sort2 = $data2->sortable;
                        dump($nitem.'_'.$sort1 .'>'. $nitem2.'_'.$sort2);
                        dump( $sort1);
                        dump( $sort2);
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
                    $data1 = Post::find($nitem);
                    $data2 = Post::find($nitem2);
                    
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

}
