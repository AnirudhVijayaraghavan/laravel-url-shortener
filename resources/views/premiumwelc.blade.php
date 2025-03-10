<x-premiumLayout :sharedData="$sharedData">
    @if ($sharedData['isPremium'] === 0)
        <h1 class="text-3xl font-bold mb-6 text-center">Upgrade to Premium</h1>
        <p class="text-gray-700 mb-8 text-center">
            Unlock the full potential of URLShortener with our premium subscription!
        </p>
        <ul class="space-y-4">
            <li class="flex items-center">
                <!-- Custom alias shortening link -->
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Create your own custom shortened link!</span>
            </li>
            <li class="flex items-center">
                <!-- Click counter -->
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Find out how many people clicked on your link!</span>
            </li>
            <li class="flex items-center">
                <!-- Expiration date setter -->
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Set your own expiration date (upto 2 years)!</span>
            </li>
            <li class="flex items-center">
                <!-- Default expiration date is 1 year -->
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Your generated links last for 1 year by default (instead of 30
                    days)!</span>
            </li>
            <li class="flex items-center">
                <!-- Permissions on links -->
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Control your links further with our groups management, and permissions
                    features!</span>
            </li>
        </ul>
    @else
        <h1 class="text-3xl font-bold mb-6 text-center">You are a Premium Member.</h1>
        <p class="text-gray-700 mb-8 text-center">
            You have unlocked the full potential of URLShortener with our premium subscription!
        </p>
        <ul class="space-y-4">
            <li class="flex items-center">
                <!-- Custom alias shortening link -->
                <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Create your own custom shortened link!</span>
            </li>
            <li class="flex items-center">
                <!-- Click counter -->
                <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Find out how many people clicked on your link!</span>
            </li>
            <li class="flex items-center">
                <!-- Expiration date setter -->
                <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Set your own expiration date (upto 2 years)!</span>
            </li>
            <li class="flex items-center">
                <!-- Default expiration date is 1 year -->
                <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Your generated links last for 1 year by default (instead of 30
                    days)!</span>
            </li>
            <li class="flex items-center">
                <!-- Permissions on links -->
                <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-800">Control your links further with our groups management, and permissions
                    features!</span>
            </li>
        </ul>
    @endif

</x-premiumLayout>
