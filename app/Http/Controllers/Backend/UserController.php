<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        return view('backend.profile.profile', \compact('users'));
    }

    public function users(Request $request)
    {
        // $users = User::where('role','=','user')->orderBy('id', 'desc')->paginate('10');
        
        if ($request->ajax()) {
            $users = User::where('role','=','user')->orderBy('id', 'desc')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $html = '<div class="btn btn-group action-btn">';
                    $html .= '<a href="' . route('users.show', $user->id) . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                    $html .= '<a role="button" data-bs-toggle="modal" data-bs-target="#deleteModal'.$user->id.'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    $html .= '</div>';

                    $html .= '<div class="modal fade" id="deleteModal'.$user->id.'" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <p>Are you sure to delete this User?</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm text-white" data-bs-dismiss="modal">Close</button>
                        <form method="post" action="'.route('users.destroy',$user->id).'">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm text-white" data-bs-dismiss="modal">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>';
                    return $html;
                })
                ->addColumn('image', function($user){
                    $html2 = '<img src="' . url('/files/user_image/'.$user->image) . '"  class="img-fluid rounded-circle"
                    style="width: 40px" alt="Avatar">';
                    return $html2;
                })
                ->addColumn('constituency', function($user){
                    $html = $user->constituency == null? 'NULL' : $user->constituency;
                    return $html;
                })
                ->addColumn('status', function($user){
                    $html = $user->status == 1? '<span class="badge badge-pill badge-success">Approved</span>' : '<span class="badge badge-pill badge-warning">Pending</span>';
                    return $html;
                })
                ->rawColumns(['action','image','constituency', 'status'])
                ->make(true);
            }
            return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $user->image= $user_image;
        }
        else{
            $user->image= 'user-avatar.png';
        }
        if($request->hasFile('cv')){
            $filename = $request->file('cv')->getClientOriginalName();
            $cv = time().'_'.$filename;
            $request->file('cv')->move(public_path('files/cv/'),  $cv);
        }
        $user->cv= $cv;
        $user->constituency = $request['constituency'];
        $user->status= $request['status'];
        $user->save();

        return redirect()->to('users')->withSuccess("User added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('frontend.dashboard.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        if(isset($request->status)){
            $user->status = $request->status;
            $user->update();
            return redirect()->to('users')->withSuccess('User data updated');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findorfail($id);
        if($user->image != 'user-avatar.png'){
            $path = 'files/user_image/'.$user->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $user->delete();
        return redirect()->to('users')->withSuccess('User Deleted Successfully');
    }

    
    public function profile()
    {
        $user = Auth::user();
        return view('backend.profile.profile', get_defined_vars());
    }

    public function profileUpdate(Request $request, $id)
    {
        $user= User::findorfail($id);
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->phone= $request['phone'];
        $user->address1= [
            'city1' => $request['city1'],
            'post_code' => $request['post_code'],
        ];
        $user->gender= $request['gender'];
        $user->chapter= $request['chapter'];
        if($request->hasFile('image')){
            $path = 'files/user_image/'.$user->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $filename = $request->file('image')->getClientOriginalName();
            $user_image = time().'_'.$filename;
            $request->file('image')->move(public_path('files/user_image/'),  $user_image);
            $user->image= $user_image;
        }
        $user->constituency = $request['constituency'];
        $user->profession = $request['profession'];
        $user->update();

        return redirect()->route('user.dashboard.index')->with('message', "Profile updated successfully");
    }
}