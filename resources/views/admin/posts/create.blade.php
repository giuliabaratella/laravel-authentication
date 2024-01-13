@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Add a post</h1>
        {{-- <p>section content</p> --}}
        <main>

            <div id="create-posts">

                <div class="container">
                    <div class="py-5">
                        <h2>Add a new post</h2>
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
                            <form action="{{ route('admin.posts.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required maxlength="255"
                                        minlength="3">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="body" class="form-label" cols="30" rows="10">Body</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="">
                                        {{ old('body') }}
                                    </textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Url</label>

                                    <input type="text" id="image" name="image" value="{{ old('image') }}"
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
