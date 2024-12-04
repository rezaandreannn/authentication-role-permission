<?php

namespace App\Http\Livewire\RolePermission;

use Artisan;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermission extends Component
{
    public $roles;
    public $userId;
    public $permissions;
    public $selectedRoleId;
    public $selectedPermissions = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function updatedSelectedRoleId()
    {
        $role = Role::find($this->selectedRoleId);
        $this->selectedPermissions = $role ? $role->permissions->pluck('id')->toArray() : [];
    }

    public function save()
    {
        $role = Role::find($this->selectedRoleId);
        if ($role) {
            $role->permissions()->sync($this->selectedPermissions);
            session()->flash('message', 'Permissions updated successfully!');
        }
        \Artisan::call('permission:cache-reset');
        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.role-permission.role-has-permission');
    }
}
