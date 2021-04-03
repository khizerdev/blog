<?php

use App\Setting;

function sidebar()
{
    $setting = Setting::first();

    return $setting;
}

?>