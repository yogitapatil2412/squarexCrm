<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    protected $table = "customer";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }

    public function customerHistory(){
        return $this->belongsTo(CustomerHistory::class, 'customer_id', 'id');
    }
    public function lastCustomerHistory()
    {
        return $this->hasOne(CustomerHistory::class, 'customer_id', 'id')->latestOfMany();
    }
    public function customerDistrict(){
        return $this->belongsTo(District::class, 'district', 'id');
    }

    public function customerTaluka(){
        return $this->belongsTo(Taluka::class, 'taluka', 'id');
    }
    public function customerState(){
        return $this->belongsTo(State::class, 'state', 'id');
    }
    public function updateBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id')->withDefault();
    }
    public function asignTME(){
        // return $this->belongsTo(User::class, 'added_by', 'id');
        return $this->belongsTo(User::class, 'assign_to', 'id')->withDefault();
    }
    public function closedByUser(){
        return $this->belongsTo(User::class, 'sale_closed_by', 'id')->withDefault();
    }
}
