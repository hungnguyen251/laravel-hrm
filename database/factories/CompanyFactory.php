<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'CÔNG TY CỔ PHẦN GV ASIA',
            'tax_code' => '190212059',
            'founding_date' => date('2020-06-05'),
            'email' => 'service@gv.com.vn', 
            'phone' => '1900299284',
            'logo' => 'logo-gv.jpg',
            'website' => 'https://g-v.asia/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
