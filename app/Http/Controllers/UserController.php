<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Client;
use App\Stuff;
use App\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Stripe\Customer;

class UserController extends Controller
{
    public function view_profile()
    {
        return view('back_end.view_profile');
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
            Admin::insert([]);
        }

        elseif(Auth::user()->user_type == 'stuff'){
          Stuff::insert([

          ]);
        }

        else{
            Client::insert([]);
        }
    }

   public function all_admins()
   {
       $admins = Admin::all();
       return view('back_end.all_admin', compact('admins'));
   }
}
