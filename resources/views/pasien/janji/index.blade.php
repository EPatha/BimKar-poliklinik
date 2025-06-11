<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Janji Periksa
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 p-8 rounded shadow">
            {{-- Popup sukses --}}
            @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 2000)" 
                    x-show="show"
                    class="mb-4 px-4 py-2 rounded bg-green-500 text-white text-center shadow transition-all duration-500"
                >
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-between mb-4">
                <a href="{{ route('pasien.janji.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition">Buat Janji Baru</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-blue-100 dark:bg-blue-800">
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">No</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">Jadwal</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">Dokter</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">Poli</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">Keluhan</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">No Antrian</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-100 font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($janji as $j)
                        <tr class="border-b !bg-white hover:bg-gray-50">
                            <td class="px-4 py-2 text-center !text-black">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 !text-black">
                                <span class="font-semibold">{{ $j->jadwalPeriksa->hari ?? '-' }}</span><br>
                                <span class="text-sm text-gray-600">
                                    {{ $j->jadwalPeriksa->jam_mulai ?? '' }} - {{ $j->jadwalPeriksa->jam_selesai ?? '' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 !text-black">
                                {{ $j->jadwalPeriksa->dokter->nama ?? '-' }}<br>
                            </td>
                             <td class="px-4 py-2 !text-black">
                                {{ $j->jadwalPeriksa->dokter->poli ?? '-' }}<br>
                            </td>
                            <td class="px-4 py-2 !text-black">{{ $j->keluhan }}</td>
                            <td class="px-4 py-2 text-center !text-black">{{ $j->no_antrian }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('pasien.janji.edit', $j->id) }}" class="px-3 py-1 bg-yellow-500 text-white font-semibold rounded hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('pasien.janji.destroy', $j->id) }}" method="POST" onsubmit="return confirm('Hapus janji ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white font-semibold rounded hover:bg-red-700 transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-300">Belum ada janji periksa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>