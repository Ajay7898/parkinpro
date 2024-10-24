@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1> 
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
