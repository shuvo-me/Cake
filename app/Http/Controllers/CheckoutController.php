<?php

namespace App\Http\Controllers;

use App\Shipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Sale;
use App\Cart;
use App\Billing;
use App\Mail\OrderMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = DB::table('carts')
        ->join('items', 'carts.item_id', '=', 'items.id')
        ->select('carts.*', 'items.image as item_image', 'items.name as item_name')
        ->get();
       return view('front_end.checkout', compact('items'));
    }

    public function place_the_order(Request $request)
    {
        if($request->check_method == "Cash On Delivery")
        {
            $shipping_id = Shipping::insertGetId([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'country' =>$request->country,
                'city' =>$request->city,
                'post_code' =>$request->post_code,
                'shipping_date' =>$request->shipping_date,
                'payment_method' =>$request->check_method,
                'order_note' =>$request->order_note,
                'created_at' => Carbon::now(),
            ]);

            $sale_id=Sale::insertGetId([
                'shipping_id'=>$shipping_id,
                'shipping_cost'=>60,
                'discount'=>0,
                'transaction_id'=>null,
                'currency'=>"BDT",
                'payment_type'=>$request->check_method,
                'status'=>0,
                'created_at'=>Carbon::now(),
            ]);

            $amount=0;
            $carts = Cart::where('random_number',session('random_number'))->get();
            foreach($carts as $item){
                $amount=$amount+($item->price*$item->quantity);
                Billing::insert([
                    'random_number'=>session('random_number'),
                     'sale_id'=>$sale_id,
                     'item_id'=>$item->item_id,
                     'price'=> $item->price,
                     'quantity'=>$item->quantity,
               ]);

            }



            Sale::where('id', $sale_id)->update([
                'amount' => $amount+60,
                'sub_total' => $amount,
            ]);

            Cart::where('random_number', session('random_number'))->delete();
            $data = DB::table('billings')
                        ->join('items', 'billings.item_id', '=', 'items.id')
                        ->select('billings.*', 'items.name as item_name')
                        ->where('sale_id', $sale_id)
                        ->get();

            // $email = 'shuvonaim123@gmail.com';
            // Mail::to($email)->send(new OrderMail($data));

            Toastr::success('Order placed successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect('/');
        }

        else{
            $shipping_id = Shipping::insertGetId([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'country' =>$request->country,
                'city' =>$request->city,
                'post_code' =>$request->post_code,
                'shipping_date' =>$request->shipping_date,
                'payment_method' =>$request->check_method,
                'order_note' =>$request->order_note,
                'created_at' => Carbon::now(),
            ]);

            $sale_id=Sale::insertGetId([
                'shipping_id'=>$shipping_id,
                'shipping_cost'=>60,
                'discount'=>0,
                'transaction_id'=>null,
                'currency'=>"BDT",
                'payment_type'=>$request->check_method,
                'status'=>0,
                'created_at'=>Carbon::now(),
            ]);

            $amount=0;
            $carts=Cart::where('random_number',session('random_number'))->get();
            foreach($carts as $item){
                $amount=$amount+($item->price*$item->quantity);
                Billing::insert([
                        'random_number'=>session('random_number'),
                         'sale_id'=>$sale_id,
                         'item_id'=>$item->item_id,
                         'price'=>$item->price,
                         'quantity'=>$item->quantity,
                ]);
            }

            Sale::where('id', $sale_id)->update([
                'amount' => $amount+60,
                'sub_total' => $amount,
            ]);

            Cart::where('random_number', session('random_number'))->delete();
             session(['sale_id' => $sale_id]);
             session(['amount' => $amount+60]);

            Toastr::success('Order placed successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect('/stripe');
        }
    }
}
