<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserHasRole extends Component
{
    public $title;
    public $user;
    public $roles;
    public $selectedRoles = [];
    public $selectedUserId;

    public function mount($id)
    {
        $this->title = trans('role-permission.user_has_role.title');
        $this->user = User::findOrFail($id);
        $this->roles = Role::all();
        $this->selectedUserId = $this->user->id;
        $this->selectedRoles = $this->user->roles->pluck('name')->toArray();
    }

    public function save()
    {
        $user = User::find($this->selectedUserId);
        if ($user) {
            $user->syncRoles($this->selectedRoles); // Update roles
            session()->flash('message', 'Roles berhasil diperbarui!');
        } else {
            session()->flash('message', 'User tidak ditemukan!');
        }
    }

    public function render()
    {
        return view('livewire.role-permission.user-has-role')
            ->layout('layouts.app', ['title' => $this->title]);
    }
}
