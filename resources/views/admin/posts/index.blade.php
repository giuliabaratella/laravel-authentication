@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Posts List</h1>
        {{-- <p>section content</p> --}}



        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach

        </ul>
    </section>
@endsection
