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
    {{-- <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div> --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">DCMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                <a href="{{route('login')}}" class="btn btn-outline-primary m-2 btn-sm" id="login_switch">Login</a>
                <a href="{{route('register')}}" class="btn btn-outline-success m-2 btn-sm" id="register_switch">Register</a>


            </div>
        </div>
    </nav>
    <section class="container">
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js "></script>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>