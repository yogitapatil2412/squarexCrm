<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\Customer;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    function index()
    {
        return view('dashboard');
    }

    function dashboard()
    {
        
        $pageTitle = "Dashboard";

        $customerCount = Customer::count();
        $userCount = User::where('id', '!=' , 1)-> count();
        $closedSalesCount = Customer::where('sale_status', 'closed')->count();;
        $pendingSalesCount = Customer::where('sale_status', 'Pending')->count();;
        if(Auth::check())
        {
            $user = auth()->user();
            return view('dashboard', compact('pageTitle','customerCount','userCount','closedSalesCount','pendingSalesCount'));
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    public function profile()
    {
        $pageTitle = "Profile Setting";
        $admin = Auth::user();
        // $admin = Auth::guard('admin')->user();
        return view('user.profile_setting', compact('pageTitle','admin'));
    }
    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            // 'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        // $user = Auth::guard('admin')->user();  
        $user = Auth::user();
        
        $user->full_name = $request->full_name;
        
        $date = date('dmY');
        if($request->hasFile('image')){
            $userImage = $request->image;
            $fileName = $userImage->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $userImage->move('assets/images/user/'.$date.'/', $fileName);
            $user->image = 'assets/images/user/'.$date.'/'.$fileName;
        }
        
        $user->save();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('profile')->withNotify($notify);
    }

    public function employeeLists(){
        $pageTitle = 'Employee';
        $emptyMessage = 'No Employee found';
        $employee = User::where('id', '!=' , 1)->orderBy('id','desc')->paginate(getPaginate());
        return view('employee.employee', compact('pageTitle', 'emptyMessage', 'employee'));
    }

    public function setting()
    {
        $pageTitle = "Setting";
        $general_setting = GeneralSetting::firstOrFail();
        return view('user.site_setting', compact('pageTitle','general_setting'));
    }

    public function settingUpdate(Request $request)
    {
        $this->validate($request, [
            'sitename' => 'required'
        ]);  
        $general_setting = GeneralSetting::firstOrFail();
        
        $general_setting->sitename = $request->sitename;
        
        $date = date('dmY');
        if($request->hasFile('favicon')){
            $favicon = $request->favicon;
            $faviconfileName = $favicon->getClientOriginalName();
            $faviconfileName = str_replace(" ", "-", $faviconfileName);
            $favicon->move('assets/images/favicon/'.$date.'/', $faviconfileName);
            $general_setting->favicon = 'assets/images/favicon/'.$date.'/'.$faviconfileName;
        }
        
        if($request->hasFile('logo')){
            $logo = $request->logo;
            $logofileName = $logo->getClientOriginalName();
            $logofileName = str_replace(" ", "-", $logofileName);
            $logo->move('assets/images/logo/'.$date.'/', $logofileName);
            $general_setting->logo = 'assets/images/logo/'.$date.'/'.$logofileName;
        }

        if($request->hasFile('login_img')){
            $login_img = $request->login_img;
            $login_imgfileName = $login_img->getClientOriginalName();
            $login_imgfileName = str_replace(" ", "-", $login_imgfileName);
            $login_img->move('assets/images/login_img/'.$date.'/', $login_imgfileName);
            $general_setting->login_img = 'assets/images/login_img/'.$date.'/'.$login_imgfileName;
        }
        
        $general_setting->save();
        $notify[] = ['success', 'Your setting has been updated.'];
        return redirect()->route('setting')->withNotify($notify);
    }
}
