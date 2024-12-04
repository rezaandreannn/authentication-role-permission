<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserHasRole extends Component
{
    // public $user;
    // public $roles;
    // public $selectedUserId;
    // public $selectedRoles = [];

    // public function mount($id)
    // {
    //     $this->user = User::find($id);
    //     $this->roles = Role::all();
    // }

    // public function updatedSelectedUserId()
    // {
    //     $user = User::find($this->selectedUserId);
    //     $this->selectedRoles = $user ? $user->roles->pluck('name')->toArray() : [];
    // }

    // public function save()
    // {
    //     $user = User::find($this->selectedUserId);
    //     if ($user) {
    //         $user->syncRoles($this->selectedRoles);
    //         session()->flash('message', 'Roles berhasil diperbarui untuk user!');
    //     }
    // }
    public $user;
    public $roles;
    public $selectedRoles = [];
    public $selectedUserId;

    public function mount($id)
    {
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
        return view('livewire.role-permission.user-has-role');
    }
}
