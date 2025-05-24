@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
    <h2 class="text-2xl font-bold mb-4">Edit Pemeriksaan</h2>

    <form action="{{ route('dokter.update', $pemeriksaan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="keluhan" class="block mb-1 font-semibold">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="textarea textarea-bordered w-full">{{ old('keluhan', $pemeriksaan->keluhan) }}</textarea>
            @error('keluhan')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="diagnosa" class="block mb-1 font-semibold">Diagnosa</label>
            <textarea name="diagnosa" id="diagnosa" class="textarea textarea-bordered w-full">{{ old('diagnosa', $pemeriksaan->diagnosa) }}</textarea>
            @error('diagnosa')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('pasien.detail', $pemeriksaan->pasien_id) }}" class="btn btn-outline">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
