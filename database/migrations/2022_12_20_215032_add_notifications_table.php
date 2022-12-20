<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `notifications` (
            `id` int(11) NOT NULL,
            `title` varchar(255) NULL,
            `content` text NOT NULL,
            `staff_id` int(11) NOT NULL,
            `department_id` int(11) NOT NULL,
            `status` ENUM('waiting', 'approve','refuse') default  'waiting',
            `created_at` datetime default CURRENT_TIMESTAMP,
            `updated_at` datetime default CURRENT_TIMESTAMP
          )");

        DB::statement("ALTER TABLE `notifications`
                ADD PRIMARY KEY (`id`)");

        DB::statement("ALTER TABLE `notifications`
                MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT");
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
