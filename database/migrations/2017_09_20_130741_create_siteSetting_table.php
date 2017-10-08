<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('siteSettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name',255)->nullable();
            $table->text('site_logo')->nullable();
            $table->text('site_favicon')->nullable();
            $table->string('fb_url',255)->nullable();
            $table->string('tw_url',255)->nullable();
            $table->string('li_url',255)->nullable();
            $table->string('contact_email',255)->nullable();
            $table->string('contact_num',255)->nullable();
            $table->string('paypal_user',255)->nullable();
            $table->string('paypal_pwd',255)->nullable();
            $table->string('paypal_secret',255)->nullable();
            $table->string('smtp_user',255)->nullable();
            $table->string('smtp_pwd',255)->nullable();
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
        Schema::dropIfExists('siteSettings');
    }
}
