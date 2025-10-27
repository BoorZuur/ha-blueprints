<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blueprint') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('blueprints.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                    @svg('mdi-arrow-left', 'mr-2 h-4 w-4')
                    Back to Blueprints
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form method="POST" action="{{ route('blueprints.update', $blueprint) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                          :value="old('name') ?? $blueprint->name" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')"/>
                            <x-textarea id="description" name="description" class="mt-1 block w-full" required autofocus
                                        autocomplete="description">{{ old('description') ?? $blueprint->description }}</x-textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="url" :value="__('URL')"/>
                            <x-text-input id="url" name="url" type="url" class="mt-1 block w-full"
                                          :value="old('url') ?? $blueprint->url"
                                          placeholder="https://example.com/blueprint.yaml"/>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">GitHub (gist) or Home Assistant Forum URL where this
                                blueprint can be imported from</p>
                            <x-input-error class="mt-2" :messages="$errors->get('url')"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')"/>
                            <select name="category" id="category" required>
                                <option value="">Please select a category</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ (old('category') ?? $blueprint->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
