<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="mt-4 mb-4 flex justify-end">
        <a href="/admin/department/create"
           class="btn btn-primary bg-blue-500 text-white px-6 py-2 shadow hover:bg-blue-600 flex items-center space-x-2 rounded-[7px]">
            <i class="fas fa-plus"></i>
            <span>Add Department</span>
        </a>
    </div>
    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td class="border px-4 py-2">{{ $department->id }}</td>
                    <td class="border px-4 py-2">{{ $department->name }}</td>
                    <td class="border px-4 py-2">{{ $department->description }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center items-center space-x-4">
                        <span class="text-gray-500 cursor-pointer hover:text-blue-500 p-2" title="View">
                            <button onclick="openModal('{{ $department->name }}', '{{ $department->description }}')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </span>
                        <span class="text-gray-500 cursor-pointer hover:text-green-500 p-2" title="Edit">
                             <a href="{{ route('admin.department.edit', $department->id) }}">
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
            <h2 class="text-xl font-bold mb-4" id="modal-title">Detail Department</h2>
            <p id="modal-department" class="mb-4"></p>
            <p id="modal-description" class="mb-4"></p>
            <button id="closeModal" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800" onclick="closeModal()">Close</button>
        </div>
    </div>
</x-admin-layout>

<script>
    function openModal(departmentName, departmentDescription) {
        document.getElementById('modal-department').textContent = 'Department: ' + departmentName;
        document.getElementById('modal-description').textContent = 'Description: ' + departmentDescription;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

</script>
