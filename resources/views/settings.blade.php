@extends('layouts.main', [])
@section('title', 'Home')
@section('content')
<div class="bg-body-tertiary p-5 rounded">
    <h1>Logging ON / OFF</h1>
    <p class="lead">Use the below button to toggle logging of incoming requests.</p>
    <input type="radio" class="btn-check" name="log_switch" id="option5" autocomplete="off" value="1" {{$log_switch==1
        ? 'checked' : '' }}>
    <label class="btn btn-outline-success" for="option5">ON</label>

    <input type="radio" class="btn-check" name="log_switch" id="option6" autocomplete="off" value="0" {{$log_switch==0
        ? 'checked' : '' }}>
    <label class="btn btn-outline-danger" for="option6">OFF</label>
</div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush