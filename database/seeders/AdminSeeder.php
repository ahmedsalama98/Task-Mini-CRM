<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            'name'=>' Admin',
            'email'=>"admin@admin.com",
            'password'=>Hash::make('password'),
            'email_verified_at'=>Carbon::now()
        ];
        $admin =   User::create($data);
        $admin->addRole('admin');
    }
}
