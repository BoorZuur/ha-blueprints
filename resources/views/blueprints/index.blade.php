<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Browse Blueprints
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @auth
                <div class="mb-6">

                    <a href="{{ route('blueprints.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                        Create New Blueprint
                        @svg('mdi-plus', 'ml-2 h-4 w-4')
                    </a>
                </div>
            @endauth

            <!-- Search and Filter Form -->
            <div class="mb-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('blueprints.index') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Search Input -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                @svg('mdi-magnify', 'inline w-4 h-4 mr-1')
                                Search
                            </label>
                            <input type="text"
                                   id="search"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Search by title or description..."
                                   class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 shadow-sm">
                        </div>

                        <!-- Category Filter -->
                        <div>
                            <label for="category"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                @svg('mdi-filter', 'inline w-4 h-4 mr-1')
                                Category
                            </label>
                            <select id="category"
                                    name="category"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 shadow-sm">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                            @svg('mdi-magnify', 'w-4 h-4 mr-1')
                            Search
                        </button>
                        @if(request('search') || request('category'))
                            <a href="{{ route('blueprints.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition">
                                @svg('mdi-close', 'w-4 h-4 mr-1')
                                Clear Filters
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div
                    class="mb-6 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            @if($blueprints->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        @if(request('search') || request('category'))
                            No blueprints found matching your search criteria. Try adjusting your filters.
                        @else
                            No blueprints found. Create your first blueprint!
                        @endif
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($blueprints as $blueprint)
                        @if($blueprint->show)
                            <div
                                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                                <a href="{{ route('blueprints.show', $blueprint) }}" class="block">
                                    <div class="p-6">
                                        <!-- Category Icon -->
                                        <div
                                            class="flex items-center justify-center w-16 h-16 mb-4 bg-blue-100 dark:bg-blue-900 rounded-lg mx-auto">
                                            @if($blueprint->category && $blueprint->category->icon)
                                                @svg($blueprint->category->icon, 'w-8 h-8 text-blue-600 dark:text-blue-400')
                                            @else
                                                @svg('mdi-file-document', 'w-8 h-8 text-blue-600 dark:text-blue-400')
                                            @endif
                                        </div>

                                        <!-- Blueprint Name -->
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 text-center mb-2 line-clamp-2">
                                            {{ $blueprint->name }}
                                        </h3>

                                        <!-- Metadata -->
                                        <div
                                            class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                            <div class="flex items-center gap-3">
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    @svg('mdi-account', 'w-4 h-4 mr-1')
                                                    <span>{{ $blueprint->user->name ?? 'Unknown' }}</span>
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                    @svg('mdi-heart', 'w-4 h-4 mr-1')
                                                    <span>{{ $blueprint->likesCount() }}</span>
                                                </div>
                                            </div>
                                            @if($blueprint->category)
                                                <div
                                                    class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                                    {{ $blueprint->category->name }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>

                                <!-- Action Buttons -->
                                @can('edit', $blueprint)
                                    <div class="px-6 pb-4 flex gap-2">
                                        <a href="{{ route('blueprints.edit', $blueprint) }}"
                                           class="flex-1 text-center px-3 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST"
                                              class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full px-3 py-2 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 transition"
                                                    onclick="return confirm('Are you sure you want to delete this blueprint?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
