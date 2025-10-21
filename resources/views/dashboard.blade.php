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
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                            @foreach ($blueprints as $blueprint)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300"><a
                                            href="{{ route('blueprints.show', $blueprint) }}">{{ $blueprint->name }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $blueprint->description }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('blueprints.edit', $blueprint) }}"
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4"
                                                    onclick="return confirm('Are you sure?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
