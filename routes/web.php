<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TalukaController;
use App\Http\Controllers\DealerCompanyController;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(LoginController::class)->group(function(){

    Route::get('/', 'index')->name('login');
    Route::get('login', 'index')->name('login');
    Route::get('logout', 'logout')->name('logout');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('validate_registration');

    Route::post('validate_login', 'validate_login')->name('validate_login');
});
Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('employee', [AdminController::class, 'employeeLists'])->name('employee');
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        
        Route::get('setting', [AdminController::class, 'setting'])->name('setting');
        Route::post('setting', [AdminController::class, 'settingUpdate'])->name('setting.update');

        // Customer
        Route::name('customer.')->prefix('manage')->group(function(){
            //customer
            Route::controller(CustomerController::class)->group(function(){
                Route::get('customer', 'customerLists')->name('customer');
                Route::get('customer/{scope}/search', 'search')->name('customer.search');
                Route::post('customer', 'customerStore')->name('customer.store');
                Route::post('customer/update/{id}', 'customerUpdate')->name('customer.update');
                Route::post('customer/active-disable', 'customerEnableDisabled')->name('customer.active.disable');
                Route::post('customer/delete', 'customerDelete')->name('customer.delete');
                Route::get('customer/detail/{id}', 'customerDetail')->name('customer.detail');       
                
                Route::post('customer/updateTme/{id}', 'updateTme')->name('customer.updateTme');         
                Route::post('customer/customer_history_save/{id}', 'customerHistorySave')->name('customer.customer_history_save');
                Route::get('customer/history/{id}', 'customerHistory')->name('customer.history');      
                
                Route::get('customer-export', 'customerexport')->name('customer.export');
                Route::post('customer-import', 'customerimport')->name('customer.import');          
            });
        });
        Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
        Route::get('/districts/{district}/talukas', [TalukaController::class, 'getTalukas'])->name('districts.talukas');
        // state
        Route::name('state.')->group(function(){
            //state
            Route::controller(StateController::class)->group(function(){  
                Route::get('state', 'stateLists')->name('state');  
                Route::post('state', 'stateStore')->name('state.store');  
                Route::post('state/update/{id}', 'stateUpdate')->name('state.update');   
                Route::post('state/delete', 'stateDelete')->name('state.delete');
            });
        });
        // district
        Route::name('district.')->group(function(){
            //district
            Route::controller(DistrictController::class)->group(function(){  
                Route::get('district', 'districtLists')->name('district');  
                Route::post('district', 'districtStore')->name('district.store');  
                Route::post('district/update/{id}', 'districtUpdate')->name('district.update');   
                Route::post('district/delete', 'districtDelete')->name('district.delete');
            });
        });
        // taluka
        Route::name('taluka.')->group(function(){
            //taluka
            Route::controller(TalukaController::class)->group(function(){  
                Route::get('taluka', 'talukaLists')->name('taluka');  
                Route::post('taluka', 'talukaStore')->name('taluka.store');  
                Route::post('taluka/update/{id}', 'talukaUpdate')->name('taluka.update');   
                Route::post('taluka/delete', 'talukaDelete')->name('taluka.delete');
            });
        });
        // dealercompany
        Route::name('dealercompany.')->group(function(){
            //dealercompany
            Route::controller(DealerCompanyController::class)->group(function(){  
                Route::get('dealercompany', 'dealercompanyLists')->name('dealercompany');  
                Route::post('dealercompany', 'dealercompanyStore')->name('dealercompany.store');  
                Route::post('dealercompany/update/{id}', 'dealercompanyUpdate')->name('dealercompany.update');   
                Route::post('dealercompany/delete', 'dealercompanyDelete')->name('dealercompany.delete');
            });
        });
    });
});
