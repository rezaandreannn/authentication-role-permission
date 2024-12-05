   <div class="page-heading">
       <div class="page-title">
           <div class="row">
               <div class="col-12 col-md-6 order-md-1 order-last">
                   {{-- <h3>DataTable</h3> --}}
                   @if (!$showForm)
                   <button wire:click="toggleForm" class="btn btn-primary mb-3">
                       {{ ucfirst(__('role-permission.role.form.button_add')) }}
                   </button>
                   @endif

                   {{-- Form Tambah Data --}}
                   @if ($showForm)
                   <div class="card mb-3">
                       <div class="card-body">
                           <h5 class="card-title">{{ $isEdit ?  ucfirst(__('role-permission.role.form.title_edit')) :  ucfirst(__('role-permission.role.form.title_add')) }}</h5>
                           <form wire:submit.prevent="save">
                               <div class="mb-3">
                                   <label for="name" class="form-label">{{ ucfirst(__('role-permission.role.form.name'))}}</label>
                                   <input type="text" wire:model="name" id="name" class="form-control" placeholder="{{ __('role-permission.role.form.name_placeholder')}}">
                                   @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                               </div>
                               <div class="mb-3">
                                   <label for="guard" class="form-label">{{ ucfirst(__('role-permission.role.form.guard')) }}</label>
                                   <select wire:model="guard" id="guard" class="form-control">
                                       <option value="">-- {{ __('role-permission.role.form.guard_select_title')}} --</option>
                                       <option value="api">API</option>
                                       <option value="web">Web</option>
                                   </select>
                                   @error('guard') <span class="text-danger">{{ $message }}</span> @enderror
                               </div>
                               <button type="submit" class="btn btn-success">
                                   {{ $isEdit ? ucfirst(__('role-permission.role.form.button_update'))  :  ucfirst(__('role-permission.role.form.submit')) }}
                               </button>
                               <button type="button" wire:click="cancelEdit" class="btn btn-secondary">
                                   {{ ucfirst(__('role-permission.role.form.cancel')) }}
                               </button>
                           </form>
                       </div>
                   </div>
                   @endif
               </div>

               <div class="col-12 col-md-6 order-md-2 order-first">
                   <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">{{ ucfirst(__('role-permission.role.dashboard'))}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(__('role-permission.role.title')) }} </li>
                       </ol>
                   </nav>
               </div>
           </div>
           <div>
               @if (session()->has('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>{{ session('message')}}</strong>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
           </div>
       </div>
       <section class="section">
           <div class="card">
               <div class="card-body">
                   <table class="table table-striped" id="table1">
                       <thead>
                           <tr>
                               <th>{{ ucfirst(__('role-permission.role.table.name')) }}</th>
                               <th>{{ ucfirst(__('role-permission.role.table.guard_name')) }}</th>
                               <th>{{ ucfirst(__('role-permission.role.table.action')) }}</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($roles as $role)
                           <tr>
                               <td>{{ $role->name }}</td>
                               <td>{{ $role->guard_name }}</td>
                               <td>
                                   <button wire:click="showEditForm({{ $role->id }})" class="btn btn-warning btn-sm">
                                       <i class="far fa-edit"></i>
                                   </button>
                                   <button onclick="confirm('Apakah Anda yakin ingin menghapus data ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $role->id }})" class="btn btn-danger btn-sm">
                                       <i class="fas fa-trash"></i>
                                   </button>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </section>

       @push('css-library')
       <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/simple-datatables/style.css')}}">

       @endpush

       @push('js-library')
       <script src="{{ asset('mazer/dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
       <script>
           let table1 = document.querySelector('#table1');

           let translations = {
               search: "{{ __('datatable.search') }}"
               , showEntries: "{{ __('datatable.show_entries') }}"
               , info: "{{ __('datatable.info') }}"
               , infoEmpty: "{{ __('datatable.info_empty') }}"
               , paginate: {
                   first: "{{ __('datatable.paginate.first') }}"
                   , last: "{{ __('datatable.paginate.last') }}"
                   , next: "{{ __('datatable.paginate.next') }}"
                   , previous: "{{ __('datatable.paginate.previous') }}"
               }
           };

           let dataTable = new simpleDatatables.DataTable(table1, {
               labels: {
                   placeholder: translations.search
                   , noRows: translations.infoEmpty
                   , info: translations.info
                   , pagination: {
                       first: translations.paginate.first
                       , last: translations.paginate.last
                       , next: translations.paginate.next
                       , prev: translations.paginate.previous
                   }
               }
           });

       </script>

       @endpush
   </div>
