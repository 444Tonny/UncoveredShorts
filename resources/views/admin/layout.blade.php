<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin layout</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/index.css') }}?t={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/buttons.css') }}?t={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/forms.css') }}?t={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/stats.css') }}?t={{ time() }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('admin.sidebar')
    
    @yield('content')
</body>
</html>
