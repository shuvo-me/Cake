<?php

namespace App\Http\Controllers;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use phpDocumentor\Reflection\Types\Null_;
use PDF;
class OrderController extends Controller
{
    public function index()
    {
         $orders = DB::table('sales')
                   ->join('shippings', 'sales.shipping_id', '=', 'shippings.id')
                   ->select('sales.amount', 'sales.id', 'sales.discount', 'sales.payment_type', 'shippings.created_at as order_placed')
                   ->where('status', 0)
                   ->get();
          return view('back_end.pending_order', compact('orders'));
    }

    public function confirm_order($id)
    {
        Sale::where('id', $id)->update([
           'status' => 1,
        ]);

        Toastr::success('Order placed successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function decline_order($id)
    {
        Sale::find($id)->update([
            'status' => Null,
        ]);

        Toastr::error('Order Declined', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function complete_orders()
    {
        $orders = DB::table('sales')
                   ->join('shippings', 'sales.shipping_id', '=', 'shippings.id')
                   ->select('sales.amount', 'sales.id', 'sales.discount', 'sales.payment_type', 'shippings.created_at as order_placed')
                   ->where('status', 1)
                   ->get();
        return view('back_end.complete_order', compact('orders'));
    }

    public function decline_orders()
    {
        $orders = DB::table('sales')
                   ->join('shippings', 'sales.shipping_id', '=', 'shippings.id')
                   ->select('sales.amount', 'sales.id', 'sales.discount', 'sales.payment_type', 'shippings.created_at as order_placed')
                   ->where('status', 1)
                   ->get();

        return view('back_end.decline_order', compact('orders'));
    }

    public function view_order_details()
    {
        $items = DB::table('billings')
                    ->join('items', 'billings.item_id', '=', 'items.id')
                    ->select('billings.*', 'items.image', 'items.name')
                    ->get();

        $shipping_info = DB::table('sales')
                      ->join('shippings', 'sales.shipping_id', '=', 'shippings.id')
                      ->select('sales.*', 'shippings.*')
                      ->get();

        return view('back_end.view_order_details', compact('items', 'shipping_info'));
    }

    public function print_order()
    {
        $items = DB::table('billings')
                    ->join('items', 'billings.item_id', '=', 'items.id')
                    ->select('billings.*', 'items.image', 'items.name')
                    ->get();

        $shipping_info = DB::table('sales')
                      ->join('shippings', 'sales.shipping_id', '=', 'shippings.id')
                      ->select('sales.*', 'shippings.*')
                      ->get();

        $pdf = PDF::loadView('back_end.print_order_pdf', compact('items', 'shipping_info'));
        return $pdf->stream('invoice.pdf');
    }
}
