<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use App\Models\Customer;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //  echo "<pre>";print_r($row);echo "<br>";die();
        if($row['full_name']!=''){
            $customer = new Customer();
            $customer->shop_name = $row['shop_name'];
            $customer->full_name = $row['full_name'];
            $customer->mobile = $row['mobile'];
            // $customer->alternate_number	 = $row['alternate_number'];
            $customer->company_name = $row['company_name'];
            // $customer->email = $request->email;
            // $customer->gender = $request->gender;
            $customer->address =$row['address'];
            // $customer->pin_code = $request->pin_code;
            // $customer->taluka = $row['taluka'];
            // $customer->district = $row['district'];
            // $customer->state = $request->state;
            $customer->last_called = date('Y-m-d');
            $customer->call_date = date('Y-m-d');
            $customer->call_time = date('h:i A');
            $customer->added_by = auth()->user()->id;
            $customer->status = 1;
            $customer->save();
            // return new User([
            //     'name'     => $row['name'],
            //     'email'    => $row['email'], 
            //     'password' => Hash::make($row['password']),
            // ]);
            return;
        }
    }
}