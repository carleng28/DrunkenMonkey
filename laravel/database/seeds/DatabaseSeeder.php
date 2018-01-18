<?php

use Illuminate\Database\Seeder;
use App\Picture;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            CgrTableSeeder::class,
            UsersTableSeeder::class,
            //add here for more table seeders
        ]);
    }
}
