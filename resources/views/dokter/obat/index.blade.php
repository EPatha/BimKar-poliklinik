<!-- resources/views/obat/index-dummy.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol tambah obat -->
            <div class="mb-4 flex justify-end">
                <a href="{{ route('dokter.obat.create') }}"
                   class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded transition">
                    Tambah Obat
                </a>
            </div>
            @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    x-transition 
                    class="mb-4 px-4 py-3 rounded bg-green-100 border border-green-400 text-green-800 flex items-center justify-between"
                >
                    <span>{{ session('success') }}</span>
                    <button @click="show = false" class="ml-4 text-green-900 font-bold">&times;</button>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-[700px] w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Obat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kemasan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($obats as $no => $obat)
                            <tr>
                                <td class="px-6 py-4">{{ $no+1 }}</td>
                                <td class="px-6 py-4">{{ $obat->nama_obat }}</td>
                                <td class="px-6 py-4">{{ $obat->kemasan }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($obat->harga,0,',','.') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-row flex-wrap gap-2">
                                        <a href="{{ route('dokter.obat.edit', $obat->id) }}"
                                           class="bg-blue-600 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
