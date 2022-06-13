<?php

namespace Database\Seeders;

use App\Models\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Groupe::create([
            'nom'=>'chefs de service',
            'description'=>"groupe contient les chefs de chaque service"
        ]);
        Groupe::create([
            'nom'=>'directions',
            'description'=>"groupe de directeurs"
        ]);
    }
}
