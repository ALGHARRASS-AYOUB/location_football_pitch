<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods=Period::all();
        return view('admin.periods.index',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'period_time'=>['required','string', 'max:255'],
        ]);
        if($validated){
            Period::create([
                'period_time'=>$request->period_time,
            ]);
        }
        return to_route('admin.periods.index')->with('success','the period time has been set successfully');
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
    public function edit(Period $period)
    {
        return view('admin.periods.edit',compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Period $period)
    {
        $validated=$request->validate([
            'period_time'=>['required','string', 'max:255'],
        ]);
        if($validated){
            $period->update([
                'period_time'=>$request->period_time,
            ]);
        }
        return to_route('admin.periods.index')->with('warning','the period time has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return to_route('admin.periods.index')->with('danger','the period time has been removed successfully');

    }
}
