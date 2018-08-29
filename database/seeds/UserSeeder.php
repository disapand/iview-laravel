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
        $admin = [
            'name' => 'zetin',
            'password' => bcrypt('zetin_secret'),
            'role' => '超级管理员'
        ];

        \App\Models\User::create($admin);
    }
}
