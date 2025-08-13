@section('title', $user ? 'Edit Pengguna' : 'Tambah Pengguna')

<div>
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">{{ $user ? 'Edit Pengguna' : 'Tambah Pengguna' }}</h1>
            <p class="text-gray-600">Lengkapi informasi pengguna lalu simpan</p>
        </div>

        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Nama Lengkap *</label>
                <input type="text" wire:model.defer="full_name" class="w-full border rounded-md px-3 py-2">
                @error('full_name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email *</label>
                <input type="email" wire:model.defer="email" class="w-full border rounded-md px-3 py-2">
                @error('email') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">{{ $user ? 'Password (opsional)' : 'Password *' }}</label>
                <input type="password" wire:model.defer="password" class="w-full border rounded-md px-3 py-2" placeholder="{{ $user ? 'Biarkan kosong jika tidak diubah' : '' }}">
                @error('password') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Peran *</label>
                <select wire:model.defer="role" class="w-full border rounded-md px-3 py-2 bg-white">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model.defer="is_verified" class="h-4 w-4">
                <span class="text-sm">Terverifikasi</span>
                @error('is_verified') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Lahir *</label>
                <input type="date" wire:model.defer="birth_date" class="w-full border rounded-md px-3 py-2">
                @error('birth_date') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Alamat *</label>
                <textarea rows="3" wire:model.defer="address" class="w-full border rounded-md px-3 py-2"></textarea>
                @error('address') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nomor WhatsApp *</label>
                <input type="text" wire:model.defer="whatsapp_number" class="w-full border rounded-md px-3 py-2">
                @error('whatsapp_number') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gender *</label>
                <select wire:model.defer="gender" class="w-full border rounded-md px-3 py-2 bg-white">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('gender') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Jenjang *</label>
                <select wire:model.defer="education_level" class="w-full border rounded-md px-3 py-2 bg-white">
                    <option value="">Pilih</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
                @error('education_level') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Universitas *</label>
                <input type="text" wire:model.defer="university_name" class="w-full border rounded-md px-3 py-2">
                @error('university_name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">NIM *</label>
                <input type="text" wire:model.defer="nim" class="w-full border rounded-md px-3 py-2">
                @error('nim') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Asal Organisasi *</label>
                <input type="text" wire:model.defer="organization_origin" class="w-full border rounded-md px-3 py-2">
                @error('organization_origin') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">{{ $user ? 'Foto KTM (opsional)' : 'Foto KTM *' }}</label>
                <input type="file" wire:model="student_id_card_file" class="w-full">
                @error('student_id_card_file') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

                @if($user && $user->student_id_card)
                    <a href="{{ asset('storage/'.$user->student_id_card) }}" class="text-xs text-blue-600 underline" target="_blank">Lihat KTM</a>
                @endif
            </div>

            <div class="md:col-span-2 flex justify-end gap-3 mt-2">
                <a href="{{ route('admin.users') }}" class="px-4 py-2 rounded-md border">Batal</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-[#433592] text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>
