@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Author</h1>
        <form action="{{ route('author.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
