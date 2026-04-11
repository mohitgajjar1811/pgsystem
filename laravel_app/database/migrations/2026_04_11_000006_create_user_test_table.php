<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_test', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->text('image')->nullable();
            $table->text('name')->nullable();
            $table->text('dsg')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_test');
    }
};
