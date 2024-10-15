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
                'password' =>  Hash::make('desi123'),
                'nama' => 'Desi Nur',
                'privilages'=> 'Full-access'
            ],
            [
                'username' => 'ezra',
                'password' => Hash::make('ezra123'),
                'nama' => 'Ezraa',
                'privilages' => 'Full-access'
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
