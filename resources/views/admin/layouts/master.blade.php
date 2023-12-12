<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ? __($pageTitle) : __('Admin') }} - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    
    @yield('content')

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    
    @include('partials.notify')

</body>

</html>
