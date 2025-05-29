<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    // Declare nama table yang perlu dihubungi
    protected $table = 'program';

    // Declare nama kolom yang boleh diisi (fillable)
    protected $fillable = [
        'nama_program',
        'kategori_program',
        'jenis_kemahiran',
    ];

    // protected $guarded = [];
    // protected $timestamps = false;
}
