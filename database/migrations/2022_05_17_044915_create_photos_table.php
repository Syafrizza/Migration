<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('photo_tag_id')->nullable();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');

            $table->string('judul', 120);
            $table->string('penjelasan')->nullable();
            $table->string('pribadi', 20);
            $table->date('tanggal_unggah');
            $table->integer('view')->default(0);
            $table->string('nama_file');

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comment')->onDelete('cascade');
            $table->foreign('photo_tag_id')->references('id')->on('photo_tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
