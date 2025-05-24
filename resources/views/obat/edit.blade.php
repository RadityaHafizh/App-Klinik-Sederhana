@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6">Edit Obat</h2>

        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-control mb-4">
                <label for="nama_obat" class="label">
                    <span class="label-text">Nama Obat</span>
                </label>
                <input 
                    type="text" 
                    name="nama_obat" 
                    id="nama_obat" 
                    value="{{ old('nama_obat', $obat->nama_obat) }}" 
                    required 
                    class="input input-bordered w-full"
                >
            </div>

            <div class="form-control mb-6">
                <label for="satuan" class="label">
                    <span class="label-text">Satuan</span>
                </label>
                <select 
                    name="satuan" 
                    id="satuan" 
                    class="select select-bordered w-full" 
                    required
                >
                    <option disabled {{ old('satuan', $obat->satuan) ? '' : 'selected' }}>Pilih satuan</option>
                    <option value="tablet" {{ old('satuan', $obat->satuan) == 'tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="botol" {{ old('satuan', $obat->satuan) == 'botol' ? 'selected' : '' }}>Botol</option>
                    <option value="strip" {{ old('satuan', $obat->satuan) == 'strip' ? 'selected' : '' }}>Strip</option>
                    <option value="ml" {{ old('satuan', $obat->satuan) == 'ml' ? 'selected' : '' }}>ml</option>
                    <option value="kapsul" {{ old('satuan', $obat->satuan) == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
                    <!-- Tambahkan opsi lain jika perlu -->
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </form>
    </div>
@endsection
