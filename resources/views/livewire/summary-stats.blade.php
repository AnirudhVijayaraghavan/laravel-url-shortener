<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Total URLs</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $totalUrls }}</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Total Clicks</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $totalClicks }}</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Active Users</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $activeUsers }}</p>
    </div>
</div>
