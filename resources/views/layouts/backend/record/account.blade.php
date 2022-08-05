@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        @if (session()->has('addAccount'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('addAccount') }}
            </div>
        @endif


        @if (session()->has('deleteAccount'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('deleteAccount') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-4">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="example2">

                                <thead class="text-white bg-dark ">
                                    <tr>

                                        <td scope="col">
                                            ID
                                            </th>
                                        <td scope="col">
                                            Account type
                                            </th>

                                        <td scope="col">
                                            Name
                                            </th>

                                        <td scope="col">
                                            status
                                            </th>

                                        <td scope="col">
                                            Action
                                            </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($account != null)
                                        @foreach ($account as $a)
                                            <tr>
                                                <td class="text-dark">{{ $a->uid }}</td>
                                                <td class="text-dark">{{ $a->f_name }} {{ $a->l_name }}</td>
                                                <td class="text-dark">{{ $a->name }}</td>
                                                <td class="text-dark">{{ $a->account_status }}</th>
                                                <td class="text-dark py-0">
                                                    <span class="row px-1">
                                                        @if ($a->role_id !== 1)
                                                            <a href="{{route('Dashboard_deleteAccount',$a->uid)}}"
                                                                class="py-2 px-3 btn-danger ml-auto">Delete</a>
                                                        @else
                                                            <a class="py-2 px-3 btn-dark ml-auto">Delete</a>
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    @if ($searchRecords != null)
                                        @foreach ($searchRecords as $a)
                                            <tr>
                                                <td class="text-dark"> {{ $loop->iteration }} </th>
                                                <td class="text-dark">{{ $a->uid }}</td>
                                                <td class="text-dark">{{ $a->f_name }} {{ $a->l_name }}</td>
                                                <td class="text-dark">{{ $a->name }}</td>
                                                <td class="text-dark">{{ $a->account_status }}</th>
                                                <td class="text-dark py-0">
                                                    <span class="row px-1">
                                                        @if ($a->role_id !== 1)
                                                            <a href="{{route('Dashboard_deleteAccount',$a->uid)}}"
                                                                class="py-2 px-3 btn-danger ml-auto">Delete</a>
                                                        @else
                                                            <a class="py-2 px-3 btn-dark ml-auto">Delete</a>
                                                        @endif

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <div class="card card-primary m-0">
                            <div class="card-header">
                                <h3 class="card-title">Add Account</h3>
                            </div>

                            <form action="{{ route('Dashboard_addAccount') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First name</label>
                                        <input type="text" name="fname" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                            @error('fname')
                                            <small class="text-danger ps-3">
                                                This field is required.
                                            </small>       
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name </label>
                                        <input type="text" class="form-control" name="lname" placeholder="Enter email">
                                        @error('lname')
                                        <small class="text-danger ps-3">
                                            This field is required.
                                        </small>       
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                                        @error('email')
                                        <small class="text-danger ps-3">{{$message}}</small>       
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text " class="form-control" value="Default Password is dcms1234"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Phone muner" name="number">
                                        @error('number')
                                        <small class="text-danger ps-3">
                                            {{$message}}
                                        </small>       
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;">

                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Acoount type</label>
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                                          

                                            <option value="moderator">moderator</option>
                                            <option value="writer">writer</option>
                                        </select>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </div>

                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>



                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
