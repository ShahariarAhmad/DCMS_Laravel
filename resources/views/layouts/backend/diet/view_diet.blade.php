@extends('layouts.backend.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">




            <div class="row">

                <section class="col-12">




                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title text-center">Current Diet   ||   {{ $currentDiet[0]['type'] }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="card">


                                <div class="card-body">


                                    @if (is_array($currentDiet))
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Name</th>
                                                <th>Amount</th>

                                                <th>Days</th>
                                                <th>Note</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach (json_decode($currentDiet[0]['diet_chart']) as $value)
                                                <tr>
                                                    <td>
                                                        {{ $value->time }}</td>

                                                    <td class="p-0">
                                                        <table style="width: 100%">
                                                            @foreach (explode(',', $value->name) as $item)
                                                                <tr>
                                                                    <td>{{ $item }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </td>
                                                    <td class="p-0">
                                                        <table style="width: 100%">
                                                            @foreach (explode(',', $value->amount) as $item)
                                                                <tr>
                                                                    <td>{{ $item }}</td>
                                                                </tr>
                                                            @endforeach

                                                        </table>
                                                    </td>

                                                    <td>
                                                        {{ $value->date }}</td>

                                                    @if ($loop->iteration == 1)
                                                        <td class="border-0">{{ $currentDiet[0]['note'] }} </td>
                                                    @else
                                                        <td class="border-0"></td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        {{ $currentDiet }}
                                    @endif
                              
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <form action="#" method="post">
                                <p>Date : {{ $currentDiet[0]['date'] }}</p>
                            </form>
                        </div>

                    </div>




                </section>



            </div>

        </div>
    </section>
@endsection
