<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Contact::create([
    		'village_name'=>'Taman',
    		'village_address'=>'Jl. Gatotkaca No.1, Taman 1, Taman, Kec. Taman, Kabupaten Pemalang, Jawa Tengah 52361',
    		'village_phone'=>'-',
    		'village_fax'=>'-',
    		'village_email'=>'-',
    		'village_website'=>'taman.desakupemalang.id',
    		'village_latitude'=>'-6.9009914',
    		'village_longitude'=>'109.406719',
    	]);
    }
}
