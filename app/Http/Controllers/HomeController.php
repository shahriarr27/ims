<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\JsonDecoder;

class HomeController extends Controller
{
    public function index()
    {
        return \redirect()->route('dashboard.index');
    }


}