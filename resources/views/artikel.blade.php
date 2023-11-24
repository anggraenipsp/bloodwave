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
            <a href="{{ route ('admin.artikel')}}" aria-label="artikel"
            class="relative px-4 py-3 flex items-center space-x-4 rounded-lg text-red-medium bg-gradient-to-r from-cream-dark to-cream-medium">
                <i class="fas fa-book text-red-medium"></i>
                <span class="-mr-1 font-medium">Artikel</span>
            </a>
            </button>
          

            <!-- Validasi Riwayat -->
            <button>
            <a href="{{ route ('validasi')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-cream-medium group">
                <i class="fas fa-exchange-alt"></i>
                <span>Riwayat Donor</span>
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

    <!-- Tambah Artikel-->
    <div class="relative p-4 w-full max-w-full max-h-full">
                <!-- Modal content -->
                    <div class="relative bg-red-medium rounded-lg shadow">
                    <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-red-dark">
                            <h3 class="text-lg font-semibold text-white">
                                Tambah Artikel Baru
                            </h3>
                        </div>
                    <!-- Modal body -->
                    <form action="/admin/artikel" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                    @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="judul" class="block mb-2 text-sm font-medium text-white dark:text-white">Judul</label>
                                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketik Judul Artikel" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="opening" class="block mb-2 text-sm font-medium text-white dark:text-white">Isi Artikel</label>
                                <textarea name="opening" id="opening" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Donor Darah merupaka..."></textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="asal_usul" class="block mb-2 text-sm font-medium text-white dark:text-white">Tanggal Unggah</label>
                                <input type="date" class="form-control" id="tanggal_donor" name="tanggal_donor" value="">
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="foto">Upload file</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="foto" name="foto" id="foto" type="file" required="">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="foto">SVG, PNG, JPG or GIF</p>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Post
                        </button>
                    </form>
               
                </div>
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