<?php

use App\Lib\GoogleAuthenticator;
use App\Lib\SendSms;
use App\Models\EmailTemplate;
use App\Models\Extension;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\SmsTemplate;
use App\Models\EmailLog;
use App\Models\Counter;
use Carbon\Carbon;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
function getPaginate($paginate = 10)
{
    return $paginate;
}

function paginateLinks($data, $design = 'partials.paginate'){
    return $data->appends(request()->all())->links($design);
}
function siteName()
{
    $general = GeneralSetting::first();
    $sitname = str_word_count($general->sitename);
    $sitnameArr = explode(' ', $general->sitename);
    if ($sitname > 1) {
        $title = "<span>$sitnameArr[0] </span> " . str_replace($sitnameArr[0], '', $general->sitename);
    } else {
        $title = "<span>$general->sitename</span>";
    }

    return $title;
}
function favicon()
{    
    $general = GeneralSetting::first();
    if($general->favicon) {
        return $general->favicon;
    }
    return asset('assets/images/default.png');
}
function logo()
{    
    $general = GeneralSetting::first();
    if($general->logo) {
        return $general->logo;
    }
    return asset('assets/images/default.png');
}
function logo_2()
{    
    $general = GeneralSetting::first();
    if($general->logo_2) {
        return $general->logo_2;
    }
    return asset('assets/images/default.png');
}