@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Author</h1> 
        <form action="{{ route('author.update', $author) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
