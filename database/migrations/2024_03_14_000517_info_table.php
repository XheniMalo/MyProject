<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peopleinfo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->json('address');
            $table->integer('match_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
