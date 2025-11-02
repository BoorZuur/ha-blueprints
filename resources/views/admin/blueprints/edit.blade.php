<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Blueprint: {{ $blueprint->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.blueprints.update', $blueprint) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name', $blueprint->name)" required autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')"/>
                            <x-textarea id="description" class="block mt-1 w-full" name="description" rows="4"
                                        required>{{ old('description', $blueprint->description) }}</x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>

                        <!-- URL -->
                        <div class="mb-4">
                            <x-input-label for="url" :value="__('URL')"/>
                            <x-text-input id="url" class="block mt-1 w-full" type="url" name="url"
                                          :value="old('url', $blueprint->url)" required/>
                            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <x-input-label for="category_id" :value="__('Category')"/>
                            <select id="category_id" name="category_id"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                    required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ old('category_id', $blueprint->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                        </div>

                        <!-- User -->
                        <div class="mb-4">
                            <x-input-label for="user_id" :value="__('Author')"/>
                            <select id="user_id" name="user_id"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                    required>
                                <option value="">Select an author</option>
                                @foreach($users as $user)
                                    <option
                                        value="{{ $user->id }}" {{ old('user_id', $blueprint->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                        </div>


                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.blueprints.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-gray-400 dark:focus:bg-gray-600 active:bg-gray-500 dark:active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                                Cancel
                            </a>
                            <x-primary-button>
                                {{ __('Update Blueprint') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

