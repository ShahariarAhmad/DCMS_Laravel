@extends('layouts.frontend.layout')
@section('content')
    <section class="container">

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6 card">
                    <div class="card-header m-0">Login</div>
                    <div class=" p-4 p-md-5 card-body">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Have an account?</h3>
                        <form action="#" class="login-form">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Username">
                                    @error('email')
                                    <small class="text-danger ps-3">{{$message}}</small>

                                    @enderror
                                    
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password">

                                    @error('password')
                                    <small class="text-danger ps-3">{{$message}}</small>

                                    @enderror
                            </div>
                            <br>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="text-grey" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 
                                <br>
                                <button type="submit" class="btn btn-primary rounded submit mt-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </form>

    </section>
@endsection