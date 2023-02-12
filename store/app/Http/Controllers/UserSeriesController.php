<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class UserSeriesController extends Controller
{
    public function index($user_id)
    {
        $series = Series::get()->where('user_id',$user_id);
        if(is_null($series)) return response()->json('Data not found',404);
        return response()->json($series);
    }
}