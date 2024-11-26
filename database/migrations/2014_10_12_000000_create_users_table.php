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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->unsignedBigInteger('team_id')->nullable();
             //na het migration voeg deze line code in je terminal
            //php artisan make:migration add_team_foreign_key_to_users_table --table=users

            // in je new migration voeg dit in the up function
            //Schema::table('users', function (Blueprint $table) {
            //$table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');});

            // down function
            //Schema::table('users', function (Blueprint $table) {
            //$table->dropForeign(['team_id']);});

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
