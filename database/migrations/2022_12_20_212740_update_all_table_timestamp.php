<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateAllTableTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `users` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `staffs` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                  CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `decentralizations` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                              CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `departments` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                 CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `positions` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                   CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `diplomas` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `companies` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                               CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `salaries` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                                CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");

        DB::statement("ALTER TABLE `timesheets` CHANGE `created_at` `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                                            CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
        ");
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
