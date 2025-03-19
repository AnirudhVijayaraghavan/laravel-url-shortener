<x-initialLayout>
    <!-- Main Content -->
    <main
        class="flex-grow container mx-auto px-4 py-10 bg-gradient-to-br from-gray-50 to-gray-100>
        <div class="grid
        grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Dashboard Summary Cards -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-700">Total URLs</h2>
                <p class="text-3xl font-bold text-gray-900">{{ $totalUrls ?? '0' }}</p>
            </div>
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-700">Total Clicks</h2>
                <p class="text-3xl font-bold text-gray-900">{{ $totalClicks ?? '0' }}</p>
            </div>
            <div class="bg-white bg-opacity-80 shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-700">Active Users</h2>
                <p class="text-3xl font-bold text-gray-900">{{ $activeUsers ?? '0' }}</p>
            </div>
        </div>

        <!-- URL Records Table -->
        <div class="lg:col-span-3 bg-white bg-opacity-80 p-6 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">URL Records</h2>
                <div class="flex space-x-2">
                    <input type="text" name="search" placeholder="Search URLs..."
                        class="border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Search</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Original URL</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Short URL</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Clicks</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Expiration</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- @foreach ($urlRecords as $record)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->longURL }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <a href="{{ url($record->shortURL) }}" class="text-blue-500 hover:underline" target="_blank">
                    {{ $record->shortURL }}
                  </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->clickCount }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->user->username ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->expiration_date }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <div class="flex space-x-2">
                    <a href="{{ route('admin.url.edit', $record->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                    <form action="{{ route('admin.url.destroy', $record->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this URL?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach --}}
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            {{-- <div class="mt-4">
          {{ $urlRecords->links() }}
        </div> --}}
        </div>
        </div>
    </main>
</x-initialLayout>
