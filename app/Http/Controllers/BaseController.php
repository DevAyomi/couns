<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{   


    //Redirect method defined here
    public function redirect(){
        if(Auth::user()->usertype == "councilor")
           { 
            $bookings = Booking::where('user_id', auth()->user()->id)->get();
            $category = Category::firstWhere('user_id', Auth::user()->id);
            return view('admin/dashboard', compact('category', 'bookings'));
           }
           else if(Auth::user()->usertype == "councilee")
           {
            $counsellors = Category::all();
            return view('/dashboard', compact('counsellors'));
           }

    }
}
