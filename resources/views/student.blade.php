<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
   </div>

    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Grade</th>
                <th class="px-4 py-2">Department</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->id }}</td>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->grade->grade }}</td>
                    <td class="border px-4 py-2">{{ $student->grade->department->name }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">{{ $student->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
