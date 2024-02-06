<?php

namespace Database\Seeders;

use App\Models\Crew;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Crew::truncate();
        Crew::factory()->count(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
