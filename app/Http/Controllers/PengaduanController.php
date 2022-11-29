<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Identitas;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function pengaduanTambah(Request $request)
    {
        $validated = $request->validate([
            'nama_pengadu' => 'required',
            'kontak_pengadu' => 'required',
            'pengaduan' => 'required',
            'lokasi_pengaduan' => 'required',
            'keterangan_pengaduan' => 'required',
        ]);

        $pengaduan = Pengaduan::latest()->first();
        $id = $pengaduan->id;

        $file = $request->identitas->getClientOriginalName();
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fileName1 = $id . '-identitas-' . $validated['nama_pengadu'] . '.' . $extension;
        $request->identitas->storeAs('public/identitas', $fileName1);

        Pengaduan::create([
            'id_dokumentasi' => $id,
            'pengaduan' => $validated['pengaduan'],
            'lokasi_pengaduan' => $validated['lokasi_pengaduan'],
            'tanggal_pengaduan' => date('Y-m-d'),
            'keterangan_pengaduan' => $validated['keterangan_pengaduan'],
            'nama_pengadu' => $validated['nama_pengadu'],
            'kontak_pengadu' => $validated['kontak_pengadu'],
            'identitas_pengadu' => $fileName1,
        ]);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $ext = $image->extension();
                $imageName = $validated['pengaduan'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                // $image->move(public_path('assets/files/dokumentasi_images'), $imageName);
                $image->storeAs('public/dokumentasi_pengaduan', $imageName);
                // Dokumentasi::create([
                //     'id_pengaduan' => $id,
                //     'foto' => $imageName
                // ]);

                if ($ext == 'mp4') {
                    Dokumentasi::create([
                        'id_pengaduan' => $id,
                        'video' => $imageName
                    ]);
                } else {
                    Dokumentasi::create([
                        'id_pengaduan' => $id,
                        'foto' => $imageName
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Pengaduan Terkirim');
    }

    // 
    public function pengaduanMasuk()
    {
        $pengaduans = Pengaduan::where('validasi_pengaduan', false)->latest()->get();
        return view('dashboard.pengaduanmasuk', compact('pengaduans'));
    }

    public function pengaduanMasukDetail($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('dashboard.pengaduanmasukDetail', compact('pengaduan'));
    }

    // 
    public function pengaduanArsip()
    {
        $pengaduans = Pengaduan::where('validasi_pengaduan', true)->get();
        return view('dashboard.arsippengaduan', compact('pengaduans'));
    }

    public function pengaduanArsipDetail($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('dashboard.arsippengaduanDetail', compact('pengaduan'));
    }

    // 

    public function pengaduanKetua()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Ketua DPRD')->latest()->get();
        $title = 'Ketua DPRD';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanWakil1()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Wakil Ketua 1 DPRD')->latest()->get();
        $title = 'Wakil Ketua 1 DPRD';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanWakil2()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Wakil Ketua 2 DPRD')->latest()->get();
        $title = 'Wakil Ketua 2 DPRD';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanWakil3()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Wakil Ketua 3 DPRD')->latest()->get();
        $title = 'Wakil Ketua 3 DPRD';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanKomisi1()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Komisi 1')->latest()->get();
        $title = 'Komisi 1';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanKomisi2()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Komisi 2')->latest()->get();
        $title = 'Komisi 2';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanKomisi3()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Komisi 3')->latest()->get();
        $title = 'Komisi 3';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanKomisi4()
    {
        $pengaduans = Pengaduan::where('posisi_pengaduan', '=', 'Komisi 4')->latest()->get();
        $title = 'Komisi 4';
        return view('dashboard.pengaduanList', compact('pengaduans', 'title'));
    }

    public function pengaduanDetail($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('dashboard.pengaduanDetail', compact('pengaduan'));
    }

    public function pengaduanTeruskan(Request $request, $id)
    {
        $validated = $request->validate([
            'posisi' => 'required',
        ]);

        $pengaduan = Pengaduan::find($id);
        $pengaduan->posisi_pengaduan = $validated['posisi'];
        $pengaduan->catatan_pengaduan = $request->catatan;
        if ($pengaduan->validasi_pengaduan == 0) {
            $pengaduan->validasi_pengaduan = 1;
        }
        $pengaduan->save();

        return redirect('/dashboard')->with('success', 'Pengaduan Berhasil Diteruskan');
    }

    public function pengaduanHasil(Request $request, $id)
    {
        $validated = $request->validate([
            'hasil' => 'required',
        ]);

        $pengaduan = Pengaduan::find($id);
        $pengaduan->hasil_pengaduan = $validated['hasil'];
        $pengaduan->save();

        return redirect()->back()->with('toast_success', 'Hasil Ditambahkan');;
    }

    public function pengaduanKonfirmasi($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->konfirmasi_pengaduan = true;
        $pengaduan->save();

        return redirect()->back()->with('toast_success', 'Pengaduan Selesai');;
    }

    public function pengaduanHapus($id)
    {
        Pengaduan::find($id)->delete();

        return redirect('/pengaduan-masuk')->with('toast_success', 'Pengaduan Dihapus');
    }
}
