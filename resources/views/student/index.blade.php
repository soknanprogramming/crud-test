<x-layout>
    @if ($students)
        <div class="grid 2xl:grid-cols-4">
            @foreach ($students as $student)
                <x-student-card :student="$student" class="w-92"/>
            @endforeach
        </div>
    @else
        <p>No students found</p>
    @endif

    <div class="mx-10">
        {{ $students->links() }}
    </div>
</x-layout>
