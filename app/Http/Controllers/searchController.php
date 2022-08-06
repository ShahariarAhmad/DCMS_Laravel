<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class searchController extends Controller
{

    function all_records_search(Request $request)
    {
        $query = $request->data;



        if (!empty($query)) {

            $payment_appointments = DB::table('users')
                ->join('transactions', 'transactions.id', 'users.id')
                ->join('appointments', 'transactions.id', 'appointments.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')







                ->where('users.f_name', 'like', '%' . $query . '%')
                // ->orWhere('handler', 'like', '%' . $query . '%')
                ->orWhere('trix_id', 'like', '%' . $query . '%')
                ->orWhere('trix_date', 'like', '%' . $query . '%')
                ->orWhere('sent_from', 'like', '%' . $query . '%')
                ->orWhere('sent_to', 'like', '%' . $query . '%')
                ->orWhere('amount', 'like', '%' . $query . '%')
                ->orWhere('payment_method', 'like', '%' . $query . '%')
                ->orWhere('payment_status', 'like', '%' . $query . '%')
                ->orWhere('cause', 'like', '%' . $query . '%')

                ->select('users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause')

                ->get()->toArray();


            $payment_diet_records = DB::table('users')

                ->join('diet_records', 'diet_records.user_id', 'users.id')
                ->join('transactions', 'transactions.id', 'diet_records.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')






                ->where('users.f_name', 'like', '%' . $query . '%')
                // ->orWhere('handler', 'like', '%' . $query . '%')
                ->orWhere('trix_id', 'like', '%' . $query . '%')
                ->orWhere('trix_date', 'like', '%' . $query . '%')
                ->orWhere('sent_from', 'like', '%' . $query . '%')
                ->orWhere('sent_to', 'like', '%' . $query . '%')
                ->orWhere('amount', 'like', '%' . $query . '%')
                ->orWhere('payment_method', 'like', '%' . $query . '%')
                ->orWhere('payment_status', 'like', '%' . $query . '%')
                ->orWhere('cause', 'like', '%' . $query . '%')


                ->select('users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause')


                ->get()->toArray();


            $payment_attached_pre_made_diet_charts = DB::table('users')

                ->join('attached_pre_made_diet_charts', 'attached_pre_made_diet_charts.user_id', 'users.id')
                ->join('transactions', 'transactions.id', 'attached_pre_made_diet_charts.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')

                // ->select('users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause')




                ->where('users.f_name', 'like', '%' . $query . '%')
                ->orWhere('trix_id', 'like', '%' . $query . '%')
                ->orWhere('trix_date', 'like', '%' . $query . '%')
                ->orWhere('sent_from', 'like', '%' . $query . '%')
                ->orWhere('sent_to', 'like', '%' . $query . '%')
                ->orWhere('amount', 'like', '%' . $query . '%')
                ->orWhere('payment_method', 'like', '%' . $query . '%')
                ->orWhere('payment_status', 'like', '%' . $query . '%')
                ->orWhere('cause', 'like', '%' . $query . '%')


                ->select('users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause')


                ->get()->toArray();


            //  here    

            $record = array_merge($payment_appointments, $payment_diet_records, $payment_attached_pre_made_diet_charts);



            $total = count($record);
            $per_page = 10;
            $current_page = $request->input("page") ?? 1;
            $starting_point = ($current_page * $per_page) - $per_page;
            $data = array_slice($record, $starting_point, $per_page, true);



            $data = new Paginator($data, $total, $per_page, $current_page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);
        }

        $page_title =   'All Records';
        $page       =   'diet_records';
        $records    =   NULL;
        return view('master_layouts.dashboard', compact('page_title', 'page', 'records', 'data'));
    }

   





    

    function user_records_search(Request $request)
    {
        $query = $request->data;



        if (!empty($query)) {

            $searchRecords = User::join('roles', 'roles.id', 'users.role_id')

        

                ->Where('users.f_name', 'like', '%' . $query . '%')
                ->orWhere('users.id', 'like', '%' . $query . '%')
                ->orWhere('users.l_name', 'like', '%' . $query . '%')
                ->orWhere('roles.name', 'like', '%' . $query . '%')
                ->orWhere('users.l_name', 'like', '%' . $query . '%')
                ->select('users.id as uid', 'f_name', 'l_name', 'name', 'account_status', 'role_id')
                ->paginate(50);

            $account = NULL;
            $page_title = 'accounts';
            $page       = 'accounts';
            return view('master_layouts.dashboard', compact('page_title', 'page', 'account', 'searchRecords'));
        }
    }
}

