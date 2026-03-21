@props(['student'])
@php
    use Illuminate\Support\Str;
@endphp

<div
    class="max-w-sm mx-auto my-4 bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
    <div class="p-6">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mb-1">Student Profile</div>
        <h1 class="block mt-1 text-lg leading-tight font-bold text-black">
            {{ $student->first_name }} {{ $student->last_name }}
        </h1>
        <div class="mt-4 space-y-2">
            <p class="text-slate-500 flex items-center"><span class="font-medium text-slate-700 w-20">Gender:</span>
                {{ $student->gender }}</p>
            <p class="text-slate-500 flex items-center"><span class="font-medium text-slate-700 w-20">Age:</span>
                {{ $student->age }} years old</p>
            <p class="text-slate-500 flex items-center"><span class="font-medium text-slate-700 w-20">Address:</span>
                {{ Str::limit($student->address, 30) }}</p>
        </div>
        <div class="mt-5">
            <a href="/students/{{ $student->id }}" class="bg-gray-100 border border-gray-300 hover:bg-gray-200 hover:cursor-pointer p-1.5 rounded-sm">View Details</a>
        </div>
    </div>
</div>
