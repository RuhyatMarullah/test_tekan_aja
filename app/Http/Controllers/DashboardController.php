<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLoans_belum = Loan::whereNull('returned_at')->count();
        $totalLoans = Loan::count();
        $totalLoans_dikembalikan = Loan::whereNotNull('returned_at')->count();
        return view('dashboard',compact('totalLoans_belum','totalLoans','totalLoans_dikembalikan'));
    }
}
