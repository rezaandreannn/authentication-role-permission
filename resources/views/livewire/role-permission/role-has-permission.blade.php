   <div class="page-heading">
       <div class="mb-3">
           <label for="roleSelect" class="form-label">Select Role</label>
           <select wire:model="selectedRoleId" id="roleSelect" class="form-control">
               <option value="">-- Choose Role --</option>
               @foreach($roles as $role)
               <option value="{{ $role->id }}">{{ $role->name }}</option>
               @endforeach
           </select>
       </div>

       @if ($selectedRoleId)
       <div class="mb-3">
           <label class="form-label">Permissions</label>
           @foreach($permissions as $permission)
           <div class="form-check">
               <input type="checkbox" wire:model="selectedPermissions" class="form-check-input" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
               <label for="permission{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
           </div>
           @endforeach
       </div>

       <button wire:click="save" class="btn btn-success">Save Permissions</button>
       @endif

       @if (session()->has('message'))
       <div class="alert alert-success mt-3">
           {{ session('message') }}
       </div>
       @endif
   </div>
