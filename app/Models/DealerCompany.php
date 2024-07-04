<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerCompany extends Model
{
    protected $guarded = ['id'];

    protected $table = "dealer_ship_company";


    // public function user(){
    //     return $this->hasMany(User::class)->where('status', 1);
    // }

}
