<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Periksa Pasien
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-xl mx-auto bg-white dark:bg-gray-900 p-8 rounded shadow">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('dokter.periksa.store') }}">
                @csrf
                <input type="hidden" name="id_janji_periksa" value="{{ $janji->id }}">
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Nama Pasien</label>
                    <input type="text" value="{{ $janji->pasien->nama ?? $janji->id_pasien }}" class="w-full border-gray-300 rounded p-2 bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa" class="w-full border-gray-300 rounded p-2" required>
                    <small class="text-gray-500">Hanya hari yang sesuai jadwal aktif yang dapat dipilih.</small>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Jam Periksa</label>
                    <select name="jam_periksa" id="jam_periksa" class="w-full border-gray-300 rounded p-2" required>
                        <option value="">-- Pilih Jam --</option>
                        {{-- Jam akan diisi via JS --}}
                    </select>
                    <small class="text-gray-500">Jam sesuai jadwal aktif.</small>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Catatan</label>
                    <textarea name="catatan" class="w-full border-gray-300 rounded p-2 @error('catatan') border-red-500 @enderror" required>{{ old('catatan') }}</textarea>
                    <small class="text-gray-500 italic">* Harus diisi</small>
                    @error('catatan')
                        <div class="text-red-500 text-sm italic mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Pilih Obat</label>
                    <select name="obat_id[]" id="obat_id" class="w-full border-gray-300 rounded p-2" multiple>
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                {{ $obat->nama_obat }} (Stok: {{ $obat->stok }}, Harga: Rp{{ number_format($obat->harga) }})
                            </option>
                        @endforeach
                    </select>
                    <small class="text-gray-500">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu obat.</small>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Biaya Pemeriksaan (Rp)</label>
                    <input type="text" name="biaya_periksa" id="biaya_periksa" class="w-full border-gray-300 rounded p-2" readonly required>
                    <small class="text-gray-500">Otomatis: 150.000 + total harga obat.</small>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('dokter.periksa.index') }}" class="mr-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Hitung biaya otomatis
        function hitungBiaya() {
            let base = 150000;
            let totalObat = 0;
            let select = document.getElementById('obat_id');
            for (let option of select.selectedOptions) {
                totalObat += parseInt(option.getAttribute('data-harga') || 0);
            }
            let total = base + totalObat;
            document.getElementById('biaya_periksa').value = total.toLocaleString('id-ID');
        }
        document.getElementById('obat_id').addEventListener('change', hitungBiaya);
        window.addEventListener('DOMContentLoaded', hitungBiaya);

        // Data jadwal aktif dari backend
        const jadwalAktif = @json($jadwal_aktif->map(function($j){
            return [
                'hari' => strtolower($j->hari), // ex: 'senin'
                'jam_mulai' => $j->jam_mulai,
                'jam_selesai' => $j->jam_selesai
            ];
        }));

        // Fungsi untuk dapatkan nama hari dari tanggal (dalam bahasa Indonesia)
        function getHari(dateString) {
            const hari = ['minggu','senin','selasa','rabu','kamis','jumat','sabtu'];
            const d = new Date(dateString);
            return hari[d.getDay()];
        }

        document.getElementById('tgl_periksa').addEventListener('change', function() {
            const hari = getHari(this.value);
            const jamSelect = document.getElementById('jam_periksa');
            jamSelect.innerHTML = '<option value="">-- Pilih Jam --</option>';
            jadwalAktif.forEach(jadwal => {
                if(jadwal.hari === hari) {
                    jamSelect.innerHTML += `<option value="${jadwal.jam_mulai} - ${jadwal.jam_selesai}">${jadwal.jam_mulai} - ${jadwal.jam_selesai}</option>`;
                }
            });
        });
    </script>
</x-app-layout>