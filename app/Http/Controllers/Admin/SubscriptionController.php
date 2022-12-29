<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Subscription Settings";
        $subscriptions = Subscription::get();
        return view('backend.subscriptions.index', \get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscription = new Subscription;

        $subscription->title = $request['title'];
        $subscription->slug = Str::slug($request['title']);
        $token = Str::random(6);
        $subscription->token = $token;
        $subscription->regular_price = $request['regular_price'];
        $subscription->selling_price = $request['selling_price'];
        $subscription->body = $request['body'];
        $subscription->order_number = $token;
        $subscription->status = $request['status'] == true ? '1' : '0';

        $subscription->save();

        return redirect('/subscription')->with('message', 'Plan Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Subscription::findorfail($id);
        return view('backend.subscriptions.edit', get_defined_vars());
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
        $subscription = Subscription::findorfail($id);

        $subscription->title = $request['title'];
        $subscription->slug = Str::slug($request['title']);
        $token = Str::random(6);
        $subscription->token = $token;
        $subscription->regular_price = $request['regular_price'];
        $subscription->selling_price = $request['selling_price'];
        $subscription->body = $request['body'];
        $subscription->order_number = $token;
        $subscription->status = $request['status'] == true ? '1' : '0';

        $subscription->update();

        return redirect('/subscription')->with('success', 'Plan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::findorfail($id);
        $subscription->delete();
        return redirect('/subscription')->with('message', 'Plan Deleted Successfully');
    }
}