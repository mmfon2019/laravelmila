<?php

namespace App\Http\Controllers;


use App\Http\Resources\SeriesResource;
use App\Http\Resources\SeriesCollection;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return new SeriesCollection($series);
    }

    public function show(Series $series)
    {
        return new SeriesResource($series);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'description'=>'required',
            'genre_id'=>'required',
            'starring_id'=>'required']);

        if($validator->fails()) return response()->json($validator->errors());
        $series = Series::create(['slug'=>$request->slug,'title'=>$request->title, 'description'=>$request->description,
        'genre_id'=>$request->genre_id,'starring_id'=>$request->starring_id,'user_id'=>Auth::user()->id]);

        return response()->json(['Series is created',new SeriesResource($series)]);
    }

    public function update(Request $request, Series $series)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'description'=>'required',
            'genre_id'=>'required',
            'starring_id'=>'required']);

        if($validator->fails()) return response()->json($validator->errors());
        $series->slug=$request->slug;
        $series->title=$request->title;
        $series->description=$request->description;
        $series->genre_id=$request->genre_id;
        $series->starring_id=$request->starring_id;

        $series->save();

        return response()->json(['Series is updated',new SeriesResource($series)]);
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return response()->json('Series is deleted');
    }
}