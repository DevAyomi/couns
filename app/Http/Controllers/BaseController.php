<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\CounselRequest;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{   


    public function redirect(){
        if(Auth::user()->usertype == "councilor")
           { 
            $category = Category::firstWhere('user_id', Auth::user()->id);
            
                $counsellor = User::firstWhere('id', Auth::user()->id);
                 return view('admin/dashboard', compact('counsellor'));

        } else if (Auth::user()->usertype == "councilee") {
            $counsellors = Category::all(); //Name this variable accordingly
            $counselle = User::firstWhere('id', Auth::user()->id);
            $counsellorss = User::where('usertype', 'councilor')->get();

            $category = Category::firstWhere('user_id', Auth::user()->id);
            return view('/dashboard', compact('category', 'counselle'));
           }
           else if(Auth::user()->usertype == "councilee")
           {
            $counsellors = Category::all();
            $counselle = User::firstWhere('id', Auth::user()->id );
            return view('/dashboard', compact('counsellors', 'counselle'));
           }

        }
}
