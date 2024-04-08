<?php

namespace Database\Seeders;
use App\Models\alumnus;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'nisn' => '12345678',
                'id_tahun' => 2024,
                'j_kelamin' => 'Male',
                'tmpt_lahir' => 'New York',
                'tgl_lahir' => '1990-05-20',
                'phone_num' => '123456789',
                'alamat' => '123 Main St',
                'foto' => 'profile1.jpg',
                'password' => bcrypt('password1'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'nisn' => '123',
                'id_tahun' => 2024,
                'j_kelamin' => 'Female',
                'tmpt_lahir' => 'Chicago',
                'tgl_lahir' => now(),
                'phone_num' => '987654321',
                'alamat' => '456 Elm St',
                'foto' => 'profile2.jpg',
                'password' => bcrypt('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ];

        foreach ($users as $value) {
            alumnus::create($value);
        }
    }
}
