<!-- resources/views/authors/index.blade.php -->
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Authors</h1>

    <!-- Tombol untuk menambah Author -->
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3 px-6 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">
        Add Author
    </a>

    <!-- Card container untuk tabel -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <!-- Tabel responsif dengan Tailwind -->
        <table class="min-w-full table-auto">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $author->name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $author->email }}</td>
                        <td class="px-6 py-3 text-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning text-yellow-500 hover:text-yellow-600 px-3 py-1 rounded-md bg-yellow-100 hover:bg-yellow-200 mr-2">
                                Edit
                            </a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-red-500 hover:text-red-600 px-3 py-1 rounded-md bg-red-100 hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination dengan Tailwind -->
    <div class="mt-4">
        {{ $authors->links('pagination::tailwind') }}
    </div>
</div>

<script>
    // JavaScript untuk konfirmasi penghapusan
    function confirmDelete(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();  // Mencegah form submit jika user tidak setuju
        }
    }
</script>
