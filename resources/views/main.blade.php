<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Manager - @yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<h1 class="text-2xl font-semibold text-gray-800 mb-6 py-4 text-center font-mono sticky top-0 bg-white z-10 shadow-md">Product Manager</h1>

@yield('content')


@yield('scripts')

</body>
</html>
