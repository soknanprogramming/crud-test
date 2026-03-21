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
                    <li class="hover:text-blue-600"><a href="/students/create">Create</a></li>
                    <li class="hover:text-blue-600"><a href="/contact">Contact</a></li>
                </ul>
            </nav>
            <form action="/" class="ml-20 flex items-center">
                <input type="text" placeholder="Search" name="search" class="bg-gray-50 p-1.5 w-60 rounded-sm">
                <button class="ml-1.5 bg-gray-500 hover:bg-gray-600 hover:text-gray-50 px-2 py-1 rounded-sm">Search</button>
            </form>
        </header>
        <main>{{ $slot }}</main>
    </div>
</body>

</html>
