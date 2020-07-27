<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            // Code => 10230420001 => 10 -> KODE ISSUE, 23 -> TANGGAL, 04 -> BULAN, 20 -> TAHUN, 001 -> NO URUT
            $table->string('issue_id', '20');
            $table->primary('issue_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title_issue', 200);
            $table->text('description_issue');
            $table->text('document_issue');
            $table->enum('status', ['menunggu verifikasi', 'diverifikasi', 'ditolak', 'selesai'])->default('menunggu verifikasi');
            $table->enum('publish', ['true', 'false'])->default('false');
            $table->text('response_issue');
            $table->text('document_issue_admin');
            $table->text('document_verif')->nullable();
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
        Schema::dropIfExists('issues');
    }
}
