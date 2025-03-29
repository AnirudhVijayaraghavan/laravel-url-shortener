<div class="bg-white shadow rounded-lg p-6">
    {{-- Success is as dangerous as failure. --}}
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-gray-800">User Records</h2>
        <div class="flex space-x-2">
            <input type="text" name="search" placeholder="Search ..."
                class="border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Search</button>
        </div>
    </div>
    <!-- Remove horizontal scroll by hiding overflow-x -->
    <div class="overflow-x-hidden">
        <!-- Use table-fixed to force columns to adjust -->
        <table class="min-w-full divide-y divide-gray-200 table-fixed">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">isPremium
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">isAdmin
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($results as $record)
                    <tr>
                        <td class="px-2 py-4 text-sm text-gray-900 break-words">{{ $record->id }}</td>
                        <td class="px-2 py-4 text-sm text-gray-900 break-words">{{ $record->username }}</td>
                        <td class="px-2 py-4 text-sm text-gray-900 break-words">{{ $record->email }}</td>
                        {{-- <td class="px-2 py-4 text-sm break-words">
                            <a href="{{ url($record->shortURL) }}" class="text-blue-500 hover:underline"
                                target="_blank">
                                {{ $record->shortURL }}
                            </a>
                        </td> --}}
                        <td class="px-2 py-4 text-sm text-gray-900 break-words">{{ $record->isPremium }}</td>
                        <td class="px-2 py-4 text-sm text-gray-900 break-words">{{ $record->isAdmin }}
                        </td>
                        <td class="px-2 py-4 text-sm break-words">
                            <div class="flex space-x-2">
                                {{-- Uncomment and add actions as needed --}}
                                <div x-data="{ open: false }">
                                    <!-- Trigger Button -->
                                    <button @click="open = true" class="text-red-500 hover:text-red-700">Delete</button>

                                    <!-- Modal -->
                                    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50"
                                        style="display: none;">
                                        <!-- Backdrop -->
                                        <div class="absolute inset-0 bg-black opacity-50" @click="open = false"></div>

                                        <!-- Modal Content -->
                                        <div class="bg-white rounded-lg p-6 z-10 max-w-sm mx-auto">
                                            <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
                                            <p class="mb-6">Are you sure you want to delete this User?</p>
                                            <div class="flex justify-end space-x-4">
                                                <button @click="open = false"
                                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                                                <form action="/siteadmin/{{ $record->id }}/users/delete" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="mt-4">
        {{ $results->links() }}
    </div>
</div>
