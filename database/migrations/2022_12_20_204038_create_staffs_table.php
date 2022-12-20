<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar');
            $table->enum('gender', array('male','female'));
            $table->date('date_of_birth');
            $table->text('address');
            $table->enum('type', array('fulltime','parttime','internship','probationary'))->default('probationary');
            $table->integer('position_id');
            $table->integer('department_id');
            $table->integer('diploma_id');
            $table->enum('marriage_status', array('male','female'));
            $table->date('start_date');
            $table->enum('status', array('single','married'))->default('single');
            $table->softDeletes();
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
        Schema::dropIfExists('staffs');
    }
}
