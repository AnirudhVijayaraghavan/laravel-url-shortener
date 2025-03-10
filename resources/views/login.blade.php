<x-initialLayout>
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-center">Login</h3>
                    <form action="/login" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="username" class="block text-gray-700">Email</label>
                            <input type="username" value="{{ old('username') }}" id="username" name="username"
                                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter your username">
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter your password">
                        </div>
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                            Login
                        </button>
                    </form>
                    <p class="mt-4 text-center text-gray-600">
                        Don't have an account? <a href="/" class="text-blue-500 hover:underline">Sign up here</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-initialLayout>
