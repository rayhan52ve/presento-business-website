<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
       $user = [
        'name'=>'Sajid Rayhan',
        'role'=>2,
        'email'=>'admin@gmail.com',
        'password'=> bcrypt(12345678)
       ];
       User::create($user);
    }
}
