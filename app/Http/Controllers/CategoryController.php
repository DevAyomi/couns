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
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $user = Category::create([
            'username' => Auth::user()->name,
            'category' => $request->category,
            'user_id' => Auth::user()->id,
            'imgpath' => $imageName,
        ]);
        return redirect()->back()->with('success', 'You have successfully selected a category');

    }

   public function update(Request $request, $id){

        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $category = Category::find($id);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $category->category = $request->category;
        $category->imgpath = $imageName;
        $category->save();

        return redirect('/redirect')->with('success', 'You have successfully updated your category');

   }

   public function upView(){
        $category = Category::firstWhere('user_id', Auth::user()->id);
        return view('admin.updateCat', compact('category'));
   }

   public function CreateShow(){
    return view('/create');
   }



}
