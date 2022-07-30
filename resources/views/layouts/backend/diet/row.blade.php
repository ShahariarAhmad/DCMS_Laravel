@extends('layouts.backend.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 ">
                    @if (session()->has('premade_chart_post'))
                
                    <div class="row alert-success" role="alert">
                        {{session()->get('premade_chart_post')}}
                    </div>
                    @endif
                    <div class="row m-5 p-5">
                    
                        <div class="card text-white bg-dark">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                
                                <form action="{{route('Dashboard_quickformWithRequest')}}" method="get" >
                                    @csrf
                                    <div>
                                        <label for="rows">Number of rows required</label>
                                        <input type="number" name="rows" class="form-control" id="rows" class="w-100" required>
                                        
                                    </div>
                
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                
                    </div>
                </div>
          </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
