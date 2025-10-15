<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blueprint Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">{{ $blueprint->name }}</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $blueprint->description }}</p>
                    <div class="mb-4 text-gray-200">
                        <strong>Category:</strong> {{ $blueprint->category->name }}
                    </div>
                    <div class="mb-4 text-gray-200">
                        <strong>Blueprint:</strong>
                        <pre class="bg-gray-100 dark:bg-gray-700 dark:text-gray-200 p-4 rounded-md overflow-x-auto"><code>{{ $blueprint->blueprint }}</code></pre>
                    </div>
                    <a href="{{ route('blueprints.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition">
                        Back to Blueprints
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
