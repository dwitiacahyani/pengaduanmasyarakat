<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class ProfilController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		$this->parseData['page'] = 'profil';
	}

	public function index(){
		$this->parseData['profil'] = User::where('id', Auth::user()->id)->first();

		$this->parseData['title'] = 'Halaman Profil | ' . $this->appName;
		if(Auth::user()->level == "warga"){
			return view('content/user/profil/index', $this->parseData);
		} else {
			return view('content/user/profil/indexAdmin', $this->parseData);
		}
	}

	public function submitProses(Request $r){
		$r->validate([
			'name' => 'required|min:3|max:100',
			'nik' => 'required|digits:16',
			'email' => 'required|email:rfc,dns',
			'password' => 'confirmed'
		]);

		$name = $r->name;
		$nik = $r->nik;
		$email = $r->email;
		$password = $r->password;

		// check email and nik
		$check = User::where('email', $email)->where('nik', $nik)->where('id', '!=', Auth::user()->id);

		if ($check->count() > 0) {
			return redirect('profil')->with($this->message('danger', 'Gagal ubah data! Email atau Nik sudah terpakai!'));
		} else {
			$user = User::find(Auth::user()->id);

			if ($user != null) {
				if (!empty($password)) {
					$user->name = $name;
					$user->nik = $nik;
					$user->email = $email;
					$user->password = Hash::make($password);
				} else {
					$user->name = $name;
					$user->nik = $nik;
					$user->email = $email;
				}
			} else{
				return redirect('profil')->with($this->message('danger', 'Sesuatu terlihat tidak benar! Silahkan coba lagi!'));
			}

			if($user->save()){
				return redirect('profil')->with($this->message('success', 'Data Anda berhasil diubah!'));
			} else {
				return redirect('profil')->with($this->message('danger', 'Sesuatu terlihat tidak benar! Silahkan coba lagi!'));
			}
		}
	}
}
