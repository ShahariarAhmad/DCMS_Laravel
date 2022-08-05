@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6"  class="align-middle">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">create tags</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="form-group">
                                <form method="post" action="{{ route('Dashboard_categoriesRequest') }}">
                                    @csrf

                                    <input  type="text" name="category"  class="form-control" >
                                    @error('category')
                                    <small class="text-danger ps-3">{{$message}}</small>       
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                            <div class="tags card-footer" style="padding: 10px;">
                                <div style="padding: 10px;">
                                    All tags
                                </div>

                                @foreach ($categories as $x)
                                    <button type="button" class="btn btn-grey m-1 text-info">
                                        {{ $x['category'] }}
                                        <a href=" {{route('Dashboard_categoryDelete',$x['id'])}}" class="text-danger"> &nbsp;
                                            x</a>
                                    </button>
                                @endforeach

                            </div>
                        </div>


                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
