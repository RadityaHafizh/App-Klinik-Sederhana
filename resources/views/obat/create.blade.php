@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Obat Baru</h2>

    <form action="{{ route('obat.store') }}" method="POST" class="max-w-md">
        @csrf

        <div class="form-control mb-4">
            <label for="nama_obat" class="label">
                <span class="label-text btn mb-4">Nama Obat :</span>
            </label>
            <input 
                type="text" 
                name="nama_obat" 
                id="nama_obat" 
                required 
                class="input input-bordered w-full" 
            >
        </div>

        <div class="form-control mb-6">
            <label for="satuan" class="label">
                <span class="label-text btn mb-4">Satuan :</span>
            </label>
            <select name="satuan" required class="select select-bordered w-full">
                <option disabled value="" {{ old('satuan') ? '' : 'selected' }}>Pilih satuan</option>
                <option value="tablet" {{ old('satuan') == 'tablet' ? 'selected' : '' }}>Tablet</option>
                <option value="botol" {{ old('satuan') == 'botol' ? 'selected' : '' }}>Botol</option>
                <option value="strip" {{ old('satuan') == 'strip' ? 'selected' : '' }}>Strip</option>
                <option value="ml" {{ old('satuan') == 'ml' ? 'selected' : '' }}>ml</option>
                <option value="kapsul" {{ old('satuan') == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
