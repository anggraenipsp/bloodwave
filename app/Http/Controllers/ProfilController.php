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

class ProfilController extends Controller
{
    public function index()
    {
        $lokasiDonor = LokasiDonor::all();
        $riwayatDonor = RiwayatDonor::paginate(5);
        $goldar = Auth::user()->gol_darah;
        $totalDonor = RiwayatDonor::where('id_user', Auth::user()->id)->where('tanggal_donor', '<=', date("Y-m-d"))->orderByDesc('tanggal_donor')->count();
        $riwayatTerbaru = RiwayatDonor::with(['lokasiDonor'])->where('id_user', Auth::user()->id)->where('tanggal_donor', '<=', date("Y-m-d"))->orderByDesc('tanggal_donor')->first();
        $riwayatMenyusul = RiwayatDonor::with(['lokasiDonor'])->where('id_user', Auth::user()->id)->where('tanggal_donor', '>', date("Y-m-d"))->orderBy('tanggal_donor')->first();
        return view('profil', compact('riwayatDonor', 'lokasiDonor', 'goldar', 'totalDonor', 'riwayatTerbaru', 'riwayatMenyusul'));
    }

}
