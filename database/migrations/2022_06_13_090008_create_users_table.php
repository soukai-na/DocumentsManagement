<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nom');
            $table->string('prenom');
            $table->string('nomar');
            $table->string('prenomar');
            $table->string('telephone');
            $table->string('image');
            $table->string('role');
            $table->string('status');
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->foreign('groupe_id')->nullable()->references('id')->on('groupes');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
