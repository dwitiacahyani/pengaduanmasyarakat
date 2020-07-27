<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class CmsContactController extends Controller
{
	function __construct(){
		$this->middleware('CheckAdmin');
		$this->parseData['page'] = 'contact';
	}

	public function index(){
		$this->parseData['contact'] = Contact::find(1);

		if($this->parseData['contact'] != null){
			if($this->parseData['contact']->count() > 0){
				return view('content/cms/contact/index', $this->parseData);
			} else {
				return redirect('cms');
			}
		}else{
			return redirect('cms');
		}
	}

	public function proses(Request $r){
		$r->validate([
			'village_name' => 'required|min:3',
			'village_address' => 'required|min:5',
			'village_phone' => 'numeric',
			'village_fax' => 'numeric',
			'village_email' => 'email',
			'village_website' => 'min:5'
		]);

		$contact = Contact::find(1);

		if($contact->count() > 0){
			$contact->village_name = $r->village_name;
			$contact->village_address = $r->village_address;
			$contact->village_phone = $r->village_phone;
			$contact->village_fax = $r->village_fax;
			$contact->village_email = $r->village_email;
			$contact->village_website = $r->village_website;
			$contact->village_latitude = $r->village_latitude;
			$contact->village_longitude = $r->village_longitude;
			try {
				$contact->save();
				return redirect('cms/kontak')->with($this->message('success', 'Sukses update data!'));
			} catch (Exception $e) {
				return redirect('cms/kontak')->with($this->message('warning', 'Gagal update data! error : ' . $e->getMessage()));
			}
		} else {
			return redirect('cms/kontak')->with($this->message('danger', 'Data tidak ada!'));
		}
	}
}
