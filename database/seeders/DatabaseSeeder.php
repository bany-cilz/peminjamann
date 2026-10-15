<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Komputer & Laptop', 'deskripsi' => 'Perangkat PC desktop, laptop praktik, dan unit server.'],
            ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Router, switch, access point, dan perangkat jaringan lainnya.'],
            ['nama_kategori' => 'Alat Perkabelan', 'deskripsi' => 'Tang crimping, LAN tester, kabel UTP, dan konektor RJ45.'],
            ['nama_kategori' => 'Multimedia', 'deskripsi' => 'Proyektor, layar proyektor, kamera, dan perlengkapan audio.']
        ];

        foreach ($categories as $cat) {
            Kategori::create($cat);
        }
    }
}