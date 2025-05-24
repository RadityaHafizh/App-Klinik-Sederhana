@extends('layouts.app')

@section('content')
    <h2>Diagnosa oleh Dokter: {{ $pasien->nama }}</h2>

    <form method="POST" action="{{ route('dokter.store', $pasien->id) }}">
        @csrf

        <div>
            <label for="keluhan">Keluhan:</label><br>
            <textarea name="keluhan" required rows="3" cols="50">{{ old('keluhan') }}</textarea>
        </div><br>

        <div>
            <label for="diagnosa">Diagnosa:</label><br>
            <textarea name="diagnosa" required rows="3" cols="50">{{ old('diagnosa') }}</textarea>
        </div><br>

        <button type="submit">Simpan Diagnosa</button>
    </form>
@endsection
