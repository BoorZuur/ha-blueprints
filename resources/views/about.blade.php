<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="mb-6">We want to help you find useful Home Assistant blueprints to make your smart home
                        setup easier and more efficient.</p>

                    <h3 class="text-2xl font-bold mb-4">Features</h3>
                    <ul class="list-disc list-inside mb-6">
                        <li>Browse a wide variety of Home Assistant blueprints.</li>
                        <li>Submit your own blueprints to share with the community.</li>
                        <li>Search and filter blueprints based on your needs.</li>
                    </ul>

                    <h3 class="text-2xl font-bold mb-4">Contact Us</h3>
                    <p>If you have any questions or would like to learn more about our services, please feel free to
                        <a href="{{ route('contact') }}" class="text-blue-600 hover:underline">contact us</a>.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
