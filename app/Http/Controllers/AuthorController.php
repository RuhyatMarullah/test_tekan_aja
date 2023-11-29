<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function Index()
    {
        $authors = Author::all();
        return view('author',compact('authors'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);
        if ($request->id != null) {
            $author = Author::find($request->id);
            $author->update(['name' => $request->name]);
            $message = "berhasil di ubah";
        }else{
            Author::create([
                'name' => $request->name,
            ]);
            $message = "berhasil di tambah";
        }
        return redirect('/author')->with('success', $message);;
    }
}
