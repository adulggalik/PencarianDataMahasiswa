<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmer extends Model
{
    use HasFactory;

    // Menambahkan atribut yang diperbolehkan untuk mass assignment
    protected $fillable = [
        'name',           // Nama
        'email',          // Email
        'specialization', // Keahlian
        'description',    // Deskripsi
        'photo',          // Foto
    ];
}
