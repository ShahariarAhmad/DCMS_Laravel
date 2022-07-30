@extends('layouts.backend.layout',[$page_title])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card p-0 m-0">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Map APi</h3>
                    </div>
                    <div class="card-header">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">update</button>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">where i give my services</h3>
                    </div>
                    <!-- /.card-header -->


                    <!-- Widget: user widget style 1 -->

                    <div class="card-body" style="display: block;">
                        <img src="dist/img/chamber1.jpg" alt="" style="height: 100%;
                                width: 100%;">
                    </div>

                    <div class="card-footer">





                        <div class="card-header bg-success">
                            <h3 class="card-title">Side image</h3>
                        </div>

                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile"> Update Image </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                            <!-- /.card-body -->


                        </form>




                        <!-- /.card-body -->

                    </div>

                    <!-- /.widget-user -->


                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
