<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\PostComments;
use App\PostGallery;
use App\PostGalleryFolder;
use App\PostInCart;
use App\PostLang;
use App\PostLinks;
use App\PostOptions;
use App\Department;
use App\DepartmentLang;
use App\Languages;

use Validator;
use File;
use Sentinel;



class PostController extends Controller
{
	public $postInfo;
	
	
	 public function __construct()
     {
		parent::__construct();
		$this->postInfo=array();
		$this->postInfo['service']='post'; 
		$this->postInfo['contype']=0; 
		$this->postInfo['depid']=28; 
		$this->postInfo['showcontype']=true;
		$this->postInfo['showgallerytab']=true;
		$this->postInfo['showembdtab']=true;
		$this->postInfo['showlinktab']=true;
		$this->postInfo['showoptiontab']=true;
		$this->postInfo['title']='مواضيع'; 
		$this->postInfo['singletitle']='موضوع'; 
	 }

    public function view(){
		$postInfo=$this->postInfo;
        return view('admin.post.posts',compact('postInfo'));
    }
    // }
    public function datapost(Request $request){
        $langs_site = $this->getiduser()->cplanguage;
        // dd('asd0369');exit;
        $modal = Post::query()
            // ->leftjoin('department_lang','department_lang.depid','=','post.depid')
            ->leftjoin('users','users.id','=','post.userid')
            ->leftjoin('post_lang','post_lang.postid','=','post.id')
            ->select('post.id','post.status','post_lang.title','users.first_name','users.last_name')
            ->orderBy('post.sortable' , 'DESC')
            // ->where('post_lang.langid' , $langs_site)
            ->where('post.status' ,'!=', '9');
            // ->where('department_lang.langid' , $langs_site);
            if (request()->has('name')) {
                $modal->where('post_lang.title', 'like', "%" . request('name') . "%");
            }
            if (request()->has('department')) {
                $modal->where('department_lang.title', 'like', "%" . request('department') . "%");
            }
			if ($this->postInfo['contype']<0) {
                $modal->where('post.contype' ,'=', $this->postInfo['contype']);
            }else {
                $modal->where('post.contype' ,'>=', 0);
            }

        return \Datatables::of($modal)
            ->addColumn('statuss', function($row){
                $checked = ' ';
                if($row->status == 1){
                  $checked = 'checked';
                }
                
                $item = $this->checkAccess('post.status',$row->id,'fa fa-switch',$row->status);
                if($item != null){
                    $p = '<input type="checkbox" '.$checked.' data-id='.$row->id.' class="make-switch" id="test" >';
                }else{
                    $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
                }

                return $p;
            })
            ->addColumn('edit_url', function($row){
                return $this->checkAccess('post.edit',url('/adminpanel/'.$this->postInfo['service'].'/edit/'.$row->id),'fa fa-edit','editEXPReply('.$row->id.')');
            })
            ->addColumn('move', function($row){
                return $this->checkAccess('post.edit','#','fa fa-arrows','icon-move');
            })
            ->addColumn('delete_url', function($row){
                return $this->checkAccess('post.delete',url('/adminpanel/'.$this->postInfo['service'].'/delete/'.$row->id),'fa fa-trash','editEXPReply('.$row->id.')');
              // return route('delpost', $row->id);
            })
            ->addColumn('username', function($row){
              return $row->first_name.' '.$row->last_name;
            })
            ->addColumn('deptitle', function($row){
              return $row->deptitle;
            })
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->make(true);
    }


    public function add(){
		$postInfo=$this->postInfo;
        $data = null;
        $id = null;

        $postLang = array();
        $postLinks = array();
        $postGallery = array();
        
        $menus = Department::where('status' , '1')->where('parentid' , $this->postInfo['depid'])->get();
        $langs = Languages::get();

    	return view('admin.post.create' , compact('postInfo','data','id','postLang' ,'postLinks' ,'postGallery','menus','langs') );
    }
    
    public function get_submenu($id){
        $menus = Department::where('parentid' , $id)->where('status' , '1')->get();
        return response()->json($menus , 200);
    }

    public function changestatus($id , $state){
        $post = Post::find($id);
        if(!$post){
            return response()->json('error' , 400);
        }else{
            $post->status = $state;
            if(!$post->save()){
                return response()->json('error' , 500);
            }
        }
        return response()->json('success' , 200);
    }
    
    public function create(Request $request , $id = null){
        // dd($request->all());

        $langs_site = $this->getiduser()->cplanguage;
        $massage = [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يكون نص',
            'confirmed' => 'يجب ان تتأكد من مطباقة كلمة المرور'
        ];

        $validator = Validator::make($request->all() ,[
            'name' => 'required|string|max:255',
            'status' => 'required',
            // 'depid' => 'required',
        ], $massage);

        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $depid = $request->depid;

        if(isset($request->submenu)){
            if(sizeof($request->submenu) != 0){
                for ($i=0; $i < sizeof($request->submenu) ; $i++) { 
                    if($request->submenu[$i] != null){
                        $depid = $request->submenu[$i];
                    }
                }
            }
        }

        $ip = \Request::ip();

        $data = new Post;
        if($id != null){
            $data = Post::find($id);
        }

        $data->name = $request->name;
        $data->status = $request->status;
        $data->depid = $depid;
        $data->userid = Sentinel::getUser()->id;
        $data->ipaddress = $ip;
        if($id == null){
            $data->insertdate = date('Y-m-d h:m:s');
            $data->image = '0';
            $data->sortable = '0';
            $data->rating = '0';
            $data->sum_rating = '0';
            $data->num_rating = '0';
            $data->readmore = '0';
            $data->metadata = '';
            $data->likes = '0';
            $data->views = '0';
            $data->main = '0';
        }
        $data->token = $request->_token;
        if($this->postInfo['showcontype']) $data->contype = $request->contype; else $data->contype=$this->postInfo['contype'];
        if($this->postInfo['showembdtab']) $data->embed = $request->embed; else $data->embed = '';

        if(!$data->save()){
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }
        if($id == null){
            $data->sortable = $data->id;
            $data->save();
        }
        
        if(isset($request->title)){
            if(sizeof($request->title) != 0){
                for ($i=0; $i < sizeof($request->title) ; $i++) { 
                    
                    if($id != null){
                        $postdata = PostLang::where('postid' , $id)->where('langid' , $request->lang[$i])->first();
                    }else{
                        $postdata = new PostLang;
                        $postdata->postid = $data->id;
                        $postdata->langid = $request->lang[$i];
                    }

                    $postdata->title = $request->title[$i];
                    $postdata->summary = $request->summary[$i];
                    $postdata->description = $request->description[$i];


                    $postdata->title_en = $request->title_en[$i];
                    $postdata->summary_en = $request->summary_en[$i];
                    $postdata->description_en = $request->description_en[$i];

                    $postdata->keywords = $request->keywords[$i];

                    if(!$postdata->save()){
                        return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
                    }
                    
                }
            }
        }
        
		if($this->postInfo['showlinktab']) {
			if(isset($request->title_link)){
				if(sizeof($request->title_link) != 0){
					for ($i=0; $i < sizeof($request->title_link) ; $i++) {
	
						if($id != null){
							if($request->row_id[$i] == '-1'){
								$postlinks_new = new PostLinks;
								$postlinks_new->postid = $data->id;
								$postlinks_new->status = '1';
								$postlinks_new->views = '0';
								$postlinks_new->reviews = '0';
								$postlinks_new->title = $request->title_link[$i];
								$postlinks_new->url = $request->url[$i];
								
								if(!$postlinks_new->save()){
									return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
								}
							}else{
								$postlinks = PostLinks::where('postid' , $id)->get();
								for ($c=0; $c < sizeof($postlinks) ; $c++) {
									if($postlinks[$c]->id == $request->row_id[$i] ){
										$postlinks[$c]->title = $request->title_link[$i];
										$postlinks[$c]->url = $request->url[$i];
										if(!$postlinks[$c]->save()){
											return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
										}
									}
								}
							}
							
						}else{
							$postlinks = new PostLinks;
							$postlinks->postid = $data->id;
							$postlinks->status = '1';
							$postlinks->views = '0';
							$postlinks->reviews = '0';
							$postlinks->title = $request->title_link[$i];
							$postlinks->url = $request->url[$i];
							
							if(!$postlinks->save()){
								return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
							}
						}
	
					}
				}
			}
		}
		//===========================================
		if($this->postInfo['showgallerytab']) {
			if($id == null){
				$gallery = PostGallery::where('token' , $request->_token)->where('postid' , '0')->where('status' , '1')->get();
			}else{
				$gallery = PostGallery::where('token' , $request->_token)->where('postid' , $id)->where('status' , '1')->get();
			}
			// dd($gallery);
			$c = 0;
			for ($i=0; $i < sizeof($gallery) ; $i++) { 
				if($c == 0){
					$data->image = $gallery[$i]->path.'/'.$gallery[$i]->file;
					if(!$data->save()){
						return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح بتعديل الصور');
					}
				}
				$gallery[$i]->postid = $data->id;
				if(!$gallery[$i]->save()){
					return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح بتعديل الصور');
				}
			}
		}
		//===========================================
		if($this->postInfo['showoptiontab']) {        
			$data_options = \App\DepartmentOptions::where( 'department_options.deptid' , $depid)
				->leftjoin('options_list' , 'options_list.id' , '=' , 'department_options.optnid')
				->leftjoin('options_type' , 'options_type.id' , '=' , 'options_list.type')
				->leftjoin('options_lang' , 'options_lang.optnid' , '=' , 'options_list.id')
				->where('options_lang.langid' , $langs_site)
				->select('department_options.*' , 'options_list.catid', 'options_lang.title as list_title', 'options_type.name as types')
				->get();
				// dd($data_options);
			// for ($i=0; $i < sizeof($data_options) ; $i++) { 
			//     if($data_options[$i]->types == 'select' || $data_options[$i]->types == 'multiselect' || $data_options[$i]->types == 'checkbox' || $data_options[$i]->types == 'radiobutton' || $data_options[$i]->types == 'multicheckbox'){
			//         $data_options[$i]['item_list'] = \App\Category::
			//             where('category.pid' , $data_options[$i]->catid)
			//             ->where('category.status' , '1')
			//             ->leftjoin('category_lang' , 'category_lang.catid' ,'=' ,'category.id')
			//             ->where('category_lang.langid' , $langs_site)
			//             ->select('category.*' ,'category_lang.title as title_name')
			//             ->get();
			//     }
			// }
	
			// dd($data_options);
	
			$delete = \App\PostOptions::where('postid' , $data->id)->delete();
			// dd($delete);
			$dataoptions = '';
			for ($i=0; $i < sizeof($data_options) ; $i++) { 
				$itp = $data_options[$i]->optnid;
				// dump($itp);
				if(isset($request->$itp) && $request->$itp != null){
					// dump('Data ID = '.$data->id);
					// dump('Name Input = '.$itp);
					// dump('Val Input = '.$request->$itp);
					$option = \App\PostOptions::where('postid' , $data->id)->where('optnid' , $itp)->first();
					if(!$option){
						// dump('id null');
						$option = new \App\PostOptions;
						$option->postid = $data->id;
						$option->optnid = $itp;
					}
	
					if(is_array($request->$itp)){
						$option->optnval = implode(",",$request->$itp);
					}else{
						$option->optnval = $request->$itp;
					}
					
					if(isset($dataoptions['option_'.$itp])) $dataoptions['option_'.$itp] = $request->$itp ;
	
					if(!$option->save()){
						return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
					}
	
				}
			}
			// dd($dataoptions);
			
			$data->metadata = json_encode($dataoptions);
			$data->save();
		}

        // dd($request->all());



        return redirect()->back()->with('Success','تمت العملية بنجاح ');
    }

    
    public function upladimage(Request $request , $id = null){
        // dd($request->all());

        $path = date('Y').'/'.date('m');
        if(isset($request->file)){
            $FolderPath = public_path().'/'.'media/post/gallery/'.$path;
            if(!file_exists($FolderPath)){
                $result = File::makeDirectory( $FolderPath , 0775, true, true);
            }
            $image = time().'_'.$request->file->getClientSize().'_gallary.'.$request->file->getClientOriginalExtension();
            $request->file->move($FolderPath, $image);
            $dp = $request->file('file');

            $data_id = $id;
            if($id == null){
                $data_id = '0';
            }

            $last_sort = PostGallery::where('postid' , $data_id)->where('status' , '1')->orderBy('sortable' , 'DSEC')->first();
            // dd($last_sort);
            if($last_sort){
                $last_sort_val = $last_sort->sortable+1;
            }else{
                $last_sort_val = '1';
            }

            $data = new PostGallery;
            $data->file = $image;
            $data->postid = $data_id;
            $data->name = $request->file->getClientOriginalName();
            $data->size = $request->file->getClientSize();
            $data->type = $request->file->getClientMimeType();
            $data->ext = $request->file->getClientOriginalExtension();
            $data->path = $path;
            $data->token = $request->_token;
            $data->status = '1';
            $data->sortable = $last_sort_val;
            $data->folderid = '0';
            $data->insertdate = date('Y-m-d h:m:s');
            $data->oldfolderid = '0';
        }


        if($data->save()){
            if($id == null){
                $data->sortable = $data->id;
                $data->save();
            }
            return response()->json($image , 200);
        }else{
            return response()->json('error',400);
        }
        
    }
    
    public function edit($id){
		$postInfo=$this->postInfo;
        $data = Post::find($id);
        if(!$data){
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }
        // dd($data);

        $postLang = PostLang::where('postid' , $id)->orderBy('id' , 'ASC')->get();
        $postLinks = PostLinks::where('postid' , $id)->where('status' , '1')->orderBy('id' , 'ASC')->get();
        $postGallery = PostGallery::where('postid' , $id)->where('status' ,'1')->orderBy('sortable' , 'ASC')->get();
        
        $menus = Department::where('status' , '1')->where('parentid' , $this->postInfo['depid'] )->get();
        $langs = Languages::get();
    	return view('admin.post.create' , compact('postInfo','data','postLang','postLinks','postGallery','menus' ,'id' ,'langs') );
    }

    
    public function delete($id){
        $data = Post::find($id);
        if($data){
            $data->status = '9';
            if($data->save()){
                return redirect()->back()->with('Success','تمت العملية بنجاح ');
            }else{
                return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
            }
        }else{
            return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
        }
    }
    
    
    public function deletePostImage($id){
        // dd('asd');
        $data = PostGallery::find($id);
        if($data){
            $data->status = '9';
            if($data->save()){
                return response()->json('Deleted' , 200);
            }else{
                return response()->json('error',400);
            }
        }else{
            return response()->json('error not found',400);
        }
    }
    

    public function resort(Request $request){
        dump($request->item);
        // dump($data);
        $c = 1;
        for ($i=0; $i < sizeof($request->item) ; $i++) {
            $nitem = $request->item[$i];
            // dump($nitem);
            if($i == ( sizeof($request->item)-1 )){

            }else{
                $c = $i + 1;
                $nitem2 = $request->item[$c];
                if(true){
                    $data1 = PostGallery::find($nitem);
                    $data2 = PostGallery::find($nitem2);

                    if($data1->sortable > $data2->sortable){
                        $sort1 = $data1->sortable;
                        $sort2 = $data2->sortable;
                        dump($nitem.'_'.$sort1 .'>'. $nitem2.'_'.$sort2);
                        // dump( $sort1);
                        // dump( $sort2);
                        $data1->sortable =  $sort2;
                        if(!$data1->save()){
                            return response()->json('error save data1' , 400);
                        }

                        $data2->sortable =  $sort1;
                        if(!$data2->save()){
                            return response()->json('error save data1' , 400);
                        }
                    }
                }
            }
        }
        return response()->json('done' , 200);
    }

    public function resort_table(Request $request){
        $c = 1;
        for ($i=0; $i < sizeof($request->item) ; $i++) {
            $nitem = $request->item[$i];
            if($i == ( sizeof($request->item)-1 )){

            }else{
                $c = $i + 1;
                $nitem2 = $request->item[$c];
                if(true){
                    $data1 = Post::find($nitem);
                    $data2 = Post::find($nitem2);
                    
                    if($data1->sortable < $data2->sortable){
                        $sort1 = $data1->sortable;
                        $sort2 = $data2->sortable;
                        // dump($nitem.'_'.$sort1 .'>'. $nitem2.'_'.$sort2);
                        // dump( $sort1);
                        // dump( $sort2);
                        $data1->sortable =  $sort2;
                        if(!$data1->save()){
                            return response()->json('error save data1' , 400);
                        }

                        $data2->sortable =  $sort1;
                        if(!$data2->save()){
                            return response()->json('error save data1' , 400);
                        }
                    }
                }
            }
        }
        return response()->json('done' , 200);
    }


    public function updategllarey(){
        // dd('asd');
        $oldpath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/ar/admin/media/post/gallery', PHP_URL_PATH);
        $newpath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/ar/adminpanel/media/post/gallery', PHP_URL_PATH);

        $gllary = PostGallery::where('id' , '>=' , '1108')->get();
        // dd($gllary);
        for ($i=0; $i < sizeof($gllary) ; $i++) {
            $file = $oldpath.'/'.$gllary[$i]->file;
            $newfile = $newpath.'/'.$gllary[$i]->path.'/'.$gllary[$i]->file;
            // dd($file);
            if (file_exists($file)) {
                if(!file_exists($newfile)){
                    $FolderPath = public_path().'/'.'media/post/gallery/'.$gllary[$i]->path;
                    if(!file_exists($FolderPath)){
                        File::makeDirectory( $FolderPath , 0775, true, true);
                    }
                    $success = \File::copy( $file , $newfile);
                    // dd($success);
                }
            }
        }
        dd('done');
    }

    public function updatedepartment(){
        $oldpath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/ar/admin/media/department', PHP_URL_PATH);
        $newpath = $_SERVER['DOCUMENT_ROOT'] . parse_url('/ar/adminpanel/media/department', PHP_URL_PATH);

        $department = Department::get();

        for ($i=0; $i < sizeof($department) ; $i++) {

            if($department[$i]->icon){
                $file = $oldpath.'/'.$department[$i]->icon;
                $newfile = $newpath.'/icon/'.$department[$i]->icon;

                if (file_exists($file)) {
                    if(!file_exists($newfile)){
                        $FolderPath = public_path().'/'.'media/department/icon';
                        if(!file_exists($FolderPath)){
                            File::makeDirectory( $FolderPath , 0775, true, true);
                        }
                        $success = \File::copy( $file , $newfile);
                        dump('icon _ '.$success);
                    }
                }
            }

            if($department[$i]->image){
                $file = $oldpath.'/'.$department[$i]->image;
                $newfile = $newpath.'/img/'.$department[$i]->image;

                if (file_exists($file)) {
                    if(!file_exists($newfile)){
                        $FolderPath = public_path().'/'.'media/department/img';
                        if(!file_exists($FolderPath)){
                            File::makeDirectory( $FolderPath , 0775, true, true);
                        }
                        $success = \File::copy( $file , $newfile);
                        dump('img _ '.$success);
                    }
                }
            }

            if($department[$i]->banner){
                $file = $oldpath.'/'.$department[$i]->banner;
                $newfile = $newpath.'/banner/'.$department[$i]->banner;

                if (file_exists($file)) {
                    if(!file_exists($newfile)){
                        $FolderPath = public_path().'/'.'media/department/banner';
                        if(!file_exists($FolderPath)){
                            File::makeDirectory( $FolderPath , 0775, true, true);
                        }
                        $success = \File::copy( $file , $newfile);
                        dump('banner _ '.$success);
                    }
                }
            }

            
        }
        dd('done');
    }

}
