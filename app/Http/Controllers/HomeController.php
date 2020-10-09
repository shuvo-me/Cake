<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use App\Category;
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

    public function dashoard()
    {
        $categories =  Category::all();
        return view('back_end.dashboard', compact('categories'));
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
}
