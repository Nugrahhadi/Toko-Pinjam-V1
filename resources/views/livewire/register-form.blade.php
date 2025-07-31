@push('styles')
<style>
    .register-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    
    .register-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        max-width: 600px;
        width: 100%;
        padding: 2.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.3s;
        background: white;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #374151;
    }
    
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 1rem;
        background: white;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .form-select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .btn-primary {
        background: #6366f1;
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 0.5rem;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
    }
    
    .btn-primary:hover:not(:disabled) {
        background: #4f46e5;
        transform: translateY(-1px);
    }
    
    .btn-primary:disabled {
        background: #9ca3af;
        cursor: not-allowed;
        transform: none;
    }
    
    .btn-secondary {
        background: transparent;
        color: #6366f1;
        padding: 0.875rem 2rem;
        border-radius: 0.5rem;
        border: 2px solid #6366f1;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    
    .btn-secondary:hover {
        background: #6366f1;
        color: white;
    }
    
    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin: 1.5rem 0;
    }
    
    .checkbox-group input[type="checkbox"] {
        margin-top: 0.25rem;
        transform: scale(1.2);
    }
    
    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #374151;
        margin: 2rem 0 1rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .file-upload {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    
    .file-upload input[type="file"] {
        position: absolute;
        left: -9999px;
    }
    
    .file-upload-label {
        display: block;
        padding: 0.75rem 1rem;
        border: 2px dashed #d1d5db;
        border-radius: 0.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: #f9fafb;
    }
    
    .file-upload-label:hover {
        border-color: #6366f1;
        background: #f0f4ff;
    }
    
    .file-upload-label.has-file {
        border-color: #10b981;
        background: #ecfdf5;
        border-style: solid;
    }
</style>
@endpush

<div>
    <!-- Success Alert Modal -->
    @if($showSuccessAlert)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" wire:click="closeAlert">
        <div class="bg-white rounded-2xl p-8 mx-4 max-w-md w-full text-center shadow-2xl" onclick="event.stopPropagation();">
            <div class="mb-6">
                <div class="w-20 h-20 bg-blue-500 rounded-2xl mx-auto flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                    Pendaftaran berhasil!
                </h3>
                <p class="text-gray-600">
                    Tim kami akan memverifikasi data kamu, dan menginformasikan via WhatsApp jika akun sudah bisa login, dalam 48 jam.
                </p>
            </div>
            <button wire:click="closeAlert" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition-all">
                Login
            </button>
        </div>
    </div>
    @endif

    <div class="register-container">
        <div class="register-card">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Registrasi Akun</h1>
                <p class="text-gray-600">Isi semua kolom dalam formulir registrasi dibawah ini.</p>
            </div>

            <form wire:submit.prevent="register">
                <!-- Email & Password Section -->
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        wire:model="email" 
                        class="form-input" 
                        placeholder="Alamat email"
                        required
                    >
                    @error('email') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        wire:model="password" 
                        class="form-input" 
                        placeholder="Password"
                        required
                    >
                    <div class="text-sm text-gray-500 mt-1">Minimal 8 huruf, mengandung A-Z, a-z, 0-9</div>
                    @error('password') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Data Diri Section -->
                <div class="section-title">Data diri</div>

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input 
                        type="text" 
                        wire:model="full_name" 
                        class="form-input" 
                        placeholder="Nama Lengkap"
                        required
                    >
                    @error('full_name') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Tanggal Lahir</label>
                        <input 
                            type="date" 
                            wire:model="birth_date" 
                            class="form-input"
                            required
                        >
                        @error('birth_date') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat Lengkap</label>
                        <input 
                            type="text" 
                            wire:model="address" 
                            class="form-input" 
                            placeholder="Alamat Lengkap"
                            required
                        >
                        @error('address') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input 
                            type="text" 
                            wire:model="whatsapp_number" 
                            class="form-input" 
                            placeholder="Nomor WhatsApp"
                            required
                        >
                        @error('whatsapp_number') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select wire:model="gender" class="form-select" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('gender') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jenjang Pendidikan</label>
                        <select wire:model="education_level" class="form-select" required>
                            <option value="">Jenjang Pendidikan</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('education_level') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Universitas</label>
                        <input 
                            type="text" 
                            wire:model="university_name" 
                            class="form-input" 
                            placeholder="Nama Universitas"
                            required
                        >
                        @error('university_name') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NIM</label>
                        <input 
                            type="text" 
                            wire:model="nim" 
                            class="form-input" 
                            placeholder="Nomor Induk Mahasiswa (NIM)"
                            required
                        >
                        @error('nim') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Upload Foto KTM</label>
                        <div class="file-upload">
                            <input 
                                type="file" 
                                wire:model="student_id_card" 
                                id="student_id_card"
                                accept="image/*"
                                required
                            >
                            <label 
                                for="student_id_card" 
                                class="file-upload-label {{ $student_id_card ? 'has-file' : '' }}"
                            >
                                @if ($student_id_card)
                                    ✓ {{ $student_id_card->getClientOriginalName() }}
                                @else
                                    Upload foto KTM
                                @endif
                            </label>
                        </div>
                        <div class="text-sm text-gray-500 mt-1">Maksimal 500KB</div>
                        @error('student_id_card') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Asal Organisasi</label>
                    <input 
                        type="text" 
                        wire:model="organization_origin" 
                        class="form-input" 
                        placeholder="Asal Organisasi"
                        required
                    >
                    @error('organization_origin') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Terms and Conditions -->
                <div class="checkbox-group">
                    <input 
                        type="checkbox" 
                        wire:model="terms_accepted" 
                        id="terms" 
                        class="text-blue-600"
                    >
                    <label for="terms" class="text-sm text-gray-700">
                        Saya telah membaca dan mengerti 
                        <a href="{{ route('syarat-ketentuan') }}" class="text-blue-600 underline hover:text-blue-800" target="_blank">
                            peraturan Toko Pinjam
                        </a> 
                        dan bersedia untuk mengikuti dan tunduk kepada aturan tersebut.
                    </label>
                </div>
                @error('terms_accepted') <div class="error-message">{{ $message }}</div> @enderror

                <!-- Submit Button -->
                <div class="form-group">
                    <button 
                        type="submit" 
                        class="btn-primary"
                        {{ !$terms_accepted ? 'disabled' : '' }}
                    >
                        Buat Akun
                    </button>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="btn-secondary">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
