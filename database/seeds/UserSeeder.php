<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i ++)
        {
            \App\Models\User::create([
                'name' => $i + 1,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(),
            ]);
        }
    }
}
