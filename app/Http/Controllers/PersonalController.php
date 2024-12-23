<?php

namespace App\Http\Controllers;

use App\Models\Programmer;

class PersonalController 
{
    public function index()
    {
        $personalBrandData = Programmer::all();  // Mengambil semua data  

        // Cek jika data tidak ditemukan  
        if ($personalBrandData->isEmpty()) {
            // Tangani kasus ketika tidak ada data  
            // Misalnya, Anda bisa mengalihkan pengguna atau menampilkan pesan  
            return view('welcome')->with('message', 'Tidak ada data merek pribadi ditemukan.');
        }
        
        

        return view('welcome', compact('personalBrandData'));
}
}
