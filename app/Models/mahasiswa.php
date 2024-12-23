<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Tentukan kolom primary key jika kolom primary key Anda bukan 'id'
    protected $primaryKey = 'nim'; // Jika Anda menggunakan 'id' sebagai primary key, ini tidak perlu, tetapi tetap baik untuk mendefinisikan

    // Menentukan kolom-kolom yang dapat diisi massal
    protected $fillable = ['nim', 'nama', 'jurusan', 'image'];

    // Menentukan nama tabel jika nama tabel tidak sesuai dengan konvensi Laravel
    protected $table = 'mahasiswa';

    // Jika tabel Anda tidak menggunakan timestamp, setel ke false
    public $timestamps = false;
}
