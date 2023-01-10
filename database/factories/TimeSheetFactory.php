<?php

namespace Database\Factories;

use App\Models\TimeSheet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeSheetFactory extends Factory
{
        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeSheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'staff_id' => rand(1,10),
            'salary_id' => rand(1,10),
            'allowance' => rand(100000,1000000),
            'work_day' => 22,
            'advance' => 0,
            'received' => 0,
            'month' => 12,
            'month_leave' => rand(1,2),
            'remaining_leave' => rand(6,12),
            'month' => 12,
            'note' => 'Lương tháng 12',
        ];
    }
}
