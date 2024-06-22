<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory()->create([
            //     'name' => 'Fenni Kristiani Sarumaha',
            //     'email' => 'fennikris@example.com',
            //     'password' => bcrypt('12345'),
            // ]);
            
            // Post::create([
                //     'title' => 'Postingan Pertama',
                //     'category_id' => 1,
                //     'user_id' => 1,
                //     'slug' => 'postingan-pertama',
                //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas',
                //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas, soluta asperiores itaque commodi repellendus perspiciatis sequi totam officiis cum aliquid explicabo voluptates dicta!</p> <p> Laborum similique consequuntur voluptas tenetur, hic rem asperiores fuga commodi voluptatibus dolore officiis iure nulla illo possimus deserunt enim quaerat magni dolores doloremque nobis. Aliquid modi debitis minima ea ab,</p> <p>laborum corrupti dolorem, dolores deleniti ipsum enim exercitationem temporibus maxime vel, non aut molestiae! Rerum facilis nesciunt expedita perferendis, sint sequi impedit maxime animi consequatur, optio repudiandae nihil nulla.</p> <p> Blanditiis vero illum reiciendis? Accusantium, fugit ad ab consequatur quos voluptatibus optio dolorem delectus totam! Veniam commodi optio iusto dolore libero repudiandae culpa, velit vero quam ut fuga tempora minima aspernatur?</p>'
                // ]);
                // Post::create([
                    //     'category_id' => 2,
                    //     'user_id' => 1,
                    //     'title' => 'Postingan Kedua',
                    //     'slug' => 'postingan-kedua',
                    //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas',
                    //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas, soluta asperiores itaque commodi repellendus perspiciatis sequi totam officiis cum aliquid explicabo voluptates dicta!</p> <p> Laborum similique consequuntur voluptas tenetur, hic rem asperiores fuga commodi voluptatibus dolore officiis iure nulla illo possimus deserunt enim quaerat magni dolores doloremque nobis. Aliquid modi debitis minima ea ab,</p> <p>laborum corrupti dolorem, dolores deleniti ipsum enim exercitationem temporibus maxime vel, non aut molestiae! Rerum facilis nesciunt expedita perferendis, sint sequi impedit maxime animi consequatur, optio repudiandae nihil nulla.</p> <p> Blanditiis vero illum reiciendis? Accusantium, fugit ad ab consequatur quos voluptatibus optio dolorem delectus totam! Veniam commodi optio iusto dolore libero repudiandae culpa, velit vero quam ut fuga tempora minima aspernatur?</p>'
                    // ]);
                    // Post::create([
                        //     'category_id' => 3,
                        //     'user_id' => 1,
                        //     'title' => 'Postingan ketiga',
                        //     'slug' => 'postingan-ketiga',
                        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas',
                        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, odio delectus. Sunt debitis quisquam architecto quas, soluta asperiores itaque commodi repellendus perspiciatis sequi totam officiis cum aliquid explicabo voluptates dicta!</p> <p> Laborum similique consequuntur voluptas tenetur, hic rem asperiores fuga commodi voluptatibus dolore officiis iure nulla illo possimus deserunt enim quaerat magni dolores doloremque nobis. Aliquid modi debitis minima ea ab,</p> <p>laborum corrupti dolorem, dolores deleniti ipsum enim exercitationem temporibus maxime vel, non aut molestiae! Rerum facilis nesciunt expedita perferendis, sint sequi impedit maxime animi consequatur, optio repudiandae nihil nulla.</p> <p> Blanditiis vero illum reiciendis? Accusantium, fugit ad ab consequatur quos voluptatibus optio dolorem delectus totam! Veniam commodi optio iusto dolore libero repudiandae culpa, velit vero quam ut fuga tempora minima aspernatur?</p>'
                        // ]);
        User::factory(3)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Post::factory(20)->create();
    }
}
