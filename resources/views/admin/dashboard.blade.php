@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book List') }}</div>

                <div class="card-body">
                    
                    <a style="float:right;" href="{{ route('books.create') }}" class="btn btn-primary mt3">Add Book</a>

                    @if (!empty($books) && count($books) > 0) 
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
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td style="display:flex;">
                                            <a href="{{ route('books.edit', $book) }}" class="btn"><span><i class ="fa fa-edit"></i></span></a>
                                            <a href="{{ route('books.destroy', $book) }}" class="btn"><span><i class="fa fa-trash"></i></span></a>
                                        </td>
                                    <!-- <td>
                                        <form action="{{ route('books.borrow', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit">Borrow</button>
                                        </form>
                                        <form action="{{ route('books.return', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit">Return</button>
                                        </form>
                                    </td> -->
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