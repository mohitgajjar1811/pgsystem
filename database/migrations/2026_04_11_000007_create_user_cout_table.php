<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_cout', function (Blueprint $table) {
            $table->id();
            $table->text('roomname')->nullable();
            $table->text('bed')->nullable();
            $table->text('priceperb')->nullable();
            $table->text('deposite')->nullable();
            $table->text('total')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_cout');
    }
};
