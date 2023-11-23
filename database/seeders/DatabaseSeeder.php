<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123'),
                'role' => '1',
                'specialist' => null,
                'dateIn' => Carbon::now(),
                'dob' => '1990-01-01',
                'salary' =>'2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'name' => 'Henry',
                'email' => 'henry@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123'),
                'role' => '2',
                'specialist' => 'Internal Medicine',
                'dateIn' => '2010-01-01',
                'dob' => '1990-01-01',
                'salary' =>'10000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123'),
                'role' => '3',
                'specialist' => null,
                'dateIn' => '2015-01-01',
                'dob' => '1995-01-01',
                'salary' =>'1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Alex',
                'email' => 'alex@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123'),
                'role' => '4',
                'specialist' => null,
                'dateIn' => '2015-02-01',
                'dob' => '1996-01-01',
                'salary' =>'1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::table('services')->insert([
            [
                'ser_name' => 'kham tong quat',
                'ser_price' => '100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ser_name' => 'x quang',
                'ser_price' => '150000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ser_name' => 'xet nghiem',
                'ser_price' => '100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);
        DB::table('medicines')->insert([
            [
                'name' => 'panadol',
                'quantity' => '100000',
                'price' => '2000',
                'type' => 'thuoc dau dau',
                'expire' => '2027-01-01',
                'import' => 'usa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Phosphalugel',
                'quantity' => '100000',
                'price' => '3000',
                'type' => 'thuoc da day',
                'expire' => '2027-01-01',
                'import' => 'usa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);
    }
}
