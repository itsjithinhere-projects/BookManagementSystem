@extends('layouts.app')

@section('content')
<h2 class="mb-4">Book List</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publication Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->publication_year }}</td>
            <td>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;"
                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No books available.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $books->links() }}
@endsection
