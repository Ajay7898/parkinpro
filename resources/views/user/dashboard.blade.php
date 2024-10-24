@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User dashboard Book List') }}</div>

                <div class="card-body">

               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (!empty($books) && count($books) > 0) 
                        <form method="GET" action="{{ route('home.user') }}"> 
                            <input type="text" name="search" placeholder="Search for books, authors, or categories..." value="{{ request('search') }}">
                            <button style="float:right;" class="btn btn-primary" type="submit">Search</button>
                        </form>

                        <a style="float:right;margin-top:40px;" class="btn btn-primary" href="{{route('books.borrowedByUser')}}">Borrow Book</a>

                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book) 
                                    <tr>
                                        <td><a href="{{ route('books.history', $book->id)}}">{{ $book->title }}</a></td>
                                        <td><a href="{{ route('books.byAuthor', $book->author->id) }}">{{ $book->author->name }}</a></td>
                                        <td><a href="{{ route('books.byCategory', $book->category->id) }}">{{ $book->category->name }}</a></td>
                                        <td style="display:flex;">
                                            <a href="{{ route('books.return', $book) }}" class="btn">Return</a>
                                            <a href="{{ route('books.borrow', $book) }}" class="btn">Borrow</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
