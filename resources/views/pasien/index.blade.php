@extends('layouts.app')

@section('content')
    <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm">
        <table class="table table-zebra w-full">
            <thead class="bg-base-200">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasiens as $pasien)
                    <tr>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->tanggal_lahir }}</td>
                        <td>
                            {{ $pasien->jenis_kelamin === 'L' ? 'Laki-laki' : ($pasien->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}
                        </td>
                        <td>{{ $pasien->nomor_hp }}</td>
                        <td>
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('pasien.detail', $pasien->id) }}" class="btn btn-sm btn-primary">Detail</a>

                                @php $role = Auth::user()->role; @endphp

                                @if($role === 'perawat')
                                    <a href="{{ route('perawat.form', $pasien->id) }}" class="btn btn-sm btn-secondary">Periksa (Perawat)</a>
                                @endif

                                @if($role === 'dokter')
                                    <a href="{{ route('dokter.form', $pasien->id) }}" class="btn btn-sm btn-secondary">Periksa (Dokter)</a>
                                @endif

                                @if($role === 'apoteker' && $pasien->pemeriksaans->last())
                                    <a href="{{ route('pemeriksaan.obat.form', $pasien->pemeriksaans->last()->id) }}" class="btn btn-sm btn-accent">Tambah Obat</a>
                                @elseif($role === 'apoteker' && $pasien->pemeriksaans->isEmpty())
                                    <div href="#" class="btn btn-sm btn-warning">Belum Diperiksa Dokter</div>
                                @endif

                                @if (auth()->check() && auth()->user()->role === 'pendaftaran')
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pasiens->links('vendor.pagination.tailwind') }}
    </div>
@endsection
