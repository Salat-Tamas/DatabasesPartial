@php(['student'])

<div class="flex flex-col md:flex-row md:space-x-14 space-y-12 w-full rounded-3xl bg-clip-padding backdrop-filter backdrop-blur-md border border-gray-100 relative overflow-hidden bg-black/15 px-7 py-3 min-h-fit items-center justify-between">
    <div>
        <h3 class="self-start text-3xl font-bold pb-2">{{ $student->name }}</h3>
        <x-divider-x class="w-full h-0.5 bg-green-800" />
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">County:</span> {{ $student->countyCode }} | {{ $student->county }}</p>
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">Location:</span> {{ $student->location }}</p>
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">Medium:</span> {{ $student->medium }}</p>
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">School:</span> ({{ $student->schoolCode }}) {{ $student->schoolName }}</p>
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">Nationality:</span> {{ $student->nationality }}</p>
        <p class="text-lg text-black/45"><span class="font-semibold text-black/50s">Native:</span> {{ $student->native }}</p>
    </div>

    <div class="pb-11 hidden md:block">
        <x-divider-y class="hidden md:block w-0.5 h-52 bg-green-800" />
    </div>
    <x-divider-x class="block md:hidden h-0.5 w-full bg-green-800" />

    <div class="flex justify-center items-center h-full pb-12">
        <table class="w-full border-collapse border border-black/45 text-center">
            <tr>
                <th class="border border-black/45 p-2" colspan="2">Grades</th>
            </tr>

            <tr>
                <th class="border border-black/45 p-2">Romanian</th>
                <th class="border border-black/45 p-2">Mathematics</th>
            </tr>

            <tr>
                <td class="border border-black/45 p-2 font-semibold" style="background-color: {{ $student->romanian < 5 ? 'red' : 'hsl(' . (120 * ($student->romanian - 5) / 5) . ', 100%, 50%)' }}">{{ $student->romanian }}</td>
                <td class="border border-black/45 p-2 font-semibold" style="background-color: {{ $student->mathematics < 5 ? 'red' : 'hsl(' . (120 * ($student->mathematics - 5) / 5) . ', 100%, 50%)' }}">{{ $student->mathematics }}</td>
            </tr>

            <tr>
                <th class="border border-black/45 p-2" colspan="2">Avg.</th>
            </tr>

            <tr>
                <td class="border border-black/45 p-2 font-semibold" colspan="2" style="background-color: {{ $student->avg < 6 ? 'red' : 'hsl(' . (120 * ($student->avg - 6) / 6) . ', 100%, 50%)' }}">{{ $student->avg }}</td>
            </tr>
        </table>
    </div>
</div>
