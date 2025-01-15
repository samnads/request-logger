@extends('layouts.main', [])
@section('title', 'Home')
@section('content')
<div class="bg-body-tertiary p-5 rounded">
    <h1>Page {{$page_id}}</h1>
    <p class="lead">This is an sample page ({{$page_id}}) to test the request is logged or not.</p>
</div>
@endsection
@push('styles')
@endpush
@push('scripts')
<script type="text/javascript" src="{{ asset('js/home.js?v=') . Config::get('version.js') }}"></script>
@endpush