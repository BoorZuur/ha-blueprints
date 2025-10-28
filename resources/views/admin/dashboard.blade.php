<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Users Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Users</h3>
                                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">{{ $usersCount }}</p>
                            </div>
                            @svg('mdi-account-multiple', 'w-12 h-12 text-indigo-600 dark:text-indigo-400')
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                            Manage Users
                            @svg('mdi-chevron-right', 'ml-1 w-4 h-4')
                        </a>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Categories</h3>
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $categoriesCount }}</p>
                            </div>
                            @svg('mdi-tag-multiple', 'w-12 h-12 text-green-600 dark:text-green-400')
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300">
                            Manage Categories
                            @svg('mdi-chevron-right', 'ml-1 w-4 h-4')
                        </a>
                    </div>
                </div>

                <!-- Blueprints Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Blueprints</h3>
                                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $blueprintsCount }}</p>
                            </div>
                            @svg('mdi-file-document-multiple', 'w-12 h-12 text-blue-600 dark:text-blue-400')
                        </div>
                        <a href="{{ route('admin.blueprints.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                            Manage Blueprints
                            @svg('mdi-chevron-right', 'ml-1 w-4 h-4')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

