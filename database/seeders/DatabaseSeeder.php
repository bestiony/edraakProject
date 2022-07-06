<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
// use Faker\Factory as Faker;
use App\Models\ReturnPolicy;
use App\Models\OrderHasProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductHasSubcategory;
use App\Models\CategoryHasSubcategory;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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


        // ---------- Images ----------
            if(Image::count()==0){
                $categoriesImages= [
                    [
                        'id'=>1,
                        'image_url'=>'storage\images\men.jpg'
                    ],
                    [
                        'id'=>2,
                        'image_url'=>'storage\images\women.jpeg'
                    ],
                    [
                        'id'=>3,
                        'image_url'=>'storage\images\kids.png'
                    ]
                ];
                foreach($categoriesImages as $entry){
                    Image::create($entry);
                }
                $subcategoriesImages = [
                    [
                        'id'=>4,
                        'image_url'=>'storage\images\jackets.jpg'
                    ],
                    [
                        'id'=>5,
                        'image_url'=>'storage\images\pants.jpg'
                    ],
                    [
                        'id'=>6,
                        'image_url'=>'storage\images\Sweaters&Shirts.jpg'
                    ],
                    [
                        'id'=>7,
                        'image_url'=>'storage\images\Shoes.jpg'
                    ],
                    [
                        'id'=>8,
                        'image_url'=>'storage\images\Bags.jpg'
                    ],
                    [
                        'id'=>9,
                        'image_url'=>'storage\images\Accessories.jpg'
                    ]
                ];
                foreach($subcategoriesImages as $image){
                    Image::create($image);
                }
            }


            // ------------- users ------------

            if (User::count()==0 ){
                User::create([
                    'first_name'=>'abderrahman',
                    'last_name'=>'fodili',
                    'email'=>'bestiony12373@gmail.com',
                    'password'=> Hash::make('12345678')
                ]);
            }
            if(Admin::count()==0){
                Admin::create([
                    'name'=>'bachir',
                    'email'=>'bachirove@gmail.com',
                    'password'=> Hash::make('87654321')
                ]);
                Admin::create([
                    'name'=>'Bread',
                    'email'=>'admin@edraakmc.com',
                    'password'=> Hash::make('edraakMC_admin')
                ]);
            }

            // --------- seeding categories -----------
        if (Category::count() == 0){
        Category::create([
            'id'=>1,
            'name'=>'Men',
            'image_id'=>1
        ]);
        Category::create([
            'id'=>2,
            'name'=>'Woman',
            'image_id'=>2
        ]);
        Category::create([
            'id'=>3,
            'name'=>'Kids',
            'image_id'=>3
        ]);
    }

            // --------- seeding subcategories -----------
        if(Subcategory::count()==0){
        Subcategory::create([
            'id'=>1,
            'name'=>'Jackets',
            'image_id'=>4
        ]);
        Subcategory::create([
            'id'=>2,
            'name'=>'Pants',
            'image_id'=>5
        ]);
        Subcategory::create([
            'id'=>3,
            'name'=>'Sweaters & Shirts',
            'image_id'=>6
        ]);
        Subcategory::create([
            'id'=>4,
            'name'=>'Shoes',
            'image_id'=>7
        ]);
        Subcategory::create([
            'id'=>5,
            'name'=>'Bags',
            'image_id'=>8
        ]);
        Subcategory::create([
            'id'=>6,
            'name'=>'Accessories',
            'image_id'=>9
        ]);
    }
    if (CategoryHasSubcategory::count()==0){

        for($i = 1; $i<4;$i++){
            for($j = 1; $j<7;$j++){
                $filling = [
                    'category_id'=>$i,
                    'subcategory_id'=>$j
                ];
                CategoryHasSubcategory::create($filling);
        }
    }

        }
            // ------------   --------------
        if(ReturnPolicy::count() == 0){
            $policies =  [
                'Eligible for refund and exchange',
                'Exchange only',
                'Partial refunds are granted',
                'Exempt good'
            ];
            foreach($policies as $i => $policy){

                ReturnPolicy::create([
                    'id'=> $i+1,
                    'description' =>  $policy
                ]);
            }
    }


    if(Image::count()== 0){
        Image::create([
            'id'=>4,
            'image_url'=>'https://m.media-amazon.com/images/I/51aiBTahmbL._AC_UX466_.jpg'
        ]);
        Image::create([
            'id'=>5,
            'image_url'=>'https://m.media-amazon.com/images/I/61XE+thKb0L._AC_UY550_.jpg'
        ]);
        Image::create([
            'id'=>6,
            'image_url'=>'https://m.media-amazon.com/images/I/61H3RcZUPaL._AC_UY550_.jpg'
        ]);}
        // -------------- seeding products ---------------
        if(Product::count()==0){
        // $faker = Faker::create();
        $productsNames = ['something', 'somrthingelse', 'WOW','Amasing'];
        $descriptions = [
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iusto accusamus, quam deleniti aut cumque, reprehenderit odio quibusdam earum numquam itaque quisquam labore cupiditate ullam hic doloribus autem nisi non?',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iusto accusamus, quam deleniti aut cumque, reprehenderit odio quibusdam earum numquam itaque quisquam labore cupiditate ullam hic doloribus autem nisi non?',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iusto accusamus, quam deleniti aut cumque, reprehenderit odio quibusdam earum numquam itaque quisquam labore cupiditate ullam hic doloribus autem nisi non?'
    ];
        for($i =1; $i <= 18; $i++){
            $category = rand(1,3);
            $product = [
                'id'=>$i,
                'name'=>$productsNames[rand(0,2)],
                'description' => $descriptions[rand(0,2)],
                'price'=> rand(20,1000),
                'size' => rand(1,5),
                'image_id'=> $category,
                'return_policy_id'=> rand(1,4),
                'category_id' => $category
            ];
            Product::create($product);
        }
        }

        if(ProductHasSubcategory::count()==0){
            for($i = 1; $i<=18;$i++){
                $pair =[
                    'product_id'=>  $i,
                    'subcategory_id'=> rand(1,6)
                ];
            ProductHasSubcategory::create($pair);
            }


        }

        if(Address::count()==0){
            Address::create([
                'id'=> 1,
                'user_id' =>1,
                'address_line_1' => 'bouafia block 716/7',
                'address_line_2' => ' hbb djelfa',
                'city' => 'hbb',
                'state'=> 'djelfa',
                'country'=>'Algeria ',
                'postal_code'=>'17023'
            ]);
        }

        if (Order::count()==0){
            Order::create([
                'id'=>1,
                'user_id'=>1,
                'status'=>1,
                'address_id'=> 1,
                'total' => 111
            ]);
        }


        if (OrderHasProduct::count()==0){
            OrderHasProduct::create([
                'order_id'=>1,
                'product_id'=>1,
                'quantity'=>3,
            ]);
            OrderHasProduct::create([
                'order_id'=>1,
                'product_id'=>8,
                'quantity'=>1,
            ]);
            OrderHasProduct::create([
                'order_id'=>1,
                'product_id'=>3,
                'quantity'=>5
            ]);
        }



    }




}
