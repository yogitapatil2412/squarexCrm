<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schemes;
use App\Models\Taluka;
use App\Models\District;

class TalukaController extends Controller
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


   public function talukaLists(){
        $pageTitle = 'Taluka';
        $emptyMessage = 'No Taluka found';
        $district = District::where('is_deleted', '=' , 0)->get();
        
       
        $taluka = Taluka::where('is_deleted', '=' , 0)->orderBy('id','desc')->paginate(getPaginate());
        return view('taluka.taluka', compact('pageTitle', 'emptyMessage', 'taluka', 'district'));
    }
    public function talukaStore(Request $request){
        $request->validate([
            'taluka_name' => 'required',
            
        ]);
        $taluka = new Taluka();
        $taluka->taluka_name = $request->taluka_name;
        $taluka->district_id = $request->district;
        
        
        $taluka->status = 1;
        $taluka->save();

        $notify[] = ['success','Taluka saved successfully'];
        return back()->withNotify($notify);
    }
    public function talukaUpdate(Request $request, $id){
        $request->validate([
            'taluka_name' => 'required',
            
        ]);
        // return $request;
        $taluka = Taluka::find($id);
        $taluka->taluka_name = $request->taluka_name;
        $taluka->district_id = $request->district;
       
        $taluka->save();
        $notify[] = ['success','Taluka updated successfully'];
        return back()->withNotify($notify);
    }
    public function talukaDelete(Request $request){
        $request->validate(['id' => 'required|integer']);
        $taluka = Taluka::find($request->id);
        $taluka->is_deleted = 1;
        $taluka->save();

        // for hard delete
            // $state=State::find($request->id);
            // $state->delete(); 

        $notify[] = ['success', 'Taluka has been deleted successfully.'];
        return back()->withNotify($notify);
    }
    
    public function getTalukas(District $district)
    {
        return response()->json($district->talukas);
    }
    
}
