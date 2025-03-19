<x-initialLayout>
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-10">
        <div class="max-w-md mx-auto py-10">
            <h2 class="text-center text-2xl font-bold mb-4">Upload a New Avatar</h2>
            <form action="/profile/{{ $userData->username }}/manage-avatar" method="POST"
                enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <input type="file" name="avatar"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    @error('avatar')
                        <p class="mt-1 text-sm text-red-600 shadow-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-initialLayout>
