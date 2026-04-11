<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_signup', function (Blueprint $table) {
            $table->id();
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->text('phoneno')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_signup');
    }
};
