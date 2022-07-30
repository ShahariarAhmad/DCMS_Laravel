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

    function all_diet_records_search(Request $request)
    {
        $query = $request->data;



        if (!empty($query)) {

            $searchRecords = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->join('diet_records', 'transactions.id', 'diet_records.transaction_id')
                ->join('diets', 'diets.id', 'diet_records.diet_id')


                ->where('diets.id', 'like', '%' . $query . '%')

                ->orWhere('users.f_name', 'like', '%' . $query . '%')

                ->orWhere('users.l_name', 'like', '%' . $query . '%')

                ->orWhere('transactions.trix_id', 'like', '%' . $query . '%')

                ->orWhere('transactions.amount', 'like', '%' . $query . '%')

                ->orWhere('transactions.sent_to', 'like', '%' . $query . '%')

                ->orWhere('transactions.sent_from', 'like', '%' . $query . '%')

                ->orWhere('transactions.payment_method', 'like', '%' . $query . '%')

                ->orWhere('diets.type', 'like', '%' . $query . '%')

                ->orWhere('transactions.created_at', 'like', '%' . $query . '%')
                ->select('diets.id', 'users.f_name', 'users.l_name', 'transactions.trix_id', 'transactions.amount', 'transactions.sent_to', 'transactions.sent_from', 'transactions.payment_method', 'diets.type', 'transactions.created_at','diet_records.created_at as diet_date')


                ->paginate(50);
            $dietRecords = NULL;
            $page_title = 'Diet Records';
            $page       = 'diet_records';
            return view('master_layouts.dashboard', compact('page_title', 'page', 'dietRecords', 'searchRecords'));
        }
    }



    function pre_made_diet_records_search(Request $request)
    {
        $query = $request->data;



        if (!empty($query)) {

            $searchRecords = DB::table('transactions')
            ->join('users', 'transactions.user_id', 'users.id')
            ->join('attached_pre_made_diet_charts', 'transactions.id', 'attached_pre_made_diet_charts.transaction_id')
            ->join('pre_made_diet_charts', 'attached_pre_made_diet_charts.id', 'pre_made_diet_charts.id')        
         
      
         
                

        

                ->orWhere('users.f_name', 'like', '%' . $query . '%')

                ->orWhere('users.l_name', 'like', '%' . $query . '%')

                ->orWhere('transactions.trix_id', 'like', '%' . $query . '%')

                ->orWhere('transactions.amount', 'like', '%' . $query . '%')

                ->orWhere('transactions.sent_to', 'like', '%' . $query . '%')

                ->orWhere('transactions.sent_from', 'like', '%' . $query . '%')

                ->orWhere('transactions.payment_method', 'like', '%' . $query . '%')

                ->orWhere('pre_made_diet_charts.type', 'like', '%' . $query . '%')

                ->orWhere('transactions.created_at', 'like', '%' . $query . '%')
                ->select('*')

                ->paginate(50);
            $dietRecords = NULL;
            $page_title = 'Pre Made Diet Records';
            $page       = 'pre_made_diet_records';
            return view('master_layouts.dashboard', compact('page_title', 'page', 'dietRecords', 'searchRecords'));
        }
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

