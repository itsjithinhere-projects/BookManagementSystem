<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show book list
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    // Show "add book" form
    public function create()
    {
        return view('books.create');
    }

    // Store new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|numeric'
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // Show "edit book" form
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update book
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|numeric'
        ]);
        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    // Delete book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
