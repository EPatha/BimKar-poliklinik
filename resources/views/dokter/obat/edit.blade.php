<!-- resources/views/obat/edit-dummy.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('dokter.obat.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control"
                            value="{{ $obat->nama_obat }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Kemasan</label>
                        <input type="text" name="kemasan" class="form-control"
                            value="{{ $obat->kemasan }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control"
                            value="{{ $obat->harga }}" required>
                    </div>
                    <a href="{{ route('dokter.obat.index') }}" class="bg-red-600 hover:bg-red-800 text-white text-xs font-semibold px-4 py-2 rounded transition">Batal</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white text-xs font-semibold px-4 py-2 rounded transition">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
