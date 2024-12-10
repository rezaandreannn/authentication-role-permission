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

               {{-- breadcrumbs --}}
               <div class="col-12 col-md-6 order-md-2 order-first">
                   <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">{{ ucfirst(__('role-permission.role.dashboard'))}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(__('role-permission.role.title')) }} </li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>

       {{-- section table --}}
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
                                   <div style="display: flex; gap: 10px;">
                                       <button wire:click="showEditForm({{ $role->id }})" class="text-secondary" style="border: none; background: none;">
                                           <i class="fas fa-pencil-alt"></i>
                                       </button>
                                       <button onclick="deleteConfirmation({{ $role->id ?? 0 }})" class="text-secondary" style="border: none; background: none;">
                                           <i class="fas fa-trash"></i>
                                       </button>
                                   </div>
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
       <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/toastify/toastify.css') }}">
       <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/sweetalert2/sweetalert2.min.css') }}">

       @endpush

       @push('js-library')
       <script src="{{ asset('mazer/dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
       <script src="{{ asset('mazer/dist/assets/vendors/toastify/toastify.js') }}"></script>
       <script src="{{ asset('mazer/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

       {{-- inisiati tabel --}}
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

       {{-- konfirmasi dapus data berdasarkan Id --}}
       <script>
           function deleteConfirmation(roleId) {
               let confirmationTitle = "{{ App::getLocale() == 'id' ? 'Apakah anda yakin?' : 'Are you sure?' }}";
               let confirmationText = "{{ App::getLocale() == 'id' ? 'Data ini akan dihapus secara permanen!' : 'This data will be permanently deleted!' }}";
               let confirmButtonText = "{{ App::getLocale() == 'id' ? 'Ya, hapus!' : 'Yes, delete!' }}";
               let cancelButtonText = "{{ App::getLocale() == 'id' ? 'Batal' : 'Cancel' }}";

               Swal.fire({
                   title: confirmationTitle
                   , text: confirmationText
                   , icon: 'warning'
                   , showCancelButton: true
                   , confirmButtonColor: '#3085d6'
                   , cancelButtonColor: '#d33'
                   , confirmButtonText: confirmButtonText
                   , cancelButtonText: cancelButtonText
               }).then((result) => {
                   if (result.isConfirmed) {
                       if (result.isConfirmed) {
                           Livewire.emit('delete', roleId);
                       }
                   }
               });
           }

       </script>

       {{-- menampilkan toastify message dari controller --}}
       <script>
           window.addEventListener('show-toast', event => {
               Toastify({
                   text: event.detail.message
                   , duration: 3000
                   , close: true
                   , gravity: "top"
                   , position: "center"
                   , backgroundColor: event.detail.type === 'success' ? "linear-gradient(to right, #00b09b, #96c93d)" : "#F44336"
               , }).showToast();
           });

       </script>
       @endpush
   </div>
