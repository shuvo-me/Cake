<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Sale;
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
    public function index()
    {
        return view('back_end.master');
    }

    public function dashboard()
    {

        $categories =  Category::all();
        $total_items = Item::count();
        $pending_orders =  Sale::where('status', 0)->count();
        $complete_orders =  Sale::where('status', 1)->count();
        $decline_orders =  Sale::where('status', null)->count();
        return view('back_end.dashboard', compact('categories', 'total_items','pending_orders', 'complete_orders', 'decline_orders'))->with('status', 'You have to complete your profile !!');

    }




    public function reservation(){
        $sliders = Slider::all();
        $categories =  Category::all();
        return view('back_end.reservation', compact('categories', 'sliders'));
    }
    public function conct_msg(){
        $sliders = Slider::all();
        $categories =  Category::all();
        return view('back_end.contact', compact('categories', 'sliders'));
    }

    // public function dasboard()
    // {
    //     $total_items = Item::all();


    //     return view('back_end.dashboard', compact('total_items'));
    // }
}
