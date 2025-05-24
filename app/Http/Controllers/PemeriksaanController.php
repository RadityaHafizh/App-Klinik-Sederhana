<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{

    // Form input data perawat
    public function perawatForm($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('periksa.perawat', compact('pasien'));
    }

    // Simpan data perawat
    public function storePerawat(Request $request, $id)
    {
        $request->validate([
            'berat_badan' => 'required|numeric|min:0',
            'tekanan_darah' => 'required|string|max:20',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update([
            'berat_badan' => $request->berat_badan,
            'tekanan_darah' => $request->tekanan_darah,
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data perawat berhasil disimpan.');
    }

    // Form input data dokter (nanti dijelaskan lanjutannya)
    public function dokterForm($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('periksa.dokter', compact('pasien'));
    }

    // Simpan data dokter (akan dibuat di tahap selanjutnya)
    public function storeDokter(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
        ]);

        Pemeriksaan::create([
            'pasien_id' => $id,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('pasien.detail', $id)->with('success', 'Diagnosa berhasil disimpan.');
    }

    public function formObat($id)
    {
        $pemeriksaan = Pemeriksaan::with('obats')->find($id);
        $obats = Obat::all(); // semua obat tersedia

        return view('pemeriksaan.form_obat', compact('pemeriksaan', 'obats'));
    }

    // Menyimpan relasi obat ke pemeriksaan
   public function storeObat(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required|array',
            'obat_id.*' => 'exists:obats,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'numeric|min:1',
        ]);

        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // Detach old pivot relations first
        $pemeriksaan->obats()->detach();

        // Attach obat with jumlah in pivot
        foreach ($request->obat_id as $index => $obatId) {
            $jumlah = $request->jumlah[$index];
            $pemeriksaan->obats()->attach($obatId, ['jumlah' => $jumlah]);
        }

        return redirect()->route('pasien.detail', $pemeriksaan->pasien_id)
                        ->with('success', 'Data obat berhasil ditambahkan ke pemeriksaan.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

   public function edit(Pemeriksaan $pemeriksaan)
    {
        return view('pemeriksaan.edit', compact('pemeriksaan'));
    }

    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $request->validate([
            'keluhan' => 'nullable|string',
            'diagnosa' => 'nullable|string',
        ]);

        $pemeriksaan->update([
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('pasien.detail', $pemeriksaan->pasien_id)
                         ->with('success', 'Pemeriksaan berhasil diperbarui');
    }

    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $pasienId = $pemeriksaan->pasien_id;
        $pemeriksaan->delete();

        return redirect()->route('pasien.detail', $pasienId)
                         ->with('success', 'Pemeriksaan berhasil dihapus');
    }
}
