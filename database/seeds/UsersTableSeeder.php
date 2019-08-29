<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@voting.example',
                'password' => Hash::make('123456'),
                'role' => User::ADMIN_ROLE
            ],
            [
                'name' => 'TrungLB',
                'email' => 'trunglb@voting.example',
                'password' => Hash::make('123456'),
                'role' => User::USER_ROLE
            ]
        ]);
    }
}
