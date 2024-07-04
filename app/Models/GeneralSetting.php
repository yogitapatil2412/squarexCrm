<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['mail_config' => 'object','sms_config' => 'object'];

    public function scopeSitename($query, $pageTitle)
    {
        $pageTitle = empty($pageTitle) ? '' : ' - ' . $pageTitle;
        return $this->sitename . $pageTitle;
    }
    public function scopeFavicon($query)
    {
        return $this->favicon ;
    }
    public function scopeLogo($query)
    {
        return $this->logo ;
    }
    public function scopeLoginImg($query)
    {
        return $this->login_img ;
    }
}
