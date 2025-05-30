<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'wildan',
            'email' => 'wildanwigenta52@gmail.com',
            'password' => Hash::make('adminlelang'),
            'level' => 'admin'
        ],
        [
            'name' => 'andi',
            'email' => 'andipetugas@gmail.com',
            'password' => Hash::make('petugaslelang'),
            'level' => 'petugas'
        ],
        [
            'name' => 'fawwaz',
            'email' => 'andipetugas@gmail.com',
            'password' => Hash::make('petugaslelang'),
            'level' => 'petugas'
        ]
    );
    }
}
