<?php

use Illuminate\Database\Seeder;

class CgrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Beer',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Cocktail',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Cocoa',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Coffee',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Homemade Liqueur',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Milk',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Ordinary Drink',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Other',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Punch',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Shot',
        ]);
        DB::table('cgr')->insert([
            'cgr_st_name' => 'Soft Drink',
        ]);
    }
}
