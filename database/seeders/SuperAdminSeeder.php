<?php

namespace Database\Seeders;
use App\Models\SuperAdmin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supadmin = new SuperAdmin;
        $supadmin->name = "Top Super Admin";
        $supadmin->email = "superadmin@gmail.com";
        $supadmin->password = Hash::make("Superadmin1");
        $supadmin->save();
    }
}
