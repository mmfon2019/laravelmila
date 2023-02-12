<?php

namespace App\Http\Controllers;

use App\Http\Resources\StarringResource;
use App\Http\Resources\StarringCollection;
use App\Models\Starring;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StarringController extends Controller
{
    public function index()
    {
        $starrings = Starring::all();
        return new StarringCollection($starrings);
    }

    public function show(Starring $starring)
    {
      return new StarringResource($starring);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'details'=>'required|string|max:255'
             ]);

        if($validator->fails()) return response()->json($validator->errors());
        $starring = Starring::create(['slug'=>$request->slug,'name'=>$request->name,'details'=>$request->details]);

        return response()->json(['Starring is created', new StarringResource($starring)]);
    }

    public function update(Request $request, Starring $starring)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'details'=>'required|string|max:255'
        ]);

        if($validator->fails()) return response()->json($validator->errors());
        $starring->slug=$request->slug;
        $starring->name=$request->name;
        $starring->details=$request->details;
        $starring->save();

        return response()->json(['Starring is updated',new StarringResource($starring)]);
    }

    public function destroy(Starring $starring)
    {
        $starring->delete();
        return response()->json('Starring is deleted');
    }



}