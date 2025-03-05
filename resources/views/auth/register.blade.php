<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - {{ config('app.name') }}</title>
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
        <div class="hidden lg:flex w-1/2 items-center justify-center p-8">
            <img src="{{ asset('assets/img/image.png') }}" alt="Image" class="max-w-full h-auto">
        </div>

        <!-- Right Section -->
        <div class="w-full p-8 lg:w-1/2 sm:h-full">
            <h2 class="text-3xl font-bold text-gray-800">Sign Up</h2>
            <form method="POST" action="/register" class="mt-8">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                              </svg>
                        </span>
                        <input id="username" type="text" name="name" required autocomplete="username" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                              </svg>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                              </svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1 relative flex items-center rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                              </svg>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full pl-10 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" required class="block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Select Role</option>
                        <option value="1">Student</option>
                        <option value="2">Teacher</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black w-full">
                        SIGN UP
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-orange-600 hover:underline">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
