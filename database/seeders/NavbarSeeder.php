<?php

namespace Database\Seeders;
use App\Models\Navbar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Home',
                'route' => 'home',
                'ordering' => 1,
            ],
            [
                'name' => 'about',
                'route' => 'about',
                'ordering' => 2,
            ],
            [
                'name' => 'contact',
                'route' => 'contact',
                'ordering' => 3,
            ]
        ];
  
        foreach ($links as $key => $navbar) {
            Navbar::create($navbar);
        }
    }
}
