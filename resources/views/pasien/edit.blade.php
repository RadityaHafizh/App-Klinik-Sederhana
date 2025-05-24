@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-6">
        <h2 class="text-lg font-semibold mb-4">Edit Data Pasien</h2>

        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block mb-1">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" class="input input-bordered w-full" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block mb-1">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" class="input input-bordered w-full" required>
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block mb-1">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full" required>
                    <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="nomor_hp" class="block mb-1">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $pasien->nomor_hp) }}" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
