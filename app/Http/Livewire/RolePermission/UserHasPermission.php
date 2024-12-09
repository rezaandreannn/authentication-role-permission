<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class UserHasPermission extends Component
{

    public $user;
    public $title;
    public $permissions;
    public $selectedPermissions = [];
    public $selectedUserId;

    public function mount($id)
    {
        $this->title = trans('role-permission.user_has_permission.title');
        $this->user = User::findOrFail($id);
        $this->permissions = Permission::all();
        $this->selectedUserId = $this->user->id;
        $this->selectedPermissions = $this->user->permissions->pluck('name')->toArray();
    }

    public function save()
    {
        $user = User::find($this->selectedUserId);

        if ($user) {
            // Sync permissions directly
            $user->syncPermissions($this->selectedPermissions);

            session()->flash('message', 'Permissions berhasil diperbarui!');
        } else {
            session()->flash('message', 'User tidak ditemukan!');
        }
    }

    public function render()
    {
        return view('livewire.role-permission.user-has-permission')
            ->layout('layouts.app', ['title' => $this->title]);
    }
}
