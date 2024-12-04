@props(['status'])

{{-- @if ($status) --}}
<div class="alert alert-danger alert-dismissible show fade">
    {{ $status }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
{{-- @endif --}}
