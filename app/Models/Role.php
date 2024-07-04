<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    protected $table = "role";


    public function user(){
        return $this->hasMany(User::class)->where('status', 1);
    }

}
