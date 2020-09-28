<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use File;

class SettingHome extends Controller
{
    public function getSetting()
    {
        $data = Setting::first();
        return view('admin.setting' , compact('data'));
    }
    

    public function postSetting(Request $request)
    {
        $data = Setting::first();
        // dd($request->all());
        
          $data1 = $request->all();
        if(isset($request->logo)){
            $FolderPath = public_path().'/media/site/'.'img/';
            if(!file_exists($FolderPath)){
                $result = File::makeDirectory( $FolderPath , 0775, true, true);
            }
            $logo = time().'_img.'.$request->logo->getClientOriginalExtension();
            $request->logo->move($FolderPath, $logo);
            $data1['logo'] = $logo;
        }else{
                $logo = 'defulte.png';
                $data1['logo'] = $logo;
            
        }
        // dd( $data1['logo'] );
        $data->update($data1);
        session()->flash('success', 'Data added successfully');
        return redirect()->back();

    }// end of store
}
