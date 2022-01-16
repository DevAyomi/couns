<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public static function checkUser(){
        $user_id = Auth::user()->id;
        $check = Category::find($user_id);

    }

    public function create(Request $request){
        $validatedData = $request->validate([
         'category' => 'required|string|max:30|unique:categories,category',
        ]);

        $user = Category::create([
            'username' => Auth::user()->name,
            'category' => $request->category,
            'user_id' => Auth::user()->id,
            'imgpath' => 'nothing'
        ]);
        return redirect()->route('redirect')->with('success', 'You have successfully created a category');

    }

   public function update(Request $request, $id){

        $validatedData = $request->validate([
         'category' => 'required|string|max:30|',
        ]);

        $category = Category::find($id);


        $category->category = $request->category;
        $category->save();

        return redirect()->route('redirect')->with('success', 'You have successfully updated your category');

   }

   public function upView(){
        $category = Category::firstWhere('user_id', Auth::user()->id);
        return view('admin.updateCat', compact('category'));
   }

   public function CreateShow(){
    return view('create');
   }



}
