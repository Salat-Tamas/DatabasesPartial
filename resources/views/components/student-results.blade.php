@props(['students'])

@if($students->isEmpty())
    <p class="text-xl z-10">No students found.</p>
@else
    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-4 z-10 w-4/5">
        @foreach ($students as $student)
            <x-small-student-card :$student />
        @endforeach
    </div>
@endif
