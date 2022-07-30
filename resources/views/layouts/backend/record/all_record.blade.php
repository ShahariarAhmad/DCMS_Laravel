@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header  bg-dark mb-2">
                            <h3 class="card-title">All record</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-center my-2" id="example1">
                                <thead>
                                    <tr>
                                        <th scope="col ">
                                            #
                                        </th>
                                        <th scope="col">
                                            Date
                                        </th>
                                        <th scope="col">
                                            Name
                                        </th>
                                        <th scope="col">
                                            Trix ID
                                        </th>
                                        <th scope="col">
                                            P.Method
                                        </th>
                                        <th scope="col">
                                            Sent From
                                        </th>
                                        <th scope="col">
                                            Amount
                                        </th>
                                        <th scope="col">
                                            Received In
                                        </th>

                                        <th scope="col">
                                            Reason
                                        </th>

                                        <th scope="col">
                                            Handel By
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        @foreach ($records as $x)
                                            <tr>
                                           
                                                <td class="text-dark">
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->trix_date }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->name }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->trix_id }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->payment_method }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->sent_from }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->amount }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->sent_to }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->cause }}
                                                </td>

                                                <td class="text-dark">
                                                    {{ $x->handler }}
                                                </td>
                                            </tr>
                                        @endforeach
                                

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/backend/js/datatable.js') }}"></script>
@endsection
