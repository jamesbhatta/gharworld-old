@extends('layouts.control-panel')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card z-depth-0">
    <div class="card-header grey lighten-4">Dashboard</div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        You are logged in!
    </div>
</div>
@endsection
