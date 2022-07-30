@extends('layouts.backend.layout',[$page_title])
@section('content')
    <div class="content">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Upadate your social links</h3>
                            </div>

                  
                                <div class="card-body">
                                    <form action="{{ route('Dashboard_social_links') }}" method="get">
                                        @csrf
                                        <div class="form-group">
                                            <label>Facebook link></label>
                                            <input placeholder="{{ $social[0]->f_link }}" type="text"
                                                class="form-control" name="fb">
                                        </div>
                                        <div class="form-group">
                                            <label>Linkedin link ></label>
                                            <input placeholder="{{ $social[0]->l_link }}" type="text"
                                                class="form-control" name="ln">
                                        </div>
                                        <div class="form-group">
                                            <label>Youtube link
                                                <link rel="import" href="component.html">
                                            </label>
                                            <input placeholder="{{ $social[0]->y_link }}" type="text"
                                                class="form-control" name="yt">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </form>
                                </div>
                                <!-- /.card-body -->

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
