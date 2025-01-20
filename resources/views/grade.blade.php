<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Grade</th>
                <th class="px-4 py-2">Department</th>
                <th class="px-4 py-2">Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td class="border px-4 py-2">{{ $grade->id }}</td>
                    <td class="border px-4 py-2">{{ $grade->grade }}</td>
                    <td class="border px-4 py-2"> {{ $grade->department->name }}</td>
                    <td class="border px-4 py-2">
                        <ul>
                            @foreach ($grade->students as $student)
                                <li>{{ $student->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
