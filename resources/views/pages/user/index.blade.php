<x-app-layout title="{{ $title}}">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ __('dataTable.user.title')}}</h3>
                    <p class="text-subtitle text-muted">{{ __('dataTable.user.sub_title')}}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('app.sidebar.dashboard')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('app.sidebar.user')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>{{ __('dataTable.user.name')}}</th>
                                <th>{{ __('dataTable.user.email')}}</th>
                                <th>{{ __('dataTable.user.inactive')}}</th>
                                <th>{{ __('dataTable.user.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <input type="checkbox" class="form-check-input" {{ $user->email_verified_at ? 'checked' : '' }} data-id="{{ $user->id }}" onchange="updateVerificationStatus(this)">
                                </td>
                                <td>
                                    <a href="#" class="text-secondary dropdown-toggle-no-caret me-3" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('user-has-role.index', $user->id )}}">{{ __('role-permission.user_has_role.title')}}</a>
                                        <a class="dropdown-item" href="{{ route('user-has-permission.index', $user->id )}}">{{ __('role-permission.user_has_permission.title')}}</a>
                                    </div>
                                    <a href="{{ route('user.edit', $user->id )}}" class="text-secondary me-3">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" onclick="deleteConfirmation('{{ route('user.destroy', $user->id) }}')" class="text-secondary">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form id="delete-form" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <style>
        .dropdown-toggle-no-caret::after {
            display: none !important;
            /* Menghilangkan caret */
        }

    </style>

    @endpush

    @push('js-library')
    <script src="{{ asset('mazer/dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('mazer/dist/assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

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

    {{-- konfirmasi delete --}}
    <script>
        function deleteConfirmation(url) {
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
                    const form = document.getElementById('delete-form');
                    form.action = url; // Set URL yang diberikan ke form
                    form.submit(); // Submit form
                }
            });
        }

    </script>

    <script>
        function updateVerificationStatus(checkbox) {
            const userId = checkbox.dataset.id;
            const isChecked = checkbox.checked;

            fetch(`/users/${userId}/verify`, {
                    method: 'POST'
                    , headers: {
                        'Content-Type': 'application/json'
                        , 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                    , body: JSON.stringify({
                        verified: isChecked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    let successText = "{{ App::getLocale() == 'id' ? 'Berhasil mempebarui status.' : 'Successfully updated the status.' }}";
                    let gagalText = "{{ App::getLocale() == 'id' ? 'Gagal memperbarui status.' : 'Failed to update the status.' }}";

                    if (data.success) {
                        Toastify({
                            text: successText
                            , duration: 3000
                            , close: true
                            , gravity: "top"
                            , position: "center"
                            , backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                        , }).showToast();
                    } else {
                        Toastify({
                            text: gagalText
                            , duration: 3000
                            , close: true
                            , gravity: "top"
                            , position: "center"
                            , backgroundColor: "#F44336"
                        , }).showToast();
                        checkbox.checked = !isChecked; // Kembalikan status checkbox jika gagal
                    }
                })
                .catch(error => {
                    let errorText = "{{ App::getLocale() == 'id' ? 'Terjadi kesalahan.' : 'An error occurred.' }}";
                    Toastify({
                        text: errorText
                        , duration: 3000
                        , close: true
                        , gravity: "top"
                        , position: "center"
                        , backgroundColor: "#F44336"
                    , }).showToast();
                    checkbox.checked = !isChecked; // Kembalikan status checkbox jika error
                });
        }

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('message'))
            Toastify({
                text: "{{ session('message') }}"
                , duration: 3000
                , close: true
                , gravity: "top"
                , position: "center"
                , backgroundColor: "#4CAF50"
            , }).showToast();
            @endif
        });

    </script>



    @endpush

</x-app-layout>
