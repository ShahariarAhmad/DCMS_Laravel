@extends('layouts.backend.layout', [$page_title])
@section('content')
    <div class="content">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert" class="col">
                {{ session()->get('status') }}
            </div>
        @endif

    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Image Upload Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="row g-3 needs-validation border p-4" action="{{ route('Dashboard_galleryUpload') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card col-12">


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file">

                                        </div>

                                    </div>

                                    <div class="input-group">

                                        @error('file')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <!-- <label for="inputPassword3" class="col-form-label">Name of the image</label> -->
                                    <div class="col-12">
                                        <input type="text" name="rename" value="default" class="form-control"
                                            id="inputPassword3" placeholder="Name" hidden>
                                        @error('rename')
                                            <small class="text-danger ps-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                            <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card-header ">
                <div class="card-tittle " style="text-align: center;">All photos

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($gallery as $g)
            <div class="col-sm-3">
                <div class="card-body">
                    <img src="{{ asset('assets/frontend/images/gallery/' . $g->image_url) }}"
                        style="height: 100%;
                    width: 100%;">
                    <a href="{{route('Dashboard_galleryDelete',$g->id)}}" class="btn btn-block btn-danger">delete</a>
                </div>
            </div>
        @endforeach
    </div>

    </div>
    <!-- /.row -->
    </div>
@endsection
