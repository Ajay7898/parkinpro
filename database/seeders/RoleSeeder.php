<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $record = [
            [
                'id' => 1,
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'User'
            ],
        ];

        DB::table('roles')->insertOrIgnore($record);

    }
}
