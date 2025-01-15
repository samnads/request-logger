@extends('layouts.main', [])
@section('title', 'Home')
@section('content')
<div class="bg-body-tertiary p-5 rounded">
    <h1>Request Logger - Features</h1>
    <ul>
        <li>Have middleware that logs all incoming requests and their response times.</li>
        <li>Middleware can be easily toggled on and off via a configuration setting.</li>
        <li>Log data will be written to an SQLite database.</li>
    </ul>
</div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush