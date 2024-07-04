<?php
  
namespace App\Exports;
  
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::select("company_name", "full_name", "email", "mobile", "address", "follow_up_date")->get();
        // Fetch users with their related roles
        return Customer::with(['customerDistrict', 'customerTaluka'])->get()->map(function($customer) {
            return [
                'company_name' => $customer->company_name,
                'shop_name' => $customer->shop_name,
                'full_name' => $customer->full_name,
                'email' => $customer->email,
                'mobile' => $customer->mobile,
                'alternate_number' => $customer->alternate_number,
                'address' => $customer->address,
                'pin_code' => $customer->pin_code,
                'district' => $customer->district ? $customer->customerDistrict->district_name : '',
                'taluka' => $customer->taluka ? $customer->customerTaluka->taluka_name : '',
                'state' => $customer->state ? $customer->customerState->state_name : '',
                'call_date' => $customer->call_date,
                'call_time' => $customer->call_time,
                'follow_up_date' => $customer->follow_up_date,
                'call_status' => $customer->call_status,
                'sale_close_date' => $customer->sale_close_date,
                'amount_pitched' => $customer->lastCustomerHistory ? $customer->lastCustomerHistory->amount_pitched : '',
                // 'dealer_ship_company_name' => $customer->lastCustomerHistory ? ($customer->lastCustomerHistory->getRelatedModelsAttribute() ?? ($customer->lastCustomerHistory->getRelatedModelsAttribute() ?? '')) : '',
                'dealer_ship_company_name' =>   $customer->lastCustomerHistory ? $customer->lastCustomerHistory->getRelatedModelsAttribute()->pluck('company_name')->implode(', ') : '',
                'demo_date' => $customer->lastCustomerHistory ? $customer->lastCustomerHistory->demo_date : '',
                'follow_up_status' => $customer->lastCustomerHistory ? $customer->lastCustomerHistory->follow_up_status : '',
                'software_demo' => $customer->lastCustomerHistory ? $customer->lastCustomerHistory->software_demo : '',
                'detailed_remark' => $customer->lastCustomerHistory ? $customer->lastCustomerHistory->detailed_remark : '',
                'client_handling_by' => $customer->lastCustomerHistory ? ($customer->lastCustomerHistory->clientHandlingBy->full_name ?? '') : '',
            ];
        });
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            "Company Name",
            "Shop Name",
            "Proprietor Name",
            "Email",
            "Mobile",
            "Alternate Number",
            "Address",
            "Pin Code",
            "District",
            "Taluka",
            "State",
            "Call Date",
            "Call Time",
            "Follow Up Date",
            "Call Status",
            "Sale Close Date",
            "Amount Pitched",
            "Dealer Ship Company Name",
            "Demo Date",
            "Follow Up Status",
            "Software Demo",
            "Detailed Remark",
            "Client Handling By"
        ];

    }
}