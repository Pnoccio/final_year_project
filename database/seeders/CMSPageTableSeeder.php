<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CMS_pages;

class CMSPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsPageRecords = [
            'id' => 1, 'title' => 'about us', 'description' => 'Content is coming soon', 'url' => 'about us', 'meta_title' => 'About us', 'meta_description' => 'About us content', 'meta_keyword' => 'about us content', 'status' => 1
        ];
        CMS_pages::insert($cmsPageRecords);
    }
}
