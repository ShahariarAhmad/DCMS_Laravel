@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
         
            <div class="container">
                <div class="row text">
                    @if (session()->has('create_chart_post'))
                    <div class="alert alert-success alert-dismissible">                   
                        {{ session()->get('create_chart_post') }}
                    </div>
                @endif




                    @foreach ($dietRequests as $x)
                        @if ($x->payment_status == 'approved')
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Payment recieve</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col">
                                                <h6>name : {{ $x->person_name }}</h6>
                                                <h6>Age : {{ $x->age }}</h6>
                                                <h6>height : {{ $x->height }}</h6>
                                                <h6>weight : {{ $x->weight }}</h6>
                                            </div>
                                            <div class="col">
                                                <h6>Transaction Id: {{ $x->trix_id }}</h6>
                                                <h6>Amount Sent: {{ $x->amount }}/=</h6>
                                                <h6>Sent From: {{ $x->sent_from }}</h6>
                                                <h6>Sent To: {{ $x->sent_to }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/dashboard/diet_requests/create_chart?id={{ $x->uid }}&trix={{ $x->pid }}"
                                            class="btn btn-primary">Create diet</a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        @endif








                        @if ($x->payment_status == 'pending')
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-danger"> Payment Unconfirmed</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col">
                                                <h6>name : {{ $x->person_name }}</h6>
                                                <h6>Age : {{ $x->age }}</h6>
                                                <h6>height : {{ $x->height }}</h6>
                                                <h6>weight : {{ $x->weight }}</h6>
                                            </div>
                                            <div class="col">
                                                <h6>Transaction Id: {{ $x->trix_id }}</h6>
                                                <h6>Amount Sent: {{ $x->amount }}/=</h6>
                                                <h6>Sent From: {{ $x->sent_from }}</h6>
                                                <h6>Sent To: {{ $x->sent_to }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a class="card-link btn btn-success "
                                            href="/dashboard/diet_requests/payment_confirmed?id={{ $x->pid }}">
                                            Recieved
                                        </a>
                                        <a class="card-link btn btn-danger"
                                            href="/dashboard/diet_requests/trix_notFound?id={{ $x->pid }}">
                                            Not Found
                                        </a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
