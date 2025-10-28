<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Blueprints
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($blueprints->isEmpty())
                        <div class="text-gray-600 dark:text-gray-400 text-center">No blueprints found. Create your first
                            blueprint!
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                <tr>
                                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($blueprints as $blueprint)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-4 py-4 text-sm text-gray-900 dark:text-gray-300">
                                            <a href="{{ route('blueprints.show', $blueprint) }}"
                                               class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                                {{ $blueprint->name }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400 max-w-md">
                                            {{ Str::limit($blueprint->description, 100) }}
                                        </td>
                                        <td class="px-4 py-4 text-right text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('blueprints.edit', $blueprint) }}"
                                               class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition-colors mr-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors"
                                                        onclick="return confirm('Are you sure you want to delete this blueprint?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
