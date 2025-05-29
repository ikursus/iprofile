<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user_profiles
        // $senaraiUsers = DB::table('users')->paginate(5);
        $senaraiUsers = User::paginate(2);

        return view('admin.template-users.index', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template-users.create'); // Buat view create.blade.php di dalam direktori resources/views/admin/users
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:filter|unique:users,email',
            'no_kp' => 'required|min:12',
            'phone' => 'required|min:10',
            'password' => 'required|min:4|confirmed',
            'status' => 'required'
        ]);

        // Hash the password before storing
        $data['password'] = bcrypt($data['password']);

        try {
            // Insert data into users table using Query Builder
            DB::table('users')->insert($data);

            // Redirect with success message
            return redirect()->route('users.index')->with('mesej-success', 'User created successfully');

        } catch (\Throwable $th) {
            // Redirect back with error if insertion fails
            return redirect()->back()->withErrors('Failed to create user: ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        $senaraiPrograms = Program::select('id', 'nama_program')->get();

        // Cara join table menerusi  Query Builder
        // $senaraiUserPrograms = DB::table('user_programs')
        //     ->join('users', 'user_programs.user_id', '=', 'users.id')
        //     ->join('program', 'user_programs.program_id', '=', 'program.id')
        //     ->where('user_programs.user_id', '=', $id)
        //     ->select('users.*', 
        //         'users.no_kp as no_ic', 
        //         'program.nama_program', 
        //         'program.kategori_program', 
        //         'program.jenis_kemahiran')
        //     ->get();

        // return view('admin.template-users.show', compact('user', 'senaraiPrograms', 'senaraiUserPrograms'));
        return view('admin.template-users.show', compact('user', 'senaraiPrograms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first(); // LIMIT 1// ->firstOrFail();
        // $user = DB::table('users')->whereId($id)->first();
        // Dump data and die
        // dd($user);

        return view('admin.template-users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Dapatkan data yang ingin dikemaskini
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:filter',
            'no_kp' =>'required|min:12',
            'phone' =>'required|min:10',
            'status' => 'required'
        ]);

        // Semak jika password diisi. Ini bererti password ingin ditukar.
        if ($request->filled('password')) {

            $request->validate([
                'password' => 'required|min:4|confirmed',
            ]);

            // Attachkan password ke $data dan hash/encrypt password
            $data['password'] = bcrypt($request->input('password'));
        }

        // Kemaskini data ke database table users
        try {

            DB::table('users')->where('id', '=', $id)->update($data);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors('User failed to update: ' . $th->getMessage());
        }

        // Redirect ke senarai users
        // return redirect()->route('users.index');
        return redirect()->back()->with('mesej-success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari rekod user yang ingin dihapuskan
        DB::table('users')->where('id', '=', $id)->delete();

        // Redirect ke senarai users
        return redirect()->route('users.index')->with('mesej-success', 'User deleted successfully');
    }

    public function print(Request $request, string $id)
    {
        $user = User::find($id);
        
        $pdf = Pdf::loadView('admin.template-users.print', compact('user'));

        if ($request->input('print') == 'stream')
        {
            return $pdf->stream();
        }

        return $pdf->download($user->no_kp . '-user.pdf');
    }
}
