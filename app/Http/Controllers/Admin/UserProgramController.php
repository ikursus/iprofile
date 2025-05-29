<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProgramController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $userId)
    {
        UserProgram::create([
            'user_id' => $userId,
            'program_id' => $request->program_id, // $request->input('program_id'),
        ]);

        return redirect()->back()->with('success', 'User registered for the program successfully.');
    }
}
