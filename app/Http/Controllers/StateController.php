<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schemes;
use App\Models\State;


class StateController extends Controller
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


   public function stateLists(){
        $pageTitle = 'State';
        $emptyMessage = 'No State found';
        
       
        $state = State::where('is_deleted', '=' , 0)->orderBy('id','desc')->paginate(getPaginate());
        return view('state.state', compact('pageTitle', 'emptyMessage', 'state'));
    }
    public function stateStore(Request $request){
        $request->validate([
            'state_name' => 'required',
            
        ]);
        $state = new State();
        $state->state_name = $request->state_name;
        
        
        $state->status = 1;
        $state->save();

        $notify[] = ['success','State saved successfully'];
        return back()->withNotify($notify);
    }
    public function stateUpdate(Request $request, $id){
        $request->validate([
            'state_name' => 'required',
            
        ]);
        // return $request;
        $state = State::find($id);
        $state->state_name = $request->state_name;
       
        $state->save();
        $notify[] = ['success','State updated successfully'];
        return back()->withNotify($notify);
    }
    public function stateDelete(Request $request){
        $request->validate(['id' => 'required|integer']);
        $state = State::find($request->id);
        $state->is_deleted = 1;
        $state->save();

        // for hard delete
            // $state=State::find($request->id);
            // $state->delete(); 

        $notify[] = ['success', 'State has been deleted successfully.'];
        return back()->withNotify($notify);
    }
    
    
    
}
