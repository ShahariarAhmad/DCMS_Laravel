@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert" class="col">
                    {{ session()->get('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12 ">
                    <div class="card">


                        <div class="card-header bg-primary">
                            <div class="card-tittle">All blogs</div>
                        </div>
                        @foreach ($blog as $article)
                            <div class="card-body">
                                <a type="button" class="btn btn-light float-right text-danger"
                                    href="/dashboard/blog/delete={{ $article->id }}"> Delete</a>
                                <!-- @if (Auth::user()->role_id == 1)
    @if ($article->feautured == 'y')
    <a type="button" class="btn btn-light float-right text-dark"
                                                    href="/dashboard/blog/detach={{ $article->id }}"> Detach</a>
@else
    <a type="button" class="btn btn-light float-right text-success"
                                                    href="/dashboard/blog/attach={{ $article->id }}"> Attach</a>
    @endif
    @endif -->

                                <a type="button" class="btn btn-light float-right text-info"
                                    href="/dashboard/blog/edit={{ $article->id }}"> Edit</a>
                                <br>
                                <p class="card-title"> <b> {{ $article->title }} </b></p>
                                <p class="card-text">{{ Str::limit(strip_tags($article->article), 250) }}</p>
                                <p class="card-text"><small
                                        class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>

                            </div>
                        @endforeach
                        <!-- /.card -->
                    </div>
                </div>
                <!--
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hand pick logs</h3>
                                </div>
                  
                                <div class="card-body">
                                    <ol class="list-group list-group-numbered">

                                        @foreach ($blog as $article)
    @if ($article->feautured == 'y')
    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        {{ $article->title }}
                                                    </div>
                                                    <a type="button" class="btn btn-light float-right text-danger p-1 m-0"
                                                        href="/dashboard/blog/detach={{ $article->id }}"> X</a>
                                                </li>
    @endif
    @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div> -->
            </div>
        </div>
    </div>
@endsection
