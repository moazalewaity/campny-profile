<?php

namespace App\Http\Controllers;

use App\Concat;
use Illuminate\Http\Request;
use Validator;
use File;
class ConcatController extends Controller
{
    public $concatsInfo;
	
	
    public function __construct()
    {
       parent::__construct();
       $this->concatsInfo=array();
       $this->concatsInfo['concats']='concats'; 
       $this->concatsInfo['contype']=0; 
       $this->concatsInfo['depid']=28; 
       $this->concatsInfo['showcontype']=true;
       $this->concatsInfo['showgallerytab']=true;
       $this->concatsInfo['showembdtab']=true;
       $this->concatsInfo['showlinktab']=true;
       $this->concatsInfo['showoptiontab']=true;
       $this->concatsInfo['title']='المراسلات '; 
       $this->concatsInfo['singletitle']='مراسلة '; 
    }

   public function view(){
       $concatsInfo=$this->concatsInfo;
       return view('admin.concats.concats',compact('concatsInfo'));
   }
   // }
   public function dataconcats(Request $request){
       $langs_site = $this->getiduser()->cplanguage;
       // dd('asd0369');exit;
       $modal = Concat::get();
         

       return \Datatables::of($modal)
       ->addColumn('move', function($row){
               return $this->checkAccess('concats.edit','#','fa fa-arrows','icon-move');
           })
           ->setRowId(function ($row) {
               return $row->id;
           })
           ->make(true);
   }




   public function datapost(Request $request){
    $langs_site = $this->getiduser()->cplanguage;
    // dd('asd0369');exit;
    $modal = Concat::get();
        // ->where('status' ,'!=', '0');

    return \Datatables::of($modal)
       
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->make(true);
}
}
