<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('village_name', 100);
            $table->text('village_address', 200);
            $table->string('village_phone', 15);
            $table->string('village_fax', 50);
            $table->string('village_email', 100);
            $table->string('village_website', 100);
            $table->string('village_longitude', 20);
            $table->string('village_latitude', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
