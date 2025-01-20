<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        body {
            background: linear-gradient(90deg, #ff7f50, #ff4500, #ff6347, #ff7f50);
            background-size: 300% 300%;
            animation: gradientMove 3s ease infinite;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-screen-xl mx-auto flex bg-white rounded-lg shadow-lg overflow-hidden sm:w-11/12 min-[320px]:w-11/12">
        <!-- Left Section -->
        <div class="w-full p-8 lg:w-1/2 sm:h-full">
            <h2 class="text-3xl font-bold text-gray-800">Sign In</h2>
            <form method="POST" action="{{ route('login') }}" class="mt-8">
                @csrf
                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                              </svg>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                              </svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-800">Remember me</label>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black w-full">
                        SIGN IN
                    </button>
                </div>
            </form>

            <!-- Registration Link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-orange-600 hover:underline">Register here</a>
            </p>
        </div>

        <!-- Right Section -->
        <div class="hidden lg:flex w-1/2 items-center justify-center p-8">
            <img src="{{ asset('assets/img/image.png') }}" alt="Image" class="max-w-full h-auto">
        </div>
    </div>
</body>
</html>
