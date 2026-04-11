<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_booking', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('mobileno')->nullable();
            $table->text('joiningdate')->nullable();
            $table->text('adult')->nullable();
            $table->text('specialrequest')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_booking');
    }
};
