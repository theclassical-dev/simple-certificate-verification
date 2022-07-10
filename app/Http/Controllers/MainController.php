<?php

// Name: NacosNoun Portal
// Version: 1.0
// Author: Abraham Peter
// Author URI: https://github.com/theclassical-dev
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
    } 

    public function index(Request $request){

        if(isset($_POST['login'])){
            $this->validate($request,
                [
                'email' => 'required',
                'password' =>'required'
                ]
            );
                    // dd([$request->email, $request->password]);

            $admin = Admin::where(['email' => $request->email, 
                'password' => $request->password])->first();


            if($admin){
                Auth::guard('admin')->login($admin); 

                return redirect()->route('admin.dashboard');
            }
            else{
                return back()->with("error", "wrong login");
            }
        }

    	return view('admin/adminlogin');
    }

}