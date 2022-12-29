<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
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

class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $users = User::all();
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('roles', function($user){
                foreach($user->roles as $role) {
                    $html = '<span class="badge bg-primary">';
                    $html .= $role->name;
                    $html .= '</span>';
                    return $html;
                }
            })
            ->addColumn('action', function($user) {
                $html = '<div class="btn btn-group action-btn">';
                $html .= '<a href="'. route('users.show', $user->id) .'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                $html .= '<a href="'. route('users.edit', $user->id) .'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                $html .= '<a href="#" data-user-id="'. $user->id .'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['roles','action'])
            ->make(true);
        }

        $pageTitle = "User Management";
        $BreadCrumbs = array(
            "title" => "Users",
            "links" => [
                "Home" => route("dashboard.index"),
                "Users" => route('users.index')
            ]
        );
        return view('backend.users.index' , compact('pageTitle', 'BreadCrumbs'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test'
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
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
        return view('backend.users.show', [
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
        return view('backend.users.edit', [
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

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
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

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('backend.profile.index', \compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required'
        ];
        if ($request->password) {
            $rules['password'] = 'required|confirmed';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \redirect()->back()->withError($validator->messages());
        }

        $user = auth()->user();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['username'] = $request->username;
        if ($request->password) {
            $user['password'] = $request->password;
        }
        $user->save();
        return \redirect()->back()->withSuccess("User updated successfully");
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
        return \redirect()->back()->withSuccess(' E-mail is verzonden.');
    }

    public function resetPassword($token)
    {
        if (!isset($token)) {
            return \redirect()->route('login.show')->with("error", "Het wachtwoord is eerder met deze link gewijzigd.");
        }
        $token = DB::table('password_resets')->where('token', $token)->first();
        if (isset($token) && !empty($token)) {
            return \view('auth.reset-form', \compact('token'));
        }
        return \redirect()->route('login.show')->with("error", "Het wachtwoord is eerder met deze link gewijzigd.");
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
        return \redirect()->route('login.show')->withSuccess('Wachtwoord is gewijzigd.');
    }
}