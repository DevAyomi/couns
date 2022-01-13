<?php

namespace App\Http\Controllers;

use App\Models\CounsellorInfo;
use Illuminate\Http\Request;

class CounsellorInfoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        if (auth()->user()->usertype == 'councilor') {
            CounsellorInfo::create([
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'counsellor_id' => auth()->user()->id,
            ]);
        }
    }
}
