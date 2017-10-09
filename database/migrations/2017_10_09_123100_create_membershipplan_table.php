<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipplanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membershipPlan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('planName');
            $table->integer('planPrice')->default(0);
            $table->integer('companyPage')->default(0);
            $table->integer('groupPage')->default(0);
            $table->integer('sendInmails')->default(0);
            $table->integer('profileView')->default(0);
            $table->integer('isActive')->default(0);
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
        Schema::dropIfExists('membershipPlan');
    }
}
