<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kost Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
  <header class="bg-white shadow p-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di Kost Modern</h1>
  </header>
  <main class="max-w-6xl mx-auto px-4">
    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-4">Daftar Kamar Kosong</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Dummy kamar kosong -->
        <div class="bg-white rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 101</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.000.000</div>
          <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs w-max">Kosong</span>
        </div>
        <div class="bg-white rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 102</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.200.000</div>
          <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs w-max">Kosong</span>
        </div>
        <div class="bg-white rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 201</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.100.000</div>
          <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs w-max">Kosong</span>
        </div>
      </div>
    </section>
    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-4">Kamar Jatuh Tempo Bayar</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Dummy kamar jatuh tempo -->
        <div class="bg-yellow-50 rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 202</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.300.000</div>
          <div class="text-gray-500 text-sm mb-1">Jatuh Tempo: 10/06/2024</div>
          <span class="inline-block px-2 py-1 bg-yellow-200 text-yellow-800 rounded text-xs w-max">Jatuh Tempo</span>
        </div>
        <div class="bg-yellow-50 rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 203</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.250.000</div>
          <div class="text-gray-500 text-sm mb-1">Jatuh Tempo: 12/06/2024</div>
          <span class="inline-block px-2 py-1 bg-yellow-200 text-yellow-800 rounded text-xs w-max">Jatuh Tempo</span>
        </div>
      </div>
    </section>
    <section>
      <h2 class="text-xl font-semibold mb-4">Kamar Terlambat Bayar</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Dummy kamar terlambat bayar -->
        <div class="bg-red-50 rounded-lg shadow p-4 flex flex-col">
          <div class="font-bold text-lg mb-2">Kamar 301</div>
          <div class="text-gray-600 mb-1">Harga: Rp 1.400.000</div>
          <div class="text-gray-500 text-sm mb-1">Jatuh Tempo: 01/06/2024</div>
          <span class="inline-block px-2 py-1 bg-red-200 text-red-800 rounded text-xs w-max">Terlambat</span>
        </div>
      </div>
    </section>
  </main>
  <footer class="mt-12 p-4 text-center text-gray-400 text-sm">
    &copy; 2024 Kost Modern. All rights reserved.
  </footer>
</body>
</html> 