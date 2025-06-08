<!-- resources/views/jadwal-periksa/index-dummy.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    {{-- Tambahkan ini agar Alpine x-cloak tidak menyembunyikan elemen secara permanen --}}
    <style>
        [x-cloak] { display: none; }
    </style>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-full sm:px-6 lg:px-8"> <!-- max-w-full agar tabel lebar -->
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <!-- Tambahkan x-data kosong agar Alpine tidak error -->
                <section x-data="{}">
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Jadwal Periksa') }}
                        </h2>
                        <a href="{{ route('jadwal-periksa.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">
                            Tambah Jadwal Periksa
                        </a>
                    </header>

                    @if(session('success'))
                        <div 
                            x-data="{ show: true }" 
                            x-show="show" 
                            x-init="setTimeout(() => show = false, 3000)" 
                            x-transition 
                            class="mb-4 px-4 py-2 rounded bg-green-100 border border-green-400 text-green-800 flex items-center justify-between"
                        >
                            <span>{{ session('success') }}</span>
                            <button @click="show = false" class="ml-4 text-green-900 font-bold">&times;</button>
                        </div>
                    @endif

                    <div class="overflow-x-auto mt-6">
                        <table class="min-w-[900px] w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mulai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Selesai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($jadwalPeriksa as $no => $jadwal)
                                <tr>
                                    <td class="px-6 py-4">{{ $no + 1 }}</td>
                                    <td class="px-6 py-4">{{ $jadwal->hari }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                    <td class="px-6 py-4">
                                        @if($jadwal->status)
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-green-800 bg-green-200 rounded-full">Aktif</span>
                                        @else
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-red-800 bg-red-200 rounded-full">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <form action="{{ route('jadwal-periksa.toggle', $jadwal->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @if($jadwal->status)
                                                    <button type="submit"
                                                        class="bg-yellow-400 hover:bg-yellow-600 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                        Nonaktifkan
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                        Aktifkan
                                                    </button>
                                                @endif
                                            </form>
                                            <a href="{{ route('jadwal-periksa.edit', $jadwal->id) }}"
                                               class="bg-blue-600 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('jadwal-periksa.destroy', $jadwal->id) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
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
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
