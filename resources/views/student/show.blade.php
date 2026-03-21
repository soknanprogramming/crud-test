<x-layout>
    <div class="max-w-2xl mx-auto my-10 bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Student Details</h2>
            <a href="/" class="text-indigo-600 hover:text-indigo-800 font-medium">&larr; Back to List</a>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <div class="border-b pb-2">
                <span class="text-sm text-gray-500 block">Full Name</span>
                <p class="text-lg font-semibold">{{ $student->first_name }} {{ $student->last_name }}</p>
            </div>
            <div class="border-b pb-2">
                <span class="text-sm text-gray-500 block">Email</span>
                <p class="text-lg">{{ $student->email }}</p>
            </div>
            <div class="border-b pb-2">
                <span class="text-sm text-gray-500 block">Phone</span>
                <p class="text-lg">{{ $student->phone }}</p>
            </div>
            <div class="border-b pb-2">
                <span class="text-sm text-gray-500 block">Gender</span>
                <p class="text-lg">{{ $student->gender }}</p>
            </div>
            <div class="border-b pb-2">
                <span class="text-sm text-gray-500 block">Date of Birth</span>
                <p class="text-lg">{{ $student->dob }}</p>
            </div>
            <div>
                <span class="text-sm text-gray-500 block">Address</span>
                <p class="text-lg">{{ $student->address }}</p>
            </div>
        </div>
    </div>
</x-layout>
