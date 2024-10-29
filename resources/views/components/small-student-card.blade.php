@props(['student'])

<a href="{{ route('students.showStudent', ['student' => $student]) }}">
    <div {{ $attributes->merge(['class' => 'w-full flex rounded-3xl bg-black/15 px-7 py-3 min-h-32 bg-clip-padding backdrop-filter backdrop-blur-md border border-gray-100 flex-col space-y-4 relative overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:border-2 hover:border-black/75 group items-center select-none']) }}>

        <!-- Background overlay with sliding effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-transparent opacity-60 transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0 z-0"></div>

        <!-- Card Content -->
        <div class="relative z-10 flex flex-row space-x-6">
            <div>
                <h3 class="self-start text-3xl font-bold duration-150 group-hover:border-b-2 pb-2 group-hover:border-black/45">{{ $student->name }}</h3>
                <p class="text-lg text-black/45">{{ $student->countyCode }}</p>
                <p class="text-lg text-black/45">{{ $student->location }}</p>
            </div>

            <div class="hidden md:block">
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

    </div>
</a>
