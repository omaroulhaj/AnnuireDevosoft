<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiquesTable extends Migration
{
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('type');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('image')->nullable();
            $table->string('site_web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->float('longitude', 20, 10)->nullable();
            $table->float('latitude', 20, 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
