<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen px-4 py-6">

    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, Admin!</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
                    Logout
                </button>
            </form>
        </div>

        <!-- Dashboard Menu -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kelola Bus -->
            <a href="{{ route('buses.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center space-x-4">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 16v1a1 1 0 001 1h1m14-2v1a1 1 0 01-1 1h-1M4 10V8a4 4 0 014-4h8a4 4 0 014 4v2M4 10h16M4 10v6h16v-6" />
                    </svg>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700">Kelola Bus</h2>
                        <p class="text-gray-500 text-sm">Tambah, ubah, dan hapus data bus</p>
                    </div>
                </div>
            </a>

            <!-- Kelola Jadwal -->
            <a href="{{ route('schedules.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center space-x-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M8 7V3M16 7V3M3 11h18M5 19h14a2 2 0 002-2V7H3v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700">Kelola Jadwal</h2>
                        <p class="text-gray-500 text-sm">Atur jadwal keberangkatan bus</p>
                    </div>
                </div>
            </a>

            <!-- Kelola Pemesanan -->
            <a href="{{ route('bookings.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center space-x-4">
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 17v-6h13v6M3 6h18M3 6v12a2 2 0 002 2h14a2 2 0 002-2V6H3z" />
                    </svg>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700">Kelola Pemesanan</h2>
                        <p class="text-gray-500 text-sm">Lihat dan kelola tiket yang dipesan</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</body>
</html>
