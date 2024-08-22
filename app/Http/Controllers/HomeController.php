<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $orders = Order::orderBy('id','DESC')->get();
            return view('AdminPage',compact('orders'));
        } else {

            $cats = Category::all();
            if (!$request->category) {
                $cat1 = "الصفحة الرئيسية";
                $meals = Meal::all();
                return view('UserPage', compact('cats', 'meals', 'cat1'));

            } else {
                $cat1 = $request->category;
                $meals = Meal::where('category', $request->category)->get();
                return view('UserPage', compact('cats', 'meals', 'cat1'));

            }
        }
    }


    public function orderStore(Request $request)
    {
        Order::insert([
            'user_id'=>Auth()->user()->id,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time'=>$request->time,
            'meal_id'=>$request->meal_id,
            'quantity'=>$request->qty,
            'address'=>$request->address,
            'status'=>"تتم مراجعة الطلب"
        ]);
        return redirect()->route('home')->with('message',"تم الطلب بنجاح");

    }

    public function orderShow()
    {
        $orders = Order::where('user_id',Auth::User()->id)->get();
        return view('order.show_order',compact('orders'));
    }

    public function changeStatus(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id',$id)->update(['status'=>$request->status]);
        return back();

    }

}
