@extends('layouts.backend.layout',[$page_title])
@section('content')
<div class="content">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Form</h3>
                        </div>
                        <div class="row g-0">
                            <div class="card-body">
                                <form action="{{ route('Dashboard_updateEvent') }}" method="post" enctype="multipart/form-data" class="p-4">
                                    @csrf
                                    @foreach ($editEvents as $e)
                                    <img src="{{asset('/assets/frontend/images/chambers/'.$e->img_url)}}" alt="" class="w-100 img-responsive">
                                    <input type="hidden" name="id" value="{{$e->id}}">
                                    {{-- <input type="hidden" name="img_link[]" value="{{$e->img_url}}"> --}}
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control mt-2 @error('name')  is-invalid @enderror" value="{{$e->name}}">
                                    <br>

                                    <label>House No</label>
                                    <input type="text" name="house_no" class="form-control mt-2 @error('house_no')  is-invalid @enderror" value="{{$e->house_no}}">
                                    <br>

                                    <label>Road Number</label>
                                    <input type="text" name="road_number" class="form-control mt-2 @error('road_number')  is-invalid @enderror" value="{{$e->road_number}}">
                                    <br>

                                    <label>Area</label>
                                    <input type="text" name="area" class="form-control mt-2 @error('area')  is-invalid @enderror" value="{{$e->area}}">
                                    <br>

                                    <label>District</label>
                                    <input type="text" name="district" class="form-control mt-2 @error('district')  is-invalid @enderror" value="{{$e->district}}">
                                    <br>

                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control mt-2 @error('date')  is-invalid @enderror" value="{{$e->date}}">
                                    <br>

                                    <label>Time</label>
                                    <input type="text" name="time" class="form-control mt-2 @error('time')  is-invalid @enderror" value="{{$e->time}}">
                                    <br>

                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control mt-2 @error('description')  is-invalid @enderror" value="{{$e->description}}">
                                    <br>

                                    <div class="input-group">
                                        <div>
                                         <label>Choose file</label>
                                            <input type="file" name="file" class="@error('file') is-invalid @enderror">
                                           
                                            @error('file')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @endforeach
                                    <br>
                                    <br>
                                    <input type="submit" class="btn btn-success float-right" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="card p-0 shadow w-100">
                        <div class="card-header">
                            All Events
                        </div>
                        @foreach ($events as $event)
                        <div class="card">
                            <div class="ms-2 me-auto">
                                <img src="{{asset('images/events/'.$event->img_url)}}" alt="" class="w-100 img-responsive">
                                <div class="card-body">
                                    {{ $event->name }} <br> <br>
                                    {{ Str::limit($event->description, 75) }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-light float-right text-danger p-1 m-0" href="/dashboard/event/delete={{ $event->id }}"> Delete</a>
                                <a type="button" class="btn btn-light float-right text-info p-1 m-0" href="/dashboard/event/edit={{ $event->id }}"> Edit </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection