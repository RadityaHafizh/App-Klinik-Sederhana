@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Diagnosa untuk Pasien: {{ $pasien->nama }}</h2>

    <form method="POST" action="{{ route('dokter.store', $pasien->id) }}" class="space-y-6">
        @csrf

        <div class="form-control">
            <label for="keluhan" class="label">
                <span class="label-text">Keluhan:</span>
            </label>
            <textarea 
                name="keluhan" 
                id="keluhan" 
                rows="4" 
                class="textarea textarea-bordered" 
                required
            >{{ old('keluhan', $pasien->keluhan) }}</textarea>
        </div>

        <div class="form-control">
            <label for="diagnosa" class="label">
                <span class="label-text">Diagnosa:</span>
            </label>
            <textarea 
                name="diagnosa" 
                id="diagnosa" 
                rows="4" 
                class="textarea textarea-bordered" 
                required
            >{{ old('diagnosa', $pasien->diagnosa) }}</textarea>
        </div>

        <div class="form-control mt-4">
            <button type="submit" class="btn btn-primary w-full">Simpan Diagnosa</button>
        </div>
    </form>
</div>
@endsection
