<?php

namespace App\Http\Controllers;

use App\Models\Aktivasi;
use Illuminate\Http\Request;

class CekStatusAktivasi extends Controller
{
    public function cek_status(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
        ], [
            'nisn.required' => 'NISN Tidak Boleh Kosong',
        ]);

        $get_aktivasis = Aktivasi::where('nisn', $request->nisn)->first();

        if (empty($get_aktivasis)) {
            return back()->with('success', 'NISN Tidak ditemukan pada pengajuan Aktivasi');
        } else {
            if ((int) $get_aktivasis->diterima === 0) {
                return back()->with('success', 'Pengajuan Aktivasi Anda sedang diproses...');
            } else if ((int) $get_aktivasis->diterima === 1) {
                return back()->with('success', 'Pengajuan Aktivasi Anda telah disetujui, silahkan login menggunakan NISN dan kata sandi : ' . $request->nisn);
            } else if ((int) $get_aktivasis->diterima === 2) {
                return back()->with('success', 'Pengajuan Aktivasi Anda ditolak');
            }
            return back()->with('success', 'Gagal cek status aktivasi');
        }




    }
}
