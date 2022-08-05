@extends('layouts.backend.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card p-0 shadow">
                <div class="card-header">
                    Draft
                </div>
                <div class="row card-body">
                    @php
                    $e= 0;
                    @endphp
                    @foreach ($blog as $x )
                    @if ($x['status'] == 'draft')
                    @php

                    $e++;
                    @endphp

                    <div class="card text-white bg-primary col-md-12 col-lg-12 col-xl-4" style="border: 5px solid white;">
                        <div class="card-header">
                            June 09, 2020
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $x['title'] }}
                            </h5>
                            <p class="card-text">
                                {{Str::limit($x['article'],100)}}
                            </p>
                            <a class="btn btn-dark float-right" href="{{route('Dashboard_editBlogPost',$x['id'])}}">
                                Edit
                            </a>
                        </div>
                    </div>

                    @endif

                    @endforeach



                </div>
            </div>


            <div class="card p-0 shadow">
                <div class="card-header">
                    Articles thats is awating for admin approval
                </div>
                <div class="row card-body">
                    @php
                    $c= 0;

                    @endphp
                    @foreach ($blog as $x )
                    @if ($x['status'] == 'pending')
                    <div class="card text-white bg-primary col-md-12 col-lg-12 col-xl-4" style="border: 5px solid white;">

                        @php

                        $c++;
                        @endphp

                        <div class="card-header">
                            June 09, sss{{ $loop->count }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $x['title'] }}
                            </h5>
                            <p class="card-text">
                                {{Str::limit($x['article'],100)}}
                            </p>
                            <a class="btn btn-dark float-right" href="{{route('Dashboard_editBlogPost',$x['id'])}}">
                                Edit
                            </a>
                        </div>
                    </div>

                    @endif

                    @endforeach

                </div>
            </div>
            <div class="card p-0 shadow">
                <div class="card-header">
                    Blogs you have written
                </div>
                <div class="row card-body">
                    @php
                    $d= 0;

                    @endphp
                    @foreach ($blog as $x )
                    @if ($x['status'] == 'approved')
                    @php

                    $d++;
                    @endphp

                    <div class="card text-white bg-primary col-md-12 col-lg-12 col-xl-4" style="border: 5px solid white;">


                        <div class="card-header">
                            June 09, 2020
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $x['title'] }}
                            </h5>
                            <p class="card-text">
                                {{Str::limit($x['article'],100)}}
                            </p>
                            <a class="btn btn-dark float-right" href="{{route('Dashboard_editBlogPost',$x['id'])}}">
                                Edit
                            </a>
                        </div>
                    </div>

                    @endif

                    @endforeach


                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 shadow position-sticky">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 pt-3 d-flex justify-content-center d-none d-lg-block">

                            <img class="img-thumbnail w-50 mx-auto" src="https://images.pexels.com/photos/273935/pexels-photo-273935.jpeg?cs=srgb&dl=pexels-pixabay-273935.jpg&fm=jpg">
                           

                        </div>
                        <div class="col-12 text-center d-none d-md-block">
                            <h1 class="m-0">
                                Shahariar Ahmad
                            </h1>
                            <p>
                                Writer
                            </p>
                            <hr>
                         
                        </div>
                        <div class="col-12 text-white">
                            <p class="p-3 bg-primary">

                                Number of blog wating for approval: @php
                                echo $c;
                                @endphp
                            </p>
                            <p class="p-3 bg-primary">
                                Total Blogs Written : @php
                                echo $d;
                                @endphp
                            </p>
                            <p class="p-3 bg-primary">
                                In drafts : @php
                                echo $e;
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection
