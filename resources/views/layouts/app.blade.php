<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
    <div class="flex justify-center">
        <a href="/" class="text-blue-700 text-sm mt-12 hover:text-red-500 px-10 underline">
            Home
        </a>
        <a href="/view" class="text-blue-700 text-sm mt-12 hover:text-red-500 px-10 underline">
            Customer API
        </a>
        <a href="/admin" class="text-blue-700 text-sm mt-12 hover:text-red-500 px-10 underline">
            Admin API
        </a>
    </div>
</head>
<body class="bg-gray-200 bg-opacity-60 w-full h-full">
    @yield('content')
</body>
</html>