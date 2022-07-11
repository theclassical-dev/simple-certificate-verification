<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
Use App\Models\Certificate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CertificateImport;
Use App\Models\Admin;
Use App\Models\User;
Use App\Models\Cert;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        return view('admin/dashboard');
    }

    public function verification(Request $request){

        if(isset($_POST['create'])){
            $request->validate([
                'cert_id' => 'required',
                'name' => 'required',
                'organization' => 'required',
            ]);
            
            // $app = date('d-m-Y H:i:s');
            

            $d = Cert::create([
                'cert_id' => $request->input('cert_id'),
                'name' => $request->input('name'),
                'department' => $request->input('organization'),
                // 'status' => $request->input('status'),
            ]);

            if($d){
                return back()->with("success", "Certificate Successfully Added");
            }else{

                return back()->with("error", "error");
            }

        }

        if(isset($_POST['upload'])){
            $request->validate([
                '_file' => 'required|max:10000|mimes:xlsx,xls,csv',
            ]);
            if($request->hasFile('_file')){
                
                Excel::import(new CertificateImport,$request->file('_file'));
                return back()->with('success', 'Record Successfully imported');
            }
                return back()->with('error', 'Error');
        }

        if(isset($_POST['update'])){
            $request->validate([
                'name' => 'required',
                'organization' => 'required',
            ]);

            $update = Cert::find($request->id);
            if($update){
                $ind['cert_id'] =$request->get('cert_id');
                $ind['name'] =$request->get('name');
                $ind['department'] = $request->get('organization');

                $update->update($ind);

                return back()->with('success', 'Record Successfully Updated');
            }
        }

        if(isset($_POST['delete'])){
            $request->validate([
                'id' => 'required'
            ]);

            $r = Cert::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Record Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }
        if(isset($_POST['verify'])){
            $request->validate([
                'id' => 'required'
            ]);

            $app = $request->date;
            $uuid = chr(rand(65, 90)).rand(3000,100000).date('y');

            $r = Cert::find($request->id);
            if($r){
               
                $r->update(['status' => 'verified', 'date' => Carbon::now()->format('d/F/Y')]);
                return back()->with('success', 'Successfully Verified');
            }else{
                return back()->with('error','server error');
            }
            
        }
       
        return view('admin/verification');
    }

    public function admins(Request $request) {

        if(isset($_POST['create'])){
            $request->validate([
                'name' => 'required',
                'role' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            
            $d = Admin::create([
                'name' => $request->input('name'),
                'role' => $request->input('role'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            if($d){
                return back()->with("success", "Successfully Added");
            }else{

                return back()->with("error", "error");
            }

        }

        if(isset($_POST['update'])){
            $request->validate([
                'name' => 'required',
                'role' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $update = Admin::find($request->id);
            if($update){
                $ind['name'] =$request->get('name');
                $ind['role'] = $request->get('role');
                $ind['email'] = $request->get('email');
                $ind['password'] = $request->get('password');

                $update->update($ind);

                return back()->with('success', 'Record Successfully Updated');
            }
        }

        if(isset($_POST['delete'])){
            $request->validate([
                'id' => 'required'
            ]);

            $r = Admin::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Record Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }

        return view('admin/admins');
    }

    public function users(Request $request){
        if(isset($_POST['delete'])){
            $request->validate([
                'id' => 'required'
            ]);

            $r = User::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Record Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }
        return view('admin/users');
    }
}
