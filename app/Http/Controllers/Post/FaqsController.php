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



class FaqsController extends PostController
{
	
	 public function __construct()
     {
		parent::__construct();
		$this->postInfo['service']='faqs'; 
		$this->postInfo['contype']=-2;
		$this->postInfo['depid']=4;
		$this->postInfo['showcontype']=false; 
		$this->postInfo['showgallerytab']=false;
		$this->postInfo['showembdtab']=false;
		$this->postInfo['showlinktab']=false;
		$this->postInfo['showoptiontab']=false; 
		$this->postInfo['title']='الاسئلة المتكررة'; 
		$this->postInfo['singletitle']='سؤال'; 
	 }

}
