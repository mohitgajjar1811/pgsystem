<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_blog', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('price')->nullable();
            $table->text('title')->nullable();
            $table->text('detail')->nullable();
            $table->text('bed')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_blog');
    }
};
