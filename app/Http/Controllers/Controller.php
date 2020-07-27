<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $parseData = [
    	'title' => 'Halaman Dashboard | Pengaduan'
    ];

    public $appName = 'Pengaduan';

    public function message($status, $description){
    	return ['message'=>['status'=>$status, 'description'=>$description]];
    }

    public function generateIssueId(){
    	$id_issue = DB::select('SELECT MAX(issue_id) issue_id FROM Issues WHERE DATE_FORMAT(created_at, "%d-%m-%Y") = "'. date('d-m-Y') .'" LIMIT 1');

    	$id = $id_issue[0]->issue_id;

    	return $id;
    }
}
