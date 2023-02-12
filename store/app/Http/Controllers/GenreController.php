<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Http\Resources\GenreCollection;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return new GenreCollection($genres);
    }

    public function show(Genre $genre)
    {
      return new GenreResource($genre);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'name'=>'required|string|max:100'
             ]);

        if($validator->fails()) return response()->json($validator->errors());
        $genre = Genre::create(['slug'=>$request->slug,'name'=>$request->name]);

        return response()->json(['Genre is created', new GenreResource($genre)]);
    }

    public function update(Request $request, Genre $genre)
    {
        $validator = Validator::make($request->all(),[
            'slug'=>'required|string|max:100',
            'name'=>'required|string|max:100'
        ]);

        if($validator->fails()) return response()->json($validator->errors());
        $genre->slug=$request->slug;
        $genre->name=$request->name;

        $genre->save();

        return response()->json(['Genre is updated',new GenreResource($genre)]);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json('Genre is deleted');
    }

}