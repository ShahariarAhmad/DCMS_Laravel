<?php

namespace App\Repositories;


use App\Interfaces\DietInterface;
use App\Models\Diet_request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DietRepository implements DietInterface
{

    public function store($req)
    {
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
    }

    public function destroy()
    {
    }

    public function update($req)
    {
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
    }

    public function premadeSearch($request)
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

  

 
    public function request_form($request)
    {
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
    }

  
    public function sendPremade($req)
    {
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
    }


    public function premadeRecords()
    {
        return      DB::table('transactions')
            ->join('users', 'transactions.user_id', 'users.id')
            ->join('attached_pre_made_diet_charts', 'transactions.id', 'attached_pre_made_diet_charts.transaction_id')
            ->join('pre_made_diet_charts', 'attached_pre_made_diet_charts.id', 'pre_made_diet_charts.id')
            ->select('*')
            ->get();
    }
    public function records()
    {
        return DB::table('transactions')
            ->join('users', 'transactions.user_id', 'users.id')
            ->join('diet_records', 'transactions.id', 'diet_records.transaction_id')
            ->join('diets', 'diets.id', 'diet_records.diet_id')
            ->orderBy('id', 'desc')
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
    }
}
