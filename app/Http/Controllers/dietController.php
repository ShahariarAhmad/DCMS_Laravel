<?php

namespace App\Http\Controllers;

use App\Http\Requests\request_diet;
use App\Models\Diet;
use App\Models\Diet_record;
use App\Models\Diet_request;
use App\Models\Pre_made_diet_chart;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class dietController extends Controller
{

    public function detachDiet($id){
        $diet_records = Diet_record::find($id);
        $user_id = $diet_records->user_id;
        $transaction_id = $diet_records->transaction_id; 

        $diet_request = Diet_request::create( [ 'transaction_id'=> $transaction_id,
        'person_name'=> 'N\A',
        'age'=> 'N\A',
        'gender'=> 'N\A',
        'height'=> 'N\A',
        'weight'=> 'N\A',
        'q_one'=> 'N\A',
        'q_two'=> 'N\A',
        'q_three'=> 'N\A',
        'q_four'=> 'N\A',
        'q_five'=> 'N\A',
        'q_six'=> 'N\A',
        'send'=> 'n']);
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


            $person_name = $request->person_name;
            $age = $request->age;
            $gender = $request->gender;
            $height = $request->height;
            $weight = $request->weight;

            $user_id = Auth::id();
            $amount = $request->amount;
            $to =  $request->to;
            $from = $request->from;
            $method = $request->method;
            $user_id = $user_id;
            $trix = $request->trix;
            $question_i = $request->question_i;
            $question_ii = $request->question_ii;
            $question_iii = $request->question_iii;
            $question_iv = $request->question_iv;
            $question_v = $request->question_v;
            $question_vi = $request->question_vi;



            DB::transaction(function () use ($person_name, $age, $gender, $height, $weight, $amount, $to, $from, $method, $user_id, $trix, $question_i, $question_ii, $question_iii,  $question_iv, $question_v, $question_vi) {
                Transaction::create([
                    'amount' => $amount,
                    'sent_to' =>  $to,
                    'sent_from' => $from,
                    'payment_method' =>  $method,
                    'user_id' => $user_id,
                    'trix_id' => $trix,
                ]);

                $tid = DB::getPdo()->lastInsertId();

                Diet_request::create([

                    'person_name' => $person_name,
                    'age' => $age,
                    'gender' => $gender,
                    'height' => $height,
                    'weight' => $weight,
                    'transaction_id'  =>       $tid,
                    'q_one'           =>       $question_i,
                    'q_two'           =>       $question_ii,
                    'q_three'         =>       $question_iii,
                    'q_four'          =>       $question_iv,
                    'q_five'        =>        $question_v,
                    'q_six'          =>        $question_vi,
                ]);
            });


            // $request->session()->flash('request_diet', 'Your request is successfully registered');

            return back()->with('request_diet', 'Your request is successfully registered');
        } else {
            abort(403);
        }
    }






    function create_chart(Request $request ,$id,$trix)
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


    function trix_notFound($tid)
    {

        if (Gate::allows('isAdmin')) {
          
            $data = Transaction::find($tid);
            $data->payment_status = 'approved';
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


            return view('layouts.backend.diet.edit_diet', compact('page_title', 'page', 'diet', 'note','id'));
        } else {
            abort(403);
        }
    }






  


    function updateDiet(Request $req)
    {
        if (Gate::allows('isAdmin')) {


            $list = $req->all();
 
            $note = $req->note;

            unset($list['_token']);
            unset($list['id']);

      
            $count = sizeof($list['time']);




            if ($req->submit == "draftDiet") {
                $isDraft = 'yes';
                session()->flash('update_chart_post', 'Is saved as Draft');
            }




            if ($req->submit == "sendDiet") {
                $isDraft = 'no';
                session()->flash('update_chart_post', 'Diet sent successfully');
            }



            for ($i = 0; $i < $count; $i++) {

                $diet[$i] = [
                    'time' =>  $list['time'][$i],
                    'name' => $list['foodname'][$i],
                    'amount' => $list['foodamount'][$i],
                    'date' => $list['date'][$i]

                ];
            }
            $x = json_encode($diet);




            if ($req->submit == "draftDiet" || $req->submit == "sendDiet") {

                DB::table('diets')
                ->where('id', $req->id)
                ->update(['diet_chart' => $x, 'draft' => $isDraft, 'note' => $note]);

            }



            return redirect()->route('Dashboard_diet_drafts');
        } else {
            abort(403);
        }
    }



















    function create_chart_post(Request $req)
    {


        if (Gate::allows('isAdmin')) {

            $list = $req->all();
            $name = $req->name;
            $age = $req->age;
            $sex = $req->sex;
            $type = $req->type;
            $note = $req->note;

            unset($list['_token']);
            $count = sizeof($list['time']);




            if ($req->submit == "draftDiet") {
                $isDraft = 'yes';
                session()->flash('create_chart_post', 'Is saved as Draft');
            }




            if ($req->submit == "sendDiet") {
                $isDraft = 'no';
                session()->flash('create_chart_post', 'Diet sent successfully');
            }



            for ($i = 0; $i < $count; $i++) {

                $diet[$i] = [
                    'time' =>  $list['time'][$i],
                    'name' => $list['foodname'][$i],
                    'amount' => $list['foodamount'][$i],
                    'date' => $list['date'][$i]

                ];
            }
            $x = json_encode($diet);




            if ($req->submit == "draftDiet" || $req->submit == "sendDiet") {




                $r =  DB::select("SELECT * FROM diet_requests WHERE transaction_id = ?", [session()->get('create_diet_trix')]);

                if ($r) {
                    foreach ($r as $v) {
                        $person_name = $v->person_name;
                        $age = $v->age;
                        $gender = $v->gender;
                        $height = $v->height;
                        $weight = $v->weight;

                        $q_one = $v->q_one;
                        $q_two = $v->q_two;
                        $q_three = $v->q_three;
                        $q_four = $v->q_four;
                        $q_five = $v->q_five;
                        $q_six = $v->q_six;
                        $user_id = session()->get('create_diet_id');
                        $transaction_id = $v->transaction_id;
                    }
                }



                DB::transaction(function () use ($name, $type, $person_name, $age, $gender, $height, $weight, $x, $note, $q_one, $q_two, $q_three, $q_four, $q_five, $q_six, $user_id, $transaction_id, $isDraft) {

                    DB::insert(
                        "INSERT INTO diets ( name, type, diet_chart,draft, note, q_one, q_two, q_three, q_four, q_five, q_six, user_id, transaction_id , person_name,age,gender,height,weight) 
                                VALUES 
                                ( :name, :type, :diet_chart, :draft, :note, :q_one, :q_two, :q_three, :q_four, :q_five, :q_six, :user_id, :transaction_id, :person_name,:age,:gender,:height,:weight)",
                        ['name' => $name, 'type' => $type, 'diet_chart' => $x, 'draft' => $isDraft, 'note' => $note, 'q_one' => $q_one, 'q_two' => $q_two, 'q_three' => $q_three, 'q_four' => $q_four, 'q_five' => $q_five, 'q_six' => $q_six, 'user_id' => $user_id, 'transaction_id' => $transaction_id, 'person_name' => $person_name, 'age' => $age, 'gender' => $gender, 'height' => $height, 'weight' => $weight]
                    );

                    $dietId = DB::getPdo()->lastInsertId();

                    DB::insert(
                        "INSERT INTO diet_records (user_id, transaction_id, date_of_submission, diet_id)
                                VALUES 
                                (:user_id, :transaction_id,:date_of_submission, :diet_id)",
                        ['user_id' => $user_id, 'transaction_id' => $transaction_id, 'date_of_submission' => now(), 'diet_id' => $dietId]
                    );


                    DB::delete("DELETE FROM diet_requests WHERE transaction_id = :transaction_id", ['transaction_id' => $transaction_id]);
                });
                session()->forget('create_diet_id');
                session()->forget('create_diet_trix');
            }



    


            return redirect()->route('Dashboard_diet_requests');
        } else {
            abort(403);
        }
    }



    function sendPremade(Request $req)
    {

        if (Gate::allows('isAdmin')) {
           

            $sendto = explode(',', $req->sendto);
            $prediet_id = $req->prediet_id;
            $uid = $sendto[0];
            $trix = $sendto[1];




            $r =  DB::select("SELECT * FROM diet_requests WHERE transaction_id = :transaction_id", ['transaction_id' => $trix]);

            if ($r) {
                foreach ($r as $v) {
                    $person_name = $v->person_name;
                    $age = $v->age;
                    $gender = $v->gender;
                    $height = $v->height;
                    $weight = $v->weight;

                    $q_one = $v->q_one;
                    $q_two = $v->q_two;
                    $q_three = $v->q_three;
                    $q_four = $v->q_four;
                    $q_five = $v->q_five;
                    $q_six = $v->q_six;
                }
            }



            DB::transaction(function () use ($person_name, $age, $gender, $height, $weight, $q_one, $q_two, $q_three, $q_four, $q_five, $q_six, $prediet_id, $uid, $trix) {

                DB::insert(
                    "INSERT INTO attached_pre_made_diet_charts  (  
                        date_of_submission,  
                        user_id, 
                        created_at,  
                        updated_at, 
                        q_one,  
                        q_two, 
                        q_three, 
                        q_four, 
                        q_five, 
                        q_six,
                        transaction_id,
                        pre_made_diet_chart_id,
                        person_name,
                        age,
                        gender,
                        height,
                        weight
                    ) 
                     VALUES (
                        :date_of_submission, 
                        :user_id, 
                        :created_at, 
                        :updated_at, 
                        :q_one, 
                        :q_two, 
                        :q_three,
                        :q_four, 
                        :q_five, 
                        :q_six,
                        :transaction_id,
                        :pre_made_diet_chart_id,
                        :person_name,
                        :age,
                        :gender,
                        :height,
                        :weight
                        )",



                    [
                        "pre_made_diet_chart_id" => $prediet_id,
                        "user_id" => $uid,
                        "created_at" => now(),
                        "updated_at" => now(),
                        'date_of_submission' => now(),
                        'q_one' => $q_one,
                        'q_two' => $q_two,
                        'q_three' => $q_three,
                        'q_four' => $q_four,
                        'q_five' => $q_five,
                        'q_six' => $q_six,
                        'transaction_id' => $trix,
                        'person_name' => $person_name,
                        'age' => $age,
                        'gender' => $gender,
                        'height' => $height,
                        'weight' => $weight
                    ]
                );



                DB::delete("DELETE FROM diet_requests WHERE transaction_id = :transaction_id", ['transaction_id' => $trix]);
            });


            return back();
        } else {
            abort(403);
        }
    }
}
