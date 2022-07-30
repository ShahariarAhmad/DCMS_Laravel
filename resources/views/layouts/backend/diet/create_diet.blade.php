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
                        <form action="{{ route('Dashboard_create_chart_post') }}" method="post">
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
                                        @foreach ($rows as $r)
                                            <tr>
                                                <td>
                                                    <input type="text" name="time[]" class="form-control"
                                                        placeholder="Eg. 8:00 pm">
                                                </td>
                                                <td>
                                                    <input type="text" name="foodname[]" class="form-control"
                                                        placeholder="Eg. Rice, Vegetable">
                                                </td>
                                                <td>
                                                    <input type="text" name="foodamount[]" class="form-control"
                                                        placeholder="Eg. 1 bowl, 2 cup">
                                                </td>
                                                <td>
                                                    <input type="text" name="date[]" class="form-control"
                                                        placeholder="Eg, Friday , Everyday...">
                                                </td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                <textarea type="text" name="note"
                                                    class="form-control">Type Your Note here... </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diet Chart Name: </td>
                                            <td><input type="text" name="name" class="form-control"
                                                    placeholder="Eg. Keto Diet, SR.102"></td>
                                            <td>Diet Type: </td>
                                            <td><input type="text" name="type" class="form-control"
                                                    placeholder="Eg. Keto, Fasting"></td>

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
                @if ($req != null)
                    @foreach ($req as $x)
                        <div class="col-lg-12 col-xl-4">


                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-bullhorn"></i>
                                        Information related to the the request
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="callout callout-danger">
                                        <h5>Name: {{ $x->person_name }}</h5>
                                        <h5>Height: {{ $x->height }} inch</h5>
                                        <h5>Age: {{ $x->age }}</h5>
                                        <h5>Weight: {{ $x->weight }}</h5>
                                        <h5>Sex: {{ $x->gender }}</h5>
                                    </div>
                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> What do you eat in brakfast,lunch and dinner ? </p>
                                        <p>{{ $x->q_one }}</p>
                                    </div>


                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> Can you afford to have expensive friuts and
                                            vegetables
                                            in
                                            your diet ? </p>
                                        <p>{{ $x->q_two }}</p>
                                    </div>

                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> Worried of your eating habits ? If yes, Than
                                            explain
                                            why
                                            so. </p>
                                        <p>{{ $x->q_three }}</p>
                                    </div>

                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> Are you on Medication right now ? If yes, Then
                                            write
                                            down
                                            those medecine name and with taking schuldule. </p>
                                        <p>{{ $x->q_four }}</p>
                                    </div>

                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> Do you have any pysical disabilities ? </p>
                                        <p>{{ $x->q_five }}</p>
                                    </div>
                                    <div class="callout callout-info">
                                        <p class=" text font-monospace"> Why you fail in following you diet plan again and
                                            again
                                            ? (
                                            Be Honest ) </p>
                                        <p>{{ $x->q_six }}</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
