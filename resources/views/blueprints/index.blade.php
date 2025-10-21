<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blueprints') }}
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

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($blueprints->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 dark:text-gray-400 text-center">No blueprints found. Create your first
                        blueprint!</p>
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
                                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                @svg('mdi-account', 'w-4 h-4 mr-1')
                                                <span>{{ $blueprint->user->name ?? 'Unknown' }}</span>
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
