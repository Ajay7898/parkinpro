@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Author List') }}</div>

                <div class="card-body">

                    <a style="float:right;" href="{{ route('author.create') }}" class="btn btn-primary mt3">Add Author</a>

                    @if (!empty($authors) && count($authors) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author) 
                                    <tr>
                                        <td>{{ $author->name }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('author.edit', $author) }}" class="btn"><span><i class ="fa fa-edit"></i></span></a>
                                            <a href="{{ route('author.destroy', $author) }}" class="btn"><span><i class="fa fa-trash"></i></span></a>
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
