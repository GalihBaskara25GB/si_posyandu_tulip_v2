<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Kader;
  
  
class AuthController extends Controller
{
    public function showFormLogin()
    {
        // dd(Hash::make('galih'));
        // die();
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'username'                 => 'required|string',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'nama'                  => 'required|min:3|max:35',
            'username'              => 'required|unique:users,username',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'nama.min'              => 'Nama lengkap minimal 3 karakter',
            'nama.max'              => 'Nama lengkap maksimal 35 karakter',
            'username.required'     => 'Username wajib diisi',
            'username.unique'       => 'Username sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $kader = new Kader;
        $kader->nama = $request->nama;
        $kader->alamat = $request->alamat; 
        $kader->tempat_lahir = $request->tempat_lahir; 
        $kader->tanggal_lahir = $request->tanggal_lahir; 
        $kader->jenis_kelamin = $request->jenis_kelamin; 
        $kader->nomor_telepon = $request->nomor_telepon; 
        $kader->is_verified = 0;
        if(!$kader->save()){
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
  
        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->kader_id = $kader->getKey();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
  
  
}