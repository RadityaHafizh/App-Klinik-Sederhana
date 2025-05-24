@extends('layouts.app')

@section('content')
    <h2>Resep Obat</h2>
    <form action="{{ url('/resep/'.$pasien->id) }}" method="POST">
        @csrf
        <label>Pilih Obat:</label><br>
        <select name="obat_id">
            @foreach($obatList as $obat)
                <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
            @endforeach
        </select><br>

        <button type="submit">Simpan</button>
    </form>
@endsection
