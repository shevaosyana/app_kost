<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Kost</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Login Admin Kost</h2>
    <form action="#" method="post" class="space-y-4">
      <div>
        <label class="block text-gray-700 mb-1" for="username">Username</label>
        <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan username" required>
      </div>
      <div>
        <label class="block text-gray-700 mb-1" for="password">Password</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold">Login</button>
    </form>
  </div>
</body>
</html> 