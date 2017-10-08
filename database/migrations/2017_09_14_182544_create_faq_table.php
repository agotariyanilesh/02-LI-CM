<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faqCatId')->unsigned();
            $table->foreign('faqCatId')->references('id')->on('faq');
            $table->text('question')->nullable();            
            $table->text('answer')->nullable();
            $table->text('slug')->nullable();
            $table->integer('status')->default(0);
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
        //
        Schema::dropIfExists('faq');
    }
}
