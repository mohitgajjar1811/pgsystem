<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_blogorder', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->integer('blog_item_id')->nullable();
            $table->integer('order_id')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_blogorder');
    }
};
