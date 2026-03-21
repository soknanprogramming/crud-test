<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <header class="flex bg-gray-200 border-b border-gray-300 sticky top-0 z-10 h-12 items-center px-3">
            <nav>
                <ul class="flex space-x-5">
                    <li class="hover:text-blue-600"><a href="/">Home</a></li>
                    <li class="hover:text-blue-600"><a href="/about">Create</a></li>
                    <li class="hover:text-blue-600"><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main>{{ $slot }}</main>
    </div>
</body>

</html>
