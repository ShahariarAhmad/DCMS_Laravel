<?php

namespace App\Http\Controllers;

use App\Http\Requests\add_account;
use App\Http\Requests\edit_profile;
use App\interfaces\EndInterface;
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

class EndController extends Controller
{

    protected  $interface;

    function __construct(EndInterface $data)
    {
        return $this->interface = $data;
    }

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

    // public function diet_records()
    // {
    //     if (Gate::allows('isAdmin')) {

    //         $dietRecords = DB::table('transactions')
    //             ->join('users', 'transactions.user_id', 'users.id')
    //             ->join('diet_records', 'transactions.id', 'diet_records.transaction_id')
    //             ->join('diets', 'diets.id', 'diet_records.diet_id')
    //             ->orderBy('id','desc')
    //             ->select(
    //                 'diets.id',
    //                 'users.f_name',
    //                 'users.l_name',
    //                 'transactions.trix_id',
    //                 'transactions.amount',
    //                 'transactions.sent_to',
    //                 'transactions.sent_from',
    //                 'transactions.payment_method',
    //                 'diets.type',
    //                 'transactions.created_at',
    //                 'diet_records.date_of_submission'
    //             )->get();


    //         $page_title = 'Diet Records';
    //         $page       = 'diet_records';
    //         return view('layouts.backend.record.diet_record', compact('page_title', 'page', 'dietRecords'));
    //     } else {
    //         abort(403);
    //     }
    // }







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


    // public function addAccount(add_account $request)
    public function addAccount(Request $request)
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



        // return $this->interface->addAccount($request);
    }


    public function admin_dashboard()
    {
        return $this->interface->admin_dashboard();
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
        return $this->interface->moderator_dashboard();

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
        return $this->interface->payment_history();
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
        return $this->interface->patitient_profile();
    }











    function changePass(edit_profile $request)
    {

        User::whereId(Auth::id())
            ->update(['password' => Hash::make($request->password)]);

        return back()->with('changedPassword', 'Password Changed.');
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

        return $this->interface->submit_mcq($request);
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
