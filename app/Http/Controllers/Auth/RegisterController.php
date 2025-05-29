<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register'); // Pastikan view 'auth.register' wujud
    }

    public function store(Request $request)
    {
        // Validate data yang diterima
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:filter',
            'password' => 'required|min:4|confirmed',
            'no_kp' =>'required|min:12',
            'phone' =>'required|min:10',
        ]);

        // Hash password sebelum disimpan
        $data['password'] = bcrypt($data['password']);

        // Simpan data ke table users menggunakan Query Builder
        try {

            DB::table('users')->insert($data);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors('Gagal mendaftar: ' . $th->getMessage());
        }

        // Redirect pengguna ke login selepas selesai mendaftar
        // Dan bekalkan Flash Messaging dengan ayat akaun berjaya didaftar
        return redirect()->route('login')->with('mesej-success', 'Akaun berjaya didaftar');
    }
}
