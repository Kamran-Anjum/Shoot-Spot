<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->string('booking_no');
            $table->string('location');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('full_date');
            $table->string('year');
            $table->string('month');
            $table->string('week');
            $table->string('date');
            $table->string('day');
            $table->string('time');
            $table->string('details',1000);
            $table->string('status');
            $table->string('package')->nullable();
            $table->string('amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('loyalty_points')->nullable();
            $table->string('user_photographer_id')->nullable();
            $table->string('user_photographer_name')->nullable();

            $table->unsignedBigInteger('package_request_id');
            $table->foreign('package_request_id')->references('id')->on('package_requests')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('shoot_for_id');
            $table->foreign('shoot_for_id')->references('id')->on('shoot_fors')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
