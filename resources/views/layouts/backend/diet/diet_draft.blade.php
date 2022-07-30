@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    @if (session()->has('update_chart_post'))
                        <div class="row alert-success" role="alert">
                            {{ session()->get('update_chart_post') }}
                        </div>
                    @endif
                    <div class="row ">
                        <div class="card col-6">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Made for</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diet as $list)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $list->name }}</td>
                                                <td>
                                                    <a class="btn btn-outline-secondary"
                                                        href="/dashboard/edit_diet/{{ $list->id }}"> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
