@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @foreach ($prediet as $x)
                    <form action="{{ route('Dashboard_sendPremade') }}" method="post">
                        @csrf

                        <input type="text" name="prediet_id" value="{{ $x->id }}" hidden>

                        <div class="card m-2" style="width: 600px">
                            <div class="card-header">
                                <div style="overflow: hidden;">
                                    <h3 class="card-title">Chart name : {{ $x->name }}<span> </span> Pre-made diet 1
                                    </h3>
                                </div>
                                <div>
                                    <h6> Age : {{ $x->age }}</h6>
                                    <h6> Gender :{{ $x->sex }}</h6>
                                    <h6> diet type : {{ $x->age }}</h6>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Send to</th>
                                            <th>attachment</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">

                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%;" name="sendto">
                                                        <option></option>
                                                        @foreach ($patients as $list)
                                                            <option value="{{ $list->uid }},{{ $list->tid }}">
                                                                {{ $list->uid }} &#9866; {{ $list->age }} &#9866;
                                                                {{ $list->sex }} &#9866; {{ $list->height }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-warning">Send</button>
                                                <a class=" btn  bg-warning"
                                                    href="{{route('preview_diet',$x->id)}}">
                                                    preview
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </form>
                @endforeach
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
