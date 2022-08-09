<?php

namespace App\Http\Controllers\admin;


use App\Models\Pitch;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use BenSampo\Enum\Rules\EnumValue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pitches=Pitch::all();
        return view('admin.pitches.index',compact('pitches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses=StatusEnum::getValues();
        return view('admin.pitches.create',compact('statuses'));
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
            'name'=>['required', 'string', 'max:255'],
            'location'=>['required', 'string', 'max:255'],
            'status'=>['required', new EnumValue(StatusEnum::class)],
            'places'=>['required', 'integer'],
            'price'=>['required', 'integer'],
        ];
        $validator=validator($request->all(),$rules);

        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()->toArray()]);
        }
        else{

            Pitch::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'status'=>$request->status,
                'places'=>$request->places,
                'price'=>$request->price,
            ]);

            $view=$this->index();

            to_route('admin.pitches.create')->with('warning','  the pitch has been registred successfully .');
            return response()->json(['status'=>true]);
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
    public function edit(Pitch $pitch)
    {
        $statuses=StatusEnum::getValues();
        return view('admin.pitches.edit',compact('pitch','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pitch $pitch)
    {
        $rules=[
            'name'=>['required', 'string', 'max:255'],
            'location'=>['required', 'string', 'max:255'],
            'status'=>['required', new EnumValue(StatusEnum::class)],
            'places'=>['required', 'integer'],
            'price'=>['required', 'integer'],
        ];
        $validator=validator($request->all(),$rules);

        if($validator->fails()){
            return response()->json(['status'=>false,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $pitch->update([
                'name'=>$request->name,
                'location'=>$request->location,
                'status'=>$request->status,
                'places'=>$request->places,
                'price'=>$request->price,
            ]);

            to_route('admin.pitches.edit',$pitch->id)->with('warning','  the pitch has been updated successfully .');
            return response()->json(['status'=>true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pitch $pitch)
    {
        $pitch->delete();
        return to_route('admin.pitches.index')->with('danger',' the pitch has been deleted successfully .');
    }
}
