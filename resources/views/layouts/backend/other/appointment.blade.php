@extends('layouts.backend.layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row text-dark d-flex justify-content-center">
            <div class="col-md-6">
                <form action="{{route('appointment_store')}}" method="get">
                    @csrf
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Fill up the form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <table class="w-100">
                                <tbody>
                                    <tr class="row py-2">

                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Desired serial date
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input name="desired_date" class="form-control w-100" value="<?php echo now()->format("Y-m-d") ?>" type="date"  min="<?php echo now()->format("Y-m-d") ?>" max="<?php echo now()->addDays(6)->format("Y-m-d") ?>">
                                            @error('desired_date')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Select Chamber
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <select class="form-select form-control " name="cid" aria-label="Default select example">
                                                <option selected>Select </option>
                                                @foreach ($chamber as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach

                                            </select>
                                            @error('cid')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Payment Method
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <select name="method" class="form-control " aria-label="Default select example">
                                                <option selected> Select </option>
                                                <option name="method" value="bkash">BKash</option>
                                                <option name="method" value="nagad">Nagad</option>
                                                <option name="method" value="dbbl">DBBL</option>
                                            </select>
                                            @error('method')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Transaction Id
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input name="transaction" class="form-control w-100" placeholder="Don't make mistakes in here." type="text">
                                            @error('transaction')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                            
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Money send from
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input name="from" class="form-control w-100" placeholder="Enter the number you sent money from" type="text">
                                            @error('from')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                            
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Amount
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input name="amount" class="form-control w-100" placeholder="Enter amount of money sent" type="text">
                                            @error('amount')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                            
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pt-2">
                                            Money send to
                                        </td>
                                        <td class="col-1 pt-2 d-none d-sm-none d-md-block">
                                            :
                                        </td>
                                        <td class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input name="to" class="form-control w-100" placeholder="Enter the number you sent money from" type="text">
                                            @error('to')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                            @enderror
                                            
                                        </td>
                                    </tr>
                                    <tr class="row py-2">
                                        <td class="col-12 pt-2">
                                            <small>
                                                If you don't want to pay in advance then keep the last 3 fileds empty. But rember those who pay in advace will be ahead of you in number
                                            </small>
                                        </td>
                                   
                                    </tr>
                                    <tr class="row py-2">
                                        
                                            @if ((session()->has('status')))
                                            <div class="alert alert-success" role="alert">
                                                {{session()->get('status')}}
                                            </div>
                                            @endif
                                      
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Send</button>
                              
                            </div>
                            <!-- /.card-footer -->
                    
                    </div></form>
                    <!-- /.card -->

                    <!-- /.card-body -->
                    <!-- footer empty -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
