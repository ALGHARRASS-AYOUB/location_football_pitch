<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pitch;
use Illuminate\Support\Facades\Auth;

class AuthenticationUserController extends Controller
{
    public function index(){
        $user=Auth::user();
        $pitches=Pitch::all();
        return view('dashboard',compact('pitches'))->with('user',$user);
    }
}
