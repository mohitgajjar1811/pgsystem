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
        Schema::table('user_booking', function (Blueprint $table) {
            $table->string('roomname')->nullable()->after('id');
        });
        Schema::table('user_order', function (Blueprint $table) {
            $table->string('roomname')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_booking', function (Blueprint $table) {
            $table->dropColumn('roomname');
        });
        Schema::table('user_order', function (Blueprint $table) {
            $table->dropColumn('roomname');
        });
    }
};
