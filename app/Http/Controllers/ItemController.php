<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class ItemController extends Controller
{
   public function item()
   {
       $items = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.*', 'categories.name as category_name')
                ->get();
        $total_items = Item::all();
       return view('back_end.item', compact('items', 'total_items'));
   }

   public function add_item()
   {
       $categories =  Category::all();
       $total_items = Item::all();
       return view('back_end.add_item', compact('categories', 'total_items'));
   }

public function save_item(Request $request)
   {
       if($request->hasFile('image')){
           $get_img = $request->file('image');
           $img_name = time().'.'.$get_img->getClientOriginalExtension();
           Image::make($get_img)->save('item_img/'.$img_name, 100);

           Item::insert([
            'category_id' => $request->category_name,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'item_img/'.$img_name,
            'created_at' => Carbon::now()
             ]);

             Toastr::success('Item inserted', 'Success', ["positionClass" => "toast-top-right"]);

             return redirect('/item');
       }

   }

   public function edit_item($id)
   {
       $categories = Category::all();
       $item =Item::find($id);
       $total_items = Item::all();
       return view('back_end.edit_item', compact('item', 'categories', 'total_items'));
   }

    public function update_item(Request $request)
   {
         if($request->image != null){
             $item_info = Item::find($request->item_id);
             if($item_info->image != null){
                 unlink($item_info->image);
             }

             $get_img = $request->file('image');
             $img_name = time().'.'.$get_img->getClientOriginalExtension();
             Image::make($get_img)->save('item_img/'.$img_name, 100);

             Item::where('id', $request->item_id)->update([
                 'category_id' => $request->category_id,
                 'name' => $request->name,
                 'description' => $request->description,
                 'price' => $request->price,
                 'image' => 'item_img/'.$img_name,
                 'updated_at' => Carbon::now(),
             ]);

             Toastr::success('Item updated', 'Success', ["positionClass" => "toast-top-right"]);

             return redirect('/item');
         }
   }

   public function delete_item($id)
   {
        $item_info = Item::find($id);
        if($item_info->image != null){
            unlink($item_info->image);
        }

      Item::where('id', $id)->delete();

      Toastr::error('Item deleted', 'Success', ["positionClass" => "toast-top-right"]);
      return redirect('/item');
   }
}
