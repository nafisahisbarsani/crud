<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="mt-4 mb-4 flex justify-end">
        <a href="/admin/grade/create"
           class="btn btn-primary bg-blue-500 text-white px-6 py-2 shadow hover:bg-blue-600 flex items-center space-x-2 rounded-[7px]">
            <i class="fas fa-plus"></i>
            <span>Add Grade</span>
        </a>
    </div>
    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Grade</th>
                <th class="px-4 py-2">Department</th>
                <th class="px-4 py-2">Students</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td class="border px-4 py-2">{{ $grade->id }}</td>
                    <td class="border px-4 py-2">{{ $grade->grade }}</td>
                    <td class="border px-4 py-2">{{ $grade->department->name }}</td>
                    <td class="border px-4 py-2">
                        <ul>
                            @foreach ($grade->students as $student)
                                <li>{{ $student->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center items-center space-x-4">
                            <span class="text-gray-500 cursor-pointer hover:text-blue-500 p-2" title="View">
                                <button onclick="openModal('{{ $grade->students->pluck('name')->join(', ') }}', '{{ $grade->grade }}', '{{ $grade->department->name }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </span>
                            <span class="text-gray-500 cursor-pointer hover:text-green-500 p-2" title="Edit">
                                 <a href="/admin/grade/edit/{{ $grade->id  }}">
                                 <i class="fas fa-edit"></i>
                                </a>
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal View -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-black opacity-50" onclick="closeModal()"></div>
        <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-md w-full">
            <h2 class="text-xl font-bold mb-4" id="modal-title">Detail Grade</h2>
            <p id="modal-students" class="mb-2"></p>
            <p id="modal-grade" class="mb-2"></p>
            <p id="modal-department" class="mb-4"></p>
            <button id="closeModal" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800" onclick="closeModal()">Close</button>
        </div>
    </div>
</x-admin-layout>

<script>
    function openModal(students, grade, department) {
        document.getElementById('modal-students').textContent = 'Students: ' + students;
        document.getElementById('modal-grade').textContent = 'Grade: ' + grade;
        document.getElementById('modal-department').textContent = 'Department: ' + department;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>
