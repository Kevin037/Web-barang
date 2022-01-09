<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TipeUser::create([
            'nama_tipe' => 'admin',
        ]);    
        TipeUser::create([
            'nama_tipe' => 'staff',
        ]);  
    }
}
