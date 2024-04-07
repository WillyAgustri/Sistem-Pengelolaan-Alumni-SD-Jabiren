<?php

namespace Database\Seeders;
use App\Models\admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => '',
                'username' => 'Admin',
                'password' => bcrypt('admin'),
                'foto' => '',
                'phone_num' =>''
            ],
            [
                'name' => '',
                'username' => 'ivena',
                'password' => bcrypt('ivena'),
                'foto' => '',
                'phone_num' =>'',
                

            ],
            ];

        foreach ($user as $value) {
            admin::create($value);
        }
    }
}
