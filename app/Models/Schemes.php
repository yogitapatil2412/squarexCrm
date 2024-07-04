<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schemes extends Model
{
    protected $guarded = ['id'];

    protected $table = "schemes";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }

}
