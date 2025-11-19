@extends('layouts.app')

@section('content')
<h2 class="mb-4">Edit Book</h2>
<form method="POST" action="{{ route('books.update', $book) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Title</label>
        <input name="title" class="form-control" value="{{ old('title', $book->title) }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label>Author</label>
        <input name="author" class="form-control" value="{{ old('author', $book->author) }}">
        @error('author') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label>Publication Year</label>
        <input name="publication_year" class="form-control" value="{{ old('publication_year', $book->publication_year) }}">
        @error('publication_year') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button class="btn btn-primary">Update Book</button>
    <a class="btn btn-secondary" href="{{ route('books.index') }}">Cancel</a>
</form>
@endsection
