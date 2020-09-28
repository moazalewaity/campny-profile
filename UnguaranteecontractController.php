<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use File;
use Sentinel;
use PDO;



class UnguaranteecontractController extends Controller{

    public function __construct()  
    {
        $this->appType='5'; 
    }   

    public function view_all(){
        // dd('asd');
        return view('admin.unguaranteecontract.view_all');
    }

    public function view_all_data(Request $request){
    	// dd($this->appType);
        $langs_site = $this->getiduser()->cplanguage;

        $cond=" 1=1 ";
        $item = $this->checkAccess('transaction.unguaranteecontract.manager','#','is is_admin','#');
        if($item == 1 ) $cond=' 1=1 ';
        else $cond=" USER_ID=".intval(Sentinel::getUser()->id)." ";

        $modal = \DB::connection("ministry")
            ->table(\DB::raw("(select * from (SELECT ROWNUM ROWSNUM ,USER_ID, APP_ID, STATUS_TABO, APP_NO_TABO, APP_YEAR_TABO, FROM_SELLER, TO_BUYER, CONFIRM_CHECKED, SHOW_ACTIONS, APP_DATE, APP_TYPE, CITY, MANY_VALUE, FLAG FROM (SELECT APP_ID,(SELECT APP_DESC FROM APPLICATION_TYPE_TB WHERE APP_CD=STATUS_TABO) STATUS_TABO, APP_NO_TABO, APP_YEAR_TABO,(SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=2 and ROWNUM=1)||' '||(CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=2)>1 THEN 'وأخرين' ELSE '' END) FROM_SELLER, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=3 and ROWNUM=1)||' '||(CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=3)>1 THEN 'وأخرين' ELSE '' END) TO_BUYER, (CASE WHEN FLAG in (2,4) THEN 'checked' ELSE '' END) CONFIRM_CHECKED, (CASE WHEN FLAG in (2,4) THEN 'style=\"display:none\"' ELSE '' END) SHOW_ACTIONS, TO_CHAR(APP_DATE,'yyyy-mm-dd') APP_DATE, (SELECT C_APP_NAME FROM C_APPOPENTYPE_TB WHERE C_APP_ID=APP.APP_TYPE) APP_TYPE, (SELECT CITY_NAME FROM CITY_TABLE WHERE CITY_ID=APP.CITY_ID) CITY, MANY_VALUE, FLAG ,USER_ID FROM APP_PETITIONS_TB APP WHERE ".$cond." and APP.APP_TYPE=".$this->appType." and FLAG<>3 ORDER BY APP_ID DESC) WHERE 1=1) WHERE 1=1 )"));


            // $app_date=$request->app_date;
            // $from_seller=$this->filterText($request->from_seller);
            // $to_buyer=$this->filterText($request->to_buyer);

            // if ($request->app_date) {
            //     $modal->where(\DB::raw("TO_CHAR(APP_DATE,'yyyy-mm-dd')"), '=', $request->app_date);
            // }

            // if (request()->has('from_seller')) {
            //     $modal->whereRaw($this->filterTextDB('FIRST_NAME')." like ?", ["%{$applicat_name}%"]);
            // }
            // if (request()->has('applicat_name')) {
            //     $modal->whereRaw($this->filterTextDB('SEC_NAME')." like ?", ["%{$applicat_name}%"]);
            // }
            // if (request()->has('applicat_name')) {
            //     $modal->whereRaw($this->filterTextDB('GRAND_NAME')." like ?", ["%{$applicat_name}%"]);
            // }
            // if (request()->has('applicat_name')) {
            //     $modal->whereRaw($this->filterTextDB('FAMILY_NAME')." like ?", ["%{$applicat_name}%"]);
            // }

        return \Datatables::of($modal)
            ->addColumn('app_no_tabos', function($row){
                if($row->app_no_tabo){
                    $item = $row->app_no_tabo.' / '.$row->app_year_tabo;
                }else{
                    $item = '-';
                }
                return $item;
            })
            ->addColumn('statuss', function($row){
                $checked = ' ';
                if($row->confirm_checked == 'checked'){
                  $checked = 'checked';
                }
                
                // $item = $this->checkAccess('application.edit',$row->app_id,'fa fa-switch','1');
                if($checked != null){
                    $p = '<input type="checkbox" '.$checked.' data-id='.$row->app_id.' class="make-switch" id="test">';
                }else{
                    $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
                }

                if(Sentinel::getUser()->id == $row->user_id){
                    return $p;
                }else{
                    if($checked != null){
                        $p = '<input type="checkbox" '.$checked.' data-id='.$row->app_id.' class="make-switch" disabled>';
                    }else{
                        $p = '<input type="checkbox" '.$checked.' class="make-switch" id="test" disabled>';
                    }

                    return $p;
                }
            })
            ->addColumn('edit_url', function($row){
                $url = url('/pla-admin/transaction/unguaranteecontract');
                    if($row->show_actions == 'hide'){
                        $idp = '';
                    }else{
                        $edit = $this->checkAccess('transaction.unguaranteecontract.edit',$url.'/edit/'.$row->app_id,'fa fa-edit','');
                        $remove = $this->checkAccess('transaction.unguaranteecontract.delete',route('remove_unguaranteecontract', [$row->app_id , '3']),'fa fa-trash-post','');
                        $idp = $edit.$remove;
                    }

                    if(Sentinel::getUser()->id != $row->user_id){
                        $idp = '';
                    }

                    $print = $this->checkAccess('transaction.unguaranteecontract.view',route('print_unguaranteecontract', $row->app_id),'fa fa-print','');

                return $idp.$print;
            })
            ->make(true);
    }


    public function add($id = null){
        $get_person = array();
        $item_data = array();
        if(intval($id)>0){
            $item_data = \DB::connection("ministry")
                ->table("APP_PETITIONS_TB")
                ->where('APP_ID' , $id)
                ->where('USER_ID' , Sentinel::getUser()->id)
                ->where('FLAG' , '1')
                ->first();

            if($item_data == NULL) return redirect()->back();      
            if($item_data->app_id != intval($id) ) return redirect()->back();      

            $get_person = \DB::connection('ministry')
                ->table('APP_REQUEST_OWNER_TB')
                ->where('APP_ID' , intval($id))
                ->orderBy('OWNER_PK')
                ->select('OWNER_PK' ,'DOC_NUM', \DB::raw("FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME"))
                ->get();

            // $item = $this->checkAccess('transaction.guaranteecontract.palestine','#','is is_admin','#');
            // if($item == 1 ){
            //     $item_data->show_add_seller = 
            //     $item_data->show_add_seller=' style="display:none" ';
                
            //     $item_data->qseller_readonly=' readonly="readonly" ';
            //     $item_data->qseller_value='123';
                
            //     $item_data->sellerfname_readonly=' readonly="readonly" ';
            //     $item_data->sellerfname_value='دولة';
                
            //     $item_data->sellertname_readonly=' readonly="readonly" ';
            //     $item_data->sellertname_value='-';
                
            //     $item_data->sellersname_readonly=' readonly="readonly" ';
            //     $item_data->sellersname_value='-';
                
            //     $item_data->sellerlname_readonly=' readonly="readonly" ';
            //     $item_data->sellerlname_value='فلسطين';
            // }

        }

        $city_row = \DB::connection("ministry")
            ->table("CITY_TABLE")
            ->select('CITY_ID', 'CITY_NAME')
            ->orderBy('CITY_NAME')
            ->get();

        $currency_row = \DB::connection("ministry")
            ->table("C_CUR_TB")
            ->where('FLAG' , '1')
            ->select('CUR_ID', 'CUR_NAME')
            ->orderBy('CUR_NAME')
            ->get();

        $selleragenttype_row = \DB::connection("ministry")
            ->table("C_PETITION_TB")
            ->where('C_PERANTS' , '4')
            ->select('C_ID', 'DESC_NAME')
            ->orderBy('DESC_NAME')
            ->get();

        $buyeragenttype_row = \DB::connection("ministry")
            ->table("C_PETITION_TB")
            ->where('C_PERANTS' , '4')
            ->select('C_ID', 'DESC_NAME')
            ->orderBy('DESC_NAME')
            ->get();

        $banklist_row = \DB::connection("ministry")
            ->table("C_PETITION_TB")
            ->where('C_PERANTS' , '20')
            ->select('C_ID', 'DESC_NAME')
            ->orderBy('DESC_NAME')
            ->get();

            // dd($id);
        $attachment_row = \DB::connection("ministry")
            ->table(\DB::raw("(SELECT LST.ATTACH_ID ATTACH_ID, LST.ATTACH_NAME ATTACH_NAME, FIL.APP_ID APP_ID, FIL.COUNT_PAPER COUNT_PAPER, FIL.CHECKED CHECKED, (CASE WHEN CHECKED='checked=\"checked\"' THEN '' ELSE 'disabled=\"disabled\"' END) DISABLED FROM PLA_ATTACH_LIST LST LEFT JOIN (SELECT ATTACH_ID, APP_ID, COUNT_PAPER, 'checked=\"checked\"' CHECKED FROM PLA_REQ_FILES WHERE APP_ID=".intval($id).") FIL ON (LST.ATTACH_ID=FIL.ATTACH_ID) ORDER BY ATTACH_NAME)"))
            ->get();

        return view('admin.unguaranteecontract.add' , compact('id' ,'get_person','item_data' , 'currency_row' ,'city_row', 'selleragenttype_row' , 'buyeragenttype_row' ,'banklist_row' ,'attachment_row'));
    }



    public function add_block_coupon(Request $request,$APP_ID_IN, $BLOCK_NUM_IN, $COUPON_NUM_IN, $ONWER_AREA_IN, $REMARK_IN=NULL){
        if($APP_ID_IN==0) $APP_ID_IN=$this->save($request);
        else if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        
        // dd('asd');
        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_COUPONS_PR(:APP_ID_IN, :BLOCK_NUM_IN, :COUPON_NUM_IN, :ONWER_AREA_IN, :REMARK_IN, :ID_IN);END;");


        $stmtf->bindParam(':APP_ID_IN'         , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':BLOCK_NUM_IN'         , $BLOCK_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':COUPON_NUM_IN'         , $COUPON_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':ONWER_AREA_IN'         , $ONWER_AREA_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':REMARK_IN'         , $REMARK_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':ID_IN'             , $ID_IN , PDO::PARAM_STR , 2000);

        $stmtf->execute();
        
        return '{"ID":"'.$ID_IN.'", "APPID":"'.$APP_ID_IN.'"}'; 
    }

    public function bc_list($appid){
        if(!$this->checkUserEditApp($appid)) return 'error';

        $result = \DB::connection('ministry')
                ->table(\DB::raw("(SELECT ID, APP_ID, REMARK, BLOCK_NUM, COUPON_NUM, MAIN_AREA_METER, MAIN_AREA_DONMS, ONWER_AREA, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE OWNER_PK=TO_OWNER_ID) TO_OWNER_ID, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE OWNER_PK=FROM_OWNER_ID) FROM_OWNER_ID FROM APP_COUPONS_TB WHERE APP_ID=".intval($appid)." ORDER BY ID)"))
                ->get();
                
        return response()->json( $result , 200);
    }


    public function bc_delete($ID_IN){

        $result = \DB::connection('ministry')
                ->table('APP_COUPONS_TB')
                ->where('ID' , intval($ID_IN))
                ->first();

                // dd($result->app_id);
        if(!$this->checkUserEditApp($result->app_id)) return 'error';
        $ID_IN=$result->id_in;


        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN APP_DEL_COPOUN_PR(:ID_IN);END;");

        $stmtf->bindParam(':ID_IN'         , $ID_IN , PDO::PARAM_INT);

        $stmtf->execute();
        return 'true';          
    }

    public function addBuyer(Request $request,$APP_ID_IN, $DOC_NUM_IN, $FIRST_NAME_IN, $SEC_NAME_IN, $GRAND_NAME_IN, $FAMILY_IN ,$DOC_TYPE_IN , $ONWER_TYPE_IN , $AGENT_TYPE_IN, $AGENT_DOC_IN, $AGENT_NAME , $OWNERS_UNION_IN){

        if($APP_ID_IN == 0 ){
            $APP_ID_IN = $this->save($request,$APP_ID_IN);
        }else if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        // dd('not now');
        if($AGENT_TYPE_IN==0) $AGENT_TYPE_IN=5;
        
        $data=\DB::connection('ministry')->table('APP_OWNERS_TB')->where('APP_ID',$APP_ID_IN)->where('DOC_NUM',$DOC_NUM_IN)->where('ONWER_TYPE',$ONWER_TYPE_IN)->first();
        if($data) return '{"ID":"'.$data->owner_pk.'", "APPID":"'.$APP_ID_IN.'"}';

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_OWNERS_PR(:APP_ID_IN, :DOC_NUM_IN, :FIRST_NAME_IN, :SEC_NAME_IN, :GRAND_NAME_IN, :FAMILY_IN, :DOC_TYPE_IN, :ONWER_TYPE_IN, :AGENT_TYPE_IN, :AGENT_DOC_IN, :AGENT_NAME, :OWNERS_UNION_IN, :OWNER_PK_IN);END;");

        $stmtf->bindParam(':APP_ID_IN'      , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':DOC_NUM_IN'     , $DOC_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':FIRST_NAME_IN'  , $FIRST_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':SEC_NAME_IN'    , $SEC_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':GRAND_NAME_IN'  , $GRAND_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':FAMILY_IN'      , $FAMILY_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':DOC_TYPE_IN'      , $DOC_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':ONWER_TYPE_IN'      , $ONWER_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_TYPE_IN'      , $AGENT_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_DOC_IN'      , $AGENT_DOC_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_NAME'      , $AGENT_NAME , PDO::PARAM_STR);
        $stmtf->bindParam(':OWNERS_UNION_IN'      , $OWNERS_UNION_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':OWNER_PK_IN'    , $OWNER_PK_IN , PDO::PARAM_INT );

        $stmtf->execute();

        return '{"ID":"'.$OWNER_PK_IN.'", "APPID":"'.$APP_ID_IN.'"}';
    }

    public function addSeller(Request $request,$APP_ID_IN, $DOC_NUM_IN, $FIRST_NAME_IN, $SEC_NAME_IN, $GRAND_NAME_IN, $FAMILY_IN,$DOC_TYPE_IN, $ONWER_TYPE_IN , $AGENT_TYPE_IN, $AGENT_DOC_IN, $AGENT_NAME){
        // dd($AGENT_TYPE_IN);

        // $DOC_TYPE_IN = 1;
        // $ONWER_TYPE_IN = 2;
        $OWNERS_UNION_IN = 0;

        if($APP_ID_IN == 0 ){
            $APP_ID_IN = $this->save($request ,$APP_ID_IN);
        }else if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        // dd('not now');
        if($AGENT_TYPE_IN==0) $AGENT_TYPE_IN=5;
        
        $data=\DB::connection('ministry')->table('APP_OWNERS_TB')->where('APP_ID',$APP_ID_IN)->where('DOC_NUM',$DOC_NUM_IN)->where('ONWER_TYPE',$ONWER_TYPE_IN)->first();
        if($data) return '{"ID":"'.$data->owner_pk.'", "APPID":"'.$APP_ID_IN.'"}';

        $OWNER_PK_IN=0;

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_OWNERS_PR(:APP_ID_IN, :DOC_NUM_IN, :FIRST_NAME_IN, :SEC_NAME_IN, :GRAND_NAME_IN, :FAMILY_IN, :DOC_TYPE_IN, :ONWER_TYPE_IN, :AGENT_TYPE_IN, :AGENT_DOC_IN, :AGENT_NAME, :OWNERS_UNION_IN, :OWNER_PK_IN);END;");

        $stmtf->bindParam(':APP_ID_IN'      , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':DOC_NUM_IN'     , $DOC_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':FIRST_NAME_IN'  , $FIRST_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':SEC_NAME_IN'    , $SEC_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':GRAND_NAME_IN'  , $GRAND_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':FAMILY_IN'      , $FAMILY_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':DOC_TYPE_IN'      , $DOC_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':ONWER_TYPE_IN'      , $ONWER_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_TYPE_IN'      , $AGENT_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_DOC_IN'      , $AGENT_DOC_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_NAME'      , $AGENT_NAME , PDO::PARAM_STR);
        $stmtf->bindParam(':OWNERS_UNION_IN'      , $OWNERS_UNION_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':OWNER_PK_IN'    , $OWNER_PK_IN , PDO::PARAM_INT );

        $stmtf->execute();

        return '{"ID":"'.$OWNER_PK_IN.'", "APPID":"'.$APP_ID_IN.'"}';
    }
    

    public function addSellerpost(Request $request){
        // dd($request->all());

        $APP_ID_IN = $request->id;

        $OWNERS_UNION_IN = 0;

        if($APP_ID_IN == 0 ){
            $APP_ID_IN = $this->save($request ,$APP_ID_IN);
        }else if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        // dd('not now');
        if($AGENT_TYPE_IN==0) $AGENT_TYPE_IN=5;

        $DOC_TYPE_IN = 1;
        $ONWER_TYPE_IN = 2;
        $DOC_NUM_IN= $request->qseller;
        $FIRST_NAME_IN= $request->sellerfname;
        $SEC_NAME_IN= $request->sellersname;
        $GRAND_NAME_IN= $request->sellertname;
        $FAMILY_IN= $request->sellerlname;
        $DOC_TYPE_IN= $request->DOC_TYPE_IN;
        $ONWER_TYPE_IN= $request->ONWER_TYPE_IN;
        $AGENT_TYPE_IN= $request->selleragenttype;
        $AGENT_DOC_IN= $request->qselleragent;
        $AGENT_NAME= $request->selleragentname;

        $data=\DB::connection('ministry')->table('APP_OWNERS_TB')->where('APP_ID',$APP_ID_IN)->where('DOC_NUM',$DOC_NUM_IN)->where('ONWER_TYPE',$ONWER_TYPE_IN)->first();
        if($data) return '{"ID":"'.$data->owner_pk.'", "APPID":"'.$APP_ID_IN.'"}';

        $OWNER_PK_IN=0;

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_OWNERS_PR(:APP_ID_IN, :DOC_NUM_IN, :FIRST_NAME_IN, :SEC_NAME_IN, :GRAND_NAME_IN, :FAMILY_IN, :DOC_TYPE_IN, :ONWER_TYPE_IN, :AGENT_TYPE_IN, :AGENT_DOC_IN, :AGENT_NAME, :OWNERS_UNION_IN, :OWNER_PK_IN);END;");

        $stmtf->bindParam(':APP_ID_IN'      , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':DOC_NUM_IN'     , $DOC_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':FIRST_NAME_IN'  , $FIRST_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':SEC_NAME_IN'    , $SEC_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':GRAND_NAME_IN'  , $GRAND_NAME_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':FAMILY_IN'      , $FAMILY_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':DOC_TYPE_IN'      , $DOC_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':ONWER_TYPE_IN'      , $ONWER_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_TYPE_IN'      , $AGENT_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_DOC_IN'      , $AGENT_DOC_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_NAME'      , $AGENT_NAME , PDO::PARAM_STR);
        $stmtf->bindParam(':OWNERS_UNION_IN'      , $OWNERS_UNION_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':OWNER_PK_IN'    , $OWNER_PK_IN , PDO::PARAM_STR , 2000);

        $stmtf->execute();

        return '{"ID":"'.$OWNER_PK_IN.'", "APPID":"'.$APP_ID_IN.'"}';
    }

    public function addBuyerpost(Request $request){
        // dd($request->all());

        $APP_ID_IN = $request->id;
        $DOC_NUM_IN = $request->qbuyer;
        $FIRST_NAME_IN = $request->buyerfname;
        $SEC_NAME_IN = $request->buyersname;
        $GRAND_NAME_IN = $request->buyertname;
        $FAMILY_IN = $request->buyerlname;
        $DOC_TYPE_IN = $request->DOC_TYPE_IN;
        $ONWER_TYPE_IN = $request->ONWER_TYPE_IN;
        $AGENT_TYPE_IN = $request->buyeragenttype;
        $AGENT_DOC_IN = $request->qbuyeragent;
        $AGENT_NAME = $request->buyeragentname;
        $OWNERS_UNION_IN = $request->union;

        if($APP_ID_IN == 0 ){
            $APP_ID_IN = $this->save($request,$APP_ID_IN);
        }else if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        // dd('not now');
        if($AGENT_TYPE_IN==0) $AGENT_TYPE_IN=5;
        
        $data=\DB::connection('ministry')->table('APP_OWNERS_TB')->where('APP_ID',$APP_ID_IN)->where('DOC_NUM',$DOC_NUM_IN)->where('ONWER_TYPE',$ONWER_TYPE_IN)->first();
        if($data) return '{"ID":"'.$data->owner_pk.'", "APPID":"'.$APP_ID_IN.'"}';

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_OWNERS_PR(:APP_ID_IN, :DOC_NUM_IN, :FIRST_NAME_IN, :SEC_NAME_IN, :GRAND_NAME_IN, :FAMILY_IN, :DOC_TYPE_IN, :ONWER_TYPE_IN, :AGENT_TYPE_IN, :AGENT_DOC_IN, :AGENT_NAME, :OWNERS_UNION_IN, :OWNER_PK_IN);END;");

        $stmtf->bindParam(':APP_ID_IN'      , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':DOC_NUM_IN'     , $DOC_NUM_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':FIRST_NAME_IN'  , $FIRST_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':SEC_NAME_IN'    , $SEC_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':GRAND_NAME_IN'  , $GRAND_NAME_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':FAMILY_IN'      , $FAMILY_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':DOC_TYPE_IN'      , $DOC_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':ONWER_TYPE_IN'      , $ONWER_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_TYPE_IN'      , $AGENT_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_DOC_IN'      , $AGENT_DOC_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':AGENT_NAME'      , $AGENT_NAME , PDO::PARAM_STR);
        $stmtf->bindParam(':OWNERS_UNION_IN'      , $OWNERS_UNION_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':OWNER_PK_IN'    , $OWNER_PK_IN , PDO::PARAM_INT );

        $stmtf->execute();

        return '{"ID":"'.$OWNER_PK_IN.'", "APPID":"'.$APP_ID_IN.'"}';
    }

    public function save(Request $request, $id = null){
    	// dd($request->all());
        if(!$id){
            $id = $request->id;
        }

        if(intval($id)>0 && !$this->checkUserEditApp($id)) return 'Error';
        $user_agent=$request->server('HTTP_USER_AGENT');

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_PETITIONS_PR(:IP_ADDREESS_IN, :APP_TYPE_IN, :CITY_ID_IN, :USER_ID_IN, :SERVER_IN, :BROWSER_IN, :OS_IN, :MANY_VALUE_IN, :USER_ID_DOC_IN, :JAW_NUM_IN, :REMARK_IN, :APP_TYPEFLAG_IN, :VAL_MANY_IN, :CUR_CD_IN, :APP_ID_IN, :PAR1, :PAR2);END;");

        $APP_TYPE_IN= $this->appType;
        $SERVER_IN='';
        $BROWSER_IN = $this->getBrowser($user_agent);
        $OS_IN= $this->getOS($user_agent);
        $MANY_VALUE_IN=floatval($request->many);
        $VAL_MANY_IN=floatval($request->valmany);
        $CUR_CD_IN=floatval($request->currency);
        $APP_ID_IN=intval($request->id);
        $PAR1=$request->par1;
        $PAR2=$request->par2;

        $CITY_ID_IN=$request->city;
        $JAW_NUM_IN=$request->mobile;
        $REMARK_IN=$request->remark;
        $APP_TYPEFLAG_IN=$request->lifecond;
        $DOC_NUM_IN=intval($request->applicant);
        $APP_NUM_IN=intval($request->appnum);
        $APP_YEAR_IN=intval($request->appyear);
        $CONTRACT_NUM_IN=intval($request->regnum);
        $REG_YEAR_IN=intval($request->regyear);
        $OWNER_TYPE_IN=intval($request->applicanttype);
        $USER_ID_IN= Sentinel::getUser()->id;
        $USER_ID_DOC_IN= Sentinel::getUser()->username;


        $stmtf->bindParam(':IP_ADDREESS_IN'         , $_SERVER['REMOTE_ADDR'] , PDO::PARAM_STR);
        $stmtf->bindParam(':APP_TYPE_IN'            , $APP_TYPE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':CITY_ID_IN'             , $CITY_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':USER_ID_IN'             , $USER_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':SERVER_IN'              , $SERVER_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':BROWSER_IN'             , $BROWSER_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':OS_IN'                  , $OS_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':MANY_VALUE_IN'          , $MANY_VALUE_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':USER_ID_DOC_IN'         , $USER_ID_DOC_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':JAW_NUM_IN'             , $JAW_NUM_IN , PDO::PARAM_STR);
        $stmtf->bindParam(':REMARK_IN'              , $REMARK_IN , PDO::PARAM_STR );
        $stmtf->bindParam(':APP_TYPEFLAG_IN'        , $APP_TYPEFLAG_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':VAL_MANY_IN'            , $VAL_MANY_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':CUR_CD_IN'              , $CUR_CD_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':APP_ID_IN'              , $APP_ID_IN , PDO::PARAM_STR , 2000);
        $stmtf->bindParam(':PAR1'                   , $PAR1 , PDO::PARAM_STR );
        $stmtf->bindParam(':PAR2'                   , $PAR2 , PDO::PARAM_STR );

        $stmtf->execute();
        
        
        if($request->confirm == '1'){
            $this->confirmApp($APP_ID_IN,'2');
        }

        // $item = $this->checkAccess('transaction.guaranteecontract.palestine','#','is is_admin','#');
        // if($item == 1){
        //     $this->addBuyer(intval($APP_ID_IN), '123', 'دولة', '-', '-', 'فلسطين', 1, 2, 5, '', '',0);
        // }

        $result = \DB::connection('ministry')->table('PLA_ATTACH_LIST')->orderBy('ATTACH_NAME')
                ->select('ATTACH_ID' , 'ATTACH_NAME')->get();
        // dd($result);
        foreach ($result as $row) {
            if($request['attach_'.$row->attach_id] == $row->attach_id ){
                $this->addAttachFile($row->attach_id, $APP_ID_IN, $request['attach_count_'.$row->attach_id]);
            }else $this->removeAttachFile($row->attach_id, $APP_ID_IN);
        }

        return $APP_ID_IN;
    }


    public function addAttachFile($ATTACH_ID_IN, $APP_ID_IN, $COUNT_PAPER_IN){
    	// dd('123');
        if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';
        // dd('asd');
        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  PLA_REQ_FILES_PR(:ATTACH_ID_IN, :APP_ID_IN, :COUNT_PAPER_IN, :REQ_ID_IN);END;");

        $stmtf->bindParam(':ATTACH_ID_IN'             , $ATTACH_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':APP_ID_IN'             , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':COUNT_PAPER_IN'             , $COUNT_PAPER_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':REQ_ID_IN'             , $REQ_ID_IN , PDO::PARAM_STR , 2000);

        $stmtf->execute();
        // dd($REQ_ID_IN);
        return '{"ID":"'.$REQ_ID_IN.'", "APPID":"'.$APP_ID_IN.'"}'; 
    }


    public function removeAttachFile($ATTACH_ID_IN, $APP_ID_IN){
        if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN PLA_DEL_FILES_PR(:ATTACH_ID_IN, :APP_ID_IN);END;");

        $stmtf->bindParam(':ATTACH_ID_IN'             , $ATTACH_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':APP_ID_IN'             , $APP_ID_IN , PDO::PARAM_INT);

        $stmtf->execute();

        return 'true';  
    }   


    public function confirmApp($APP_ID_IN,$FLAG_IN){
        // dump($APP_ID_IN);
        // dd($this->checkUserEditApp($APP_ID_IN));
        if(!$this->checkUserEditApp($APP_ID_IN)) return 'error';

        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_UPDATE_PETITIONS_PR(:FLAG_IN, :APP_ID_IN, :MESSAGE);END;");

        $stmtf->bindParam(':FLAG_IN'             , $FLAG_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':APP_ID_IN'             , $APP_ID_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':MESSAGE'            , $MESSAGE , PDO::PARAM_STR , 2000);

        $stmtf->execute();
        // dd('asd');
        // dd($MESSAGE);
        if($MESSAGE==1) return 'false';
        return 'true';
        
    }


    public function checkUserEditApp($id){
        $result = \DB::connection('ministry')
                ->table('APP_PETITIONS_TB')
                ->where('APP_ID' , $id )
                ->where('USER_ID' , Sentinel::getUser()->id)
                ->where('FLAG' , '1')
                ->first();

        if(isset($result)){
            if($result->app_id == $id ) return true;
            return false;
        }
        return false;
    }


    public function getSBOptions($appid, $type){
        if(!$this->checkUserEditApp($appid)) return 'error';

        $text_row = \DB::connection('ministry')->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME  FROM APP_OWNERS_TB WHERE APP_ID=".intval($appid)." AND ONWER_TYPE=".intval($type)." ORDER BY OWNER_PK)"))->get();

        return response()->json($text_row , 200);
    }


    public function getSBList($appid, $type){
        if(!$this->checkUserEditApp($appid)) return 'error';

        $text_row = \DB::connection('ministry')
        	->table(\DB::raw("(SELECT OWNER_PK, (CASE WHEN OWNERS_UNION=1 and ONWER_TYPE=3 THEN '- توحيد حصص' ELSE '' END) OWNERS_UNION, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME  FROM APP_OWNERS_TB WHERE APP_ID=".intval($appid)." AND ONWER_TYPE=".intval($type)." ORDER BY OWNER_PK)"))
        	->get();

        return response()->json($text_row , 200);
    } 

    public function person_delete($OWNER_PK){

        $result = \DB::connection('ministry')
                ->table('APP_OWNERS_TB')
                ->where('OWNER_PK' , intval($OWNER_PK))
                ->first();

                // dd($result->app_id);
        if(!$this->checkUserEditApp($result->app_id)) return 'error';
        $OWNER_PK_IN=$result->owner_pk;


        $pdof = \DB::connection('ministry')->getPdo();
        $stmtf=$pdof->prepare("BEGIN  APP_DEL_OWNER_PR(:OWNER_PK_IN, :MESSAGE);END;");

        $stmtf->bindParam(':OWNER_PK_IN'         , $OWNER_PK_IN , PDO::PARAM_INT);
        $stmtf->bindParam(':MESSAGE'             , $MESSAGE , PDO::PARAM_STR , 2000);

        $stmtf->execute();

        if($MESSAGE==1) return 'false';
        return 'true';          
    }

    public function getBrowser($user_agent) {    
        $browser        =   "Unknown Browser";
        $browser_array  =   array(
                                '/msie/i'       =>  'Internet Explorer',
                                '/firefox/i'    =>  'Firefox',
                                '/safari/i'     =>  'Safari',
                                '/chrome/i'     =>  'Chrome',
                                '/edge/i'       =>  'Edge',
                                '/opera/i'      =>  'Opera',
                                '/netscape/i'   =>  'Netscape',
                                '/maxthon/i'    =>  'Maxthon',
                                '/konqueror/i'  =>  'Konqueror',
                                '/mobile/i'     =>  'Handheld Browser'
                            );

        foreach ($browser_array as $regex => $value) { 
            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }
        return $browser;
    }

    public function getOS($user_agent) { 
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
        foreach ($os_array as $regex => $value) { 
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }   
        return $os_platform;
    }

    	public function printView($id){

		$item = $this->checkAccess('transaction.unguaranteecontract.manager','#','is is_admin','#');
        if($item == 1 ) $cond=' 1=1 ';
        else $cond=" USER_ID=".intval(Sentinel::getUser()->id)." ";

        $modal = array();
        $blockcoupon_row = array();


		if(true){
			$modal = \DB::connection("ministry")
    			->table( \DB::raw("(SELECT APP_ID,SUM_AREA,PAR1,PAR2,NO2TXT(MANY_VALUE,' '||(SELECT CUR_NAME FROM C_CUR_TB WHERE CUR_ID=CUR_CD)) MANY_TEXT, (SELECT CUR_NAME FROM C_CUR_TB WHERE CUR_ID=CUR_CD)||' ' CUR_NAME, (CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=2)>1 THEN 'البائعيين' ELSE 'البائع' END) SELLERS, (CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=3)>1 THEN 'المشتريين' ELSE 'المشتري' END) BUYERS, TO_CHAR(APP_DATE,'yyyy-mm-dd') APP_DATE, (SELECT C_APP_NAME FROM C_APPOPENTYPE_TB WHERE C_APP_ID=APP.APP_TYPE) APP_TYPE, (SELECT CITY_NAME FROM CITY_TABLE WHERE CITY_ID=APP.CITY_ID) CITY, MANY_VALUE, FLAG,(SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=2 and ROWNUM=1)||' '||(CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=2)>1 THEN 'وأخرين' ELSE '' END) FROM_SELLER, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=3 and ROWNUM=1)||' '||(CASE WHEN (SELECT COUNT(OWNER_PK) FROM APP_OWNERS_TB WHERE APP_ID=APP.APP_ID and ONWER_TYPE=3)>1 THEN 'وأخرين' ELSE '' END) TO_BUYER, REMARK FROM APP_PETITIONS_TB APP WHERE APP_ID=".intval($id)." AND ".$cond." AND FLAG<>3)"))
    			->first();

			// dd($modal);
			if(!$modal) return redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');
			if($modal->app_id != intval($id))  redirect()->back()->with('Danger','نعتذر لم تتم العملية بنجاح');

		}

		$buyer_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN AGENT_TYPE=6 THEN '/ بواسطة الوكيل '|| AGENT_FULL_NAME || ' / يحمل هوية رقم '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO, (CASE WHEN OWNERS_UNION=1 and ONWER_TYPE=3 THEN '- توحيد حصص' ELSE '' END) OWNERS_UNION FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=3 ORDER BY OWNER_PK)"))
		->get();


		$seller_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN AGENT_TYPE=6 THEN '/ بواسطة الوكيل '|| AGENT_FULL_NAME || ' / يحمل هوية رقم '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=2 ORDER BY OWNER_PK)"))
		->get();

		$buyers_signatures_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28)  THEN (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME || ' / يحمل هوية رقم '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO, (CASE WHEN OWNERS_UNION=1 and ONWER_TYPE=3 THEN '- توحيد حصص' ELSE '' END) OWNERS_UNION FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=3 ORDER BY OWNER_PK)"))
		->get();

		$sellers_signatures_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28) THEN (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME || ' / يحمل هوية رقم '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=2 ORDER BY OWNER_PK)"))
		->get();

		$blockcoupon_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT ID, APP_ID, BLOCK_NUM, COUPON_NUM, REMARK, MAIN_AREA_METER, MAIN_AREA_DONMS, ONWER_AREA, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE OWNER_PK=TO_OWNER_ID) TO_OWNER_ID, (SELECT FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME FROM APP_OWNERS_TB WHERE OWNER_PK=FROM_OWNER_ID) FROM_OWNER_ID FROM APP_COUPONS_TB WHERE APP_ID=".intval($id)." ORDER BY ID)"))
		->get();

		$blockcoupon2_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT DISTINCT BLOCK_NUM, COUPON_NUM FROM APP_COUPONS_TB WHERE APP_ID=".intval($id)." )"))
		->get();

		$attachments_row = \DB::connection("ministry")
		->table(\DB::raw("(SELECT LST.ATTACH_ID ATTACH_ID, LST.ATTACH_NAME ATTACH_NAME, FIL.APP_ID APP_ID, FIL.COUNT_PAPER COUNT_PAPER FROM PLA_REQ_FILES FIL LEFT JOIN PLA_ATTACH_LIST LST ON (LST.ATTACH_ID=FIL.ATTACH_ID) WHERE FIL.APP_ID=".intval($id)." ORDER BY ATTACH_NAME)"))
		->get();

		// dd($buyer_row);
		$modal->PRINT_DATE = date('Y-m-d');
		// $modal->WRITER_NAME = Sentinel::getUser()->full_name;


		//----------------------------------
		$resultSeller = \DB::connection("ministry")
		->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28) THEN ' - '|| (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME || ' هـ '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28) THEN ' - '|| (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME ELSE '' END) AGENT_INF FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=2 ORDER BY OWNER_PK)"))
		->get();

		$modal->seller_list = '';
		$modal->seller_list2 = '';

		for ($i=0; $i < sizeof($resultSeller) ; $i++) { 
			$rowSeller = $resultSeller[$i];
			if($rowSeller->doc_num =='123')
				$modal->seller_list .='//'.str_replace('- -','',$rowSeller->fullname).' يمثلها السيد / رئيس سلطة الأراضي  //';
			else $modal->seller_list .='//'.$rowSeller->fullname.' هـ  '.$rowSeller->doc_num.' '.$rowSeller->agent_info.'//';
			if($rowSeller->doc_num =='123')
				$modal->seller_list2 .='//'.str_replace('- -','',$rowSeller->fullname).' يمثلها السيد / رئيس سلطة الأراضي  //';
			else $modal->seller_list2 .='//'.$rowSeller->fullname.' '.$rowSeller->agent_inf.'//';

			if($i>8) $modal->seller_list = str_replace('<br />', ' /// ', $modal->seller_list);
			if($i>6) $modal->seller_list2 = str_replace('<br />', ' /// ', $modal->seller_list2);
		}

		$resultBuyer = \DB::connection("ministry")
			->table(\DB::raw("(SELECT OWNER_PK, APP_ID, DOC_NUM, DOC_TYPE, ONWER_TYPE, (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) AGENT_TYPE, AGENT_DOC_NUM, AGENT_FULL_NAME, FIRST_NAME||' '||SEC_NAME||' '||GRAND_NAME||' '||FAMILY_NAME AS FULLNAME, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28) THEN ' - '|| (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME || ' هـ '|| AGENT_DOC_NUM ELSE '' END) AGENT_INFO, (CASE WHEN (AGENT_TYPE=6 OR AGENT_TYPE=18 OR AGENT_TYPE=28) THEN ' - '|| (SELECT DESC_NAME FROM C_PETITION_TB WHERE C_ID=AGENT_TYPE) || ' / ' || AGENT_FULL_NAME ELSE '' END) AGENT_INF, (CASE WHEN OWNERS_UNION=1 and ONWER_TYPE=3 THEN '- توحيد حصص' ELSE '' END) OWNERS_UNION FROM APP_OWNERS_TB WHERE APP_ID=".intval($id)." AND ONWER_TYPE=3 ORDER BY OWNER_PK)"))
			->get();

		$modal->buyer_list = '';
		$modal->buyer_list_2 = '';

		for ($i=0; $i < sizeof($resultBuyer) ; $i++) {
			$rowBuyer = $resultBuyer[$i];

			$modal->buyer_list .='//'.$rowBuyer->fullname.' هـ  '.$rowBuyer->doc_num.' '.$rowBuyer->agent_info.'//';
			$modal->buyer_list_2 .='//'.$rowBuyer->fullname.' '.$rowBuyer->agent_inf.'//';
		}

        return view('admin.unguaranteecontract.print' , compact('id' ,'buyer_row' , 'seller_row' , 'buyers_signatures_row' , 'sellers_signatures_row' , 'blockcoupon_row' , 'blockcoupon2_row' ,'attachments_row' , 'modal' ,'blockcoupon_row'));
	}

}
