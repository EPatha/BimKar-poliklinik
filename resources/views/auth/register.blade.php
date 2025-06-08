<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Pilihan Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="pasien" {{ old('role') == 'pasien' ? 'selected' : '' }}>Pasien</option>
                <option value="dokter" {{ old('role') == 'dokter' ? 'selected' : '' }}>Dokter</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password Khusus Dokter -->
        <div class="mt-4" id="dokter-password-field" style="display: none;">
            <x-input-label for="dokter_password" :value="__('Password Khusus Dokter')" />
            <x-text-input id="dokter_password" class="block mt-1 w-full"
                          type="password"
                          name="dokter_password"
                          autocomplete="off" />
            <x-input-error :messages="$errors->get('dokter_password')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" value="{{ old('alamat') }}" required />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- No KTP -->
        <div class="mt-4">
            <x-input-label for="no_ktp" :value="__('No KTP')" />
            <x-text-input id="no_ktp" class="block mt-1 w-full" type="text" name="no_ktp" value="{{ old('no_ktp') }}" required />
            <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
        </div>

        <!-- No HP -->
        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No HP')" />
            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ old('no_hp') }}" required />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <!-- Poli (khusus dokter) -->
        <div class="mt-4" id="poli-field" style="display: none;">
            <x-input-label for="poli" :value="__('Poli')" />
            <x-text-input id="poli" class="block mt-1 w-full" type="text" name="poli" value="{{ old('poli') }}" />
            <x-input-error :messages="$errors->get('poli')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const dokterPasswordField = document.getElementById('dokter-password-field');
            const poliField = document.getElementById('poli-field');
            function toggleDokterPassword() {
                dokterPasswordField.style.display = roleSelect.value === 'dokter' ? 'block' : 'none';
            }
            function togglePoli() {
                poliField.style.display = roleSelect.value === 'dokter' ? 'block' : 'none';
            }
            roleSelect.addEventListener('change', function() {
                toggleDokterPassword();
                togglePoli();
            });
            toggleDokterPassword();
            togglePoli();
        });
    </script>
</x-guest-layout>
