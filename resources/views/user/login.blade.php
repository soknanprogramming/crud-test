<x-layout>
    <div class="min-h-[80vh] flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" value="{{ old('email') }}" placeholder="name@example.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" placeholder="••••••••">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">
                        Sign In
                    </button>
                </div>
            </form>
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">Don't have an account? <a href="/register" class="text-blue-600 hover:underline">Register here</a></p>
            </div>
        </div>
    </div>
</x-layout>
