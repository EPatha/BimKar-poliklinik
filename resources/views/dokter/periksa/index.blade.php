<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Periksa Pasien
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-5xl mx-auto bg-white dark:bg-gray-900 p-8 rounded shadow">
            @if(session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                    class="mb-4 px-4 py-2 rounded bg-green-500 text-white text-center shadow transition-all duration-500">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-white-700">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama Pasien</th>
                            <th class="px-4 py-2">Keluhan</th>
                            <th class="px-4 py-2">Tanggal Periksa</th>
                            <th class="px-4 py-2">Catatan</th>
                            <th class="px-4 py-2">Biaya</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-black"></tbody>
                        @forelse($janjiPeriksas as $j)
                        <tr class="border-b">
                            <td class="bg-white text-black px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="bg-white text-black px-4 py-2">{{ $j->pasien->nama ?? '-' }}</td>
                            <td class="bg-white text-black px-4 py-2">{{ $j->keluhan ?? '-' }}</td>
                            <td class="bg-white text-black px-4 py-2">
                                {{ $j->periksa ? \Carbon\Carbon::parse($j->periksa->tgl_periksa)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="bg-white text-black px-4 py-2">{{ $j->periksa->catatan ?? '-' }}</td>
                            <td class="bg-white text-black px-4 py-2">
                                {{ $j->periksa ? 'Rp' . number_format($j->periksa->biaya_periksa) : '-' }}
                            </td>
                            <td class="bg-white text-black px-4 py-2">
                                @if($j->periksa)
                                    <a href="{{ route('dokter.periksa.edit', $j->periksa->id) }}" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Edit</a>
                                @else
                                    <a href="{{ route('dokter.periksa.create', ['id_janji_periksa' => $j->id]) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Periksa</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500 dark:text-gray-300">Belum ada janji periksa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>