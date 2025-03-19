<x-initialLayout>
    <!-- Main Content -->
    <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip"
            data-placement="top"><i class="fas fa-search"></i></a>
    <main class="flex-grow container mx-auto px-4 py-10">
        <!-- URL Shortener Form -->
        <div class="bg-white shadow rounded-lg p-6 mb-10">
            <h2 class="text-2xl font-bold mb-4">Hi {{ auth()->user()->username }}, shorten a new URL: </h2>
            <form action="/shorten" method="POST" class="space-y-6">
                @csrf

                <!-- Original URL -->
                <div>
                    <input value="{{ old('original_url') }}" type="text" name="original_url"
                        placeholder="Enter the URL to shorten" required
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    @error('original_url')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                @if (auth()->user()->isPremium)
                    @csrf
                    <h2 class="text-2xl font-bold mb-4">Optional features: </h2>
                    <!-- Label -->
                    <div>
                        <input value="{{ old('label') }}" type="text" name="label"
                            placeholder="Add a Label (optional)"
                            class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('label')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Custom Alias -->
                    <div>
                        <input value="{{ old('custom_alias') }}" type="text" name="custom_alias"
                            placeholder="Custom alias (optional)"
                            class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('custom_alias')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Expiration Date -->
                    <div>
                        <input value="{{ old('expiration_date') }}" type="date" name="expiration_date"
                            class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('expiration_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Enable Click Counter -->
                    <div class="flex items-center">
                        <input type="hidden" name="enable_click_count" value="0">
                        <input type="checkbox" id="enable_click_count" name="enable_click_count" value="1" class="mr-2"
                            {{ old('enable_click_count') == '1' ? 'checked' : '' }}>
                        <label for="enable_click_count" class="text-gray-700">
                            Enable click counter
                        </label>
                    </div>
                @endif


                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-1/6 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Shorten URL
                    </button>
                </div>
            </form>
            <br>
            <hr>
            <h2 class="text-2xl font-bold mb-4">Please use the following URL:
                @if (session()->has('displaySURL'))
                    <div class="container container--narrow">
                        <div class="alert alert-success text-center">
                            {{ session('displaySURL') }}
                        </div>
                    </div>
                @endif
                @if (session()->has('displayDUP'))
                    <div class="container container--narrow">
                        <div class="alert alert-danger text-center">
                            {{ session('displayDUP') }}
                        </div>
                    </div>
                @endif
            </h2>
        </div>
        
        {{$slot}}
        
    </main>
</x-initialLayout>
