@extends('layouts.backend.layout',[$page_title])
@section('content')
    <div class="content">
        <div class="container-fluid ">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert" class="col">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="row ">

                @foreach ($chamber as $c)
                    <div class="col-md-4">
                        <form action="{{ route('Dashboard_chamberDetailsUpdate') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary ">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $c->name }}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: block;">
                                    <img src="{{ asset('/assets/frontend/images/chambers/'.$c->img_url) }}" style="height: 100%;
                                                width: 100%;">
                                </div>

                                <div class="card-footer">
                                    <div class="card-header bg-success">
                                        <h3 class="card-title">Chamber address</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile">input Image </label>
                                            <div class="input-group">
                                                <div>
                                                    <input type="file" name="file"  @error('file') is-invalid @enderror">
                                                    <label>Choose file</label>
                                                    @error('file')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>chmber name

                                            </label>
                                            <input type="text" name="name" value="{{ $c->name }}"
                                                class=" @error('name') border border-danger @enderror w-100 form-control">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input type="text" name="area" value="{{ $c->area }}"
                                                class=" @error('area') border border-danger @enderror w-100 form-control">
                                            @error('area')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>district

                                            </label>
                                            <input type="text" name="district" value="{{ $c->district }}"
                                                class=" @error('district') border border-danger @enderror w-100 form-control">
                                            @error('district')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>road no

                                            </label>
                                            <input type="text" name="road_number" value="{{ $c->road_number }}"
                                                class=" @error('road_number') border border-danger @enderror w-100 form-control">
                                            @error('road_number')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>House no

                                            </label>
                                            <input type="text" name="house_no" value="{{ $c->house_no }}"
                                                class=" @error('house_no') border border-danger @enderror w-100 form-control">
                                            @error('house_no')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>TIME</label>
                                            <input type="text" name="time" value="{{ $c->time }}"
                                                class=" @error('time') border border-danger @enderror w-100 form-control">
                                            @error('time')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>days </label>
                                            <input type="text" name="day" value="{{ $c->day }}"
                                                class=" @error('day') border border-danger @enderror w-100 form-control">
                                            @error('day')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <input type="text" value="{{ $c->id }}" name="id" hidden>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
