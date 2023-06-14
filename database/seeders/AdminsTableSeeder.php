<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');
        $adminRecords = [
            ['id' => 1, 'name' => 'Tutule', 'email' => 'admin@admin.com', 'password' => $password, 'status' => 1],
        ];
        Admin::insert($adminRecords);
    }
}
