<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="mt-4 mb-4 flex justify-end">
        <a href="/admin/students/create"
           class="btn btn-primary bg-blue-500 text-white px-6 py-2 shadow hover:bg-blue-600 flex items-center space-x-2 rounded-[7px]">
            <i class="fas fa-plus"></i>
            <span>Add Student</span>
        </a>
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
                <th class="px-4 py-2">Actions</th>
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
                    <td class="border px-4">
                        <div class="py-2 flex justify-center items-center space-x-4">
                            <span class="text-gray-500 cursor-pointer hover:text-blue-500 p-2" title="View">
                                <button onclick="openModal('{{ $student->name }}', '{{ $student->email }}', '{{ $student->address }}', '{{ $student->grade->grade }}', '{{ $student->grade->department->name }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </span>
                            <span class="text-gray-500 cursor-pointer hover:text-green-500 p-2" title="Edit">
                                <a href="/admin/students/edit/{{ $student->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </span>
                            <span class="text-gray-500 cursor-pointer hover:text-red-500 p-2" title="Delete">
                                <button type="button" onclick="openDeleteModal('{{ $student->id }}', '{{ $student->name }}')" class="bg-transparent border-none">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-black opacity-50" onclick="closeModal()"></div>
        <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-md w-full">
            <h2 class="text-xl font-bold mb-4" id="modal-title">Detail Siswa</h2>
            <p id="modal-name" class="mb-2"></p>
            <p id="modal-email" class="mb-2"></p>
            <p id="modal-grade" class="mb-2"></p>
            <p id="modal-department" class="mb-4"></p>
            <p id="modal-address" class="mb-4"></p>
            <button id="closeModal" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800" onclick="closeModal()">
                Close
            </button>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-black opacity-50" onclick="closeDeleteModal()"></div>
        <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-md w-full">
            <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
            <p id="deleteModalMessage" class="mb-4"></p>
            <div class="flex justify-end space-x-2">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Cancel
                </button>
                <form id="deleteForm" action="{{ route('admin.student.destroy', $student->id) }}" method="POST">
                @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(name, email, address, grade, department) {
            document.getElementById('modal-name').textContent = 'Nama: ' + name;
            document.getElementById('modal-email').textContent = 'Email: ' + email;
            document.getElementById('modal-address').textContent = 'Address: ' + address;
            document.getElementById('modal-grade').textContent = 'Grade: ' + grade;
            document.getElementById('modal-department').textContent = 'Department: ' + department;
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function openDeleteModal(studentId, studentName) {
            document.getElementById('deleteModalMessage').textContent =
                `Are you sure you want to delete student: "${studentName}"?`;
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin/students/${studentId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>

