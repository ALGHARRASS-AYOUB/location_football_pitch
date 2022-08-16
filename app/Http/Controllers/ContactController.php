<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendEmail(Request $request){
        $request->validate([
            'name'=>'required|max:128|string',
            'email'=>'required|email',
            'message'=>'required',
        ]);

        dd($request);
        if($this->isOnline()){

            $mail_data=[
                'to'=>'ayoub.algharrass@usmba.ac.ma',
                'from'=>$request->email,
                'name_sender'=>$request->name,
                'subject'=>'question from a visitor',
                'body'=>$request->message,
            ];
            \Illuminate\Support\Facades\Mail::send('email-template',$mail_data,function($message) use($mail_data){
                $message->to($mail_data['to'])->from($mail_data['from'],$mail_data['name_sender'])->subject($mail_data['subject']);
            });
            return redirect('/')->with('success','Email sent');

        }
        else{
            return redirect('/')->with('danger','failed to send message, your connection is down');
        }
    }


    private function isOnline($site="https://www.google.com"){
        @fopen($site,'r') ?? false;
    }
}
