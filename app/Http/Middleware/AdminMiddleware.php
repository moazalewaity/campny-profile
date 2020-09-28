<?php



namespace App\Http\Middleware;



use Closure;

use Sentinel;



class AdminMiddleware

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle($request, Closure $next)

    {

      // user is authnticated
        
        $alllangs = \App\Languages::get();
        view()->share('alllangs', $alllangs);

        $user = Sentinel::getUser();
        $langss = \App\Languages::where('id' , $user->cplanguage)->first();
        // dd($langss->shortname);
        \App::setLocale($langss->shortname);
        view()->share('site_langs', $langss);

          if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') 

        return $next($request);

        else return redirect ('/login');

    }

}

