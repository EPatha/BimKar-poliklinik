<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Riwayat Pemeriksaan
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-5xl mx-auto bg-white dark:bg-gray-900 p-8 rounded shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-white-800">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Tanggal Periksa</th>
                            <th class="px-4 py-2">Keluhan</th>
                            <th class="px-4 py-2">Catatan Dokter</th>
                            <th class="px-4 py-2">Obat</th>
                            <th class="px-4 py-2">Total Harga Obat</th>
                            <th class="px-4 py-2">Biaya Pemeriksaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayats as $periksa)
                        <tr>
                            <td class="bg-white text-black px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="bg-white text-blackpx-4 py-2">{{ Carbon\Carbon::parse($periksa->tgl_periksa)->format('d-m-Y') }}</td>
                            <td class="bg-white text-blackpx-4 py-2">{{ $periksa->janjiPeriksa->keluhan ?? '-' }}</td>
                            <td class="bg-white text-blackpx-4 py-2">{{ $periksa->catatan ?? '-' }}</td>
                            <td class="bg-white text-blackpx-4 py-2">
                                @if($periksa->obats && $periksa->obats->count())
                                    <ul class="bg-white text-black list-disc pl-4">
                                        @foreach($periksa->obats as $obat)
                                            <li>
                                                <strong>{{ $obat->nama_obat }}</strong>
                                                <br>Kemasan: {{ $obat->kemasan }}
                                                <br>Harga: Rp{{ number_format($obat->harga) }}/pcs
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="bg-white text-black italic text-gray-500">Tidak ada obat</span>
                                @endif
                            </td>
                            <td class="bg-white text-black px-4 py-2">
                                @php
                                    $totalObat = $periksa->obats->sum('harga');
                                @endphp
                                Rp{{ number_format($totalObat) }}
                            </td>
                            <td class="bg-white text-black px-4 py-2">
                                Rp{{ number_format($periksa->biaya_periksa) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500 dark:text-gray-300">Belum ada riwayat pemeriksaan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>