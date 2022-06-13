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
        Folder::create([
            'designation' => 'Bureau Informatique',
            'designationar' => 'مكتب الإعلاميات',
            'type' => 'service'
        ]);
        Folder::create([
            'designation' => 'Ressources Humaine',
            'designationar' => 'الموارد البشرية',
            'type' => 'service'
        ]);
        Folder::create([
            'designation' => 'sous service 1',
            'designationar' => 'sous service 1',
            'type' => 'sousservice',
            'folder_id'=>1
        ]);
        Folder::create([
            'designation' => 'sous service 2',
            'designationar' => 'sous service 2',
            'type' => 'sousservice',
            'folder_id'=>1
        ]);
        Folder::create([
            'designation' => 'sous service A',
            'designationar' => 'sous service A',
            'type' => 'sousservice',
            'folder_id'=>5
        ]);
        Folder::create([
            'designation' => 'theme1',
            'designationar' => 'theme1',
            'type' => 'theme',
            'folder_id'=>7
        ]);
    }
}
