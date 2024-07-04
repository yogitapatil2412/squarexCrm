<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = ['id'];

    protected $table = "district";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }
    
    public function talukas()
    {
        return $this->hasMany(Taluka::class);
    }

}
