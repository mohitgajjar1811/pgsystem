<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('smtp_settings', function (Blueprint $table) {
            $table->id();
            $table->string('host')->default('smtp.gmail.com');
            $table->integer('port')->default(587);
            $table->string('encryption')->default('tls'); // tls or ssl
            $table->string('username');
            $table->string('password');
            $table->string('from_name')->default('Sunrise PG');
            $table->string('from_email');
            $table->string('admin_email')->nullable(); // admin notification recipient
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtp_settings');
    }
};
