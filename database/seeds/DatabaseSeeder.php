<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'nik' => 1234567891234567,
            'level' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);

        Contact::create([
    		'village_name'=>'Taman',
    		'village_address'=>'Jl. Gatotkaca No.1, Taman 1, Taman, Kec. Taman, Kabupaten Pemalang, Jawa Tengah 52361',
    		'village_phone'=>'0',
    		'village_fax'=>'0',
    		'village_email'=>'-',
    		'village_website'=>'taman.desakupemalang.id',
    		'village_latitude'=>'-6.9009914',
    		'village_longitude'=>'109.406719',
    	]);
    }
}
