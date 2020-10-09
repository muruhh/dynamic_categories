<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent', 0)->get();
        return view('app', compact('categories'));
    }


    public function show(Request $request)
    {
        $parent = $request->parent;
        $sub_category = Category::where('parent', $parent)->get();
        return $sub_category;
    }
}
