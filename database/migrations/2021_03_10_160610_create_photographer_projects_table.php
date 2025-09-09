<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographerProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographer_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('portfolio_link');
            $table->string('description',1000);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('shoot_for_id');
            $table->foreign('shoot_for_id')->references('id')->on('shoot_fors')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('photographer_projects');
    }
}
