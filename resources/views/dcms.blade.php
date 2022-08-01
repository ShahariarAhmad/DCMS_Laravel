<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCMS</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">


</head>

<body id="home">

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">DCMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto w-100 justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>


                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="#chamber">chamber</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#event">event</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#appointment">appointment</a>



                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">blog</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">gallery</a>



                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">about</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">contact</a>

                    </li>

                </ul>
                @if (!auth()->check())
                    <a href="{{ route('login') }}" class="btn btn-outline-primary m-2 btn-sm"
                        id="login_switch">Login</a>


                    <a href="{{ route('register') }}" class="btn btn-outline-success m-2 btn-sm"
                        id="register_switch">Register</a>
                @endif

                @if (auth()->check() && auth()->user()->role_id == 1)
                    <a href="{{ route('Dashboard') }}" class="btn btn-outline-primary m-2 btn-sm"
                        >Dashboard</a>
                @endif
                @if (auth()->check() && auth()->user()->role_id == 2)
                    <a href="{{ route('Dashboard_moderator_dashboard') }}" class="btn btn-outline-primary m-2 btn-sm"
                        id="login_switch">Dashboard</a>
                @endif
                @if (auth()->check() && auth()->user()->role_id == 3)
                    <a href="{{ route('Dashboard_patitient_dashboard') }}" class="btn btn-outline-primary m-2 btn-sm"
                        >Dashboard</a>
                @endif
                @if (auth()->check() && auth()->user()->role_id == 4)
                    <a href="{{ route('Dashboard_writer_dashboard') }}" class="btn btn-outline-primary m-2 btn-sm"
        >Dashboard</a>
                @endif

            </div>
        </div>
    </nav>
    <div id="login" class="d-none">
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <button class="btn btn-light  float-end" id="cancel"><i class="fa-solid fa-xmark"
                    width="20px"></i></button>

            <div class="row align-items-center g-lg-5 py-5 shadow-lg mt-5 ">

                <div class="col-lg-7 text-center text-lg-start">
                    <img src="{{ asset('assets/frontend/images/template/login.svg') }}" class="card-img-top">
                </div>
                <div class="col-md-10 mx-auto col-lg-5">

                    <form action="{{ route('login') }}" method="post" class="p-4 p-md-5 border rounded-3 bg-light"
                        id="login_form">
                        <fieldset>
                            <legend>Personalia:</legend>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>

                                <label>
                                    <p onclick="forget()" id="forget">Forgot Password</p>
                                </label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                        </fieldset>
                    </form>

                    <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light"
                        id="forgot_form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <p onclick="backtologin()">Back to login</p>
                            </label>
                        </div>
                        <p class="w-100 btn btn-lg btn-primary" type="submit">Sign up</p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="register" class="d-none">
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <button class="btn btn-light  float-end" id="reg_cancel"><i class="fa-solid fa-xmark"
                    width="20px"></i></button>

            <div class="row align-items-center g-lg-5 py-5 shadow-lg mt-5 ">

                <div class="col-lg-7 text-center text-lg-start">
                    <img src="{{ asset('assets/frontend/images/template/register.svg') }}" class="card-img-top">
                </div>
                <div class="col-md-10 mx-auto col-lg-5">

                    <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST"
                        action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput">
                            <label for="floatingInput">First Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" name="password">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                id="floatingInput">
                            <label for="floatingInput" name="password_confirmation"></label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="article">
        </div>
    </div>
    <span id="body">
        @if (count($banner) == 0)
            <div class="card text-center my-5">
                <div class="card-header">
                    Banner Section
                </div>
                <div class="card-body">
                    <h5 class="card-title">No Data in Database</h5>
                    <p class="card-text">You have to insert needed data to see banner section.</p>
                    <a href="#" class="btn btn-primary">Insert Data</a>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row p-4 my-5 px-0 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border-0 ">
                    <div class="col-lg-7 p-3  p-lg-5 pt-lg-3 p-2">
                        @foreach ($banner as $item)
                            <h1 class="display-4 fw-bold lh-1">
                                {{ $item->title }}
                            </h1>
                            <p class="lead">
                                {{ $item->subtitle }}
                            </p>
                        @endforeach
                        {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">

                            <a href="{{ $item->link }}"
                                class="btn btn-outline-primary btn-lg px-4">{{ $item->button_text }}</a>
                        </div> --}}
                    </div>
                    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                        <img class="rounded-lg-3" src="{{ asset('assets/frontend/images/template/login.svg') }}"
                            alt="" width="720">
                    </div>
                </div>
            </div>
        @endif
        <div class="container" id="chamber">
            @if (count($chamber) == 0)
                <div class="card text-center my-5">
                    <div class="card-header">
                        Chamber Section
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">No Data in Database</h5>
                        <p class="card-text">You have to insert needed data to see banner section.</p>
                        <a href="#" class="btn btn-primary">Insert Data</a>
                    </div>
                </div>
            @else
                <div class="card border-0">
                    <div class="card-body border-0">
                        <h1 class="card-title">Chamber Details</h1>
                        <div class="row mt-5 row-eq-height">
                            @foreach ($chamber as $item)
                                <span class="col-sm-12 col-md-4 p-2">
                                    <div class="card p-0 shadow">
                                        <img src="{{ asset('/assets/frontend/images/chambers/' . $item->img_url) }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"> <strong>{{ $item->name }}</strong> </h5>
                                        </div>
                                        <ul class="list-group list-group-flush pt-4" style="height:200px">
                                            <li class="list-group-item border-0">{{ $item->house_no }} ,
                                                {{ $item->road_number }}, {{ $item->area }} ,
                                                {{ $item->district }}
                                                ।
                                            </li>
                                            <li class="list-group-item border-0">{{ $item->day }},
                                                {{ $item->time }}
                                                । </li>
                                        </ul>
                                    </div>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="card border-0" id="event">
                @if (count($event) == 0)
                    <div class="card text-center my-5">
                        <div class="card-header">
                            Event Section
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">No Data in Database</h5>
                            <p class="card-text">You have to insert needed data to see banner section.</p>
                            <a href="#" class="btn btn-primary">Insert Data</a>
                        </div>
                    </div>
                @else
                    <div class="card-body border-0 ">
                        <h1 class="card-title ">Events</h1>
                        <div class="row mt-5 ">
                            @foreach ($event as $item)
                                <span class="col-sm-12 col-md-4 p-2">
                                    <div class="card p-0 shadow">
                                        <img src="{{ asset('/assets/frontend/images/events/' . $item->img_url) }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"> <strong>{{ $item->name }}</strong> </h5>
                                        </div>
                                        <ul class="list-group list-group-flush pt-4" style="height:200px">
                                            <li class="list-group-item border-0">{{ $item->house_no }} ,
                                                {{ $item->road_number }}, {{ $item->area }} ,
                                                {{ $item->district }}
                                                ।
                                            </li>
                                            <li class="list-group-item border-0">{{ $item->day }},
                                                {{ $item->time }}
                                                । </li>
                                        </ul>
                                    </div>
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <span>
                <div class="row align-items-center  my-5 p-5 px- shadow" id="appointment">
                    <div class="col-lg-7 text-lg-start">
                        <h1 class="display-4 fw-bold lh-1 mb-3 text-capitalize">Looking for a appointment or diet ?
                        </h1>
                        <p class="col-lg-10 fs-4">
                            Do you know you can make an appointment for any of my chamber online ?
                        </p>
                        <p class="col-lg-10 fs-4">
                            Do you know you can order a diet chart custom made just for you online
                        </p>

                    </div>
                    <div class="col-md-10 mx-auto col-lg-5">
                        <form class="p-4 p-md-5 border rounded-3 bg-light shadow" method="post"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInput">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                            <hr class="my-4">
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                        </form>
                    </div>
                </div>
                <div class="card border-0" id="blog">
                    <div class="card-body border-0">
                        <h1 class="card-title">Blogs</h1>
                        <div class="row mt-5" id="posts">
                        </div>
                        <div class="card-footer bg-white">
                            <div class="col-12  m-auto text-center mt-5">
                                <div class="btn-group shadow" role="group" aria-label="Basic example"
                                    id="blog_pagination">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery  -->
                <div class="card border-0" id="gallery">
                    <div class="card-body border-0">
                        <h1 class="card-title">Gallery Details</h1>
                        <div class="row mt-5">
                            <span class="col-12 p-2">
                                <div class="card p-0 border-0">
                                    <div class="row" id="photos">
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="col-12  m-auto text-center mt-5">
                                            <div class="btn-group shadow" role="group" aria-label="Basic example"
                                                id="gallery_pagination">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                        @if (count($about) == 0)
                            <div class="card text-center my-5">
                                <div class="card-header">
                                    About Section
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">No Data in Database</h5>
                                    <p class="card-text">You have to insert needed data to see banner section.</p>
                                    <a href="#" class="btn btn-primary">Insert Data</a>
                                </div>
                            </div>
                        @else
                            <div class="card border-0" id="about">
                                <div class="card-body border-0">
                                    {{-- <h1 class="card-title">Who Am I ?</h1> --}}
                                    <div class="row mt-5 shadow">
                                        <div class="bg-white rounded overflow-hidden p-0">
                                            <div class="px-4 pt-0 pb-4 cover bg-primary">

                                                <div class="media align-items-end profile-head">
                                                    <div class="profile mr-3"><img src="{{ $about[0]->profile_img }}"
                                                            width="200" class="rounded my-4 img-thumbnail"></div>
                                                    <div class="media-body mb-5 text-white">
                                                        <h4 class="mt-0 mb-0">{{ $about[0]->name }}</h4>
                                                        <p class="small mb-4"><i
                                                                class="fa-solid fa-graduation-cap"></i> &nbsp;
                                                            {{ $about[0]->degree }}
                                                        </p>
                                                        <div>
                                                            <div class="btn-group">
                                                                <a href="{{ $social[0]->f_link }}"
                                                                    class="text-white me-2">
                                                                    <i class="fa-brands fa-facebook-square h4">
                                                                    </i>
                                                                </a>
                                                                <a href="{{ $social[0]->y_link }}"
                                                                    class=" text-white me-2">
                                                                    <i class="fa-brands fa-youtube h4"></i>
                                                                </a>
                                                                <a href="{{ $social[0]->l_link }}"
                                                                    class=" text-white me-2">
                                                                    <i class="fa-brands fa-linkedin h4"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="px-4 py-3">
                                                <h5 class="mb-3">About</h5>

                                                <div class="p-4 rounded shadow-sm bg-light">
                                                    <address>
                                                        {{ $about[0]->brife_description }}
                                                    </address>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </span>
        </div>
    </span>
    @if (count($chamber) == 0)
        <div class="card text-center my-5">
            <div class="card-header">
                Chamber Section
            </div>
            <div class="card-body">
                <h5 class="card-title">No Data in Database</h5>
                <p class="card-text">You have to insert needed data to see banner section.</p>
                <a href="#" class="btn btn-primary">Insert Data</a>
            </div>
        </div>
    @else
        <footer id="footer" class="py-5 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row m-0 py-2">
                            <h1 class="col-12  mb-5"><strong> Chambers Address</strong></h1>
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($chamber as $item)
                                        <span class="col-sm-12 col-md-4 p-2">
                                            <div class="card p-0 bg-transparent border-0">
                                                <h5 class="card-title ms-2"> <strong>{{ $item->name }}</strong>
                                                </h5>
                                                <div class="card-body bg-transparent">
                                                    <ul class="list-group list-group-flush bg-transparent">
                                                        <li class="list-group-item border-0 bg-transparent text-white">
                                                            {{ $item->house_no }} ,
                                                            {{ $item->road_number }}, {{ $item->area }} ,
                                                            {{ $item->district }}
                                                            ।
                                                        </li>
                                                        <li class="list-group-item border-0 bg-transparent text-white">
                                                            {{ $item->day }},
                                                            {{ $item->time }}
                                                            । </li>

                                                    </ul>

                                                </div>

                                            </div>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </footer>
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js "></script>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>
