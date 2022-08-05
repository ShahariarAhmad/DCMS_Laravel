@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        @if (session()->has('dettached'))
            <p class="alert alert-danger">
                {{ session()->get('dettached') }} 
            </p>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header  bg-dark mb-2">
                            <h3 class="card-title">Diet Records</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-center my-2" id="example1">
                                <thead class="text-white bg-dark ">


                                    <tr>
                                        <td scope="col ">
                                            #
                                        </td>
                                        <td scope="col">
                                            Date
                                        </td>
                                        <td scope="col">
                                            Name
                                        </td>
                                        <td scope="col">
                                            Trix ID
                                        </td>
                                        <td scope="col">
                                            P.Method
                                        </td>
                                        <td scope="col">
                                            Amount
                                        </td>
                                        <td scope="col">
                                            Sent From
                                        </td>
                                        <td scope="col">
                                            Received In
                                        </td>
                                        <td scope="col">
                                            Diet Type
                                        </td>
                                        <td scope="col">
                                            Action
                                        </td>
                                    </tr>
                                </thead>
                             
                                    <tbody>

                                        @foreach ($dietRecords as $x)
                                            <tr>
                                                <td class="pt-3">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->date_of_submission }}

                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->f_name . ' ' . $x->l_name }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->trix_id }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->payment_method }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->amount }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->sent_to }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->sent_from }}
                                                </td>
                                                <td class="pt-3">
                                                    {{ $x->type }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-dark"
                                                        href="{{route('Dashboard_detachDiet',$x->id)}}">
                                                        Detach Diet
                                                    </a>



                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                            </table>

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
