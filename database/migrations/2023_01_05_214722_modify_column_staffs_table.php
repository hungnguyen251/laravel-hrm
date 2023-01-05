<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModifyColumnStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `staffs` MODIFY `status` ENUM("active","inactive","suspended") NOT NULL DEFAULT "active";');
        DB::statement('ALTER TABLE `staffs` MODIFY `type` ENUM("Toàn thời gian","Bán thời gian","Thực tập sinh","Thử việc") NOT NULL DEFAULT "Thử việc";');
        DB::statement('ALTER TABLE `staffs` MODIFY `marriage_status` ENUM("Độc thân","Đã kết hôn") NOT NULL DEFAULT "Độc thân";');
        DB::statement('ALTER TABLE `staffs` MODIFY `gender` ENUM("Nam","Nữ") NOT NULL;');

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
