@extends('layouts.home')

@section('content')
<div class="hero min-h-[93vh] bg-base-200">
    <div class="hero-content text-center">
        <div class="max-w-xl">
            <h1 class="text-4xl font-bold">Selamat Datang di Sistem Klinik</h1>
            <p class="py-6 text-base-content">Silakan pilih menu di atas untuk mulai menggunakan sistem kami dan mengelola data pasien dengan mudah.</p>
            <a href="{{ route('pasien.index') }}" class="btn btn-primary">Lihat Data Pasien</a>
        </div>
    </div>
</div>
@endsection
