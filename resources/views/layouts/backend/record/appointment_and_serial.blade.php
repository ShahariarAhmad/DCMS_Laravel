@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header  bg-dark mb-2">
                            <h3 class="card-title">Pre Made Diet Records
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-center my-2" id="example1">
                                <thead class="text-white bg-dark ">
                                    <tr>
                                        <td scope="col ">
                                            Serial No
                                        </td>
                                        <td scope="col">
                                            ID
                                        </td>
                                        <td scope="col">
                                            Sent To
                                        </td>
                                        <td scope="col">
                                            Sent From
                                        </td>
                                        <td scope="col">
                                            Name
                                        </td>
                                        <td scope="col">
                                            Type
                                        </td>
                                        <td scope="col">
                                            Payment
                                        </td>
                                        <td scope="col">
                                            Status
                                        </td>
                                        <td scope="col">
                                            Present
                                        </td>
                                        <td scope="col">
                                            Action
                                        </td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $p)
                                        <tr>
                                            <td class="text-dark">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['trix_id'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['sent_to'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['sent_to'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['f_name'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['payment_method'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['amount'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['payment_status'] }}
                                            </td>
                                            <td class="text-dark">
                                                {{ $p['present'] }}
                                            </td>
                                            <td class="text-dark">
                                                <div class="btn-group">
                                                    <button aria-expanded="false" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" type="button">
                                                        No action taken
                                                    </button>
                                                    <ul class="dropdown-menu ">
                                                        <li>
                                                        <a class="dropdown-item" href="{{route('withdrawn',$p['trix_id'])}}">
                                                                Withdraw
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/dashboard/create_serials/tid={{ $p['trix_id'] }}/action=approve">
                                                                Approve
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/dashboard/create_serials/tid={{ $p['trix_id'] }}/action=notFound">
                                                                Not Found
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider" />
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/dashboard/create_serials/tid={{ $p['transaction_id'] }}/action=present">
                                                                Patient Was Present
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/dashboard/create_serials/tid={{ $p['transaction_id'] }}/action=absent">
                                                                Patient Was Absent
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
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
