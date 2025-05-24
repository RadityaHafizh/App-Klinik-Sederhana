@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Tambah Obat untuk Pemeriksaan Pasien</h2>

    <form method="POST" action="{{ route('pemeriksaan.obat.store', $pemeriksaan->id) }}" class="space-y-4">
        @csrf

        <div class="overflow-x-auto">
            <table class="table w-full table-zebra border border-gray-300 rounded-lg">
                <thead class="bg-base-200">
                    <tr>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="obat-list">
                    @forelse($pemeriksaan->obats as $obat)
                        <tr>
                            <td>
                                <select name="obat_id[]" required class="select select-bordered w-full">
                                    @foreach($obats as $o)
                                        <option value="{{ $o->id }}" {{ $o->id == $obat->id ? 'selected' : '' }}>
                                            {{ $o->nama_obat }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="jumlah[]" min="1" value="{{ $obat->pivot->jumlah }}" required class="input input-bordered w-full">
                            </td>
                            <td>
                                <button type="button" onclick="hapusBaris(this)" class="btn btn-error btn-sm">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                <select name="obat_id[]" required class="select select-bordered w-full">
                                    @foreach($obats as $obat)
                                        <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="jumlah[]" min="1" value="1" required class="input input-bordered w-full">
                            </td>
                            <td>
                                <button type="button" onclick="hapusBaris(this)" class="btn btn-error btn-sm text-white">Hapus</button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex space-x-2">
            <button type="button" onclick="tambahObat()" class="btn btn-primary">Tambah Baris Obat</button>
            <button type="submit" class="btn btn-primary">Simpan Obat</button>
        </div>
    </form>
</div>

<script>
    function tambahObat() {
        const table = document.getElementById('obat-list');
        const row = table.querySelector('tr');
        const clone = row.cloneNode(true);

        clone.querySelector('select').selectedIndex = 0;
        clone.querySelector('input').value = '';

        table.appendChild(clone);
    }

    function hapusBaris(button) {
        const row = button.closest('tr');
        const table = document.getElementById('obat-list');

        if (table.rows.length > 1) {
            row.remove();
        } else {
            alert("Minimal satu baris harus ada.");
        }
    }
</script>
@endsection
