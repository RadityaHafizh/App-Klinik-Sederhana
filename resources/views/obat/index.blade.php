@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-3xl font-bold mb-6">Daftar Obat</h2>

        <a href="{{ route('obat.create') }}" class="btn btn-primary mb-4">+ Tambah Obat Baru</a>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full border border-gray-300 border-collapse">
                <thead>
                    <tr>
                        <th class="text-center w-16 border border-gray-300">No</th>
                        <th class="border border-gray-300">Nama Obat</th>
                        <th class="border border-gray-300">Satuan</th>
                        <th class="border border-gray-300 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $index => $obat)
                        <tr>
                            <td class="text-center border border-gray-300">{{ $index + 1 }}</td>
                            <td class="border border-gray-300">{{ $obat->nama_obat }}</td>
                            <td class="border border-gray-300">{{ $obat->satuan ?? '-' }}</td>
                            <td class="border border-gray-300 text-center space-x-2">
                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center border border-gray-300">Belum ada data obat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-4">
        {{ $obats->links('vendor.pagination.tailwind') }}
    </div>

@endsection
