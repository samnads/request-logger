@extends('layouts.main', [])
@section('title', 'Home')
@section('content')
<div class="bg-body-tertiary p-5 rounded">
    <h1>Logs</h1>
    <p class="lead">Incoming request logs.</p>
    <p> Logs Count : <span class="text-danger">{{sizeof($request_logs)}}</span></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sl. No.</th>
                <th scope="col">URL</th>
                <th scope="col">Request Time</th>
                <th scope="col">Finish Time</th>
                <th scope="col">Page Speed (ms)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($request_logs as $key => $request_log)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{ $request_log->url}}</td>
                <td>{{ $request_log->start_time}}</td>
                <td>{{ $request_log->end_time}}</td>
                <td>{{ $request_log->response_time}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('styles')
@endpush
@push('scripts')
<script type="text/javascript" src="{{ asset('js/home.js?v=') . Config::get('version.js') }}"></script>
@endpush