<?php

namespace App\Http\Controllers\user;

use App\Enums\StatusEnum;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VerificationController;
use App\Models\Period;
use App\Models\Pitch;
use App\Rules\DateRule;
use Carbon\Carbon;

class UserReservationController extends Controller
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
        $min_date=Carbon::now();
        $periods=Period::all();
        $pitches=Pitch::where('status',StatusEnum::Avaliable)->get();
        // $pitches=Pitch::all();
        return view('user.reservations.create',compact('pitches','periods','min_date'));

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
        $reservations=Reservation::where('user_id',$user->id)->get();
        return view('user.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
