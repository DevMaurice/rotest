<?php

namespace App\Http\Controllers;

use App\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\NewLeaveCreated;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'date_from' =>'required|date',
            'date_to' =>'required|date',
            'reason' =>'required|string:max:255',

        ]);

        $date_from = Carbon::parse(request('date_from'));
        $date_to = Carbon::parse(request('date_to'));

        $days = $date_to->diffInDays($date_from);

        $attributes['status'] = 'WAITING';

        $attributes['days'] = $days;

        $laeave = auth()->user()->leaves()->create($attributes);
        

        event(new NewLeaveCreated($leave));


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
