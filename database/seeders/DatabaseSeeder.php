<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryHasSubcategory;
use App\Models\ReturnPolicy;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            // --------- seeding categories -----------
        Category::create([
            'id'=>1,
            'name'=>'Men'
        ]);
        Category::create([
            'id'=>2,
            'name'=>'Woman'
        ]);
        Category::create([
            'id'=>3,
            'name'=>'Kids'
        ]);

            // --------- seeding subcategories -----------
        Subcategory::create([
            'id'=>1,
            'name'=>'Jackets'
        ]);
        Subcategory::create([
            'id'=>2,
            'name'=>'Pants'
        ]);
        Subcategory::create([
            'id'=>3,
            'name'=>'Sweaters & Shirts'
        ]);
        Subcategory::create([
            'id'=>4,
            'name'=>'Shoes'
        ]);
        Subcategory::create([
            'id'=>5,
            'name'=>'Bags'
        ]);
        Subcategory::create([
            'id'=>6,
            'name'=>'Accessories'
        ]);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        for($i = 1; $i<4;$i++){
            for($j = 1; $j<7;$j++){
                $filling = [
                    'category_id'=>$i,
                    'subcategory_id'=>$j
                ];
                CategoryHasSubcategory::create($filling);
        }

        }
            // ------------   --------------
        ReturnPolicy::factory(10)->create();

    }
}
