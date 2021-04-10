<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title-page')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>@yield('title-page')</strong>
            </a>
            <a class="navbar-toggler" type="button"
               data-toggle="collapse" data-target="#navbarHeader"
               aria-controls="navbarHeader" aria-expanded="false"
               aria-label="Toggle navigation"
               href="{{route('products.create')}}"
            >
                Add product
            </a>
        </div>
    </div>
</header>

<main role="main">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="text-muted h-100">
    <div class="container text-center">
        <p class="mt-3">
            <a href="#">Link do developer sites</a>
        </p>
    </div>
</footer>
</body>
</html>
