<?php

namespace Database\Seeders;

use App\Models\Allocation;
use App\Models\User;
use Illuminate\Database\Seeder;

class AllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Allocation::factory()->count(20)->create();
    }
}
