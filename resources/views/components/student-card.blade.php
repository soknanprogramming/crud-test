@props(['student'])
@php
    use Illuminate\Support\Str;
@endphp

<div
    {{ $attributes->merge(['class' => 'mx-auto my-4 bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300']) }}>
    <div>

        <div class="p-3">
            <div class="flex items-center">
                <div>
                    <img class="size-25" src="{{ asset('images/no-image.png') }}" alt="">
                </div>
                <div class="ml-2.5">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mb-1">Student Profile</div>
                    <h1 class="block mt-1 text-lg leading-tight font-bold text-black">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </h1>
                </div>
            </div>
            <div class="mt-2 space-y-2">
                <p class="text-slate-500 flex items-center"><span class="font-medium text-slate-700 w-20">Gender:</span>
                    {{ $student->gender }}</p>
                <p class="text-slate-500 flex items-center"><span class="font-medium text-slate-700 w-20">Age:</span>
                    {{ $student->age }} years old</p>
                <p class="text-slate-500 flex items-center"><span
                        class="font-medium text-slate-700 w-20">Address:</span>
                    {{ Str::limit($student->address, 25) }}</p>
            </div>
            <div class="mt-5 flex space-x-1">
                <a href="/students/{{ $student->id }}">
                    <p
                        class="bg-gray-100 border flex items-center border-gray-300 hover:bg-gray-200 hover:cursor-pointer p-1.5 rounded-sm">
                        <x-icons.eye class="mr-1.5" /><span>View Details<span>
                    </p>
                </a>
                <a href="/students/{{ $student->id }}/edit">
                    <p class="bg-gray-100 border flex items-center border-gray-300 hover:bg-gray-200 hover:cursor-pointer p-1.5 rounded-sm">
                        <x-icons.pen-fill class="mr-1.5" /><span>Edit</span>
                    </p>
                </a>
                <!-- Delete button -->
                <form action="/students/{{ $student->id }}" method="POST" class="inline-block"
                    onsubmit="return confirm('Are you sure you want to delete {{ $student->first_name }} {{ $student->last_name }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-gray-100 border text-red-600 flex items-center border-gray-300 hover:bg-gray-200 hover:cursor-pointer p-1.5 rounded-sm">
                            <x-icons.trash3-fill class="mr-1.5" /><span>Delete</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
