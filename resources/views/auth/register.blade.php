@extends('layouts.frontend.layout')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mt-4">
                                <label for="fname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control"
                                        name="fname" autocomplete="fname" autofocus>

                                    @error('fname')
                                    <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="lname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control"
                                        name="lname" autocomplete="lname" autofocus>

                                    @error('lname')
                                    <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control"
                                        name="email" autocomplete="email">

                                    @error('email')
                                    <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                        @error('password_confirmation')
                                        <small class="text-danger ps-3">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="cell_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('cell_number') }}</label>

                                <div class="col-md-6">
                                    <input id="cell_number" type="text"
                                        class="form-control" name="cell_number" autofocus>

                                    @error('cell_number')
                                    <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                                <div class="col-md-6">

                                    <select name="sex" class="form-control">
                                        <option> Select</option>

                                        <option value="male">male</option>
                                        <option value="male">female</option>

                                    </select>
                                    @error('sex')
                                        <small class="text-danger ps-3">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
