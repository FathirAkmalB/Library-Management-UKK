<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RatingsController extends Controller
{
  
    public function ratings()
    {
        Session::put('page', 'ratings');
        $ratings = Rating::with(['user', 'book'])->get()->toArray();
        dd($ratings);
    }

 
}
