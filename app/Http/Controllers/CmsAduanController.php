<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;

class CmsAduanController extends Controller
{
	function __construct(){
		$this->middleware('CheckAdmin');
		$this->parseData['page'] = 'cmsAduan';
	}

	public function aduanNonVerif(){
		$this->parseData['title'] = 'Halaman Aduan Non Verif | '. $this->appName;
		$this->parseData['page'] = 'cmsAduanNonVerif';
		$this->parseData['issues'] = Issue::with('User')->where('status', '!=','diverifikasi')->get();
		return view('content/cms/aduan/aduanNonVerif', $this->parseData);
	} 

	public function formAduanNonVerifUbah($id){
		$this->parseData['title'] = 'Halaman Form Aduan Non Verif | '. $this->appName;
		$this->parseData['page'] = 'cmsAduanNonVerif';

		if(!empty($id)){
			$this->parseData['issue'] = Issue::with('user')->find($id);
			return view('content/cms/aduan/aduanNonVerifUbah', $this->parseData);
		} else {
			return redirect('cms/aduan/nonverif')->with($this->message('danger', 'Data yang anda cari tidak ditemukan!'));
		}
	}

	public function prosesAduanNonVerifUbah(Request $r, $id){
		$r->validate([
			'response_issue' => 'min:0',
			'status' => 'required',
			'publish' => 'required',
			'document_verif' => 'file|mimetypes:image/jpeg,image/png|required'
		]);
 
		$response_issue = $r->response_issue == null ? '' : $r->response_issue;
		$status = $r->status;
		$publish = $r->publish;
		$document_verif = $r->document_verif;
 
		if(!empty($id)){
			$issue = Issue::find($id);
 
			if($issue->count() > 0){

				if($r->hasFile('document_verif')){
					if($r->document_verif->move('upload/aduan',$r->document_verif->getClientOriginalName())){
						$issue->document_verif = $r->document_verif->getClientOriginalName();
 
						$issue->response_issue = $response_issue;
						$issue->status = $status;
						$issue->publish = $publish;
						try{
							$issue->save();
							return redirect('cms/aduan/nonverif')->with($this->message('success', 'Data berhasil diubah!'));
 
						}catch(Exception $e){
							return redirect('cms/aduan/nonverif')->with($this->message('danger', 'Data gagal diubah! silahkan coba lagi. error : '. $e->getMessage()));	
						}
 
 
					}
 
 
				}
				// $issue->response_issue = $response_issue;
				// $issue->status = $status;
				// $issue->publish = $publish;
 
				// try {
				// 	$issue->save();
				// 	return redirect('cms/aduan/nonverif')->with($this->message('success', 'Data berhasil diubah!'));
				// } catch (Exception $e) {
				// 	return redirect('cms/aduan/nonverif')->with($this->message('danger', 'Data gagal diubah! silahkan coba lagi. error : '. $e->getMessage()));	
				// }
			// } else {
			// 	return redirect('cms/aduan/nonverif')->with($this->message('danger', 'Data tidak ada!'));
			// }
				}
			}else {
			return redirect('cms/aduan/nonverif')->with($this->message('danger', 'Expected Param ID!'));
		}
}

	public function aduanVerif(){
		$this->parseData['title'] = 'Halaman Aduan Verif | '. $this->appName;
		$this->parseData['page'] = 'cmsAduanVerif';
		$this->parseData['issues'] = Issue::with('User')->where('status', 'diverifikasi')->get();
		return view('content/cms/aduan/aduanVerif', $this->parseData);
	}

	public function aduanVerifDetail($id){
		$this->parseData['title'] = 'Halaman Detail Aduan Verif | '. $this->appName;
		$this->parseData['page'] = 'cmsAduanVerif';

		if(!empty($id)){
			$this->parseData['issue'] = Issue::with('User')->find($id);
			return view('content/cms/aduan/aduanVerifDetail', $this->parseData);
		} else {
			return redirect('cms/aduan/verif')->with($this->message('danger', 'Expected Param ID!'));
		}
	}

	public function aduanVerifPublish($id){
		if(!empty($id)){
			$issue = Issue::with('User')->find($id);
			if($issue == null){
				return redirect('cms/aduan/verif')->with($this->message('danger', 'Tidak ada data!'));
			} else {
				$issue->publish = 'true';
				$issue->save();
				return redirect('cms/aduan/verif')->with($this->message('success', 'Data berhasil di publish!'));
			}
			
		} else {
			return redirect('cms/aduan/verif')->with($this->message('danger', 'Expected Param ID!'));
		}
	}

	public function formAduanVerifUbah($id){
		$this->parseData['title'] = 'Halaman Form Aduan Non Verif | '. $this->appName;
		$this->parseData['page'] = 'cmsAduanVerif';

		if(!empty($id)){
			$this->parseData['issue'] = Issue::with('user')->find($id);
			return view('content/cms/aduan/aduanVerifUbah', $this->parseData);
		} else {
			return redirect('cms/aduan/verif')->with($this->message('danger', 'Data yang anda cari tidak ditemukan!'));
		}
	}

	public function prosesAduanVerifUbah(Request $r, $id){
		$r->validate([
			'response_issue' => 'min:0',
			'status' => 'required',
			'publish' => 'required'
		]);

		$response_issue = $r->response_issue == null ? '' : $r->response_issue;
		$status = $r->status;
		$publish = $r->publish;

		if(!empty($id)){
			$issue = Issue::find($id);

			if($issue->count() > 0){
				$issue->response_issue = $response_issue;
				$issue->status = $status;
				$issue->publish = $publish;

				try {
					$issue->save();
					return redirect('cms/aduan/verif')->with($this->message('success', 'Data berhasil diubah!'));
				} catch (Exception $e) {
					return redirect('cms/aduan/verif')->with($this->message('danger', 'Data gagal diubah! silahkan coba lagi. error : '. $e->getMessage()));	
				}
			} else {
				return redirect('cms/aduan/verif')->with($this->message('danger', 'Data tidak ada!'));
			}
		} else {
			return redirect('cms/aduan/verif')->with($this->message('danger', 'Expected Param ID!'));
		}
	}
}



















