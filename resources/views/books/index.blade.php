<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Buku</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Serial Number</th>
                    <th>Penulis</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr id="book-{{ $book->id }}">
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->serial_number }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->published_at }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $book->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>

    <!-- JavaScript untuk konfirmasi delete dan menghapus tanpa reload -->
    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
                    const id = btn.getAttribute('data-id');
                    fetch(`/books/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById(`book-${id}`).remove();
                        } else {
                            alert('Gagal menghapus buku.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
<script>
    function confirmDelete(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
    }
</script>
