<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schemes;
use App\Models\DealerCompany;


class DealerCompanyController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
        date_default_timezone_set("Asia/Calcutta");
   }


   public function dealercompanyLists(){
        $pageTitle = 'Dealer Company';
        $emptyMessage = 'No Dealer Company found';
        
       
        $dealercompany = DealerCompany::where('is_deleted', '=' , 0)->orderBy('id','desc')->paginate(getPaginate());
        return view('dealercompany.dealercompany', compact('pageTitle', 'emptyMessage', 'dealercompany'));
    }
    public function dealercompanyStore(Request $request){
        $request->validate([
            'company_name' => 'required',
            
        ]);
        $dealercompany = new DealerCompany();
        $dealercompany->company_name = $request->company_name;
        
        
        $dealercompany->status = 1;
        $dealercompany->save();

        $notify[] = ['success','DealerCompany saved successfully'];
        return back()->withNotify($notify);
    }
    public function dealercompanyUpdate(Request $request, $id){
        $request->validate([
            'company_name' => 'required',
            
        ]);
        // return $request;
        $dealercompany = DealerCompany::find($id);
        $dealercompany->company_name = $request->company_name;
       
        $dealercompany->save();
        $notify[] = ['success','DealerCompany updated successfully'];
        return back()->withNotify($notify);
    }
    public function dealercompanyDelete(Request $request){
        $request->validate(['id' => 'required|integer']);
        $dealercompany = DealerCompany::find($request->id);
        $dealercompany->is_deleted = 1;
        $dealercompany->save();

        // for hard delete
            // $state=State::find($request->id);
            // $state->delete(); 

        $notify[] = ['success', 'DealerCompany has been deleted successfully.'];
        return back()->withNotify($notify);
    }
    
    
    
}
