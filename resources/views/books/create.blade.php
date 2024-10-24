@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Create</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="book_name" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Select Author') }}</label>
                <select name="author_id" id="user-select" class="form-control" required>
                    <option value="">Select a user</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}" data-role="{{$author->id}}" data-profession="{{$author->name}}">
                            {{$author->name}}
                        </option>
                    @endforeach
                </select>
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Select Category') }}</label>
                <select name="category_id" id="user-select" class="form-control" required>
                    <option value="">Select a user</option>
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}" data-role="{{$categorie->id}}" data-profession="{{$categorie->name}}">
                            {{$categorie->name}}
                        </option>
                    @endforeach
                </select>
                @error('categorie')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
