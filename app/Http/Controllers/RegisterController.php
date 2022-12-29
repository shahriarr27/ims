<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\UploadedFile;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = new User;
        $name = $request['firstname'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->name= $name;
        $user->email= $request['email'];
        $user->password= $request['password'];
        $user->username= Str::slug($name);
        $user->phone= $request['phone'];
        $user->address1= [
            'city1' => $request['city1'],
            'post_code' => $request['post_code'],
        ];
        $user->gender= $request['gender'];
        $user->chapter= $request['chapter'];
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $user_image = time().'_'.$filename;
            $request->file('image')->move(public_path('files/user_image/'),  $user_image);
        }
        if($request->hasFile('cv')){
            $filename = $request->file('cv')->getClientOriginalName();
            $cv = time().'_'.$filename;
            $request->file('cv')->move(public_path('files/cv/'),  $cv);
        }
        $user->image= $user_image;
        $user->cv= $cv;
        $user->constituency = $request['constituency'];
        $user->save();

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}