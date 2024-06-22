<?php

namespace App\Models;


class Post 
{
    private static $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Fenni Sarumaha",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora harum consequuntur quidem sapiente laboriosam atque aliquid. Modi numquam voluptatum nobis, inventore tenetur doloremque magnam doloribus veritatis optio, quasi assumenda fugit?" 
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Fenni Kristiani",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora harum consequuntur quidem sapiente laboriosam atque aliquid. Modi numquam voluptatum nobis, inventore tenetur doloremque magnam doloribus veritatis optio, quasi assumenda fugit?" 
            ]
        ];
        
    public static function all() {
        return collect(self::$blog_post);
    }

    public static function find($slug) {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
