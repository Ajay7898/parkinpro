@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-header">Borrowing History for "{{ $book->title }}"</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Borrowed At</th>
                                    <th>Returned At</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($book->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->pivot->created_at ?? 'Not borrow' }}</td>
                                    <td>{{ $user->pivot->returned_at ?? 'Not returned' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
