<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('User',function (Blueprint $table) {
         $table->bigIncrements('token_num');
            $table->string('purpose');
            $table->string('name');
            $table->char('phone_num',10);
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
          Schema::drop('User');
    }
}
