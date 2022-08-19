<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pitch;

use App\Models\Period;

use App\Rules\DateRule;
use App\Enums\StatusEnum;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservations=Reservation::orderBy('id','desc')->get();
        // $reservaion_number=;
        $periods=Period::all();
        return view('admin.reservations.index',compact('reservations','periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $min_date=Carbon::now();
        $pitches=Pitch::where('status',StatusEnum::Avaliable)->get();
        $periods=Period::all();
        $user=$reservation->user;
        return view('admin.reservations.edit',compact('reservation','pitches','periods','user','min_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {

        $res='';
        $rules=[
            'res_date'=>['required',new DateRule],
            'period_id'=>'required',
            'pitch_id'=>'required',
        ];

        $validator=validator($request->all(),$rules);
        if($validator->fails()){
            $res= response()->json(['status'=>false,'errors'=>$validator->errors()->toArray()]);
        }else{
           $reservation->update([
                'res_date'=>$request->res_date,
            'period_id'=>$request->period_id,
            'pitch_id'=>$request->pitch_id,

            ]);

             to_route('admin.reservations.edit',compact('reservation'))->with('warning',' your reservation has been updated successfully.');
            $res= response()->json(['status'=>true]);
        }
    return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        to_route('admin.reservations.index')->with('danger',' the reservation has been deleted successfully.');

    }
}
