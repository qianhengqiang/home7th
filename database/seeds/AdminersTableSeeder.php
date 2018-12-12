<?php

use Illuminate\Database\Seeder;

class AdminersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Models\Adminer::class,5)->create();
    }
}
