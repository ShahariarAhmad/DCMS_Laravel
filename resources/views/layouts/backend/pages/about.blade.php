@extends('layouts.backend.layout',[$page_title])
@section('content')
<div class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert" class="col">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update your about Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('Dashboard_aboutUpdate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($about as $a)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile"> input Image <sup class="text-danger"><small>(jpeg,png images only)</small></sup> </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror form-control" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label> <br>
                                <input name="name" class="form-control p-2 @error('name') is-invalid @enderror" placeholder="{{ $a->name }}"> <br>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Qualifications</label> <br>
                                <input name="degree" placeholder="{{ $a->degree }}" class="form-control @error('degree') is-invalid @enderror "> <br>
                            </div>

                            <div class="col-sm-12">
                                <h4> message </h4>
                                <textarea name="description" class="form-control w-100 p-2  @error('description') border border-danger @enderror" rows="5" cols="30" placeholder="{{ $a->brife_description }}"></textarea><br />
                            </div>

                        </div>
                        @endforeach
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
