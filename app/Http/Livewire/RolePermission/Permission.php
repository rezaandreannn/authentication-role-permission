<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\Permission as ModelsPermission;
use Livewire\Component;

class Permission extends Component
{
    public $name, $guard, $permissionId;
    public $isEdit = false;
    public $showForm = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'guard' => 'required',
    ];

    public function render()
    {
        return view('livewire.role-permission.permission', [
            'permissions' => ModelsPermission::all()
        ]);
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
            $user = ModelsPermission::findOrFail($this->permissionId);
            $user->update([
                'name' => $this->name,
                'guard_name' => $this->guard,
            ]);
        } else {
            ModelsPermission::create([
                'name' => $this->name,
                'guard_name' => $this->guard,
            ]);
        }

        // $this->emit('flashMessage');

        session()->flash('message', $this->isEdit ? trans('role-permission.permission.message.updated') : trans('role-permission.permission.message.create'));

        // Reset Form
        $this->resetForm();
        $this->showForm = false;
    }

    public function showEditForm($id)
    {
        $this->isEdit = true;
        $this->showForm = true;

        $data = ModelsPermission::findOrFail($id);
        $this->permissionId = $data->id;
        $this->name = $data->name;
        $this->guard = $data->guard_name;
    }

    public function cancelEdit()
    {
        $this->resetForm();
        $this->showForm = false;
        $this->isEdit = false;
    }

    public function delete($id)
    {
        $role = ModelsPermission::find($id);
        $role->delete();

        session()->flash('message', trans('role-permission.permission.message.delete'));

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->guard = '';
        $this->permissionId = null;
    }
}
