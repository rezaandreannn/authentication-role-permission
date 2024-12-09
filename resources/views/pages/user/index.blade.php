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
                                <th>{{ __('dataTable.user.status')}}</th>
                                <th>{{ ucfirst(__('role-permission.role.title')) }} & {{ ucfirst(__('role-permission.permission.title'))    }}</th>
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
                                    <a href="{{ route('user-has-role.index', $user->id )}}" class="badge bg-primary">{{ ucfirst(__('role-permission.role.title')) }}</a>
                                    <a href="{{ route('user-has-permission.index', $user->id )}}" class="badge bg-primary">{{ ucfirst(__('role-permission.permission.title')) }}</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
                    if (data.success) {
                        alert('Status verifikasi berhasil diperbarui.');
                    } else {
                        alert('Gagal memperbarui status.');
                        checkbox.checked = !isChecked; // Kembalikan status checkbox jika gagal
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan!');
                    checkbox.checked = !isChecked; // Kembalikan status checkbox jika error
                });
        }

    </script>


    @endpush

</x-app-layout>
