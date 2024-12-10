<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\Role as ModelRole;
use Livewire\Component;


class Role extends Component
{
    public $name, $guard, $roleId;
    public $isEdit = false;
    public $showForm = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'guard' => 'required',
    ];

    protected $listeners = [
        'delete' => 'delete'
    ];

    public function render()
    {
        return view('livewire.role-permission.role', [
            'roles' => ModelRole::all()
        ])->layout('layouts.app', ['title' => trans('role-permission.role.title')]);
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        if (!$this->showForm) {
            $this->resetForm();
        }
    }

    public function save()
    {
        $this->validate();


        if ($this->isEdit) {
            $user = ModelRole::findOrFail($this->roleId);
            $user->update([
                'name' => $this->name,
                'guard_name' => $this->guard,
            ]);
        } else {
            ModelRole::create([
                'name' => $this->name,
                'guard_name' => $this->guard,
            ]);
        }

        $this->dispatchBrowserEvent('show-toast', [
            'message' => $this->isEdit
                ? trans('role-permission.role.message.updated')
                : trans('role-permission.role.message.create'),
            'type' => 'success',
        ]);


        // Reset Form
        $this->resetForm();
        $this->showForm = false;
    }

    public function showEditForm($id)
    {
        $this->isEdit = true;
        $this->showForm = true;

        $data = ModelRole::findOrFail($id);
        $this->roleId = $data->id;
        $this->name = $data->name;
        $this->guard = $data->guard_name;
    }

    public function cancelEdit()
    {
        $this->resetForm();
        $this->showForm = false;
        $this->isEdit = false;
    }

    public function delete($roleId)
    {
        try {
            $role = ModelRole::findOrFail($roleId);
            $role->delete();

            $this->dispatchBrowserEvent('show-toast', [
                'message' => trans('role-permission.role.message.delete'),
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('show-toast', [
                'message' => 'Gagal menghapus data.',
                'type' => 'error',
            ]);
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->guard = '';
        $this->roleId = null;
    }
}
