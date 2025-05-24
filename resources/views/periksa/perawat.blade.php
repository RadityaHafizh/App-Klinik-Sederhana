@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6">Input Pemeriksaan Perawat: {{ $pasien->nama }}</h2>

    <form method="POST" action="{{ route('perawat.store', $pasien->id) }}" class="max-w-md">
        @csrf

        <div class="form-control mb-4">
            <label for="berat_badan" class="label">
                <span class="label-text">Berat Badan (kg):</span>
            </label>
            <input 
                type="number" 
                name="berat_badan" 
                id="berat_badan"
                step="0.1"
                value="{{ old('berat_badan', $pasien->berat_badan) }}"
                class="input input-bordered w-full"
                required
            >
        </div>

        <div class="form-control mb-6">
            <label for="tekanan_darah" class="label">
                <span class="label-text">Tekanan Darah:</span>
            </label>
            <input 
                type="text" 
                name="tekanan_darah" 
                id="tekanan_darah"
                value="{{ old('tekanan_darah', $pasien->tekanan_darah) }}"
                class="input input-bordered w-full"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary w-full">Simpan Data</button>
    </form>
</div>
@endsection
