<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;
use Mail;

class ContactController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
		$this->middleware('CheckWarga');
		$this->parseData['page'] = 'kontak';
	}

	public function index(){
		$this->parseData['contactData'] = Contact::find(1);
		$this->parseData['title'] = 'Halaman Hubungi Kami' . $this->appName;
		return view('content/user/contact/index', $this->parseData);
	}

	public function submit_proses(Request $req){
		$req->validate([
			'subject' => 'required|min:5',
			'message' => 'required|min:20'
		]);

		try {
			$contact = Contact::find(1);

			if($contact->count() == 0){
				return redirect('kontak')->with($this->message('warning', 'Data kontak kosong!'));
			}

			$subject = $req->subject;

			$to_name = Auth::user()->name;
			$to_email = Auth::user()->email;

			$data = array('name'=>'Balaidesa '. $contact->village_name, "body" => $req->message, 'to_name'=>$to_name, 'to_email'=>$to_email);
			Mail::send('content/emails/toUser', $data, function($message) use ($to_name, $to_email, $subject, $contact) {
				$message->to($to_email, $to_name)
				->subject('Pesan kamu telah kami terima!');
				$message->from('officialguidenesia@gmail.com','Balaidesa ' . $contact->village_name);
			});

			Mail::send('content/emails/toDesa', $data, function($message) use ($to_name, $to_email, $subject, $contact) {
				$message->to('officialguidenesia@gmail.com', 'Balaidesa ' . $contact->village_name)
				->subject($subject);
				$message->from($to_email, $to_name);
			});	

			return redirect('kontak')->with($this->message('success', 'Berhasil kirim pesan!'));

		} catch (Exception $e) {
			return redirect('kontak')->with($this->message('danger', 'Gagal kirim pesan! error : ' . $e->getMessage()));
		}
	}
}
