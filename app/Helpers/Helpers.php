<?php

use App\Models\Setting;

if (!function_exists('echo_setting')) {
    function echo_setting($setting)
    {
        $setting = Setting::where('key', $setting)->first();
        if (isset($setting)) {
            if ($setting->is_image == 0) {
                $setting = isset($setting) ? $setting->value : "";
            } else {
                $setting = isset($setting) ? asset('assets/app/images/' . $setting->value . '') : "No Image Found";
            }
        } else {
            $setting = '';
        }
        echo $setting;
    }
}

if (!function_exists('get_setting')) {
    function get_setting($setting)
    {
        $setting = Setting::where('key', $setting)->first();
        if (isset($setting)) {
            if ($setting->is_image == 0) {
                $setting = isset($setting) ? $setting->value : "";
            } else {
                $setting = isset($setting) ? '/assets/app/images/' . $setting->value : "No Image Found";
            }
        } else {
            $setting = '';
        }
        return $setting;
    }
}