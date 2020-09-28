<?php



namespace App\Http\Middleware;



use Closure;

use Sentinel;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\checkThrottlingException;


use Request;

use \App\Tracking_user;

use \App\Menu;

use View;



class UserMiddleware

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle($request, Closure $next,$permission)
    {
           
           // echo 'loggedin';exit; 
            
               //   echo $permission;
            
            // if ( !empty ( $permission ) ) {
            
                   view()->share('g_perm', $permission); //}
            
              // else {
            
               //   view()->share('g_perm', ''); 
            
              // }    
            
            
            
                     $user=Sentinel::getUser();
            
                   	
            
            		$menuPer=Menu::where('slug','=',"$permission")->get(); 
            
                     
                // dump(Sentinel::check());
                // dump($user);
                // dump($user->hasAccess($permission));
                // dump($permission);
                // dump($menuPer[0]->ignore_permission);

            if(Sentinel::check() && ($user->hasAccess($permission) || $permission == 'index' || $menuPer[0]->ignore_permission==1)) {
                      // echo "exit";
                        // exit();
            
                     
            
            
            
            
            
            		setcookie('userid', $user->id, time()+3600*24*30);
            
                    $menu=Menu::where('slug','=',"$permission")
            
                              ->where('tracking','=',1)->take(1)->get(); 
            
                           if ($menu->isEmpty()) {
            
            
            
                           }
            
                           else{
            
                    $all_request=json_encode($request->all());
            
                    $user_id=Sentinel::getUser()->id;
            
                    $ip=Request::ip();
            
                    $browser= $_SERVER['HTTP_USER_AGENT'] . "\n\n";
            
                    $url=$_SERVER['REQUEST_URI'];
            
                    $mydata=array('request_data'=>$all_request,
            
                                   'ip' =>$ip,
            
                                   'browser'=>$browser,
            
                                   'user_id' =>$user_id,
            
                                    'request_url'=>$url,
            
                                    '$permission'=>$permission  );
            
                    
            
                    
            
                   // View::share('g_perm', $g_perm);
            
                    Tracking_user::create($mydata);
            
                }
            
                   
            
                    $alllangs = \App\Languages::get();
                    view()->share('alllangs', $alllangs);
            
                    $user = Sentinel::getUser();
                    // dd($user);
                    $langss = \App\Languages::where('id' , $user->cplanguage)->first();
                    // dd($langss);
                    \App::setLocale($langss->shortname);
                    view()->share('site_langs', $langss);
            
                   
                    // dd('finish');
            
            
                    return $next($request);
    }
        else return redirect ('/adminpanel/login');
        
    }

    public function get_mac($REMOTE_ADDR){
      $macs = explode(' ', exec('arp -a '.$REMOTE_ADDR));
	  //dd($macs);
      $mac = '';
      if(isset($macs)){
        if(isset($macs[12])) if($macs[12]!='') $mac = $macs[12];
        else if(isset($macs[11])) if($macs[11]!='') $mac = $macs[11];
      }
      return $mac;
    }
}