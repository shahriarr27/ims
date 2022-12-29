<?php

namespace App\Http\Controllers\Backend;

use App\Models\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pageTitle = "Dashboard";
        if(Auth::user()->role == 'user'){
            return view('frontend.dashboard.index', get_defined_vars());
        }
        else{
            return view('backend.home.index', get_defined_vars());
        }
    }
}