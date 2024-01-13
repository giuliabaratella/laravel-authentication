@extends('layouts.app')
@section('content')
    @extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit post</h1>
        {{-- <p>section content</p> --}}
        <main>

            <div id="create-posts">

                <div class="container">
                    <div class="py-5">
                        <h2>Update {{ $post->title }}</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card p-2">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $post->title) }}" required
                                        maxlength="255" minlength="3">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="body" class="form-label" cols="30" rows="10">Body</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="">
                                        {{ $post->body }}
                                    </textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Url</label>

                                    <input type="text" id="image" name="image"
                                        value="{{ old('image', $post->image) }}"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>

                            </form>
                        </div>
                    </div>
                </div>
        </main>
    </section>
@endsection

@endsection
