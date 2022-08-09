<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use BenSampo\Enum\Rules\EnumValue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=RoleEnum::getValues();
        // dd($roles);
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel_number'=>['required'],
            'role'=>['required', new EnumValue(RoleEnum::class)],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];

        // $request->validate($rules);
        $validator=validator($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()->toArray()]);
        }
        else{

            $user = User::create([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role' => $request->role,
                'tel_number' => $request->tel_number,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                // 'remember_token' => Str::random(10),
            ]);

            event(new Registered($user));

            $view=$this->index();

            to_route('admin.users.index')->with('success','the user has been registered successfully .');
            return response()->json(['status'=>true,'view'=>$view->render()]);
        }
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
    public function edit(User $user)
    {
        $roles=RoleEnum::getValues();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules=[
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'tel_number'=>['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];

        // $request->validate($rules);
        $validator=validator($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()->toArray()]);
        }
        else{

            $user->update([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'tel_number' => $request->tel_number,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                // 'remember_token' => Str::random(10),
            ]);

            event(new Registered($user));

            $view=$this->index();

            to_route('admin.users.index')->with('warning','the user has been updated successfully .');
            return response()->json(['status'=>true,'view'=>$view->render()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('danger','the user has been deleted successfully .');

    }
}
