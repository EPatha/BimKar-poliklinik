<!-- resources/views/jadwal-periksa/create-dummy.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tambah Jadwal Periksa') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan isi form di bawah ini untuk menambahkan jadwal pemeriksaan dokter sesuai dengan hari dan waktu yang tersedia.') }}
                            </p>
                        </header>

                        <form class="mt-6" id="formJadwal" action="{{ route('jadwal-periksa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="hariSelect">Hari</label>
                                <select class="form-control" name="hari" id="hariSelect" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>

                            <div class="mb-3 form-group">
                                <label for="jamMulai">Jam Mulai</label>
                                <input type="time" class="form-control" id="jamMulai" name="jam_mulai" required>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="jamSelesai">Jam Selesai</label>
                                <input type="time" class="form-control" id="jamSelesai" name="jam_selesai" required>
                            </div>

                            <input type="hidden" name="status" value="1">

                            <a href="{{ route('jadwal-periksa') }}" class="bg-red-500 hover:bg-red-700 text-white text-xs font-semibold px-4 py-2 rounded transition">Batal</a>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                Simpan
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
