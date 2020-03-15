@extends('layouts.app')

@section('content')
    <section class="max-w-xl mx-auto bg-white min-h-screen">
        @auth
            @include('dashboard')
        @else
            @include('welcome')
        @endauth
    </section>
@endsection
