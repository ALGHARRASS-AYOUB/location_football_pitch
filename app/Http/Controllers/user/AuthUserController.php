<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function index(){
        // $user=Auth::user()->first_name;
        return to_route('dashboard')->with('first_name','aaaaaaaaaaaaaa');
    }
}
