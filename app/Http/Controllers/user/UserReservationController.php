<?php

namespace App\Http\Controllers\user;

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
use App\Http\Controllers\VerificationController;

class UserReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        // $reservations=Reservation::all();
        $reservations=Reservation::where('user_id',$user->id)->get();
        $pitches=Pitch::all();
        $periods=Period::all();
        $now=Carbon::now();
        return view('user.reservations.index',compact('user','pitches','periods','reservations','now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =Auth::user();
        $min_date=Carbon::now();
        $periods=Period::all();
        $pitches=Pitch::where('status',StatusEnum::Avaliable)->get();
        $user_id=$user->id;

        return view('user.reservations.create',compact('pitches','periods','min_date','user'));

        // return 'this is the view of create ';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
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

            Reservation::create([
                'res_date'=>$request->res_date,
            'period_id'=>$request->period_id,
            'pitch_id'=>$request->pitch_id,
            'user_id'=>$user_id,
            ]);

            to_route('user.reservations.create')->with('success',' your reservation has been created successfully.');
            $res= response()->json(['status'=>true]);
        }
    return $res;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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
        $user =Auth::user();
        $min_date=Carbon::now();
        $periods=Period::all();
        $pitches=Pitch::where('status',StatusEnum::Avaliable)->get();
        $user_id=$user->id;

        return view('user.reservations.edit',compact('pitches','periods','min_date','user','reservation'));

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
        $user_id=Auth::user()->id;
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
            'user_id'=>$user_id,
            ]);

            to_route('user.reservations.update')->with('warning',' your reservation has been updated successfully.');
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
    public function destroy($id)
    {
        //
    }
}
