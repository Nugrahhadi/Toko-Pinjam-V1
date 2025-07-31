@push('styles')
<style>
    .login-container {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    
    .login-left {
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem;
    }
    
    .login-right {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem;
        position: relative;
        overflow: hidden;
    }
    
    .login-card {
        width: 100%;
        max-width: 400px;
    }
    
    .economy-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 450px;
        width: 100%;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.3s;
        background: #f9fafb;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        background: white;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #374151;
        font-size: 1rem;
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
    
    .btn-primary:hover {
        background: #4f46e5;
        transform: translateY(-1px);
    }
    
    .password-field {
        position: relative;
    }
    
    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
        padding: 0.25rem;
    }
    
    .password-toggle:hover {
        color: #374151;
    }
    
    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .economy-icon {
        width: 3rem;
        height: 3rem;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .link-style {
        color: #6366f1;
        text-decoration: underline;
        font-weight: 500;
        transition: color 0.3s;
    }
    
    .link-style:hover {
        color: #4f46e5;
    }
    
    @media (max-width: 768px) {
        .login-container {
            grid-template-columns: 1fr;
        }
        
        .login-right {
            order: -1;
            min-height: 40vh;
        }
        
        .login-left {
            padding: 2rem 1rem;
        }
        
        .economy-card {
            padding: 2rem;
        }
    }
</style>
@endpush

<div class="login-container">
    <!-- Left Side - Login Form -->
    <div class="login-left">
        <div class="login-card">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Login</h1>
            </div>

            <form wire:submit.prevent="login">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        wire:model="email" 
                        class="form-input"
                        required
                    >
                    @error('email') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="password-field">
                        <input 
                            type="{{ $showPassword ? 'text' : 'password' }}" 
                            wire:model="password" 
                            class="form-input"
                            required
                        >
                        <div class="password-toggle" wire:click="togglePasswordVisibility">
                            @if($showPassword)
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            @endif
                        </div>
                    </div>
                    @error('password') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">
                        Login
                    </button>
                </div>

                <div class="text-center space-y-3">
                    <div>
                        <a href="https://wa.me/6285128050500?text=Halo%20Admin%2C%20saya%20lupa%20password%20akun%20saya.%20Mohon%20bantuannya." class="link-style" target="_blank">
                            Lupa password? hubungi kami
                        </a>
                    </div>
                    <div>
                        <span class="text-gray-600">Belum punya akun? </span>
                        <a href="{{ route('register-custom') }}" class="link-style">
                            Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Economy Card -->
    <div class="login-right">
        <div class="economy-card">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">In this economy?</h2>
            
            <div class="space-y-6 text-left">
                <div class="flex items-start gap-4">
                    <div class="economy-icon">
                        💰
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Hidup hemat, nabung, biar ada uang untuk investasi</h3>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="economy-icon">
                        🌍
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Lindungi bumi, supaya engga kepanasan setiap hari</h3>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="economy-icon">
                        🤝
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Saling menguatkan sesama,</h3>
                        <p class="text-gray-600 italic">Together Apes Strong!</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <h3 class="text-xl font-bold text-gray-800">
                    Toko Pinjam hadir untuk itu, untuk kamu.
                </h3>
            </div>
        </div>
    </div>
</div>
