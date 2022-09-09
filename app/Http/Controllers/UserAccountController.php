<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;


class UserAccountController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user=User::find($id);
        // dd($user==auth()->user(),auth()->user(),$user);
        if(($user==auth()->user()))
            return view('user.accounts.edit',compact('user'));
        else
            abort(403);
        // $this->authorize('account_permissions',$user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        $user=User::find($user);
      if(!(Auth::user()==$user)){
        abort(403);
      }
      else{
        // dd($user);
        $rules=[
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255',
            'tel_number'=>['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'old_password' => ['required',new PasswordRule],
        ];
        // $request->validate($rules);
        // $validator=validator($request->all(),$rules);
        $validator=$request->validate($rules);

        // dd($request);
        if(!($validator)){
            // if($validator->fails()){
            // return response()->json(['status'=>false,'error'=>$validator->errors()->toArray()]);
        }
        else{

            $user->update([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role' => $user->role,
                'tel_number' => $request->tel_number,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                // 'remember_token' => Str::random(10),
            ]);

            event(new Registered($user));

            return to_route('user.account.edit',$user->id)->with('warning','the user has been updated successfully .');
            // return response()->json(['status'=>true]);
        }
      }
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
