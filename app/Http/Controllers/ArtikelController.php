<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Artikel;
use App\Models\artikelFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\EloquentUserProvider;

class ArtikelController extends Controller
{

    public function index()
    {
        // $artikel = Artikel::all();
        return view('artikel');
    }

    public function store(Request $request)
    {
        //Validasi data yang diterima dari formulir
        try {
            $request->validate([
                'judul' => '',
                'opening' => '',
                'tanggal_unggah' => 'date',
            ]);

            $judul = $request->input('judul');
            $isi = $request->input('opening');
            $created_at = $request->input('tanggal_unggah');
            $created_at = \Carbon\Carbon::createFromFormat('Y-m-d', $created_at)->format('d-m-Y');
            
            $artikel = new Artikel;
            $artikel->judul = $judul;
            $artikel->isi = $isi;
            $artikel->slug = Str::slug($judul);
            $artikel->created_at = $created_at;
            $artikel->sampul = "";

            $artikel->save();
            
            if ($request->hasFile('foto')) {
                $sampul = $request->file('foto');
                $extension = $sampul->getClientOriginalExtension();

                // Mengubah nama file menjadi format yang diinginkan
                $tanggal = date('dmY');
                $id = $artikel->id;
                $nama_sampul =  $tanggal . '_' . $id . '.' . $extension;

                // Pastikan direktori penyimpanan gambar ada
                $directory = public_path('artikel_file');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $sampul->move($directory, $nama_sampul);

                // Menyimpan nama file gambar ke tabel tb_evidence_file
                $artikelFile = new artikelFile; // Ganti dengan model Anda
                $artikelFile->id_artikel = $artikel->id;
                $artikelFile->nama_file = $nama_sampul;
                $artikelFile->jenis_file = 'Sampul Artikel';
                $artikelFile->save();

                $artikel->sampul = $nama_sampul;
                $artikel->save();
            }

            session()->flash('pesan_berhasil', 'Data berhasil ditambahkan');
            // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
            return redirect()->route('admin');
        } catch (\Exception $e) {
            dd($e);
        }
    }

     public function edit(string $id)
    {
        $artikel = Artikel::find($id);
        return view('artikel', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'judul' => '',
                'opening' => '',
            ]);

            $judul = $request->input('judul');
            $isi = $request->input('opening');
            $artikel = Artikel::find($id);

            if (!$artikel) {
                return redirect()->route('tampil_artikel')->with('error', 'Artikel tidak ditemukan');
            }

            // Perbarui juga data Artikel File jika ada
            $artikelFile = artikelFile::where('id_artikel', $artikel->id)->first();

            $artikel->judul = $judul;
            $artikel->isi = $isi;

            // Perbarui gambar jika ada
            if ($request->hasFile('foto')) {
                $sampul = $request->file('foto');
                $extension = $sampul->getClientOriginalExtension();
                $nama_sampul = date('dmY') . '_' . $artikel->id . '.' . $extension;
                $sampul_lama = public_path('artikel/' . $artikelFile->nama_file);
                if (file_exists($sampul_lama)) {
                    @unlink($sampul_lama);
                }

                // Perbarui nama file gambar
                $artikelFile->nama_file = $nama_sampul;
                $artikelFile->save();

                // Pastikan folder penyimpanan gambar ada
                $directory = public_path('artikel');

                // Jika belum ada folder, maka buat otomatis
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $gambar->move($directory, $nama_gambar);
            }

            $artikel->save();

            session()->flash('pesan_berhasil', 'Data berhasil diubah');
            return redirect()->route('admin');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function destroy(string $id)
    {
        $artikel = Artikel::find($id);

        // Menghapus file gambar dari penyimpanan lokal dan data dari tabel tb_evidence_file
        foreach ($artikel->artikelFile as $file) {
            $sampul = public_path('artikel/' . $file->nama_file);
            if (file_exists($sampul)) {
                @unlink($sampul);
            }

            // Menghapus data dari tabel tb_evidence_file
            $file->delete();
        }

        $artikel->delete();
        session()->flash('pesan_berhasil', 'Data berhasil dihapus');
        return redirect()->route('admin');
    }
}
