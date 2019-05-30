@extends('laradash.theme.app')
@include('laradash.utils.success-error')


@section('content')
<div class="container-fluid content">
    <div class="card">
        @yield('success-error')
        <div class="card-header">
            <div class="card-title mb-0">
                <span class="section-title">New Blog Form</span>
            </div>
        </div>
    </div>
    <div class="card-body">

    </div>
</div>
@endsection
