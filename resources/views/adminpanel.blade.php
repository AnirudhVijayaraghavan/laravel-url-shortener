<x-initialLayout>
    <div class="flex min-h-screen bg-gray-100 font-sans">
        <!-- Sidebar Navigation (Sticky) -->
        <aside class="w-64 bg-white shadow-lg sticky top-0 h-screen overflow-y-">
            <div class="p-6 border-b">
                <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
            </div>
            <nav class="mt-4">
                <a wire:navigate href="/siteadmin" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ Request::segment(2) == '' ? 'bg-gray-200' : '' }}">
                    URL Management
                </a>
                <a wire:navigate href="/siteadmin/users" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ Request::segment(2) == 'users' ? 'bg-gray-200' : '' }}">
                    User Management
                </a>
                <a wire:navigate href="/homepage" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                    Return to Homepage
                </a>
            </nav>
        </aside>
        @if (Request::segment(2) === 'users')
            <div class="flex-grow p-6 overflow-y-auto">
                <!-- Summary Stats -->
                <livewire:summary-stats />

                <!-- URL Records Table -->
                <livewire:admin-users-table/>

            </div>
        @else
            <!-- Main Content (Scrollable) -->
            <div class="flex-grow p-6 overflow-y-auto">
                <!-- Summary Stats -->
                <livewire:summary-stats />

                <!-- URL Records Table -->
                <livewire:admin-panel-u-r-l-table />

                <br>

                <!-- Guest Table -->
                <livewire:admin-panel-guest-table />
            </div>
        @endif

    </div>
</x-initialLayout>
