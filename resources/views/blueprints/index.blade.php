<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blueprints') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="mb-4">
                        <a href="{{ route('blueprints.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                            Create New Blueprint
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                            @foreach ($blueprints as $blueprint)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300"><a href="{{ route('blueprints.show', $blueprint) }}">{{ $blueprint->name }}</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $blueprint->description }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('blueprints.edit', $blueprint) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
