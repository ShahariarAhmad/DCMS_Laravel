@extends('layouts.backend.layout',[$page_title])
@section('content')
    <div class="content">
        <div class="container-fluid">





            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Personal information</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @foreach ($user as $d)
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Name
                                            </td>
                                            <td class="px-4">
                                                :
                                            </td>
                                            <td>
                                                {{ $d['f_name'] }} {{ $d['l_name'] }}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                Phone number
                                            </td>
                                            <td class="px-4">
                                                :
                                            </td>
                                            <td>
                                                {{ $d['cell_number'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gender
                                            </td>
                                            <td class="px-4">
                                                :
                                            </td>
                                            <td>
                                                {{ $d['sex'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row d-flex justify-content-center">


                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Medical history</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @foreach ($qa as $x)
                                <dl>
                                    <dt>
                                        {{ $x['question'] }}
                                    </dt>

                                    <dd>
                                        - {{ $x['list'] }}
                                    </dd>
                                </dl>
                            @endforeach

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row d-flex justify-content-center">


                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sickness</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <dl>

                                @foreach ($sick as $x)
                                    <dd>
                                        - {{ $x->name }}
                                    </dd>
                                @endforeach
                            </dl>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row d-flex justify-content-center">


                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Change password</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session()->has('changedPassword'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('changedPassword') }}
                                </div>
                            @endif

                            @if (session()->has('notchangedPassword'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('notchangedPassword') }}
                                </div>
                            @endif
                           
                                <div class="card-body">
                                    <form action="{{ route('Dashboard_changePass') }}" method="post">
                                        @csrf
                                        <table>
                                            <tbody>
                                           
                                                <tr>
                                                    <td>

                                                        <label for="newpass">New Password</label> <br>

                                                        <input type="password" name="password" class="form-control">
                                                        @error('password')
                                                            <small class="text-danger ps-3 ">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <label for="renewpass">Confirmation  New Password</label> <br>
                                                        <input type="password" name="password_confirmation" class="form-control">
                                                        @error('password_confirmation')
                                                            <small class="text-danger ps-3">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <br>
                                                        <input type="submit" value="Change Password"
                                                            class="btn btn-primary w-100">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row d-flex justify-content-center">


                    <div class="col-md-12">

                        <div class="card-footer">
                            <a href="{{ route('logout') }}" class="btn btn-primary">Log out</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection
