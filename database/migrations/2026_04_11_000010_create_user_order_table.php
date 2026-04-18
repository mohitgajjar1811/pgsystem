<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_order', function (Blueprint $table) {
            $table->id();
            $table->text('amt')->nullable();
            $table->integer('uid_id')->nullable();
            $table->text('email')->nullable();
            $table->text('firstname')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_order');
    }
};
