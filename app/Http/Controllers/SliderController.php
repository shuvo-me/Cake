<?php

namespace App\Http\Controllers;

use App\Slider;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Item;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function slider()
    {
        // $categories =  Category::all();
        $sliders = Slider::all();
        $total_items= Item::all();
        return view('back_end.slider', compact('sliders', 'total_items'));

    }
    public function save_slider(Request $request)
    {
        If($request->hasFile('image')){
            $get_img = $request->file('image');
            $img_name = time().'.'.$get_img->getClientOriginalExtension();
            Image::make($get_img)->save('slider_img/'.$img_name,100);

            Slider::insert([
              'title' => $request->title,
              'sub_title' => $request->sub_title,
              'image' => 'slider_img/'.$img_name,
              'created_at' => Carbon::now()
            ]);

            Toastr::success('Slider inserted', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }
        $categories =  Category::all();

    }

    public function edit_slider($id)
    {
          $item = Slider::find($id);
          $total_items= Item::all();
          return view('back_end.edit_slider', compact('item', 'total_items'));
    }

    public function update_slider(Request $request)
    {
        if($request->image!=null){
            $slider_info = Slider::find($request->slider_id);
            if($slider_info->image!=null){
                unlink($slider_info->image);
            }

            $get_img = $request->file('image');
            $img_name = time().'.'.$get_img->getClientOriginalExtension();
            Image::make($get_img)->save('slider_img/'.$img_name,100);

            Slider::where('id', $request->slider_id)->update([
               'title' => $request->title,
               'sub_title' => $request->sub_title,
               'image' => 'slider_img/'.$img_name,
               'updated_at' => Carbon::now(),
            ]);

            Toastr::success('Slider updated', 'success', ["positionClass" => "toast-top-right"]);
            return redirect('/slider');
        }

        else{
            Slider::where('id', $request->slider_id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'updated_at' => Carbon::now(),
             ]);

             Toastr::success('product updated', 'success', ["positionClass" => "toast-top-right"]);
             return redirect('/slider');
        }
    }

    public function delete_slider($id)
    {
        $slider_info = Slider::find($id);
        if($slider_info->image != null){
            unlink($slider_info->image);
        }

        Slider::where('id', $id)->delete();
        Toastr::error('Slider deleted', 'success', ["positionClass" => "toast-top-right"]);
         return back();
    }
}
