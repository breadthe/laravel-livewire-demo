@extends('layouts.app')

@section('content')
    <section class="max-w-3xl mx-auto bg-white min-h-screen p-8 shadow-lg">
        @auth
            @include('dashboard')
        @else
            @include('welcome')
        @endauth

        <div>
            <h1 class="mb-8">Livewire Demos</h1>

            <h2 class="mb-4"><a href="{{ route('tags') }}" class="border-b border-gray-700 border-dashed">Tag filtering & search</a></h2>
            <h2 class="mb-4"><a href="{{ route('edit-in-place') }}" class="border-b border-gray-700 border-dashed">Edit in place</a></h2>
        </div>
    </section>
@endsection
