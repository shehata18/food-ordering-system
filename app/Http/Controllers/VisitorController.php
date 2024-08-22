<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $cats = Category::all();
        if (!$request->category) {
            $cat1 = "الصفحة الرئيسية";
            $meals = Meal::all();
            return view('visitorPage', compact('cats', 'meals', 'cat1'));

        } else {
            $cat1 = $request->category;
            $meals = Meal::where('category', $request->category)->get();
            return view('visitorPage', compact('cats', 'meals', 'cat1'));

        }
    }
}
