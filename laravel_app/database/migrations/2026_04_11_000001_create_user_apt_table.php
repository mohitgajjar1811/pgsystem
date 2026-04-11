<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_apt', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('phn')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('msg')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_apt');
    }
};
