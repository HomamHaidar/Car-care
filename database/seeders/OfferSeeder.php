<?php

namespace Database\Seeders;

use App\Models\offer\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::factory()
            ->count(10)
            ->create();
    }
}
