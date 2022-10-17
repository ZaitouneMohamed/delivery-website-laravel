<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class adminhomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }


    public function profile(){
        $admin=User::find(Auth()->user()->id);
        return view('admin.manage_admin.profile',compact('admin'));
    }

    public function edit_pass($id){
        $admin=User::find(Auth()->user()->id);
        return view ('admin.manage_admin.change_pass',compact('admin'));
    }

    public function update_password(Request $request,$id){
        // dd($request->all());
        $admin=User::find($id);
        // $this->validate($request,[
        //     'password1','required|min:8',
        //     'password2','required|min:8'
        // ]);
        $admin->update([
            'password' => Hash::make($request->password1)
        ]);
        return redirect()->route('profile')->with([
            "message"=>"password updated succefly"
        ]);
    }

    public function readed_messages(){
        $messages=DB::table('messages')->where('statue',1)->orderBy('created_at','desc')->paginate(5);
        $count=DB::table('messages')->where('statue',1)->count();
        return view('admin.messages.readed',compact('messages','count'));
    }

    public function unreaded_messages(){
        $messages=DB::table('messages')->where('statue',0)->paginate(5);
        $count=DB::table('messages')->where('statue',0)->count();
        return view('admin.messages.unreaded',compact('messages','count'));
    }

    public function show_message($id){
        $message=message::find($id);
        $message->update([
            'statue'=>1
        ]);
        return view('admin.messages.show_msg',compact('message'));
    }

}
