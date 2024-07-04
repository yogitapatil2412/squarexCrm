<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\District;
use App\Models\Schemes;
use App\Models\User;
use App\Models\Taluka;
use App\Models\Manufacturer;
use App\Models\State;
use App\Models\CustomerHistory;
use App\Models\DealerCompany;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
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

    public function customerLists(){
        $pageTitle = 'Customer';
        $emptyMessage = 'No Customer found';
        $district = District::where('is_deleted', '=' , 0)->get();
        $taluka = Taluka::where('is_deleted', '=' , 0)->get();
        $state = State::where('is_deleted', '=' , 0)->get();
        // if(auth()->user()->role==1){
        //     $customer = Customer::orderBy('id','desc')->paginate(getPaginate());
        // }
        // else{
        //     $customer = Customer::where('assign_to', '=' , auth()->user()->id)->orderBy('id','desc')->paginate(getPaginate());
        // }
        $customer = Customer::orderBy('id','desc')->paginate(getPaginate());
        $employee = User::where('id', '!=' , 1)->get();
        return view('customer.customer', compact('pageTitle', 'emptyMessage', 'customer', 'taluka', 'district', 'state','employee'));
    }
    
    public function search(Request $request, $scope)
    {
        $search = $request->search;
        
        // $customer = Customer::orderBy('id','desc')->paginate(getPaginate());

        // $customers = Customer::where(function ($customer) use ($search) {
        //     $customer->where('full_name', 'like', "%$search%")
        //         ->orWhere('company_name', 'like', "%$search%")
        //         ->orWhere('mobile', 'like', "%$search%");
        // });

        $customers = Customer::with(['customerDistrict', 'customerTaluka'])->where(function ($q) use ($search) {
            $q->where('full_name', 'like', "%$search%")
            ->orWhere('company_name', 'like', "%$search%")
            ->orWhere('shop_name', 'like', "%$search%")
            ->orWhere('mobile', 'like', "%$search%")
            ->orWhereHas('customerDistrict', function ($district) use ($search) {
                $district->where('district_name', 'like', "%$search%");
            });
        });

        $pageTitle = '';
        

        $customer = $customers->orderBy('id','desc')->paginate(getPaginate());
        $pageTitle .= 'User Search - ' . $search;
        $emptyMessage = 'No search result found';
        $district = District::where('is_deleted', '=' , 0)->get();
        $taluka = Taluka::where('is_deleted', '=' , 0)->get();
        $state = State::where('is_deleted', '=' , 0)->get();
        $employee = User::where('id', '!=' , 1)->get();
        return view('customer.customer', compact('pageTitle', 'search', 'scope','emptyMessage', 'customer', 'taluka', 'district', 'state','employee'));
    }
    public function customerStore(Request $request){
        $request->validate([
            'full_name' => 'required',
            'email'        =>   'required|email|unique:customer',
            'mobile' => 'required|unique:customer,mobile|unique:customer,alternate_number',
            'alternate_number' => 'required|unique:customer,mobile|unique:customer,alternate_number',
            'address'  => 'required',
            'gender'=> 'required',
            'taluka'=> 'required',
            'district'=> 'required',
            'state'=> 'required'
        ]);
        $customer = new Customer();
        $customer->company_name = $request->company_name;
        $customer->full_name = $request->full_name;
        $customer->shop_name = $request->shop_name;
        $customer->email = $request->email;
        $customer->date_of_birth = ($request->date_of_birth != '' ? date('Y-m-d', strtotime($request->date_of_birth)) : NULL);
        $customer->mobile = $request->mobile;
        $customer->alternate_number = $request->alternate_number;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->pin_code = $request->pin_code;
        $customer->taluka = $request->taluka;
        $customer->district = $request->district;
        $customer->state = $request->state;
        $customer->last_called = date('Y-m-d');
        $customer->call_date = date('Y-m-d');
        $customer->call_time = date('h:i A');
        $customer->added_by = auth()->user()->id;
        $customer->assign_to = auth()->user()->id;
        $customer->status = 1;
        $customer->save();

        $notify[] = ['success','Customer saved successfully'];
        return back()->withNotify($notify);
    }

    public function customerUpdate(Request $request, $id){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:customer,email,'.$request->id,
            'mobile' => 'required|unique:customer,mobile,'.$request->id.'|unique:customer,alternate_number,'.$request->id,
            'alternate_number' => 'required|unique:customer,mobile,'.$request->id.'|unique:customer,alternate_number,'.$request->id,
            'address'  => 'required',
            'gender'=> 'required',
            'taluka'=> 'required',
            'district'=> 'required',
            'state'=> 'required'
        ]);
        // return $request;
        $customer = Customer::find($id);
        $customer->company_name = $request->company_name;
        $customer->full_name = $request->full_name;
        $customer->shop_name = $request->shop_name;
        $customer->email = $request->email;
        $customer->date_of_birth = ($request->date_of_birth != '' ? date('Y-m-d', strtotime($request->date_of_birth)) : NULL);
        $customer->mobile = $request->mobile;
        $customer->alternate_number = $request->alternate_number;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->pin_code = $request->pin_code;
        $customer->taluka = $request->taluka;
        $customer->district = $request->district;
        $customer->state = $request->state;
        $customer->save();
        $notify[] = ['success','Customer updated successfully'];
        return back()->withNotify($notify);
    }

    public function customerEnableDisabled(Request $request){
        $request->validate(['id' => 'required|integer']);
        $customer = Customer::find($request->id);
        $customer->status = $customer->status == 1 ? 0 : 1;
        $customer->save();
        if($customer->status == 1){
            $notify[] = ['success', 'Customer active successfully.'];
        }else{
            $notify[] = ['success', 'Customer disabled successfully.'];
        }
        return back()->withNotify($notify);
    }

    public function customerDelete(Request $request){
        $request->validate(['id' => 'required|integer']);
        Customer::find($request->id)->delete();
        $notify[] = ['success', 'Customer deleted successfully.'];
        return back()->withNotify($notify);
    }
    public function updateTme(Request $request, $id){
        
        $customer = Customer::find($request->id);
        $customer->assign_to = $request->assign_to;
        $customer->save();
        $notify[] = ['success','TME Assign successfully'];
        return back()->withNotify($notify);
    }
    public function customerDetail(Request $request, $id){
        $pageTitle = 'Customer Detail';
        $emptyMessage = 'No Customer found';
        $customer = Customer::where('id', $id)->firstOrFail();
        $employee = User::where('is_deleted', '=' , 0)->get();
        $customerHistory = CustomerHistory::where('customer_id', $id)->orderBy('id','desc')->first();
        $dealer_ship_company = DealerCompany::where('is_deleted', '=' , 0)->get();
        return view('customer.detail', compact('pageTitle', 'emptyMessage', 'customer', 'customerHistory', 'employee','dealer_ship_company'));
    }
    public function customerHistorySave(Request $request, $id){
        // $request->validate([
        //     'follow_up_date' => 'required',
        //     'call_status'        =>   'required',
        //     'package_pitched'        => 'required',
        //     'amount_pitched'  => 'required',
        //     'prospect_status'=> 'required',
        //     'appointment_date'=> 'required',
        //     'follow_up_status'=> 'required'
        // ]);
        // return $request;
        // $dealer_ship_company_name = json_encode($request->dealer_ship_company_name);
        $dealer_ship_company_name = "";
        if(!(empty($request->dealer_ship_company_name))){
            $dealer_ship_company_name = implode(', ', $request->dealer_ship_company_name);
        }
        $customer = Customer::find($id);
        
        $customer->call_date = date('Y-m-d');
        $customer->call_time = date('h:i A');
        $customer->call_status = $request->call_status;
        if($request->follow_up_date != ''){
            $customer->follow_up_date = date('Y-m-d', strtotime($request->follow_up_date));
        }
        if($request->sale_close_date != ''){
            $customer->sale_close_date  = date('Y-m-d', strtotime($request->sale_close_date));
            $customer->sale_closed_by = auth()->user()->id;
            $customer->sale_status = 'closed';
        }
        $customer->updated_by = auth()->user()->id;
        $customer->save();
        
        $customerHistory = new CustomerHistory();
        $customerHistory->customer_id = $id;
        $customerHistory->call_date = date('Y-m-d');
        $customerHistory->call_time = date('h:i A');
        $customerHistory->follow_up_date = ($request->follow_up_date != '' ? date('Y-m-d', strtotime($request->follow_up_date)) : NULL);
        $customerHistory->call_status = $request->call_status;
        $customerHistory->sale_close_date  = ($request->sale_close_date != '' ? date('Y-m-d', strtotime($request->sale_close_date)) : NULL);
        $customerHistory->amount_pitched = $request->amount_pitched;
        $customerHistory->dealer_ship_company_name = $dealer_ship_company_name;
        $customerHistory->demo_date = ($request->demo_date != '' ? date('Y-m-d', strtotime($request->demo_date)) : NULL);
        $customerHistory->follow_up_status = $request->follow_up_status;
        $customerHistory->software_demo = $request->software_demo;
        $customerHistory->detailed_remark= $request->detailed_remark;
        $customerHistory->client_handling_by= $request->client_handling_by;
        $customerHistory->updated_by = auth()->user()->id;
        $customerHistory->save();

        $notify[] = ['success','Customer history updated successfully'];
        return back()->withNotify($notify);
    }
    public function customerHistory(Request $request, $id){
        $pageTitle = 'Customer Detail';
        $emptyMessage = 'Customer history not found';
        $customer = Customer::where('id', $id)->firstOrFail();
        $customerHistory = CustomerHistory::where('customer_id', $id)->orderBy('id','desc')->get();
        return view('customer.history', compact('pageTitle', 'emptyMessage', 'customer','customerHistory'));
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function customerexport() 
    {
        return Excel::download(new UsersExport, 'Dealers.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function customerimport() 
    {
        Excel::import(new UsersImport,request()->file('file'));
               
        $notify[] = ['success','Customer has been imported successfully'];
        return back()->withNotify($notify);
    }
}
