<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('How It Works') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Using Blueprints</h3>
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                                    1
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Choose a blueprint</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Browse the <a
                                        class="text-blue-600 hover:underline" href="{{ route('blueprints.index') }}">collection
                                        of blueprints</a> and select
                                    one that fits your needs.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                                    2
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Import blueprint</h3>
                                <div class="flex items-center">
                                    <p class="mr-2 mt-2 text-gray-600 dark:text-gray-300">Click on the </p>
                                    <a href="https://yt.be/notarickroll"
                                       target="_blank" rel="noreferrer noopener"><img
                                            class="mt-2"
                                            src="https://my.home-assistant.io/badges/blueprint_import.svg"
                                            alt="Open your Home Assistant instance and show the blueprint import dialog with a specific blueprint pre-filled."/></a>
                                    <p class="ml-2 mt-2 text-gray-600 dark:text-gray-300"> button and follow the
                                        instructions
                                        on screen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                                    3
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Configure
                                    automation</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Follow the instructions provided in the
                                    blueprint to set up your automation in Home Assistant.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                                    4
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profit</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Enjoy your new automation and your
                                    saved time!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
