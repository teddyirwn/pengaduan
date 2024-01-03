<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masyarakat = new User();
        $masyarakat->name ="Masyarakat";
        $masyarakat->nik="98987673112";
        $masyarakat->tlp = "08565334252";
        $masyarakat->email="masyarakat@gmail.com";
        $masyarakat->role = "masyarakat";
        $masyarakat->password= bcrypt("12345678");
        $masyarakat->save();

        $petugas = new User();
        $petugas->name ="petugas";
        $petugas->nik="98987673112";
        $petugas->tlp = "08565334252";
        $petugas->email="petugas@gmail.com";
        $petugas->role = "petugas";
        $petugas->password= bcrypt("12345678");
        $petugas->save();

        $admin = new User();
        $admin->name ="admin";
        $admin->nik="98987673112";
        $admin->tlp = "08565334252";
        $admin->email="admin@gmail.com";
        $admin->role = "admin";
        $admin->password= bcrypt("12345678");
        $admin->save();

    }
}
