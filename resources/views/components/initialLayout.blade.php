<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>URL Shortener - Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-gray-800">URLShortener &copy; {{ date('Y') }}</a>
            @auth
                <div class="flex items-center space-x-4">
                    @if (auth()->user()->isPremium)
                    <a href="/premium"
                        class="{{ Request::segment(1) == 'premium' ? 'invisible' : '' }} px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Premium</a>
                    @else
                    <a href="/premium"
                        class="{{ Request::segment(1) == 'premium' ? 'invisible' : '' }} px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Premium</a>
                    @endif
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Logout</button>
                    </form>
                </div>
            @else
                <a href="/login"
                    class="{{ Request::segment(1) == 'login' ? 'invisible' : '' }} px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
            @endauth
        </div>
    </header>

    {{-- end of header, below is the success / failure messages --}}
    @if (session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('failure'))
        <div class="container container--narrow">
            <div class="alert alert-danger text-center">
                {{ session('failure') }}
            </div>
        </div>
    @endif

    {{ $slot }}
    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-6 flex justify-around">
            <a href="#" class="hover:underline">About</a>
            <a href="#" class="hover:underline">Contact</a>
            <a href="#" class="hover:underline">Privacy Policy</a>
            <a href="#" class="hover:underline">Terms of Service</a>
        </div>
    </footer>
</body>

</html>
