@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1> 
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Select Author') }}</label>

                <select name="author_id" class="form-control" required>
                    <option value="" disabled>Select a Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" 
                                {{ (isset($book) && $book->author->id == $author->id) ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Select Category') }}</label>

                <select name="category_id" class="form-control" required>
                    <option value="" disabled>Select a Category</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" 
                                {{ (isset($book) && $book->category->id == $categorie->id) ? 'selected' : '' }}>
                            {{ $categorie->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea required name="description" class="form-control">{{ $book->description }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
