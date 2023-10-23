<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Browser;

class BrowserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('nombre' => 'Firefox', 'porcentaje' => 17.0),
            array('nombre' => 'Chrome', 'porcentaje' => 61.2),
            array('nombre' => 'Safari', 'porcentaje' => 3.5),
            array('nombre' => 'Microsoft Edge', 'porcentaje' => 3.4),
            array('nombre' => 'Opera', 'porcentaje' => 1.8),
            array('nombre' => 'Internet Explorer', 'porcentaje' => 1.5)
        ];
        Browser::insert($data);
    }
}
