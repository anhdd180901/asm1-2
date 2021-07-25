<?php

namespace Database\Seeders;

use App\Models\RoomService;
use Illuminate\Database\Seeder;

class RoomServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomService::factory(5)->create();
    }
}
