<?php

namespace App\Http\Controllers;

use App\Models\CounselRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CounselRequestController extends Controller
{
    public function create()
    {
        // return Create Counsel Request View
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'counsellee_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id'
        ]);


        if (auth()->user()->usertype == 'councilee') {
           
           $counselRequest = CounselRequest::create([
                'consellee_id' => $request->counsellee_id,
                'category_id' => $request->category_id,
                'request' => $request->message,
           ]);

           return redirect()->back()->with('success', "counsel Request created successfully");
        }
    }

    public function getAllMyCounselRequests()
    {
        if (auth()->user()->usertype == 'councilee') {

            $counselRequest = CounselRequest::where('consellee_id', auth()->user()->id)->get();

            // return view
            return view('showRequest', compact('counselRequest'));
        }
    }

    public function show($id)
    {
        $counselRequest = CounselRequest::findOrFail($id);
        return view('view',compact('counselRequest'));
    }
    public function delete($id)
    {   
        $counselRequest = CounselRequest::findOrFail($id);
        $counselRequest->delete();
        return redirect()->back()->with('success', 'Counsel request have been deleted successfuly');
    }

    public function view(){
        $counselles = User::firstWhere('id', Auth::user()->id);
        $categories = Category::all();
        return view('counsel', compact('categories','counselles'));
    }


}
