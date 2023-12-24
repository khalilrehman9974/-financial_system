<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        User::create([

            'name' => 'Khalil',

            'email' => 'admin@admin.com',

            'password' => bcrypt('123456'),

        ]);

    }
    }
}
