<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function book(Request $request){

        $books = Booking::create([
            'username' => Auth::user()->name,
            'usertype' => Auth::user()->usertype,
            'user_id' => $request->user_id, 
        ]);

        return redirect()->back()->with('status', 'Booked Successfully');
    }
}
