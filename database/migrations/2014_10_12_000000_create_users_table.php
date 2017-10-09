<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',100);
            $table->string('slug')->unique();
            $table->string('email',100)->unique();            
            $table->string('photo',50)->nullable();
            $table->string('coverPhoto',50)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('phoneNo',15)->nullable();
            $table->string('title',200)->nullable();
            $table->text('about')->nullable();
            $table->string('location',200)->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('fbLink')->nullable();
            $table->string('twitterLink')->nullable();
            $table->string('instaLink')->nullable();
            $table->string('googleLink')->nullable();
            $table->integer('isActive')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
