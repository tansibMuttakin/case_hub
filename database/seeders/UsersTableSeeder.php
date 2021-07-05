<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'first_name' => 'Jon',
            'last_name' => 'Doe',
            'email' => 'admin@admin.com',
            'phone'=>'123-456-789',
            'birth_date'=>date("1996-02-20"),
            'district_name' =>'Dhaka',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'reg_date'=>date(now()),
            'last_visit'=>date(now()),
            'is_admin' => true,
            'is_active' => true,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\User::factory(10)->create();
    }
}
