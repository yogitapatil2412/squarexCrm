<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    protected $guarded = ['id'];

    protected $table = "customer_history";


    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function clientHandlingBy(){
        return $this->belongsTo(User::class, 'client_handling_by', 'id')->withDefault();
    }
    
    public function dealerCompany(){
        return $this->belongsTo(DealerCompany::class, 'dealer_ship_company_name', 'id')->withDefault();
        
    }
    public function getRelatedModelsAttribute()
    {
        $ids = explode(',', $this->attributes['dealer_ship_company_name']);
        return DealerCompany::whereIn('id', $ids)->get();
    }
}
