<?php







namespace App\Http\Controllers;







use Illuminate\Http\Request;



use Sentinel;



use Cartalyst\Sentinel\Checkpoints\ThrottlingException;







class LoginController extends Controller



{



    //







    public function login(){











    	return view('admin.auth.login');



    }



////////////////////////////////////////////////////////



    public function postLogin(Request $request){







   try 	{



 $data=[



    "login"=>$request['email'],



    "password"=>$request['password']







 ];



    if(Sentinel::authenticate($data)){







    return redirect('/adminpanel/');







    } else {



     return redirect()->back()->with(['error'=>'الرجاء التأكد من اسم المستخدم وكلمة المرور']);







    }







} catch (ThrottlingException $e){



	$delay=$e->getDelay();







  return redirect()->back()->with(["error"=>" انت ممنوع من تسجيل الدخول ل $delay ثانية"]);



}



    



    }



////////////////////////////////////////////



    public function logout(){







    Sentinel::logout();

    return redirect('/adminpanel/login');  



    }





    public function lang($id){

        $user =\App\User::find(Sentinel::getUser()->id);

        $user->cplanguage = $id;

        $user->save();



        \App::setLocale(Sentinel::getUser()->cplanguage);

        // dd(\Session::put(['lang' => $id,]));

        return redirect()->back();	

    }



}



