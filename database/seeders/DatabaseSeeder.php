<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
        User::factory(3)->create();

        Category::create([
            "name" => "Shoegaze",
            "slug" => "shoegaze",
        ]);
    
        Category::create([
            "name" => "Electronic",
            "slug" => "electronic",
        ]);
    
        Category::create([
            "name" => "J-Pop",
            "slug" => "jpop",
        ]);

        Post::factory(18)->create();

        User::create([
            "name" => "Bintang Prayoga",
            "username" => "bprayoga27",
            "email" => "dukunas27@gmail.com",
            "password" => bcrypt("12345"),
            "is_admin" => true,
        ]);

        // User::create([
        //     "name" => "HoneyComeBear",
        //     "email" => "hcb@gmail.com",
        //     "password" => bcrypt("12345"),
        // ]);

        // User::create([
        //     "name" => "Eri Sasaki",
        //     "email" => "es@gmail.com",
        //     "password" => bcrypt("12345"),
        // ]);


        // Posts::create([
        //     "category_id" => 1,
        //     "user_id" => 1,
        //     "title" => "Hades (the Nine Stages of Change at the Deceased Remains)",
        //     "image" => "https://is3-ssl.mzstatic.com/image/thumb/Music124/v4/ed/98/25/ed9825e7-821d-3544-a33b-ef7300784637/11099300.jpg/600x600bb.jpg",
        //     "slug" => "hades-mdg",
        //     "artist" => "My Dead Girlfriend",
        //     "excerpt" => "Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.",
        //     "body" => "<p>Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.</p><p> 2nd Paragraph </p>",
        // ]);

        // Posts::create([
        //     "category_id" => 2,
        //     "user_id" => 2,
        //     "title" => "HappyEND",
        //     "image" => "https://is4-ssl.mzstatic.com/image/thumb/Music125/v4/38/58/a6/3858a6be-19c1-bbde-174b-3ffb4f47cbc0/859757140091_cover.jpg/600x600bb.jpg",
        //     "slug" => "happyend-hcb",
        //     "artist" => "HoneyComeBear",
        //     "excerpt" => "Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.",
        //     "body" => "<p>Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.</p><p> 2nd Paragraph </p>",
        // ]);

        // Posts::create([
        //     "category_id" => 3,
        //     "user_id" => 3,
        //     "title" => "Colon",
        //     "image" => "https://is2-ssl.mzstatic.com/image/thumb/Music125/v4/16/99/96/1699962f-cbe8-5e3d-877d-6cfb22e8e49d/PA00087832_0_137189_jacket.jpg/600x600bb.jpg",
        //     "slug" => "colon-es",
        //     "artist" => "Eri Sasaki",
        //     "excerpt" => "Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.",
        //     "body" => "<p>Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.</p><p> 2nd Paragraph </p>",
        // ]);

        // Posts::create([
        //     "category_id" => 3,
        //     "user_id" => 3,
        //     "title" => "Period",
        //     "image" => "https://is2-ssl.mzstatic.com/image/thumb/Music125/v4/8f/d3/d4/8fd3d438-b2b1-f141-2490-3b59a185c204/USSW0048.jpg/600x600bb.jpg",
        //     "slug" => "period-es",
        //     "artist" => "Eri Sasaki",
        //     "excerpt" => "Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.",
        //     "body" => "<p>Hades is the first album by My Dead Girlfriend. It was released on July 25, 2018.</p><p> 2nd Paragraph </p>",
        // ]);
    }
}
