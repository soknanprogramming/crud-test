<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <title>CRUD Application</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <header class="flex 2xl:px-10 justify-between bg-gray-200 border-b border-gray-300 sticky top-0 z-10 h-12 items-center px-3">
            <nav>
                <ul class="flex space-x-5">
                    <li class="{{ request()->is('/') ? 'text-blue-600' : 'hover:text-blue-600' }}"><a
                            href="/">Home</a></li>
                    <li class="{{ request()->is('students/create') ? 'text-blue-600' : 'hover:text-blue-600' }}"><a
                            href="/students/create">Create</a></li>
                    {{-- <li class="{{ request()->is('other') ? 'text-blue-600' : 'hover:text-blue-600' }}"><a
                            href="/other">Other</a></li> --}}
                </ul>
            </nav>
            <form action="/" class="flex 2xl:-ml-130 items-center">
                <input type="text" placeholder="Search" name="search" class="bg-gray-50 p-1.5 w-60 rounded-sm">
                <select name="order_by" id="order_by"
                    class="ml-1.5 bg-gray-300 hover:bg-gray-400 hover:text-gray-50 px-2 py-1 rounded-sm">
                    <option value="newest" {{ request('order_by') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="oldest" {{ request('order_by') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    <option value="first_name" {{ request('order_by') == 'first_name' ? 'selected' : '' }}>First name
                    </option>
                    <option value="last_name" {{ request('order_by') == 'last_name' ? 'selected' : '' }}>Last name
                    </option>
                    <option value="age_older" {{ request('order_by') == 'age_older' ? 'selected' : '' }}>Age older
                    </option>
                    <option value="age_younger" {{ request('order_by') == 'age_younger' ? 'selected' : '' }}>Age younger
                    </option>
                    <option value="just_update" {{ request('order_by') == 'just_update' ? 'selected' : '' }}>Just
                        update
                    </option>
                    <option value="old_update" {{ request('order_by') == 'old_update' ? 'selected' : '' }}>Oldest
                        update</option>

                </select>
                <select name="gender" id="gender"
                    class="ml-1.5 bg-gray-300 hover:bg-gray-400 hover:text-gray-50 px-2 py-1 rounded-sm">
                    <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>All</option>
                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <button
                    class="ml-1.5 bg-gray-500 hover:bg-gray-600 hover:text-gray-50 px-2 py-1 rounded-sm">Search</button>
            </form>
            <nav>
                <ul class="flex space-x-5">
                    @auth
                        <li class="text-gray-700">
                            Welcome, <span class="font-semibold">{{ auth()->user()->name }}</span>
                        </li>
                        <li>
                            <form action="/logout" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-blue-600">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="{{ request()->is('register') ? 'text-blue-600' : 'hover:text-blue-600' }}">
                            <a href="/register">Register</a>
                        </li>
                        <li class="{{ request()->is('login') ? 'text-blue-600' : 'hover:text-blue-600' }}">
                            <a href="/login">Login</a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </header>
        <main>{{ $slot }}</main>
    </div>
    <x-flash-message />
</body>

</html>
