@extends('layouts.main')

@section('container')
    <h1>About</h1>
    <h1 class="mt-3">{{ $nama }}!</h1>
    <h1 class="mt-3">{{ $email }}!</h1>
    <img src="{{ $image }}" width="250" height="250" />
@endsection
