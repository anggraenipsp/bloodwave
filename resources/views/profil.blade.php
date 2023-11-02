@vite('resources/css/app.css')
<!-- Header -->
<header class="bg-red-dark shadow-md">
    <div class="flex justify-between items-center py-2 px-5 border-b-2 border-grey-200">
        <div class="flex items-center">
        <!-- Logo -->
        <img src="img/logo.png" alt="Bloodwave" class="w-15 h-10 ml-4">
        </div>

         <!-- Navigasi Bar-->
       <div class="flex items-center space-x-2">
        <a href="#" class="px-2 py-2 text-white font-semibold hover:text-cream-dark rounded-lg text-sm">Beranda</a>
        <a href="#" class="px-2 py-2 text-white font-semibold hover:text-cream-dark rounded-lg text-sm">Riwayat Donor</a>
        <a href="#" class="px-2 py-2 text-white font-semibold hover:text-cream-dark rounded-lg text-sm">Event</a>
        <a href="#" class="px-2 py-2 text-white font-semibold hover:text-cream-dark rounded-lg text-sm">Let's Read</a>
        <a href="#" class="px-2 py-2 bg-white text-red-dark hover:bg-cream-dark font-bold rounded-lg text-sm">Keluar</a>
    </div>
    </div>
</header>
<div class="overflow-x-hidden bg-cream-medium">
    <nav class="px-6 py-4 bg-cream-medium shadow">
    </nav>

</div class="bg-cream-medium">
    <div class="px-6 py-8 bg-cream-medium">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-12/12">
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-red-dark rounded-lg shadow-md  hover:scale-105 duration-500">
                        <div>
                        <div class="flex justify-between">
                        <div class="mt-10">
                            <a href="#" class="text-2xl  font-bold text-white hover:underline">Hai Allisa</a>
                            <p class="mt-2 text-white">Yuk Cek Kondisi Kesehatanmu!</p>
                        </div>
                        <div class="relative h-32 w-32 ..."> 
                        <div class="absolute inset-y-0 right-19 w-16 ..."><img src="/img/hero.png" alt=""></div> 
                        </div>
                    </div>
                    </div>
                </div>
    <!-- component -->
    <section class="text-gray-600 body-font flex justify-center items-center">
    <div class="container px-5 py-5 mx-auto">
        <div class="flex justify-center -m-4 text-center ">
        <div class="p-4 w-1/3 hover:scale-105 duration-500">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-red-dark shadow-indigo-50 shadow-md">
            <div class="flex flex-col justify-center w-full">
                <h2 class="text-white  font-bold text-center">Golongan Darah</h2>
                <h3 class="mt-2 text-3xl font-bold text-white text-center">A</h3>
            </div>
            </div>
        </div>
        <div class="p-4 w-1/3 hover:scale-105 duration-500">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-red-dark shadow-indigo-50 shadow-md">
            <div class="flex flex-col justify-center w-full">
                <h2 class="text-white  font-bold text-center">Total Donor</h2>
                <h3 class="mt-2 text-3xl font-bold text-white text-center">9</h3>
            </div>
            </div>
        </div>
        </div>
        </div>
    </section>
<!-- component -->
<div class="container mx-auto p-4 lg:h-fit flex items-center justify-center ">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 ">
            <!-- Blog Entry 1 -->
            <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer hover:scale-105 duration-500">
              <img src="/img/profil.png" alt="" class="w-full h-auto object-cover rounded-lg">
              <div class="absolute bottom-0 left-0 right-0 h-40 bg-red-dark bg-opacity-75 backdrop-blur text-white p-4 rounded-b-lg">
                <h1 class="text-2xl font-semibold text-center">Donor Terakhir</h1>
                <p class="mt-2 text-center">Sabtu, 07 Oktober 2023</p>
                <p class="mt-2 text-center">18.00 WIB</p>
                <p class="mt-2 text-center">RS Jaya Medika</p>
              </div>
            </div>

            <!-- Blog Entry 2 -->
            <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer hover:scale-105 duration-500">
              <img src="/img/profil.png" alt="" class="w-full h-auto object-cover rounded-lg">
              <div class="absolute bottom-0 left-0 right-0 h-40 bg-red-dark bg-opacity-75 backdrop-blur text-white p-4 rounded-b-lg">
              <h1 class="text-2xl font-semibold text-center">Donor Kembali</h1>
                <p class="mt-2 text-center">Selasa, 07 November 2023</p>
                <p class="mt-2 text-center">18.00 WIB</p>
            </div>
        </div>
    </div>
</div>

   <!-- component -->
    <div class="max-w-md mx-auto bg-red-medium rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5  hover:scale-105 duration-500">
    <div class="p-8">
        <div class="tracking-wide text-2xl text-white font-semibold text-center">Riwayat Donor</div>
    </div>
    </div>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5 hover:scale-105 duration-500">
    <div class="p-8 ">
        <div class="tracking-wide text-medium text-red-dark -500 font-bold">RS Maju Jaya</div>
        <p class="block mt-1 text-lg leading-tight text-black">Jumat, 7 Juli 2023, 15.00 WIB</p>
    </div>
    </div>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5 hover:scale-105 duration-500">
    <div class="p-8 ">
        <div class="tracking-wide text-medium text-red-dark -500 font-bold">PMI Jayabaya</div>
        <p class="block mt-1 text-lg leading-tight text-black">Senin, 7 Agustus 2023, 15.00 WIB</p>
    </div>
    </div>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5 hover:scale-105 duration-500">
    <div class="p-8">
        <div class="tracking-wide text-medium text-red-dark -500 font-bold">RSUK</div>
        <p class="block mt-1 text-lg leading-tight text-black">Kamis, 7 September 2023, 15.00 WIB</p>
    </div>
    </div>
    
    <!-- Start Footer -->
    <footer class="w-full text-gray-700 bg-red-dark body-font">
        <div
            class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
            <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
                <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                <img src="img/logo.png" alt="Bloodwave" class="w-28 h-12 ml-8">
                </a>
                <p class="mt-2 text-sm text-cream-medium font-semibold">Darah Anda, Harapan Mereka</p>
                <div class="mt-4">
                    <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                        <a class="text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-3  cursor-pointer hover: text-cream-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-3 text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-cream-medium uppercase title-font">About</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-cream-medium cursor-pointer hover:text-gray-900">Company</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Careers</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium cursor-pointer hover:text-gray-900">Blog</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-cream-medium  uppercase title-font">Support</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Contact Support</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Help Resources</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Release Updates</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-cream-medium  uppercase title-font">Platform
                    </h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-cream-medium cursor-pointer hover:text-gray-900">Terms &amp; Privacy</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Pricing</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium cursor-pointer hover:text-gray-900">FAQ</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-cream-medium  uppercase title-font">Contact</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-cream-medium cursor-pointer hover:text-gray-900">Send a Message</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">Request a Quote</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-cream-medium  cursor-pointer hover:text-gray-900">+123-456-7890</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-red-dark">
            <div class="container px-5 py-4 mx-auto">
                <p class="text-sm text-white capitalize xl:text-center">© 2023 Bloodwave Present </p>
        </div>
    </footer>
</div>