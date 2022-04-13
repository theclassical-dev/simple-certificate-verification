<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
Use App\Models\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RecordImport;
use App\Imports\AttendanceImport;
Use App\Models\Record;
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
        $r = Attendance::all();
        $c = date('d-m-Y', strtotime($request->date));

        //2 weeks before the appointment
        foreach($r as $b){
            if(Carbon::now()->format('d-m-Y') == date('d-m-Y', strtotime($b->weeks)) && $b->reminder == 0){

                $reminder = Attendance::find($b->id);

                if($reminder){

                    $ind['reminder'] = 1;
                    $reminder->update($ind);

                    $to = '+2349121356634';
                        $from = getenv("TWILIO_FROM");
                        $message = 'Hello, Your Next Apointment Is next week '. date('d/F/Y', strtotime($request->date."+2 weeks"));
                        //open connection
                
                        $ch = curl_init();
                
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                        curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                        curl_setopt($ch, CURLOPT_POST, 3);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
                
                        // execute post
                        $result = curl_exec($ch);
                        $result = json_decode($result);
                
                        // close connection
                        curl_close($ch);
                }
            }
        }

        //1 day before the appointments
        foreach($r as $b){
            if(Carbon::now()->format('d-m-Y') == date('d-m-Y', strtotime($b->aday)) && $b->reminder == 1){

                $reminder = Attendance::find($b->id);
                
                if($reminder){

                    $ind['reminder'] = 2;
                    $reminder->update($ind);

                    $to = '+2349121356634';
                        $from = getenv("TWILIO_FROM");
                        $message = 'Hello, Your Next Apointment Is Tomorrow '.date('d/F/Y', strtotime($request->date."+1 day"));
                        //open connection
                
                        $ch = curl_init();
                
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                        curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                        curl_setopt($ch, CURLOPT_POST, 3);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
                
                        // execute post
                        $result = curl_exec($ch);
                        $result = json_decode($result);
                
                        // close connection
                        curl_close($ch);
                }else{
                    echo 'kkk';
                }
            // exit();
            }
        }

        //missed appointment
        foreach($r as $b){
            if($b->status == 'missed' && $b->flag == 0){
                
                // flag updates
                $flag = Attendance::find($b->id);

                if($flag){
                    $ind['flag'] = 1;
                    $flag->update($ind);

                    $to = '+2349121356634';
                    $from = getenv("TWILIO_FROM");
                    $message = 'Dear Patient, You missed your last appointment '. date('d/F/Y', strtotime($b->date));
                    //open connection
            
                    $ch = curl_init();
            
                    //set the url, number of POST vars, POST data
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                    curl_setopt($ch, CURLOPT_POST, 3);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
            
                    // execute post
                    $result = curl_exec($ch);
                    $result = json_decode($result);
            
                    // close connection
                    curl_close($ch);
                }
    
            }
        }

        return view('admin/dashboard');
    }

    public function attendance(Request $request){
        $r = Attendance::all();
        $c = date('d-m-Y', strtotime($request->date));

        //2 weeks before the appointment
        foreach($r as $b){
            if(Carbon::now()->format('d-m-Y') == date('d-m-Y', strtotime($b->weeks)) && $b->reminder == 0){

                $reminder = Attendance::find($b->id);

                if($reminder){

                    $ind['reminder'] = 1;
                    $reminder->update($ind);

                    $to = '+2349121356634';
                        $from = getenv("TWILIO_FROM");
                        $message = 'Hello, Your Next Apointment Is next week '. date('d/F/Y', strtotime($request->date."+2 weeks"));
                        //open connection
                
                        $ch = curl_init();
                
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                        curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                        curl_setopt($ch, CURLOPT_POST, 3);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
                
                        // execute post
                        $result = curl_exec($ch);
                        $result = json_decode($result);
                
                        // close connection
                        curl_close($ch);
                }
            }
        }

        //1 day before the appointments
        foreach($r as $b){
            if(Carbon::now()->format('d-m-Y') == date('d-m-Y', strtotime($b->aday)) && $b->reminder == 1){

                $reminder = Attendance::find($b->id);
                
                if($reminder){

                    $ind['reminder'] = 2;
                    $reminder->update($ind);

                    $to = '+2349121356634';
                        $from = getenv("TWILIO_FROM");
                        $message = 'Hello, Your Next Apointment Is Tomorrow '.date('d/F/Y', strtotime($request->date."+1 day"));
                        //open connection
                
                        $ch = curl_init();
                
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                        curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                        curl_setopt($ch, CURLOPT_POST, 3);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
                
                        // execute post
                        $result = curl_exec($ch);
                        $result = json_decode($result);
                
                        // close connection
                        curl_close($ch);
                }else{
                    echo 'kkk';
                }
            // exit();
            }
        }

        //missed appointment
        foreach($r as $b){
            if($b->status == 'missed' && $b->flag == 0){
                
                // flag updates
                $flag = Attendance::find($b->id);

                if($flag){
                    $ind['flag'] = 1;
                    $flag->update($ind);

                    $to = '+2349121356634';
                    $from = getenv("TWILIO_FROM");
                    $message = 'Dear Patient, You Missed Your Last Appointment '.date('d/F/Y', strtotime($b->date));
                    //open connection
            
                    $ch = curl_init();
            
                    //set the url, number of POST vars, POST data
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                    curl_setopt($ch, CURLOPT_POST, 3);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
            
                    // execute post
                    $result = curl_exec($ch);
                    $result = json_decode($result);
            
                    // close connection
                    curl_close($ch);
                }
    
            }
        }

        if(isset($_POST['create'])){
            $request->validate([
                'PepID' => 'required',
                'name' => 'required',
                'PhoneNo' => 'required',
                'FacultyName' => 'required',
                'date' => 'required',
            ]);
            
            // $app = date('d-m-Y H:i:s');
            $app = $request->date;

            $d = Attendance::create([
                'PepID' => $request->input('PepID'),
                'name' => $request->input('name'),
                'PhoneNo' => $request->input('PhoneNo'),
                'FacultyName' => $request->input('FacultyName'),
                'date' => $request->input('date'),
                'aday' =>  date("d-m-Y", strtotime($request->date ." -1 day")),
                'weeks' => date("d-m-Y", strtotime($request->date ." -2 weeks"))
                // 'status' => $request->input('status'),
            ]);

            if($d){
                return back()->with("success", "Appointment Successfully Created");
            }else{

                return back()->with("error", "error");
            }

        }

        if(isset($_POST['upload'])){
            $request->validate([
                '_file' => 'required|max:10000|mimes:xlsx,xls,csv',
            ]);
            if($request->hasFile('_file')){
                
                Excel::import(new AttendanceImport,$request->file('_file'));
                return back()->with('success', 'Record Successfully imported');
            }
                return back()->with('error', 'Error');
        }

        if(isset($_POST['update'])){
            $request->validate([
                'PepID' => 'required',
                'name' => 'required',
                'PhoneNo' => 'required',
                'FacultyName' => 'required',
                'date' => 'required',
            ]);

            $update = Attendance::find($request->id);
            if($update){
                $ind['PepID'] =$request->get('PepID');
                $ind['name'] =$request->get('name');
                $ind['PhoneNo'] = $request->get('PhoneNo');
                $ind['FacultyName'] = $request->get('FacultyName');
                $ind['date'] = $request->get('date');
                $ind['aday'] =  date("d-m-Y", strtotime($request->date ." -1 day"));
                $ind['weeks'] = date("d-m-Y", strtotime($request->date ." -2 weeks"));
                $ind['status'] = $request->get('status');
                


                $update->update($ind);

                return back()->with('success', 'Patient Record Successfully Updated');
            }
        }

        if(isset($_POST['delete'])){
            $request->validate([
                'prop_id' => 'required'
            ]);

            $r = Appointment::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Appointment Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }

        $c = now()->subDays(1)->format('d/F/Y');
        $r = Attendance::all()->first();


        $a = Record::all();
        return view('admin/atttendance', compact('a'));
    }

    public function upload(Request $request) {

        if(isset($_POST['upload'])){
            $request->validate([
                '_file' => 'required|max:10000|mimes:xlsx,xls,csv',
            ]);
            if($request->hasFile('_file')){
                
                Excel::import(new RecordImport,$request->file('_file'));
                return back()->with('success', 'Record Successfully imported');
            }
                return back()->with('error', 'Error');

        }

        return view('admin/upload');
    }
}
