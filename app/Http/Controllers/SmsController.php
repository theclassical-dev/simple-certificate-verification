<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        Nexmo::message()->send([
            // 'to' => '2348123051357',
            'to' => '2348147885361',
            'from' => '08147885361',
            'text' => 'Dear James, You missed your appointment'
        ]);

        echo "Sent";
    }
}
