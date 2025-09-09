<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('image');
            $table->string('phone_code',10);
            $table->string('phone_number',20);
            $table->string('date_of_birth');
            $table->string('gender',10);
            $table->string('address');
            $table->string('experience',1000);
            $table->string('bio',1000)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('photography_equipments')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('spaces_photograph_id');
            $table->foreign('spaces_photograph_id')->references('id')->on('spaces_photographeds')->constrained()->onDelete('cascade');

            $table->string('equip_other_name')->nullable();
            $table->integer('isactive');
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
        Schema::dropIfExists('photographers');
    }
}
