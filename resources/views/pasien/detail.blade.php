@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Detail Pasien: {{ $pasien->nama }}</h2>

    <div class="mb-6 bg-base-100 p-4 border border-gray-300 rounded-lg shadow">
        <ul class="space-y-2">
            <li><strong>Tanggal Lahir :</strong> {{ $pasien->tanggal_lahir }}</li>
            <li><strong>Jenis Kelamin :</strong> {{ $pasien->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
            <li><strong>Nomor HP :</strong> {{ $pasien->nomor_hp }}</li>
            <li><strong>Berat Badan :</strong> {{ $pasien->berat_badan ?? '-' }}</li>
            <li><strong>Tekanan Darah :</strong> {{ $pasien->tekanan_darah ?? '-' }}</li>
        </ul>
    </div>

    <h3 class="text-2xl font-semibold mb-3">Riwayat Pemeriksaan:</h3>
    @forelse ($pasien->pemeriksaans as $pemeriksaan)
        <div class="border border-gray-300 rounded-lg bg-base-100 p-4 mb-4 shadow-sm">
            <p><strong>Keluhan:</strong> {{ $pemeriksaan->keluhan }}</p>
            <p><strong>Diagnosa:</strong> {{ $pemeriksaan->diagnosa }}</p>
            <p><strong>Obat:</strong>
                @if($pemeriksaan->obats->isEmpty())
                    <span class="text-gray-500">-</span>
                @else
                    <ul class="list-disc list-inside">
                        @foreach($pemeriksaan->obats as $obat)
                            <li>{{ $obat->nama_obat }} (Jumlah: {{ $obat->pivot->jumlah }})</li>
                        @endforeach
                    </ul>
                @endif
            </p>
           <p class="text-sm text-base-content mt-2 bg-base-200 p-2 rounded">
                <em>Tanggal:</em> {{ $pemeriksaan->created_at->format('d-m-Y H:i') }}
            </p>

            @if (auth()->check() && auth()->user()->role === 'apoteker')
                <a href="{{ route('pemeriksaan.obat.form', $pemeriksaan->id) }}" class="btn btn-success btn-sm mt-3">
                    Edit Resep
                </a>
            @endif

            @if (auth()->check() && auth()->user()->role === 'dokter')
                <div class="mt-3 space-x-2">
                    <a href="{{ route('dokter.edit', $pemeriksaan->id) }}" class="btn btn-warning btn-sm">
                        Edit Pemeriksaan
                    </a>

                    <form action="{{ route('dokter.destroy', $pemeriksaan->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pemeriksaan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-sm">Hapus Pemeriksaan</button>
                    </form>
                </div>
            @endif
        </div>
    @empty
        <div class="text-gray-500">Belum ada pemeriksaan.</div>
    @endforelse

    @if (auth()->check() && auth()->user()->role === 'dokter')
        <a href="{{ route('dokter.form', $pasien->id) }}" class="btn btn-primary mt-4">
            + Tambah Pemeriksaan Dokter
        </a>
    @endif
</div>
@endsection
