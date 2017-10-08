<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('emailTemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('constant',255)->nullable();
            $table->string('subject',255)->nullable();
            $table->text('slug')->nullable();
            $table->text('message')->nullable();
            $table->integer('status')->default(1);
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
        //
        Schema::dropIfExists('emailTemplates');
    }
}
