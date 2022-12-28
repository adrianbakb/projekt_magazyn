<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([                                             //dodanie pierwszego użytkownika z uprawnieniami administratora
            'name' => 'Admin',
            'email' => 'admin@admin.pl',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@admin.pl'),
            'created_at' => now(),
            'updated_at' => now(),
            'type' => 'admin'
        ]);
    }
}
