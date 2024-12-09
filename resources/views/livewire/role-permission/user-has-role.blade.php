    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-2 d-flex justify-content-between align-items-center">
                    <h3>{{ __('role-permission.user_has_role.title')}}</h3>
                    <div class="d-flex">
                        <a href="{{ route('user.index')}}" class="btn btn-outline-primary me-2">
                            <i class="fas fa-chevron-left fs-4"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary" onclick="location.reload();">
                            <i class="fas fa-sync fs-4"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('app.sidebar.dashboard')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="index.html">{{ __('app.sidebar.user')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('role-permission.user_has_role.title')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
        @endif

        <!-- Task App Widget Starts -->
        <section class="tasks">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>{{ $user->full_name }}
                                <code class="text-muted">({{ $user->email }})</code>
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                <div class="row">
                                    @if ($selectedUserId)
                                    @foreach($roles as $role)
                                    <li class="widget-todo-item col-12 col-md-3 mb-2">
                                        <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                            <div class="widget-todo-title-area d-flex align-items-center">
                                                {{-- <i data-feather="list" class="cursor-move"></i> --}}
                                                <div class="checkbox checkbox-shadow">
                                                    <input type="checkbox" wire:model="selectedRoles" class="form-check-input" value="{{ $role->name }}" id="role{{ $role->id }}">
                                                    <label for="checkbox1"></label>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span id="{{ $role->id }}" class="widget-todo-title">
                                                        {{ $role->name }}
                                                    </span>
                                                    <code class="text-muted mb-2">({{$role->guard_name }})</code>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </div>
                            </ul>
                        </div>
                        <div class="card-footer d-flex justify-content-center px-1 py-1">
                            <button wire:click="save" class="btn btn-primary">{{ __('role-permission.user_has_role.button_save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
