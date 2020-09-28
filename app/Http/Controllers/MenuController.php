<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\Menu;
use DB;
use \App\User;
use Sentinel;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view ('admin.menu.menu_list');
    }

  public function menu_list(){

    
    $menus=DB::table('menus')
            ->leftjoin('menus as father ', 'menus.p_id', '=', 'father.id')
            ->select('menus.id as menu_id ', 'menus.title', 'father.title as father_menu')
            ->get();

          return Datatables::of($menus)->filterColumn('menu_id', function($query, $keyword) {
                $query->whereRaw("CONCAT(menus.id,'-',menus.id) like ?", ["%{$keyword}%"]);
            })->addColumn('edit', function ($menu) {
        return '<a class="btn btn-primary btn-sm "  href="menus/'.$menu->menu_id.'" >
        <i class="fa fa-pencil"></i></a>';
            }) ->make(true);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $menus=Menu::get();

     return view ('admin.menu.menu_operations',compact('menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();
        if(Menu::create($data)){

             $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
            return  $return;
        }else {
             $return=["result"=>"error","response"=>"حدث خطأ ما"];
            return  $return;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $menu=Menu::find($id);
        $menus=Menu::get();
        return view('admin.menu.menu_operations',compact('menu','menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $menu=Menu::find($id);
            $menu->slug=$request->slug;
            $menu->title=$request->title;
            $menu->url=$request->url;
            $menu->icon=$request->icon;
            $menu->visible=$request->visible;
            $menu->p_id=$request->p_id;
            $menu->functions =$request->functions;
            $menu->sub_permission=$request->sub_permission;
            $menu->tracking=$request->tracking;
            $menu->ignore_permission=$request->ignore_permission;
            $menu->typeoflink=$request->typeoflink;
            $menu->color=$request->color;

            

            if($menu->save()){

             $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

            
                
                    
                        
                            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
////////////////////////////////////////////////////////
   public function display_prog_num ($id,$userid){
  $result='';
  $data=Menu::find($id);
  $sub_permission=$data['sub_permission'];
  $json=json_decode($sub_permission);
////////////////////////////////////////////////////////////////////////
  $user_sub_permission=User::find($userid);

     $prog_nums=$user_sub_permission->sub_permissions; 

    
     $list=array();
     if ($prog_nums == '')  {

     }else {
    $jsondata=json_decode($prog_nums);
     foreach ($jsondata as $key => $value) {
       if ($key =='27') {          
       $list=$value->prog_num;
      }}
  }

     
      
//////////////////////////////////////////////////////////////////////  
foreach ($json as $key => $value) {

     switch ($key ) {
     case 'checkbox':
        // echo $value->table.'-'.$value->id.'-'.$value->title;
         $datas=DB::select("select ".$value->id." id,".$value->title." title from ".$value->table." order by ".$value->title);
         $main_title=$value->main_title;
         $mkey=$value->key;
         $result.=view('admin.menu.grand',compact('datas','main_title','mkey','list'));

        



         
     break;
     
     default:
         # code...
         break;
 }

    # code...
}

 //  var_dump($json);
return $result;

   }
//////////////////////////////////////////////////
   public function prog_num_permission($id,Request $request){
$submenue_id=$request->submenue_id;
$result='{"'.$submenue_id.'":{';
$menu=Menu::find($submenue_id);

$sub_permission=$menu['sub_permission'];
  $json=json_decode($sub_permission);
  foreach ($json as $key => $value) {

     switch ($key ) {
         case 'checkbox':     
             $mkey=$value->key;
             $list='';
             foreach ($request[$mkey] as $value) {
                 $list.='"'.$value.'",';
             }
            $list=trim($list,',');


             
             $result.='"'.$mkey.'":['.$list.'],';
         break;
         
         default:
             # code...
             break;
     }

    # code...
    }

$result=trim($result,',');
$result.="}}";
$new_value=null;
$json_new=json_decode($result);
foreach ($json_new as $key => $value) {
        if($key==$submenue_id)
        {
            $new_value=$value;

        }
    }

$user=User::find($id);
//var_dump($new_value);
//exit;
$isUpdate=false;
$sub_permissions_old=$user->sub_permissions;
if($sub_permissions_old != '')
{
    $json_old=json_decode($sub_permissions_old,true);
    foreach ($json_old as $key => $value) {
        if($key==$submenue_id)
        {
            $key= $new_value;
            $isUpdate=true;
          //  echo "hiiii";
        }
    }

    if (true ){ 
 //echo "hi";
       
        $json_old[$submenue_id]= $new_value;
        $isUpdate=true;

    }
}

//var_dump($json_old);
//exit;

if($isUpdate)
$user->sub_permissions=json_encode($json_old);
else
$user->sub_permissions=$result;

 if($user->save()){

             $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

 }
/////////////////////////////////////////////////////
}
