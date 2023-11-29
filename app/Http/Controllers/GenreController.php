<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function Index()
    {
        $genres = Genre::all();
        return view('genre',compact('genres'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);
        if ($request->id != null) {
            $genre = Genre::find($request->id);
            $genre->update(['name' => $request->name]);
            $message = "berhasil di ubah";
        }else{
            Genre::create([
                'name' => $request->name,
            ]);
            $message = "berhasil di tambah";
        }
        return redirect('/genre')->with('success', $message);;
    }
    
}
