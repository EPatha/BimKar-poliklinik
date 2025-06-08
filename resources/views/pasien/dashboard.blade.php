<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ __("Selamat datang, Pasien!") }}</p>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Menu Profil -->
                        <a href="{{ route('pasien.profil') }}" class="block p-4 bg-blue-100 dark:bg-blue-900 rounded shadow hover:bg-blue-200 dark:hover:bg-blue-800">
                            Profil
                        </a>
                        <!-- Menu Riwayat Pemeriksaan -->
                        <a href="{{ route('pasien.riwayat') }}" class="block p-4 bg-green-100 dark:bg-green-900 rounded shadow hover:bg-green-200 dark:hover:bg-green-800">
                            Riwayat Pemeriksaan
                        </a>
                        <!-- Menu Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full p-4 bg-red-100 dark:bg-red-900 rounded shadow hover:bg-red-200 dark:hover:bg-red-800">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
