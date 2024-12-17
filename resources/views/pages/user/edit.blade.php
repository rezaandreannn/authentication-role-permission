<x-app-layout title="{{ $title }}">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ __('user.edit.title')}}</h3>
                    <p class="text-subtitle text-muted">{{ __('user.edit.sub_title')}}</p>
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
                    <x-form.index action="{{ route('user.update', $user->id )}}" method="PUT">
                        <x-form.vertical-input type="text" name="name" label="{{ __('user.fields.name')}}" value="{{ $user->name }}" required="false" />
                        <x-form.vertical-input type="text" name="full_name" label="{{ __('user.fields.full_name')}}" value="{{ $user->full_name }}" required="false" />
                        <x-form.vertical-input type="email" name="email" label="{{ __('user.fields.email')}}" value="{{ $user->email }}" readonly="true" />
                    </x-form.index>
                </div>
        </section>
    </div>

    @push('css-library')
    @endpush

    @push('js-library')
    @endpush

</x-app-layout>
