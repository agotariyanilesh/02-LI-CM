<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMembershipPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userMembershipPlan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->default(0);
            $table->integer('planId')->default(0);
            $table->integer('jobPage')->default(0);
            $table->integer('createdJobPage')->default(0);
            $table->integer('companyPage')->default(0);
            $table->integer('createdCompanyPage')->default(0);
            $table->integer('groupPage')->default(0);
            $table->integer('createdgroupPage')->default(0);
            $table->integer('sendInmails')->default(0);
            $table->integer('sendedSendInmails')->default(0);
            $table->integer('profileView')->default(0);
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
        Schema::dropIfExists('userMembershipPlan');
    }
}
