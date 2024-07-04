<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $guarded = ['id'];

    protected $table = "manufacturer";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }

}
