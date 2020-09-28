<?php



namespace App\Providers;

use App\Department;
use App\Partner;
use App\Setting;
use App\Slider;
use App\Work;
use Illuminate\Support\ServiceProvider;

use DB;

use Monolog\logger;

use Monolog\Handler\StreamHandler;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;



class AppServiceProvider extends ServiceProvider

{

    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        

        $slider = Slider::where('status' , 1)
                        ->where('in_slider' , 1)
                        ->limit(3)
                        ->orderBy('title', 'desc')
                        ->get();
        View::share('slider', $slider);

        $setting = Setting::first();
        $category = Department::get();
        $works = Work::get();
        $partnera = Partner::get();
        View::share('setting', $setting);
        View::share('category', $category);
        View::share('works', $works);

        View::share('partnera', $partnera);

       

    }



    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        //

    }

}

