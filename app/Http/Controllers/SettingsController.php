<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function company()
    {
        $pageTitle = "Company Settings";
        $BreadCrumbs = array(
            "title" => "Settings",
            "links" => [
                "Home" => route("dashboard.index"),
                "Company" => route('changeCompanyName')
            ]
        );
        return view('backend.pages.company_name', \get_defined_vars());
    }
}