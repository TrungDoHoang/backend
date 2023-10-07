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
        /*
            id -> primary key
            role -> user, company, admin -> enum
            name -> string
            email -> string
            password -> string
            refresh_token -> string
            refresh_token_expired_at -> datetime
            created_at -> datetime
            updated_at -> datetime
            deleted_at -> datetime -> softDeletes
        */
        Schema::create('be_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['user', 'company', 'admin']);
            $table->string('token');
            $table->dateTime('token_expired_at');
            $table->string('refresh_token');
            $table->dateTime('refresh_token_expired_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('be_users');
    }
};
