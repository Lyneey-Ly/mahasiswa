<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\dataMahasiswa;

use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 


 

class UserController extends Controller
{
      public function login()
    {
      
        return view('login');
    }

    public function register()
    {
      
        return view('register');
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }





     public function home()
    {
      
        return view('home');
    }

    public function pendaftaran()
{
    // Pastikan user sudah login
    $user = Auth::user();

    // Jika user adalah admin, jangan biarkan masuk ke form pendaftaran mahasiswa
    if ($user->role !== 'mahasiswa') {
        return redirect()->route('home')->with('error', 'Hanya mahasiswa yang dapat mengisi form ini.');
    }

    // Cek apakah mahasiswa ini sudah pernah mengisi data diri sebelumnya
    // (Asumsi relasi di model User bernama 'mahasiswa')
    if ($user->mahasiswa) {
        return redirect()->route('home')->with('status', 'Anda sudah melakukan pendaftaran!');
    }

    return view('pendaftaran');
}

public function postPendaftaran(Request $request)
{
    // 1. Validasi input form
    $request->validate([
        'nik' => 'required|unique:data_mahasiswas,nik',
        'alamat' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required',
        'lulusan_tahun' => 'required|digits:4',
    ]);

    // 2. Simpan data ke tabel data_mahasiswas dengan mengaitkan user_id yang sedang login
    dataMahasiswa::create([
        'user_id' => Auth::id(), // Mengambil ID user yang sedang login
        'nik' => $request->nik,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'agama' => $request->agama,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'no_hp' => $request->no_hp,
        'lulusan_tahun' => $request->lulusan_tahun,
    ]);

    return redirect()->route('profil')->with('status', 'Pendaftaran berhasil disimpan!');


}
   
    public function beranda()
    {
      
        return view('beranda');
    }
   
   
     public function postlogin(Request $request)
    {
      $cek = $request->validate([
        'email'=>'required',
        'password'=>'required'

      ]);
                                                                             

  if(Auth::Attempt($cek))
    {
        $user = Auth::user();

        if($user->role=='admin')
          {
            return redirect()->route('home')->with('status', 'selamaaaat datang ' .$user->name);
          }
        else
          {
            return redirect()->route('beranda')->with('status', 'selamat datang  ' .$user->name);
          }
            
            
       
         
             
          
    }  
      return back()->with('status', 'emil atau password salahh');


    }


    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 

return redirect('/login')->with('status', 'Anda telah berhasil keluar dari sistem.');}


public function profil()
{
    $user = Auth::user();

    // Jika belum isi data mahasiswa, paksa isi form pendaftaran dulu
    if (!$user->mahasiswa) {
        return redirect()->route('pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
    }

    return view('profil', compact('user'));
}

// 3. Tampilkan Form Edit Data
public function editPendaftaran()
{
    $user = Auth::user();
    
    if (!$user->mahasiswa) {
        return redirect()->route('pendaftaran');
    }

    $mahasiswa = $user->mahasiswa;
    return view('editpendaftaran', compact('mahasiswa'));
}


// 4. Proses Update Data ke Database
public function updatePendaftaran(Request $request)
{
    $user = Auth::user();
    $mahasiswa = $user->mahasiswa;

    // Validasi (abaikan keunikan NIK milik user itu sendiri agar tidak error saat disimpan ulang)
    $request->validate([
        'nik' => 'required|unique:data_mahasiswas,nik,' . $mahasiswa->id,
        'alamat' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required',
        'lulusan_tahun' => 'required|digits:4',
    ]);

    $mahasiswa->update([
        'nik' => $request->nik,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'agama' => $request->agama,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'no_hp' => $request->no_hp,
        'lulusan_tahun' => $request->lulusan_tahun,
    ]);

    return redirect()->route('profil')->with('status', 'Data profil berhasil diperbarui!');
}

 
}