<?php

use Illuminate\Database\Seeder;
use App\Models\CastMemberMovies;

class CastMembersMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            factory(CastMemberMovies::class, 100)->create();
        }
        catch (Throwable $t)
        {
            
        }
    }
}
