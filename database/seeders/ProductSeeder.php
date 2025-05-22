<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define products for each category manually
        $productsData = [
            'Electronics' => [
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=150&q=80', // Smartphone
                    'title'        => 'Smartphone X',
                    'description'  => 'Latest model smartphone with advanced features including high-resolution camera and fast processor.',
                    'unit_price'   => 699.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 50,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=150&q=80', // Laptop
                    'title'        => 'Laptop Pro',
                    'description'  => 'High performance laptop designed for professionals with cutting-edge performance.',
                    'unit_price'   => 1299.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 30,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1510070009289-b5bc34383727?auto=format&fit=crop&w=150&q=80', // Headphones
                    'title'        => 'Bluetooth Headphones',
                    'description'  => 'Wireless headphones with noise cancellation and superior sound quality.',
                    'unit_price'   => 199.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 80,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=150&q=80', // Smart TV
                    'title'        => '4K Smart TV',
                    'description'  => 'Ultra-high definition smart TV with streaming capabilities and smart connectivity.',
                    'unit_price'   => 999.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 20,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1519183071298-a2962fe73d3d?auto=format&fit=crop&w=150&q=80', // Camera
                    'title'        => 'Digital Camera',
                    'description'  => 'High-resolution digital camera with multiple lens options and image stabilization.',
                    'unit_price'   => 449.50,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 40,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1517705008129-3c4f891ca114?auto=format&fit=crop&w=150&q=80', // Smartwatch
                    'title'        => 'Smartwatch Series 5',
                    'description'  => 'Smartwatch with health tracking, notifications, and customizable watch faces.',
                    'unit_price'   => 399.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 60,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1573495612937-0c619d938ef0?auto=format&fit=crop&w=150&q=80', // Wireless Mouse
                    'title'        => 'Wireless Mouse',
                    'description'  => 'Ergonomic wireless mouse with high precision and long battery life.',
                    'unit_price'   => 29.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 150,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=150&q=80', // Mechanical Keyboard
                    'title'        => 'Mechanical Keyboard',
                    'description'  => 'High-quality mechanical keyboard with customizable keys and RGB lighting.',
                    'unit_price'   => 89.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 100,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1580910051074-50c33159a255?auto=format&fit=crop&w=150&q=80', // Portable Speaker
                    'title'        => 'Portable Speaker',
                    'description'  => 'Compact portable speaker with powerful sound and a waterproof design.',
                    'unit_price'   => 59.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 70,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1587202372775-2cc49809c3d0?auto=format&fit=crop&w=150&q=80', // Gaming Console
                    'title'        => 'Gaming Console',
                    'description'  => 'Next-generation gaming console with immersive graphics and fast load times.',
                    'unit_price'   => 499.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 25,
                ],
                
            ],
            'Fashion' => [
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1520962919745-c31559ad618b?auto=format&fit=crop&w=150&q=80', // Men's Shirt
                    'title'        => 'Men\'s Casual Shirt',
                    'description'  => 'Comfortable and stylish casual shirt perfect for everyday wear.',
                    'unit_price'   => 39.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 100,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=150&q=80', // Evening Dress
                    'title'        => 'Women\'s Evening Dress',
                    'description'  => 'Elegant evening dress designed for special occasions.',
                    'unit_price'   => 129.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 60,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1520975913847-7e8a16994205?auto=format&fit=crop&w=150&q=80', // Sunglasses
                    'title'        => 'Unisex Sunglasses',
                    'description'  => 'Stylish sunglasses offering UV protection and a modern design.',
                    'unit_price'   => 49.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 80,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1602810315447-015e43a5d8de?auto=format&fit=crop&w=150&q=80', // Leather Jacket
                    'title'        => 'Leather Jacket',
                    'description'  => 'Premium leather jacket that brings a classic yet modern style.',
                    'unit_price'   => 199.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 40,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1552346988-0e151b0c498f?auto=format&fit=crop&w=150&q=80', // Sneakers
                    'title'        => 'Sports Sneakers',
                    'description'  => 'Comfortable and durable sneakers designed for running and everyday use.',
                    'unit_price'   => 89.99,
                    'unit_measure' => 'pair',
                    'stock_quantity' => 120,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1542060744-7f9f942d5e73?auto=format&fit=crop&w=150&q=80', // Handbag
                    'title'        => 'Designer Handbag',
                    'description'  => 'Luxury designer handbag made with high-quality materials and craftsmanship.',
                    'unit_price'   => 299.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 30,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1531061901305-1d1d9b63f040?auto=format&fit=crop&w=150&q=80', // Jeans
                    'title'        => 'Casual Jeans',
                    'description'  => 'Versatile casual jeans suitable for various occasions.',
                    'unit_price'   => 59.99,
                    'unit_measure' => 'pair',
                    'stock_quantity' => 90,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=150&q=80', // Sandals
                    'title'        => 'Summer Sandals',
                    'description'  => 'Lightweight and comfortable sandals ideal for summer wear.',
                    'unit_price'   => 29.99,
                    'unit_measure' => 'pair',
                    'stock_quantity' => 110,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1576127576250-2aeb43f64c29?auto=format&fit=crop&w=150&q=80', // Scarf
                    'title'        => 'Wool Scarf',
                    'description'  => 'Warm wool scarf perfect for chilly days and stylish layering.',
                    'unit_price'   => 19.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 75,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1564767609342-620cb19b2357?auto=format&fit=crop&w=150&q=80', // Suit
                    'title'        => 'Formal Suit',
                    'description'  => 'Elegant formal suit suitable for business and formal events.',
                    'unit_price'   => 299.99,
                    'unit_measure' => 'set',
                    'stock_quantity' => 20,
                ],
            ],
            'Home & Kitchen' => [
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1528715471579-d3b2182454e8?auto=format&fit=crop&w=150&q=80', // Cookware
                    'title'        => 'Stainless Steel Cookware Set',
                    'description'  => 'Durable and efficient cookware set perfect for everyday cooking.',
                    'unit_price'   => 129.99,
                    'unit_measure' => 'set',
                    'stock_quantity' => 40,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1567016542850-bfdc231f3879?auto=format&fit=crop&w=150&q=80', // Dinnerware
                    'title'        => 'Ceramic Dinnerware',
                    'description'  => 'Elegant ceramic dinnerware set that adds style to your dining table.',
                    'unit_price'   => 79.99,
                    'unit_measure' => 'set',
                    'stock_quantity' => 50,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1581579180117-6f10f0bdc9cf?auto=format&fit=crop&w=150&q=80', // Vacuum Cleaner
                    'title'        => 'Vacuum Cleaner',
                    'description'  => 'Powerful vacuum cleaner designed for deep cleaning and efficient performance.',
                    'unit_price'   => 199.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 35,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1540420773426-f3227e60b0b1?auto=format&fit=crop&w=150&q=80', // Blender
                    'title'        => 'Blender',
                    'description'  => 'High-speed blender perfect for smoothies, soups, and food preparation.',
                    'unit_price'   => 59.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 65,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1586201375761-83865001e0b0?auto=format&fit=crop&w=150&q=80', // Microwave
                    'title'        => 'Microwave Oven',
                    'description'  => 'Compact microwave oven ideal for quick heating and convenient meal preparation.',
                    'unit_price'   => 99.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 45,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1598300052328-1d9b48e5404c?auto=format&fit=crop&w=150&q=80', // Sofa
                    'title'        => 'Sofa',
                    'description'  => 'Comfortable sofa that adds a modern touch to your living room.',
                    'unit_price'   => 499.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 15,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1585168230219-e3b52d62b8c9?auto=format&fit=crop&w=150&q=80', // Coffee Maker
                    'title'        => 'Coffee Maker',
                    'description'  => 'Automatic coffee maker designed to brew perfect coffee every time.',
                    'unit_price'   => 39.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 70,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1588702547923-7093a6c3ba33?auto=format&fit=crop&w=150&q=80', // Desk Lamp
                    'title'        => 'LED Desk Lamp',
                    'description'  => 'Energy-efficient LED desk lamp with adjustable brightness for your workspace.',
                    'unit_price'   => 29.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 80,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=150&q=80', // Recliner
                    'title'        => 'Recliner Chair',
                    'description'  => 'Luxurious recliner chair that offers comfort and style for your living room.',
                    'unit_price'   => 299.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 25,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1504198266280-5c5a89b4f0d5?auto=format&fit=crop&w=150&q=80', // Wall Art
                    'title'        => 'Wall Art Decoration',
                    'description'  => 'Beautiful wall art decoration to enhance the aesthetics of any room.',
                    'unit_price'   => 49.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 90,
                ],
            ],
            'Books' => [
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=150&q=80', // Mystery novel
                    'title'        => 'Mystery Thriller Novel',
                    'description'  => 'A gripping mystery thriller that will keep you on the edge of your seat.',
                    'unit_price'   => 14.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 100,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=150&q=80', // Sci-Fi book
                    'title'        => 'Science Fiction Epic',
                    'description'  => 'An epic science fiction adventure that explores futuristic worlds.',
                    'unit_price'   => 18.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 80,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1553456558-aff63285bdd5?auto=format&fit=crop&w=150&q=80', // Romance book
                    'title'        => 'Romance Bestseller',
                    'description'  => 'A heartwarming romance novel that captures the essence of love.',
                    'unit_price'   => 12.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 90,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=150&q=80', // Biography
                    'title'        => 'Non-fiction Biography',
                    'description'  => 'An inspiring biography of a notable personality offering deep insights into their life.',
                    'unit_price'   => 16.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 70,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=150&q=80', // Fantasy book
                    'title'        => 'Fantasy Adventure',
                    'description'  => 'A captivating fantasy adventure filled with magic, mystery, and epic battles.',
                    'unit_price'   => 15.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 85,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=150&q=80', // Historical fiction
                    'title'        => 'Historical Fiction',
                    'description'  => 'A well-researched historical fiction novel that transports you to a bygone era.',
                    'unit_price'   => 13.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 75,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1513475382585-d06e58bcb0ea?auto=format&fit=crop&w=150&q=80', // Self-help
                    'title'        => 'Self-help Guide',
                    'description'  => 'A practical self-help guide filled with actionable tips for personal development.',
                    'unit_price'   => 9.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 120,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d?auto=format&fit=crop&w=150&q=80', // Cookbooks
                    'title'        => 'Cooking Recipe Book',
                    'description'  => 'A cookbook featuring a wide range of recipes for both beginners and experienced cooks.',
                    'unit_price'   => 19.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 65,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1590086782797-81e7e95ae1e3?auto=format&fit=crop&w=150&q=80', // Children's book
                    'title'        => 'Children\'s Storybook',
                    'description'  => 'A delightful children\'s storybook with colorful illustrations and engaging stories.',
                    'unit_price'   => 8.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 110,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1581924582961-d10d3eea7f18?auto=format&fit=crop&w=150&q=80', // Graphic novel
                    'title'        => 'Graphic Novel',
                    'description'  => 'A visually engaging graphic novel that combines storytelling with stunning artwork.',
                    'unit_price'   => 17.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 95,
                ],
            ],
            'Sports & Outdoors' => [
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1494451930893-0af9d416b7d4?auto=format&fit=crop&w=150&q=80', // Mountain bike
                    'title'        => 'Mountain Bike',
                    'description'  => 'A rugged mountain bike designed for off-road adventures and challenging terrains.',
                    'unit_price'   => 599.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 20,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=150&q=80', // Backpack
                    'title'        => 'Trekking Backpack',
                    'description'  => 'A durable trekking backpack with multiple compartments for carrying essentials.',
                    'unit_price'   => 89.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 50,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=150&q=80', // Tent
                    'title'        => 'Camping Tent',
                    'description'  => 'Spacious and weather-resistant camping tent suitable for family camping trips.',
                    'unit_price'   => 129.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 35,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1582097131210-194c9dff92b0?auto=format&fit=crop&w=150&q=80', // Running shoes
                    'title'        => 'Running Shoes',
                    'description'  => 'Lightweight running shoes designed for comfort and performance on all terrains.',
                    'unit_price'   => 69.99,
                    'unit_measure' => 'pair',
                    'stock_quantity' => 70,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1558981403-c5f989684ce5?auto=format&fit=crop&w=150&q=80', // Fitness tracker
                    'title'        => 'Fitness Tracker',
                    'description'  => 'Advanced fitness tracker that monitors your activity levels and sleep patterns.',
                    'unit_price'   => 49.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 90,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1605289393402-686f5c7e1f19?auto=format&fit=crop&w=150&q=80', // Yoga mat
                    'title'        => 'Yoga Mat',
                    'description'  => 'High-quality yoga mat with excellent grip and cushioning for all types of exercises.',
                    'unit_price'   => 24.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 100,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1605902711622-cfb43c4437b9?auto=format&fit=crop&w=150&q=80', // Hiking boots
                    'title'        => 'Hiking Boots',
                    'description'  => 'Durable hiking boots offering excellent support and traction on rugged trails.',
                    'unit_price'   => 99.99,
                    'unit_measure' => 'pair',
                    'stock_quantity' => 45,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1516822003759-68526ee1bdd6?auto=format&fit=crop&w=150&q=80', // Water bottle
                    'title'        => 'Sports Water Bottle',
                    'description'  => 'Insulated water bottle to keep your drinks cold during outdoor activities.',
                    'unit_price'   => 14.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 150,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1559628232-4fd8bfa3ba3c?auto=format&fit=crop&w=150&q=80', // Fishing rod
                    'title'        => 'Fishing Rod',
                    'description'  => 'High-quality fishing rod suitable for both beginners and experienced anglers.',
                    'unit_price'   => 79.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 40,
                ],
                [
                    'image_url'    => 'https://images.unsplash.com/photo-1560347876-aeef00ee58a1?auto=format&fit=crop&w=150&q=80', // Grill
                    'title'        => 'Outdoor Grill',
                    'description'  => 'Robust outdoor grill perfect for barbecues and family gatherings.',
                    'unit_price'   => 199.99,
                    'unit_measure' => 'piece',
                    'stock_quantity' => 25,
                ],
            ],
        ];
        

        foreach ($productsData as $categoryName => $products) {
            $category = Category::where('name', $categoryName)->first();

            foreach ($products as $productData) {
                Product::create(array_merge($productData, [
                    'category_id' => $category->id,
                ]));
            }
        }
    }
}
