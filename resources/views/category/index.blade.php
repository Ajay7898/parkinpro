@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a style="float:right;" href="{{ route('category.create') }}" class="btn btn-primary mt3">Add Category</a>

                    @if (!empty($categories) && count($categories) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category) 
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('category.edit', $category) }}" class="btn"><span><i class ="fa fa-edit"></i></span></a>
                                            <a href="{{ route('category.destroy', $category) }}" class="btn"><span><i class="fa fa-trash"></i></span></a>
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
