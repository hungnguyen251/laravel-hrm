<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModifyColumnReceivedAllowanceAdvanceTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            DB::statement('ALTER TABLE `timesheets` CHANGE `received` `received` DOUBLE(15,2) NOT NULL DEFAULT 0;');
            DB::statement('ALTER TABLE `timesheets` CHANGE `allowance` `allowance` DOUBLE(15,2) NOT NULL DEFAULT 0;');
            DB::statement('ALTER TABLE `timesheets` CHANGE `advance` `advance` DOUBLE(15,2) NOT NULL DEFAULT 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            //
        });
    }
}
