<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Farmer;
use App\Models\Farm;

class FarmerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmers = Farmer :: factory() -> count(20) -> create();

        foreach ($farmers as $farmer) {

            $farms = Farm :: inRandomOrder() -> limit(rand(1, 5)) -> get();

            $farmer -> farms() -> attach($farms);
        }
    }
}
