@extends('layouts.app')

@section('content')
    <h2>Pemeriksaan Awal (Perawat)</h2>
    <form action="{{ url('/periksa/perawat/'.$pasien->id) }}" method="POST">
        @csrf
        <label>Berat Badan (kg):</label>
        <input type="number" step="0.1" name="berat_badan"><br>

        <label>Tekanan Darah:</label>
        <input type="text" name="tekanan_darah"><br>

        <button type="submit">Simpan</button>
    </form>
@endsection
