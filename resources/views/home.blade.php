@extends('layouts.app')

@section('content')
    <section class="max-w-3xl mx-auto bg-white min-h-screen p-8">
        @auth
            @include('dashboard')
        @else
            @include('welcome')
        @endauth

        <div>
            <h1 class="mb-8">Livewire Demos</h1>

            <h2 class="mb-4"><a href="{{ route('tags') }}">Tag filtering & search</a></h2>
        </div>
    </section>
@endsection
