<x-app-layout>Add commentMore actions
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Janji Periksa
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
            <form method="POST" action="{{ route('pasien.janji.store') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2">Jadwal Periksa</label>
                    <select name="id_jadwal_periksa" required class="w-full border-gray-300 rounded p-2">
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach($jadwal as $j)
                            <option value="{{ $j->id }}">{{ $j->hari }} - {{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2">Keluhan</label>
                    <input type="text" name="keluhan" required class="w-full border-gray-300 rounded p-2" placeholder="Masukkan keluhan Anda">
                </div>
                <div class="flex justify-end">
                <a href="{{ route('pasien.janji.index') }}" class="mr-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Batal</a>
                 <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>