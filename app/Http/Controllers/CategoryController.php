<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $cats = Category::all();
        return view('category.CategoryPage',compact('cats'));

    }

    public function store(Request $request)
    {
        $request->validate(['cat_name'=>'required|string|unique:categories|min:3|max:40',]);
        Category::insert([
            'cat_name'=>$request->cat_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('message','تم اضافة صنف جديد');
//        return redirect('category.CategoryPage');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('cat.show')->with('message','تم حذف الصنف بنجاح');
    }

    public function edit($id)
    {
        $cats = Category::findOrFail($id);
        return view('category.update',compact('cats'));

    }

    public function update(Request $request, $id)
    {
        $cats = Category::findOrFail($id);
        $cats->update([
            'cat_name'=>$request->cat_name
        ]);

        return redirect()->route('cat.show')->with('message','تم تعديل الصنف بنجاح');

    }
}
