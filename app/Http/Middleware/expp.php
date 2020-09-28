<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use DB;
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
        $user=Sentinel::getUser();
//echo $permission;
//exit;
         
        if(Sentinel::check() &&  ($user->hasAccess($permission) || $permission == 'index')) {
             $queries = DB::getQueryLog();
           //  dd($queries);
             $id = Sentinel::check()?Sentinel::getUser()->id:null;
         collect($queries)->each(function ($query) use ($id) { 
            $mydata=array(
              "user_id"=>$id,
              "query" =>$query,
            );
          dd($mydata);
               DB::table("querylogtable")->insert($mydata);
               //dd($query);
         });
        return $next($request);
    }

        else return redirect ('/login');
        
    }
}