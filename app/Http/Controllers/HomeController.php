<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Cert;

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
        if(isset($_POST['sub'])){

           $data = $request->validate([
                'name' => 'required',
            ]);

            if($data){
                return redirect('/user/certificates/'.$request->name);
            }

            return back()->with('error', 'error..');
        }
        $n = $request->get('name');
        return view('user/search', compact('n'));
    }
    
    public function certificates($name){

        $user = Cert::where('name', $name)->first();
        // $user = User::all()->first();
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
