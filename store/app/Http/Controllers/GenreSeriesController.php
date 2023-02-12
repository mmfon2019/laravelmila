<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class GenreSeriesController extends Controller
{
    public function index($genre_id)
    {
        $series = Series::get()->where('genre_id',$genre_id);
        if(is_null($series)) return response()->json('Data not found',404);
        return response()->json($series);
    }
}