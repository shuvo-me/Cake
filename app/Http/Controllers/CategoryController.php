<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Slider;
use App\Category;
use Carbon\Carbon;
use App\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $sliders = Slider::all();
        $categories =  Category::all();
        $total_items = Item::all();
        return view('back_end.category', compact('categories', 'sliders', 'total_items'));
    }


    public function add_category(Request $request)
    {
        Category::create([
            "name" => $request->category_name,
            'created_at'=> Carbon::now()
        ]);
        return redirect('/category');
    }

    public function edit_category($id)
    {
        $sliders = Slider::all();
        $categories =  Category::all();
        $item = Category::where('id', $id)->first();
        $total_items = Item::all();
        return view('back_end.edit_category', compact('item', 'categories', 'sliders', 'total_items'));
    }

    public function update_category(Request $request)
    {
        Category::where('id', $request->category_id)->update([
            'name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('category updated', 'success', ["positionClass" => "toast-top-right"]);

        return redirect('/category');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::error('category delted', 'success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
