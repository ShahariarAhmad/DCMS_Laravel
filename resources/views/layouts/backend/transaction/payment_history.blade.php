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
                                        #
                                    </td>
                                    <td scope="col">
                                        Name
                                    </td>
                                    <td scope="col">
                                        Trix ID
                                    </td>
                                    <td scope="col">
                                        Date
                                    </td>
                                    <td scope="col">
                                        Amout
                                    </td>
                                    <td scope="col">
                                        Payment Method
                                    </td>
                                    <td scope="col">
                                        Payment Stats
                                    </td>
                                    <td scope="col">
                                        Cause
                                    </td>
                                    <td scope="col">
                                        Handled By
                                    </td>
                                    <!-- Total paid for admin -->
                                </tr>
                            </thead>
                            <tbody>
            
                                @foreach ($history as $h)
                                <tr>
                                    <td class="text-dark">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->name }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->trix_id }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->name }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->amount }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->payment_method }}
                                    </td>
            
                                    @if ($h->payment_status === 'approved')
                                    <td class="text-dark">
                                        <span class="badge bg-success p-2">
                                            confirmed
                                        </span>
                                    </td>
                                    @elseif ($h->payment_status === 'pending')
                                    <td class="text-dark">
                                        <span class="badge bg-warning p-2">
                                            pending
                                        </span>
                                    </td>
                                    @elseif ($h->payment_status === 'not_found')
                                    <td class="text-dark">
                                        <span class="badge bg-danger p-2">
                                            Not Found
                                        </span>
                                    </td>
                                    @elseif ($h->payment_status === 'withdrawn')
                                    <td class="text-dark">
                                        <span class="badge bg-dark p-2">
                                            withdrawn
                                        </span>
                                    </td>
                                    @endif
            
                                    <td class="text-dark">
                                        {{ $h->cause }}
                                    </td>
                                    <td class="text-dark">
                                        {{ $h->handler }}
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
