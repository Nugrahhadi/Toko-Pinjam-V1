<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

class RegisterForm extends Component
{
    use WithFileUploads;

    // Authentication fields
    public $email = '';
    public $password = '';

    // Personal data fields
    public $full_name = '';
    public $birth_date = '';
    public $address = '';
    public $whatsapp_number = '';
    public $gender = '';
    public $education_level = '';
    public $university_name = '';
    public $nim = '';
    public $student_id_card;
    public $organization_origin = '';
    public $terms_accepted = false;
    public $agreeTerms = false;

    public $showSuccessAlert = false;
    public $isSubmitting = false;

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'full_name' => 'required|string|min:2|max:255',
        'birth_date' => 'required|date|before:today',
        'address' => 'required|string|max:500',
        'whatsapp_number' => 'required|string|min:10|max:15',
        'gender' => 'required|in:Laki-laki,Perempuan',
        'education_level' => 'required|in:D3,D4,S1,S2,S3',
        'university_name' => 'required|string|max:255',
        'nim' => 'required|string|unique:users,nim|max:20',
        'student_id_card' => 'required|image|mimes:jpeg,png,jpg|max:500',
        'organization_origin' => 'required|string|max:255',
        'terms_accepted' => 'accepted',
        'agreeTerms' => 'accepted',
    ];

    protected $messages = [
        'email.required' => 'Email harus diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'password.min' => 'Password minimal 8 karakter',
        'full_name.required' => 'Nama lengkap harus diisi',
        'birth_date.required' => 'Tanggal lahir harus diisi',
        'birth_date.before' => 'Tanggal lahir harus sebelum hari ini',
        'address.required' => 'Alamat lengkap harus diisi',
        'whatsapp_number.required' => 'Nomor WhatsApp harus diisi',
        'whatsapp_number.min' => 'Nomor WhatsApp minimal 10 digit',
        'whatsapp_number.max' => 'Nomor WhatsApp maksimal 15 digit',
        'gender.required' => 'Jenis kelamin harus dipilih',
        'education_level.required' => 'Jenjang pendidikan harus dipilih',
        'university_name.required' => 'Nama universitas harus diisi',
        'nim.required' => 'NIM harus diisi',
        'nim.unique' => 'NIM sudah terdaftar',
        'student_id_card.required' => 'Foto KTM harus diupload',
        'student_id_card.image' => 'File harus berupa gambar',
        'student_id_card.mimes' => 'Format yang didukung: JPEG, PNG, JPG',
        'student_id_card.max' => 'Ukuran file maksimal 500KB',
        'organization_origin.required' => 'Asal organisasi harus diisi',
        'terms_accepted.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
        'agreeTerms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
    ];

    public function register()
    {
        $this->isSubmitting = true;

        try {
            // Set terms_accepted from agreeTerms for compatibility
            $this->terms_accepted = $this->agreeTerms;

            $this->validate();

            // Upload student ID card
            $studentIdPath = null;
            if ($this->student_id_card) {
                $studentIdPath = $this->student_id_card->store('student-ids', 'public');
            }

            // Create user
            $user = User::create([
                'name' => $this->full_name, // Keep for compatibility
                'full_name' => $this->full_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'user',
                'birth_date' => $this->birth_date,
                'address' => $this->address,
                'whatsapp_number' => $this->whatsapp_number,
                'gender' => $this->gender,
                'education_level' => $this->education_level,
                'university_name' => $this->university_name,
                'nim' => $this->nim,
                'student_id_card' => $studentIdPath,
                'organization_origin' => $this->organization_origin,
                'is_verified' => false,
            ]);

            event(new Registered($user));

            $this->resetForm();
            $this->showSuccessAlert = true; // Set after resetForm to prevent reset
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e; // Re-throw validation exceptions to show field-specific errors
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'email' => $this->email,
                'full_name' => $this->full_name
            ]);
            $this->addError('general', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi. Detail: ' . $e->getMessage());
        } finally {
            $this->isSubmitting = false;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'email',
            'password',
            'full_name',
            'birth_date',
            'address',
            'whatsapp_number',
            'gender',
            'education_level',
            'university_name',
            'nim',
            'student_id_card',
            'organization_origin',
            'terms_accepted',
            'agreeTerms'
        ]);
    }

    public function closeAlert()
    {
        $this->showSuccessAlert = false;
        return redirect()->route('login.custom');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
