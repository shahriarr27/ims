<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Mail\VerifyEmail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('role', '=', 'admin')->orWhere('role', '=', 'superadmin')->orderBy('id', 'desc')->paginate('10');
        return view('backend.administrations.index', \compact('users'));
    }


    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.administrations.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = new User;
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->name = $request['firstname'];
        $username= $request['firstname'].'_'.$request['lastname'];
        $user->email= $request['email'];
        $user->password= $request['password'];
        $user->username= Str::slug($username);
        $user->address1 = [
            'city1' => '',
            'post_code' => '',];
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $user_image = time().'_'.$filename;
            $request->file('image')->move(public_path('files/user_image/'),  $user_image);
            $user->image= $user_image;
        }
        else{
            $user->image= 'user-avatar.png';
        }
        $user->role= 'admin';
        $user->status= '1';
        $user->constituency = $request['constituency'];
        $user->save();

        return redirect()->to('admins')->withSuccess("Admin added successfully");
    }

    public function verifyMail($id){
        $verify = User::find($id);

        $verify->update(['is_verify'=>1]);

        return redirect()->route('admins.index')
            ->withSuccess(__('Your mail Verification is successfull.'));

    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.administrations.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.administrations.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());

        $user->syncRoles($request->get('role'));

        return redirect()->route('admins.index')
            ->withSuccess(__('Admin updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admins.index')->withSuccess(__('Admin deleted successfully.'));

    }



    public function reset()
    {
        $pageTitle = "E-mail Invoeren";
        return view('auth.reset', get_defined_vars());
    }

    public function resetMailSend(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return \redirect()->back()->withSuccess("E-mail is incorrect.");
        }
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        $token = DB::table('password_resets')
        ->where('email', $user->email)->first()->token;
        Mail::to($user->email)->send(new ResetPasswordMail($user->name, $token));
        return \redirect()->back()->withSuccess('Password reset email sent successfully');
    }

    public function resetPassword($token)
    {
        if (!isset($token)) {
            return \redirect()->route('login.show')->with("error", "Token doesn't exists");
        }
        $token = DB::table('password_resets')->where('token', $token)->first();
        if (isset($token) && !empty($token)) {
            return \view('auth.reset-form', \compact('token'));
        }
        return \redirect()->route('login.show');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $email = DB::table('password_resets')->where('token', $request->reset_token)->first()->email;
        User::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ]);
        DB::table('password_resets')->where('token', '=', $request->reset_token)->delete();
        return \redirect()->route('login.show')->withSuccess('Profile updated successfully');
    }
}