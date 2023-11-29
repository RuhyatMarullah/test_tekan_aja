<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CustomUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthLoginController extends Controller
{
    public function showLoginForm()
    {
        // Membuat pengguna baru
        // $customUser = User::create([
        //     'name' => 'Non Admin1',
        //     'email' => 'nonadmin1@gmail.com',
        //     'password' => bcrypt('password'), // Anda dapat menggunakan Hash::make('password') juga
        //     'role' => 'non-admin', // Role default
        // ]);
        return view('login');
    }

    public function Login(Request $request)
    {
        $email = $request->input('email');
        $passwordInput = $request->input('password');

        // Mengambil pengguna berdasarkan email
        $user = User::where('email', $email)->first();

        // Memeriksa apakah pengguna ditemukadashboarddashboarddashboarddashboardn dan password cocok
        if ($user && Hash::check($passwordInput, $user->password)) {
            // Password cocok, lakukan aksi setelah login berhasil
            // Mengatur nilai sesi
            session(['login' => $user]);
            session(['role' => $user->role]);
            
            return redirect('/dashboard');
        } else {
            // Password tidak cocok atau pengguna tidak ditemukan
            return redirect('/login')->with('error', 'Email atau password salah.');
        }
    }

    public function ubah_password()
    {
        
        return view('password');
    }

    public function post_ubah_password(Request $request)
    {
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirm');
        if ($password == $password_confirm) {
            $login = session('login');
            $user = User::find($login->id);
            $user->update([
                'password' => bcrypt($password)
            ]);
            $message = "berhasil di ubah";
            $class = 'success';
        }else{
            $message = "password confirm salah";
            $class = 'error';
        }
        return redirect('/ubah_password')->with($class, $message);
    }
    public function logout(Request $request)
    {
        session()->flush();
        return redirect('/login');
    }

    public function user()
    {
        
        return view('user');
    }

    public function post_user(Request $request)
    {
        $password = $request->input('password');
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
         $customUser = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password), // Anda dapat menggunakan Hash::make('password') juga
            'role' => $role, // Role default
        ]);

        return redirect('/user')->with("success", "user berhasil di tambah");
    }
}
