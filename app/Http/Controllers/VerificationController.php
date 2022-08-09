<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Pitch;
use App\Rules\DateRule;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyDate(Request $request){

        $res_date=$request->res_date;
        $rule=[
            'res_date'=>[new DateRule],
        ];

            $date_validator=validator($request->all(),$rule);
            if($date_validator->fails()){
                return response()->json(['status'=>false,'errors'=>$date_validator->errors()]);
            } else{
                    $res= response()->json(array("status" => true));
                }
            return $res;


    }

    public function verifyPlace(Request $request){
        $res_date=$request->res_date;
        $period_id=$request->period_id;
        $pitch_id=$request->pitch_id;

        $places=Pitch::find($pitch_id)->places;

        $rule=[
            'res_date'=>[new DateRule],
        ];

        $reserved=Reservation::where('res_date',$res_date)->where('period_id',$period_id)->get();
        $places_reserved=count($reserved);
            $is_avaliable= $places > $places_reserved ?? false;
            if(!$is_avaliable){
                return response()->json(['status'=>false,'msg_error'=>'there is no place avaliable for these schedule, please try an other time','places_av'=>($places-$places_reserved)]);
            }
        else{
                $res= response()->json(array("status" => true,'msg_done'=>'good','places_av'=>$places,'places_rs'=>$places_reserved,'  reserved'=>  $reserved));
            }
        return $res;
    }
}
