<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(isset($_POST['pay'])){
            $request->validate([
                'a'=> 'required',
                'b'=> 'required',
                'c'=> 'required',
            ]);

            $user = User::find($request->id);
            if($user){
                $user->update(['payment'=>'paid']);
                return redirect()->route('user.search');
            }
        }
        $user = auth()->user();

        return view('user/dashboard')->with('user', $user);
    }

    public function search(Request $request){

        return view('user/search');
    }
    
    public function certificates($id){

        $user = auth()->user();
        // $check = auth()->user()->certificate()->find($id);
        return view('user/certificates')->with('user', $user);
    }

    public function payment(Request $request) {

        if(isset($_POST['pay'])){
            $request->validate([
                'a'=> 'required',
                'b'=> 'required',
                'c'=> 'required',
            ]);

            $user = User::find($request->id);
            if($user){
                $user->update(['payment'=>'paid']);
                return redirect()->route('user.search');
            }
        }
        return view('user/payment');
    }
}
