<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\Role;
use \App\Permission;
use \App\Menu;
use DB;

class RoleController extends Controller
{
    //


     public function index(){
   
    return view('admin.role.role_list');

     }

    /////////////////////////////////////////////// 

      public function  roles_list_data(){
        $roles = Role::select(['id', 'slug','name']);

        return Datatables::of($roles)
          ->addColumn('edit', function ($query) {
            $route=  url('/adminpanel/'); 
            return '
              <a class="btn btn-primary btn-sm" href="'.$route.'/roles/'.$query->id.'">
                <i class="fa fa-pencil"></i>
              </a>
              <a class="btn btn-info btn-sm" onclick="role_have('.$query->id.')">
                <i class="fa fa-users"></i>
              </a>
            ';
          })
          ->make(true);

     }        


   ////////////////////////////////////////////////////////  
    public function create(){
     $permissions =	Menu::where('p_id' ,'!=',0)->get();
     return view('admin.role.role_oprations',compact('permissions'));


    }

    public function store(Request $request){


      $this->validate($request, [

            'slug'=>'required|unique:roles',
            'name'=>'required|unique:roles',
          


            ],[

            'slug.required'=>'الرجاء ادخال الاسم',
            'slug.unique'=>'الاسم غير مكرر',
            'name.required'=>'الرجاء ادخال الاسم اللطيف',
            'name.unique'=>'الاسم اللطيف غير مكرر',
            

            ]);


    
     if($request->permissions  != '') { 
     $data1 = array();

        foreach ($request->permissions as $permission){
            $data1[$permission] =true;

          }

           $data['permissions']= json_encode($data1);
        }
        else {
      $data['permissions']= NULL;

        }

       $data['slug']=   $request->slug;
       $data['name']=$request->name;
      
    
         if(Role::create($data)){
       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;

         }else {

       $return=["result"=>"error","response"=>"حدث خطأ فى عملية الاضافة"];
       return  $return;

         }




         
}

////////////////////////////////////////////////////////
public function show($id){

$role=Role::find($id);
return view('admin.role.role_oprations',compact('role'));

}
///////////////////////////////////////////////////////////
public function update(Request $request , $id){

  $role=Role::find($id);


    $this->validate($request, [

            'slug'=>'required',
            'name'=>'required',
          


            ],[

            'slug.required'=>'الرجاء ادخال الاسم',
            'name.required'=>'الرجاء ادخال الاسم اللطيف',
            

            ]);



     if($request->permissions  != '') { 
     $data1 = array();

        foreach ($request->permissions as $permission){
            $data1[$permission] =true;

          }

          $role->permissions= json_encode($data1);
        }
        else {
       $role->permissions= NULL;

        }

        $role->slug =   $request->slug;
        $role->name=$request->name;
      
    
         if($role->save()){
       $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else {

       $return=["result"=>"error","response"=>"حدث خطأ فى عملية التعديل"];
       return  $return;

         }



}


/////////////////////////////////////////////////////////////// --->
public function  role_has_permission ($slug){
    $users = DB::
                table("users")
                ->where('role_users.role_id' , $slug)
                ->leftjoin('role_users' , 'role_users.user_id' , 'users.id')
                ->select('users.*')
                ->get();

    $user_have_permissions=array();

    foreach ($users as $user) {
      array_push($user_have_permissions,$user->id.'-'.$user->full_name);
    }

    return $user_have_permissions;
}

public function remove_role_has_permission($user_id,$slug){
    $users = DB::table("role_users")->where('user_id' , $user_id)->where('role_id' , $slug)->delete();
}


}
