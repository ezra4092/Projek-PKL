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
                'username' => 'desi',
                'password' =>  Hash::make('desi1'),
                'nama' => 'Desi Nur'
            ],
            [
                'username' => 'ezra',
                'password' => Hash::make('1234'),
                'nama' => 'Ezraa'
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
