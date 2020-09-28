<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Concat;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Service;
use App\Setting;
use App\Slider;
use App\Team;
use App\Traits\ApiResponser;
use App\Work;

class HomeController extends Controller
{
    use ApiResponser;

    public function top_Slider()
    {
       $slider = Slider::where('status' , 1)
                        ->where('in_slider' , 1)
                        ->limit(3)
                        ->orderBy('title', 'desc')
                        ->get();
      return response()->json($slider , 200);
    }

    public function slideOne()
    {
       $data = Slider::where('status' , 1)
                        ->where('in_slider' ,0)
                        ->limit(1)
                        ->orderBy('title', 'desc')
                        ->get();
         // return $this->showAll($data);
         return response()->json(['data' => $data] , 200);
    }


    public function top_services()
    {
       $data = Service::where('status' , 1)
                        ->limit(3)
                        ->orderBy('title', 'desc')
                        ->get();
       return response()->json($data , 200);
    }


    public function clients()
    {
       $data = Client::limit(3)
                        ->orderBy('name', 'desc')
                        ->get();
       return response()->json($data->toArray() , 200);
    }

    public function works()
    {
       $data = Work::orderBy('id', 'desc')
                       ->with('category')
                        ->get();
       return response()->json($data , 200);
    }

    public function work($id)
    {
       $data = Work::find($id);
       return response()->json($data , 200);
    }
    public function catgory()
    {
       $data = Department::where('parentid' , 0)->where('status',1)->get();
       return response()->json($data , 200);
    }

    public function page($id)
    {
      //  $data = Post::join('post_lang', 'post_lang.postid', '=', 'post.id')->where('post.id' , $id)->get();
      // $data = Post::query()
      //       ->leftjoin('post_lang','post_lang.postid','=',$id)
      //       ->select('*')
      //       // ->where('post0.id',$id)
      //       ->where('post.status' ,'!=', '9');
      $data = Post::join('post_lang', 'post_lang.postid', '=', 'post.id')->find($id);

      return response()->json($data->toArray() , 200);

    }


    public function posts()
    {
       $data = Post::join('post_lang', 'post_lang.postid', '=', 'post.id')
                   ->where('post.depid' , 28  )
                   ->OrWhere('post.depid' , 29  )
                   ->get();

       return response()->json($data , 200);
    }

    public function post($id)
    {
      //  $data = Post::find($id  ) ->join('post_lang', 'post_lang.postid', '=', 'post.id')
                  //  ->where('post.depid' , 28  )
                  //  ->OrWhere('post.depid' , 29  )
                  //  ->where('post.id' , $id  )                   
                  //  ->get();
                  $data = Post::join('post_lang', 'post_lang.postid', '=', 'post.id')->find($id+1);

       return response()->json($data->toArray() , 200);
    }

    public function postsLimt()
    {
       $data = Post::join('post_lang', 'post_lang.postid', '=', 'post.id')
                   ->where('post.depid' , 28  )
                   ->OrWhere('post.depid' , 29  )
                   ->limit(3)
                   ->get();

       return response()->json($data , 200);
    }
    

    public function concat(Request $request)
    {
       $concat = Concat::create( $request->all() );
       return response()->json($concat , 200);
    }



    public function team()
    {
       $data = Team::limit(3)
                        ->orderBy('name', 'desc')
                        ->get();
       return response()->json($data , 200);
    }

    public function setting()
    {
       $data = Setting::first();
       return response()->json($data , 200);
    }

}
