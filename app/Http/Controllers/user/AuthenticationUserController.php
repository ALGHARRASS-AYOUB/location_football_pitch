<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationUserController extends Controller
{
    public function index(){
        $user=Auth::user();
        return view('dashboard')->with('user',$user);
    }
}
