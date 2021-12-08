<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Client;
use App\Customer;
use App\Stuff;
use App\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function view_profile()
    {
        $user = Auth::user();
        return view('back_end.view_profile',compact('user'));
    }

    public function update_profile(Request $request)
    {
        if(Auth::user()->user_type == 'admin'){
            if($request->hasFile('image')){
                $get_img = $request->file('image');
                $img_name = time().'.'.$get_img->getClientOriginalExtension();
                Image::make($get_img)->save('admin_img/'.$img_name, 100);

                Admin::insert([
                   'name' => $request->name,
                   'user_id'=>Auth::user()->id,
                   'contact' => $request->contact,
                   'nid' => $request->nid,
                   'image' => 'admin_img/'.$img_name,
                   'created_at' => Carbon::now()
                ]);

                User::where('id', Auth::user()->id)->update([
                    'status' => 1,
                ]);

                return redirect('/home');
            }
            // Admin::insert([]);
        }

        elseif(Auth::user()->user_type == 'stuff'){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $img_name = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('stuff_images'),$img_name);

                Stuff::create([
                   "user_id"=>Auth::user()->id,
                   "image"=>"stuff_images/".$img_name,
                   'contact' => $request->contact,
                   'nid' => $request->nid,
                   'created_at'=>Carbon::now()
                ]);

                User::where('id', Auth::user()->id)->update([
                    'status' => 1,
                ]);
                return redirect('/home');
            }
        }

        else{

            if($request->hasFile('image')){
                $image = $request->file('image');
                $img_name = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('customer_images'),$img_name);

                Customer::create([
                   "user_id"=>Auth::user()->id,
                   "image"=>"customer_images/".$img_name,
                   'contact' => $request->contact,
                   'nid' => $request->nid,
                   'created_at'=>Carbon::now()
                ]);

                User::where('id', Auth::user()->id)->update([
                    'status' => 1,
                ]);

                return redirect('/home');
            }
        }
    }

   public function all_admins()
   {
       $admins = Admin::all();
       return view('back_end.all_admin', compact('admins'));
   }
}
