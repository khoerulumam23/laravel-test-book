<!-- resources/views/books/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Buku</h2>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="mb-3">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $book->serial_number }}" required>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control" id="published_at" name="published_at" value="{{ $book->published_at->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Penulis</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
