<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserEditor extends Component
{
    use WithFileUploads;

    public ?User $user = null;

    public $full_name = '';
    public $email = '';
    public $password = '';
    public $role = 'user';
    public $is_verified = false;

    public $birth_date;
    public $address = '';
    public $whatsapp_number = '';
    public $gender = '';
    public $education_level = '';
    public $university_name = '';
    public $nim = '';
    public $organization_origin = '';

    public $avatar_file;
    public $student_id_card_file;

    public function mount(?int $userId = null)
    {
        if ($userId) {
            $this->user = User::findOrFail($userId);
            $this->fill([
                'full_name' => $this->user->full_name ?? $this->user->name,
                'email' => $this->user->email,
                'role' => $this->user->role,
                'is_verified' => (bool)$this->user->is_verified,
                'birth_date' => optional($this->user->birth_date)->toDateString(),
                'address' => $this->user->address,
                'whatsapp_number' => $this->user->whatsapp_number,
                'gender' => $this->user->gender,
                'education_level' => $this->user->education_level,
                'university_name' => $this->user->university_name,
                'nim' => $this->user->nim,
                'organization_origin' => $this->user->organization_origin,
            ]);
        }
    }

    protected function rules()
{
    $isCreate = is_null($this->user);
    $req      = $isCreate ? 'required' : 'nullable';

    return [
        'full_name' => ['required','string','max:255'],
        'email'     => ['required','email', Rule::unique('users','email')->ignore($this->user?->id)],
        'password'  => [$isCreate ? 'required' : 'nullable','min:8'],
        'role'      => ['required', Rule::in(['admin','user'])],
        'is_verified' => ['boolean'],

        // Wajib saat create (mengikuti migration mu yang NOT NULL)
        'birth_date'        => [$req,'date'],
        'address'           => [$req,'string','max:1000'],
        'whatsapp_number'   => [$req,'string','max:20'],
        'gender'            => [$req, Rule::in(['Laki-laki','Perempuan'])],
        'education_level'   => [$req, Rule::in(['D3','D4','S1','S2','S3'])],
        'university_name'   => [$req,'string','max:255'],
        'nim'               => [$req,'string','max:50', Rule::unique('users','nim')->ignore($this->user?->id)],
        'organization_origin'=>[$req,'string','max:255'],

        'avatar_file'       => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],

        // KTM wajib saat create
        'student_id_card_file' => [$isCreate ? 'required' : 'nullable','image','mimes:jpg,jpeg,png','max:2048'],
    ];
}

public function save()
{
    $this->validate();

    $data = [
        'name'               => $this->full_name,
        'full_name'          => $this->full_name,
        'email'              => $this->email,
        'role'               => $this->role,
        'is_verified'        => (bool)$this->is_verified,
        'birth_date'         => $this->birth_date,
        'address'            => $this->address,
        'whatsapp_number'    => $this->whatsapp_number,
        'gender'             => $this->gender,
        'education_level'    => $this->education_level,
        'university_name'    => $this->university_name,
        'nim'                => $this->nim,
        'organization_origin'=> $this->organization_origin,
    ];

    if ($this->password) {
        $data['password'] = Hash::make($this->password);
    }

    // Uploads
    if ($this->avatar_file) {
        if ($this->user?->avatar) Storage::disk('public')->delete($this->user->avatar);
        $data['avatar'] = $this->avatar_file->store('avatars', 'public');
    }
    if ($this->student_id_card_file) {
        if ($this->user?->student_id_card) Storage::disk('public')->delete($this->user->student_id_card);
        $data['student_id_card'] = $this->student_id_card_file->store('student-ids', 'public');
    }

    if ($this->user) {
        if ($this->user->id === Auth::id() && $this->user->role === 'admin' && $this->role !== 'admin') {
            $data['role'] = 'admin';
        }
        $this->user->update($data);
        session()->flash('message', 'User diperbarui.');
    } else {
        // student_id_card TETAP wajib ada karena kolom NOT NULL
        if (empty($data['student_id_card'] ?? null)) {
            $this->addError('student_id_card_file', 'Foto KTM wajib diupload.');
            return;
        }
        $this->user = User::create($data);
        session()->flash('message', 'User dibuat.');
    }

    return redirect()->route('admin.users');
}


    public function render()
    {
        return view('livewire.admin.user-editor')
            ->extends('layouts.admin')
            ->section('content');
    }
}
