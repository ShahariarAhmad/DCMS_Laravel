@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Blog</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body m-0 p-0">
                            <div class="card ">
                                <div class="card-header bg-danger">
                                    <div class="card-tittle ">Draft</div>
                                </div>
                                @foreach ($blog as $b)
                                    @if ($b->status == 'draft')
                                        <div class="card-body ">
                                            <h2>{{ $b->title }}</h2>
                                            <p>{{ Str::limit($b->article, 250) }} </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('Dashboard_editBlogPost', $b->id) }}"
                                                class="btn btn-warning">Edit</a>
                                        </div>
                                    @elseif($loop->iteration > 2)
                                        <p class="px-3 py-2 pt-4">There is no draft article.</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card mb-0">
                                <div class="card-header bg-warning">
                                    <div class="card-tittle">PENDING</div>
                                </div>

                                @foreach ($blog as $b)
                                    @if ($b->status == 'pending')
                                        <div class="card-body ">
                                            <h2>{{ $b->title }}</h2>
                                            <p>{{ Str::limit($b->article, 250) }} </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('Dashboard_editBlogPost', $b->id) }}"
                                                class="btn btn-warning">Edit</a>
                                        </div>
                                    @elseif($loop->iteration <= 1)
                                        <p class="px-3 py-2 pt-4">There is no article that
                                            require approval.</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header bg-success">
                            <h3 class="card-title">feedback</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body m-0 p-0">
                            <div class="card">
                                @foreach ($inbox as $l)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="feedback-info col-6" style="border-bottom: 2px solid black;">
                                                <h3>User-info</h3>
                                                <p class="mb-0">
                                                    name: {{ $l->name }}
                                                </p>
                                                <p class="mb-0">
                                                    Age: {{ $l->age }}
                                                </p>
                                                <p class="mb-0">
                                                    Occupation: {{ $l->occupation }}
                                                </p>
                                                <p class="mb-0">
                                                    Gender: {{ $l->gender }}
                                                </p>
                                                <br>
                                                <a type="submit" class="btn btn-primary">delete</a>
                                            </div>
                                            <div class="feedback-message col-6">
                                                <h3>Message:</h3>
                                                <p>{{ $l->message }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div> --}}
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary collapsed-card">
                    <div class="card-header bg-success">
                        <h3 class="card-title">Appointments</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-0 p-0">

                                    <div class="card-body table-responsive p-0 m-0">
                                    
                                        @foreach ($chamber as $c)
                                            <table class="table table-hover text-nowrap">
                                                <thead class="bg-primary">
                                                    <tr class="p-3">
                                                        {{ $c->name }}
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>serial</th>
                                                        <th>Name</th>
                                                        <th>UID</th>
                                                        <th>payment status</th>
                                                    </tr>

                                                    @foreach ($appointments as $a)
                                                 
                                                        @if ($a->chamber_id == $c->id)
                                                        <h1>sdfsdf</h1>
                                                            <tr>
                                                                <th>
                                                                    {{ $a->desired_serial_date }}
                                                                </th>
                                                                <td>
                                                                    {{ $a->given_serial_no }}

                                                                </td>
                                                                <td>
                                                                    {{ $a->f_name }}
                                                                </td>
                                                                <td>
                                                                    {{ $a->user_id }}
                                                                </td>
                                                                <td>
                                                                    {{ $a->payment_status }}
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary collapsed-card">
                    <div class="card-header bg-success">
                        <h3 class="card-title">pending payments</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-0 p-0">

                                    <div class="card shadow col-xs-12 col-sm-12 col-md-12 p-0">
                                        <div class="card-header bg-danger text-white">
                                            <span class="w-25">
                                                All Pending Payments
                                            </span>
                            
                                        </div>
                                        <div>
                                            <table class="table">
                                                <tbody>
                                                    <tr class="btn-outline-danger">
                                                        <td colspan="4">
                                                            Payments (All) || @php echo 'Total : ' . count($transaction) @endphp
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            TrxID
                                                        </th>
                                                        <td>
                                                            Name
                                                        </td>
                                                        <td>
                                                            Amount
                                                        </td>
                                                        <td>
                                                            Send From
                                                        </td>
                                                    </tr>
                                                    @foreach ($transaction as $t)
                                                        <tr>
                                                            <th>
                                                                {{ $t->trix_id }}
                                                            </th>
                                                            <td>
                                                                {{ $t->f_name }}
                                                            </td>
                                                            <td>
                                                                {{ $t->amount }}
                                                            </td>
                                                            <td>
                                                                {{ $t->sent_from }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                   
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
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
