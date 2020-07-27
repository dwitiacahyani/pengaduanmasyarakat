<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';
    protected $primaryKey = 'issue_id';
    protected $fillable = ['issue_id', 'user_id', 'title_issue', 'description_issue', 'document_issue', 'status', 'publish', 'response_issue', 'document_verif'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
