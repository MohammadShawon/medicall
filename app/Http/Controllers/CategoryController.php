<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //

    public function storeCategory(Request $request) {
        $category = new Category();
        $category->category_name = $request->category;
        $category->slug = str_slug($request->category, '-');
        $category->save();
        return response()->json(['message'=>'New Division Saved']);
    }

    public function category() {
        $user = auth()->user();
        $categories = Category::all();
        return view('admin.category', compact('categories'), compact('user'));
    }


    public function delete($id) {

        $item = Category::find($id);
        if($item != null ){
            if($item) $item->delete();
            return redirect()->back();
        }
        return redirect()->back()->with("message", "Not Found");
    }

    public function categories() {
        return response()->json(Category::all(), 200);
    }

}
