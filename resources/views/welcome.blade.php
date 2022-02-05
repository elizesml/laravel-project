<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Home</title>
</head>
<body class="bg-gray-300 bg-opacity-60 w-full h-full font-sans">
    <div class="text-center mt-40">
        <h1 class="text-3xl font-bold font-sans">
            Welcome to the Homepage
        </h1>
    </div>

    <div class="flex justify-center text-xl mt-24 mb-12 italic text-gray-600">
        Please select the following
    </div>

    <div class="flex justify-center font-mono">
        <a href="/view" 
            class="bg-gray-300 bg-opacity-50 text-lg text-green-600 bold hover:text-red-500 px-5 mr-20">
            Customer API
        </a>
        <a href="/admin" 
            class="bg-gray-300 bg-opacity-50 text-lg text-green-600 bold hover:text-red-500 px-5">
            Admin API
        </a>
    </div>
</body>
</html>