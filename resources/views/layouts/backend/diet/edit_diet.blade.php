@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">



                <div class="col-xl-8 col-ls-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Diet</h3>
                        </div>
                        <form action="{{ route('Dashboard_updateDiet') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Days</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diet as $x)
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <tr>
                                                <td>
                                                    <input type="text" name="time[]" class="form-control"
                                                        value="{{ $x['time'] }}">
                                                </td>
                                                <td>
                                                    <textarea type="text" name="foodname[]"
                                                        class="form-control">{{ $x['name'] }} </textarea>
                                                </td>
                                                <td>
                                                    <textarea type="text" name="foodamount[]"
                                                        class="form-control">{{ $x['amount'] }} </textarea>
                                                </td>
                                                <td>
                                                    <textarea type="text" name="date[]"
                                                        class="form-control">{{ $x['date'] }} </textarea>
                                                </td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                <textarea type="text" name="note"
                                                    class="form-control">{{ $note }} </textarea>
                                            </td>
                                        </tr>
                              
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="col-12" value="sendDiet" name="submit">
                                            </td>
                                            <td colspan="2">
                                                <input type="submit" class="col-12" value="draftDiet" name="submit">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
