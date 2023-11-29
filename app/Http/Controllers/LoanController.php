<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;

class LoanController extends Controller
{
    public function Index()
    {
        $books = Book::all();
        $users = User::all();
        $loans = Loan::whereNull('returned_at')->get();
        return view('loan',compact('books','users','loans'));
    }

    public function create(Request $request)
    {
        if ($request->hapus=='1') {
            $request->validate([
            ]);
            $book = Loan::find($request->id);
            $book->delete();
            $message = "berhasil di Hapus";
        }else if ($request->hapus=='2') {
            $loan = Loan::find($request->id);
            $loan->update([
                'returned_at' => date('Y-m-d')
            ]);
            $message = "Pengembalian Berhasil";
        }else{
            $request->validate([
                'book_id' => 'required|exists:books,id',
                'user_id' => 'required|exists:users,id',
                'due_at' => 'required|date',
            ]);
            
            if ($request->id != null) {
                $loan = Loan::find($request->id);
                $loan->update([
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id,
                    'due_at' => $request->due_at,
                ]);
                $message = "berhasil di ubah";
            }else{
                // $currentDateTime = new DateTime();
                // var_dump('kesin');
                // exit;
                Loan::create([
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id,
                    'due_at' => $request->due_at,
                    'borrowed_at' => date('Y-m-d'),
                ]);
                $message = "berhasil di tambah";
            }
        }
        
        return redirect('/loan')->with('success', $message);;
    }

    public function riwayat_peminjaman()
    {
        $login = session('login');
        if ($login->role == "admin") {
            $loans = Loan::whereNotNull('returned_at')->get();
        }else{
            $loans = Loan::where('user_id', $login->id)->whereNull('returned_at')->get();
        }
        return view('riwayat',compact('loans'));
    }

}
