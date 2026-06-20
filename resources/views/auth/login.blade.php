@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Mak Len</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #0f0f0f;
            font-family: 'Inter', sans-serif;
        }

        .gold {
            color: #fbbf24;
        }

        .bg-gold {
            background: #fbbf24;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">

    <!-- CARD -->
    <div class="bg-[#1a1a1a] p-8 rounded-xl w-full max-w-md shadow-lg border border-gray-800">

        <!-- LOGO -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold gold">Mak Len Bakery</h1>
            <p class="text-gray-400 text-sm">Admin Login</p>
        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="text-sm text-gray-400">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 p-3 bg-gray-900 rounded text-white outline-none"
                    required>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="text-sm text-gray-400">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 p-3 bg-gray-900 rounded text-white outline-none"
                    required>
            </div>

            <!-- REMEMBER -->
            <div class="flex items-center justify-between mb-6 text-sm">
                <label class="flex items-center gap-2 text-gray-400">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-gold text-black py-3 rounded font-semibold hover:opacity-90">
                LOGIN
            </button>

        </form>
    </div>

</body>
</html>