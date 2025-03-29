<x-initialLayout>
    <main class="flex-grow container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">Edit URL Record</h1>
        <div class="bg-white shadow rounded-lg p-6">
            <form action="/siteadmin/{{ $url->id }}/edit" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Original URL -->
                <div>
                    <label for="longURL" class="block text-gray-700 font-semibold mb-1">Original URL</label>
                    <input type="text" id="longURL" name="longURL" value="{{ old('longURL', $url->longURL) }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                    @error('longURL')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Custom Alias -->
                <div>
                    <label for="custom_alias" class="block text-gray-700 font-semibold mb-1">Custom Alias</label>
                    <input type="text" id="custom_alias" name="custom_alias"
                        value="{{ old('custom_alias', str_replace('a/', '', $url->shortURL)) }}"
                        placeholder="Optional custom alias (e.g., myalias)"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    @error('custom_alias')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Label -->
                <div>
                    <label for="label" class="block text-gray-700 font-semibold mb-1">Label</label>
                    <input type="text" id="label" name="label" value="{{ old('label', $url->label) }}"
                        placeholder="Optional label"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    @error('label')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expiration Date -->
                <div>
                    <label for="expiration_date" class="block text-gray-700 font-semibold mb-1">Expiration Date</label>
                    <input type="date" id="expiration_date" name="expiration_date"
                        value="{{ old('expiration_date', $url->expiration_date ? \Carbon\Carbon::parse($url->expiration_date)->format('Y-m-d') : '') }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    @error('expiration_date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Update URL
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-initialLayout>
