<!DOCTYPE html>
<html lang="en">
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Bloodwave - Darah Anda, Harapan Mereka</title>
</head>
<!-- Masukkan stylesheet Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Masukkan JavaScript jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Masukkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<!-- Masukkan JavaScript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Stylesheet Bootstrap Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- modal alert> -->

<body class="bg-cream-medium">
    @if (session('pesan_berhasil'))
    <script>
        swal({
            title: "Berhasil",
            text: "{{ session('pesan_berhasil') }}",
            icon: "success",
            button: "OK",
        });
    </script>
    @endif
    <!-- Header -->
    <header class="bg-red-dark shadow-md">
        <div class="flex justify-between items-center py-2 px-5 border-b-2 border-cream-dark">
            <div class="flex items-center">
                <!-- Logo -->
                <img src="img/logo.png" alt="Bloodwave" class="w-28 h-12 ml-6">
            </div>

            <!-- Navigasi Bar Start-->
            <div class="flex items-center space-x-2">
                <div class="flex items-center space-x-2">
                    <a href="{{url('home')}}" class="px-2 py-2 bg-red-dark text-cream-medium font-semibold rounded-lg text-sm">Beranda</a>
                    <a href="{{url('riwayat')}}" class="px-2 py-2 bg-red-dark text-cream-medium font-semibold rounded-lg text-sm">Riwayat Donor</a>
                    <a href="{{url('event')}}" class="px-2 py-2 bg-red-dark text-cream-medium font-semibold rounded-lg text-sm">Event</a>
                    <a href="{{url('letsread')}}" class="px-2 py-2 bg-red-dark text-cream-medium font-semibold rounded-lg text-sm">Let's Read</a>
                    @if(Auth::user())
                    <a href="{{url('profil')}}" class="px-2 py-2 bg-cream-medium text-red-dark font-semibold rounded-lg text-sm">{{auth()->user()->nama}}</a>

                    @else
                    <a href="{{url('login')}}" class="px-2 py-2 bg-cream-medium text-red-dark font-semibold rounded-lg text-sm">Masuk</a>
                    <a href="{{url('register')}}" class="px-2 py-2 bg-cream-medium text-red-dark font-semibold rounded-lg text-sm">Daftar</a>
                    @endif
                </div>
            </div>
    </header>
    <!-- Navigasi Bar Start-->

    <!-- Box Welcome Start-->
    <div class="max-w-md mx-auto bg-red-medium rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
        <div class="md:flex">
            <div class="p-8">
                <h2 class="text-5xl font-semibold text-cream-dark mt-4">Hai, {{auth()->user()->nama}}!</h2>
                <p class="font-poppins text-cream-dark mt-4">Masukkan riwayat donor anda</p>
                <form action="/simpan_data_riwayat" enctype="multipart/form-data" method="POST" class="flex gap-32">
                    @csrf
                    <div class="flex flex-col w-1/2">
                        <div class="py-1">
                            <span class="px-1 text-sm text-cream-medium">Tanggal Donor</span>
                            <input type="text" name="tanggal_donor" id="tanggal_donor" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-cream-medium shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none datepicker" placeholder="DD-MM-YYYY">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-cream-medium">Jam Donor</span>
                            <input type="time" name="jam_donor" id="jam_donor" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-cream-medium shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-cream-medium">Lokasi donor</span>
                            <select name="lokasi_donor" id="lokasi_donor" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-cream-medium placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                                <option value="" selected disabled>Pilih Lokasi Donor</option>
                                @foreach($lokasiDonor as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col w-1/2">
                        <div class="flex flex-col py-7 gap-7">
                            <label class="w-72 h-32 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-red-dark font-semibold leading-normal">Upload Bukti Gambar</span>
                                <input type='file' name="imageInput" id="imageInput" class="hidden" accept=".jpg, .jpeg, .png">
                            </label>
                            <button type="submit" class="py-2 px-4 bg-transparent text-cream-medium font-semibold border border-cream-medium rounded hover-bg-cream-dark hover-text-red-dark hover-border-transparent transition ease-in duration-200 transform hover-translate-y-1 active-translate-y-0">Simpan</button>
                            <img id="selectedImage" src="#" alt="Selected Image" style="display: none; max-width: 100%; max-height: 200px;">
                            <p id="fileName" class="text-cream-medium font-semibold" style="display: none;">Nama File: </p>
                            <p id="errorMessage" class="text-red-dark font-semibold" style="display: none;">Bukti harus berupa gambar</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Box Welcome End-->

    <!-- Recent Donor Start-->
    <div class="flex flex-row md:max-w-2xl mx-auto gap-5 w-full justify-center">
        <div class="bg-white p-4 w-full rounded-md text-center">
            <div class="flex justify-between bg-gradient-to-tr from-red-medium to-red-medium rounded-md py-2 px-4 text-white font-bold text-md">
                <div>
                    <span>Donor Terakhir</span>
                </div>
            </div>

            <div>
                <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4">
                    <div class="px-2 flex">
                        <span>{{$riwayatTerbaru ? date("l, d F Y", strtotime($riwayatTerbaru->tanggal_donor )) : 'data belum tersedia' }}</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                    <span>{{$riwayatTerbaru ? date("g:i A", strtotime($riwayatTerbaru->jam_donor)) : '0.00'}}</span>
                </div>
            </div>

            <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                    <span>{{$riwayatTerbaru->lokasiDonor->nama_lokasi ?? ''}}</span>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 w-full rounded-md text-center">
            <div class="flex justify-between bg-gradient-to-tr from-red-medium to-red-medium rounded-md py-2 px-4 text-white font-bold text-md">
                <div>
                    <span>Donor Yang Akan Datang</span>
                </div>
            </div>

            <div>
                <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4">
                    <div class="px-2 flex">
                        <span>{{$riwayatMenyusul ? date("l, d F Y", strtotime($riwayatMenyusul->tanggal_donor )) : 'data belum tersedia' }} </span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                    <span>{{$riwayatMenyusul ? date("g:i A", strtotime($riwayatMenyusul->jam_donor)) : '0.00'}}</span>
                </div>
            </div>

            <div class="flex justify-between border-t-2 text-sm font-normal mt-4 space-x-4">
                <div class="px-2">
                    <span>{{$riwayatMenyusul->lokasiDonor->nama_lokasi ?? ''}}</span>
                </div>
            </div>
        </div>

    </div>
    </div>
    <div></div>
    <div class="max-w-md mx-auto bg-red-medium rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
        <div class="p-8">
            <div class="tracking-wide text-2xl text-white font-semibold text-center">Riwayat Donor</div>
        </div>
    </div>
    @foreach ($riwayatDonor as $riwayat)
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
        <div class="p-8 md:flex" style="cursor: pointer;">
            <div class="md:w-1/2" style="font-size: 18px;">
                <div class="tracking-wide text-medium text-red-dark -500 font-bold show-edit-modal">
                    {{ $riwayat->lokasiDonor->nama_lokasi }}
                </div>
                <p class="block mt-1 text-base leading-tight text-black" style="font-size: 16px;">{{ date("l, d F Y", strtotime($riwayat->tanggal_donor)) }}, {{ date("g:i A", strtotime($riwayat->jam_donor)) }}</p>
            </div>
            <div class="md:w-1/2 md:p-8 p-4">
                @foreach ($riwayat->evidenceFiles as $file)
                <a href="{{ asset('bukti_riwayat_donor/' . $file->nama_file) }}" target="_blank">
                    <img src="{{ asset('bukti_riwayat_donor/' . $file->nama_file) }}" alt="Bukti Gambar" class="w-32 h-32 object-cover mx-auto" style="float: right;">
                </a>
                @endforeach
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $riwayat->id }}">Edit</button>
                <form action="{{ route('hapus_riwayat', $riwayat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $riwayat->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Riwayat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('edit_riwayat', $riwayat->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT') <!-- spoofing method -->
                        <div class="form-group">
                            <label for="tanggal_donor">Tanggal Donor</label>
                            <input type="date" class="form-control" id="tanggal_donor" name="tanggal_donor" value="{{ $riwayat->tanggal_donor }}">
                        </div>
                        <div class="form-group">
                            <label for="jam_donor">Jam Donor</label>
                            <input type="time" class="form-control" id="jam_donor" name="jam_donor" value="{{ $riwayat->jam_donor }}">
                        </div>
                        <div class="form-group">
                            <label for="lokasi_donor">Lokasi Donor</label>
                            <select class="form-control" id="lokasi_donor" name="lokasi_donor">
                                @foreach($lokasiDonor as $lokasi)
                                <option value="{{ $lokasi->id }}" {{ $lokasi->id == $riwayat->id_lokasi ? 'selected' : '' }}>{{ $lokasi->nama_lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type='file' name="imageInput" id="imageInput" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Modal -->

    <div class="pagination-container">
        {{ $riwayatDonor->links('pagination::simple-bootstrap-4', ['onEachSide' => 0]) }}
        <!--{{ $riwayatDonor->links('component.custom-pagination') }}-->
    </div>
    <!-- Riwayat End-->

    <!-- Start Footer -->
    <footer class="w-full text-gray-700 bg-red-dark body-font">
        <div class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
            <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
                <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                    <img src="img/logo.png" alt="Bloodwave" class="w-28 h-12 ml-8">
                </a>
                <p class="mt-2 text-sm text-cream-medium font-semibold">Darah Anda, Harapan Mereka</p>
                <div class="mt-4">
                    <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                        <a class="text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-cream-medium cursor-pointer hover: text-cream-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-3 text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-cream-medium cursor-pointer hover:text-cream-dark">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
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
    <!-- End Footer -->
    <script>
        const imageInput = document.getElementById('imageInput');
        const selectedImage = document.getElementById('selectedImage');
        const fileName = document.getElementById('fileName');

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        selectedImage.src = e.target.result;
                        selectedImage.style.display = 'block';
                        fileName.innerText = `Nama File: ${file.name}`;
                        fileName.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                } else {
                    selectedImage.style.display = 'none';
                    fileName.style.display = 'none';
                }
            } else {
                selectedImage.style.display = 'none';
                fileName.style.display = 'none';
            }
        });

        $(document).ready(function() {
            // Menambahkan event click ke elemen dengan class "show-edit-modal"
            $(".show-edit-modal").click(function() {
                var modalId = $(this).data("target"); // Dapatkan id modal dari data-target
                $(modalId).modal("show"); // Tampilkan modal yang sesuai
            });
        });

        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true
            });
        });
    </script>
</body>

</html>