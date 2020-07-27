<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contact';
	protected $primaryKey = 'contact_id';
	protected $fillable = ['contact_id', 'village_name', 'village_address', 'village_phone', 'village_fax', 'village_email', 'village_longitude', 'village_latitude'];
}
