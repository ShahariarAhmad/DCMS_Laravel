<?php

namespace App\Repositories;



use App\Interfaces\EndInterface;
use App\Http\Requests\add_account;
use App\Models\Blog;
use App\Models\Chamber;
use App\Models\History_anwser;
use App\Models\Services_section_inbox;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mime\Encoder\EncoderInterface;

class EndRepository implements EndInterface
{
  

    public function addAccount($request)
    {
        if (Gate::allows('isAdmin')) {

            if ($request->designation == 'moderator') {
                $designation = 2;
            }

            if ($request->designation == 'writer') {
                $designation = 4;
            }


            User::create([
                'f_name'    =>    $request->fname,
                'l_name'    =>    $request->lname,
                'email'    =>    $request->email,
                'role_id'    =>    $designation,
                'cell_number'    =>    $request->number,
                'sex'    =>    $request->gender,
                'password'        => Hash::make('dcms1234'),
            ]);
        } else {
            abort(403);
        }
        return back()->with('addAccount', 'Account created successfully');
    }



    public function admin_dashboard()
    {
        date_default_timezone_set('Asia/Dhaka');

        if (Gate::allows('isAdmin')) {

            $inbox = Services_section_inbox::where('status', 'unread')->get();
            $blog = Blog::whereIn('status', ['pending', 'draft'])->get();
            $chamber = Chamber::all();
            $date = now()->format('d-m-Y');
            $transaction = Transaction::join('users', 'users.id', 'transactions.user_id')
                ->where('payment_status', 'pending')
                ->select('f_name', 'trix_id', 'amount', 'sent_from')
                ->get();

            $appointments = DB::table('appointments')
                ->join('transactions', 'transactions.id', 'appointments.transaction_id')
                ->join('users', 'users.id', 'transactions.user_id')
                ->join('chambers', 'chambers.id', 'appointments.chamber_id')

                ->whereDate('desired_serial_date', '=', date('Y-m-d'))
                ->limit(200)
                ->get();

            $page_title = 'Admin Dashboard';
            $page       = 'admin_dashboard';
            return view('layouts.backend.dashboard.admin_dashboard', compact('page_title', 'page', 'inbox', 'appointments', 'blog', 'transaction', 'chamber'));
        } else {
            abort(403);
        }
    }



    public function moderator_dashboard()
    {
        if (Gate::allows('isModerator')) {
            $inbox = Services_section_inbox::where('status', 'unread')->get();
            $blog = Blog::whereIn('status', ['pending', 'draft'])->get();
            $chamber = Chamber::all();
            $date = now()->format('d-m-Y');
            $transaction = Transaction::join('users', 'users.id', 'transactions.user_id')
                ->where('payment_status', 'pending')
                ->select('f_name', 'trix_id', 'amount', 'sent_from')
                ->get();


            $appointments = DB::table('appointments')
                ->join('transactions', 'transactions.id', 'appointments.transaction_id')
                ->join('users', 'users.id', 'transactions.user_id')
                ->join('chambers', 'chambers.id', 'appointments.chamber_id')
                ->where('payment_status', 'pending')
                ->get();

            $page_title = 'Moderator Dashboard';
            $page       = 'moderator_dashboard';
            return view('layouts.backend.dashboard.moderator_dashboard', compact('page_title', 'page', 'inbox', 'appointments', 'blog', 'transaction', 'chamber'));
        } else {
            abort(403);
        }
    }

    public function payment_history()
    {

        return 'This page has a bug that I recently found. I will fix it when I can manage enough time. I believe the bug is related to dummy data Or SQL Query.';
        if (Gate::allows('isPatient')) {
            $payment_appointments = DB::table('users')
                ->join('transactions', 'transactions.id', 'users.id')
                ->join('appointments', 'transactions.id', 'appointments.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')
                ->where('users.id', '==', Auth::id())
                ->get(['users.f_name as name', 'u.f_name as handler', 'trix_id', 'amount', 'payment_method', 'payment_status', 'cause'])->toArray();
            return $payment_appointments;

            $payment_diet_records = DB::table('users')

                ->join('diet_records', 'diet_records.user_id', 'users.id')
                ->join('transactions', 'transactions.id', 'diet_records.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')
                ->where('users.id', '==', Auth::id())
                ->get(['users.f_name as name', 'u.f_name as handler', 'trix_id', 'amount', 'payment_method', 'payment_status', 'cause'])->toArray();

            return $payment_diet_records;

            $history = array_merge($payment_appointments, $payment_diet_records);



            $page_title = 'Payment History';
            $page       = 'payment_history';
            return view('layouts.backend.transaction.payment_history', compact('page_title', 'page', 'history'));
        } else {
            abort(403);
        }
    }



    public function patitient_profile()
    {
        if (Gate::allows('isPatient')) {

            $qa = History_anwser::join('histories', 'histories.id', 'history_anwsers.history_id')
                ->join('options', 'options.id', 'history_anwsers.option_id')
                ->where('user_id', Auth::id())
                ->get()
                ->toArray();

            $sick = DB::table('sick_user')
                ->join('sicks', 'sicks.id', 'sick_user.sick_id')

                ->where('user_id', Auth::id())->get();

            $user = User::whereId(Auth::id())->get()->toArray();
            $page_title = 'Patitient Profile';
            $page       = 'patitient_profile';

            return view('layouts.backend.pages.profile', compact('page_title', 'page', 'qa', 'user', 'sick'));
        } else {
            abort(403);
        }
    }

    public function submit_mcq($request)
    {


        if ($request->ms == "Submit") {
            DB::table('history_anwsers')
                ->where('user_id', Auth::id())
                ->delete();
            if (is_array($request->mcq)) {
                foreach ($request->mcq as $qa) {

                    $a = explode(',', $qa);
                    DB::table('history_anwsers')->Insert(['user_id' => Auth::id(), 'option_id' => $a[1], 'history_id' => $a[0]], ['user_id', 'option_id', 'history_id'], ['user_id', 'option_id', 'history_id']);
                }
            }
        }

        if ($request->sick == "Submit") {
            DB::table('sick_user')

                ->where('user_id', Auth::id())
                ->delete();
            if (is_array($request->mcq)) {
                foreach ($request->mcq as $v) {
                    DB::table('sick_user')->Insert(['user_id' => Auth::id(), 'sick_id' => $v]);
                }
            }
        }


        return back()->with('history', 'Data submitted successfully.');
    }
}
