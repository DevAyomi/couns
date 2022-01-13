<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\CounselRequest;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    //Redirect method defined here
    public function redirect()
    {
        if (Auth::user()->usertype == "councilor") {

            $category = Category::firstWhere('user_id', Auth::user()->id);
            $counselRequests = [];

            if (!is_null($category)) {
                $counselRequests = CounselRequest::where('category_id', $category->id)->get();
            }

            return view('admin/dashboard', compact('category', 'counselRequests'));
        } else if (Auth::user()->usertype == "councilee") {
            $counsellors = Category::all(); //Name this variable accordingly
            $counselle = User::firstWhere('id', Auth::user()->id);
            $counsellorss = User::where('usertype', 'councilor')->get();
            
            return view('/dashboard', compact('counsellors', 'counselle'));
        }
    }
}
