<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LokasiDonor;
use App\Models\EvidenceFile;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\EloquentUserProvider;

class RiwayatController extends Controller
{

    public function index()
    {
        $lokasiDonor = LokasiDonor::all();
        $riwayatDonor = RiwayatDonor::paginate(5);
        $riwayatTerbaru = RiwayatDonor::with(['lokasiDonor'])->where('id_user', Auth::user()->id)->where('tanggal_donor', '<=', date("Y-m-d"))->orderByDesc('tanggal_donor')->first();
        $riwayatMenyusul = RiwayatDonor::with(['lokasiDonor'])->where('id_user', Auth::user()->id)->orderByDesc('tanggal_donor')->first();
        $riwayatMenyusul->tanggal_donor = date('d-m-Y', strtotime($riwayatMenyusul->tanggal_donor) + (30 * 24 * 3600));
        //$riwayatDonor = RiwayatDonor::all();
        return view('riwayat', compact('riwayatDonor', 'lokasiDonor', 'riwayatTerbaru', 'riwayatMenyusul'));
    }

    public function evidenceFiles()
    {
        return $this->hasMany(EvidenceFile::class, 'id_riwayat_donor_darah');
    }

    public function simpan_data_riwayat(Request $request)
    {
        //Validasi data yang diterima dari formulir
        try {
            $request->validate([
                'tanggal_donor' => 'date',
                'jam_donor' => '',
                'lokasi_donor' => '',
            ]);

            $id_lokasi_donor = $request->input('lokasi_donor');
            $jam_donor = $request->input('jam_donor');
            $tanggal_donor = $request->input('tanggal_donor');
            $tanggal_donor = \Carbon\Carbon::createFromFormat('d-m-Y', $tanggal_donor)->format('Y-m-d');

            // Eloquent ORM
            // Menyimpan data ke tabel tb_riwayat_donor_darah
            $riwayat = new RiwayatDonor;
            $riwayat->id_user = auth()->user()->id;
            $riwayat->tanggal_donor = $tanggal_donor;
            $riwayat->jam_donor = $jam_donor;
            $riwayat->id_lokasi = $id_lokasi_donor;
            $riwayat->save();

            // Menyimpan gambar ke tabel tb_evidence_file

            if ($request->hasFile('imageInput')) {
                $gambar = $request->file('imageInput');
                $extension = $gambar->getClientOriginalExtension();

                // Mengubah nama file menjadi format yang diinginkan
                $namauser = auth()->user()->nama; // Mengambil nama user yang saat ini login
                $tanggal = date('dmY');
                $id = $riwayat->id;
                $nama_gambar = $namauser . '_' . $tanggal . '_' . $id . '.' . $extension;

                // Pastikan direktori penyimpanan gambar ada
                $directory = public_path('bukti_riwayat_donor');

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $gambar->move($directory, $nama_gambar);

                // Menyimpan nama file gambar ke tabel tb_evidence_file
                $evidenceFile = new EvidenceFile; // Ganti dengan model Anda
                $evidenceFile->id_riwayat_donor_darah = $riwayat->id;
                $evidenceFile->nama_file = $nama_gambar;
                $evidenceFile->jenis_file = 'Bukti riwayat donor darah';
                $evidenceFile->save();
            }
            session()->flash('pesan_berhasil', 'Data berhasil ditambahkan');
            // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
            return redirect()->route('tampil_riwayat');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit_riwayat(Request $request, $id)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'tanggal_donor' => 'date',
                'jam_donor' => '',
                'lokasi_donor' => '',
            ]);

            $id_lokasi_donor = $request->input('lokasi_donor');
            $riwayat = RiwayatDonor::find($id);

            if (!$riwayat) {
                return redirect()->route('tampil_riwayat')->with('error', 'Riwayat Donor tidak ditemukan');
            }

            // Perbarui juga data Evidence File jika ada
            $evidenceFile = EvidenceFile::where('id_riwayat_donor_darah', $riwayat->id)->first();

            $riwayat->jam_donor = $request->input('jam_donor');
            $riwayat->id_lokasi = $id_lokasi_donor;

            // Perbarui gambar jika ada
            if ($request->hasFile('imageInput')) {
                $gambar = $request->file('imageInput');
                $extension = $gambar->getClientOriginalExtension();
                $nama_gambar = auth()->user()->nama . '_' . date('dmY') . '_' . $riwayat->id . '.' . $extension;
                $gambar_lama = public_path('bukti_riwayat_donor/' . $evidenceFile->nama_file);
                if (file_exists($gambar_lama)) {
                    @unlink($gambar_lama);
                }

                // Perbarui nama file gambar
                $evidenceFile->nama_file = $nama_gambar;
                $evidenceFile->save();

                // Pastikan folder penyimpanan gambar ada
                $directory = public_path('bukti_riwayat_donor');

                // Jika belum ada folder, maka buat otomatis
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $gambar->move($directory, $nama_gambar);
            }

            $riwayat->save();

            session()->flash('pesan_berhasil', 'Data berhasil diubah');
            return redirect()->route('tampil_riwayat');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function hapus_riwayat($id)
    {
        $riwayat = RiwayatDonor::find($id);

        // Menghapus file gambar dari penyimpanan lokal dan data dari tabel tb_evidence_file
        foreach ($riwayat->evidenceFiles as $file) {
            $gambar = public_path('bukti_riwayat_donor/' . $file->nama_file);
            if (file_exists($gambar)) {
                @unlink($gambar);
            }

            // Menghapus data dari tabel tb_evidence_file
            $file->delete();
        }

        $riwayat->delete();
        session()->flash('pesan_berhasil', 'Data berhasil dihapus');
        return redirect()->route('tampil_riwayat');
    }
}
