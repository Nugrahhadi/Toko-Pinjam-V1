<div class="min-h-screen bg-gray-50 py-8 px-4 relative">
    {{-- Back Button --}}
    <button type="button"
            x-data
            @click="window.history.back()"
            title="Kembali ke halaman sebelumnya"
            aria-label="Kembali ke halaman sebelumnya"
            class="absolute top-4 left-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-sm border border-gray-300 rounded-full flex items-center justify-center hover:bg-white hover:shadow-lg transition-all duration-200">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <div class="max-w-4xl mx-auto">
        
        {{-- Success Alert --}}
        @if($showSuccessAlert)
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => { show = false; $wire.closeAlert(); }, 3000)"
             class="mb-8 bg-blue-50 border border-blue-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-semibold text-blue-900">Pendaftaran Berhasil!</h3>
                    <p class="text-blue-700 mt-1">Tim kami akan memverifikasi data kamu, dan menginformasikan via WhatsApp jika akun sudah bisa login, dalam 48 jam.</p>
                </div>
                <button wire:click="closeAlert" class="ml-4 text-blue-400 hover:text-blue-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        @endif

        {{-- Register Form --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#433592] mb-2">Daftar Akun Toko Pinjam</h1>
                <p class="text-gray-600">Isi data diri dengan lengkap untuk membuat akun</p>
            </div>

            <form wire:submit="register" class="space-y-8">
                
                {{-- Section 1: Account Information --}}
                <div class="border-b border-gray-200 pb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Informasi Akun</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" 
                                   id="email"
                                   wire:model="email" 
                                   placeholder="contoh@email.com"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                            <input type="password" 
                                   id="password"
                                   wire:model="password" 
                                   placeholder="Minimal 8 karakter (A-Z, a-z, 0-9)"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            <p class="text-xs text-gray-500 mt-1">Minimal 8 huruf, mengandung A-Z, a-z, 0-9</p>
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Section 2: Personal Data --}}
                <div class="border-b border-gray-200 pb-8">
                    <h2 class="text-xl font-semibold text-[#433592] mb-6">Data Diri</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Full Name --}}
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" 
                                   id="full_name"
                                   wire:model="full_name" 
                                   placeholder="Nama lengkap sesuai KTP"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Birth Date --}}
                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir *</label>
                            <input type="date" 
                                   id="birth_date"
                                   wire:model="birth_date"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('birth_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Address --}}
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                            <textarea id="address"
                                      wire:model="address" 
                                      rows="3"
                                      placeholder="Alamat lengkap tempat tinggal"
                                      class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all resize-none"></textarea>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- WhatsApp Number --}}
                        <div>
                            <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-2">Nomor WhatsApp *</label>
                            <input type="text" 
                                   id="whatsapp_number"
                                   wire:model="whatsapp_number" 
                                   placeholder="08xxxxxxxxx"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('whatsapp_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Gender --}}
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin *</label>
                            <select id="gender" 
                                    wire:model="gender"
                                    class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all bg-white">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Section 3: Education Information --}}
                <div class="border-b border-gray-200 pb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Informasi Pendidikan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Education Level --}}
                        <div>
                            <label for="education_level" class="block text-sm font-medium text-gray-700 mb-2">Jenjang Pendidikan *</label>
                            <select id="education_level" 
                                    wire:model="education_level"
                                    class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all bg-white">
                                <option value="">Pilih Jenjang Pendidikan</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                            @error('education_level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- University Name --}}
                        <div>
                            <label for="university_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Universitas *</label>
                            <input type="text" 
                                   id="university_name"
                                   wire:model="university_name" 
                                   placeholder="Nama universitas lengkap"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('university_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- NIM --}}
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM *</label>
                            <input type="text" 
                                   id="nim"
                                   wire:model="nim" 
                                   placeholder="Nomor Induk Mahasiswa"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('nim') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Student ID Card Upload --}}
                        <div>
                            <label for="student_id_card" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto KTM *</label>
                            <input type="file" 
                                   id="student_id_card"
                                   wire:model="student_id_card" 
                                   accept="image/jpeg,image/png,image/jpg"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, JPG. Maksimal 500KB</p>
                            @error('student_id_card') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Organization Origin --}}
                        <div class="md:col-span-2">
                            <label for="organization_origin" class="block text-sm font-medium text-gray-700 mb-2">Asal Organisasi *</label>
                            <input type="text" 
                                   id="organization_origin"
                                   wire:model="organization_origin" 
                                   placeholder="Nama organisasi atau komunitas"
                                   class="w-full px-4 py-3 border-2 border-[#433592] rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none transition-all">
                            @error('organization_origin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Terms and Conditions --}}
                <div class="space-y-6">
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" 
                               id="agreeTerms"
                               wire:model="agreeTerms"
                               class="mt-1 h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="agreeTerms" class="text-sm text-gray-700">
                            Saya telah membaca dan mengerti 
                            <a href="/syarat-ketentuan" target="_blank" class="text-[#433592] underline hover:text-purple-700">
                                peraturan Toko Pinjam
                            </a>
                        </label>
                    </div>
                    @error('agreeTerms') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror

                    {{-- Submit Button --}}
                    <button type="submit" 
                            x-data="{ isDisabled: @entangle('agreeTerms').live }"
                            :disabled="!isDisabled"
                            :class="isDisabled ? 'bg-[#433592] hover:bg-purple-700 hover:-translate-y-0.5 hover:shadow-lg' : 'bg-gray-400 cursor-not-allowed'"
                            class="w-full py-4 px-6 rounded-lg font-semibold text-white transition-all duration-200 flex items-center justify-center">
                        @if($isSubmitting)
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mendaftar...
                        @else
                            Buat Akun
                        @endif
                    </button>

                    {{-- Login Link --}}
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun? 
                            <a href="{{ route('login.custom') }}" 
                               class="text-purple-600 hover:text-purple-700 font-medium underline">
                                Login di sini
                            </a>
                        </p>
                    </div>
                </div>

                @error('general')
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                @enderror
            </form>
        </div>
    </div>
</div>
