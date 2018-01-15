<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('usr')->insert([
            'usr_st_fname' => 'John',
            'usr_st_lname' => 'Dawl',
            'usr_dt_birth' => date('Y-m-d H:i:s'),
            'usr_st_email' => 'john@john.com',
            'usr_st_password' => 'test',
            'usr_st_gender' => 'm',
            'usr_dt_register' => date('Y-m-d H:i:s'),
            'usr_st_province' => 'on',
            'usr_st_city' => 'toronto'
        ]);
    }
}
