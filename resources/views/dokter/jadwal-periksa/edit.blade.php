<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Jadwal Periksa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <form class="mt-6" action="{{ route('jadwal-periksa.update', $jadwal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 form-group">
                            <label for="hariSelect">Hari</label>
                            <select class="form-control" name="hari" id="hariSelect" required>
                                <option value="">Pilih Hari</option>
                                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="jamMulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jamMulai" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" required>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="jamSelesai">Jam Selesai</label>
                            <input type="time" class="form-control" id="jamSelesai" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" required>
                        </div>
                        <input type="hidden" name="status" value="{{ $jadwal->status }}">
                        <a href="{{ route('jadwal-periksa') }}" class="bg-red-500 hover:bg-red-700 text-white text-xs font-semibold px-4 py-2 rounded transition">Batal</a>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>