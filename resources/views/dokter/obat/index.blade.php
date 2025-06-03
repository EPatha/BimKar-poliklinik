<!-- resources/views/obat/index-dummy.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dokter.obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Kemasan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obats as $no => $obat)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->kemasan }}</td>
                            <td>Rp{{ number_format($obat->harga,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('dokter.obat.edit', $obat->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
