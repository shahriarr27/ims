<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    // all active clients list
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::where('active', 1)->get();
            return DataTables::of($clients)
                ->addColumn('name', function ($client) {
                    return $client->initials . " " . $client->last_name;
                })
                ->addColumn('action', function ($client) {
                    $html = '<div class="btn btn-group action-btn">';
                    $html .= '<a href="#" client="' . $client->initials . " " . $client->last_name . '" client-id="' . $client->id . '" class="btn btn-info btn-sm inactive_btn" data-toggle="modal" data-target="#inactiveModal" data-whatever="@getbootstrap" data-backdrop="static"><i class="fa fa-sign-out-alt"></i></a>';
                    $html .= '<a href="#" client-id="' . $client->id . '" class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
        $pageTitle = "Manage Clients";
        $BreadCrumbs = array(
            "title" => "Clients",
            "links" => [
                "Home" => route("dashboard.index"),
                "Company" => route('clients.index')
            ]
        );
        return view('backend.clients.index', \get_defined_vars());
    }

    // all inactive client list
    public function allinactive(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::where('active', '!=', 1)->get();
            return DataTables::of($clients)
                ->addColumn('name', function ($client) {
                    return $client->initials . " " . $client->last_name;
                })
                ->addColumn('action', function ($client) {
                    $html = '<div class="btn btn-group action-btn">';
                    $html .= '<a href="#" client-id="' . $client->id . '" class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></a>';
                    $html .= '<a href="#" client="' . $client->initials . " " . $client->last_name . '" client-id="' . $client->id . '" class="btn btn-info btn-sm activate_client" data-toggle="modal" data-target="#inactiveModal" data-whatever="@getbootstrap" data-backdrop="static"><i class="fa fa-sign-in-alt"></i></a>';
                    $html .= '<a href="#" client="' . $client->initials . " " . $client->last_name . '" client="' . $client->initials . " " . $client->last_name . '" client-id="' . $client->id . '" class="btn btn-danger btn-sm delete_btn" data-toggle="modal" data-target="#deleteModal" data-whatever="@getbootstrap" data-backdrop="static"><i class="fa fa-trash"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate([
            'last_name'   => 'required'
        ]);

        $client = Client::create([
            'clientnumber' => $request->clientnumber,
            'package' => $request->package,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'initials' => $request->initials,
            'prefix' => $request->prefix,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'place_of_birth' => $request->place_of_birth,
            'ssn' => $request->ssn,
            'gender' => $request->gender,
            'street' => $request->street,
            'house' => $request->house,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'marital_status' => $request->marital_status,
            'livingsituation' => $request->livingsituation,
            'driving_license' => $request->driving_license ? $request->driving_license : 'No',
            'phone' => $request->phone,
            'email' => $request->email,
            'private_account' => $request->private_account,
            'control_private_account' => $request->control_private_account,
            'control_business_bank_account' => $request->control_business_bank_account,
        ]);

        return \response()->json([
            'status' => 200,
            'message' => "Klantgegevens zijn opgeslagen."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('backend.clients.edit', \compact('client'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'last_name'   => 'required'
        ]);

        $client = Client::find($request->client_id);

        $client->update([
            'clientnumber' => $request->clientnumber,
            'package' => $request->package,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'initials' => $request->initials,
            'prefix' => $request->prefix,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'place_of_birth' => $request->place_of_birth,
            'ssn' => $request->ssn,
            'gender' => $request->gender,
            'street' => $request->street,
            'house' => $request->house,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'marital_status' => $request->marital_status,
            'livingsituation' => $request->livingsituation,
            'driving_license' => $request->driving_license,
            'phone' => $request->phone,
            'email' => $request->email,
            'private_account' => $request->private_account,
            'control_private_account' => $request->control_private_account,
            'control_business_bank_account' => $request->control_business_bank_account,
        ]);

        return \response()->json([
            'status'    => 200,
            'message'   => "Klantgegevens zijn gewijzigd."
        ]);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return \response()->json([
            'status'    => 200,
            'message'   => "Klantgegevens zijn verwijderd."
        ]);
    }

    public function changeStatus($id)
    {
        $client = Client::find($id);
        if ($client->active == 1) {
            $client->active = 0;
            $message = "Klantgegevens zijn inactief gesteld.";
        } else {
            $client->active = 1;
            $message = "Klantgegevens zijn actief gesteld.";
        }
        $client->save();
        return \response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}
