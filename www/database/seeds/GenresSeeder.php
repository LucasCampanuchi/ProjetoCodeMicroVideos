<?php

use Illuminate\Database\Seeder;
use App\Models\Genres;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Genres::class, 10)->create();
    }
}
