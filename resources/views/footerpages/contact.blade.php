<x-initialLayout>
    <main class="flex-grow container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Contact Us</h1>
        <div class="bg-white shadow rounded-lg p-6">
            <p class="mb-4">
                Have questions or feedback? We'd love to hear from you.
            </p>
            <p class="mb-4">
                Please fill out the form below or email us at <a href="mailto:support@example.com"
                    class="text-blue-500 hover:underline">anirudh1997@hotmail.com</a>.
            </p>
            <form action="/contact" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-1">Message</label>
                    <textarea name="message" id="message" rows="5" required
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-initialLayout>
