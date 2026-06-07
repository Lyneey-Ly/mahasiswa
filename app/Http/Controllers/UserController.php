<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\dataMahasiswa;
use App\Models\DataProgramStudi;
use App\Models\pembayaran;

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
            'role' => 'mahasiswa', 
        ]);

        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }

    public function home()
    {
        // Mengambil data list pembayaran beserta data user terkait untuk tabel pendaftar admin
        $pendaftar = pembayaran::with('user')->get();

        // Hitung statistik dashboard langsung dari master data pembayaran agar sinkron
        $totalPendaftar = pembayaran::count();
        $menungguVerifikasi = pembayaran::where('status_pembayaran', 'blmdbyr')->count();
        $diterima = pembayaran::where('status_pembayaran', 'sudahdibyr')->count();

        return view('home', compact('totalPendaftar', 'menungguVerifikasi', 'diterima', 'pendaftar'));
    }

    public function pendaftaran()
    {
        $user = Auth::user();

        if ($user->role !== 'mahasiswa') {
            return redirect()->route('home')->with('error', 'Hanya mahasiswa yang dapat mengisi form ini.');
        }

        if ($user->mahasiswa) {
            return redirect()->route('pembayaran')->with('status', 'Anda sudah melakukan pendaftaran!');
        }

        $program_studi = DataProgramStudi::with('DataFakultas')->get();

        return view('pendaftaran', compact('program_studi'));
    }

    public function postPendaftaran(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:data_mahasiswas,nik',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'lulusan_tahun' => 'required|digits:4',
            'program_studi_id' => 'required|exists:data_program_studis,id',
        ]);

        $mahasiswa = dataMahasiswa::create([
            'user_id' => Auth::id(),
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'lulusan_tahun' => $request->lulusan_tahun,
            'program_studi_id' => $request->program_studi_id,
        ]);

        $prodi = DataProgramStudi::findOrFail($request->program_studi_id);

        // Pastikan harga tidak pernah 0
        $harga = ($prodi->biaya_pendaftaran > 0) ? $prodi->biaya_pendaftaran : 1000000;

        pembayaran::create([
            'user_id' => Auth::id(),
            'program_studi_id' => $prodi->id,
            'fakultas_id' => $prodi->fakultas_id, 
            'harga_bayar' => $harga,
            'status_pembayaran' => 'blmdbyr',
        ]);

        return redirect()->route('pembayaran')->with('status', 'Pendaftaran berhasil!');
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

        return redirect('/login')->with('status', 'Anda telah berhasil keluar dari sistem.');
    }

    public function profil()
    {
        $user = Auth::user();

        if (!$user->mahasiswa) {
            return redirect()->route('pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }

        return view('profil', compact('user'));
    }

    public function editPendaftaran()
    {
        $user = Auth::user();
        
        if (!$user->mahasiswa) {
            return redirect()->route('pendaftaran'); 
        }

        $mahasiswa = $user->mahasiswa;
        return view('editpendaftaran', compact('mahasiswa'));
    }

    public function pembayaran()
    {
        $user = Auth::user();
        $pembayaran = pembayaran::with(['DataFakultas', 'DataProgramStudi'])
                        ->where('user_id', $user->id)
                        ->first();

        if (!$pembayaran && $user->mahasiswa) {
            $prodi = DataProgramStudi::find($user->mahasiswa->program_studi_id);
            $harga = ($prodi && $prodi->biaya_pendaftaran > 0) ? $prodi->biaya_pendaftaran : 1000000;

            $pembayaran = pembayaran::create([
                'user_id' => $user->id,
                'program_studi_id' => $prodi->id ?? 1,
                'fakultas_id' => $prodi->fakultas_id ?? 1,
                'harga_bayar' => $harga,
                'status_pembayaran' => 'blmdbyr',
            ]);
        } elseif (!$pembayaran) {
            return redirect()->route('pendaftaran')->with('error', 'Silakan isi formulir pendaftaran dulu.');
        }

        return view('pembayaran', compact('pembayaran'));
    }

    public function postpembayaran(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pembayaran = pembayaran::where('user_id', Auth::id())->first();

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $nama_file = 'bukti_' . Auth::id() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/bukti_transfer'), $nama_file);

            $pembayaran->update([
                'bukti_transfer'    => $nama_file,
                'status_pembayaran' => 'blmdbyr', 
            ]);

            return redirect()->back()->with('status', 'Bukti berhasil diupload!');
        }
        return redirect()->back()->with('error', 'Gagal upload.');
    }

    public function verifikasi($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->status_pembayaran = 'sudahdibyr';
        $pembayaran->save();

        return back()->with('status', 'Pembayaran berhasil divalidasi!');
    }

    public function laporan()
    {
       $pendaftarLunas = pembayaran::with('user')
                        ->where('status_pembayaran', 'sudahdibyr')
                        ->get();

    return view('laporan', compact('pendaftarLunas'));
    }
}