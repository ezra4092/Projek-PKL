<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'Desi Nur',
                'username' => 'desi',
                'password' =>  Hash::make('desi123')
            ],
            [
                'nama' => 'Ezra Faira',
                'username' => 'ezra',
                'password' => Hash::make('1234')
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
