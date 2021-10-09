<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('cid');
            $table->string('name');
            $table->string('lname');
            $table->string('position');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('QRpassword');
            $table->binary('img')->nullable();
            $table->string('status');
            $table->string('store_id');
            $table->string('facebook');
            $table->string('linetoken');
            $table->string('user_add')->nullable();
            $table->string('user_edit')->nullable();
            $table->string('user_delete')->nullable();
            $table->string('user_medic')->nullable();
            $table->string('user_hos')->nullable();
            $table->string('user_claim')->nullable();
            $table->string('user_rep')->nullable();
            $table->rememberToken();
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
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
}
