<?php

namespace App\Http\Controllers;

use App\Http\Requests\request_diet;
use App\interfaces\DietInterface;
use App\Models\Attached_pre_made_diet_chart;
use App\Models\Diet;
use App\Models\Diet_record;
use App\Models\Diet_request;
use App\Models\Notes_from_doctor;
use App\Models\Pre_made_diet_chart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class dietController extends Controller
{
    protected  $interface;

    function __construct(DietInterface $data)
    {
        return $this->interface = $data;
    }


    public function all_payment_and_transaction_records(Request $request)
    {
        if (Gate::allows('isAdmin')) {

            $payment_appointments = DB::table('users')
                ->join('transactions', 'transactions.id', 'users.id')
                ->join('appointments', 'transactions.id', 'appointments.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')
                ->orderByDesc('trix_date')
                ->get(['users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause'])->toArray();


            $payment_diet_records = DB::table('users')

                ->join('diet_records', 'diet_records.user_id', 'users.id')
                ->join('transactions', 'transactions.id', 'diet_records.transaction_id')
                ->join('handlers', 'handlers.id', 'transactions.handler_id')
                ->join('users as u', 'u.id', 'handlers.user_id')
                ->orderByDesc('trix_date')
                ->get(['users.f_name as name', 'u.f_name as handler', 'trix_id', 'trix_date', 'sent_from', 'sent_to', 'amount', 'payment_method', 'payment_status', 'cause'])->toArray();


            $records = array_merge($payment_appointments, $payment_diet_records);

            $page_title = 'All Records';
            $page       = 'all_records';
            $data       =  NULL;
            return view('layouts.backend.record.all_record', compact('page_title', 'page', 'records', 'data'));
        } else {
            abort(403);
        }
    }

    function pre_made_diet_records_search(Request $request)
    {

        return $this->interface->premadeSearch($request);
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
                ->select('diets.id', 'users.f_name', 'users.l_name', 'transactions.trix_id', 'transactions.amount', 'transactions.sent_to', 'transactions.sent_from', 'transactions.payment_method', 'diets.type', 'transactions.created_at', 'diet_records.created_at as diet_date')


                ->paginate(50);
            $dietRecords = NULL;
            $page_title = 'Diet Records';
            $page       = 'diet_records';
            return view('master_layouts.dashboard', compact('page_title', 'page', 'dietRecords', 'searchRecords'));
        }
    }



    function quickformWithRequest(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if (empty($request->rows)) {
                return redirect()->route('Dashboard_quickform');
            }

            $req    =   NULL;


            $req = Diet_request::where('transaction_id', session()->get('create_diet_trix'))->get();



            $row = $request->rows;
            for ($i = 1; $i <= $row; $i++) {
                $rows[] = $i;
            }



            $page_title = 'Create Diet';
            $page       = 'create_diet';



            if ($request->rows != NULL) {
                return view('layouts.backend.diet.create_diet', compact('page_title', 'page', 'rows', 'req'));
            }
        } else {
            abort(403);
        }
    }

    function quickform()
    {
        if (Gate::allows('isAdmin')) {


            if (url()->previous() != request()->root() . '/dashboard/diet_requests') {
                session()->forget(['create_diet_user_id', 'create_diet_id', 'create_diet_trix']);
            }
            $page_title = 'Create Diet';
            $page       = 'quickform';
            return view('layouts.backend.diet.row', compact('page_title', 'page'));
        } else {
            abort(403);
        }
    }



    public function request_diet()
    {
        if (Gate::allows('isPatient')) {
            $page_title = 'Request Diet';
            $page       = 'request_diet';
            return view('layouts.backend.diet.request_diet', compact('page_title', 'page'));
        } else {
            abort(403);
        }
    }


    public function view_chart()
    {
        if (Gate::allows('isPatient')) {

            $currentDiet = Diet::where('user_id', Auth::id())
                ->orderby('id', 'DESC')
                ->limit(1)
                ->select(
                    'id',
                    'date',
                    'diet_chart',
                    'type',
                    'note',
                    'join',
                    'q_one',
                    'q_two',
                    'q_three',
                    'q_four',
                    'created_at'
                )
                ->get()->toArray();


            $page_title = 'Current Diet Chart';
            $page       = 'current_diet_chart';
            return view('layouts.backend.diet.view_diet', compact('page_title', 'page', 'currentDiet'));
        } else {
            abort(403);
        }
    }


    public function detachDiet($id)
    {
        $diet_records = Diet_record::find($id);
        $diet_records->user_id;
        $transaction_id = $diet_records->transaction_id;

        Diet_request::create([
            'transaction_id' => $transaction_id,
            'person_name' => 'N\A',
            'age' => 'N\A',
            'gender' => 'N\A',
            'height' => 'N\A',
            'weight' => 'N\A',
            'q_one' => 'N\A',
            'q_two' => 'N\A',
            'q_three' => 'N\A',
            'q_four' => 'N\A',
            'q_five' => 'N\A',
            'q_six' => 'N\A',
            'send' => 'n'
        ]);
        $diet_records->delete();
        return back()->with('dettached', 'Diet Dettached');
    }






    public function preview_diet($id)
    {
        if (Gate::allows('isAdmin')) {

            $preview    =   Pre_made_diet_chart::where('id', $id)->get();
            $page_title = 'Preview Diet';
            $page       = 'preview_diet';
            return view('layouts.backend.diet.view_diet', compact('page_title', 'page', 'preview'));
        } else {
            abort(403);
        }
    }

    public function request_diet_form(request_diet $request)
    {

        if (Gate::allows('isPatient')) {

            return $this->interface->request_form($request);

            return back()->with('request_diet', 'Your request is successfully registered');
        } else {
            abort(403);
        }
    }






    function create_chart(Request $request, $id, $trix)
    {

        if (Gate::allows('isAdmin')) {

            $id = $id;
            $trix = $trix;
            $u = Transaction::find($trix);
            $user_id = $u->user_id;

            session(['create_diet_user_id' => $user_id]);
            session(['create_diet_id' => $id]);
            session(['create_diet_trix' => $trix]);

            return redirect(route('Dashboard_quickform'));
        } else {
            abort(403);
        }
    }

    function payment_confirmed($tid)
    {
        // dd();
        if (Gate::allows('isAdmin')) {

            $data = Transaction::find($tid);
            $data->payment_status = 'approved';
            $data->save();
            return back();
        } else {
            abort(403);
        }
    }

    public function create_diet()
    {
        if (Gate::allows('isAdmin')) {

            $diet = 'a';
            $page_title = 'Create Diet';
            $page       = 'create_diet';
            return view('layouts.backend.diet.create_diet', compact('page_title', 'page'));
        } else {
            abort(403);
        }
    }

    function trix_notFound($tid)
    {

        if (Gate::allows('isAdmin')) {

            $data = Transaction::find($tid);
            $data->payment_status = 'notFound';
            $data->save();

            return back();
        } else {
            abort(403);
        }
    }


    function editDiet($id)
    {
        if (Gate::allows('isAdmin')) {

            session(['drafts_id' => $id]);
            $chart   =   Diet::where('id', $id)
                ->select('diet_chart', 'note', 'id')
                ->get()->toArray();


            $id   = $chart[0]['id'];
            $note = $chart[0]['note'];
            $diet = json_decode($chart[0]['diet_chart'], true);

            $page_title = 'Edit Diet';
            $page       = 'edit_diet';


            return view('layouts.backend.diet.edit_diet', compact('page_title', 'page', 'diet', 'note', 'id'));
        } else {
            abort(403);
        }
    }









    function updateDiet(Request $req)
    {
        if (Gate::allows('isAdmin')) {

            return $this->interface->update($req);



            return redirect()->route('Dashboard_diet_drafts');
        } else {
            abort(403);
        }
    }



















    function create_chart_post(Request $req)
    {


        if (Gate::allows('isAdmin')) {
            return $this->interface->store($req);
        } else {
            abort(403);
        }
    }



    function sendPremade(Request $req)
    {

        if (Gate::allows('isAdmin')) {

            return $this->interface->sendPremade($req);
        } else {
            abort(403);
        }
    }

    public function diet_records()
    {
        if (Gate::allows('isAdmin')) {

            $dietRecords = $this->interface->records();



            $page_title = 'Diet Records';
            $page       = 'diet_records';
            return view('layouts.backend.record.diet_record', compact('page_title', 'page', 'dietRecords'));
        } else {
            abort(403);
        }
    }
    public function pre_made_diet_records()
    {
        if (Gate::allows('isAdmin')) {

            $dietRecords = $this->interface->premadeRecords();
            $searchRecords = NULL;

            $page_title = 'Pre Made Diet Records';
            $page       = 'pre_made_diet_records';


            return view('layouts.backend.record.premade_diet_record', compact('page_title', 'page', 'searchRecords', 'dietRecords'));
        } else {
            abort(403);
        }
    }



    public function pre_detach($id)
    {

        $diet_records = Attached_pre_made_diet_chart::find($id);

        // $user_id = $diet_records->user_id;
        $transaction_id = $diet_records->transaction_id;

        Diet_request::create([
            'transaction_id' => $transaction_id,
            'person_name' => 'N\A',
            'age' => 'N\A',
            'gender' => 'N\A',
            'height' => 'N\A',
            'weight' => 'N\A',
            'q_one' => 'N\A',
            'q_two' => 'N\A',
            'q_three' => 'N\A',
            'q_four' => 'N\A',
            'q_five' => 'N\A',
            'q_six' => 'N\A',
            'send' => 'n'
        ]);
        $diet_records->delete();
        return back()->with('dettached', 'Diet Dettached.');
    }




    public function diet_requests()
    {
        if (Gate::allows('isAdmin')) {

            $dietRequests = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->join('diet_requests', 'transactions.id', 'diet_requests.transaction_id')
                ->SELECT('person_name', 'diet_requests.age', 'diet_requests.gender', 'diet_requests.height', 'diet_requests.weight', 'transactions.trix_id', 'transactions.amount', 'transactions.sent_to', 'transactions.sent_from', 'transactions.payment_status', 'transactions.id as pid', 'users.id as uid')
                ->get();

            $page_title = 'Diet Requests';
            $page       = 'diet_requests';
            return view('layouts.backend.diet.diet_request', compact('page_title', 'page', 'dietRequests'));
        } else {
            abort(403);
        }
    }


    public function diet_drafts()
    {
        if (Gate::allows('isAdmin')) {

            $diet = Diet::where('draft', 'yes')->get();

            $page_title = 'Diet Drafts';
            $page       = 'diet_drafts';
            return view('layouts.backend.diet.diet_draft', compact('page_title', 'page', 'diet'));
        } else {
            abort(403);
        }
    }







    public function pre_made_diet_charts()
    {
        if (Gate::allows('isAdmin')) {
            $patients = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->join('diet_requests', 'transactions.id', 'diet_requests.transaction_id')
                ->SELECT('f_name', 'age', 'sex', 'height', 'weight', 'trix_id', 'users.id as uid', 'transactions.id as tid')
                ->get();

            $notes = Notes_from_doctor::all();
            $prediet = Pre_made_diet_chart::all();
            $page_title = 'Pre-made Diet Charts';
            $page       = 'pre_made_diet_charts';
            return view('layouts.backend.diet.premade_diet_chart', compact('page_title', 'page', 'patients', 'prediet', 'notes'));
        } else {
            abort(403);
        }
    }
}
