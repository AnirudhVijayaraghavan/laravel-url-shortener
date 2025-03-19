<x-initialLayout>
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row items-center">
            @auth
                <!-- Left Column: Lorem Ipsum Text -->
                <div class="w-1/2 mx-auto bg-gray-200 p-4 ">
                    <h2 class="text-3xl font-bold mb-4">Welcome to URLShortener</h2>
                    <p class="text-gray-700">
                        Just another urlshortener :)
                    </p>
                    <br>
                    <a href="/homepage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Visit your page</a>

                    @if (auth()->user()->isAdmin === 1)
                        <a href="{{ route('siteadmin') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Admin Panel</a>
                    @endif
                </div>
            @else
                <!-- Left Column: Lorem Ipsum Text -->
                <div class="md:w-1/2 md:pr-8 ">
                    <h2 class="text-3xl font-bold mb-4">Welcome to URLShortener</h2>
                    <p class="text-gray-700">
                        Just another urlshortener :)
                    </p>
                    <form action="/shortenguest" method="POST" class="space-y-6">
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
                <!-- Right Column: Signup Form -->
                <div class="md:w-1/2 md:pl-8 mt-8 md:mt-0">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-2xl font-bold mb-4">Sign Up</h3>
                        <form action="/register" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="username" class="block text-gray-700">Username</label>
                                <input type="text" value="{{ old('username') }}" id="username" name="username"
                                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring"
                                    placeholder="Enter your username">
                                @error('username')
                                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" value="{{ old('email') }}" id="email" name="email"
                                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring"
                                    placeholder="Enter your email">
                                @error('email')
                                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block text-gray-700">Password</label>
                                <input type="password" id="password" name="password"
                                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring"
                                    placeholder="Enter your password">
                                @error('password')
                                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password-confirm" class="block text-gray-700"><small>Confirm
                                        Password</small></label>
                                <input name="password_confirmation" id="password-confirm"
                                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring" type="password"
                                    placeholder="Confirm password" />
                                @error('password_confirmation')
                                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                                Create Account
                            </button>
                        </form>
                    </div>
            </div> @endauth

        </div>
    </main>
</x-initialLayout>
