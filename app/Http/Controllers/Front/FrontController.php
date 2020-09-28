<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use File;
use Sentinel;
use View;
use PDO;



class FrontController extends Controller
{

    public function __construct()
    {
    	$sitesetting = \App\Department::
    		where('department.id' ,'-1')
    		->where('department_lang.langid' ,'2')
    		->where('post_lang.langid' ,'2')
    		->leftjoin('department_lang' , 'department_lang.depid' ,'department.id')
    		->leftjoin('post' , 'post.depid' ,'department.id')
    		->leftjoin('post_lang' , 'post_lang.postid' ,'post.id')
    		->select('department.*' , 'department_lang.*', 
    			'post_lang.summary as post_summary',
    			'post_lang.description as post_description',
    			'post_lang.keywords as post_keywords'
			)
    		->orderBy('sortable' , 'DESC')
    		->first();

    		$siteoption = \App\Post::
	    		where('post.depid' , '-1')
	    		->leftjoin('post_options' , 'post_options.postid' , 'post.id')
	    		->leftjoin('options_list' , 'options_list.id' , 'post_options.optnid')
	    		->select('post_options.*' , 'options_list.name as name_lang')
	    		->orderBy('sortable' , 'DESC')
	    		->get();

    		$menu = $this->Department_select('mini' , null)
		    			->where('department.parentid' , '231')
			    		->orderBy('sortable' , 'DESC')
		    			->get();

    			for ($i=0; $i < sizeof($menu) ; $i++) { 
    				$submenu = $this->posts_select('mini')
		    			->where('post.depid' , $menu[$i]->id)
		    			->limit(10)
		    			->get();

		    		$menu[$i]['submenu'] = $submenu;
    			}
    		// dd($menu);
    		
    		$important_news = \App\Department::
    			where('department.parentid' , '229')
    			->where('department.status' , '1')
    			->where('post.status' , '1')
    			->where('post_lang.langid' , '2')
	    		->leftjoin('post' , 'post.depid' , 'department.id')
	    		->leftjoin('post_lang' , 'post_lang.postid' , 'post.id')
	    		->select('department.id' , 'post.id', 'post.insertdate' , 'post_lang.title' ,\DB::raw("(CASE post.contype WHEN '10' THEN embed ELSE CONCAT(post_lang.slug,'-',post.id,'.html') END) as url_title"))
	    		->orderBy('post.insertdate' , 'DESC')
    			->limit(10)
    			->get();

    		$widget_5 = $this->Department_select('mini' , null)
		    			->where('department.parentid' , '229')
			    		->orderBy('department.sortable' , 'DESC')
		    			->get();

	    		for ($i=0; $i < sizeof($widget_5) ; $i++) { 

					$widget_post = $this->posts_select('medium')
					    			->where('post.depid' , $widget_5[$i]->id)
					    			->limit(4)
					    			->get();
		    		$widget_5[$i]['posts_all'] = $widget_post;
	    		}

    		$widget_6 = $this->Department_select('mini' , null)
		    			->where('department.parentid' , '269')
			    		->orderBy('department.sortable' , 'ASC')
		    			->get();

	    		for ($i=0; $i < sizeof($widget_6) ; $i++) { 
					$widget_post = $this->posts_select('medium')
		    			->where('post.depid' , $widget_6[$i]->id)
		    			->limit(4)
		    			->get();

		    		$widget_6[$i]['posts_all'] = $widget_post;
	    		}

	    	$review_post = $this->posts_select('con6')
		    			->where('post.contype' , '6')
			    		->leftjoin('post_options' , 'post_options.postid' , 'post.id')
		    			->first();

	    	$review_row = \App\PostLinks::
		    			where('postid' , $review_post->id)
		    			->where('status' , '1')
			    		->orderBy('id' , 'ASC')
		    			->get();
			    $sump = 1;
			    for ($i=0; $i < sizeof($review_row) ; $i++) { 
			    	$sump += $review_row[$i]->reviews;
			    }

			    for ($i=0; $i < sizeof($review_row) ; $i++) {
			    	$range = 0;
			    	$range = ($review_row[$i]->reviews / $sump) * 100 ;
			    	$review_row[$i]['range'] = number_format($range , 1);
			    }

		    $images_post = \App\Post::
		    			where('post.status' , '1')
		    			->where('post.contype' , '3')
			    		->orderBy('sortable' , 'DESC')
		    			->first();

	    	$images_row = \App\PostGallery::
		    			where('postid' , $images_post->id)
		    			->where('status' ,'!=' , '9')
			    		->orderBy('id' , 'DESC')
			    		->limit('12')
		    			->get();

		$timeline = $this->Department_select('mini' , '260')
					->first();

    	$timeline_posts =$this->posts_select('mini')
	    			->where('post.depid' , '260')
	    			->limit(4)
	    			->get();

	    	// dd($timeline_posts);

	    	$class_body = 'page page-id-493 page-template page-template-page_builder page-template-page_builder-php';
	    	$main_class = 'page-content-wrap';

    		View::share('class_body' , $class_body);
    		View::share('main_class' , $main_class);

    		View::share('timeline_posts' , $timeline_posts);
    		View::share('timeline' , $timeline);
    		View::share('widget_6' , $widget_6);
    		View::share('review_post' , $review_post);
    		View::share('images_row' , $images_row);
    		View::share('images_post' , $images_post);
    		View::share('review_row' , $review_row);
    		View::share('siteoption' , $siteoption);
    		View::share('sitesetting' , $sitesetting);
    		View::share('menu' , $menu);
    		View::share('important_news' , $important_news);
    		View::share('widget_5' , $widget_5);
    		setlocale(LC_TIME, 'ar_AE.UTF-8');


    }

    public function posts_select($colums ='mini'){
    	$langid='2';
    	$mainColums=array('post.id', 'post_lang.title', 'post.insertdate',\DB::raw("(CASE post.contype WHEN '10' THEN embed ELSE CONCAT(post_lang.slug,'-',post.id,'.html') END) as url_title"));
    	$sql = \App\Post::
	    			where('post.status' , '1')
		    		->orderBy('sortable' , 'DESC')
	    			->where('post_lang.langid' , 	$langid)
		    		->leftjoin('post_lang' , 'post_lang.postid' , 'post.id');

		    switch ($colums) {
		    
		    	
		    	case 'mini':
		    		 $allColums=array_merge($mainColums);
		    		break;
		    	
		    	case 'medium':
		    	    $extraColums=array('post.views','post.rating', 'post.image','post_lang.summary');
		    	    $allColums=array_merge($mainColums,$extraColums);
		    		break;
		    	
		    	case 'full':
		    	    $extraColums=array('post.views','post.contype', 'post.image', 'department_lang.title as de_name', 'department_lang.depid as de_id','post_lang.summary');
		    	    $allColums=array_merge($mainColums,$extraColums);
		    		break;
		    		
		    		case 'con6':
		    		    $extraColums=array('post.views');
		    	        $allColums=array_merge($mainColums,$extraColums);
		    		break;
		    	
		    	case 'contype7':
		    	    $extraColums=array('post.views',\DB::raw('get_options_val(post.id,27,'.$langid.') as youtube'), 'post.image','post_lang.summary');
		    	    $allColums=array_merge($mainColums,$extraColums);
		    		break;
		    }
		    
		    $sql->select($allColums);

	    return $sql;
    }

    public function Department_select($colums ='mini' , $id){
    	$sql = \App\Department::
				where('department.status' , '1')
		    	->where('department_lang.langid' , '2')
		    	->leftjoin('department_lang' , 'department_lang.depid' , 'department.id');

		    	if($id != null){
					$sql->where('department.id' , $id);
		    	}

		    switch ($colums) {
		    	case 'mini':
		    		$sql->select('department.*' , 'department_lang.title');
		    		break;
		    }

	    return $sql;
    }

    public function resize_image($file ,$newimg, $w, $h, $crop=false) {
	    list($width, $height) = getimagesize($file);
	    $r = $width / $height;
	    if ($crop) {
	        if ($width > $height) {
	            $width = ceil($width-($width*abs($r-$w/$h)));
	        } else {
	            $height = ceil($height-($height*abs($r-$w/$h)));
	        }
	        $newwidth = $w;
	        $newheight = $h;
	    } else {
	        if ($w/$h < $r) {
	            $newwidth = $h*$r;
	            $newheight = $h;
	        } else {
	            $newheight = $w/$r;
	            $newwidth = $w;
	        }
	    }


		$file_dimensions = getimagesize($file);
		$file_type = strtolower($file_dimensions['mime']);

		// dd($file_type);
	    if ($file_type=='image/jpeg'||$file_type=='image/pjpeg'){
		    if(imagecreatefromjpeg($file)){
		        $src = imagecreatefromjpeg($file);
		    }
		}else if ($file_type=='image/png'||$file_type=='image/ppng'){
		    if(imagecreatefrompng($file)){
		        $src = imagecreatefrompng($file);
		    }
		}

	    // $src = imagecreatefromjpeg($file);

	    $dst = imagecreatetruecolor($newwidth, $newheight);
	    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	    imagejpeg( $dst, $newimg, 100 );
	    // dd(imagejpeg( $dst, $file, 100 ));
	    // $out_image=addslashes(file_get_contents($file));
	    // dd($out_image);

	    // imagedestroy($file);
		// imagedestroy($dst);
	    // return $dst;
	}

    public function images($size = null , $folder = null , $month = null , $file = null){
    	// dd($folder);
    	//dump(public_path().'/front/images/');
    	if($file){
	    	$img_res = public_path().'/front/images/'.$size.'/'.$folder.'/'.$month.'/'.$file;
	    	$img_old = public_path().'/media/post/gallery/'.$folder.'/'.$month.'/'.$file;
	        $newimg = parse_url($img_res, PHP_URL_PATH);
	        $find_img =  parse_url($img_old, PHP_URL_PATH);
    	}
    	//dd($newimg);
    		$img_none = public_path().'/media/none.jpg';
	        $none_image = parse_url($img_none, PHP_URL_PATH);
    	

    	if($size){
    		if($size == 'full'){
    			$sizeo = explode('x', '800x400');
    		}else{
    			$sizeo = explode('x', $size);
    		}
    	}

    	if(isset($sizeo)){
    		$FolderPath = public_path().'/'.'front/images/'.$size.'/'.$folder.'/'.$month;
			if(!file_exists($FolderPath)){
		        File::makeDirectory( $FolderPath , 0775, true, true);
		    }
    	}
		

    	if(isset($newimg)){
	        if (!file_exists($newimg)) {
		        if (file_exists($find_img)) {
		        	if(isset($sizeo)){
		                $success = \File::copy( $find_img , $newimg);
			        	$img = $this->resize_image($find_img,$newimg, $sizeo[0], $sizeo[1]);
		        		// dd($sizeo);
		        	}else{
		        		$img = $this->resize_image($find_img,$newimg, $sizeo[0], $sizeo[1]);
		        		// return response()->file($find_img);
    					return $img->response();
		        	}
		        }else{
		        	if(isset($sizeo)){
	                	$success = \File::copy( $none_image , $newimg);
		        		$img = $this->resize_image($none_image,$newimg, $sizeo[0], $sizeo[1]);
		        		// dd($none_image);
		        		// dd($newimg);
		        	}else{
		        		return response()->file($none_image);
		        	}
		        }
	        }
    	}else{
        	if(isset($sizeo)){
            	$success = \File::copy( $find_img , $newimg);
        		$img = $this->resize_image($none_image,$newimg, $sizeo[0], $sizeo[1]);
        	}else{
        		return response()->file($none_image);
        	}
    	}

    	// dump('asd');
    	// dd($img);

    	if($img == null){
    		return response()->file($newimg);
    	}
    	return $img->response();

    }

    public function index(){

		$main_row = $this->Department_select('mini' , '224')
					->first();

    	$slides_row =  $this->posts_select('medium')
	    			->where('post.depid' , '224')
	    			->limit(4)
	    			->get();

    	$images_rows = $this->posts_select('medium')
	    			->where('post.depid' , '224')
	    			->limit(4)
	    			->offset(4)
	    			->get();

		$dep = $this->Department_select('mini' , '225')
					->first();

    	$post_main = $this->posts_select('medium')
	    			->where('post.depid' , '225')
	    			->first();

	    $dep['post_main'] = $post_main;
    	$post_row = $this->posts_select('medium')
	    			->where('post.depid' , '225')
	    			->limit(4)
	    			->offset(1)
	    			->get();

		$module_classic = $this->Department_select('mini' , '259')
							->first();

    	$module_classic_row =  $this->posts_select('medium')
	    			->where('post.depid' , '259')
	    			->limit(4)
	    			->get();


		$vid_dep =  $this->Department_select('mini' , '267')
					->first();

    	$video_row =  $this->posts_select('contype7')
	    			->where('post.depid' , '267')
	    			->where('post.contype' , '7')
		    		//->leftjoin('post_options' , 'post_options.postid' , 'post.id')
	    			->limit(10)
	    			->get();

	   // dd($video_row);
        return view('front.index' , compact('dep' ,'post_row' ,'main_row' ,'slides_row' ,'images_rows' ,'module_classic' ,'module_classic_row' ,'video_row' ,'vid_dep'));
    }

    public function post($ids , $title = null){
    	if($title == null){
	    	$exp1 = explode('.', $ids);
	    	$exp1 = explode('-', $exp1[0]);
	    	$id = end($exp1);
    	}else{
    		$id = $ids;
    	}

    	$post = \App\Post::find($id);
    	if(!$post){
    		return redirect('/');
    	}

    	$class_body = 'single single-post postid- single-format-standard';
    	// dd($post);
		$dep = $this->Department_select('mini' , $post->depid)
				->first();


    	$data =  \App\PostLang::where('postid' , $post->id)
	    			->where('langid' , '2')
	    			->first();


    	$related = $this->posts_select('full')
	    			->where('post.id' ,'!=', $post->id)
	    			->where('post.depid' , $post->depid)
	    			->where('department_lang.langid' , '2')
		    		->leftjoin('department_lang' , 'department_lang.depid' , 'post.depid')
	    			->limit(6)
	    			->get();
	    			// dd($related);
	    for ($i=0; $i < sizeof($related) ; $i++) { 
	    	$icon = \DB::table('post_gallery')->where('postid' , $related[$i]->id)->where('status' ,'!=' , '9')->first();
	    	if($icon){
	    		$related[$i]->icons = strtoupper($icon->ext);
	    	}
	    }

	   	$commint = \DB::table('post_comments')->where('postid' , $post->id)->where('status' , '1')->limit(100)->paginate(15);
	   	if($post->contype == '3'){
		   	$images_gallery_post = \DB::table('post_gallery')->where('postid' , $post->id)->where('status' ,'!=' , '9')
			   	->where('ext','!=','pdf')
			   	->get();
	   	}else{
	   		$images_gallery_post = array();
	   	}




    	$video_row =  $this->posts_select('contype7')
	    			->where('post.depid' , '267')
	    			->where('post.contype' , '7')
		    		//->leftjoin('post_options' , 'post_options.postid' , 'post.id')
	    			->limit(10)
	    			->get();

	   	if($post->contype == '7'){
		   	$video_post = \DB::table('post_options')->where('postid' , $post->id)
			   	->first();
	   	}else{
	   		$video_post = array();
	   	}

	   	// dd($video_post);

	   	$file_gallery_post = \DB::table('post_gallery')->where('postid' , $post->id)->where('status' ,'!=' , '9')
		   	->where('ext','pdf')
		   	->get();

        return view('front.post' , compact('video_post','class_body','post','related','dep' ,'data' ,'commint','images_gallery_post' ,'file_gallery_post'));
    }

    public function category($id, $title = null){
    	// dd($id);
    	// dd($title);
    	
    	$class_body = 'single single-post postid- single-format-standard';
    	$titles = str_replace('-', ' ', $id);
		$dep = $this->Department_select('mini' , $id)
				->orwhere('title' , $titles)
				->first();
		// dd($titles);
		// dd($dep);

    	if(!$dep){
    		return redirect('/');
    	}
    	// dd($dep);
    	

    	$cat_row = $this->posts_select('full')
    					->where(function($q) use($dep) {
    						$q->wherein('post.depid' , function($qe) use($dep) {
	    						$qe->select('department.id')
	    							->from('department')
    								->where('department.parentid','=',$dep->id);
	    					})
    						->orwhere('post.depid' , $dep->id);
    					})
		    			->where('department_lang.langid' , '2')
			    		->leftjoin('department_lang' , 'department_lang.depid' , 'post.depid')
	    				->paginate(10);

	    for ($i=0; $i < sizeof($cat_row) ; $i++) { 
	    	$icon = \DB::table('post_gallery')->where('postid' , $cat_row[$i]->id)->where('status' ,'!=' , '9')->first();
	    	if($icon){
	    		$cat_row[$i]->icons = strtoupper($icon->ext);
	    	}
	    	
	    }

        return view('front.category' , compact('cat_row','dep','class_body'));
    }

    public function gallery($title = null){
    	// dd($id);
    	// dd($title);
    	
    	$class_body = 'single single-post postid- single-format-standard';


    	$cat_row =  $this->posts_select('full')
					->where('post.contype' , '3')
					->where('department_lang.langid' , '2')
		    		->leftjoin('department_lang' , 'department_lang.depid' , 'post.depid')
					->paginate(10);

	    for ($i=0; $i < sizeof($cat_row) ; $i++) { 
	    	$icon = \DB::table('post_gallery')->where('postid' , $cat_row[$i]->id)->where('status' ,'!=' , '9')->first();
	    	if($icon){
	    		$cat_row[$i]->icons = strtoupper($icon->ext);
	    	}
	    }

	    $dep['title'] = 'الصور';
	    $dep['id'] = 'الصور';

        return view('front.category' , compact('cat_row','dep','class_body'));
    }

    public function bk_ajax_comments_post(Request $request , $id){
    	if($request->name || $request->email || $request->comment || $request['g-recaptcha-response']){
    		$data = \DB::table('post_comments')
						->insert([
					    			'postid' => $id,
					    			'title' => $request->name,
					    			'name' => $request->name,
					    			'email' => $request->email,
					    			'country' => $request->name,
					    			'website' => $request->url,
					    			'comment' => $request->comment,
					    			'ipaddress' => \Request::ip(),
					    			'status' => '0',
					    			'recorddate' => date('Y-m-d H:i:s')
					    		]);
    		return response()->json('شكرا  لمشاركتك' , 200);

    	}
    	return response()->json('Error' , 404);
    }

    public function bk_ajax_review(Request $request , $id){

    	if($request->choise){
    		$data = \App\PostLinks::find($request->choise);
    		if($data){
    			$data->reviews = $data->reviews+1;
    			if(!$data->save()){
    				return response()->json('Error' , 404);
    			}
    		}

    		return response()->json('شكرا  لمشاركتك' , 200);
    	}
    }

    public function bk_ajax_search_post(Request $request){
    	if($request->s){
	    	$data = $this->posts_select('full')
				->where('post.name' , 'like' , '%'.$request->s.'%')
				->where('department_lang.langid' , '2')
				->where('post_lang.title' , 'like' , '%'.$request->s.'%')
	    		->leftjoin('department_lang' , 'department_lang.depid' , 'post.depid')
				->limit(3)
				->get();

			for ($i=0; $i < sizeof($data) ; $i++) { 
				$ext = pathinfo($data[$i]->image, PATHINFO_EXTENSION);
				if($ext == 'pdf'){
					$data[$i]->image =  '/none/none/none.jpg';
				}
				if($data[$i]->image == null || $data[$i]->image == 0  ){
					$data[$i]->image =  '/none/none/none.jpg';
				}
				$data[$i]->date = strftime("%d %B, %Y", strtotime($data[$i]->insertdate));
				$data[$i]->title_url = url_site($data[$i]->title);
			}
			// dd($data);
    		return response()->json($data , 200);
    	}
    	return response()->json('Empty' , 200);
    }

    public function search($title = null){
    	$cat_row = array();

    	$class_body = 'single single-post postid- single-format-standard';

    	if($title){
	    	$cat_row =  $this->posts_select('full')
				->where('post.name' , 'like' , '%'.$title.'%')
				->where('department_lang.langid' , '2')
				->where('post_lang.title' , 'like' , '%'.$title.'%')
	    		->leftjoin('department_lang' , 'department_lang.depid' , 'post.depid')
				->paginate(10);
    	}

	    $dep['title'] = $title;
	    $dep['id'] = $title;
	    $dep['search'] = 'بحث عن :';

        return view('front.category' , compact('cat_row','dep','class_body'));
    }

    public function service($type , $title = null){
    	// dd($type);
    	$apptype = '0';
    	$title = '';

    	if($type == 'plaint'){
    		$apptype = '1';
    		$title = 'طلب تقديم شكوي';
    	}elseif($type == 'suggestion'){
    		$apptype = '2';
    		$title = 'طلب تقديم اقتراح';
    	}elseif($type == 'citizianapp'){
    		$apptype = '3';
    		$title = ' طلبات المواطنين ';
    	}
    	if($apptype != '0'){
	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'apptype'=> $apptype,
	    		'name' => $title
	    	];
	        return view('front.service_plant' , compact('dep'));
    	}elseif($type == "agencylist"){

	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'name' => 'الوكالات'
	    	];

    		$db_all = \DB::connection("ministry")->table("AGENCY_MASTER_VW")
    			->select("ID", "PK_OBJ", "PK_YEAR", "GAZA_REG_NAME", "CLIENT_NAME", "STATUS", \DB::raw("to_char(PUBLISH_DATE, 'yyyy-mm-dd') PUBLISH_DATE"))
    			->orderBy('PUBLISH_DATE' , 'DESC')
    			->orderBy('PK_YEAR' , 'DESC')
    			->orderBy('PK_OBJ' , 'DESC')
    			->paginate(5);
			for ($i=0; $i < sizeof($db_all) ; $i++) { 
				$db_all[$i]->clients = \DB::connection("ministry")
				->select("SELECT ID, AGENCY_NAME, FROM_DOC_NO, FROM_CITY, PK_OBJ, PK_YEAR FROM AGENCY_FROM_VW WHERE PK_OBJ=? AND PK_YEAR=?", [ $db_all[$i]->pk_obj , $db_all[$i]->pk_year ] );

				
				$db_all[$i]->agency = \DB::connection("ministry")
				->select("SELECT AGENCY_NO, AGENCY_YEAR, AGENY_CITY, AGENCY_DATE, AGENCY_PERIOD, PK_OBJ, PK_YEAR FROM AGENCY_NO_VW WHERE PK_OBJ=? AND PK_YEAR=?", [ $db_all[$i]->pk_obj , $db_all[$i]->pk_year ] );


				$db_all[$i]->details = \DB::connection("ministry")
				->select("SELECT BLOCK_NO, COPOUN_NO, CITY, AGENCY_ID, CLIENT_AREA, BUY_AREA, APP_NO, APP_YEAR, CONTRACT_NO, CONT_YEAR, PK_OBJ, PK_YEAR FROM AGENCY_DETAIL_VW WHERE PK_OBJ=? AND PK_YEAR=?", [ $db_all[$i]->pk_obj , $db_all[$i]->pk_year ] );
			}
	        return view('front.agencylist' , compact('dep' ,'db_all'));

    	}elseif($type == "transactionsdeadline"){

	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'name' => 'المعاملات التي سيتم اتلافها في نهاية الشهر الحالي'
	    	];

				
			$year = date("Y")-1;
			$month = date("m");


    		$db_all = \DB::connection("ministry")
    			->table("MONTH_APP_VW")
    			->whereRaw("to_char(APP_DATE,'yyyy-mm-dd') between '".$year."-".$month."-01' and TO_CHAR (LAST_DAY (TO_DATE('".$year."-".$month."-01','yyyy-mm-dd')),'yyyy-mm-dd')")
    			->select("APP_NO", "APP_DESC", "TO_OWNER_NAME", "FROM_OWNER_NAME", \DB::raw("to_char(APP_DATE, 'yyyy/mm/dd') APP_DATE"))
    			->orderBy('APP_DATE' , 'DESC')
    			->orderBy('APP_NO' , 'DESC')
    			->paginate(10);
    			
    		// dd($db_all);

	        return view('front.transactions-deadline' , compact('dep' ,'db_all'));
    	}elseif($type == "surveyor"){
    		// dd('asd');
	    	$dep = [
	    		'title' => 'المساحين المعتمدين',
	    		'name' => 'أسماء المساحين المعتمدين'
	    	];

    		$db_all = \App\NameList::where('type' , '1')
    			->orderBy('doc_id' , 'DESC')
    			->paginate(50);

	        return view('front.surveyor' , compact('dep' ,'db_all'));
	        
    	}elseif($type == "clerk"){

	    	$dep = [
	    		'title' => 'كتائب العرائض',
	    		'name' => 'اسماء كتبة العرائض'
	    	];

    		$db_all = \App\NameList::where('type' , '2')
    			->orderBy('doc_id' , 'DESC')
    			->paginate(10);

	        return view('front.transactions-deadline' , compact('dep' ,'db_all'));
	        
    	}elseif($type == "appraisers"){

	    	$dep = [
	    		'title' => 'المثمنين',
	    		'name' => 'اسماء  المثمنين '
	    	];

    		$db_all = \App\NameList::where('type' , '3')
    			->orderBy('doc_id' , 'DESC')
    			->paginate(10);

	        return view('front.transactions-deadline' , compact('dep' ,'db_all'));

    	}elseif($type == "transactionsuncom"){

	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'name' => ' المعاملات غير المكتملة'
	    	];

				

    		$db_all = \DB::connection("ministry")
    			->table("REP_TABO_APPLICATION_VW")
    			->whereRaw("months_between(sysdate,APP_DATE) > 1 and months_between(sysdate,APP_DATE) <= 11  and status not in (7,8,9,10,14,20)")
    			->select("APP_NO", "APP_DESC", "TO_OWNER_NAME", "FROM_OWNER_NAME", \DB::raw("to_char(APP_DATE, 'yyyy/mm/dd') APP_DATE"))
    			->orderBy('APP_DATE' , 'DESC')
    			->orderBy('APP_NO' , 'DESC')
    			->distinct('APP_NO', 'APP_DESC', 'TO_OWNER_NAME', 'APP_DATE')
    			->paginate(40 , ['APP_NO']);
    			
    		// dd($db_all);

	        return view('front.transactions-uncom' , compact('dep' ,'db_all'));
    	}elseif($type == "deedcheck"){

	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'name' => ' التحقق من مستخرج القيد'
	    	];


	        return view('front.deedcheck'  , compact('dep'));
    	}elseif($type == "transactions"){

	    	$dep = [
	    		'title' => 'خدمات الجمهور',
	    		'name' => ' الاستعلام عن حالة معاملة'
	    	];

	        return view('front.transactions' , compact('dep'));
    	}
    }

    public function bk_ajax_plaint(Request $request , $type){
        // dd($request->all());
        if($type == '1'){
        	$folder = 'plaints';
        }elseif($type == '2'){
        	$folder = 'suggestions';
        }elseif($type == '3'){
        	$folder = 'citizianapp';
        }else{
        	$folder = 'none';
        }

        $data = new \App\NplaPlasug;

        $data->fullname = $request->fullname;
        $data->idnum = $request->idnum;
        $data->city = $request->city;
        $data->department = $request->department;
        $data->tel = $request->tel;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->details = $request->details;
        $data->apptype = $type;
        $data->adddate = date('Y-m-d');
        $data->processdate = date('Y-m-d');
        $data->readdate = date('Y-m-d');
        $data->ipaddress = \Request::ip();
        if(isset($request->attachment) && $request->attachment != null){
            $FolderPath = public_path().'/media/'.$folder.'/'.date('Y/m').'/';
            if(!file_exists($FolderPath)){
                $result = File::makeDirectory( $FolderPath , 0775, true, true);
            }
            $attachment = time().'.'.$request->attachment->getClientOriginalExtension();
            $request->attachment->move($FolderPath, $attachment);
            $data->attached = $attachment;
        }else{
            $data->attached = ' ';
        }

        if($data->save()){
            // return redirect()->back()->with('Success','تمت العملية بنجاح ');
    		return response()->json('شكراً لك سيتم الرد عليك قريباً' , 200);
        }else{
            // return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
    		return response()->json('تم رفض الاضافة ' , 200);
        }
    }

    public function bk_ajax_deedcheck(Request $request){

        $printDate=str_pad(intval($request->DEED_DATE_YEAR), 4, '0', STR_PAD_LEFT).'-'.str_pad($request->DEED_DATE_MONTH, 2, '0', STR_PAD_LEFT).'-'.str_pad($request->DEED_DATE_DAY, 2, '0', STR_PAD_LEFT);	


		$db_all = \DB::connection("ministry")
			->table("DEED_PRINT_VW")
			->whereRaw("to_char(DEED_PRINT_DATE,'yyyy-mm-dd')=? and DEED_RAND_SEQ=?" , [ $printDate , $request->DEED_CODE])->get();

        if(sizeof($db_all) != 0){
    		return response()->json( $db_all , 200);
        }else{
    		return response()->json('نعتذر  لم يتم ايجاد اي بيانات' , 404);
        }
    }

    public function bk_ajax_transactions(Request $request){
    	// dump($request->all());
        $pdof = \DB::connection('ministry')->getPdo();
		$stmtf=$pdof->prepare("begin TRANSACTION_PR(:APP_NO_IN , :MAIN_BLOCK_ID_IN, :COUPON_NO_IN , :IP_ADDRESS_IN, :TEXT_IN); end;");

		$app_no = $request->APP_NO;
		$MAIN_BLOCK_ID = $request->MAIN_BLOCK_ID;
		$COUPON_NO = $request->COUPON_NO;
		$token = $request->_token;
		$ip = \Request::ip();

		$stmtf->bindParam(':APP_NO_IN', $app_no , PDO::PARAM_INT);
		$stmtf->bindParam(':MAIN_BLOCK_ID_IN', $MAIN_BLOCK_ID , PDO::PARAM_INT);
		$stmtf->bindParam(':COUPON_NO_IN', $COUPON_NO , PDO::PARAM_INT);
		$stmtf->bindParam(':IP_ADDRESS_IN', $ip , PDO::PARAM_INT);
		$stmtf->bindParam(':TEXT_IN', $token , PDO::PARAM_INT);

		$stmtf->execute();


		$db_all = \DB::connection("ministry")
			->table("REP_TABO_APPLICATION_VW")
			->whereRaw("to_char(APP_DATE,'yyyy')=? and APP_NO=? and MAIN_BLOCK_ID=? and COUPON_NO=?" 
				, [ $request->APP_YEAR , $request->APP_NO, $request->MAIN_BLOCK_ID, $request->COUPON_NO]
			)
			->select('FROM_OWNER_NAME', 'APP_TYPE','APP_DESC', 'TO_OWNER_NAME', 'NOTE',  'APP_NO', 'MAIN_BLOCK_ID', 'COUPON_NO', 'RATE_VALUE', 'F_DISCOUNT', 'S_DISCOUNT', \DB::raw("to_char(APP_DATE, 'yyyy/mm/dd') APP_DATE"))
			->first();

		// for ($i=0; $i < sizeof($db_all) ; $i++) { 
			if($db_all){
				$db_all->da_all = \DB::connection("ministry")
					->table("REP_TABO_APPLICATION_VW")
					->whereRaw("APP_NO=? and to_char(APP_DATE,'yyyy')=?" , [$app_no , $request->APP_YEAR])
					->get();
			}
		// }

        if(sizeof($db_all) != 0){
    		return response()->json( $db_all , 200);
        }else{
    		return response()->json('نعتذر  لم يتم ايجاد اي بيانات' , 404);
        }
    }


    public function contact_us($title){
    	$class_body = 'single single-post postid- single-format-standard';
        return view('front.contact_us' , compact('class_body'));
    }

    public function bk_ajax_contact_us(Request $request){
    	// dd($request->all());

    	$data = new \App\PostComments;
    	$data->postid = 0;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->title = $request->subject;
    	$data->comment = $request->comment;
    	$data->status = 0;
    	$data->ipaddress = \Request::ip();
    	$data->recorddate = date('Y-m-d');

        if($data->save()){
    		return response()->json( 'تم ارسال الرسالة بنجاح ... سيتم الرد بعد مراجعتها وشكرا' , 200);
        }else{
    		return response()->json('نعتذر  لم يتم ايجاد اي بيانات' , 404);
        }
    }

}
