<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuLinks = [
            ['id' => 1, 'title' => 'Tədarükçülər', 'slug' => 'supplier', 'code' => 'product'],
            ['id' => 2, 'title' => 'Kateqoriya', 'slug' => 'category', 'code' => 'product'],
            ['id' => 3, 'title' => 'Məhsullar', 'slug' => 'product', 'code' => 'product'],
            ['id' => 4, 'title' => 'Sifarişlər', 'slug' => 'order', 'code' => 'order'],
            ['id' => 5, 'title' => 'Menyu linkləri', 'slug' => 'menulinks', 'code' => 'menu'],
            ['id' => 6, 'title' => 'İstifadəçi rolları', 'slug' => 'userrole', 'code' => 'user'],
            ['id' => 7, 'title' => 'Adminlər', 'slug' => 'admin', 'code' => 'user'],
            ['id' => 8, 'title' => 'Gəlirlər', 'slug' => 'income', 'code' => 'finance'],
            ['id' => 9, 'title' => 'Xərclər', 'slug' => 'expence', 'code' => 'finance'],
            ['id' => 10, 'title' => 'Maliyyə Hesabatı', 'slug' => 'financialreport', 'code' => 'finance'],
            ['id' => 11, 'title' => 'Faktura', 'slug' => 'invoice', 'code' => 'finance'],
            ['id' => 14, 'title' => 'Ödənişlər', 'slug' => 'payment', 'code' => 'finance']
        ];

        foreach ($menuLinks as $link) {
            \App\Models\MenuLinks::create($link);
        }
    }
}
