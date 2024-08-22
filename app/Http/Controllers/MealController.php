<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Nette\Utils\Finder;


class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(3);
        return view('meal.index',compact('meals'));
    }


    public function create()
    {
        $cats = Category::latest()->get();
        return view('meal.create_meal',compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'description'=>'required|min:3|max:700',
            'price'=>'required|numeric',
            'image'=>'required|mimes:png,jpeg,jpg',
        ]);

        $image = $request->file('image'); //$image= photo.jpg
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName(); // $name_gen = 456442830.jpg
        Image::make($image)->resize(400,400)->save('upload/Meals/' . $name_gen);

        $save_url = 'upload/Meals/' . $name_gen;

        Meal::insert([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $save_url,
        ]);

        return redirect()->back()->with('message','تم اضافة وجبة جديدة');

    }

    public function edit($id)
    {
        $meal= Meal::findOrFail($id);
        $cats = Category::all();
        return view('meal.edit_meal',compact('meal','cats'));
    }

    public function update(Request $request, $id)
    {
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image'); //$image= photo.jpg
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName(); // $name_gen = 456442830.jpg
            Image::make($image)->resize(400, 400)->save('upload/Meals/' . $name_gen);

            $save_url = 'upload/Meals/' . $name_gen;


            $meal = Meal::findOrFail($id);
            $meal->update([
                'category' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $save_url,
            ]);

            return redirect()->route('meal.index')->with('message', 'تم تعديل الوجبة بنجاح');

        }else{
             Meal::findOrFail($id)->update([
                'category' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
             ]);
            return redirect()->route('meal.index')->with('message', 'تم تعديل الوجبة بنجاح');

        }


    }

    public function delete($id)
    {
        Meal::find($id)->delete();
        return redirect()->route('meal.index')->with('message', 'تم حذف الوجبة بنجاح');

    }

    public function show_details($id)
    {
        $meal = Meal::findOrFail($id);
        return view('meal.meal_details',compact('meal'));
    }



}
