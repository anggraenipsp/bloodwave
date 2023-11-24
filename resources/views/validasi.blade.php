<!DOCTYPE html>
<html lang="es">
@vite('resources/css/app.css')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodwave - Darah Anda, Harapan Mereka</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>

<body class="bg-cream-medium">
    <nav class="bg-red-dark border-b border-red-medium">
        <div class="flex justify-between items-center px-9">
            <!-- Menu button -->
            <button id="menuBtn">
                <i class="fas fa-bars text-cream-medium text-lg"></i>
            </button>

            <!-- Logo -->
            <div class="ml-1">
                <img src="img/logo.png" alt="Bloodwave" alt="logo" class="w-28 h-12 ml-6">
            </div>

            <!-- notifikasi -->
            <div class="space-x-4">
                <button>
                    <i class="fas fa-bell text-cream-medium text-lg"></i>
            </div>
        </div>
    </nav>

    <!-- Slide Samping -->
    <div id="sideNav" class="lg:block hidden bg-red-dark w-64 h-screen fixed rounded-none border-none">
        <!-- Items -->
        <div class="p-4 space-y-4">
            <!-- Dashboard -->
            <button>
            <a href="{{ route ('admin')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-cream-medium group">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            </button>
    
            <!-- Artikel -->
            <button>
            <a href="{{ route ('admin.artikel')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-cream-medium group">
                <i class="fas fa-book"></i>
                <span>Artikel</span>
            </a>
            </button>

            <!-- Validasi Riwayat -->
            <button>
            <a href="{{ route ('validasi')}}" aria-label="dashboard"
                class="relative px-4 py-3 flex items-center space-x-4 rounded-lg text-red-medium bg-gradient-to-r from-cream-dark to-cream-medium">
                <i class="fas fa-exchange-alt text-red-medium"></i>
                <span class="-mr-1 font-medium">Riwayat Donor</span>
            </a>

            </button>


            <!-- Log Out -->
            <button>
            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-cream-medium group">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
            </a>
            </button>

        </div>
    </div>

    <div class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <!-- Main Kontainer -->
        <div class="lg:flex gap-4 items-stretc">
            <!-- Welcome Admin -->
            <div class="bg-red-medium md:p-2 p-6 rounded-lg border border-red-dark mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                        <h2 class="text-4xl font-semibold text-cream-medium">Nama Admin</h2>
                        <h6 class="font-semibold text-cream-medium">Lihat Update Hari Ini Yuk!</h6>
                    </div>
                </div>
            </div>

            <!-- Sub Kontainer -->
            <div class="bg-red-medium  p-4 rounded-lg xs:mb-4 max-w-full shadow-md lg:w-[65%]">
                <!-- -->
                <div class="flex flex-wrap justify-between h-full">
                    <!-- Kontainer Artikel -->
                    <div
                        class="flex-1 bg-gradient-to-r from-cream-dark to-cream-medium rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-cream-dark m-2">
                        <i class="fas fa-book text-red-dark text-4xl"></i>
                        <p class="text-red-dark">Artikel</p>
                    </div>

                    <!-- Kontainer Riwayat Donor -->
                    <div
                        class="flex-1 bg-gradient-to-r from-cream-dark to-cream-medium rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-cream-dark m-2">
                        <i class="fas fa-exchange-alt text-red-dark text-4xl"></i>
                        <p class="text-red-dark">Validasi Riwayat Donor</p>
                    </div>
                </div>
            </div>
        </div>

    <br>
    <!-- Tabel Yang Menampilkan Riwayat yang sudah di validasi -->
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Riwayat Donor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Input
                        </th>
                        <th scope="col" class="pr-10 py-3">
                            <span class="sr-only">Status</span>
                        </th>
                    </tr>
                    </thead>
                <tbody>
            
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            
                        </th>
                            <td class="px-6 py-4">
                            
                            </td>
                            <td class="px-6 py-4">
                            
                            </td>
                            <td class="pr-10 py-4 text-right">
                                <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Approved</a>
                                <form action="" method="POST" style="display: inline;">
                                
                                    
                                    <button type="submit" class="font-medium text-blue-600 dark:text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menolak riwayat donor ini?')">Rejected</button>
                                </form>
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>

    </div>
    <!-- isi end -->

<!-- div akhir -->
</div>
    <!-- Script  -->
    <script>

        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle('hidden');
        });
    </script>
</body>

</html>