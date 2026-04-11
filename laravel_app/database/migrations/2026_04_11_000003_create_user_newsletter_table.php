<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_newsletter', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_newsletter');
    }
};
