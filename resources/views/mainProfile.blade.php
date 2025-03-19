<x-initialLayout>
    <main class="flex-grow container mx-auto px-4 py-10 bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Profile Header Section -->
        <div class="flex flex-col items-center mb-8">
            <div class="flex items-center space-x-4">
                <!-- Manage Avatar Button -->
                <a href="/profile/{{ $userData->username }}/manage-avatar"
                    class="flex items-center justify-center w-24 h-24 rounded-full bg-gray-200 hover:bg-gray-300 shadow-lg">
                    
                    <img class="flex items-center justify-center w-24 h-24 rounded-full" src="{{$userData->avatar}}" alt="">
                </a>
                <!-- Username Display -->
                <h1 class="text-3xl font-bold text-gray-800">{{ $userData->username }}</h1>
            </div>
            <p class="text-gray-600 mt-7 font-bold">Manage your profile settings</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-8">
            <!-- Update Email Card -->
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Update Email</h2>
                <h3 class="  mb-4">Current e-mail: {{ $userData->email }}</h3>
                <form action="/profile/{{ $userData->username }}/update-email" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $userData->email) }}"
                            required
                            class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Update Email
                        </button>
                    </div>
                </form>
            </div>

            <!-- Update Username Card -->
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Update Username</h2>
                <h3 class="  mb-4">Current username: {{ $userData->username }}</h3>
                <form action="/profile/{{ $userData->username }}/update-username" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="username" class="block text-gray-700 font-semibold mb-1">Username</label>
                        <input type="text" name="username" id="username"
                            value="{{ old('username', $userData->username) }}" required
                            class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Update Username
                        </button>
                    </div>
                </form>
            </div>

            <!-- Update Password Card -->
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Update Password</h2>
                <form action="/profile/{{ $userData->username }}/update-password" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-1">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter new password"
                            class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm new password"
                            class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-initialLayout>
