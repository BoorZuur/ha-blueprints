<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blueprint Details') }}
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
                <div class="p-6 bg-white dark:bg-gray-800">
                    <!-- Header with Icon and Title -->
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0">
                            <div
                                class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                @svg($blueprint->category->icon ?? 'mdi-file-document', 'w-8 h-8 text-blue-600 dark:text-blue-400')
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $blueprint->name }}</h3>
                            <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    @svg('mdi-account', 'w-4 h-4')
                                    <span>{{ $blueprint->user->name }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    @svg($blueprint->category->icon ?? 'mdi-tag', 'w-4 h-4')
                                    <span>{{ $blueprint->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-2">
                            Description</h4>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $blueprint->description }}</p>
                    </div>

                    <!-- Import to Home Assistant -->
                    @if($blueprint->url)
                        <div class="mb-6">
                            <a href="https://my.home-assistant.io/redirect/blueprint_import/?blueprint_url={{ urlencode($blueprint->url) }}"
                               target="_blank"
                               rel="noreferrer noopener"
                               class="inline-block hover:opacity-80 transition">
                                <img src="https://my.home-assistant.io/badges/blueprint_import.svg"
                                     alt="Open your Home Assistant instance and show the blueprint import dialog with a specific blueprint pre-filled."/>
                            </a>
                        </div>
                    @endif

                    <!-- Blueprint Code -->
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                                Blueprint Code</h4>
                            <button onclick="copyToClipboard()"
                                    class="inline-flex items-center px-3 py-1.5 bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition">
                                @svg('mdi-content-copy', 'w-4 h-4 mr-1')
                                <span id="copy-text">Copy</span>
                            </button>
                        </div>
                        <div class="relative">
                            <pre id="blueprint-code"
                                 class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 p-4 rounded-lg overflow-x-auto border border-gray-200 dark:border-gray-700 text-sm leading-relaxed"><code>{{ $blueprint->blueprint }}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const codeElement = document.getElementById('blueprint-code');
            const textToCopy = codeElement.textContent;
            const copyButton = document.getElementById('copy-text');

            navigator.clipboard.writeText(textToCopy).then(() => {
                // Change button text to indicate success
                copyButton.textContent = 'Copied!';

                // Reset button text after 2 seconds
                setTimeout(() => {
                    copyButton.textContent = 'Copy';
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy text: ', err);
                copyButton.textContent = 'Error';
                setTimeout(() => {
                    copyButton.textContent = 'Copy';
                }, 2000);
            });
        }
    </script>
</x-app-layout>
