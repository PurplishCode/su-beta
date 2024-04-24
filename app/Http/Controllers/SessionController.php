<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SessionController extends Controller
{

    public function post_login(Request $request) 
    {
        $findEmail = User::where('email', $request->email)->first();
        if($findEmail && Hash::check($request->password, $findEmail->password)) {
            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)) {
                toast('Selamat, anda berhasil login!', 'success');
                session()->regenerate();
                return to_route('home.view');
            } else {
                toast('Maaf terjadi kesalahan.', 'error');
                return redirect()->back()->withInput();
            } 
        } else {
            toast('Error credentials, try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
    public function login_view()
    {
       return view('auth.login');
    }

    public function home() 
    {
        $selectedAllImages = User::with('fotos')->join('fotos', 'fotos.user_id', '=', 'users.id')->take(6)->get();  
        $likedFotoImage = Foto::with('like_fotos')->select('like_fotos.*')->count();
        return view('home.index', compact('selectedAllImages', 'likedFotoImage'));
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        toast('You have succesfully logged out.', 'success');
        return redirect()->back();
    }

    public function register(Request $request) {
        $request->validate([
            'nama' => 'string|required',
            'password' => 'required',
            'email' => 'email|required',
            'namaLengkap' => 'string|required',
            'alamat' => 'required|string',
            'nomorTelepon' => 'required|string'
        ]);

        $array = [
            'nama' => $request->nama,
            
            'email' => $request->email,
            
            'password' => Hash::make($request->password),
            
            'namaLengkap' => $request->namaLengkap,

            'alamat' => $request->alamat,
            
            'nomor_telepon' => $request->nomorTelepon
        ];

        $dataSave = User::create($array);

        if($dataSave) {
            toast('You have succesfully created an account.', 'success');
            return redirect('login')->withInput();
        }
    }

  
}
