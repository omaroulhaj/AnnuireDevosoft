<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBoutiquesTable extends Migration
{
    public function up()
    {
        Schema::table('boutiques', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id', 'categorie_fk_8521901')->references('id')->on('categories');
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->foreign('ville_id', 'ville_fk_8521966')->references('id')->on('villes');
        });
    }
}
