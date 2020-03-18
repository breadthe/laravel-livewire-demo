@extends('layouts.app')

@section('content')
    <section class="max-w-3xl mx-auto bg-white min-h-screen p-8 shadow-lg">
        <h2 class="mb-4">Edit in place</h2>

        @foreach(\App\Tag::get()->sortBy('name') as $tag)
                @livewire('edit-tag', ['tag' => $tag])
        @endforeach
    </section>
@endsection
