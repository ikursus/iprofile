<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User 1 - Query Builder mencipta rekod user 1
        DB::table('users')->insert([
            'name' => 'John Doe',
            'no_kp' => '808080-08-8080',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password123'),
            'phone' => '0123456789',
            'status' => 'aktif'
        ]);

        // User 2
        DB::table('users')->insert([
            'name' => 'Jane Smith',
            'no_kp' => '909090-09-9090',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password123'),
            'phone' => '0134567890',
            'status' => 'aktif'
        ]);

        // User 3
        DB::table('users')->insert([
            'name' => 'Mike Johnson',
            'no_kp' => '707070-07-7070',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('password123'),
            'phone' => '0145678901',
            'status' => 'aktif'
        ]);

        // User 4
        DB::table('users')->insert([
            'name' => 'Sarah Wilson',
            'no_kp' => '606060-06-6060',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('password123'),
            'phone' => '0156789012',
            'status' => 'aktif'
        ]);

        // User 5
        DB::table('users')->insert([
            'name' => 'David Brown',
            'no_kp' => '505050-05-5050',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('password123'),
            'phone' => '0167890123',
            'status' => 'aktif'
        ]);
    }
}
