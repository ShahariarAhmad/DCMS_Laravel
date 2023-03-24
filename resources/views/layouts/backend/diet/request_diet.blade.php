@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row text-dark  d-flex justify-content-center">
                <div class="col-md-6">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fill up the form</h3>
                        </div>
                        <!-- /.card-header -->
                        @if (session()->has('request_diet'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('request_diet') }}
                            </div>
                        @endif
                        @if (session()->has('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session()->get('warning') }}
                        </div>
                    @endif

                        
                        <!-- form start -->
                        <form action="{{route('Dashboard_request_diet_form')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row text-end">
                                    <label for="question" class="col-sm-2 col-form-label">Name</label>
                                    <input name="person_name" type="text"   class="form-control col-sm-10 @error('person_name')is-invalid @enderror" >
                        
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-2 col-form-label">Age</label>
                                    <input type="text" class="form-control col-sm-10 @error('age')is-invalid @enderror"  name="age" type="text">
                                </div>

                                <div class="form-group row">
                                    <label for="question" class="col-sm-2 col-form-label">Gender</label>
                                    <select name="gender" class="form-control @error('gender')is-invalid @enderror col-sm-10">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-2 col-form-label">Height</label>
                                    <input class="form-control col-sm-10 @error('height')is-invalid @enderror"  name="height" type="text">
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-2 col-form-label">Weight</label>
                                    <input type="text" class="form-control col-sm-10 @error('weight') is-invalid @enderror"  name="weight" type="text">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Transaction method</label>
                                    <select class="form-control select2 select2-hidden-accessible form-control col-sm-8 @error('method')is-invalid @enderror"
                                        style="width: 100%;" name="method">
                                        <option> @error('method'){{$message}} @enderror </option>
                                        <option name="method" value="bkash">BKash</option>
                                        <option name="method" value="nagad">Nagad</option>
                                        <option name="method" value="dbbl">DBBL</option>

                                    </select>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-3 col-form-label">Transaction id</label>
                                    <input name="trix" type="text"   class="form-control col-sm-9 @error('trix')is-invalid @enderror">
                                </div>


                                <div class="form-group row">
                                    <label for="question" class="col-sm-2 col-form-label">amount</label>
                                    <input type="text" class="form-control col-sm-10 @error('amount')is-invalid @enderror"  name="amount" type="text">
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-4 col-form-label">Money sends from</label>
                                    <input type="text" class="form-control col-sm-8 @error('from')is-invalid @enderror"  name="from" type="tel">
                                </div>
                                <div class="form-group row">
                                    <label for="question" class="col-sm-4 col-form-label">Money sends to</label>
                                    <input type="text" class="form-control col-sm-8 @error('to')is-invalid @enderror"   name="to" type="tel">
                                </div>
                                <div class="form-group">
                                    <label for="question">what do you eat in breakfast,lunch and dinner?</label>
                                    <textarea class="w-100 is-invalid @error('question_i') border border-danger @enderror " name="question_i" > </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="question">Can you afford to buy expensive fruits and vegetables in your
                                        diet?</label>
                                        <textarea class="w-100 @error('question_ii')border border-danger @enderror" name="question_ii" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="question">Woried of your eating habits? if yes, then explain why so</label>
                                    <textarea class="w-100 @error('question_iii') border border-danger @enderror" name="question_iii" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="question">Do you have physical disabilities?</label>
                                    <textarea class="w-100 @error('question_v') border border-danger @enderror" name="question_v" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="question">Are you on medication right now? If yes, Then write down those
                                        medicine name and with taking schudule </label>
                                        <textarea class="w-100 @error('question_iv') border border-danger @enderror" name="question_iv" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="question">Why you fail in following your diet plan again and again? (be
                                        honest)</label>
                                        <textarea class="w-100 @error('question_vi') border border-danger @enderror" name="question_vi" ></textarea>
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Send</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- /.card-body -->
                    <!-- footer empty -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
