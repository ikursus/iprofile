<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiProgram = Program::all();

        return view('admin.template-program.index', compact('senaraiProgram'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template-program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'nama_program' => 'required|min:3|max:255',
            'kategori_program' => 'required|max:255',
            'jenis_kemahiran' =>'required|max:255',
        ]);

        // Cara 1 simpan data menggunakan model - new object
        // $program = new Program();
        // $program->nama_program = $data['nama_program']; // $request->input('nama_program');
        // $program->kategori_program = $data['kategori_program']; // $request->kategori_program;
        // $program->jenis_kemahiran = $data['jenis_kemahiran'];
        // $program->save();

        // Cara 2 simpan data menggunakan model - method create
        Program::create($data);

        return redirect()->route('programs.index')->with('mesej-success', 'Rekod berjaya disimpan'); // retu
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);

        return view('admin.template-program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari rekod program berdasarkan ID
        // $program = Program::where('id', '=', $id)->first();
        // $program = Program::whereId($id)->first();
        $program = Program::find($id);

        // Semak jika rekod tidak wujud, redirect ke senarai program dengan mesej error
        if(!$program){
           return redirect()->route('programs.index')->withErrors('Rekod tidak wujud'); 
        }

        // Jika rekod wujud, tampilkan form edit dengan data rekod yang dijumpai
        return view('admin.template-program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate data
        $data = $request->validate([
            'nama_program' => 'required|min:3|max:255',
            'kategori_program' => 'required|max:255',
            'jenis_kemahiran' =>'required|max:255',
        ]);

        // Cari rekod program berdasarkan ID
        $program = Program::find($id);
        // Semak jika rekod tidak wujud, redirect ke senarai program dengan mesej error
        if(!$program){
            return redirect()->route('programs.index')->withErrors('Rekod tidak wujud');
         }
        // Jika rekod wujud, update rekod program
        $program->update($data);

        // Redirect ke senarai program dengan mesej success
        return redirect()->back()->with('mesej-success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari rekod program berdasarkan ID
        $program = Program::find($id);
        // Semak jika rekod tidak wujud, redirect ke senarai program dengan mesej error
        if(!$program){
            return redirect()->route('programs.index')->withErrors('Rekod tidak wujud');
         }
        // Jika rekod wujud, hapus rekod program
        $program->delete();
        // Redirect ke senarai program dengan mesej success
        return redirect()->back()->with('mesej-success', 'Rekod berjaya dihapus');
    }
}
