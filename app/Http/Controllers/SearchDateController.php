<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Period;
use App\Models\Reservation;
use Illuminate\Http\Request;

class SearchDateController extends Controller
{
    public function searchDate(Request $request){
        $date=$request->date;
        $reservations=Reservation::where('res_date',$date)->get();
        $date=Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $periods=Period::all();
        $reservaion_number=count($reservations);
        return view('admin.reservations.index',compact('reservations','reservaion_number','periods','date'));
    }
}
