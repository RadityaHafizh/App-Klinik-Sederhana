@extends('layouts.app')

@section('content')
    <h1>Dashboard Pendaftaran</h1>
    <a href="{{ route('pasien.create') }}">Tambah Pasien</a>
    <a href="{{ route('pasien.index') }}">Lihat Data Pasien</a>
@endsection
