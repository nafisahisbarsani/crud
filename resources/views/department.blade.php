<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department) 
                <tr>
                    <td class="border px-4 py-2">{{ $department->id }}</td>
                    <td class="border px-4 py-2">{{ $department->name }}</td>
                    <td class="border px-4 py-2">{{ $department->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
