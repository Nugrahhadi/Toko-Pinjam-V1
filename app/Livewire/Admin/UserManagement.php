<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    use WithPagination;

    public $filter = 'all'; // all | verified | unverified | admin | user
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public $showDeleteModal = false;
    public $deleteUserId = null;

    protected $queryString = [
        'filter' => ['except' => 'all'],
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch(){ $this->resetPage(); }
    public function updatingFilter(){ $this->resetPage(); }
    public function setFilter($filter){ $this->filter = $filter; $this->resetPage(); }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function confirmDelete($userId){ $this->deleteUserId = $userId; $this->showDeleteModal = true; }
    public function cancelDelete(){ $this->showDeleteModal = false; $this->deleteUserId = null; }

    public function deleteUser()
    {
        if (!$this->deleteUserId) return;
        if ($this->deleteUserId == Auth::id()) {
            session()->flash('message', 'Tidak bisa menghapus akun sendiri.');
            $this->cancelDelete();
            return;
        }
        User::findOrFail($this->deleteUserId)->delete();
        $this->cancelDelete();
        session()->flash('message', 'User berhasil dihapus.');
    }

    public function verify($userId){ User::findOrFail($userId)->update(['is_verified' => true]); session()->flash('message', 'User diverifikasi.'); }
    public function unverify($userId){ User::findOrFail($userId)->update(['is_verified' => false]); session()->flash('message', 'Verifikasi user dicabut.'); }

    public function makeAdmin($userId){ User::findOrFail($userId)->update(['role' => 'admin']); session()->flash('message', 'Peran user dijadikan admin.'); }
    public function makeUser($userId)
    {
        if ($userId == Auth::id()) { session()->flash('message', 'Tidak bisa menurunkan peran akun sendiri.'); return; }
        User::findOrFail($userId)->update(['role' => 'user']);
        session()->flash('message', 'Peran user dijadikan user biasa.');
    }

    public function getUsersProperty()
    {
        $q = User::query()
            ->when($this->search, function($qq){
                $term = '%'.$this->search.'%';
                $qq->where(function($w) use ($term){
                    $w->where('name', 'like', $term)
                      ->orWhere('full_name', 'like', $term)
                      ->orWhere('email', 'like', $term)
                      ->orWhere('nim', 'like', $term)
                      ->orWhere('university_name', 'like', $term)
                      ->orWhere('whatsapp_number', 'like', $term);
                });
            })
            ->when($this->filter !== 'all', function($qq){
                switch ($this->filter) {
                    case 'verified':   $qq->where('is_verified', true); break;
                    case 'unverified': $qq->where('is_verified', false); break;
                    case 'admin':      $qq->where('role', 'admin'); break;
                    case 'user':       $qq->where('role', 'user'); break;
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        return $q->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.user-management', [
            'users'           => $this->users,
            'totalUsers'      => User::count(),
            'verifiedUsers'   => User::where('is_verified', true)->count(),
            'unverifiedUsers' => User::where('is_verified', false)->count(),
            'adminUsers'      => User::where('role', 'admin')->count(),
        ])->extends('layouts.admin')->section('content');
    }
}
