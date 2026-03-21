<x-layout>
    @if ($students)
        <div class="grid 2xl:grid-cols-4">
            @foreach ($students as $student)
                <x-student-card :student="$student" />
            @endforeach
        </div>
    @else
        <p>No students found</p>
    @endif
</x-layout>
