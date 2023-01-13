<?php

namespace App\Console\Commands;

use App\Models\AnnualLeave;
use Illuminate\Console\Command;

class LeaveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'annual_leave:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update leave monthly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $listStaffLeave = AnnualLeave::get();

        foreach ($listStaffLeave as $item) {
            AnnualLeave::where('id', $item->id)->update([
                'number' => $item->number + 1,
                'working_time' => floor(abs(strtotime($item->staff->start_date) - strtotime(date('Y-m-d H:i:s')))/(60*60*24)),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
