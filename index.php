<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#1e40af',
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">SIBAL-<span class="text-green-600">UINAM</span></h1>
                <p class="text-gray-500">Sistem Informasi Barang Hilang</p>
            </div>
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Lapor Barang
            </a>
        </div>

        <div class="mb-6">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="search" placeholder="Cari nama barang hilang..." class="w-full py-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-md">
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse" id="dataTable">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm font-bold">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Foto</th>
                        <th class="p-4 border-b">Barang & Deskripsi</th>
                        <th class="p-4 border-b">Lokasi & Tanggal</th>
                        <th class="p-4 border-b">Status</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</body>
</html>