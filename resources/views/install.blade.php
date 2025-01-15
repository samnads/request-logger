@extends('layouts.main', [])
@section('title', 'Home')
@section('content')
<div class="bg-body-tertiary p-5 rounded">
    <h1>Installation</h1>
    <p class="lead">Click on the below install button to run migrations and start using the application</p>
    <button class="btn btn-lg btn-info" data-action="install">Install</button>
</div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush