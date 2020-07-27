<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\User;
use Auth;

class AduanController extends Controller
{
	public function __construct(){
		// $this->middleware('auth');
		// $this->middleware('CheckWarga');
		$this->parseData['page'] = 'aduan';
	}

	public function index(){
		if(Auth::user() != null){
			$this->parseData['issue'] = Issue::with('user')->where('user_id', Auth::user()->id)->paginate(5);
		}

		$this->parseData['title'] = 'Halaman List Aduan | ' . $this->appName;

		// $this->parseData['issues'] = Issue::with('user')->where('publish', 'true')->where('status', 'diverifikasi')->orderBy('created_at', 'DESC')->paginate(5);

		$this->parseData['issues'] = Issue::with('user')->orderBy('created_at', 'DESC')->paginate(5);

		return view('content/user/aduan/index', $this->parseData);
	}

	public function aduanverif(){
		
		$this->parseData['title'] = 'Halaman List Aduan | ' . $this->appName;

		$this->parseData['issues'] = Issue::with('user')->where('publish', 'true')->where('status', 'diverifikasi')->orderBy('created_at', 'DESC')->paginate(5);


		return view('content/user/aduanverif/index', $this->parseData);
	}

	public function tambah_form(){
		$this->parseData['title'] = 'Halaman Tambah Aduan | ' . $this->appName;

		return view('content/user/aduan/tambah', $this->parseData);
	}

	public function ubah_form($id){
		$this->parseData['title'] = 'Halaman Ubah Aduan | ' . $this->appName;

		$find = Issue::find($id);

		if ($find != null) {
			$this->parseData['data'] = $find;
		} else {
			return redirect('aduan')->with($this->message('danger', 'Data yang anda cari tidak ditemukan!'));
		}

		return view('content/user/aduan/ubah', $this->parseData);
	}

	public function ubah_proses($id, Request $req){
		$req->validate([
			'title_issue' => 'required',
			'description_issue' => 'required',
			'document_issue' => 'file|mimetypes:image/jpeg,image/png|required'
		]);

		$find = Issue::find($id);

		if($find->count() > 0){
			if($req->hasFile('document_issue')){
				if($req->document_issue->move('uploads/aduan', $req->document_issue->getClientOriginalName())){
					$find->document_issue = $req->document_issue->getClientOriginalName();
					$find->title_issue = $req->title_issue;
					$find->description_issue = $req->description_issue;
				}else{
					return redirect('aduan')->with($this->message('danger', 'Gagal ubah data karena upload gagal!'));
				}
			}else{
				$find->title_issue = $req->title_issue;
				$find->description_issue = $req->description_issue;
			}

			if($find->save()){
				return redirect('aduan')->with($this->message('success', 'Berhasil ubah data!'));
			}else{
				return redirect('aduan')->with($this->message('danger', 'Gagal ubah data! Silahkan coba lagi!'));
			}

		} else {
			echo 'gada data';
		}
	}

	public function tambah_proses(Request $req){
		$req->validate([
			'title_issue' => 'required',
			'description_issue' => 'required',
			'document_issue' => 'file|mimetypes:image/jpeg,image/png|required'
		]);

		$id = $this->generateIssueId();

		if(!empty($id)){
			$id = $id + 1;
		} else {
			$id = '10' . date('dmy') . '001';
		}

		if($req->hasFile('document_issue')){
			if($req->document_issue->move('uploads/aduan', $req->document_issue->getClientOriginalName())){
				$tambah = Issue::create([
					'issue_id' => $id,
					'user_id' => Auth::user()->id,
					'title_issue' => $req->title_issue,
					'description_issue' => $req->description_issue,
					'document_issue' => $req->document_issue->getClientOriginalName(),
					'response_issue' => ''

				]);

				if ($tambah) {
					return redirect('aduan')->with($this->message('success', 'Berhasil tambah data!'));
				} else {
					return redirect('aduan')->with($this->message('danger', 'Gagal tambah data!'));
				}

			} else {
				return redirect('aduan')->with($this->message('danger', 'Gagal tambah data!'));
			}
		}else{
			$tambah = Issue::create([
				'issue_id' => $id,
				'user_id' => Auth::user()->id,
				'title_issue' => $req->title_issue,
				'description_issue' => $req->description_issue,
				'document_issue' => '',
				'response_issue' => ''
			]);

			if ($tambah) {
				return redirect('aduan')->with($this->message('success', 'Berhasil tambah data!'));
			} else {
				return redirect('aduan')->with($this->message('danger', 'Gagal tambah data!'));
			}
		}
	}

	public function hapus_proses($id){
		$find = Issue::find($id);

		if($find != null){
			if($find->delete()){
				return redirect('aduan')->with($this->message('success', 'Berhasil hapus data!'));
			}else{
				return redirect('aduan')->with($this->message('danger', 'Gagal hapus data, silahkan coba lagi!'));
			}
		}else{
			return redirect('aduan')->with($this->message('danger', 'Data yang anda cari tidak ditemukan!'));
		}
	}
}






