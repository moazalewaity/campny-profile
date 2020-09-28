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



class PagesController extends PostController
{
	
	 public function __construct()
     {
		parent::__construct();
		$this->postInfo['service']='pages'; 
		$this->postInfo['contype']=-1;
		$this->postInfo['depid']=2;
		$this->postInfo['showcontype']=false; 
		$this->postInfo['showgallerytab']=false;
		$this->postInfo['showembdtab']=false;
		$this->postInfo['showlinktab']=false;
		$this->postInfo['showoptiontab']=false; 
		$this->postInfo['title']='صفحات'; 
		$this->postInfo['singletitle']='صفحة'; 
	 }

}
