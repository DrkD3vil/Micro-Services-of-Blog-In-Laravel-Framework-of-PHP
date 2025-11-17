@extends('layouts.app')

@section('main_content')
<div class="container">

    <h2>Request Author Access</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ url('/request-author') }}" method="POST">
        @csrf
        <p>
            Click the button below to request author access.
        </p>

        <button type="submit" class="btn btn-primary">Request Author Role</button>
    </form>
</div>
@endsection
