<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('P_Users', function (Blueprint $table) {
           $table->bigIncrements('s_no');
           $table->integer('token_num');
            $table->string('purpose');
            $table->string('name');
            $table->char('phone_num',11);
            $table->dateTime('start_timestamp');
            $table->dateTime('end_timestamp');
            $table->string('e_name');
            
            $table->boolean('a_flag')->default(false);
            $table->boolean('e_flag')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('P_Users');
    }
}
