<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perpustakaan</title>
   <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
<script src="{{ asset('build/assets/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
     <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['"Playfair Display"', 'serif'],
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'library-primary': '#4B6A47',
                        'library-secondary': '#D4A373',
                        'library-accent': '#A5BECC',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-200 min-h-screen font-poppins flex items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Gambar Ilustrasi -->
        <div class="md:w-1/2 bg-gradient-to-b from-blue-900 to-gray-800 p-8 flex flex-col justify-center items-center text-center text-white">
            <div class="mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h1 class="text-3xl font-playfair font-bold mb-2">Sistem Perpustakaan</h1>
        </div>

        <!-- Form Login -->
        <div class="md:w-1/2 p-8 md:p-10">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                <h2 class="text-2xl font-playfair font-bold text-center text-gray-800">Masuk ke Akun</h2>

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5 mr-1.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Username (name) --}}
                <div class="space-y-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500 transition duration-200"
                            placeholder="Masukkan username">
                    </div>
                </div>

                {{-- Password --}}
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500 transition duration-200"
                            placeholder="Masukkan password">
                    </div>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button type="submit"
                        class="w-full bg-blue-700 text-white py-2.5 px-4 rounded-lg cursor-pointer hover:scale-105 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 font-medium">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>