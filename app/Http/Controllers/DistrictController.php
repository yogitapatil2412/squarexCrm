<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schemes;
use App\Models\District;


class DistrictController extends Controller
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
    public function index()
    {
        $districts = District::all();
        return response()->json($districts);
    }

   public function districtLists(){
        $pageTitle = 'District';
        $emptyMessage = 'No District found';
        
       
        $district = District::where('is_deleted', '=' , 0)->orderBy('id','desc')->paginate(getPaginate());
        return view('district.district', compact('pageTitle', 'emptyMessage', 'district'));
    }
    public function districtStore(Request $request){
        $request->validate([
            'district_name' => 'required',
            
        ]);
        $district = new District();
        $district->district_name = $request->district_name;
        
        
        $district->status = 1;
        $district->save();

        $notify[] = ['success','District saved successfully'];
        return back()->withNotify($notify);
    }
    public function districtUpdate(Request $request, $id){
        $request->validate([
            'district_name' => 'required',
            
        ]);
        // return $request;
        $district = District::find($id);
        $district->district_name = $request->district_name;
       
        $district->save();
        $notify[] = ['success','District updated successfully'];
        return back()->withNotify($notify);
    }
    public function districtDelete(Request $request){
        $request->validate(['id' => 'required|integer']);
        $district = District::find($request->id);
        $district->is_deleted = 1;
        $district->save();

        // for hard delete
            // $state=State::find($request->id);
            // $state->delete(); 

        $notify[] = ['success', 'District has been deleted successfully.'];
        return back()->withNotify($notify);
    }
    
    
    
}
