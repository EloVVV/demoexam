<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <script src="{{ asset('public/js/index.js') }}" defer></script>

    <title>@yield('title') | Exam</title>
</head>
<body>
<main>
    @include('components.header')

    @if(session()->has('message'))
        <div class="alert alert-info">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>
