<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('admins',function(Blueprint $table){
            $table->string('profile_img')->nullable()->after('email');
            $table->integer('flag')->default(0)->after('email');
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
        Schema::table('admins',function(Blueprint $table){
            $table->dropColumn(['profile_img','flag']);
        });
    }
}
