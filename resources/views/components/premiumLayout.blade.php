<x-initialLayout>
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-10 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-3xl">
            {{ $slot }}
            <div class="mt-8 text-center">
                <div class="flex justify-center space-x-4">
                    @if ($sharedData['isPremium'] === 0)
                        <form action="/subscribe" method="POST"
                            class="px-6 py-3 bg-green-500 text-white rounded hover:bg-green-600">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="">
                                Subscribe
                            </button>
                        </form>
                    @else
                        <form action="/unsubscribe" method="POST"
                            class="px-6 py-3 bg-red-500 text-white rounded hover:bg-red-600">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="">
                                Unsubscribe
                            </button>
                        </form>
                    @endif

                    <a href="/homepage" class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </main>
</x-initialLayout>
