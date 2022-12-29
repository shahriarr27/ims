<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class StoreSettingController extends Controller
{
    public function index()
    {
        //return \config('paypal.sandbox.client_id');
        return view('backend.app_settings.index');
    }

    public function store(Request $request)
    {
        foreach ($request->type as $key => $type) {
            $setting = Setting::where('key', $type)->first();
            if (isset($setting)) {
                if ($request->hasFile($type)) {
                    $file = $request->file($type);
                    $ext = $file->getClientOriginalExtension();
                    \unlink(\public_path() . '/assets/app/images/' . $setting->value);
                    $name = \uniqid() . '.' . $ext;
                    $file->move(\public_path('assets/app/images'), $name);
                    $setting->value = $name;
                    $setting->is_image = 1;
                } else {
                    $setting->value = $request->$type;
                }
                if ($request->$type) {
                    $setting->save();
                }
            } else {
                $setting = new Setting();
                $setting->key = $type;
                if ($request->hasFile($type)) {
                    $file = $request->file($type);
                    $ext = $file->getClientOriginalExtension();
                    $name = \uniqid() . '.' . $ext;
                    $file->move(\public_path('assets/app/images'), $name);
                    $setting->value = $name;
                    $setting->is_image = 1;
                } else {
                    $setting->value = $request->$type;
                }
                if ($request->$type) {
                    $setting->save();
                }
            }
        }

        return \redirect()->back()->withSuccess("Settings Updated Successfully");
    }

    public function envSettingStore(Request $request)
    {
        foreach ($request->type as $type) {
            $this->overWriteEnvFile($type, $request->$type);
            $setting = Setting::where('key', $type)->first();
            if (isset($setting)) {
                $setting->value = $request->$type;
                $setting->save();
            } else {
                $setting = new Setting();
                $setting->key = $type;
                $setting->value = $request->$type;
                $setting->save();
            }
        }

        return \redirect()->back()->withSuccess("Settings Updated Successfully");
    }

    private function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }
}
