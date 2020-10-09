<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
class CartController extends Controller
{
    public function cart()
    {
        $items = DB::table('carts')
                ->join('items', 'carts.item_id', '=', 'items.id')
                ->select('carts.*', 'items.image as item_image', 'items.name as item_name')
                ->get();
        return view('front_end.cart', compact('items'));
    }


    public function add_to_cart(Request $request)
    {
        $data = Item::find($request->item_id);

        //if session has random number then no need to create random number
        if(Session::has('random_number')){

              //if item is same then increment the quantity
              if(Cart::where('random_number',session('random_number'))->where('item_id', $request->item_id)->exists())

              {

                  Cart::where('random_number',session('random_number'))->where('item_id', $request->item_id)->increment('quantity',$request->quantity);
                  Toastr::success('Item added to cart', 'success', ["positionClass" => "toast-top-right"]);
                  return back();
              }

             else{
               Cart::insert([
                'random_number'=>session('random_number'),
                'item_id' => $request->item_id,
                'quantity' => $request->quantity,
                'price' => $data->price,
                'created_at' =>Carbon::now(),
               ]);
             }


            Toastr::success('Item added to cart', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }



        $random_number = Str::random(10);
        session(['random_number' => $random_number]);

        Cart::insert([
           'random_number' => session('random_number'),
           'item_id' => $request->item_id,
           'quantity' => $request->quantity,
           'price' => $data->price,
           'created_at' =>Carbon::now(),
        ]);

        Toastr::success('Item added to cart', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
