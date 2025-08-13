@section('title', 'Kelola Pengguna')

<div>
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Pengguna</h1>
            <p class="text-gray-600">Lihat, verifikasi, ubah peran, dan kelola akun</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-[#433592] text-white rounded-lg">+ Tambah Pengguna</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Total</p>
            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Terverifikasi</p>
            <p class="text-2xl font-bold">{{ $verifiedUsers }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Belum Verifikasi</p>
            <p class="text-2xl font-bold">{{ $unverifiedUsers }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Admin</p>
            <p class="text-2xl font-bold">{{ $adminUsers }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex space-x-1 bg-gray-100 rounded-lg p-1">
                <button wire:click="setFilter('all')" class="px-4 py-2 text-sm font-medium rounded-md {{ $filter==='all'?'bg-white text-[#433592] shadow-sm':'text-gray-600' }}">Semua</button>
                <button wire:click="setFilter('verified')" class="px-4 py-2 text-sm font-medium rounded-md {{ $filter==='verified'?'bg-white text-[#433592] shadow-sm':'text-gray-600' }}">Terverifikasi</button>
                <button wire:click="setFilter('unverified')" class="px-4 py-2 text-sm font-medium rounded-md {{ $filter==='unverified'?'bg-white text-[#433592] shadow-sm':'text-gray-600' }}">Belum Verif</button>
                <button wire:click="setFilter('admin')" class="px-4 py-2 text-sm font-medium rounded-md {{ $filter==='admin'?'bg-white text-[#433592] shadow-sm':'text-gray-600' }}">Admin</button>
                <button wire:click="setFilter('user')" class="px-4 py-2 text-sm font-medium rounded-md {{ $filter==='user'?'bg-white text-[#433592] shadow-sm':'text-gray-600' }}">User</button>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" wire:model.debounce.300ms="search" placeholder="Cari nama, email, NIM, universitas..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-[#433592] focus:border-[#433592]">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortBy('full_name')">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kontak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pendidikan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortBy('is_verified')">Verifikasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortBy('role')">Peran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortBy('created_at')">Bergabung</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $u)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $u->full_name ?: $u->name }}</div>
                                <div class="text-xs text-gray-500">NIM: {{ $u->nim ?: '-' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $u->email }}</div>
                                <div class="text-xs text-gray-500">WA: {{ $u->whatsapp_number }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $u->university_name }}</div>
                                <div class="text-xs text-gray-500">{{ $u->education_level }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($u->is_verified)
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Terverifikasi</span>
                                @else
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">Belum Verif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($u->role === 'admin')
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Admin</span>
                                @else
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ optional($u->created_at)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.users.edit', $u->id) }}" class="text-[#433592] hover:underline">Edit</a>

                                    @if($u->is_verified)
                                        <button type="button" wire:click="unverify({{ $u->id }})" class="text-orange-600 hover:underline">Cabut Verif</button>
                                    @else
                                        <button type="button" wire:click="verify({{ $u->id }})" class="text-green-600 hover:underline">Verifikasi</button>
                                    @endif

                                    @if($u->role === 'admin')
                                        <button type="button" wire:click="makeUser({{ $u->id }})" class="text-gray-700 hover:underline">Jadikan User</button>
                                    @else
                                        <button type="button" wire:click="makeAdmin({{ $u->id }})" class="text-purple-700 hover:underline">Jadikan Admin</button>
                                    @endif

                                    <button type="button" wire:click="confirmDelete({{ $u->id }})" class="text-red-600 hover:underline">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-6 py-8 text-center text-gray-500">Belum ada pengguna.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="cancelDelete">
            <div class="bg-white w-full max-w-md rounded-xl p-6" wire:click.stop>
                <h3 class="text-lg font-semibold mb-3">Hapus Pengguna</h3>
                <p class="text-sm text-gray-600 mb-6">Yakin hapus pengguna ini? Tindakan tidak bisa dibatalkan.</p>
                <div class="flex justify-end gap-3">
                    <button type="button" wire:click="cancelDelete" class="px-4 py-2 rounded-md border">Batal</button>
                    <button type="button" wire:click="deleteUser" class="px-4 py-2 rounded-md bg-red-600 text-white">Hapus</button>
                </div>
            </div>
        </div>
    @endif
</div>
