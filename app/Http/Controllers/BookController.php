<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BookController extends Controller
{
    public function Index()
    {
        $books = Book::all();
        $authors = Author::all();
        $genres = Genre::all();
        return view('book',compact('books','authors','genres'));
    }

    public function create(Request $request)
    {
        
        if ($request->hapus=='1') {
            $request->validate([
            ]);
            $book = Book::find($request->id);
            $book->delete();
            $message = "berhasil di Hapus";
        }else{
            $request->validate([
                'title' => 'required|max:255',
                'author_id' => 'required|max:255',
                'genre_id' =>  'required|max:255',
                'stock' => 'required|max:255',
                'isbn' => 'required|max:255',
                'published_at' => 'required|max:255',
            ]);
            if ($request->id != null) {
                $book = Book::find($request->id);
                $book->update([
                    'title' => $request->title,
                    'author' => $request->author_id,
                    'genre' => $request->genre_id,
                    'stock' => $request->stock,
                    'isbn' => $request->isbn,
                    'published_at' => $request->published_at,
                ]);
                $message = "berhasil di ubah";
            }else{
                Book::create([
                    'title' => $request->title,
                    'author' => $request->author_id,
                    'genre' => $request->genre_id,
                    'stock' => $request->stock,
                    'isbn' => $request->isbn,
                    'published_at' => $request->published_at,
                ]);
                $message = "berhasil di tambah";
            }
        }

        
        return redirect('/book')->with('success', $message);
    }
}
