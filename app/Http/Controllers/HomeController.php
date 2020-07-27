<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
        // $this->middleware('CheckWarga');
        $this->parseData['page'] = 'home';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->parseData['issues'] = Issue::with('user')->where('publish', 'true')->where('status', 'diverifikasi')->orderBy('created_at', 'DESC')->paginate(5);
        
        if(Auth::user() != null){
            $this->parseData['summaryIssuesSaya'] = Issue::where('user_id', Auth::user()->id)->get();
            $this->parseData['summaryIssuesApprovedAnswered'] = Issue::where('user_id', Auth::user()->id)->where('publish', 'true')->where('status', 'diverifikasi')->get();
        }else{
            $this->parseData['summaryIssuesSaya'] = Issue::all();
            $this->parseData['summaryIssuesApprovedAnswered'] = Issue::where('publish', 'true')->where('status', 'diverifikasi')->get();
        }
        return view('content/user/home', $this->parseData);
    }
}
