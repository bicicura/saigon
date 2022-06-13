<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ActorFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actor::factory()->count(10)->create();
    }
}
