<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Janji Periksa
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
            <form method="POST" action="{{ route('pasien.janji.update', $janji->id) }}" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2">Jadwal Periksa</label>
                    <select name="id_jadwal_periksa" required class="w-full border-gray-300 rounded p-2">
                        @foreach($jadwal as $j)
                            <option value="{{ $j->id }}" {{ $janji->id_jadwal_periksa == $j->id ? 'selected' : '' }}>
                                {{ $j->hari }} - {{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2">Keluhan</label>
                    <input type="text" name="keluhan" value="{{ $janji->keluhan }}" required class="w-full border-gray-300 rounded p-2">
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('pasien.janji.index') }}" class="mr-4 px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded hover:bg-gray-300 dark:hover:bg-gray-600">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>