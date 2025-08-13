<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $showPassword = false;
    public $isSubmitting = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'Email harus diisi',
        'email.email' => 'Format email tidak valid',
        'password.required' => 'Password harus diisi',
    ];

    public function login()
    {
        $this->isSubmitting = true;

        try {
            $this->validate();

            $this->ensureIsNotRateLimited();

            if (! Auth::attempt($this->only(['email', 'password']), $this->remember)) {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => 'Email atau password salah.',
                ]);
            }

            RateLimiter::clear($this->throttleKey());

            session()->regenerate();

            // Redirect berdasarkan role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return redirect()->intended(route('home'));
            }
        } catch (ValidationException $e) {
            $this->isSubmitting = false;
            throw $e;
        } catch (\Exception $e) {
            $this->isSubmitting = false;
            $this->addError('general', 'Terjadi kesalahan saat login. Silakan coba lagi.');
        }
    }

    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
