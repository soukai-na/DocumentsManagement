<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Folder::create(
            [
                'designation' => 'Direction des Services',
                'designationar' => 'مديرية المصالح',
                'type' => 'service'
            ]
            
        );
        Folder::create([
                'designation' => 'Urbanisme et Patrimoine',
                'designationar' => 'التعمير و الممتلكات',
                'type' => 'service'
        ]);
    }
}
