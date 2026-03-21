@foreach ($students as $student)
    <h1>Name: <span>{{ $student->first_name . " " . $student->last_name}}</span> </h1>
@endforeach
