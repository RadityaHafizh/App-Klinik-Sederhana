@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Tambah Pasien</h2>

    <form action="{{ route('pasien.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label" for="nama">
                <span class="label-text">Nama:</span>
            </label>
            <input type="text" name="nama" id="nama" class="input input-bordered" required>
        </div>

        <div class="form-control">
            <label class="label" for="tanggal_lahir">
                <span class="label-text">Tanggal Lahir:</span>
            </label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="input input-bordered" required>
        </div>

        <div class="form-control">
            <label class="label" for="jenis_kelamin">
                <span class="label-text">Jenis Kelamin:</span>
            </label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="select select-bordered" required>
                <option disabled selected>Pilih jenis kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-control">
            <label class="label" for="nomor_hp">
                <span class="label-text">Nomor HP:</span>
            </label>
            <input type="text" name="nomor_hp" id="nomor_hp" class="input input-bordered" required>
        </div>

        <div class="form-control mt-6">
            <button type="submit" class="btn btn-primary w-full">Simpan</button>
        </div>
    </form>
</div>
@endsection
