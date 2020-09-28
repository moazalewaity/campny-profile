<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Sentinel;
use \App\User;
use \App\Role;
use \App\Role_user;
use DB;
use PDO;
use Yajra\Pdo\Oci8;
use Hash;

class RegistartionController extends Controller
{
    public $list_status;
    
	public function regFromArray()
	{
		$userslist=array();
			foreach($userslist as $seller)
			{
				$fullname =explode(' ',$seller[0]);
				$data = [
					'email'    => $seller[1].'@buraqshipping.com',
					'password' => $seller[1],
					'first_name' => $fullname[0],
					'last_name' => $fullname[1], 
					'mobile_no' => $seller[2],
					//'permissions' =>  null,
					'username' => $seller[1],
					'image' => '',
					'sub_permissions'=>'',
					'dep' =>'0',
					'full_name' =>$seller[0],
				];
    
				$user=Sentinel::registerAndActivate($data);
				$this->createSellerFolder($user,1);	
				$role=Sentinel::findRoleBySlug('seller');
				if(isset($role)) $role->users()->attach($user);
			}
	}
    public function register(){
    $roles = Role::all();
    $deps=DB::select("select *  from roles");
    $countries=DB::select("select id, ar_name from country where 1=1 order by ar_name ASC");

    return view('admin.auth.user_operations',compact('roles','deps','countries'));

    }



    public function postRegister(Request $request){
 

    	$this->validate($request, [

            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',


            ],[

            'username.required'=>'الرجاء ادخال اسم المستخدم',
            'username.unique'=>'اسم المستخدم موجود مسبقا',
            'email.required'=>'الرجاء ادخال البريد الالكترونى',
            'email.unique'=>'تم ادخال الايميل مسبقا',
            'first_name.required'=>'الرجاء ادخال الاسم الاول',
            'last_name.required'=>'الرجاء ادخال اسم العائلة',

            ]);

    	if (!empty($request->file('image') ) ) {
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $file_exe = $image->getClientOriginalExtension();
        $new_name = uniqid().'.'.$file_exe;
        $destienation = base_path().'/../public_html'.'/seller/adminpanel/admin/user_image/';
        $image->move($destienation , $new_name);

     }else{

     	 $new_name='not_found';
     }

////////////////////////////////////////////////////////////
        $data1 = array();
         if($request->permissions  != '') {
         foreach (json_decode($request->permissions) as $permission){
         $data1[$permission] =true;
        }
        $permissions= $data1;  

      } else {

        $permissions= null ; 
     }
   

    $data = [
		'email'    => $request->email,
		'password' => $request->password,
		'first_name' => $request->first_name,
		'last_name' => $request->last_name, 
		'mobile_no' => '',
		'permissions' =>  $permissions,
		'username' => $request->username,
		'image' => $new_name,
		'sub_permissions'=>'',
		'full_name' =>$request->first_name." ".$request->last_name,
	];
       

    
    	$user=Sentinel::registerAndActivate($data);
       if($request->roles  != '') {
         foreach (json_decode($request->roles) as $role) {
			 
			 switch($role)
			 {
				  case 'seller': $this->createSellerFolder($user,1);	break;
				  case 'clearance': $this->createSellerFolder($user,2);	break;
				  case 'freight': $this->createSellerFolder($user,3);	break;
			 }
			 
			$role=Sentinel::findRoleBySlug($role);
			 if(isset($role)) $role->users()->attach($user);
		 }
     	}

       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;
       
}

///////////////////////////////////////////
public function createSellerFolder($user,$root)
{
	$folder=DB::select("select id from CLOUD_STORAGE_FOLDER where username= ? and name=? and isroot=?",[$user->username,$user->username,$root]);
	if(count($folder)==0)
	{
		$data2=DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status,isroot) values (?,?,?,?,?,now(),?,?,?) ",[$user->username,0,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1',$root]);
		$lastid=DB::select("select max(id) maxid from CLOUD_STORAGE_FOLDER where username= ? and name=? and isroot=?",[$user->username,$user->username,$root]);
		$folderid=$lastid[0]->maxid;
		switch($root)
		{
		    case '1':
		        DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['کشف الطلبیات السابقه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['کشف الطلبیه الحالیه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['کشف حساب',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
		    break;
		    case '2':
		        DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['شحنات سابقه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['شحنات حالیه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['کشف حساب',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
		    break;
		    case '3':
		        DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['شحنات سابقه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['شحنات حالیه',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
                DB::insert("insert into CLOUD_STORAGE_FOLDER (name,pid,userid,username,depid,adddate,ipaddress,status) values (?,?,?,?,?,now(),?,?) ",['کشف حساب',$folderid,$user->id,$user->username,'0',$_SERVER['REMOTE_ADDR'],'1']);
		    break;
		}
	}else
	{
		$folderid=$folder[0]->id;
	}
	
	$share=DB::select("select folder_id from CLOUD_STORAGE_SHARING where folder_id= ? and permission=7 and user_id=0 and owner_id=?",[$folderid,$user->id]);
	if(count($share)==0) $data2=DB::insert("insert into CLOUD_STORAGE_SHARING (folder_id,user_id,type,permission,owner_id,ipaddress,root) values (?,?,?,?,?,?,?)",[$folderid,0,1,7,$user->id,$_SERVER['REMOTE_ADDR'],$root]);	
}

//////////////////////////////////////display all user/////////////////////////////
    public function  users_list(){
        $list_url = 'user_list';
        $list_data_url = 'users_list';
        $list_title = 'قائمة المستخدمين';
        $this->list_status = '1';
        return view('admin.auth.user_list' ,compact('list_url','list_data_url' , 'list_title'));
    }
    public function  users_remove_list(){
        $list_url = 'user_remove_list';
        $list_data_url = 'users_remove_list';
        $list_title = 'قائمة  المحذوفين';
        $this->list_status = '0';
        return view('admin.auth.user_list',compact('list_url','list_data_url' , 'list_title'));
    }
////////////////////////////////////////////////////////////
     public function  users_remove_list_data(Request $request){
        $this->list_status = '0';
        return $this->users_data($request);
     }
     public function  users_list_data(Request $request){
        $this->list_status = '1';
        return $this->users_data($request);
     }
     public function  users_data($request){
            $users = User::
                    leftjoin('activations' , 'activations.user_id' , 'users.id')
                    ->leftjoin('role_users' , 'role_users.user_id' , 'users.id')
                    ->leftjoin('roles' , 'roles.id' , 'role_users.role_id')
                    ->orderby('role_users.role_id')
                    ->select('users.id','activations.completed','roles.name as role_name' , 'roles.id as role_id',  'users.username','users.first_name' , 'users.last_name', 'users.image', 'users.full_name');

            if($this->list_status == 0){
                $users->where('activations.completed' , '0');
                $users->orwhere('activations.completed' , null);
            }else{
                $users->where('activations.completed', '1');
            }
        return Datatables::of($users)
         ->filter(function ($query) use ($request) {
                if (!empty($request->columns[1]['search']['value']) ) {
                    $username=$this->filterText($request->columns[1]['search']['value']);
                    $query->whereRaw($this->filterTextDB("users.first_name||' '||users.last_name ")." like ?", ["%{$username}%"]);
                }
            })
        ->addColumn('statuss', function($row){
            $checked = ' ';
            if($row->completed == 1){
              $checked = 'checked';
            }
            
            $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
            
            return $p;
        })

        ->addColumn('fullname', function ($query) {
            // if($query->first_name == 'empty'){
                $url= $query->full_name;
            // }else{
            //     $url= $query->first_name.' '.$query->last_name;
            // }
            return $url;
        })
        ->addColumn('edit', function ($query) {
            $url=url('/adminpanel/');
            return '<a class="btn btn-primary btn-sm"  href="'.$url.'/user/user_view/'.$query->id.'">
            <i class="fa fa-pencil"></i></a>
            <a class="btn btn-info btn-sm loading" onclick="user_image(this , '.$query->username.')"><span><i class="fa fa-camera"></i></span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></a>';
        })
        ->addColumn('personal_photos', function($row){
            $url=url('/admin/user_image');
          //dd($row->image);
            if(true){
              $FolderPath = public_path().'/admin/user_image/'.$row->image;
			  //dump($FolderPath);
                if(file_exists($FolderPath)){
                    $img = '<img src="'.$url.'/'.$row->image.'"/>';
                    //$img .= '<span>'.$image->last_update_dt.'</span>';
                }else{
                    $img = '';
                }
            }else{
              $img = '';
            }
            //dd($img);
            return '<span id="'.$row->username.'">'.$img.'</span>';
        })
        ->make(true);
    }        
    public function user_image ($id){

        
            $url=url('/admin/user_image');
            // ini_set('max_execution_time', 180);
        return '<img src="'.$url.'/'.$id.'.jpg"/>';
    }
    public function changestatus($id , $state){
        $data = \DB::table('activations')->where('user_id',$id)->first();
        if(!$data){
            $user = Sentinel::findById($id);
            $create = \Activation::create($user);
        }
        if(!\DB::table('activations')->where('user_id',$id)->update(['completed' => $state])){
            return response()->json('error' , 500);
        }
        return response()->json('success' , 200);
    }
///////////////////////////view user data to delete update/////////////////////////////  
 public function user_view($id){

    $user=User::find($id);
    $roles=Role::all();
     $deps=DB::select("select *  from roles");
      $countries=DB::select("select id, ar_name from country where 1=1 order by ar_name ASC");
    return view ('admin.auth.user_operations',compact('user','roles','deps','countries'));


 }  
/////////////////////////////////////////////////// 


  public function user_update(Request $request, $id){

    $user=User::find($id);
    $oldimage = $user->image;

    $this->validate($request, [
            'username'=>'required',
            'email'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            ],[
            'username.required'=>'الرجاء ادخال اسم المستخدم',
            'email.required'=>'الرجاء ادخال البريد الالكترونى',
            'first_name.required'=>'الرجاء ادخال الاسم الاول',
            'last_name.required'=>'الرجاء ادخال اسم العائلة',
            ]);
    
    if (!empty($request->file('image') ) ) {
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $file_exe = $image->getClientOriginalExtension();
        $new_name = uniqid().'.'.$file_exe;

        $FolderPath = public_path().'/admin/user_image/';
            if(!file_exists($FolderPath)){
                $result = File::makeDirectory( $FolderPath , 0775, true, true);
            }
        $image->move($FolderPath , $new_name);
     }else{
         $new_name=$oldimage;
     }
/////////////////////////////////////////////////////////////////
     if($request->password === ''){
        $password = $user->password;
     }
     else{
        $password = bcrypt($request->password);
     }
        
        
        $user->username=$request->username;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->mobile_no='0';
        $user->email=$request->email;
        $user->image=$new_name;
        $user->password = $password;
        $user->full_name = $request->first_name."  ".$request->last_name;


         if($user->save()){
      $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }
    


 }  

////////////////////////////////////////////////////////////////////

 public  function update_permission(Request $request,$id){

    $data1 = array();
        foreach (json_decode($request->permissions) as $permission){
            $data1[$permission] =true;

          }
    $data2=array();
    /*foreach (json_decode($request->unpermissions) as $unpermission){
            $data1[$unpermission] =false;

          }*/
/**/
      $result = array_merge($data1, $data2);    
          

       $user=User::find($id);
     
       $user->permissions= json_encode($result);   
    
           if($user->save()){
      $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

}


//////////////////////////////////////////////////////
public function update_role(Request $request,$id){

    $user=User::find($id);
    Role_user::where('user_id','=',$id)->delete();

    if($request->roles  != '' ) {
        foreach (json_decode($request->roles) as $role) {
		switch($role)
			 {
				  case 'seller': $this->createSellerFolder($user,1);	break;
				  case 'clearance': $this->createSellerFolder($user,2);	break;
				  case 'freight': $this->createSellerFolder($user,3);	break;
			 }	
        if($role  != ''  || $role != null){   
        $role=Sentinel::findRoleBySlug($role);
         if(isset($role)) $role->users()->attach($user);
     }
 }
 
     }

       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;



}

///////////////////////experment////////////////////////////////////
public function download()
     {
        //display all types of reports from database name downloads
        
        $reports = DB::table('users')->get();  
       return view('admin.gov.exp1',compact('reports'));
     }

//////////////////////////update_password////////////////////////////////////////// 

public function update_password(){
return view('admin.auth.update_password');

}  
////////////////////////////////////////  
public function updatePassword(Request $request){


    $this->validate($request, [

            'old_password'=>'required',
            'password'=>'required',
            're_password'=>'required',
            


            ],[

            'old_password.required'=>'الرجاء ادخال كلمة المرور القديمة',
            'password.required'=>'الرجاء ادخال كلمة المرور الجديدة',
            're_password.required'=>'الرجاء ادخال تأكيد كلمة المرور',
            

            ]);   
 $user_id=Sentinel::getUser()->id;
 $user=User::find($user_id);
 if(Hash::check($user->password, $request->password)){
 $return=["result"=>"error","response"=>"كلمة المرور القديمة غير صحيحة"];
       return  $return;

 }

 elseif($request->password !== $request->re_password){
  $return=["result"=>"error","response"=>"كلمة المرور وتأكيدها غير متطابقتين "];
       return  $return;  
 }

 else {
    $user->password = bcrypt($request->password);
    if($user->save()){

         $return=["result"=>"ok","response"=>"تم تغير كلمة المرور بنجاح"];
       return  $return; 


    }

         
 }

}
///////////////////////////////مش مستخدمة //////////
public function migrate_data(){

     ini_set('max_execution_time','300');
///////////////////insert not found////
     $data=DB::connection('oracle')->select("select * from users  ");

      foreach($data as $row)
  {  

    //echo $row->id;

    $user=DB::connection('laila')->select('select count(*) counter from users where id= ?',[$row->id]);
    if($user[0]->counter == 0)  {

        //echo "hi";

        

        DB::connection('laila')->insert(
     "insert into users(id, email, username , mobile_no , password , image , permissions , sub_permissions  , first_name , last_name , fullname) values(?,?,?,?,?,?,?,?,?,?,?)",
    [$row->id,$row->email, $row->username , $row->mobile_no , $row->password , $row->image , $row->permissions , $row->sub_permissions  , $row->first_name , $row->last_name , $row->first_name." ".$row->last_name]);


    }
    else {

            DB::connection('laila')->update(
     "update  users set email=?, username=? , mobile_no=? , password=? , image=? , permissions=? , sub_permissions=?    , first_name=? , last_name=? , fullname=? where id=?",
    [$row->email, $row->username , $row->mobile_no , $row->password , $row->image , $row->permissions , $row->sub_permissions   , $row->first_name , $row->last_name , $row->first_name." ".$row->last_name,$row->id]);
    }


  }


 
}


///////////////////////////////مين المستخدمين المالكين للصلاحية ///////////
public function  user_has_permission ($slug){
    $users = DB::
                table("users")
                ->leftjoin('role_users' , 'role_users.user_id' , 'users.id')
                ->leftjoin('roles' , 'roles.id' , 'role_users.role_id')
                ->where('users.permissions', 'like', "%" . $slug . "%")
                ->orwhere('roles.permissions', 'like', "%" . $slug . "%")
                ->select('users.*','roles.permissions as roles_permissions')
                ->get();
    // dd($users);
    // $users = DB::table('users')->where('permissions' , '!=' ,'null')->where('permissions' , '!=' ,'[]')->select('id' , 'full_name')->get();
    // // dd($users);
    // // $users=DB::connection("minstrey")->select("select id , full_name from users where permissions is not null ");
    $user_have_permissions=array();
    // foreach ($users as $user) {
    //     $user_data=\Sentinel::findById($user->id);
    //     if($user_data->hasAccess($slug)){
    //          array_push($user_have_permissions,$user->id.'-'.$user->full_name);
    //     }
    // }
    // $users_role = DB::table('roles')->where('permissions' , '!=' ,'null')->select('id' , 'name')->get();
    // // dd($users_role);
    // $user_role_have_permissions=array();
    foreach ($users as $user) {
        $user_data = \Sentinel::findById($user->id);
        if($user_data->hasAccess($slug)){
             array_push($user_have_permissions,$user->id.'-'.$user->full_name);
        }
    }

    return $user_have_permissions;

}



//////////////////////////////////إزالة الصلاحية من مستخدم ///////
public function remove_permission($user_id,$slug)
{
    $user = Sentinel::findById($user_id);
    $user->addPermission($slug , 'false')->save();
}

/////////////////////////////////////////////////////////////// --->
public function  role_has_permission ($slug){
    // dd($slug);
    $users = DB::
                table("users")
                ->where('role_users.role_id' , $slug)
                ->leftjoin('role_users' , 'role_users.user_id' , 'users.id')
                ->select('users.*')
                ->get();
    // dd($users);
    $user_have_permissions=array();
    foreach ($users as $user) {
        // $user_data = \Sentinel::findById($user->id);
        // if($user_data->hasAccess($slug)){
             array_push($user_have_permissions,$user->id.'-'.$user->full_name);
        // }
    }
    return $user_have_permissions;
}
public function remove_role_has_permission($user_id,$slug){
    $users = DB::table("role_users")->where('user_id' , $user_id)->where('role_id' , $slug)->delete();
}


/////////////////////////////////////////////////////////

}