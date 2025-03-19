<x-homepageLayout>
    <!-- Recently Shortened URLs -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Your Shortened URLs</h2>
        <div class="mt-5">{{ $ownedShortenedURLs->links() }}</div>
        <div class="overflow-x-auto">
            @unless ($ownedShortenedURLs->isEmpty())
            
                @if (auth()->user()->isPremium)
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Label</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Original URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Short URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Clicks</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Expires in</th>
                                {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Clicks</th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ownedShortenedURLs as $osurls)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $osurls->label }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $osurls->longURL }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/{{ $osurls->shortURL }}"
                                            class="text-blue-500 hover:underline">{{ $osurls->shortURL }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $osurls->clickCount === -1 ? 'Click Count Disabled' : $osurls->clickCount }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ floor(\Carbon\Carbon::now()->diffInDays($osurls->expiration_date)) . ' Days' }}
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap">0</td> --}}
                                </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>

                    </table>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Original URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Short URL</th>
                                {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Clicks</th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ownedShortenedURLs as $osurls)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $osurls->longURL }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/{{ $osurls->shortURL }}"
                                            class="text-blue-500 hover:underline">{{ $osurls->shortURL }}</a>
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap">0</td> --}}
                                </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>

                    </table>
                @endif
            @else
                <h2><strong>{{ auth()->user()->username }}</strong>, you dont' have any personal URLs.
                </h2>
                <p class="lead text-muted"></p>
            @endunless
        </div>
    </div>
</x-homepageLayout>
