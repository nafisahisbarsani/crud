<x-admin-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <div class="flex items-center mb-4">
            <button onclick="history.back()" class="flex items-center text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">
                <i class="fas fa-arrow-left mr-2"></i>
            </button>
        </div>
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Department</h2>
            <form action="/admin/department/update/{{ $department->id }}" method="post">
                @csrf
                @method('PUT')  <!-- Method spoofing untuk PUT request -->

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <input type="text" name="department" id="department" value="{{ old('department', $department->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type department name" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Department description">{{ old('description', $department->description) }}</textarea>
                    </div>
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 mt-4 sm:mt-6 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">                    Update Department
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>
