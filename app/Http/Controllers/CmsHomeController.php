<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use Auth;

class CmsHomeController extends Controller
{
	public function __construct()
	{
		$this->parseData['page'] = 'cmsHome';
	}

	public function index(){
		$this->parseData['summaryIssuesSaya'] = Issue::all();
		$this->parseData['summaryIssuesApprovedAnswered'] = Issue::where('publish', 'true')->where('status', 'diverifikasi')->get();
		$this->parseData['issues'] = Issue::with('user')->where('publish', 'true')->where('status', 'diverifikasi')->orderBy('created_at', 'DESC')->paginate(5);
		return view('content/cms/home', $this->parseData);
	}
}
