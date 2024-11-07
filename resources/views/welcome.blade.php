@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">Add Author</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary">Edit</a>
                    <button class="delete-author btn btn-danger" data-url="{{ route('authors.destroy', $author) }}" data-name="{{ $author->name }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $authors->links() }} <!-- Pagination -->
</div>
@endsection
