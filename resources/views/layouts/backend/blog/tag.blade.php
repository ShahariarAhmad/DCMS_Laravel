@extends('layouts.backend.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Tags
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('Dashboard_tagsRequest') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="Input" class="form-label">Create new tags</label>
                                <input type="text" name="tag" class="form-control" id="Input" required>
                                @error('tag')
                                <small class="text-danger ps-3">{{$message}}</small>       
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        All Tags
                    </div>
                    <div class="card-body">
                        @foreach ($tags as $x)
                            <button type="button" class="btn btn-grey m-1 text-info">
                                {{ $x['tag'] }}
                                <a href="/dashboard/tags/{{ $x['id'] }}" class="text-danger"> &nbsp; x</a>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
