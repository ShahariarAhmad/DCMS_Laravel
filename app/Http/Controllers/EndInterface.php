<?php

namespace App\Http\Controllers;

use App\Http\Requests\add_account;
use App\Http\Requests\edit_profile;
use App\Models\About;
use App\Models\Appointment;
use App\Models\Attached_pre_made_diet_chart;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\Diet;
use App\Models\Diet_request;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Sick;
use App\Models\History_anwser;
use App\Models\Notes_from_doctor;
use App\Models\Pre_made_diet_chart;
use App\Models\Service;
use App\Models\Services_section_inbox;
use App\Models\Sick_user;
use App\Models\Social_media;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class EndInterface extends Controller
{

    function createSerials()
    {

        $page_title = 'Create Serials';
        $page       = 'createSerials';
        return view('layouts.backend.dashboard', compact('page_title', 'page'));
    }

    function makeSerials()
    {

        $page_title = 'Create Serials';
        $page       = 'createSerials';
        return view('layouts.backend.dashboard', compact('page_title', 'page'));
    }


    function accountReject($trix_id)
    {
        $transaction    =   Transaction::where('trix_id', $trix_id);
        $transaction->update(['payment_status' => 'withdrawn']);
        return back();
    }
    function accountApprove($trix_id)
    {
        $transaction    =   Transaction::where('trix_id', $trix_id);
        $transaction->update(['payment_status' => 'approved']);
        return back();
    }
    function accountNotFound($trix_id)
    {
        $transaction    =   Transaction::where('trix_id', $trix_id);
        $transaction->update(['payment_status' => 'not_found']);
        return back();
    }
    function accountPresent($transaction_id)
    {

        $appointment = Appointment::where('transaction_id', $transaction_id);
        $appointment->update(['present' => 'yes']);
        return back();
    }
    function accountAbsent($transaction_id)
    {

        $appointment = Appointment::where('transaction_id', $transaction_id);
        $appointment->update(['present' => 'no']);
        return back();
    }






    public function dashboard()
    {
// return asset('css/adminlte.min.css');
        $page_title = 'Dashboard';
        $page       = 'dashboard';
        return view('layouts.backend.dashboard.admin_dashboard', compact('page_title', 'page'));
    }

    public function diet_records()
    {
        if (Gate::allows('isAdmin')) {

            $dietRecords = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->join('diet_records', 'transactions.id', 'diet_records.transaction_id')
                ->join('diets', 'diets.id', 'diet_records.diet_id')
                ->orderBy('id','desc')
                ->select(
                    'diets.id',
                    'users.f_name',
                    'users.l_name',
                    'transactions.trix_id',
                    'transactions.amount',
                    'transactions.sent_to',
                    'transactions.sent_from',
                    'transactions.payment_method',
                    'diets.type',
                    'transactions.created_at',
                    'diet_records.date_of_submission'
                )->get();


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

           $dietRecords = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->join('attached_pre_made_diet_charts', 'transactions.id', 'attached_pre_made_diet_charts.transaction_id')
                ->join('pre_made_diet_charts', 'attached_pre_made_diet_charts.id', 'pre_made_diet_charts.id')
                ->select('*')
                ->get();


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


    public function about()
    {
        
        if (Gate::allows('isAdmin')) {
            $about = About::all();
            $bannerAboutO = Banner::where('placement', '=', 'about_o')->get();
            $bannerAboutT = Banner::where('placement', '=', 'about_t')->get();
            $service      = Service::all();
            $chamber = Chamber::all();
            $page_title = 'About';
            $page       = 'about';
            return view('layouts.backend.pages.about', compact('page_title', 'page', 'chamber', 'about', 'bannerAboutO', 'service', 'bannerAboutT'));
        } else {
            abort(403);
        }
    }


    public function accounts()
    {
        if (Gate::allows('isAdmin')) {



            $account = User::join('roles', 'roles.id', 'users.role_id')
                ->select('users.id as uid', 'f_name', 'l_name', 'name', 'account_status', 'role_id')
                ->get();
            $page_title = 'accounts';
            $page       = 'accounts';
            $searchRecords = NULL;
            return view('layouts.backend.record.account', compact('page_title', 'page', 'account', 'searchRecords'));
        } else {
            abort(403);
        }
    }



    public function deleteAccount($id)
    {
        if (Gate::allows('isAdmin')) {
            User::find($id)->delete();
        } else {
            abort(403);
        }
        return back()->with('deleteAccount', 'Account deleted successfully');
    }



    public function addAccount(add_account $request)
    {
        if (Gate::allows('isAdmin')) {
            // return $request->all();
           

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
            // return now()->format('Y-m-d');
            // return date('Y-m-d');



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

            // echo "<pre>";
            // print_r($appointments);

            $page_title = 'Admin Dashboard';
            $page       = 'admin_dashboard';
            return view('layouts.backend.dashboard.admin_dashboard', compact('page_title', 'page', 'inbox', 'appointments', 'blog', 'transaction', 'chamber'));
        } else {
            abort(403);
        }
    }


    public function chamber_details()
    {

        if (Gate::allows('isAdmin')) {
            $chamber    =  DB::table('chambers')->orderBy('c_m_position', 'asc')->get();
            $page_title = 'Chamber Details';
            $page       = 'chamber_details';
            return view('layouts.backend.pages.chamber_details', compact('page_title', 'page', 'chamber'));
        } else {
            abort(403);
        }
    }

    public function contact()
    {
        if (Gate::allows('isAdmin')) {
            $contact    = Contact::all();
            $page_title = 'Contact';
            $page       = 'contact';
            return view('layouts.backend.pages.contact', compact('page_title', 'page', 'contact'));
        } else {
            abort(403);
        }
    }

    public function feedback()
    {
        if (Gate::allows('isAdmin')) {
            $feedback = DB::table('feedbacks')
                ->join('users', 'users.id', '=', 'feedbacks.patient_id')
                ->select('f_name', 'l_name', 'user_reply', 'admin_reply')->get();
            $page_title = 'Feedbacks';
            $page       = 'feedbacks';
            return view('layouts.backend.pages.feedback', compact('page_title', 'page', 'feedback'));
        } else {
            abort(403);
        }
    }


    public function gallery()
    {
        if (Gate::allows('isAdmin')) {

            $gallery   =   Gallery::all();
            $page_title = 'Gallery';
            $page       = 'gallery';
            return view('layouts.backend.pages.gallery', compact('page_title', 'page', 'gallery'));

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
                // ->where('appointed_date', $date)
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


    public function social_links()
    {
        if (Gate::allows('isAdmin')) {
            $social = Social_media::all();
            $page_title = 'Social Links';
            $page       = 'social_links';
            return view('layouts.backend.pages.social_links', compact('page_title', 'page', 'social'));
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
            return view('layouts.backend.dashboard', compact('page_title', 'page'));
        } else {
            abort(403);
        }
    }



    public function view_chart()
    {
        if (Gate::allows('isPatient')) {

             $currentDiet = Diet::where('user_id', Auth::id())
             ->orderby('id','DESC')
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


    public function patitient_dashboard()
    {
        if (Gate::allows('isPatient')) {
            $page_title = 'Patitient Dashboard';
            $page       = 'patitient_dashboard';
            return view('layouts.backend.dashboard.patient_dashboard', compact('page_title', 'page'));
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
            ->join('sicks','sicks.id','sick_user.sick_id')
            
            ->where('user_id', Auth::id())->get();

            $user = User::whereId(Auth::id())->get()->toArray();
            $page_title = 'Patitient Profile';
            $page       = 'patitient_profile';

            return view('layouts.backend.pages.profile', compact('page_title', 'page', 'qa', 'user','sick'));
        } else {
            abort(403);
        }
    }











function changePass(edit_profile $request){
    
            User::whereId(Auth::id())
            ->update(['password' => Hash::make($request->password)]);
          
            return back()->with('changedPassword','Password Changed.');
    

}














    public function writer_dashboard()
    {
        if (Gate::allows('isWriter')) {
            $blog = Blog::where('user_id', Auth::id())
                ->get(['id', 'title', 'article', 'status', 'user_id', 'created_at', 'updated_at'])
                ->toarray();

            $page_title = 'Writer Dashboard';
            $page       = 'writer_dashboard';


            return view('layouts.backend.dashboard.writer_dashboard', compact('page_title', 'page', 'blog'));
        } else {
            abort(403);
        }
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
            $data    =   NULL;
            return view('layouts.backend.record.all_record', compact('page_title', 'page', 'records', 'data'));
        } else {
            abort(403);
        }
    }



    public function mcq()
    {
        if (Gate::allows('isPatient')) {
            $mcq    =   Sick::all()->toArray();
            $question = History::all()->toArray();
            $history = History::join('history_options', 'history_options.history_id', 'histories.id')
                ->join('options', 'options.id', 'history_options.option_id')
                ->get()
                ->toArray();


            $page_title = 'Medical History';
            $page       = 'history';
            return view('layouts.backend.pages.medical_form', compact('page_title', 'page', 'mcq', 'history', 'question'));
        } else {
            abort(403);
        }
    }



    public function submit_mcq(Request $request)
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
            // return $request->mcq;
            DB::table('sick_user')

                ->where('user_id', Auth::id())
                ->delete();
            if (is_array($request->mcq)) {
                foreach ($request->mcq as $v) {
                    DB::table('sick_user')->Insert(['user_id' => Auth::id(), 'sick_id' => $v]);
                }
                
            }
        }


        return back()->with('history','Data submitted successfully.');
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
                return view('layouts.backend.diet.create_diet', compact('page_title', 'page', 'rows','req'));
            }
        } else {
            abort(403);
        }
    }


    public function payment()
    {

        if (Gate::any(['isAdmin', 'isModerator'])) {

            $page_title = 'Payment';
            $page       = 'payment';
            return view('layouts.backend.dashboard', compact('page_title', 'page'));
        } else {
            abort(403);
        }
    }

    public function appointments_serials()
    {
        if (Gate::any(['isAdmin', 'isModerator'])) {
            $pending = User::join('transactions', 'transactions.user_id', 'users.id')
                ->join('appointments', 'appointments.transaction_id', 'transactions.id')
                ->orderby('transactions.id', "DESC")
                ->get()
                ->toArray();


            $page_title = 'Create Appointments';
            $page       = 'appointments_serials';
            return view('layouts.backend.record.appointment_and_serial', compact('page_title', 'page', 'pending'));
        } else {
            abort(403);
        }
    }


    public function write_a_blog()
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            $categories = Category::all();
            // $tags = Tag::all();
            $page_title = 'Write A Blog';
            $page       = 'write_a_blog';
            return view('layouts.backend.blog.write', compact('page_title', 'page', 'categories'));
        } else {
            abort(403);
        }
    }


    public function appointment()
    {
        if (Gate::allows('isPatient')) {
            $chamber    = Chamber::select('id', 'name')->get();

            $page_title = 'Appointment';
            $page       = 'appointment';
            return view('layouts.backend.other.appointment', compact('page_title', 'page', 'chamber'));
        } else {
            abort(403);
        }
    }
}
