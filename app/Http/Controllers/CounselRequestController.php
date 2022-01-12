<?php

namespace App\Http\Controllers;

use App\Models\CounselRequest;
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
            $counselRequest = new CounselRequest;
            $counselRequest->request = $request->message;
            $counselRequest->counsellee_id = $request->counsellee_id;
            $counselRequest->category_id = $request->category_id;

            $counselRequest->save();
        }
    }

    public function getAllMyCounselRequests()
    {
        if (auth()->user()->usertype == 'councilee') {
            $counselRequests = CounselRequest::where('counsellee_id', auth()->user()->id)->get();

            // return view
        }
    }

    public function show($id)
    {
        $counselRequest = CounselRequest::findOrFail($id);
        // return view;
    }
    public function delete($id)
    {
        $counselRequest = CounselRequest::findOrFail($id);
        $counselRequest->delete();
    }
}
