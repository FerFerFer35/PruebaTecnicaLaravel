<?php

namespace Database\Seeders;

use App\Models\Incomes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Incomes::factory()->count(30)->create();
    }
}
