<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    // CHIAMATA AXIOS PER CATEGORIES
    public function index(){
        $categories = Category::all();
        dd($categories);
        $response_array = [
            'success' => true,
            'results' => $categories
            ];

        response()->json($response_array);

        // dd($response_array);
    }
}
