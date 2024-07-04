<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taluka extends Model
{
    protected $guarded = ['id'];

    protected $table = "taluka";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }
    
    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
