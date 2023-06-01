<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run(): void
    {
        $categories = [
            [
                'title' => "men's clothing",
                'parentId' => '1',
            ],
            [
                'title' => "jewelery",
                'parentId' => '2',
            ],
            [
                'title' => "electronics",
                'parentId' => '3',
            ],
            [
                'title' => "women's clothing",
                'parentId' => '4',
            ],

        ];
        $products = [
            [
                'title' => 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops',
                'description' => 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday',
                'price' => 29.50,
                'category' => "men's clothing"
            ],
            [
                'title' => "John Hardy Women's Legends Naga Gold & Silver Dragon Station Chain Bracelet",
                'description' => "From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean's pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.",
                'price' => 500,
                'category' => "jewelery"
            ],
            [
                'title' => "WD 2TB Elements Portable External Hard Drive - USB 3.0 ",
                'description' => "USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system",
                'price' => 399.20,
                'category' => "electronics"
            ],
            [
                'title' => "Rain Jacket Women Windbreaker Striped Climbing Raincoats",
                'description' => "100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON",
                'price' => 78.20,
                'category' => "women's clothing"
            ],

        ];


//        $posts = $this->table('Products');
//        $posts->insert($products)
//            ->saveData();

//        $posts = $this->table('categories');
//        $posts->insert($categories)
//            ->saveData();


    }
}
