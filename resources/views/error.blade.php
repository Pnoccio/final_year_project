@extends('layouts.app')

@section('title', 'Error')

@section('content')
    <div class="container">
        <h1>Error</h1>
        <p>{{ $message }}</p>
    </div>
@endsection
