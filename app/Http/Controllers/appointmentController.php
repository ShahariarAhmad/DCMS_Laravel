<?php

namespace App\Http\Controllers;

use App\Http\Requests\make_appointment;
use App\Models\Appointment;
use App\Models\Transaction;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{

    function store(make_appointment $request)
    {
        

        $maxSerial = Appointment::where('desired_serial_date', $request->desired_date)
        ->orderby('given_serial_no','DESC')
        ->get('given_serial_no')->first();
     

        if (empty($maxSerial)) {
            $givenSerial    =  1; 
        }
        if (!empty($maxSerial)) {
            $givenSerial = $maxSerial->given_serial_no + 1;
        }

        $user_id = Auth::id();

        $data['amount'] = $request->amount;
        $data['sent_to'] = $request->to;
        $data['sent_from'] = $request->from;

        $data['payment_method'] = $request->method;

        $data['user_id'] = $user_id;
        $data['trix_id'] = $request->transaction;
        $transaction = Transaction::create($data);
        $tid = DB::getPdo()->lastInsertId();

        $appData['desired_serial_date'] = $request->desired_date;
        $appData['transaction_id'] = $tid;
        $appData['chamber_id'] = $request->cid;
        
        $appData['given_serial_no'] = $givenSerial;
        Appointment::create($appData);
    

        return back()->with('status', 'Your appointment was successfully registered');
    }

}
