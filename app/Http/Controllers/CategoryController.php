<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = \App\Models\Category::all();
        return response()->json($categories);
    }

    public function show(\App\Models\Category $category)
    {
        return response()->json($category);
    }
}
